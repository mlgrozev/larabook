<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {
	/**
	 * @var SignInForm
	 */
	private $signInForm;

	function __construct(SignInForm $signInForm)
	{
		$this->signInForm = $signInForm;

		$this->beforeFilter('guest', ['except' => 'destroy']);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::only('email', 'password');
		$this->signInForm->validate($formData);

		if (!Auth::attempt($formData))
		{
			Flash::message('We were unable to sign you in. Please check your credentials and try again!');

			return Redirect::back()->withInput();
		}
		
		Flash::message('Welcome back!');

		return Redirect::intended('/statuses');
	}

	/**
	 * Logout current user
	 *
	 * @return mixed
	 */
	public function destroy()
	{
		Auth::logout();

		Flash::message('You have now been logout');

		return Redirect::home();
	}

}
