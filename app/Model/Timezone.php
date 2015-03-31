<?php

class Timezone extends AppModel
{

	public $useTable = 'timezones';

	public $name = 'Timezone';

	public $belongsTo = array();

	public function getTimezoneList()
	{
		$timezone = $this->find('list', array('order' => array('Timezone.value ASC')));
		return $timezone;
	}
}
