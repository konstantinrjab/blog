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

	public function checkError() {
		if (isset($_SESSION['error'])) {
			$error = $_SESSION['error'];
			unset($_SESSION['error']);
			return $error;
		} else {
			return false;
		}
	}

	public function checkData() {
		$login_password[] = false;
		if ( !empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password'])) {
			$data = [
				'name'     => $_POST['name'],
				'login'    => $_POST['login'],
				'password' => $_POST['password']
			];
			return $data;

		} elseif (isset($_POST['login']) || isset($_POST['password']) || isset($_POST['name'])) {
			$_SESSION['error'] = 'Fill in all the fields';
			header('Location: /signup');
			return;
		}
	}
}