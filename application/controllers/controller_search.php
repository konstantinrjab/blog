<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 26.02.2018
 * Time: 13:27
 */

class Controller_Search extends Controller {

	function __construct($pdo) {
		parent::__construct();
		$this->model = new Model_Search($pdo);
		$this->view  = new View();
	}

	function action_index() {
		$data  = $this->model->checkData();
		if ($data) {
			$this->model->get_articles($data);
		}

		$data['flash'] = $this->model->checkFlash();

		$this->view->generate('signup_view.php', 'template_view.php', $data);
	}
}