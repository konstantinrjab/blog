<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 25.02.2018
 * Time: 16:33
 */
?>

<div class="article__comment"
     style="padding-left: <?= $level * 20 ?>px;"
     onClick="reply(this);"
     article_id="<?= $comment['article_id'] ?>"
     comment_id="<?= $comment['comment_id'] ?>">

  <div class="card-header">
    <p>By: <?= $comment['name'] ?></p>
  </div>
  <div class="card-body">
    <p><?= $comment['comment_text'] ?></p>
    <p class="text-info" onClick="reply(this);" style="cursor: pointer;"
       article_id="<?= $comment['article_id'] ?>"
       comment_id="<?= $comment['comment_id'] ?>">Reply</p>
    <textarea class="comment__textarea w-100" style="display: none;"
              article_id="<?= $comment['article_id'] ?>"
              parent_id="<?= $comment['comment_id'] ?>"
              rows="2"></textarea>
    <button class="btn btn-primary article__button_comment" style="display: none;"
            onClick="comment(this);"
            article_id="<?= $comment['article_id'] ?>"
            parent_id="<?= $comment['comment_id'] ?>">Reply
    </button>
  </div>
</div>