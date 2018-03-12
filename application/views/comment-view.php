<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 25.02.2018
 * Time: 16:33
 */
?>

<div class="article__comment"
     article_id="<?= $article['article_id'] ?>"
     comment_id="<?= $comment['comment_id'] ?>">
    <div class="card-header">By: <?= $comment['name'] ?></div>
    <div class="card-body">
        <p><?= $comment['comment_text'] ?></p>
        <textarea class="comment__textarea w-100" style="display: none;"
                  comment_id="<?= $comment['comment_id'] ?>"
                  rows="2"></textarea>
        <button class="btn btn-primary article__button_comment" style="display: none;"
                comment_id="<?= $comment['comment_id'] ?>">Reply</button>
    </div>
</div>