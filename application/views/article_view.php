<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */

if ($data['article']) {
	$article = $data['article'];
}
?>
<div class="row">
    <div class="col-12">
        <div class="article card bg-light mt-3">
            <div class="article__header card-header">
                <h3 class="title"><a href="/article/<?= $article['article_id'] ?>">
						<?= $article['title'] ?></a>
                </h3>

                <p class="tag d-inline">
                    Tags: <?php echo implode(', ', $article['tag']); ?>
                </p>
            </div>
            <div class="article__body card-body">
				<?php if ($article['intro']) : ?>
                    <p><?php echo mb_strimwidth($article['text'], 0, 150, '...'); ?>
                        <a href="/article/<?= $article['article_id'] ?>">Read full</a></p>
				<?php else : ?>
                    <p><?= $article['text'] ?></p>
				<?php endif; ?>
            </div>

            <!-- Images -->
			<div class="container">
                <div class="row">
					<?php if ( !$article['intro']) : ?>
						<?php foreach ($article['images'] as $image) : ?>
                            <div class="col-md-6 col-lg-4 col-12">
                                <img class="article__img rounded img-fluid" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'.$image; ?>">
                            </div>
						<?php endforeach; ?>
					<?php endif; ?>
                </div>
            </div>

            <!-- Footer -->
            <div class="article__footer card-footer">
                <p class="article__date d-inline">Published: <?= $article['date'] ?>; </p>
                <p class="article__author d-inline">Author: <?= $article['name'] ?> </p>
                <button class="article__button_like btn btn-primary float-right" id="<?= $article['article_id'] ?>">
                    Like
                    <span id="<?= $article['article_id'] ?>"><?php echo $article['likes'] ?></span>
					<?php
					if ($article['liked'] !== true) {
						$style = 'display: none;';
					} else {
						$style = '';
					}
					?>
                    <i class="fa fa-heart" style="<?= $style ?>"></i>
                </button>

				<?php if ($article['intro'] !== true) : ?>
                    <!-- Comments -->
                    <div class="article__comments" article_id="<?= $article['article_id'] ?>">
                        <textarea class="comment__textarea mt-3 w-100"
                                  article_id="<?= $article['article_id'] ?>"
                                  parent_id="0"
                                  rows="2"></textarea>
                        <button class="btn btn-primary article__button_comment mt-1"
                                onClick="comment(this);"
                                article_id="<?= $article['article_id'] ?>"
                                parent_id="0">Comment
                        </button>
                        <div class="article__comments_area mt-3" article_id="<?= $article['article_id'] ?>">

							<?php outComments($article); ?>

                        </div>
                    </div>
				<?php endif; ?>

            </div>

        </div>
    </div>

</div>