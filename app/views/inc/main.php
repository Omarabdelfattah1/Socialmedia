<div class="col-sm-8">
      <div class="mb-3">
        <div class="card card-body bg-light ">
          <form action="<?php echo URLROOT; ?>/posts/add" method="post">
            <div class="form-group">
              <label for="body">Write something... <sup>*</sup></label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['add']['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['add']['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['add']['body_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
          </form>
        </div>
      </div>
<?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
          <div class="card-title border-bottom pb-2" >
            <div class="media pull-left">
              <img style="width:60px;height:60px;" class="rounded-circle d-flex mr-3" src="<?= FILES. $post->image;?>">
              <div class="media-body">
                <h5 class="mt-0"><?php echo $post->name.' '; ?></h5>
                <span >
                  <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">
                  <?php echo post_time($post->postCreated); ?>
                  </a>
                </span>
              </div>
            </div>
            <span class="pull-right">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">notification 1</a>
                  <div class="dropdown-divider"></div>
                </div>
            </span>
          </div>
          <p class="card-text "><?php echo $post->body; ?></p>
          <div class="btn-group">
            <button class="btn btn-sm btn-link" data-toggle="modal" data-target="#likes<?= $post->postId?>"  onclick="showLikes(<?= $post->postId?>)">
              <?= $post->likes
              ?>
            </button>
            <button class="btn btn-sm btn-link" data-toggle="modal" data-target="#likes<?= $post->postId?>"  onclick="showComments(<?= $post->postId?>)">
              <?= $post->comments?><i></i>
            </button>
            
          </div>
          <div class="btn-group pb-2 border-bottom">
            <button class="btn btn-default" onclick="addLike(<?= $post->postId?>)">Like</button>
            
            <button class="btn btn-default" data-toggle="collapse" data-target="#comment<?= $post->postId?>" type="button" onclick="showComments(<?= $post->postId?>)">Comment</button>
            
          </div>
          <div class="modal show" id="likes<?= $post->postId?>" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body" id="mylikes<?= $post->postId?>">
                </div>
                
              </div>
            </div>
          </div>
          <div class="collapse p-2" id="comment<?= $post->postId?>">
            <div class="media">
              <img style="width:40px;height:40px;" class="rounded-circle d-flex mr-3" src="<?= FILES. $data['image'] ?>">
                <div class="media-body ">
                  <form action="<?php echo URLROOT; ?>/posts/comment" method="post">
                    <input type="hidden" name="post_id" value="<?= $post->postId?>">
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']?>">
                    <div class="input-group">
                      <input type="text" class="form-control" name="content" placeholder="Write comment..">
                      <span class="input-group-btn">
                          <button class="btn btn-primary" type="submit">Comment</button>
                      </span>
                    </div>
                  </form>
                </div>
            </div>
            <div class="pt-2" id="comments<?= $post->postId?>">
            
            </div>
          </div>
          
          
              
          
        </div>

<?php endforeach; ?>
    </div>