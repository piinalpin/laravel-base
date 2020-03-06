<?php

namespace App\Http\Controllers;

use App\Exceptions\BadCredentialsException;
use App\Http\Requests\UserRequest;
use App\Item\UserItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use JWTAuth;

class UserController extends Controller
{
    public function me(Request $request)
    {
    	return Response::json(new UserItem(JWTAuth::parseToken()->authenticate()), 200);
    }

    public function addUser(UserRequest $request)
    {
        // return Response::json($request->json()->all(), 200);
        return Response::json($request, 200);
    }
}
