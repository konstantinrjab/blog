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
        <a href="admin/createArticle" type="submit" class="btn btn-primary">Create Article</a>
<!--        <form method="get" action="admin/createArticle?">-->
<!--            <input type="submit" class="btn btn-primary" value="Create Article" />-->
<!--        </form>-->
    </div>
    <div class="col-12">
        <h3>Articles</h3>

		<?php
        foreach ($data['articles'] as $article) : ?>
            <div class="article">
                <div class="header">
                    <h3 class="title"><?= $article['title'] ?></h3>
                    <p class="date d-inline">Published: <?= $article['date'] ?>; </p>
                    <p class="author d-inline">Author: <?= $article['name'] ?>; </p>
                    <p class="tag d-inline">Tags: first article</p>
                </div>
                <div class="body">
                    <p><?= $article['text'] ?></p>
                </div>
            </div>
		<?php endforeach; ?>

    </div>

</div>