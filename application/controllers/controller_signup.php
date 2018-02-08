<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 20:32
 */

class Controller_SignUp extends Controller {
	function __construct($pdo) {
		parent::__construct();
		$this->model = new Model_SignUp($pdo);
		$this->view  = new View();

	}

	function action_index() {
		$error = $this->model->checkError();


		$login_password = $this->model->checkData();

		echo 'SESSION: ';
		print_r($_SESSION);
		echo '  POST: ';
		print_r($_POST);
		echo '  $login_password: ';
		print_r($login_password);
		echo '  $error: ';
		print_r($error);

		$this->view->generate('signup_view.php', 'template_view.php', $error);
	}
}