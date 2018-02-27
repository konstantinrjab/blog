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
		if ( !$_POST['search']) {
			return false;
		}
		if ( !empty(trim($_POST['search-title']))) {
			$search['title'] = $_POST['search-title'];
		}
		if ( !empty(trim($_POST['search-date']))) {
			$search['date'] = $_POST['search-date'];
		}

		return $search;
	}

	public function getArticlesId($search) {
		if ($search['date']) {
			$query = 'date = \''.$search['date'].'\'';
			if ($search['title']) {
				$query .= ' AND ';
			}
		}

		if ($search['title']) {
			$query .= 'title = \''.$search['title'].'\'';
		}
		$query = 'SELECT article_id FROM article WHERE '.$query;
		$stmt = $this->pdo->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
}