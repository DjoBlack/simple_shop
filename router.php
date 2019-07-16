<?php

class Router 
{
	private $r;
	private $method;

	private $routes = [
		'GET' => [],
		'POST' => []
	]; 

	public function __construct()
	{
		$this->r = explode('?', $_SERVER['REQUEST_URI'])[0];
		$this->method = $_SERVER['REQUEST_METHOD'];
	}

	public function currentRoute()
	{
		return $this->r;
	}

	public function currentMethod()
	{
		return $this->method;
	}

	public function register($httpVerb, $path, $handler)
	{
		$this->routes[$httpVerb][$path] = $handler;
	}

	public function serve()
	{
		if (isset($this->routes[$this->method][$this->r])) 
		{
			$this->routes[$this->method][$this->r]();
			return;
		}

		echo '404 not found';
	}
}