<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:32
 */

class Controller_Main extends Controller {
	public $data;
	public $user;

	function __construct($pdo) {
		parent::__construct();
		$this->model = new Model_Main($pdo);
		$this->view  = new View();
	}

	function action_index() {
		$this->user = new User($this->model->pdo);
		$data          = $this->model->getSidebar($this->user);
		$data['flash'] = $this->model->checkFlash();
		$this->model->checkSignIn($this->user);
		$this->model->checkLogOut($this->user);

		$data['articles'] = $this->model->get_articles();
		foreach ($data['articles'] as &$article) {
			$article['liked'] = $this->model->getLikeStatus($article['article_id'], $this->user->id);
		}
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}