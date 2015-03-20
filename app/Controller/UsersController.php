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

	public $uses = array("User", "Company", "Country", "JobFunction");

	public function sign_up()
	{
		$countries = $this->Country->getCountryList();
		$this->set('countries', $countries);

		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->User->set($data);
			$this->Company->set($data);
			$userFields = array('prefix', 'first_name', 'last_name', 'username', 'email','password');
			$companyFields = array('company_name', 'email', 'job_function', 'industry_id', 'web_url', 'vat_id',
				'address', 'city', 'postal_code', 'state', 'country_id');
			$userFlag = $this->User->validates(array('fieldList' => $userFields));
			$companyFlag = $this->Company->validates(array('fieldList' => $companyFields));
			if ($userFlag && $companyFlag) {
				$profileSaved = $this->Company->save($data);
				if ($profileSaved) {
					$companyId = $this->Company->id;
					$data['User']['company_id'] = $companyId;
					$userSaved = $this->User->save($data);
				}
			}
		}
	}

	public function login()
	{
		if ($this->Auth->loggedIn()) {
			$url = array("controller" => "users", "action" => "dashboard", "plugin" => null);
			return $this->redirect($url);
			//return $this->redirect($this->Auth->redirectUrl());
		}
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->User->set($data);
			if ($this->User->validateLogin()) {
				$user = $data["User"]["email"];
				if ($this->Auth->login($data)) {

				}
			}

		}
	}

	public function getJobFunctionList()
	{
		$this->autoRender = false;
		$results = $this->JobFunction->getList();
		return $results;
	}
}
