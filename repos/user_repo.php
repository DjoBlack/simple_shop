<?php

class UserRepo {

	public static function createUser($mail, $pass)
	{
		$salt = Utils::generateSalt();
		$preparedPassword = self::preparePassword($pass, $salt);

		$create = self::connection()->prepare('INSERT INTO users (email, password, salt) 
											   VALUES (?, ?, ?)');
		$create->execute([$mail, $preparedPassword, $salt]);
	}

	public static function getUser($mail, $pass) 
	{
		$user = self::getUserByEmail($mail);

		if ($user && self::preparePassword($pass, $user->salt) == $user->password) 
		{		
			return $user;
		}
		
		return false;
	}

	private static function preparePassword($pass, $salt)
	{
		return hash('sha256', $pass . $salt);
	}

	public static function getUserByEmail($mail)
	{
		$getUserByEmail = self::connection()->prepare('SELECT * FROM users WHERE email = ?');
		$getUserByEmail->execute([$mail]);

		$getUserByEmail->setFetchMode(PDO::FETCH_CLASS, 'UserModel');
		return $getUserByEmail->fetch();
	}

	private static function connection() 
	{
		return Conn::instance()->getConn();
	}
}
