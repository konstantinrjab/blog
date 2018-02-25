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
header('Content-Type: application/json');

$article_id = $_POST['article_id'];

$user = new User($pdo);
if(!$user->id){
	die(json_encode('guest'));
}
$stmt = $pdo->prepare('SELECT 1 FROM likes WHERE article_id = :ai AND user_id = :ui');
$stmt->execute(array(
	':ai' => $article_id,
	':ui' => $user->id,
));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ( !$result) {
	$user->like($article_id);
	$action = 'add';
} else {
	$user->deleteLike($article_id);
	$action = 'delete';
}

$stmt = $pdo->prepare('SELECT COUNT(user_id) FROM likes WHERE article_id = :ai');
$stmt->execute(array(
	':ai' => $article_id
));
$count = $stmt->fetch(PDO::FETCH_NUM);
$json['count'] = $count[0];
$json['action'] = $action;
echo json_encode($json);