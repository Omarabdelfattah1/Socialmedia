<?php

/**
 * 
 */
class Comments extends Controller
{
  
  public function __construct()
  {
    if(!isLoggedIn()){
      redirect('users/login');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }
  public function comment()
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'post_id' => $_POST['post_id'],
        'user_id' => $_POST['user_id'],
        'content' => $_POST['content']
      ];

      if($this->postModel->comment($data)){
        redirect('posts');
      } else {
        die('Something went wrong');
      }

    } else {
      
      redirect('posts');
    }
  }

  public function comments($id)
  {
    $comments= $this->postModel->comments($id);
    $commentToReturn="";
    foreach($comments as $comment){
      echo"
      <div class='media mt-1'>
        <img style='width:45px;height:45px;' class='rounded-circle d-flex mr-3' src='".FILES.$comment->image."'>
        <div class='media-body' >
          <div>
            <h6 class='mt-0 '  >".$comment->name."</h6>
            <span >
              <a >
                ".post_time($comment->commentCreated)."
              </a>
            </span>
          </div><br>
          ".
           $comment->content."
        </div>
      </div>";
    } 
  }
  public function editComment($id)
  {
    $comment = $this->postModel->getCommentById($id);
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['user_id']== $comment->user_id){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'content' => trim($_POST['content']),
        'user_id' => $_SESSION['user_id']
      ];

      // Validated
      if($this->postModel->updateComment($data)){
        flash('post_message', 'Comment Updated');
        redirect('posts');
      } else {
        die('Something went wrong');
      }

    } else {
      
      // Check for owner
      if($comment->user_id != $_SESSION['user_id']){
        redirect('posts');
      }

    }
  }

  public function deleteComment($id)
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Get existing post from model
      $comment = $this->postModel->getCommentById($id);
      
      // Check for owner
      if($post->user_id != $_SESSION['user_id']){
        redirect('posts');
      }

      if($this->postModel->deleteComment($id)){
        flash('post_message', 'Comment Removed');
        redirect('posts');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('posts');
    }
  }
}