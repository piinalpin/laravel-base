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
	// JWT Auth
	Route::middleware('basicAuth')->post('/oauth/token', 'Controller@oauth');
	Route::middleware('jwt.verify')->post('/oauth/token/refresh', 'Controller@refreshToken');

	// Dashboard
	Route::middleware('jwt.verify')->get('/dashboard', 'Controller@dashboard');

	// User controller
	Route::middleware('jwt.verify')->get('/user/me', 'User\UserController@me');
	Route::middleware(['jwt.verify', 'access.user-maintenance'])->get('/user', 'User\UserController@getAll');
	Route::middleware(['jwt.verify', 'access.user-maintenance'])->post('/user', 'User\UserController@create');
	Route::middleware(['jwt.verify', 'access.user-maintenance'])->get('/user/{id}', 'User\UserController@detail');
	Route::middleware(['jwt.verify', 'access.user-maintenance'])->post('/user/{id}', 'User\UserController@update');
	Route::middleware(['jwt.verify', 'access.user-maintenance'])->delete('/user/{id}', 'User\UserController@delete');

	// User menu controller
	Route::middleware(['jwt.verify', 'access.user-maintenance'])->post('/user/{id}/menu', 'User\UserMenuController@create');
});