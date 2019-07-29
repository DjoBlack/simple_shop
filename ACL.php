<?php

class ACL extends BaseController
{
	private $route;
	private $method;
	private $pattern = '/^\/admin/';

	public function __construct($route, $method)
	{
		$this->route = $route;
		$this->method = $method;
	}

	public function check()
	{
		if($this->isPublic())
		{
			return;
		}

		if(empty($_SESSION[BaseController::$userSessionField]))
		{
			BaseController::redirect('/user/login_form');
			exit(401);
		}

		if($_SESSION[BaseController::$userSessionField]->isAdmin())
		{
			return;
		}

		BaseController::redirect('/');
		exit(401);
	}

	private function isPublic()
	{
		return !preg_match($this->pattern, $this->route);
	}

}