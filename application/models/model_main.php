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
		$this->get_articles();
	}

	public function checkFlash() {
		return parent::checkFlash();
	}

	public function getSidebar($user) {
		if ($_SESSION['auth']) {
			if ($user->position == 'admin') {
				$data['sidebar'] = 'admin';
			} else {
				$data['sidebar'] = 'auth';
			}
			$data['user']['name'] = $user->name;
		} else {
			$data['sidebar'] = false;
		}

		return $data;
	}

	public function checkLogOut($user) {
		if (empty($_POST['logout'])) {
			return false;
		} else {
			$user->logOut();
		}
	}

	public function checkSignIn($user) {
		if (empty($_POST['signin'])) {
			return false;
		}
		if (empty($_POST['login']) || empty($_POST['password'])) {
			$_SESSION['error'] = 'Empty field';
			header('Location: '.$_SERVER['HTTP_REFERER']);
		} else {
			$login    = $_POST['login'];
			$password = $_POST['password'];
			if ( !$user->signIn($login, $password)) {
				$_SESSION['error'] = 'Incorrect login/password';
			}
			header('Location: '.$_SERVER['HTTP_REFERER']);
		}
	}

}
