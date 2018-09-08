<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */
//print_r($data);
?>
<div class="row">
  <div class="col-12">
	  <?php include "info-window.php"; ?>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"
               value="<?= $data['article']['title'] ?>">
      </div>
      <div class="form-group">
        <label for="tag">Tags</label>
		  <?php
		  $tags = '';
		  if (isset($data['article']['tag']) && !empty($data['article']['tag'])) {
			  foreach ($data['article']['tag'] as $tag) {
				  $tags .= $tag.', ';
			  }
		  } ?>
        <input type="text" class="form-control" id="tag" name="tag" value="<?= $tags ?>">
      </div>
      <div class="form-group">
        <label for="text">Text</label>
        <textarea class="form-control" id="text" name="text"
                  rows="10"><?= $data['article']['text'] ?></textarea>
      </div>
		<?php if (isset($data['article']['images']) && !empty($data['article']['images'])) : ?>
			<?php
			foreach ($data['article']['images'] as $image) : ?>
              <div class="col-md-6 col-lg-4 col-12 pb-3">
                <div class="">
                  <img class="article__img rounded img-fluid"
                       src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$GLOBALS['PATH_TO_ROOT_Directory_Project'].'/'.$image; ?>">
                </div>
                <div class="btn btn-danger mt-2">
                  <label class="m-0" for="<?= $image ?>">Delete image</label>
                  <input id="<?= $image ?>" name="image" type="checkbox" value="<?= $image ?>">
                </div>
              </div>
			<?php endforeach; ?>
		<?php endif; ?>
      <input type="hidden" name="MAX_FILE_SIZE" value="<?= 1024 * 3 * 1024 ?>>"/>
      <p>Choose file</p>
      <input class="" name="userfile" type="file"/>
      <input type="submit" class="btn btn-primary" placeholder="Add" value="Submit" name="submit">
    </form>
  </div>
</div>