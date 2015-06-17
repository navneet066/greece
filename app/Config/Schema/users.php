<?php
/**
 * Created by IntelliJ IDEA.
 * User: Himanshu
 * Date: 05/19/15
 * Time: 7:15 PM
 * To change this template use File | Settings | File Templates.
 */

App::uses('ClassRegistry', 'Utility');

class UsersSchema extends CakeSchema {

	public $name = 'Users';

	public function before($event = array()) {
		$db = ConnectionManager::getDataSource($this->connection);
		$db->cacheSources = false;
		return true;
	}

	public function after($event = array()) {
		if (isset($event['create'])) {
			$table = $event['create'];
			$data = null;
			switch($table) {
				case 'users':
					$this->insertDefaultUsers();
					break;
			}
		}
	}

	public $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary', 'length' =>10, "default" => 0, "unsigned" => true),
		'email_address' => array('type' => 'string', 'null' => false, 'length' =>255),
		'password' => array('type' => 'string', 'null' => false, 'length' =>100),
		'is_active' =>array('type' => "boolean",'null' =>false, 'length'=> 1,"default" => 1, "unsigned" => true),
		'created' => array('type' => 'datetime', 'null' => false),
		'modified' => array('type' => 'datetime', 'null' => false),
		'group_id' => array('type' => 'boolean', 'null' => false, 'length' =>3, "unsigned" => true),
		'name' => array('type' => 'string', 'null' => false, "length" => 255),
		'city_name' => array('type' => 'string', 'null' => true,"length" => 255),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => true),
			'foreign' => array('column' => 'group_id', "references" => "groups"),
			'group_id' => array('column' => 'group_id'),
			'email_address' => array('column' => 'email_address', "unique" => true)
		),
		'tableParameters' => array(
			'engine' => 'InnoDB',
			'charset' => 'utf8',
			'collate' => 'utf8_general_ci'
		)
	);
	public function insertDefaultUsers(){
		$user = ClassRegistry::init("User");
		$records = array(
			array(
				"User" => array(
					"email_address" => "super-admin@greece.com",
					"password" => "greece@123",
					"is_active" => true,
					"created" => date("Y-m-d H:i:s"),
					"modified" => date("Y-m-d H:i:s"),
					"group_id" => 1,
					"name"  => "SuperAdmin"

				)
			),
			array(
				"User" => array(
					"email_address" => "admin@greece.com",
					"password" => "greece@123",
					"is_active" => true,
					"created" => date("Y-m-d H:i:s"),
					"modified" => date("Y-m-d H:i:s"),
					"group_id" => 2,
					"name"  => "Admin"

				)
			),
			array(
				"User" => array(
					"email_address" => "company-admin@greece.com",
					"password" => "greece@123",
					"is_active" => true,
					"created" => date("Y-m-d H:i:s"),
					"modified" => date("Y-m-d H:i:s"),
					"group_id" => 3,
					"name"  => "CompanyAdmin"
				)
			),
			array(
				"User" => array(
					"email_address" => "empoyee@greece.com",
					"password" => "greece@123",
					"is_active" => true,
					"created" => date("Y-m-d H:i:s"),
					"modified" => date("Y-m-d H:i:s"),
					"group_id" => 3,
					"name"  => "Employee"
				)
			),
		);
		$user->saveAll($records);
	}
}
