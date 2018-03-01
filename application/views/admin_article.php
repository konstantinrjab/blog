<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */
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
				if ($data['article']['tag']) {
					foreach ($data['article']['tag'] as $tag) {
						$tags .= $tag.',';
					}
				} ?>
                <input type="text" class="form-control" id="tag" name="tag" value="<?= $tags ?>">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" name="text"
                          rows="10"><?= $data['article']['text'] ?></textarea>
            </div>
            <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
            <p>Choose file</p>
            <input name="userfile" type="file"/>
            <input type="submit" class="btn btn-primary" placeholder="Add" value="Submit" name="submit">
        </form>
    </div>
</div>