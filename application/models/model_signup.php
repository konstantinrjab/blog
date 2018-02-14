<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 20:26
 */

class Model_SignUp extends Model {

	public function __construct($pdo) {
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
		if ( !empty(trim($_POST['name'])) && !empty(trim($_POST['login'])) && !empty($_POST['password'])) {
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

	public function register($data){
		$user = new User($this->pdo);
		if ($user->signUp($data['name'], $data['login'], $data['password'])) {
			$_SESSION['message'] = 'Successfully added';
		} else {
			$_SESSION['error'] = 'This login is already in use';
		}
		header('Location: /signup');
	}
}