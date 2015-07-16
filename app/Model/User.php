<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
	public $name = 'User';

	public $useTable = "users";

	public $virtualFields = array('full_name' => 'CONCAT(User.first_name, ", ", User.last_name)');

	public $recursive = 2;

	public $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id'
		)
	);


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
				/*'minimum' => array(
					'rule' => array('minLength', '6'),
					'message' => __('User Name should be minimum of 6 characters'),
					"last" => true
				),
				'alphanumeric' => array(
					'rule' => 'alphanumeric',
					'message' => __('User name should be a alphabet or numbers'),
					"last" => true
				),*/
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

	public function getValidUser($data)
	{

		$email = array_shift($data);
		$password = trim($this->data[$this->alias]["password"]);
		if (!empty($password)) {
			$conditions = array("User.email" => $email);
			$fields = array("User.password", "User.status");
			$result = $this->find("first", array("conditions" => $conditions, "fields" => $fields));
			if (!empty($result)) {
				$passwordHasher = new BlowfishPasswordHasher();
				$storedHash = $result[$this->alias]["password"];
				$correct = $passwordHasher->check($password, $storedHash);
				if ($correct) {
					return true;
				}
				return __("User Name & Password do not match");
			}
		}
		return __("User does not exists");
	}

	public function validateExtraFields()
	{
		$validateExtraFields = array(
			'alias' => array(
				'minimum' => array(
					'rule' => array('minLength', '4'),
					'message' => array('Alias should be minimum of 4 char')
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
				)
			),
			'skype_id' => array(
				'alphaNumericDashUnderscore' => array(
					'rule' => array('alphaNumericDashUnderscore'),
					'message' => array('Skype id can only be letter numbers, dash and underscore')
				)
			),
			'linkedin_id' => array(
				'rule' => array('alphaNumericDashUnderscore'),
				'message' => array('Slug can only be letter numbers, dash and underscore')
			)
		);
		$this->validate = $validateExtraFields;
		return $this->validates();
	}

	public function alphaNumericDashUnderscore($check)
	{
		// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_values($check);
		$value = $value[0];

		return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
	}

	public function checkEmptyFile($data)
	{
		if (empty($data["file"]["error"])) {
			return true;
		}
		return false;
	}

	public function validateUpdateUserPassword($fields)
	{
		if (in_array("old_password", $fields)) {
			$validateUserPassword = array(
				'old_password' => array(
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => __("Old password should not empty"),
						'last' => true
					)
				),
				'new_password' => array(
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => __('New password should not empty'),
						'last' => true
					),
					'minimum' => array(
						'rule' => array('minLength', '6'),
						'message' => __('New password should be minimum of 6 characters')
					)
				)
			);
		} else {
			$validateUserPassword = array(
				'new_password' => array(
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => __('New password should not empty'),
						'last' => true
					),
					'minimum' => array(
						'rule' => array('minLength', '6'),
						'message' => __('New password should be minimum of 6 characters')
					)
				)
			);
		}
		$this->validate = $validateUserPassword;
		return $this->validates();
	}

	public function validPassword($data)
	{

	}

	public function get_forgot_password_code()
	{
		$randomCode = '1234567890axzyAxzy';
		$codeNumber = substr(str_shuffle($randomCode), 0, 15);
		return 'RP-' . str_pad($codeNumber, 5, STR_PAD_LEFT);
	}

	public function getUserDetailsByEmail($email)
	{
		$conditions = array('User.email' => $email);
		$result = $this->find('first', array('conditions' => $conditions));
		return $result;

	}

	public function beforeSave($options = array())
	{
		if (!empty($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}

	public function companyIdForEmployee($email)
	{
		$this->recursive = 1;
		$conditions = array('User.email' => $email);
		$fields = array('User.company_id');
		$result = $this->find('first', array('conditions' => $conditions, 'fields' => $fields));
		return $result;
	}

	public function getAuthDetailByEmail($email)
	{
		$conditions = array('User.email' => $email);
		$fields = array('User.id', 'User.first_name', 'User.last_name', 'User.group_id', 'User.company_id');
		$result = $this->find('first', array('conditions' => $conditions, 'fields' => $fields));
		return $result;

	}

	public function validPasswordUpdate($id, $oldPassword, $newPassword)
	{
		$conditions = array("User.id" => $id);
		$fields = array("User.password");
		$list = $this->find("list", array("conditions" => $conditions, "fields" => $fields));
		if (!empty($list)) {
			$storedHash = array_shift($list);
			$passwordHasher = new BlowfishPasswordHasher();
			$correct = $passwordHasher->check($oldPassword, $storedHash);
			if ($correct) {
				$this->id = $id;
				$flag = $this->saveField('password', $newPassword);
				if ($flag) {
					return true;
				}
				return "You have entered wrong password Please try again";
			}
		}
	}

	public function getAllEmployeeByGroupAndCompanyId($companyId, $groupId)
	{
		$conditions = array('User.group_id' => $groupId, 'User.company_id' => $companyId);
		$results = $this->find('all', array('conditions' => $conditions));
		return $results;
	}

	function validateEmailForForgotPassword()
	{
		$validateEmail = array(
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
				'validEmail'=>array(
					'rule'=>'isPresentEmail',

				)
			),
		) ;
		$this->validate = $validateEmail;
		return $this->validates();

	}

	public function isPresentEmail($data)
	{
		$email = array_shift($data);
		if (!empty($email)) {
			$conditions = array("User.email" => $email);
			$result = $this->find("first", array("conditions" => $conditions));
			if (!empty($result)) {
				return true;
			}
			return __("Email does not exists");
		}


	}

}
