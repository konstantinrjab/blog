<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:32
 */

class Controller_Admin extends Controller {
	public $data;

	function __construct($pdo) {
		parent::__construct();
		$this->model = new Model_Admin($pdo);
		$this->view  = new View();

		$user = new Admin($this->model->pdo);
		if(!$user->checkAdmin()){
			$_SESSION['error'] = 'you don\'t have permission';
			header('Location: http://'.$_SERVER['SERVER_NAME']);
		}
	}

	function action_index() {

		$data['articles'] = $this->model->get_articles();
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}

	function action_createArticle(){
		$user = new Admin($this->model->pdo);
		if($article = $this->model->checkArticle()){
			$user->createArticle($article);
			$_SESSION['message'] = 'Successfully added';
			header('Location: admin/');
		}
		$this->view->generate('admin_article.php', 'template_view.php');
	}
}