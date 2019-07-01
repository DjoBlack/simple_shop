<?php

class Utils 
{
	const CHARS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

	public static function placeholder()
	{
		$h = 350 + rand(-5, 5);
		$w = 350 + rand(-5, 5);
		return "https://placedog.net/$h/$w";
	}

	public static function generateSalt() 
	{
		$randString = '';

		for ($i = 0; $i < rand(15, 65); $i++) 
		{
			$randString .= self::CHARS[rand(0, strlen(self::CHARS) - 1)];
		}

		return $randString;
			
	}

	public static function currentSection($r) {
		if($_SERVER['REQUEST_URI'] == $r) { echo 'active'; }
	}
}