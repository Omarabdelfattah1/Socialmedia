<?php
  class Pages extends Controller {
    public function __construct(){

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }
    
    public function index()
    {
      if(isLoggedIn()){
        redirect('posts');
      }

      $data = [
        'title' => 'SharePosts',
        'description' => 'Simple social network built on the TraversyMVC PHP framework'
      ];
     
      return $this->view('pages/index', $data);
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
    


  }