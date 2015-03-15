<?php

/* Country Class
 * Dev : Himanshu Mishra
 * Date : 2015-03-14
 */

class Country extends AppModel
{
	public $name = 'Country';

	public $useTable = 'countries';

	public $belongsTo = array();

	public function getCountryList()
	{
		$countries = $this->find('list', array('order' => array('Country.name' => 'ASC')));
		return $countries;
	}

}
