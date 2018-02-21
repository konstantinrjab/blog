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

	public function get_articles() {
//		$stmt     = $this->pdo->query('SELECT article.title, article.date, article.text, user.name, tag_name.tag_name FROM article JOIN user on article.author = user.user_id JOIN tag ON article.article_id = tag.article_id JOIN tag_name ON tag.tag_id = tag_name.tag_id');
		$stmt     = $this->pdo->query('SELECT article.article_id, article.title, article.date, article.text, user.name FROM article JOIN user ON article.author = user.user_id');
		$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($articles as &$article) {
			$stmt           = $this->pdo->prepare('SELECT tag_name.tag_name FROM tag JOIN tag_name ON tag.tag_id = tag_name.tag_id WHERE article_id = :ai');
			$stmt->execute(array(
				':ai' => $article['article_id']
			));
//			print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
			$article['tag'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		print_r($articles);
//		$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $articles;
	}
}