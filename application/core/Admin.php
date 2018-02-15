<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 08.02.2018
 * Time: 20:06
 */

class Admin extends User {
//	/**
//	 * @var PDO
//	 */
//	public $pdo;

	public function __construct(PDO $pdo) {
		parent::__construct($pdo);
		$this->pdo = $pdo;
	}

	public function checkAdmin() {
		$stmt = $this->pdo->prepare('SELECT user.position FROM user  JOIN password ON user.user_id = password.user_id WHERE login = :lg');
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
		$author = $this->getUserId();
		$sql  = 'INSERT INTO article (title, author_id, date, text) VALUES ( :title, :ai, :d, :text)';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(array(
			':title' => $article['title'],
			':text' => $article['text'],
			':ai' => $author,
			':d' => date('Y-m-d H:i:s'),
		));
	}

	public function updateArticle() {

	}

	public function deleteArticle() {

	}
}