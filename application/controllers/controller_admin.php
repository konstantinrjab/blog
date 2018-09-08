<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:32
 */

class Controller_Admin extends Controller {
	public $data;
	public $user;

	function __construct($pdo) {
		parent::__construct();
		$this->model = new Model_Admin($pdo);
		$this->view  = new View();

		$this->user = new Admin($this->model->pdo);
		if ( !$this->user->checkAdmin()) {
			$_SESSION['error'] = 'you don\'t have permission';
			header('Location: http://'.$_SERVER['SERVER_NAME'].$GLOBALS['PATH_TO_ROOT_Directory_Project']);
		}
	}

	function action_index() {
		$data['flash']    = $this->model->checkFlash();
		$data['articles'] = $this->model->get_articles();
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}

	function action_createArticle() {
		$user = new Admin($this->model->pdo);
		if ($article = $this->model->checkArticle()) {
			$user->createArticle($article);
			$_SESSION['message'] = 'Successfully added';
			header('Location: http://'.$_SERVER['SERVER_NAME'].$GLOBALS['PATH_TO_ROOT_Directory_Project'].'/admin');
		}

		$this->view->generate('admin_article.php', 'template_view.php');
	}

	function action_deleteArticle() {
		$id = $_GET['id'];
		if ($this->user->deleteArticle($id)) {
			$_SESSION['message'] = 'Successfully deleted';
		} else {
			$_SESSION['error'] = 'Cant delete article '.$id;
		}
		header('Location: http://'.$_SERVER['SERVER_NAME'].$GLOBALS['PATH_TO_ROOT_Directory_Project'].'/admin');
	}

	function action_updateArticle() {
		$id = $_GET['id'];

		if (isset($_POST['submit'])) {
			if(isset($_POST['image']) && !empty($_POST['image'])){
				$this->user->deleteImage($_POST['image']);
			}
			$article = $this->model->checkArticle();
			if($this->user->updateArticle($id, $article)){
				$_SESSION['message'] = 'Successfully updated';
			}
			header('Location: http://'.$_SERVER['SERVER_NAME'].$GLOBALS['PATH_TO_ROOT_Directory_Project'].'/admin/updateArticle/?id='.$id);

			return;
		}
		$data['article'] = $this->model->get_article($id);
		$data['flash']   = $this->model->checkFlash();

		$this->view->generate('admin_article.php', 'template_view.php', $data);
	}
}