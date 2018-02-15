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
		$stmt     = $this->pdo->query('SELECT title, date, text, user.name FROM article 
JOIN tag JOIN user ON article.article_id = tag.article_id AND article.author = user.user_id');
		$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $articles;
	}
}