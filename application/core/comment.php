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
$parent_id = $_POST['parent_id'];
$text = $_POST['text'];

$user = new User($pdo);
if ( !$user->id) {
	die(json_encode('guest'));
}
$stmt = $pdo->prepare('INSERT INTO co');
$stmt->execute(array(
	':ai' => $article_id,
	':ui' => $user->id,
));

echo json_encode($json = 'Success');