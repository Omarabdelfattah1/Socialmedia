<?php 
$id=$_REQUEST['id'];


foreach($post->comments($post->id) as $comment):?>
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
    
    <?= $comment->content?>
  </div>
</div>
<?php endforeach; ?>