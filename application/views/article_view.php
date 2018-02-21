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
        <div class="article">

            <h3 class="title"><a href="/article/<?= $data['article']['article_id'] ?>"><?= $data['article']['title'] ?></a></h3>
            <div class="header">
                <p class="date d-inline">Published: <?= $data['article']['date'] ?>; </p>
                <p class="author d-inline">Author: <?= $data['article']['name'] ?>; </p>
                <p class="tag d-inline">Tags:
					<?php foreach ($data['article']['tag'] as $tag) {
						echo $tag.', ';
					} ?>
                </p>
            </div>
            <div class="body">
                <p><?= $data['article']['text'] ?></p>
            </div>

        </div>
    </div>

</div>