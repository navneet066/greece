<?php

App::uses('AppController', 'Controller');

class EmployeesController extends AppController
{
	public $name = 'Employees';

	public $uses = array('User', 'Country', 'Company', 'Engine','Employee');

	public $components = array('Auth');

	public $layout = 'Admin/profile_layout';

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Security->unlockedActions = array("index");
		$this->Security->csrfCheck = false;
		$this->Auth->allow();
	}

	public function index()
	{
		$this->set('sideMenuControl', 'Employee ');
		$this->set('title_for_layout', __('Employee Management'));
		$this->set('pageHeader', array(__('Employee Management'), __('Employee Index')));
		$this->set('breadcrumbs', array(
			array('title' => __('Employee Management'), 'slug' => NULL),
			array('title' => __('Employee List'), 'slug' => NULL),
		));
		$authUser = $this->Auth->user();
		$authDetail = $this->User->getAuthDetailByEmail($authUser['User']['email']);//have id,name,gid,cid
		$companyId = $authDetail['User']['company_id'];
		$employees = $this->User->getAllEmployeeByGroupAndCompanyId($companyId, $groupId = 4);
		$this->set('employees', $employees);
	}

	public function add_employee()
	{
		$this->set('sideMenuControl', 'Employee ');
		$this->set('title_for_layout', __('Employee Management'));
		$this->set('pageHeader', array(__('Employee Management'), __('Employee Index')));
		$this->set('breadcrumbs', array(
			array('title' => __('Employee Management'), 'slug' => NULL),
			array('title' => __('Employee List'), 'slug' => NULL),
		));
		$admin = $this->Auth->user();
		$companyId = $this->User->companyIdForEmployee($admin['User']['email']);
		if($this->request->is('post')){
			$data = $this->request->data;
			$this->Employee->set($data);
			if(!empty($data)){
				$fields = array('prefix','first_name','last_name','username','password','email',
					'external_number','mobile_number','skype_id','linkedin_id');
				$validates = $this->Employee->validates(array('fieldList' => $fields));
				if(!empty($validates)){
					$data['Employee']['group_id'] = 4;
					$data['Employee']['company_id'] = $companyId['User']['company_id'];
					$saved = $this->Employee->save($data);
					if($saved){
						$message = __("New Employee added successfully !");
						$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
						$this->redirect($this->request->referer());
					}else{
						$message = __("There is some problem occurred adding New Employee");
						$this->Session->setFlash($message, "default", array('class' => 'alert alert-warning'));
						$this->redirect($this->request->referer());
					}
				}

			}

		}

	}

	public function update_profile($id)
	{
		$this->set('sideMenuControl', 'Employee ');
		$this->set('title_for_layout', __('Employee Management'));
		$this->set('pageHeader', array(__('Employee Management'), __('Employee Index')));
		$this->set('breadcrumbs', array(
			array('title' => __('Employee Management'), 'slug' => NULL),
			array('title' => __('Employee List'), 'slug' => NULL),
		));
		$this->set('eId',$id);
		if (!empty($id) && empty($this->request->data)) {
			$data = $this->Employee->getProfileDetailById($id);
			unset($data["Employee"]["id"]);
			$this->request->data = $data;
		}
		if($this->request->is('post')){
			$data = $this->request->data;
			if(!empty($data)){
			$fields = array('prefix','first_name','last_name',
				'external_number','mobile_number','skype_id','linkedin_id');
			$validates = $this->Employee->validates(array('fieldList' => $fields));
				if($validates){
					$this->Employee->id = $id;
					$flag = $this->Employee->save($data);
					if($flag){
						$message = __("Profile Updated successfully !");
						$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
						$this->redirect($this->request->referer());
					}else{
						$message = __("There is some problem occurred while updating profile");
						$this->Session->setFlash($message, "default", array('class' => 'alert alert-warning'));
						$this->redirect($this->request->referer());
					}
				}
			}

		}

	}

	public function add_role($id){

	}

	public function update_role($id)
	{

	}

	public function active_employee()
	{
	}

	public function inactive_employee()
	{
	}

	public function change_status($id, $status)
	{
		$flag = $this->Employee->getUpdateStatus($id, $status);
		if (!empty($flag)) {
			$this->Session->setFlash(__('Employee status is updated successfully.'), "default",
				array('class' => 'alert alert-success'));
		}
		return $this->redirect($this->referer());
	}

	public function delete_employee($id)
	{
		$this->autoRender = false;
		$flag = $this->Employee->getDeleteEmployee($id);
		if (!empty($flag)) {
			$this->Session->setFlash(__('Employee is deleted successfully.'), "default",
				array('class' => 'alert alert-success'));
		}
		return $this->redirect($this->referer());
	}

	public function employee_detail($id)
	{
		$result = $this->Employee->find('first',array("conditions"=>array("Employee.id"=>$id)));
		$this->set("employee", $result);
	}

}
