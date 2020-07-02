<?php
  class User {
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data)
    {
      $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      // Execute
      if($this->db->execute())
      {
        return true;
      } 
      else
      {
        return false;
      }
    }

    // Login User
    public function login($email, $password)
    {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email)
    {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
    public function getUsers($id)
    {
      $this->db->query('
        SELECT id,name,image,email
          FROM users
          WHERE users.id NOT IN (SELECT f_id from friends WHERE u_id=:id )
            AND users.id NOT IN (SELECT u_id from friends WHERE f_id=:id )
           AND  users.id !=:id


         ');

      $this->db->bind(':id', $id);
      
      //if ($this->db->rowCount()>0) {
        return $this->db->resultSet();
      //}
    }

    //Friend Request
    public function f_request($u_id,$f_id)
    {
      $this->db->query('
        INSERT into friends (u_id,f_id,confirmed) VALUES (:u_id,:f_id,0)
        ');
      $this->db->bind(':u_id',$u_id);
      $this->db->bind(':f_id',$f_id);
      if ($this->db->execute()) {
        return true;
      }else{
        return false;
      }

    }

    public function accept_request($u_id,$f_id)
    {
      $this->db->query('
        UPDATE friends SET confirmed = 1
          WHERE u_id=:u_id AND f_id=:f_id 
        ');
      $this->db->bind(':u_id',$u_id);
      $this->db->bind(':f_id',$f_id);
      if ($this->db->execute()) {
        return true;
      }else{
        return false;
      }

    }
    public function refuse_request($u_id,$f_id)
    {
      $this->db->query('
        DELETE FROM friends 
          WHERE u_id=:u_id AND f_id=:f_id 
        ');
      $this->db->bind(':u_id',$u_id);
      $this->db->bind(':f_id',$f_id);
      if ($this->db->execute()) {
        return true;
      }else{
        return false;
      }

    }

    public function f_requests($id)
    {
      
      $this->db->query('
        SELECT id,name,image,email
          FROM users
          WHERE id IN (SELECT u_id from friends WHERE f_id=:id AND confirmed=0)


         ');

      $this->db->bind(':id', $id);
      
      //if ($this->db->rowCount()>0) {
        return $this->db->resultSet();
    }

    //Show friends
    public function friends($id)
    {
      $this->db->query('
        SELECT *,' . $id . ' as user_id, 
          IF(u2.id = ' . $id . ', u1.id, f.f_id) as f_id, 
          IF(f.u_id = ' . $id . ', u2.name, u1.name) as name
        FROM users as u1
          INNER JOIN friends as f
        ON u1.id = f.u_id
          INNER JOIN users as u2
        ON f.f_id = u2.id
          WHERE (f.u_id = ' .$id. ' OR f.f_id = ' . $id . ') AND f.confirmed = 1');

      $this->db->bind(':id', $id);
      
      //if ($this->db->rowCount()>0) {
        return $this->db->resultSet();
      //}

    }

    // Get User by ID
    public function getUserById($id)
    {
      $this->db->query('SELECT * FROM users WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function updateUser($id,$col,$value)
    {
      $this->db->query('UPDATE users set '.$col.'="'.$value.'" WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      if($this->db->execute())
      {
        return true;
      }else{
        return false;
      }
    }
    
    
    public function posts($id)
    {
      $this->db->query('SELECT *,
                          posts.id as postId,
                          users.id as userId,
                          posts.created_at as postCreated,
                          users.created_at as userCreated
                        FROM posts
                          INNER JOIN users
                        ON posts.user_id = users.id
                          WHERE posts.user_id = :id
                        ORDER BY posts.created_at DESC');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->resultSet();

      return $row;
    }
  }