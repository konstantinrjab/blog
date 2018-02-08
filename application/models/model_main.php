<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:45
 */

class Model_Main extends Model {

	public function __construct($pdo) {
		parent::__construct($pdo);
	}

	public function get_articles() {
		$stmt     = $this->pdo->query( 'SELECT title, date, text, user.name FROM article 
JOIN tag JOIN user ON article.tag_id = tag.tag_id AND article.author_id = user.user_id' );
		$articles = $stmt->fetchAll( PDO::FETCH_ASSOC );

		return $articles;
	}
}