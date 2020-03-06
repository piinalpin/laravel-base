<?php

namespace App\Item;

abstract class BaseItem
{
	public $id;

	public $createdAt;

	public $createdBy;

	public $updatedAt;

	public function __construct($child)
	{
		$this->id = $child->id;
		$this->createdAt = $child->created_at;
		$this->createdBy = $child->created_by;
		$this->updatedAt = $child->updated_at;
	}
}