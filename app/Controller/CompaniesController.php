<?php

/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 07-04-2015
 * Time: PM 08:47
 */
class CompaniesController extends AppController
{

	public $name = 'Companies';

	public $uses = array('User', 'Company', 'Employee', 'Country', 'Timezone');

	public $layout = 'Admin/profile_layout';

	public $components = array();

	public function index()
	{

	}

	public function update()
	{
		$countries = $this->Country->getCountryList();
		$this->set('countries', $countries);
		$this->loadModel('Timezone');
		$timezones = $this->Timezone->getTimezoneList();
		$this->set('timezones', $timezones);
		if (empty($this->request->data)) {
			$authUser = $this->Auth->user();
			$companyId = $this->User->getAuthDetailByEmail($authUser['User']['email']);
			$result = $this->Company->getCompanyDetailByCompanyId($companyId['User']['company_id']);
			unset($result['Company']['id']);
			$this->request->data = $result;
		}
		if($this->request->is('post')){
			$data = $this->request->data;


		}

	}
}
