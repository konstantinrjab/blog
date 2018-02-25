<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:30
 */

class Model {
	/**
	 * @var PDO $pdo
	 */
	public $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function checkFlash() {
		if ( !empty($_SESSION['error'])) {
			$flash['error'] = $_SESSION['error'];
			unset($_SESSION['error']);
		}
		if ( !empty($_SESSION['message'])) {
			$flash['message'] = $_SESSION['message'];
			unset($_SESSION['message']);
		}
		if ($flash) {
			return $flash;
		} else {
			return false;
		}
	}

	public
	function get_articles() {
		$stmt     = $this->pdo->query('SELECT article.article_id, article.title, article.date, article.text, user.name FROM article JOIN user ON article.author = user.user_id');
		$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($articles as &$article) {
			$stmt = $this->pdo->prepare('SELECT tag_name.tag_name FROM tag JOIN tag_name ON tag.tag_id = tag_name.tag_id WHERE article_id = :ai');
			$stmt->execute(array(
				':ai' => $article['article_id']
			));
			$article['tag'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $articles;
	}

	public function get_article($id) {
		$stmt = $this->pdo->prepare('SELECT article.article_id, article.title, article.date, article.text, user.name FROM article JOIN user ON article.author = user.user_id WHERE article.article_id = :id');
		$stmt->execute(array(
			':id' => $id
		));
		$article       = $stmt->fetch(PDO::FETCH_ASSOC);
//		$article['id'] = $id;

		print_r($article);
		$stmt = $this->pdo->prepare('SELECT tag_name.tag_name FROM tag_name JOIN tag ON tag_name.tag_id = tag.tag_id WHERE article_id = :ai');
		$stmt->execute(array(
			':ai' => $article['article_id']
		));
		$article['tag'] = $stmt->fetchAll(PDO::FETCH_COLUMN);

		return $article;
	}
}