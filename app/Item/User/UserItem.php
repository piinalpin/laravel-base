<?php

namespace App\Item\User;

use App\Item\BaseItem;
use App\User;

/**
 * 
 */
class UserItem extends BaseItem
{
	public $username;

	public $email;

	public $fullName;

	public $enabled;

	public $role;

	public $menu;

	public function __construct(User $user)
	{
		parent::__construct($user);
		$this->username = $user->username;
		$this->email = $user->email;
		$this->fullName = $user->full_name;
		$this->enabled = $user->enabled;
		$this->role = $user->role;
		$menus = array();
		foreach ($user->menu as $userMenu) {
			$menus[] = $userMenu->menu;
		}
		$this->menu = $menus;
	}
}