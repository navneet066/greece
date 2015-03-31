<?php

/**
 * Class UsersController
 * User: Himanshu
 * Date: 2015-03-13
 */
App::uses('AppController', 'Controller');

class UsersController extends AppController
{
	public $name = 'Users';

	public $layout = "users";

	public $uses = array("User", "Company", "Country", "JobFunction", "Employee");

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Security->unlockedActions = array("sign_up", "admin_login", "user_login", "change_password",
			"reset_password", "forgot_password");
		$this->Security->csrfCheck = false;
		$this->Auth->allow("sign_up", "admin_login", "user_login", "forgot_password", "change_password");
	}

	public function sign_up()
	{
		$countries = $this->Country->getCountryList();
		$this->set('countries', $countries);
		$this->loadModel('Timezone');
		$timezones = $this->Timezone->getTimezoneList();
		$this->set('timezones', $timezones);
		if ($this->request->is('post')) {
			//session_start();
			$data = $this->request->data;
			/*if ($this->Session->read("code") == $data["User"]["captcha"]) {*/
			$this->User->set($data['User']);
			$userFields = array('prefix', 'first_name', 'last_name', 'username', 'email', 'password', "is_agree");
			$userFlag = $this->User->validates(array('fieldList' => $userFields));
			$this->Company->set($data['Company']);
			$companyFields = array('company_name', 'email', 'industry_id', 'vat_id',
				'address', 'city', 'postal_code', 'state', 'country_id');
			$companyFlag = $this->Company->validates(array('fieldList' => $companyFields));
			$userExtraFields = array('alias', 'external_number', 'mobile_number', 'skype_id', 'linkedin_id');
			if (!empty($data['Company']['web_url'])) {
				$this->User->validateExtraFields($userExtraFields);
				$companyExtraFields = array('web_url', 'telephone', 'fax', 'alias', 'timezone_id', 'working_hour', 'cat_tools');
				$this->Company->validateExtraFields($companyExtraFields);
			}
			if ($userFlag && $companyFlag) {
				$companySaved = $this->Company->save($data['Company']);
				if ($companySaved) {
					$companyId = $this->Company->id;
					$data['User']['company_id'] = $companyId;
					$data['User']['group_id'] = 3; //this is making User to the company's Admin
					$userSaved = $this->User->save($data);
					if ($userSaved) {
						$adminMailId = $data['User']['email'];
						$adminPassword = $data['User']['password'];
						$sendMail = $this->__sendMailToAdmin($adminMailId, $adminPassword);
						if (!empty($sendMail)) {
							$this->redirect(array("controller" => 'users', 'action' => 'sign_up'));
							$message = __("Thanks for registering Verification! request is sent to your mail id");
							$this->set("message", $message);
						}
					}
				}
				/*}*/
			}
		}
	}

	private function __sendMailToAdmin($adminMail, $adminPassword)
	{

		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail("gmail");
		$email->emailFormat('html');
		$email->from('mail78412@gmail.com');
		$email->to($adminMail);
		$email->subject("Testing mail Sending only");
		$message = "<div>Hello,</div><div>UserName:" . $adminMail .
			"</div><div>Password: " . $adminPassword . "</div>";
		if ($email->send($message)) {
			return true;
		} else {
			return false;
		}
	}


	public function admin_login()
	{
		$this->layout = 'admin_login_layout';
		if ($this->Auth->loggedIn()) {
			return $this->redirect($this->Auth->redirectUrl());
		}
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->User->set($data);
			if ($this->User->validateLogin()) {
				$email = $data["User"]["email"];
				if ($this->Auth->login($data)) {
					$user = $this->User->find('first', array('conditions' => array('User.email' => $email)));
					if ($user['User']['group_id'] == 4) {
						$url = array("controller" => "users", "action" => "user_dashboard", "plugin" => null);
						return $this->redirect($url);
					} else {
						$url = array("controller" => "users", "action" => "dashboard", "plugin" => null);
						return $this->redirect($url);
					}
				}
			}

		}
	}

	public function user_dashboard()
	{

	}

	public function dashboard()
	{
		$this->set('sideMenuControl', 'index');
		$this->set('title_for_layout', __('User :: Admin DashBoard'));
		$this->set('pageHeader', array(__('Users'), __('Admins')));
		$this->set('breadcrumbs', array(
			array('title' => __('Admin Dashboard'), 'slug' => NULL),
		));
		$this->layout = 'Admin/admin_profile_layout';
		$countries = $this->Country->getCountryList();
		$this->set('countries', $countries);
		$userEmail = $this->Auth->user();
		$user = $this->User->getUserDetailsByEmail($userEmail['User']['email']);
		$this->set('user', $user);
	}

	public function profile()
	{
		$this->autoRender = false;
	}

	public function add_employee()
	{
		$admin = $this->Auth->user();
		$companyId = $this->User->companyIdForEmployee($admin['User']['email']);
		$this->layout = 'Admin/admin_profile_layout';
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->Employee->set($data);
			if (!empty($data)) {
				$fields = array('prefix', 'first_name', 'last_name', 'username', 'password', 'email',
					'external_number', 'mobile_number', 'skype_id', 'linkedin_id');
				$validates = $this->Employee->validates(array('fieldList' => $fields));
				if (!empty($validates)) {
					$data['Employee']['group_id'] = 4;
					$data['Employee']['company_id'] = $companyId['User']['company_id'];
					$saved = $this->Employee->save($data);
					if ($saved) {
						$message = __("New Employee added successfully !");
						$this->Session->setFlash($message, "default", array('class' => 'alert alert-warning'));
						$this->redirect($this->request->referer());
					} else {
						$message = __("There is some problem occurred adding New Employee");
						$this->Session->setFlash($message, "default", array('class' => 'alert alert-warning'));
						$this->redirect($this->request->referer());
					}
				}

			}

		}

	}

	public function logout()
	{
		$user = $this->Auth->logout();
		if ($user) {
			$message = __("Log out Successful");
			$this->Session->setFlash($message, "default", array('class' => 'alert alert-warning'));
			$url = array('controller' => 'users', 'action' => 'admin_login', 'plugin' => null);
			return $this->redirect($url);
		}
	}

	public function user_login()
	{

	}

	public function forgot_password()
	{
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$email = $data['User']['email'];
			$this->User->set($data);
			$validate = $this->User->validateEmailForForgotPassword();
			if ($validate) {
				$code = $this->User->get_forgot_password_code();
				if (!empty($code)) {
					$userData = $this->User->find('first', array('conditions' => array('User.email' => $email)));
					$this->User->id = $userData['User']['id'];
					$flag = $this->User->saveField('password_reset_code', $code);
					if ($flag) {
						$sendMail = $this->__sendMailForForgotPassword($email, $code);
						if ($sendMail) {
							$message = __("Password reset link sent to your mail id!");
							$this->Session->setFlash($message, "default", array('class' => 'alert alert-warning'));
							$this->redirect($this->request->referer());
						}
					}
				}

			}

		}

	}

	public function __sendMailForForgotPassword($userEmail, $code)
	{
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail("gmail");
		$email->emailFormat('html');
		$email->from('mail78412@gmail.com');
		$email->to($userEmail);
		$email->subject("Reset Password");
		$message = "<div>Hello,</div><div>" . ' ' . $userEmail . " <br>" . "Please copy this password-reset code and use it for reset password " .
			"</div><div>Password Reset Code is : " . "$code" . "</div>" . "<div>Open this link in new tab
            http://localhost/greece/users/forgot_password </div>";
		if ($email->send($message)) {
			return true;
		} else {
			return false;
		}
	}

	public function change_password()
	{
		/*if($this->request->is('post')){
			$data = $this->request->data;
			$resetCode =

		}*/

	}

	public function reset_password()
	{

		if ($this->request->is("post")) {
			$authUser = $this->Auth->user();
			$authDetail = $this->User->getAuthDetailByEmail($authUser['User']['email']);
			$id = $authDetail['User']['id'];
			$userEmail = $authUser['User']['email'];
			$fullName = $authDetail['User']['full_name'];
			$data = $this->request->data;
			$this->User->set($data);
			$fields = array("new_password", "old_password");
			$flag = $this->User->validateUpdateUserPassword($fields);
			if ($flag) {
				$oldPassword = $data['User']['old_password'];
				$newPassword = $data['User']['new_password'];
				$updatePassword = $this->User->validPasswordUpdate($id, $oldPassword, $newPassword);
				if ($updatePassword) {
					$this->__sendUpdateMailToUser($userEmail, $newPassword, $fullName);
				} else {

				}
			}

		}
	}

	private function __sendUpdateMailToUser($userEmail, $newPassword, $name)
	{
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail("gmail");
		$email->emailFormat('html');
		$email->from('mail78412@gmail.com');
		$email->to($userEmail);
		$email->subject("Update Password");
		$message = "<div>Hello,</div><div>UserName: " . ' ' . $userEmail .
			"</div><div>Password : " . $newPassword . "</div>";
		if ($email->send($message)) {
			return true;
		} else {
			return false;
		}
	}

	public function getJobFunctionList()
	{
		$this->autoRender = false;
		$results = $this->JobFunction->getList();
		return $results;
	}


}
