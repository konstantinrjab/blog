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
		return parent::getArticlesByPage(1,999);
	}

	public function checkArticle() {

		//check text
		if (empty(trim($_POST['title'])) || empty(trim($_POST['text']))) {
			return false;
		} else {
			$article['title'] = $_POST['title'];
			$article['text']  = $_POST['text'];
			$article['tags']  = preg_split("/[\s,;]+/", $_POST['tag']);
			//очистка от пустых значений
			$article['tags'] = array_diff($article['tags'], array(''));


			return $article;
		}
	}
}