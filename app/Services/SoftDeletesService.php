<?php

namespace App\Services;

use Carbon\Carbon;
/**
 * 
 */
class SoftDeletesService
{
	protected static function softDelete($object)
	{
		$object->deleted_at = Carbon::now()->toDateTimeString();
		$object->save();
	}

	protected static function hardDelete($object)
	{
		$object->delete();
	}
}