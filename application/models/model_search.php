<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 20:26
 */

class Model_Search extends Model {

	public function __construct($pdo) {
		parent::__construct($pdo);
	}

	public function checkFlash() {
		return parent::checkFlash();
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
}