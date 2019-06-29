<?php

class MainController extends BaseController
{
	public static function index()
	{
		$products = ProductRepo::getAll();
		require_once './view/index_view.php';
	}

	public static function about_us()
	{
		require_once './view/about_view.php';
	}

	public static function features()
	{
		require_once './view/features_view.php';
	} 
}