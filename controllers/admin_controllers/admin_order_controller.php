<?php

class AdminOrderController extends BaseController
{
	public static function getOrders()
	{
		$orders = OrderRepo::getAll();
		require_once './view/admin/orders_list.php';
	}

	public static function orderDetails() 
	{
		$orderId = $_GET['order_id'];

		$order = OrderRepo::getOrderByOrderId($orderId);
		$lineItems = OrderRepo::getOrderDetailsByOrderId($orderId);

		require_once './view/admin/order_details.php';
	}
}