<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'v1', 'middleware' => 'cors'], function () {
	Route::middleware('basicAuth')->post('/oauth/token', 'Controller@oauth');
	Route::middleware('jwt.verify')->post('/oauth/token/refresh', 'Controller@refreshToken');

	Route::middleware('jwt.verify')->get('/user/me', 'UserController@me');
	Route::middleware('jwt.verify')->post('/user', 'UserController@addUser');
});