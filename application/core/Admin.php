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
		$sql    = 'INSERT INTO article (title, text, author, date) VALUES ( :title, :text, :au, :d)';
		$stmt   = $this->pdo->prepare($sql);
		$stmt->execute(array(
			':title' => $article['title'],
			':text'  => $article['text'],
			':au'    => $author,
			':d'     => date('Y-m-d H:i:s'),
		));

		//add tags
//		print_r($article);
		$article_id = $this->pdo->lastInsertId();
		foreach ($article['tags'] as $tag) {
			$this->addTag($article_id, $tag);
		}
	}

	public function addTag($id, $tag) {
		$stmt = $this->pdo->prepare('SELECT tag_id FROM tag_name WHERE tag_name = :tag');
		$stmt->execute(array(
			':tag' => $tag
		));
		$tag_id = $stmt->fetch(PDO::FETCH_ASSOC);
		$tag_id = $tag_id['tag_id'];


		if ( !$tag_id) {
			$stmt = $this->pdo->prepare('INSERT INTO tag_name(tag_name) VALUES( :tag)');
			$stmt->execute(array(
				':tag' => $tag
			));
			$tag_id = $this->pdo->lastInsertId();
		}
//		echo 'tag id: ';
//		var_dump($tag_id);
		$sql  = 'INSERT INTO tag (article_id, tag_id) VALUES ( :ai, :ti)';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(array(
			':ai' => $id,
			':ti' => $tag_id
		));
	}

	public function updateArticle() {

	}

	public function deleteArticle() {

	}
}