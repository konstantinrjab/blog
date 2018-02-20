<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 08.02.2018
 * Time: 20:06
 */

class Admin extends User {

	public function __construct(PDO $pdo) {
		parent::__construct($pdo);
		$this->pdo = $pdo;
	}

	public function checkAdmin() {
		$stmt = $this->pdo->prepare('SELECT user.position FROM user WHERE login = :lg');
		$stmt->execute(array(
			':lg' => $_SESSION['auth'],
		));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result['position'] == 'admin') {
			return true;
		} else {
			return false;
		}
	}

	public function createArticle($article) {
		$author = parent::getUserId();
//		print_r(date('Y-m-d H:i:s'));
		//check tag
//		if(!empty($_POST['tag'])){
//			$stmt = $this->pdo->prepare('SELECT tag_id FROM tag_name WHERE tag_name = :tag');
//			$stmt->execute(array(
//				':tag' => $_POST['tag'],
//			));
//			if(!empty($stmt->fetch())){
//				$tag_id = $stmt->fetch(PDO::FETCH_ASSOC);
//				print_r($tag_id);
//			} else {
//				$tag_id = 0;
//			}
//		}
		echo $author;
		$sql  = 'INSERT INTO article (title, text, author, date) VALUES ( :title, :text, :au, :d)';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(array(
			':title' => $article['title'],
			':text'  => $article['text'],
			':au'    => $author,
			':d'     => date('Y-m-d H:i:s'),
		));

		//add tags
		$article_id = $this->pdo->lastInsertId();
		$tags       = [
			'test',
			'firstTag'
		];
		foreach ($tags as $tag) {
			$sql  = 'INSERT INTO tag (article_id, tag_id) VALUES ( :ai, :ti)';
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute(array(
				':ai' => $article_id,
				':ti' => $tag
			));
		}
	}

	public function updateArticle() {

	}

	public function deleteArticle() {

	}
}