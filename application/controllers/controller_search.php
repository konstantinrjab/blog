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
		$search = $this->model->checkData();
		if ($search) {
			$articles_id = $this->model->getArticlesId($search);
			echo '<pre>';
			print_r($articles_id);
			echo '</pre>';
//			echo $articles_id[''];
			foreach ($articles_id as $id) {
				print_r($id['article_id']);

				$data['articles'][] = $this->model->get_article($id['article_id']);
			}
		}
		echo '<pre>';
		print_r($data['articles']);
		echo '</pre>';
		$data['flash'] = $this->model->checkFlash();

		$this->view->generate('search_view.php', 'template_view.php', $data);
	}
}