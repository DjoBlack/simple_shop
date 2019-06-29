<?php

class ProductRepo 
{
	public static function getAll()
	{
		$res = self::conn()->query('SELECT p.id, p.title, p.description, v.image 
									FROM products AS p
									LEFT JOIN variants AS v ON p.id = v.product_id 
									GROUP BY p.id');
		return $res->fetchAll(PDO::FETCH_CLASS, 'ProductModel');
	}

	public static function getProductBaseInfo()
	{
		$res = self::conn()->query('SELECT id, title FROM products');
		return $res->fetchAll(PDO::FETCH_CLASS, 'ProductModel');
	}

	public static function createProduct($title, $descr)
	{
		$stmt = self::conn()->prepare('INSERT INTO products (title, description) VALUES (?, ?)');
		$stmt->execute([$title, $descr]);
	}

	protected static function conn()
	{
		return Conn::instance()->getConn();
	}
}