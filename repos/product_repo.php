<?php

class ProductRepo 
{
	public static function getProductsById()
	{
		$len = count($ids);
		$query = 'SELECT * FROM products WHERE product_id IN (' .str_repeat("?", $len - 1)).'?)';
		$stmt = self::conn()->prepare($query);
		$stmt->execute($ids);

		return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
	}

	public static function getAll()
	{
		$res = self::conn()->query('SELECT p.product_id, p.title, p.description, v.image 
									FROM products AS p
									LEFT JOIN variants AS v ON p.product_id = v.product_id 
									GROUP BY p.product_id');
		return $res->fetchAll(PDO::FETCH_CLASS, 'ProductModel');
	}

	public static function getProductBaseInfo()
	{
		$res = self::conn()->query('SELECT product_id, title FROM products');
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