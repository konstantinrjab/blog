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

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

	public function signUp($name, $login, $password) {
		$stmt = $this->pdo->prepare('SELECT * FROM password WHERE login = :lg');
		$stmt->execute(array(
			':lg' => $login
		));
		if ($stmt->fetch()) {
			return false;
		} else {
			$sql  = 'INSERT INTO user (name, position) VALUES (:n, :pos)';
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute(array(
				':n'   => $name,
				':pos' => 'user'
			));
			$user_id = $this->pdo->lastInsertId();
			$sql     = 'INSERT INTO password (user_id, login, password) VALUES (:ui, :l, :p)';
			$stmt    = $this->pdo->prepare($sql);
			$stmt->execute(array(
				':ui' => $user_id,
				':l'  => $login,
				':p'  => password_hash($password, PASSWORD_DEFAULT)
			));

			return true;
		}
	}

	public function signIn($login, $password) {
		$stmt = $this->pdo->prepare('SELECT user_id, password FROM password WHERE login = :lg');
		$stmt->execute(array(
			':lg' => $login,
		));
		$user_data = $stmt->fetch(PDO::FETCH_ASSOC);

		if (password_verify($password, $user_data['password'])) {
			return true;
		} else {
			return false;
		}
	}

	public function getUserId() {
		if ($_SESSION['auth']) {
			$stmt = $this->pdo->prepare('SELECT user.user_id FROM user  JOIN password ON user.user_id = password.user_id');
			$stmt->execute(array(
				':lg' => $_SESSION['auth'],
			));
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result['user_id'];
		} else {
			return false;
		}
	}

	public function logOut() {
		unset($_SESSION['auth']);
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
}