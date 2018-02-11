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
		$flash = $this->model->checkFlash();
		$data  = $this->model->checkData();
		if ($data) {
			$this->model->signIn($data);
		}

		if (isset($flash)) {
			$data['error']   = $flash['error'];
			$data['message'] = $flash['message'];
		}

		$this->view->generate('signup_view.php', 'template_view.php', $data);
	}
}