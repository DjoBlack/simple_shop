<?php

class UserController extends BaseController
{
	public static function loginForm()
	{
		require_once './view/user/login_form.php';
	}

	public static function registerForm()
	{
		require_once './view/user/register_form.php';
	}

	public static function login()
	{
		$user = UserRepo::getUser($_POST['mail'], $_POST['pass']);


		if($user)
		{
			$_SESSION[self::$userSessionField] = $user;

			self::redirect('/');
		} else {
			self::redirect('/user/login_form');
		}
	}

	public static function register()
	{
		if(UserRepo::getUserByEmail($_POST['mail'])) {
			echo 'user exist!';
		} else {
			UserRepo::createUser($_POST['mail'], $_POST['pass']);
			self::redirect('/user/login_form');
		}
	}

	public static function logout()
	{
		unset($_SESSION[self::$userSessionField]);
		self::redirect('/');
	}
}