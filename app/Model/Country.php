<?php

/* Country Class
 * Dev : Himanshu Mishra
 * Date : 2015-03-14
 */

class Country extends AppModel
{
	public $name = 'Country';

	public $useTable = 'countries';

	public $hasMany = array(
		'Company'=>array(
			'className'=>'Company',
			'foreignKey'=>'country_id'
		)
	);

	public function getCountryList()
	{
		$countries = $this->find('list', array('order' => array('Country.name' => 'ASC')));
		return $countries;
	}

}
