<?php

/**
 * Class Language
 * Author Himanshu Mishra
 * Date : 15-04-2015
 * Time : 12:09:12
 */
class Language extends AppModel{

	public $name = 'Language';

	public $useTable = 'languages';

	public $belongsTo = array();

	public function getAllLanguageList()
	{
		$order = array('Language.name'=>'ASC');
		$results = $this->find('list',array('order'=>$order));
		return $results;

	}
}
