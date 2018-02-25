<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */

//print_r($data['article']);
?>
<div class="row">
    <div class="col-12">
        <div class="article card">
            <div class="article__header card-header">
                <h3 class="title"><a href="/article/<?= $data['article']['article_id'] ?>">
						<?= $data['article']['title'] ?></a>
                </h3>

                <p class="tag d-inline">Tags:
					<?php foreach ($data['article']['tag'] as $tag) {
						echo $tag.', ';
					} ?>
                </p>
            </div>
            <div class="article__body card-body">
				<?php if ($data['article']['intro']) : ?>
                    <p><?php echo mb_strimwidth($data['article']['text'], 0, 150, '...'); ?>
                        <a href="/article/<?= $data['article']['article_id'] ?>">Read full</a></p>
				<?php else : ?>
                    <p><?= $data['article']['text'] ?></p>
				<?php endif; ?>
            </div>
            <div class="article__footer card-footer">
                <p class="article__date d-inline">Published: <?= $data['article']['date'] ?>; </p>
                <p class="article__author d-inline">Author: <?= $data['article']['name'] ?>; </p>
                <button class="article__like btn btn-primary" id="<?=$data['article']['article_id']?>">
                    Like <like-count id="<?=$data['article']['article_id']?>"><?php echo $data['article']['likes'] ?></like-count></button>
            </div>

        </div>
    </div>

</div>