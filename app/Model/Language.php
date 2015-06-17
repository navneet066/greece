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
		$conditions = array("Language.is_active"=>true);
		$order = array('Language.name'=>'ASC');
		$results = $this->find('list',array('order'=>$order,'conditions'=>$conditions));
		return $results;

	}

	public function getNameById($id){
		$result = $this->find('first',array('conditions'=>array('Language.id'=>$id)));
		if(!empty($result)){
			return $result['Language']['name'];
		}else{
			return false;
		}
	}
}
