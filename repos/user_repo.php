<?php

class UserRepo {

	public static function createUser($mail, $pass, $regType = UserModel::MANUAL)
	{
		$salt = Utils::generateSalt();
		$preparedPassword = self::preparePassword($pass, $salt);

		$create = self::connection()->prepare('INSERT INTO users (email, password, salt, register_type) 
											   VALUES (?, ?, ?, ?)');
		$create->execute([$mail, $preparedPassword, $salt, $regType]);
	}

	public static function autoRegisterUser($email)
	{
		if($user = self::getUserByEmail($email))
		{
			return $user;
		}

		self::createUser($email, self::randPass(), UserModel::ORDER);
		return self::getUserByEmail($email);
	}

	public static function getUser($mail, $pass) 
	{
		$user = self::getUserByEmail($mail);

		if ($user && (self::preparePassword($pass, $user->salt) == $user->password)) 
		{		
			return $user;
		}
		
		return false;
	}

	public static function preparePassword($pass, $salt)
	{
		return hash('sha256', $pass . $salt);
	}

	public static function getUserByEmail($mail)
	{
		$stmt = self::connection()->prepare('SELECT * FROM users WHERE email = ?');
		$stmt->execute([$mail]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'UserModel');
		$user = $stmt->fetch();


		if(is_null($user)){
			return false;
		} else {
			return $user;
		}
	}

	protected static function randPass()
	{
		return Utils::generateSalt();
	}

	private static function connection() 
	{
		return Conn::instance()->getConn();
	}
}
