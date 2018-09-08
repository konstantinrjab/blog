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
		$search[] = '';
		if (isset($_GET['tag']) && !empty(trim($_GET['tag']))) {
			$search['tag'] = $_GET['tag'];
		}
		if (isset($_POST['search-title']) && !empty(trim($_POST['search-title']))) {
			$search['title'] = $_POST['search-title'];
		}
		if (isset($_POST['search-date']) && !empty(trim($_POST['search-date']))) {
			$search['date'] = $_POST['search-date'];
		}

		return $search;
	}

	public function getArticlesId($search) {
		$query = 'SELECT article_id FROM article WHERE ';
		if (isset($search['date'])) {
			$query .= 'date = \''.$search['date'].'\'';
			if ( !empty($search['title'])) {
				$query .= ' AND ';
			}
		}
		if (isset($search['title']) && !empty($search['title'])) {
			$query .= 'title LIKE \'%'.$search['title'].'%\'';
		}
		if (isset($search['tag']) && !empty($search['tag'])) {
			$query = 'SELECT tag.article_id FROM tag JOIN tag_name ON tag.tag_id = tag_name.tag_id WHERE tag_name.tag_name = \''.$search['tag'].'\'';
		}

		$stmt = $this->pdo->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
}