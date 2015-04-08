<?php
class AdminsController extends AppController{

	public $name = 'Admins';

	public $uses = array('User','Engines', 'Contracts', 'Jobs', 'Employee');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Security->unlockedActions = array();
		$this->Security->csrfCheck = false;
		$this->Auth->allow();
	}

	public function employees_db()
	{
		$authUser = $this->Auth->user();
		$authDetail = $this->User->getAuthDetailByEmail($authUser['User']['email']);
		$results = $this->Employee->getLatestAddedEmployee($authDetail['User']['company_id']);
		CakeLog::error(json_encode($results));
		return $results;

	}

	public function jobs_db()
	{

	}

	public function engines_db()
	{

	}
}
