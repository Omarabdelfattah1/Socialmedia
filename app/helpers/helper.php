<?php

function escape($string) {
  return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
function upload(){
	$target_dir = UPLOADS;
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 1) {
	    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        $uploadOk=0;
	    } 
	}
	return [
	        	'isUploaded'=>$uploadOk,
		        'path'=>$target_file
		      ];
}

function store()
{
	$toReturn=[
		'errors'=>[],
		'path'=>''
	];
	if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      $toReturn['errors']=$errors;
      if(empty($errors)==true){
        if(move_uploaded_file($file_tmp,UPLOADS."/profile/".$file_name))
       	{
       		$toReturn['path']="/profile/".$file_name;
       	}
      }
    }
    return $toReturn;
}
function post_time($created_at)
{
  $post = strtotime($created_at);
	
	if (date("Y")>date("Y",$post)) {
		return date("Y") - date("Y",$post).' years ago';
	}
	if(date("m")>date("m",$post))
	{
		return date("m") - date("m",$post).' month ago';
	}
	if(date("d")>date("d",$post))
	{
		return date("d") - date("d",$post).' day ago';
	}
	if(date("h")>date("h",$post))
	{
		return date("h") - date("h",$post).' hours ago';
	}
	if(date("i")>date("i",$post))
	{
		return date("i") - date("i",$post).' minutes ago';
	}
	if(date("sa")>date("sa",$post))
	{
		return 'few seconds ago';
	}
}
