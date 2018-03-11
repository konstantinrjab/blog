<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 25.02.2018
 * Time: 16:33
 */
?>

<div class="article__comment" article_id="<?= $article['article_id'] ?>">
    <div class="card-header">By: <?= $comment['name'] ?></div>
    <div class="card-body"><?= $comment['comment_text'] ?>
        <textarea class="comment__textarea mt-3 w-100" style="display: none;" name="comment__body"
                  article_id="<?= $article['article_id'] ?>"
                  comment_id="<?= $comment['comment_id'] ?>"
                  rows="2"></textarea>
        <button class="btn btn-primary comment__button mt-1" style="display: none;"
                article_id="<?= $article['article_id'] ?>" comment_id="<?= $comment['comment_id'] ?>">Reply
        </button>
    </div>
</div>