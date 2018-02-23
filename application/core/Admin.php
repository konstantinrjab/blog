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

		return $this->checkAdmin();
	}

	function checkAdmin() {
		if ( $this->position !== 'admin') {
			unset($this);
			return false;
		} else {
			return true;
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
		$sql  = 'INSERT INTO tag (article_id, tag_id) VALUES ( :ai, :ti)';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(array(
			':ai' => $id,
			':ti' => $tag_id
		));
	}

	public function updateArticle() {

	}

	public function deleteArticle($id) {
		$stmt = $this->pdo->prepare('DELETE FROM article WHERE article_id = :ai');
		$stmt->execute(array(
			':ai' => $id,
		));
		return true;
	}
}