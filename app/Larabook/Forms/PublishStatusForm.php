<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator {

	/**
	 * Validation for status' form
	 * @var array
	 */
	protected $rules = [
		'body' => 'required',
	];
} 