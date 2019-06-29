<?php

class ProductController extends BaseController
{
	public static function createForm() 
	{
		require_once './view/admin/product_form.php';
	}

	public static function create()
	{
		ProductRepo::createProduct($_POST['title'], $_POST['descr']);
		self::redirect('/');
	}
}