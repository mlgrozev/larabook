<?php namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository {

	/**
	 * @param $userId
	 *
	 * @return mixed
	 */
	public function getAllForUser($userId)
	{
		return User::findOrFail($userId)->statuses()->with('user')->latest()->get();	
	}

	/**
	 * Get the feed for a user.
	 * 
	 * @param User $user
	 *
	 * @return mixed
	 */
	public function getFeedForUser(User $user)
	{
		$userIds = $user->followedUsers()->lists('followed_id');
		$userIds[] = $user->id;

		return Status::whereIn('user_id', $userIds)->latest()->get();	
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