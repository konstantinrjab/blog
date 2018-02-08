<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:32
 */

class Controller_Main extends Controller {
	function __construct($pdo) {
		parent::__construct($pdo);
		$this->model = new Model_Main($pdo);
		$this->view  = new View();
	}

	function action_index() {
		$articles = $this->model->get_articles();
		$this->view->generate('main_view.php', 'template_view.php', $articles);
	}
}