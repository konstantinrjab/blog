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
		//check tag
		if(!empty($_POST['tag'])){
			$stmt = $this->pdo->prepare('SELECT tag_id FROM tag WHERE tag_name = :tag');
			$stmt->execute(array(
				':tag' => $_POST['tag'],
			));
			if(!empty($stmt->fetch())){
				$tag_id = $stmt->fetch(PDO::FETCH_ASSOC);
				print_r($tag_id);
			} else {
				$tag_id = 0;
			}
		}
		$sql  = 'INSERT INTO article (title, author_id, tag, date, text) VALUES ( :title, :ai, (SELECT tag_id FROM tag WHERE tag_name = :tag), :d, :text)';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(array(
			':title' => $article['title'],
			':text' => $article['text'],
			':tag' => $tag_id,
			':ai' => $author,
			':d' => date('Y-m-d H:i:s'),
		));
	}

	public function updateArticle() {

	}

	public function deleteArticle() {

	}
}