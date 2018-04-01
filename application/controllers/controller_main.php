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

	function page($page) {
		$this->user    = new User($this->model->pdo);

		$data          = $this->model->getSidebar($this->user);
		$data['flash'] = $this->model->checkFlash();
		$this->model->checkSignIn($this->user);
		$this->model->checkLogOut($this->user);

		$num_on_page = 3;
		$data['articles'] = $this->model->getArticlesByPage($page, $num_on_page);
		if (empty($data['articles'])) {
			$this->redirect_404();
		}
		$data['pagination'] = $this->model->getPagination($page, $num_on_page);
		foreach ($data['articles'] as &$article) {
			$article['liked'] = $this->model->getLikeStatus($article['article_id'], $this->user->id);
		}

		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}