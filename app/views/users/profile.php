<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message');
  if (isset($isUploaded['errors'])) {
    foreach ($isUploaded['errors'] as $error) {
      echo $error;
    }
  }

   ?>
  <div class="row">
    <div class="col-sm-4 ">
            
        
      
    </div>
    <?php require APPROOT.'/views/inc/main.php'?>
  

  
<?php require APPROOT . '/views/inc/footer.php'; ?>