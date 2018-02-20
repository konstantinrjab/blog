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
        <table class="table table-striped bg-light">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Published</th>
                <th scope="col">Author</th>
                <th scope="col">Tags</th>
            </tr>
            </thead>
            <tbody>
		<?php
		foreach ($data['articles'] as $article) : ?>
            <tr>
                <th scope="row"><?= $article['title'] ?></th>
                <td><?= $article['date'] ?></td>
                <td><?= $article['name'] ?></td>
                <td><?= $article['tags'] ?></td>
            </tr>
		<?php endforeach; ?>


            </tbody>
        </table>
    </div>

</div>