<?php

class CartController extends BaseController
{
	public static function index()
	{
		$ids = array_keys($_SESSION['cart']);
		$products = ProductRepo::getProductsById($id);
		require_once './view/cart.php';
	}
}