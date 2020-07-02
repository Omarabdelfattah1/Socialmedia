<?php
  class Post {
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function getPosts()
    {
      $this->db->query('SELECT *,
                          posts.id as postId,
                          users.id as userId,
                          posts.created_at as postCreated,
                          users.created_at as userCreated
                          -- ,
                          -- comments.content as comment,
                          -- comments.user_id as commentUser,
                          -- comments.post_id as commentPostId,
                          -- comments.created_at as commentCreated
                        FROM posts
                          INNER JOIN users
                        ON posts.user_id = users.id
                        --   RIGHT JOIN comments
                        -- On comments.user_id =users.id
                        --   WHERE comments.post_id=posts.id
                          ORDER BY posts.created_at DESC
                      
                        ');

      $results = $this->db->resultSet();

      return $results;
    }



    public function addPost($data)
    {
      $this->db->query('INSERT INTO posts (user_id, body) VALUES(:user_id, :body)');
      // Bind values
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updatePost($data)
    {
      $this->db->query('UPDATE posts SET body = :body WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getPostById($id)
    {
      $this->db->query('SELECT * FROM posts WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deletePost($id)
    {
      $this->db->query('DELETE FROM posts WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function like($data)
    {
      $this->db->query('INSERT INTO likes (user_id, post_id) VALUES(:user_id, :post_id)');
      // Bind values
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':post_id', $data['post_id']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function unlike($data)
    {
      $this->db->query('DELETE FROM likes 
                  WHERE post_id= :post_id AND user_id, :user_id)');
      // Bind values
      $this->db->bind(':post_id', $data['post_id']);
      $this->db->bind(':user_id', $data['user_id']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function likes($id)
    {
      $this->db->query('SELECT *,
                          likes.id as likeId,
                          users.id as userId,
                          likes.created_at as likeCreated,
                          users.created_at as userCreated
                           FROM likes 
                        INNER JOIN users
                            ON likes.user_id=users.id
                        WHERE likes.post_id= :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      $results = $this->db->resultSet();

      return $results;
    }

    public function comment($data)
    {
      $this->db->query('INSERT INTO comments (user_id,post_id,content) VALUES( :user_id,:post_id,:content)');
      // Bind values
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':post_id', $data['post_id']);
      $this->db->bind(':content', $data['content']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function comments($id)
    {
      $this->db->query('SELECT *,
                          comments.id as commentId,
                          users.id as userId,
                          comments.created_at as commentCreated,
                          users.created_at as userCreated
                        FROM comments
                          INNER JOIN users
                        ON comments.user_id = users.id
                        WHERE comments.post_id= :id
                          ORDER BY comments.created_at DESC
                        ');
      $this->db->bind(':id',$id);
      $results = $this->db->resultSet();

      return $results;
    }
    public function updateComment($data)
    {
      $this->db->query('UPDATE comments SET content = :content WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':content', $data['content']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getCommentById($id)
    {
      $this->db->query('SELECT * FROM comments WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteComment($id){
      $this->db->query('DELETE FROM comments WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }