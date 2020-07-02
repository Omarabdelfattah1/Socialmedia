<?php

/**
 * 
 */
class Friends extends Controller
{
  
  public function __construct()
  {
    $this->userModel=$this->model('user');
  }
  public function index()
  {
    if(!isLoggedIn()){
      redirect('users/login');
    }
    $data=[
      'users' => $this->userModel->getUsers($_SESSION['user_id']),
      'f_requests'=>$this->f_requests(),
      'friends'=>$this->friends()
    ];
    
    return $this->view('users/index',$data);
  }

  public function addFriend()
  {
    if (isset($_POST['friend_id'])) {
      $user_id=$_SESSION['user_id'];
      $friend_id=$_POST['friend_id'];
      if ($this->userModel->f_request($user_id,$friend_id)) {
        flash('success','Request was sent successfully.');
        return redirect('pages/f_requests.php');
      }
      
      
    }
  
    flash('failed','Request failed.');
    redirect('users/index.php');
    
  }
  public function accept_request()
  {
    if(!isLoggedIn()){
        redirect('users/login');
      }
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      $user_id=$_SESSION['user_id'];
      $friend_id=$_POST['friend_id'];
      if($this->userModel->accept_request($friend_id,$user_id)){

        flash('success','Accepted successfully.');
        redirect('users/index.php');
      }
    }
    
    flash('failed','Something went wrong');
            
    redirect('users/index.php');
  }
  public function refuse_request()
  {
    if(!isLoggedIn()){
        redirect('users/login');
      }
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      $user_id=$_SESSION['user_id'];
      $friend_id=$_POST['friend_id'];
      if($this->userModel->refuse_request($friend_id,$user_id)){

        flash('success','Refused successfully.');
        redirect('users/index.php');
      }
    }
    
    flash('failed','Something went wrong');
            
    redirect('users/index.php');
  }

  public function f_requests()
  {
    if(!isLoggedIn()){
      redirect('users/login');
    }
    $id=$_SESSION['user_id'];
    $data=$this->userModel->f_requests($id);
    return $data;
  }

  public function friends()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }
    $id=$_SESSION['user_id'];
    $data=$this->userModel->friends($id);
    return $data;
  }
}
