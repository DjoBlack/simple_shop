<?php

class OrderModel 
{
	const NEW_ORDER = 0;
	const PROCESSED = 1;
	const IN_DELIVERY = 2;
	const DONE = 3;
	const CANCELLED = 4;

	public function status()
	{
		$status = '';

		switch ($this->status) {
			case self::NEW_ORDER:
				$status = 'new order';
				break;

			case self::PROCESSED:
				$status = 'in process';
				break;
			
			case self::IN_DELIVERY:
				$status = 'delivering';
				break;

			case self::DONE:
				$status = 'done';
				break;

			case self::CANCELLED:
				$status = 'cancelled';
				break;

			default:
				$status = 'unknown';
				break;
		}

		return $status;
	}
}