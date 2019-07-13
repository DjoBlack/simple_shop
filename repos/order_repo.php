<?php

class OrderRepo
{
	public static function create($userId, $address, $totalCost)
	{
		$stmt = self::conn()->prepare('INSERT INTO orders (user_id, address, total_cost) 
									   VALUES (?, ?, ?)');

		$stmt->execute([$userId, $address, $totalCost]);
		return self::conn()->lastInsertId();
	}

	public static function createLineItem($orderId, $variant)
	{
		$stmt  = self::conn()->prepare('INSERT INTO orders_variants (order_id, variant_id, amount, price) 	
										VALUES (?, ?, ?, ?)');

		$stmt->execute([$orderId, $variant->variant_id, $variant->amount, $variant->price]);
	}

	public static function getAll() 
	{
		$stmt = self::conn()->query('SELECT * FROM orders');
		return $stmt->fetchAll(PDO::FETCH_CLASS, 'OrderModel');
	}

	public static function getOrderByOrderId($orderId)
	{
		$stmt = self::conn()->prepare('SELECT o.order_id, u.email, o.status, o.total_cost, o.address
									   FROM orders AS o
									   JOIN users AS u ON o.user_id = u.user_id
									   WHERE o.order_id = ?');
		// $stmt->execute([$orderId]);

		// return $stmt->fetchAll(PDO::FETCH_CLASS, 'OrderModel');

		$stmt->execute([$orderId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'OrderModel');
		return $stmt->fetch();
	}

	public static function getOrderDetailsByOrderId($orderId)
	{
		$stmt = self::conn()->prepare('SELECT p.title AS product_title, v.title AS variant_title, ov.amount, ov.price
									   FROM orders_variants AS ov
									   JOIN variants AS v ON ov.variant_id = v.variant_id
									   JOIN products AS p ON v.product_id = p.product_id
									   WHERE ov.order_id = ?');
		$stmt->execute([$orderId]);

		return $stmt->fetchAll(PDO::FETCH_CLASS, 'ListItemsModel');
	}

	protected static function conn()
	{
		return Conn::instance()->getConn();
	}
}