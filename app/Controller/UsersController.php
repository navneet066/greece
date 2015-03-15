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

	/**
	 * For users sign_up with company detail page validation and storage of data
	 *
	 */

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
			$userFlag = $this->User->validates(array('fieldList' => $userFields));
			$companyFlag = $this->Company->validates(array('fieldList' => $companyFields));
			if ($userFlag) {
			}else{
				$this->render('users/sign_up');
			}
		}
	}
}
