<?php

class UserModel 
{
	public function isAdmin()
	{
		// return strpos($this->email, 'admin') !== false;
		return $this->is_admin;
	}
}