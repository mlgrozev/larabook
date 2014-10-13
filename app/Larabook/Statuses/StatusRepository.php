<?php namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository {

	public function getAllForUser($userId)
	{
		return User::findOrFail($userId)->statuses()->with('user')->latest()->get();	
	}
	
	/**
	 * Save new status for an user
	 *
	 * @param Status $status
	 * @param        $userId
	 *
	 * @return mixed
	 */
	public static function save(Status $status, $userId)
	{
		return User::findOrFail($userId)
			->statuses()
			->save($status);
	}

} 