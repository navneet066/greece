<?php

/*Developer : Himanshu Mishra
 * Date : 2015-03-14
 *
 */

class Company extends  AppModel{

	public $name = 'Company';

	public $useTable = 'companies';

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
			'alphabet' => array(
				'rule' => '/[a-zA-Z0-9 ]{3,}$/i',
				'message' => 'Company should be a alphanumeric'
			),
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
			'alphabet' => array(
				'rule' => '/[a-zA-Z0-9 ]{3,}$/i',
				'message' => 'Job function should be a alphanumeric'
			),

		),
		'industry_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please choose an image',
				'last' => true
			)
		),
		'web_url' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Url cannot be left blank',
				'last' => true
			),
			'url' => array(
				'rule' => array("url", true),
				'message' => 'Url must be proper'
			)
		)
	);
}
