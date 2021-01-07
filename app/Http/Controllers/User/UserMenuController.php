<?php

namespace App\Http\Controllers\User;

use App\Exceptions\InvalidActionException;
use App\Factory\User\UserMenuFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserMenuRequest;
use App\Item\User\UserMenuItem;
use App\Item\User\UserItem;
use App\Model\User\UserMenu;
use App\Services\User\UserMenuService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Response;
use JWTAuth;

class UserMenuController extends Controller
{
    public function create(UserMenuRequest $request, $userId)
    {
    	$current = JWTAuth::parseToken()->authenticate();

    	$user = UserService::getById($userId);

        if ($current->id == $user->id)
            throw new InvalidActionException("user record: can not change your self");
            

    	// Delete previous menu
    	UserMenuService::deleteByUserId($user->id);

    	$response = array();
    	foreach ($request->menu as $menu) {
    		$model = new UserMenu();
            $model->created_by = $current->id;
            $model->menu = $menu;
            $model->user_id = $user->id;
    		$model = UserMenuService::save($model);
    		$response[] = new UserMenuItem($model);
    	}

    	return Response::json($response, 201);
    }

}
