<?php

namespace App\Http\Controllers\User;

use App\Factory\User\UserFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Item\User\UserItem;
use App\Services\User\UserService;
use App\User;
use App\Utils\ResponseHandler;
use Illuminate\Support\Facades\Response;
use JWTAuth;

class UserController extends Controller
{
    public function getAll()
    {
        $users = UserService::getAll();
        $response = array();
        foreach ($users as $user) {
            $response[] = new UserItem($user);
        }
        return Response::json($response, 200);
    }

    public function create(UserRequest $request)
    {
        $current = JWTAuth::parseToken()->authenticate();

        UserService::isExists($request->username);

        $user = UserFactory::factory($request, new User(), $current->id, config('constants.FACTORY.CREATE'));
        $user->password = UserService::hashPassword($user->password);
        $user = UserService::save($user);
        return Response::json(new UserItem($user), 201);
    }

    public function detail($id)
    {
        return Response::json(new UserItem(UserService::getById($id)), 200);
    }

    public function update(UserRequest $request, $id)
    {
        $user = UserService::getById($id);

        UserService::isExistsById($request->username, $id);

        $user = UserFactory::factory($request, $user, null, config('constants.FACTORY.UPDATE'));
        $user->password = UserService::hashPassword($user->password);
        $user = UserService::save($user);
        return Response::json(new UserItem($user), 200);
    }

    public function delete($id)
    {
        $user = UserService::getById($id);
        UserService::delete($user);
        return ResponseHandler::ok();
    }

    public function me()
    {
        return Response::json(new UserItem(JWTAuth::parseToken()->authenticate()), 200);
    }
}
