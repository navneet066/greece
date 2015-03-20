<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
	public $name = 'User';

	public $useTable = "users";

	public $validate = array(

		'prefix' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "Please select any prefix",
				"last" => true
			),
		),
		'first_name' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "First name must not be blank",
				"last" => true
			),
			/*'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'First name should be a alphabet or numbers'
			)*/
		),
		'last_name' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "Last name must not be blank",
				"last" => true
			),
			/*'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'Last name should be a alphabet or numbers'
			)*/
		), 'username' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "Username must not be blank",
				"last" => true
			),
			/*'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'Username should be a alphabet or numbers'
			)*/
		),
		'email' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Email address should not empty',
				'last' => true
			),
			'email' => array(
				'rule' => 'email',
				'message' => 'Please choose valid email address',
				'last' => true
			),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'Email address already exists. Please fill another email address',
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Password should not be empty',
				'last' => true,
			),
			'minimum' => array(
				'rule' => array('minLength', '6'),
				'message' => 'Password should be minimum of 6 characters'
			)
		),


		'is_agree' => array(
			'mustNotEmpty' => array(
				'rule' => array('comparison', '!=', 0),
				'message' => 'You must agree to the terms of use'
			),
		)

	);

	function validateLogin()
	{
		$validateLogin = array(
			'email' => array(
				'mustNotEmpty' => array(
					'rule' => 'notEmpty',
					'message' => __("Please enter email."),
					'last' => true
				),
				'minimum' => array(
					'rule' => array('minLength', '6'),
					'message' => __('User Name should be minimum of 6 characters'),
					"last" => true
				),
				'alphanumeric' => array(
					'rule' => 'alphanumeric',
					'message' => __('User name should be a alphabet or numbers'),
					"last" => true
				),
				"validUser" => array(
					'rule' => 'getValidUser'
				)
			),
			'password' => array(
				'mustNotEmpty' => array(
					'rule' => 'notEmpty',
					'message' => __("Please enter password"),
					"last" => true
				),
				'minimum' => array(
					'rule' => array('minLength', '6'),
					'message' => __('Password should be minimum of 6 characters')
				)
			)
		);
		$this->validate = $validateLogin;
		return $this->validates();
	}



	public function checkEmptyFile($data)
	{
		if (empty($data["file"]["error"])) {
			return true;
		}
		return false;
	}

	public function beforeSave($options = array())
	{
		if (!empty($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}

}

