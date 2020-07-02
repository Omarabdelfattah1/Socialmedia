
<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container" style="margin-top:40px">
  <div class="row">
    <div class="col-sm-2.5 mr-3 border rounded" style="background: #e6f9ff;">
      <div class="card card-body bg-light" >
        <img class="card-img-top rounded-circle" src="img/photo.png" alt="Card image" style="width:200px;height: 200px;">
        <h4 class="card-title text-center">Omar Abdelfattah</h4>
        <p class="card-text">Some example text.</p>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="mb-3">
        <div class="card card-body bg-light mt-3">
          <form action="" method="post">
            <div class="form-group">
              <label for="body">Write something... <sup>*</sup></label>
              <textarea name="body" class="form-control form-control-lg">
It was an exiting day!
I enjoyed it very much.
              </textarea>
              <span class="invalid-feedback"></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
          </form>
        </div>
      </div>
        <div class="card card-body mb-3">
          <div class="card-title border-bottom pb-2" >
            <div class="media pull-left">
              <img style="width:60px;height:60px;" class="rounded-circle d-flex mr-3" src="img/photo.png">
              <div class="media-body">
                <h5 class="mt-0">Omar Abdelfattah</h5>
                <span >
                  <a href="">
                    1 hour ago
                  </a>
                </span>
              </div>
            </div>
            <span class="pull-right">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Edit</a>
                  <a class="dropdown-item" href="#">Delete</a>
                  <div class="dropdown-divider"></div>
                </div>
            </span>
          </div>
          <p class="card-text pb-2 border-bottom">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
          </p>
          <div class="btn-group pb-2 border-bottom">
            <button class="btn btn-default" type="button">Like</button>
            <button class="btn btn-default" data-toggle="collapse" data-target="#demo" type="button">Comment</button>
            <button class="btn btn-default" type="button">Share</button>
          </div>
          <div class="collapse p-2" id="demo">
            <div class="media">
              <img style="width:40px;height:40px;" class="rounded-circle d-flex mr-3" src="img/photo.png">
                <div class="media-body ">
                  <form >
                      <div class="form-group">
                        <input type="text" class="form-control" name="">
                      </div>
                  </form>
                </div>
            </div>
            
          </div>
                <div class="media mt-1">
                  <img style="width:45px;height:45px;" class="rounded-circle d-flex mr-3" src="img/photo.png">
                  <div class="media-body" >
                    <div>
                      <h6 class="mt-0 "  >Omar Abdelfattah</h6>
                      <span >
                        <a href="">
                          1 hour ago
                        </a>
                      </span>
                    </div><br>
                    
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  </div>
                </div>
              
          
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>