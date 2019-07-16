<?php

class ACL
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
			echo 'Please Login!';
			exit(401);
		}

		if($_SESSION[BaseController::$userSessionField]->isAdmin())
		{
			return;
		}

		echo 'Access denied';
		exit(401);
	}

	private function isPublic()
	{
		return !preg_match($this->pattern, $this->route);
	}

}