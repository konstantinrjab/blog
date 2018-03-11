<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 25.02.2018
 * Time: 16:33
 */

require_once('pdo.php');
require_once('User.php');
session_start();
//header('Content-Type: ');

$article_id = $_POST['article_id'];
$parent_id  = $_POST['parent_id'];
$text       = $_POST['text'];

$user = new User($pdo);
if ( !$user->id) {
	die(json_encode('guest'));
}

$stmt = $pdo->prepare('INSERT INTO comments (article_id, parent_id, comment_text, author) 
VALUES (:ai, :pi, :tx, :au)');

$stmt->execute(array(
	':ai' => $article_id,
	':pi' => $parent_id,
	':tx' => $text,
	':au' => $user->id,
));

$model = new Model($pdo);
$article = $model->get_article($article_id);
foreach ($article['comments'] as $comment){
	include('application/views/comments-view.php');
}