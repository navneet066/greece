<?php

class TranslationJobsController extends AppController
{
	public $name = "TranslationJobs";

	public $uses = array('TranslationJob', 'User', 'Company', 'Engine', 'Employee', 'Language');

	public $layout = 'Admin/profile_layout';

	public function index()
	{

	}

	public function create()
	{
		$languages = $this->Language->getAllLanguageList();
		$this->set('languages', $languages);
		$authUser = $this->Auth->user();
		$userId = $this->User->getAuthDetailByEmail($authUser['User']['email']);
		$engines = $this->Engine->getEngineListCompanyId($userId['User']['company_id']);
		$this->set('engines', $engines);
		if ($this->request->is('post')) {
			$data = $this->request->data;
			CakeLog::error(json_encode($data));
			if (!empty($data)) {
				$fields = array("engine_id", "s_language", "t_language" , "translation_file", "high_gloss", "low_gloss");
				$this->TranslationJob->set($data);
				if($this->TranslationJob->validates($fields)){}
			}

		}
	}

	public function update(){}
	public function remove(){}
}

