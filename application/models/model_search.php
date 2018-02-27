<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 20:26
 */

class Model_Search extends Model {

	public function __construct($pdo) {
		parent::__construct($pdo);
	}

	public function checkFlash() {
		return parent::checkFlash();
	}

	public function checkData() {
		if ( !$_GET['search']) {
			return false;
		}
		if ( !empty(trim($_GET['search-title']))) {
			$search['title'] = $_GET['search-title'];
		}
		if ( !empty(trim($_GET['search-date']))) {
			$search['date'] = $_GET['search-date'];
		}
//		unset($_GET);

		return $search;
	}

	public function getSearchArticle($search) {
		if ($search['date']) {
			$date = $search['date'];
		} else {
			$date = 1;
		}

		if ($search['title']) {
			$title = $search['title'];
		} else {
			$title = 1;
		}
		$stmt = $this->pdo->prepare('SELECT article_id FROM article WHERE date = :d AND title = :t');
		$stmt->execute(array(
			':d' => $date,
			':t' => $title,
		));
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		print_r($result);

		return $result;
	}
}