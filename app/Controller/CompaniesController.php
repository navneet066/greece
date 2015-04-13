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
		$authUser = $this->Auth->user();
		$company = $this->User->getAuthDetailByEmail($authUser['User']['email']);
		if (empty($this->request->data)) {
			$result = $this->Company->getCompanyDetailByCompanyId($company['User']['company_id']);
			unset($result['Company']['id']);
			$this->request->data = $result;
		}
		if($this->request->is('post')){
				$data = $this->request->data;
				$this->Company->id = $company['User']['company_id'];
				$flag = $this->Company->save($data);
				if ($flag) {
					$message = __("Company's Profile Updated successfully !");
					$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
					$this->redirect($this->request->referer());
				}

		}

	}
}
