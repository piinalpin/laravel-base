<?php

namespace App\Http\Controllers;

use App\Exceptions\BadCredentialsException;
use App\Factory\UserFactory;
use App\Http\Requests\UserRequest;
use App\Item\UserItem;
use App\User;
use App\Utils\ResponseHandler;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use JWTAuth;

class UserController extends Controller
{
    public function getAll()
    {
        return Response::json(UserService::getAll(), 200);
    }

    public function create(UserRequest $request)
    {
        $current = JWTAuth::parseToken()->authenticate();

        UserService::isExists($request->username);

        $user = UserFactory::factory($request, null, $current->id, config('constants.FACTORY.CREATE'));
        $user->password = UserService::hashPassword($user->password);
        $user = UserService::save($user);
        return Response::json($user, 201);
    }

    public function detail($id)
    {
        return Response::json(UserService::getById($id), 200);
    }

    public function update(UserRequest $request, $id)
    {
        $user = UserService::getById($id);

        UserService::isExistsById($request->username, $id);

        $user = UserFactory::factory($request, $user, null, config('constants.FACTORY.UPDATE'));
        $user->password = UserService::hashPassword($user->password);
        $user = UserService::save($user);
        return Response::json($user, 200);
    }

    public function delete($id)
    {
        $user = UserService::getById($id);
        UserService::delete($user);
        return ResponseHandler::ok();
    }

    public function me(Request $request)
    {
        return Response::json(new UserItem(JWTAuth::parseToken()->authenticate()), 200);
    }
}
