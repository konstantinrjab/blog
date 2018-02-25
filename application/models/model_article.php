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
		return parent::checkFlash();
	}
}