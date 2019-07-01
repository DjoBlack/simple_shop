<?php

class BaseController
{
	public static $userSessionField = 'user';

	protected static function redirect($url)
	{
		header("location: $url");
	}

	// protected static function ensureUserSession($field)
	// {
	// 	if(!isset($_SESSION['field'])) {
	// 		$_SESSION['field'] = [];
	// 	}
	// }
}