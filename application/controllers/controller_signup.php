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
		$data = $this->model->checkData();
		$error = $this->model->checkError();
		if($data){
			$user = new User($this->model->pdo);
			$user->signUp($data['name'], $data['login'], $data['password']);
		}
		$data['error'] = $error;

		echo 'SESSION: ';
		print_r($_SESSION);
		echo '  POST: ';
		print_r($_POST);
		echo '  $data: ';
		print_r($data);

		$this->view->generate('signup_view.php', 'template_view.php', $data);
	}
}