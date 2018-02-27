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
		return parent::checkFlash();
	}

	public function checkInput() {
		if (empty($_POST['submit'])) {
			return false;
		}
		if ( !empty(trim($_POST['name'])) && !empty(trim($_POST['login'])) && !empty($_POST['password'])) {
			return true;
		} else {
			$_SESSION['error'] = 'Empty field';
			header('Location: '.$_SERVER['REQUEST_URI']);
			return false;
		}
	}

	public function register(User $user){
		if ($user->signUp($_POST['name'], $_POST['login'], $_POST['password'])) {
			$_SESSION['message'] = 'Successfully added';
		} else {
			$_SESSION['error'] = 'This login is already in use';
		}
		header('Location: '.$_SERVER['REQUEST_URI']);
	}
}