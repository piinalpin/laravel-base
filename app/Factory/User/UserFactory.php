<?php

namespace App\Factory\User;

use App\Http\Requests\User\UserRequest;
use App\User;

/**
 * 
 */
class UserFactory
{

	static $request;

	static $userId;

	static $user;
	
	public static function factory(UserRequest $request, User $user, $userId, $type)
	{
		self::$request = $request;
		self::$userId = $userId;

		if ($user == null) {
			self::$user = new User();
		} else {
			self::$user = $user;
		}

		function create() {
			$user = UserFactory::$user;
			$user->created_by = UserFactory::$userId;
			$user->enabled = true;

			UserFactory::$user = $user;
			return update();
		}

		function update() {
			$user =  UserFactory::$user;
			$request = UserFactory::$request;

			$user->username = $request->username;
			$user->password = $request->password;
			$user->email = $request->email;
			$user->full_name = $request->fullName;
			$user->role = $request->role;
			return $user;
		}

		switch ($type) {
			case config('constants.FACTORY.CREATE'):
				return create();
			case config('constants.FACTORY.UPDATE'):
				return update();
		}
	}
}