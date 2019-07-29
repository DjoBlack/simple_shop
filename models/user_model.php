<?php

class UserModel 
{
	const MANUAL = 0;
	const ORDER = 1;

	public function registerType()
	{
		$type = '';

		switch ($this->register_type) {
			case MANUAL:
				$type = 'manual';
				break;
			
			case ORDER:
				$type='after order';
				break;

			default:
				$type = 'unknown';
				break;
		}
	}

	public function isAdmin()
	{
		// return strpos($this->email, 'admin') !== false;
		return $this->is_admin;
	}
}