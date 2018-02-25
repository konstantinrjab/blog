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
		$this->user = new User($this->model->pdo);

		$data['article'] = $this->model->get_article($id);
		if (empty($data['article'])) {
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/404');

			return;
		}
		$data['flash']    = $this->model->checkFlash();
		$data['article']['liked'] = $this->model->getLikeStatus($data['article']['article_id'], $this->user->id);
		$this->view->generate('article_view.php', 'template_view.php', $data);
	}

	function action_index() {

	}
}