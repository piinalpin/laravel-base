<?php

namespace App\Services;

use App\Exceptions\DataNotFoundException;
use App\Exceptions\UsernameIsExistsException;
use App\User;
use Illuminate\Support\Facades\Hash;

/**
 * 
 */
class UserService extends SoftDeletesService
{
	public static function getAll() {
		return User::where('deleted_at', null)->get();
	}

	public static function save(User $user) {
		$user->save();
		return $user;
	}

	public static function getById($id) {
		$user = User::where('id', $id)->where('deleted_at', null)->first();
		if ($user == null) {
			throw new DataNotFoundException("user record: not found");	
		}
		return $user;
	}

	public static function isExists($username) {
		if (User::where('username', $username)->where('deleted_at', null)->first() != null) {
			throw new UsernameIsExistsException();
		}
	}

	public static function isExistsById($username, $id) {
		if (User::where('username', $username)->where('deleted_at', null)->where('id', '!=', $id)->first() != null) {
			throw new UsernameIsExistsException();
		}
	}

	public static function delete(User $user) {
		parent::softDelete($user);
	}

	public static function hashPassword($password) {
        return Hash::make($password);
    }
}