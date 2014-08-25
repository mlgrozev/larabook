<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Created by PhpStorm.
 * User: Grozev
 * Date: 25/08/2014
 * Time: 22:43
 */

class RegistrationForm extends FormValidator {

	/**
	 * Validation for user's form
	 * @var array
	 */
	protected $rules = [
		'username' => 'required|unique:users',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed'
	];
} 