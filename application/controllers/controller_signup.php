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
//		print_r($_POST);
//		print_r($_SESSION);

		$user  = new User($this->model->pdo);
		if ($this->model->checkInput()) {
//			echo 'register';
			$this->model->register($user);
		}

		$data['flash'] = $this->model->checkFlash();

		var_dump($data);

		$this->view->generate('signup_view.php', 'template_view.php', $data);
	}


}