<?php

class OrderController extends BaseController
{
	public static function orderForm()
	{
		require_once './view/orders/order_form.php';
	}

	public static function orderCreate()
	{
		if(empty($_SESSION[BaseController::$userSessionField])){
			$email = $_POST['email'];
			$user = UserRepo::autoRegisterUser($email);
		} else {
			$user = $_SESSION[BaseController::$userSessionField];
		}
	
		$address = $_POST['address'];
		$variants = self::getVariantsFromCart();

		$totalCost = 0;

		foreach($variants as $variant) 
		{
			$totalCost += $variant->price * $variant->amount;
		}

		$orderId = OrderRepo::create($user->user_id, $address, $totalCost);

		foreach ($variants as $variant)
		{
			OrderRepo::createLineItem($orderId, $variant);
		}

		unset($_SESSION['cart']);
		self::redirect('order/complete?order_id='. $orderId);
	}

	public static function orderComplete()
	{
		$orderId = $_GET['order_id'];
		require_once './view/orders/complete_order_view.php';
	}
}