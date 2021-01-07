<?php

namespace App\Item\User;

use App\Item\BaseItem;
use App\Model\User\UserMenu;

class UserMenuItem extends BaseItem
{
	public $menu;

    /**
     * Generate Item
     *
     * @return array()
     */
    public function __construct(UserMenu $userMenu)
    {
        parent::__construct($userMenu);
        $this->menu = $userMenu->menu;
    }

}
