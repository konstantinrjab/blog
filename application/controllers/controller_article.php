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
		if ( !array_shift($data['article'])) {
//			$_SESSION['error'] = 'Article not found';
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/404');
			exit();
		}
		$data['flash'] = $this->model->checkFlash();
		$this->view->generate('article_view.php', 'template_view.php', $data);

	}

	function deleteArticle(){
		$user = new Admin($this->model->pdo);
		$user->checkAdmin();
		if(is_numeric($_GET['id'])){

		}
	}
	function action_index() {

	}


}