<?php

/**
 * Created by Himanshu M
 * User: Himanshu
 * Date: 20-04-2015
 * Time: PM 11:10
 */
class Package extends AppModel
{

	public $name = 'Package';

	public $useTable = 'packages';

	public $belongsTo = array();

	public $validate = array(

		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'The Engine Id should not empty'
			),
			'alphaNumericDashUnderscore' => array(
				'rule' => array('alphaNumericDashUnderscore'),
				'message' => array('Slug can only be letter numbers, dash and underscore')
			)
		),
		'disk_storage' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'The Disk Storage should not empty'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Disk Storage should be a alphabet or numbers'
			)
		),
		'compute_hours' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill Domain Name'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Package Compute Hours should be numeric'
			)
		),
		'number_of_engines' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill Source Language'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Source Language should be a alphabet or numbers'
			)
		),
		'lang_pairs' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill Language Pairs'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Language Pairs should be or numbers'
			)
		),
		"max_translated_words" => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill Target Language'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Package Max Trans Words should be decimal value'
			)
		),
		'min_hour_per_job' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill Glossaries'
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Engine name should be a alphabet or numbers'
			)
		),
		'min_rate_word' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill Glossaries'
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Engine name should be a alphabet or numbers'
			)
		),
		'min_rate_mb' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill Glossaries'
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Engine name should be a alphabet or numbers'
			)
		),
		'extra_rate_word' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill Glossaries'
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Engine name should be a alphabet or numbers'
			)
		),
		'extra_rate_add_mb' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill package'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Package Extra  word mb rate should be decimal type value'
			)
		),
		'extra_rate_add_hour' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please fill package'
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Package extra rate add hours should e in decimal'
			)
		),
		'extra_rate_add_engine' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill package'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Package extra add engine should be in decimal'
			)
		),
		'price' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill price'
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Package price should be in decimal value'
			)
		),
		'valid_days' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Fill Valid days'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Glossaries should be a alphabet or numbers'
			)
		),
	);

	public function alphaNumericDashUnderscore($check)
	{
		$value = array_values($check);
		$value = $value[0];
		return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
	}

	public function getAllPackageForIndex()
	{
		$order = array("Package.updated" => "DESC");
		$results = $this->find('all', array('order' => $order));
		return $results;
	}

	public function getPackageForUpdate($id)
	{
		$conditions = array("Package.id" => $id);
		$result = $this->find('first', array("conditions" => $conditions));
		return $result;
	}

	public function getAllActivePackageForUser()
	{
		$results = $this->find('all');
		return $results;
	}


}
