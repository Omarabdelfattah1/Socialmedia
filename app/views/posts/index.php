<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-2.5 mr-3 border rounded" style="background: #e6f9ff;">
      <div class="card card-body bg-light">
        <img class="card-img-top rounded-circle" src="<?= FILES. $data['image'];?>" alt="Card image" style="width:200px;height: 200px;" data-toggle="modal" data-target="#myModal">
        <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Select image to upload:</h5>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
           <form  action="<?= URLROOT;?>/users/profile_photo" method="post" enctype="multipart/form-data">
              
              <input type="file" name="image" id="image">
              <input class="btn btn-primary" type="submit" value="Upload Image" name="submit">
          </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
          
        
        <h4 class="card-title"></h4>
        <p class="card-text">Some example text.</p>
      </div>
    </div>
    <?php 
    require APPROOT.'/views/inc/main.php'
    
    ?>
    
  </div>
</div>

  
<?php require APPROOT . '/views/inc/footer.php'; ?>