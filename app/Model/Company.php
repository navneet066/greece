<?php

/*Developer : Himanshu Mishra
 * Date : 2015-03-14
 *
 */

class Company extends AppModel
{

	public $name = 'Company';

	public $useTable = 'companies';

	public $recursive = 1;

	public $belongsTo = array(

		'Country'=>array(
			'className'=>'Country',
			'foreignKey'=>'country_id'
		)
	);

	public $validate = array(

		'company_name' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "Company name must not be blank",
				"last" => true
			),
			'minimum' => array(
				'rule' => array('minLength', '3'),
				'message' => 'Company name should be minimum of 3 characters',
				"last" => true
			),
			/*'alphabet' => array(
				'rule' => '/[a-zA-Z0-9 ]{3,}$/i',
				'message' => 'Company should be a alphanumeric'
			),*/
		),
		'job_function' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "Job function must not be blank"
			),
			'minimum' => array(
				'rule' => array('minLength', '3'),
				'message' => 'Job function should be minimum of 3 characters',
				"last" => true
			),
			/*'alphabet' => array(
				'rule' => '/[a-zA-Z0-9 ]{3,}$/i',
				'message' => 'Job function should be a alphanumeric'
			),*/

		),
		'industry' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please choose an Industry',
				'last' => true
			)
		), 'vat_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Vat id field can not be null',
				'last' => true
			)
		),

		'address' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => "Address must not be blank",
				"last" => true
			),
			/*'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'Address should be a alphabet or numbers'
			)*/
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
				'message' => 'Postal/Zip must not be empty'
			),
			'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'Postal/Zip should be a alphabet or numbers'
			)
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
		'country_id' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Country field should not empty'
			)
		),
	);

	public function validateExtraFields()
	{
		$validateExtraFields = array(
			'web_url' => array(
				'url' => array(
					'rule' => array("url", true),
					'message' => 'Url must be proper'
				)
			),
			'telephone'=>array(
				'numeric'=>array(
					'rule'=>'numeric',
					'message'=>'Please Enter only number'
				)
			),
			'fax'=>array(
				'numeric'=>array(
					'rule'=>'numeric',
					'message'=>'Please Enter number value only'
				)
			),
			'timezone_id'=>array(
				'numeric'=>array(
					'rule'=>'numeric',
					'message'=>'Please Select timezone'
				)
			),
			'alias'=>array(
				'alphanumeric'=>array(
					'rule'=>'alphanumeric',
					'message'=>'Please enter only text only'
				)
			),
			''



		);
		$this->validate = $validateExtraFields;
		return $this->validates();

	}

	public function getCompanyDetailByCompanyId($id)
	{
		$conditions = array('Company.id'=>$id);
		$result = $this->find('first' ,array('conditions'=> $conditions));
		return $result;

	}
}
