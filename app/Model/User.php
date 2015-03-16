<?php

App::uses('AppModel', 'Model');

class User extends AppModel
{
	public $name = 'User';

	public $useTable = "users";

	public $validate = array(

		'first_name' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "First name must not be blank",
				"last" => true
			),
			'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'First name should be a alphabet or numbers'
			)
		),
		'last_name' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "Last name must not be blank",
				"last" => true
			),
			'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'Last name should be a alphabet or numbers'
			)
		),
		'address' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "Address must not be blank",
				"last" => true
			),
			'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'Address should be a alphabet or numbers'
			)
		),
		'city' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'City must not be empty'
			),
			'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'City should be a alphabet or numbers'
			)
		),
		'postal_code' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Postal must not be empty'
			),
			'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'Postal should be a alphabet or numbers'
			)
		),
		'state' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'State/Province must not be empty'
			),
			'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'State/Province should be a alphabet or numbers'
			)
		),
		'country' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Country field should not empty'
			)
		),
		'is_agree' => array(
			'mustNotEmpty' => array(
				'rule' => array('comparison', '!=', 0),
				'message' => 'You must agree to the terms of use'
			),
		)

	);


	public function checkEmptyFile($data)
	{
		if (empty($data["file"]["error"])) {
			return true;
		}
		return false;
	}

}

