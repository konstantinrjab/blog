<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:45
 */

class Model_Article extends Model {


	public function __construct($pdo) {
		parent::__construct($pdo);
	}

	public function get_article($id) {
		return parent::get_article($id);
	}

	public function checkFlash() {
		if ( !empty($_SESSION['error'])) {
			$data['error'] = $_SESSION['error'];
			unset($_SESSION['error']);
		} elseif ( !empty($_SESSION['message'])) {
			$data['message'] = $_SESSION['message'];
			unset($_SESSION['message']);
		} else {
			return false;
		}

		return $data;
	}
}