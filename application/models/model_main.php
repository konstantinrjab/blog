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

	public function checkFlash() {
		if ( !empty($_SESSION['error'])) {
			$data['error'] = $_SESSION['error'];
			unset($_SESSION['error']);
		} elseif ( !empty($_SESSION['message'])) {
			$data['message'] = $_SESSION['message'];
			unset($_SESSION['message']);
		} else {
			return false;
		}

		return $data;
	}

	public function getSidebar() {
		if ($_SESSION['auth']) {
			$data['sidebar']      = 'auth';
			$data['user']['name'] = $_SESSION['auth'];
		}

		return $data;
	}

	public function checkLogOut() {
		if (empty($_POST['logout'])) {
			return false;
		} else {
			$user = new User($this->pdo);
			$user->logOut();
		}
	}

	public function checkSignIn() {
		if (empty($_POST['signin'])) {
			return false;
		}
		if (empty($_POST['login']) || empty($_POST['password'])) {
			$_SESSION['error'] = 'Empty field';
			header('Location: http://blog-route/');
		} else {
			$this->signIn($_POST['login'], $_POST['password']);
		}
	}

	public function signIn($login, $password) {

		$user = new User($this->pdo);
		if ($user->signIn($login, $password)) {
			$_SESSION['auth'] = $login;
		} else {
			$_SESSION['error'] = 'Incorrect login/password';
		}
		header('Location: http://blog-route/');
	}


	public function get_articles() {
		$stmt     = $this->pdo->query('SELECT title, date, text, user.name FROM article 
JOIN tag JOIN user ON article.tag_id = tag.tag_id AND article.author_id = user.user_id');
		$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $articles;
	}
}