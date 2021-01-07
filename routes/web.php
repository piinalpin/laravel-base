<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'login');
Route::view('/dashboard', 'web.dashboard.index');
Route::view('/transaction', 'web.transaction.index');

// Stuff
Route::view('/stuff', 'web.stuff.index');
Route::view('/stuff/detail', 'web.stuff.detail');

// User
Route::view('/user', 'web.user.index');
Route::view('/user/menu', 'web.user.user-menu');