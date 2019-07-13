<?php

class CartController extends BaseController
{
	public static function index()
	{
		$variants = self::getVariantsFromCart();

		require_once './view/cart_view.php';
	}

	public static function addToCart()
	{
		$variantId = $_POST['variant_id'];

		if(!isset($_SESSION['cart'][$variantId])){
			$_SESSION['cart'][$variantId] = 0;
		}

		$_SESSION['cart'][$variantId] += 1;
		

		// self::redirect('/cart');

		echo json_encode([
			'variant_id' => $variantId,
			'amount' => $_SESSION['cart'][$variantId]
		]);
	}

	public static function substractFromCart()
	{
		$variantId = $_POST['variant_id'];

		if(!isset($_SESSION['cart'][$variantId])){
			self::redirect('/cart');
			return;
		}

		$_SESSION['cart'][$variantId] -= 1;

		if($_SESSION['cart'][$variantId] == 0){
			unset($_SESSION['cart'][$variantId]);
		}

		// self::redirect('/cart');

		echo json_encode([
			'variant_id' => $variantId,
			'amount' => $_SESSION['cart'][$variantId]
		]);
	}

	public static function removeFromCart()
	{
		unset($_SESSION['cart']);
		self::redirect('/cart');
	}
}