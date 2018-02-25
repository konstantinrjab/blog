<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 08.02.2018
 * Time: 20:06
 */

class User {
	/**
	 * @var PDO
	 */
	public $pdo;
	public $id;
	public $name;
	public $position;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
		if ($_SESSION['auth']) {
			$this->id       = $_SESSION['user']['id'];
			$this->name     = $_SESSION['user']['name'];
			$this->position = $_SESSION['user']['position'];
		} else {
			$this->name     = 'guest';
			$this->position = 'guest';
		}
	}

	public function signUp($name, $login, $password) {
		$stmt = $this->pdo->prepare('SELECT * FROM user WHERE login = :lg');
		$stmt->execute(array(
			':lg' => $login
		));
		if ($stmt->fetch()) {
			return false;
		} else {
			$sql  = 'INSERT INTO user (name, position, login, password) VALUES (:n, :pos, :l, :p)';
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute(array(
				':l'   => $login,
				':p'   => password_hash($password, PASSWORD_DEFAULT),
				':n'   => $name,
				':pos' => 'user'
			));

			return true;
		}
	}

	public function signIn($login, $password) {
		$stmt = $this->pdo->prepare('SELECT user_id, password, name, position FROM user WHERE login = :lg');
		$stmt->execute(array(
			':lg' => $login,
		));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if (password_verify($password, $result['password'])) {
			$_SESSION['auth']             = true;
			$_SESSION['user']['id']       = $result['user_id'];
			$_SESSION['user']['name']     = $result['name'];
			$_SESSION['user']['position'] = $result['position'];

			return true;
		} else {
			return false;
		}
	}

	public function getUserId() {
		return $this->id;
	}

	public function logOut() {
		unset($_SESSION['auth']);
		unset($_SESSION['user']['name']);
		unset($_SESSION['user']['position']);
		unset($_SESSION['user']['id']);
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	public function like($article_id) {
		$user_id = $this->getUserId();
		if ($user_id) {
			$stmt = $this->pdo->prepare('INSERT INTO likes (article_id, user_id) VALUES (:ai, :ui)');
			$stmt->execute(array(
				':ai' => $article_id,
				':ui' => $user_id
			));
			return true;
		} else {
			return false;
		}
	}

	public function deleteLike($article_id) {
		$user_id = $this->getUserId();
		if ($user_id) {
			$stmt = $this->pdo->prepare('DELETE FROM likes WHERE article_id = :ai AND user_id = :ui');
			$stmt->execute(array(
				':ai' => $article_id,
				':ui' => $user_id
			));
			return true;
		} else {
			return false;
		}
	}
}