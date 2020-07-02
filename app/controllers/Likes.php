<?php 

/**
 * 
 */
class Likes extends Controller
{
	
	public function __construct(){
    if(!isLoggedIn()){
      redirect('users/login');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }


  public function like($id)
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array

      $data = [
        'post_id' => $id,
        'user_id' => $_SESSION
        ['user_id']
      ];

      
      if($this->postModel->like($data)){
        redirect('posts');
      } elseif($this->postModel->unlike($data)) {
        redirect('posts');
      }

    } else {
      
      redirect('posts');
    }
  }

  public function likes($post_id)
  {
    $likes=$this->postModel->likes($post_id);
    $likesToReturn="";
    foreach($likes as $like){
      echo"
      <div class='media mt-1'>
        <img style='width:45px;height:45px;' class='rounded-circle d-flex mr-3' src='".FILES.$like->image."'>
        <div class='media-body' >
          <div>
            <h6 class='mt-0 '  >".$like->name."</h6>
            <span >
              <a >
                ".post_time($like->likeCreated)."
              </a>
            </span>
          </div><br>
        </div>
      </div>";
    } 
  }
}