<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container" style="margin-top:20px">
  <div class="row">
    <div class="col-sm-4">
        <div class="card">
        
          <div class="card-body">
            <h3 class="card-title">
              New friend requests
            </h3>
            <?php
            if (is_array($data)) {

              foreach ($data['f_requests'] as $user ) {
                ?>
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><?= $user->name;?></h5>
                    
                      <form action="<?php echo URLROOT; ?>/friends/accept_request" method="POST">
                        <input type="hidden" name="friend_id" value="<?= $user->id ?>">
                        <input type="submit" value="Accept Request" class="btn btn-primary">
                      </form>
                      <form action="<?php echo URLROOT; ?>/friends/refuse_request" method="POST">
                        <input type="hidden" name="friend_id" value="<?= $user->id ?>">
                        <input type="submit" value="Delete Request" class="btn btn-danger">
                      </form>
                    </div>
                  </div>

                <?php
              }
            }
            ?>
          </div>
        </div>
        <div class="card">
        
          <div class="card-body">
            <h3 class="card-title">
            Find new friends
            </h3>
            <?php
              if (is_array($data)) {

                foreach ($data['users'] as $user ) {
                  ?>
                    <div class="card w-75">
                      <div class="card-body">
                        <h5 class="card-title"><?= $user->name;?></h5>
                      
                        <form class="form-group" action="<?php echo URLROOT; ?>/friends/addFriend" method="POST">
                          <input type="hidden" name="friend_id" value="<?= $user->id ?>">
                          <input type="submit" value="Add Friend" class="btn btn-primary">
                        </form>
                      </div>
                    </div>
                  <?php
                }
              }
                
              ?>
          </div>
        </div>
    </div>
    
    <!-- <hr class="d-sm-none">
    </div> -->
    <div class="col-sm-8">
      <?php
        if (is_array($data)) {

          foreach ($data['friends'] as $friend ) {
        ?>
             <div class="card w-50 float-left">
               <div class="card-body">
                 <div class="card-title">
                   <img class="rounded-circle float-left" src="<?= FILES. $friend->image ?>" alt="Card image" style="width:75px;height: 75px;">
                   <h4><a class="nav-link" href="#"><?= $friend->name;?></a></h4>
                   <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, quas.</p>
                 </div>
                 
               </div>
             </div>
            <!-- <div class="card" style="width:400px">
              <div class="row card-body">
                <img class="col-sm-6 rounded-circle" src="<?= FILES. $friend->image ?>" alt="Card image" style="width:100%">
                <div class="col-sm-6">
                  <h4 class="card-title"><a class="nav-link" href="#"><?= $friend->name;?></a></h4>
                   <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p> 
                  <a href="#" class="btn btn-primary stretched-link">See Profile</a>
                </div>
              </div> -->
        <?php
          }
        }
        ?>
      
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>