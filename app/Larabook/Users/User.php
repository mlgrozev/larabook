<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class User
 *
 * @package Larabook\Users
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

	/**
	 * Which fields can be mass assigned
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Path to the presenter to the user
	 *
	 * @var string
	 */
	protected $presenter = 'Larabook\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Password must always be hashed
	 *
	 * @param $password
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * A user has many statuses
	 *
	 * @return mixed
	 */
	public function statuses()
	{
		return $this->hasMany('Larabook\Statuses\Status')->latest();
	}

	/**
	 * Register new user
	 *
	 * @param $username
	 * @param $email
	 * @param $password
	 *
	 * @return static
	 */
	public static function register($username, $email, $password)
	{
		$user = new static(compact('username', 'email', 'password'));

		$user->raise(new UserRegistered($user));

		return $user;
		//raise and event
	}

	/**
	 * Determine is current user the same as the given one.
	 *
	 * @param $user
	 *
	 * @return bool
	 */
	public function is($user)
	{
		if (is_null($user)) return false;

		return $this->username == $user->username;
	}

	/**
	 * @return mixed
	 */
	public function comments()
	{
		return $this->hasMany('Larabook\Statuses\Comment');
	}
}
