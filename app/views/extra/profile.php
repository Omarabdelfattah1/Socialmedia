
<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container" style="margin-top:80px">
  <div class="row">
    <div class="col-sm-4">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text about me..</p>
      <h3>Some Links</h3>
      <p>Lorem ipsum dolor sit ame.</p>
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
      <div class="row mb-3">
        <div class="col-md-6">
          <h1>Posts</h1>
        </div>
        <div class="col-md-6">
          <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add Post
          </a>
        </div>
      </div>
      <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
          <h4 class="card-title"><?php echo $post->name; ?></h4>
          <div class="bg-light p-2 mb-3">
            <?php echo $post->postCreated; ?>
          </div>
          <p class="card-text"><?php echo $post->body; ?></p>
          <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>