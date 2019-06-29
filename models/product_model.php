<?php

class ProductModel
{
	public function preview($len = 50) {
		if (strlen($this->description) >= $len) {
			return substr($this->description, 0, $len) . '...';
		}

		return $this->description;
	}
}