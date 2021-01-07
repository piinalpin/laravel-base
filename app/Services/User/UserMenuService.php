<?php

namespace App\Services\User;

use App\Exceptions\DataNotFoundException;
use App\Model\User\UserMenu;
use App\Services\User\UserService;
use App\Services\SoftDeletesService;

class UserMenuService extends SoftDeletesService
{
    /**
     * Save object
     * @return object
     */
    public static function save(UserMenu $userMenu)
    {
        $userMenu->save();
        return $userMenu;
    }

    public static function deleteByUserId($userId) {
        UserMenu::where('user_id', $userId)->delete();
    }

}
