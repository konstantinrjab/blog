<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */

if (isset($data['article'])) {
	$article = $data['article'];
}
?>
<div class="row">
  <div class="col-12">
    <div class="article card bg-light mt-3">
      <div class="article__header card-header">
        <h3 class="title"><a
              href="/article/<?= $article['article_id'] ?>">
				<?= $article['title'] ?></a>
        </h3>

        <p class="tag d-inline">
          Tags:
          <?php if(isset($article['tag']) && !empty($article['tag'])) : ?>

	          <?php foreach ($article['tag'] as $tag): ?>
              <a href="/search/article?tag=<?=$tag?>"><?=$tag?></a>,
	          <?php endforeach; ?>
          <?php else :?>
          no tags.
          <?php endif; ?>


        </p>
      </div>
      <div class="article__body card-body">
		  <?php if (isset($article['intro'])) : ?>
            <p><?php echo substr($article['text'], 0, 150).'...'; ?>
              <a href="/article/<?= $article['article_id'] ?>">Read
                full</a></p>
		  <?php else : ?>
            <p><?= $article['text'] ?></p>
		  <?php endif; ?>
      </div>

      <!-- Images -->
      <div class="container">
        <div class="row">
			<?php if ( !isset($article['intro'])) : ?>
				<?php foreach ($article['images'] as $image) : ?>
                <div class="col-md-6 col-lg-4 col-12 pb-3">
                  <div class="h-50">
                    <img class="article__img rounded img-fluid"
                         src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'.$image; ?>">
                  </div>
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
			$style = '';

			if ($article['liked'] !== true) {
				$style = 'display: none;';
			}

			?>
          <i class="fa fa-heart" style="<?= $style ?>"></i>
        </button>

		  <?php if (!isset($article['intro'])) : ?>
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

				  <?php outComments($article, ''); ?>

              </div>
            </div>
		  <?php endif; ?>

      </div>

    </div>
  </div>

</div>