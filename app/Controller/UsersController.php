<?php

/**
 * Class UsersController
 * User: Himanshu
 * Date: 2015-03-13
 */
App::uses('AppController', 'Controller');
class UsersController extends AppController
{
	public $name = 'Users';

	public $layout = "users";

	public $uses = array("User", "Company", "Country");

	public function sign_up()
	{
		$countries = $this->Country->getCountryList();
		$this->set('countries', $countries);
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->User->set($data);
			$this->Company->set($data);
			$userFields = array('prefix', 'first_name', 'last_name', 'address', 'city', 'postal_code',
				'state', 'country_id');
			$companyFields = array('company_name', 'job_function', 'industry', 'web_url', 'vat_id',);
			if($userFlag = $this->User->validates(array('fieldList' => $userFields))){

			}else{
				$errors = $this->User->validationErrors;
			}
			$companyFlag = $this->Company->validates(array('fieldList' => $companyFields));

		}
	}

	public function login(){

	}
}
