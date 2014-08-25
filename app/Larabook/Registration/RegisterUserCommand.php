<?php
/**
 * Created by PhpStorm.
 * User: Grozev
 * Date: 26/08/2014
 * Time: 00:48
 */

namespace Larabook\Registration;


class RegisterUserCommand {

	public $username;
	
	public $email;
	
	public $password;

	function __construct($username, $email, $password)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}


} 