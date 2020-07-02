
<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container" style="margin-top:80px">
  <div class="row">
    <div class="col-sm-4">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <?php
      //echo $data['users'];
      if (is_array($data)) {

        foreach ($data['users'] as $user ) {
          ?>
            <div class="card w-75">
              <div class="card-body">
                <h5 class="card-title inline"><?= $user->name;?></h5>
              
                <form action="<?php echo URLROOT; ?>/users/addFriend" method="POST">
                  <input type="hidden" name="friend_id" value="<?= $user->id ?>">
                  <input type="submit" class="btn btn-primary">
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

<?php require APPROOT . '/views/inc/footer.php'; ?>