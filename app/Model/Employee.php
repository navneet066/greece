<?php

/*
 * Developer: Himanshu Mishra
 * Date: 2015-03-21
 * Time : 22:12:23
 *
 */

class Employee extends AppModel
{

	public $useTable = 'users';

	public $name = 'Employee';

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
		'external_number' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => array('Only numeric value allowed')
			)
		),
		'mobile_number' => array(
			'minimum' => array(
				'rule' => array('minLength', '8'),
				'message' => array('Please Enter atleast 8 digit number')
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => array('Only numeric value allowed')
			)
		),
		'skype_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Password should not be empty',
				'last' => true,
			),
			'alphaNumericDashUnderscore' => array(
				'rule' => array('alphaNumericDashUnderscore'),
				'message' => array('Skype id can only be letter numbers, dash and underscore')
			)
		),
		'linkedin_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Password should not be empty',
				'last' => true,
			),
			'alphaNumericDashUnderscore' => array(
				'rule' => array('alphaNumericDashUnderscore'),
				'message' => array('Slug can only be letter numbers, dash and underscore')
			)
		)

	);


	public function alphaNumericDashUnderscore($check)
	{
		// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_values($check);
		$value = $value[0];

		return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
	}

	public function beforeSave($options = array())
	{
		if (!empty($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}

	public function getProfileDetailById($id)
	{
		$conditions = array('Employee.id' => $id);
		$result = $this->find('first', array('conditions' => $conditions));
		return $result;
	}

	public function getUpdateStatus($id, $status)
	{
		$this->id = $id;
		$this->saveField('is_active', $status);
	}

	public function getDeleteEmployee($id)
	{
		$this->id = $id;
		$this->delete($id);
	}

	public function getLatestAddedEmployee($companyId)
	{
		$conditions = array('Employee.company_id' => $companyId);
		$order = array('Employee.created DESC');
		$employees = $this->find('all', array('conditions' => $conditions,'order'=>$order));
		return $employees;

	}

}
