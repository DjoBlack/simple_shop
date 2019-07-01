<?php

class VariantRepo
{
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