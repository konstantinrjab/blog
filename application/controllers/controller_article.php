<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:32
 */

class Controller_Article extends Controller {
	public $data;

	function __construct($pdo) {
		parent::__construct();
		$this->model = new Model_Article($pdo);
		$this->view  = new View();
	}

	function getArticle($id) {
		$data['article'] = $this->model->get_article($id);
//		print_r($data['article']);
		if ( empty($data['article'])) {
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/404');
			return;
		}
		$data['flash'] = $this->model->checkFlash();
		$this->view->generate('article_view.php', 'template_view.php', $data);
	}

	function action_index() {

	}
}