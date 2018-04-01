<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:31
 */

class Controller {

	public $model;
	public $view;

	function __construct()
	{
		$this->view = new View();
	}

	function redirect_404()
	{
		Route::ErrorPage404();
		return;
	}
}