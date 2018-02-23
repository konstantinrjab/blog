<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:45
 */

class Model_Admin extends Model {


	public function __construct($pdo) {
		parent::__construct($pdo);
	}

	public function get_articles() {
		return parent::get_articles();
	}

	public function checkArticle() {
		if (empty(trim($_POST['title'])) || empty(trim($_POST['text']))) {
			return false;
		} else {
			$article['title'] = $_POST['title'];
			$article['text']  = $_POST['text'];
//			$article['tags']  = explode(',', $_POST['tag']);
			$article['tags']  = preg_split("/[\s,;]+/", $_POST['tag']);

			return $article;
		}
	}

//	public function updateArticle() {
//		if ($this->user->updateArticle($id, $title, $tag, $text)) {
//			$_SESSION['message'] = 'Successfully deleted';
//		} else {
//			$_SESSION['error'] = 'Cant delete article '.$id;
//		}
//	}
}