<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 20:26
 */

class Model_SignUp extends Model {

	public function __construct($pdo) {
		session_start();
		parent::__construct($pdo);
	}

	public function checkFlash() {
		if ( !empty($_SESSION['error']) || !empty($_SESSION['message'])) {
			$flash['error'] = $_SESSION['error'];
			unset($_SESSION['error']);

			$flash['message'] = $_SESSION['message'];
			unset($_SESSION['message']);

			return $flash;
		} else {
			return false;
		}
	}

	public function checkData() {
		if (empty($_POST)) {
			return false;
		}
		if ( !empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password'])) {
			$data = [
				'name'     => $_POST['name'],
				'login'    => $_POST['login'],
				'password' => $_POST['password']
			];
		} else {
			$data              = false;
			$_SESSION['error'] = 'Empty field';
			header('Location: /signup');
		}

		return $data;
	}

	public function signIn($data){
		$user = new User($this->pdo);
		if ($user->signIn($data['login'], $data['password'])) {
			header('Location: /');
		} else {
			$_SESSION['error'] = 'Incorrect login/password';
		}
		header('Location: /signin');
	}
}