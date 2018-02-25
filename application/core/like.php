<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 25.02.2018
 * Time: 16:33
 */

require_once ('pdo.php');
require_once ('User.php');
session_start();

$article_id = $_POST['article_id'];

$user = new User($pdo);
$user->like($article_id);

$stmt = $pdo->prepare('SELECT COUNT(user_id) FROM likes WHERE article_id = :ai');
$stmt->execute(array(
	':ai' => $article_id
));
$count = $stmt->fetch(PDO::FETCH_NUM);
print_r($count[0]);