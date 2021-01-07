<?php

namespace App\Item;

use Tymon\JWTAuth\Token;
use JWTAuth;

/**
 * 
 */
class TokenItem
{

	public $access_token;

	public $token_type = 'bearer';

	public $expires_in;

	public $jti;
	
	public function __construct($token)
	{
		$this->access_token = $token;
		$this->expires_in = auth()->factory()->getTTL() * 60;
		$this->jti = JWTAuth::decode(new Token($token))['jti'];
	}
}