<?php

class BaseController
{
	public static $userSessionField = 'user';

	protected static function redirect($url)
	{
		header("location: $url");
	}

	public static function ensureSession($field)
	{
		if(!isset($_SESSION[$field])) {
			$_SESSION[$field] = [];
		}
	}

	public static function getVariantsFromCart()
	{
		if(!empty($_SESSION['cart'])){
			$ids = array_keys($_SESSION['cart']);
			
			$variants = VariantRepo::getVariantsForCart($ids);

			foreach ($variants as $variant) {
						
				$variant->amount = $_SESSION['cart'][$variant->variant_id];
			}

			return $variants;
		}
	}
}