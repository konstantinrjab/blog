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
        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/admin/createArticle"
           type="submit" class="btn btn-primary">Create Article</a>
	    <?php include "info-window.php"; ?>
    </div>
    <div class="col-12">
        <h3>Articles</h3>
        <table class="table table-striped bg-light">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Published</th>
                <th scope="col">Author</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
			<?php
			foreach ($data['articles'] as $article) : ?>
                <tr>
                    <th scope="row"><?= $article['title'] ?></th>
                    <td><?= $article['date'] ?></td>
                    <td><?= $article['name'] ?></td>
                    <td>
                        <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/admin/updateArticle/?id='.$article['article_id'] ?>">Update</a>
                    </td>
                    <td>
                        <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/admin/deleteArticle/?id='.$article['article_id'] ?>"
                           class="text-danger">Delete</a>
                    </td>
                </tr>
			<?php endforeach; ?>


            </tbody>
        </table>
    </div>

</div>