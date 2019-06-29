<?php

class Utils 
{
	public static function placeholder()
	{
		$h = 350 + rand(-5, 5);
		$w = 350 + rand(-5, 5);
		return "https://placedog.net/$h/$w";
	}
}