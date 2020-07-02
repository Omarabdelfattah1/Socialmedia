<?php
  class Posts extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }
    public function profile()
    {
      if (!isLoggedIn()) {
        redirect('users/login');
      }
      $id=$_SESSION['user_id'];
      $data=[
        'posts'=>$this->userModel->posts($id),
        'image'=>$this->userModel->getUserById($id)->image,
        'add'=>$this->add()
      ];
      return $this->view('users/profile',$data);
    }
    public function index(){
      // Get posts
      $posts = $this->postModel->getPosts();
      $id=$_SESSION['user_id'];
      $data = [
        'posts' => $posts,
        'image'=>$this->userModel->getUserById($id)->image,
        'add'=>$this->add()
      ];

      return $this->view('posts/index', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'body_err' => ''
        ];

        if(empty($data['body'])){
          flash('post_message', 'Post Added');
          redirect('posts');
        }

        // Make sure no errors
        if(empty($data['body_err'])){
          // Validated
          if($this->postModel->addPost($data)){
            flash('post_message', 'Post Added');
            redirect('posts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          return $data;
        }

      } else {
        $data = [
          'body' => '',
          'body_err' => ''
        ];
  
        return $data;
      }
    }

    public function edit($id)
    {
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'body_err' => ''
        ];

        // Validate data
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter body text';
        }

        // Make sure no errors
        if(empty($data['body_err'])){
          // Validated
          if($this->postModel->updatePost($data)){
            flash('post_message', 'Post Updated');
            redirect('posts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          return $this->view('posts/edit', $data);
        }

      } else {
        // Get existing post from model
        $post = $this->postModel->getPostById($id);

        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
          redirect('posts');
        }

        $data = [
          'id' => $id,
          'body' => $post->body
        ];
  
        return $this->view('posts/edit', $data);
      }
    }

    public function show($id)
    {
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);

      $data = [
        'post' => $post,
        'user' => $user
      ];

      $this->view('posts/show', $data);
    }

    public function delete($id)
    {
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
        $post = $this->postModel->getPostById($id);
        
        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
          redirect('posts');
        }

        if($this->postModel->deletePost($id)){
          flash('post_message', 'Post Removed');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('posts');
      }
    }

   

  }