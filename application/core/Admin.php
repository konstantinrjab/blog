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

	public function checkRights() {
		$stmt = $this->pdo->prepare('SELECT user.position FROM user  JOIN password ON user.user_id = password.user_id WHERE login = :lg');
		$stmt->execute(array(
			':lg' => $_SESSION['auth'],
		));
		if ($stmt->fetch(PDO::FETCH_ASSOC)) {
			return true;
		} else {
			return false;

		}
	}

//	public function createArticle($article) {
//		$sql  = 'INSERT INTO article VALUES (title = :title, tag_id = :tag_id, author_id = :ai, date = :d, text = :tx)';
//		$stmt = $this->pdo->prepare($sql);
//		$stmt->execute(array(
//			':title' => $article['title'],
//		));
//	}

	public function updateArticle() {

	}

	public function deleteArticle() {

	}
}