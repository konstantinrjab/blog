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
		} else {
			$error = false;
		}

		return $error;
	}

	public function checkData() {
		$login_password[] = false;

		if ( !empty($_POST['login']) && !empty($_POST['password'])) {
			$login_password = [
				'login'    => $_POST['login'],
				'password' => $_POST['password']
			];

		} elseif (isset($_POST['login']) || isset($_POST['password'])) {
			$_SESSION['error'] = 'no login/passw';
			header('Location: ');

			return;
		}

		return $login_password;
	}
}