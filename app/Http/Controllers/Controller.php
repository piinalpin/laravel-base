<?php

namespace App\Http\Controllers;

use App\Item\TokenItem;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;
use JWTAuth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function oauth(Request $request)
    {
    	$user = User::where('username', request('username'))->first();
        return Response::json(new TokenItem(JWTAuth::fromUser($user)), 200);
    }

    public function refreshToken(Request $request)
    {
    	return Response::json(new TokenItem(JWTAuth::refresh()), 200);
    }
}
