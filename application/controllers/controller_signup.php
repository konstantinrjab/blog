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
		$data['flash'] = $this->model->checkFlash();


		$user  = new User($this->model->pdo);
		if ($this->model->checkInput()) {
			$this->model->register($user);
		}

		ob_start();
		$this->view->generate('signup_view.php', 'template_view.php', $data);
		if($data['flash']['message']){
			header('refresh:3;url= http://'.$_SERVER['SERVER_NAME']);
			ob_end_flush();
		}
	}


}