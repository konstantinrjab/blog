<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:32
 */

class Controller_Main extends Controller {
	public $data;

	function __construct($pdo) {
		parent::__construct();
		$this->model = new Model_Main($pdo);
		$this->view  = new View();
	}

	function action_index() {
		$data = $this->model->getSidebar();
		$data['flash']   = $this->model->checkFlash();
		$this->model->checkSignIn();
		$this->model->checkLogOut();

		print_r($_POST);
		print_r($_SESSION);

		echo '$data = ';
		print_r($data);

		$data['articles'] = $this->model->get_articles();
//		unset($_SESSION['login']);
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

}