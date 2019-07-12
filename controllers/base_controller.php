<?php

class BaseController
{
	public static $userSessionField = 'user';

	protected static function redirect($url)
	{
		header("location: $url");
	}

	public static function ensureSession($field)
	{
		if(!isset($_SESSION[$field])) {
			$_SESSION[$field] = [];
		}
	}
}