<?php

class VariantController extends BaseController
{
	public static function createForm()
	{
		$products = ProductRepo::getProductBaseInfo();
		require_once './view/admin/variant_form.php';
	}

	public static function create()
	{
		VariantRepo::createVariant($_POST['product_id'], 
									   $_POST['title'], 
									   $_POST['descr'], 
									   $_POST['image'], 
									   $_POST['amount'], 
									   $_POST['price']);
		self::redirect('/');
	}
}