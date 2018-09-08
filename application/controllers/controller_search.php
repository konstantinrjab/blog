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
		$_SESSION['error'] = 'Insert search parameters';
		header('Location: http://'.$_SERVER['SERVER_NAME']);
	}

	function action_article() {
		$this->user    = new User($this->model->pdo);
		$search = $this->model->checkData();
		if (!empty($search)) {
			$articles_id = $this->model->getArticlesId($search);
			foreach ($articles_id as $id) {
				$data['articles'][] = $this->model->get_article($id['article_id']);
			}
		}
		$data['flash'] = $this->model->checkFlash();
		if(isset($data['articles'])){
			foreach ($data['articles'] as &$article) {
				$article['liked'] = $this->model->getLikeStatus($article['article_id'], $this->user->id);
			}
		}

		$this->view->generate('search_view.php', 'template_view.php', $data);
	}
}