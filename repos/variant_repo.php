<?php

class VariantRepo
{
	public static function getVariantsForCart($ids)
	{
		$len = count($ids);

		if ($len <= 0) {
			return [];
		}

		$query = 'SELECT v.product_id, v.variant_id, v.amount, v.image, v.title AS variant_title, p.title AS product_title, v.price 
				  FROM products AS p
				  JOIN variants AS v ON p.product_id = v.product_id
				  WHERE v.variant_id IN (' .str_repeat("?, ", $len - 1).'?)';
		$stmt = self::conn()->prepare($query);
		$stmt->execute($ids);

		

		return $stmt->fetchAll(PDO::FETCH_CLASS, 'VariantModel');
	}

	public static function createVariant($product_id, $title, $descr, $image = '', $amount, $price)
	{
		$image = ($image == '') ? $image = Utils::placeholder() : $image;
		$stmt = self::conn()->prepare('INSERT INTO variants (product_id, title, description, image, amount, price) VALUES (?, ?, ?, ?, ?, ?)');
		$stmt->execute([$product_id, $title, $descr, $image, $amount, $price]);
	}

	public static function getByProductId($product_id)
	{
		$stmt = self::conn()->prepare('SELECT * FROM variants WHERE product_id = ?');
		$stmt->execute([$product_id]);

		return $stmt->fetchAll(PDO::FETCHCLASS, 'VariantModel');
	}

	protected static function conn()
	{
		return Conn::instance()->getConn();
	}

}