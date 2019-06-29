<?php

class BaseController
{
	protected static function redirect($url)
	{
		header("location: $url");
	}
}