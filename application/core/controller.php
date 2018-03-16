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
		header('Location: http://'.$_SERVER['SERVER_NAME'].'/404');
		return;
	}
}