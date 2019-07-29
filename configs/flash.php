<?php

class Flash 
{
	public static function addFlashMsg($msg)
	{
		$_SESSION['flash'][] = $msg;
	}

	public static function getFlashMsg()
	{
		$messages = $_SESSION['flash'];
		unset($_SESSION['flash']);

		return $messages;
	}
}