<?php
class TranslationJobsController extends AppController
{
	public $name = "TranslationJobs";

	public $uses = array('TranslationJob', 'User', 'Company', 'Employee','Language');

	public $layout = 'Admin/profile_layout';

	public function index()
	{

	}

	public function create()
	{
		$languages = $this->Language->getAllLanguageList();
		$this->set('languages', $languages);


	}

	public function update()
	{

	}

	public function remove()
	{

	}
}

