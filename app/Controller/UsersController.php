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

	public $components = array('Session', 'Captcha');

	public $uses = array("User", "Company", "Country", "JobFunction", "Employee");

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Security->unlockedActions = array("sign_up", "admin_login", "user_login", "change_password",
			"reset_password", "forgot_password", "get_captcha");
		$this->Security->csrfCheck = false;
		$this->Auth->allow("sign_up", "admin_login", "user_login", "forgot_password", "change_password", "get_captcha");
	}

	public function getLastLogin()
	{
		$authUser = $this->Auth->user();
		$conditions = array('User.email' => $authUser['User']['email']);
		$fields = array('User.last_login');
		$lastLogin = $this->User->find('first', array('conditions' => $conditions, 'fields' => $fields));
		return $lastLogin;

	}

	public function get_captcha()
	{
		$this->autoRender = false;
		App::import('Component', 'Captcha');
		$captchanumber = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789abcdefghijklmnpqrstuvwxyz';
		$captchanumber = substr(str_shuffle($captchanumber), 0, 5);
		$this->Session->write('captcha_code', $captchanumber);
		$settings = array(
			'characters' => $captchanumber,
			'winHeight' => 70,         // captcha image height
			'winWidth' => 220,           // captcha image width
			'fontSize' => 25,          // captcha image characters fontsize
			'fontPath' => WWW_ROOT . 'tahomabd.ttf',    // captcha image font
			'noiseColor' => '#ccc',
			'bgColor' => '#fff',
			'noiseLevel' => '100',
			'textColor' => '#000'
		);

		$img = $this->Captcha->ShowImage($settings);
		echo $img;
	}

	public function sign_up()
	{
		$countries = $this->Country->getCountryList();
		$this->set('countries', $countries);
		$this->loadModel('Timezone');
		$timezones = $this->Timezone->getTimezoneList();
		$this->set('timezones', $timezones);
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$sessionCaptcha = $this->Session->read('captcha_code');
			if ($sessionCaptcha == $data["User"]["captcha_code"]) {
				$this->User->set($data['User']);
				$userFields = array('prefix', 'first_name', 'last_name', 'username', 'email', 'password', "is_agree");
				$userFlag = $this->User->validates(array('fieldList' => $userFields));
				$this->Company->set($data['Company']);
				$companyFields = array('company_name', 'email', 'industry', 'vat_id',
					'address', 'city', 'postal_code', 'state', 'country_id');
				$companyFlag = $this->Company->validates(array('fieldList' => $companyFields));
				$userExtraFields = array('alias', 'external_number', 'mobile_number', 'skype_id', 'linkedin_id');
				if (!empty($data['Company']['web_url'])) {
					$this->User->validateExtraFields($userExtraFields);
					$companyExtraFields = array('web_url', 'telephone', 'fax', 'alias', 'timezone_id', 'working_hour', 'cat_tools');
					$this->Company->validateExtraFields($companyExtraFields);
				}
				if ($userFlag && $companyFlag) {
					$companySaved = $this->Company->save($data);
					if ($companySaved) {
						$companyId = $this->Company->id;
						$data['User']['company_id'] = $companyId;
						$data['User']['group_id'] = 3; //this is making User to the company's Admin
						$userSaved = $this->User->save($data);
						if ($userSaved) {
							$adminMailId = $data['User']['email'];
							$adminPassword = $data['User']['password'];
							$sendMail = $this->__sendMailToAdmin($adminMailId, $adminPassword);
							if ($sendMail) {
								$message = __("Your registration made done!");
								$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
								$this->redirect($this->request->referer());
							}
						}
					}
				}
			} else {
				$this->Session->setFlash(__('Captcha code does not match. Please enter right code'));
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
					if(!empty($user)){
						$this->Session->write('userId', $user['User']['id']);
						$this->Session->write('groupId', $user['User']['group_id']);
						$this->Session->write('userEmail', $user['User']['email']);
						$this->Session->write('companyId', $user['User']['company_id']);
					}
					if ($user['User']['group_id'] == 4) {
						$loginTime = date('Y-m-d H:i:s');
						$this->User->id = $user['User']['id'];
						$this->User->saveField('last_login', $loginTime);
						$url = array("controller" => "users", "action" => "dashboard", "plugin" => null);
						return $this->redirect($url);
					} else {
						$loginTime = date('Y-m-d H:i:s');
						$this->User->id = $user['User']['id'];
						$this->User->saveField('last_login', $loginTime);
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
		$this->layout = 'Admin/profile_layout';
		$countries = $this->Country->getCountryList();
		$this->set('countries', $countries);
		$userEmail = $this->Auth->user();
		$user = $this->User->getUserDetailsByEmail($userEmail['User']['email']);
		$this->set('user', $user);
	}

	public function profile()
	{
		$this->layout = 'Admin/profile_layout';
		$userEmail = $this->Auth->user();
		$userData = $this->User->getUserDetailsByEmail($userEmail['User']['email']);
		if (!empty($userEmail) && empty($this->request->data)) {
			$data = $this->User->getUserDetailsByEmail($userEmail['User']['email']);
			unset($data['User']['id']);
			$this->request->data = $data;
		}
		if($this->request->is('post')){
			$data = $this->request->data;
			$this->User->set($data);
			$validates = array('prefix', 'first_name', 'last_name', 'alias' ,'external_number', 'mobile_number'
			,'skype_id', 'linkedin_id');
			$flag = $this->User->validates(array('fieldList' => $validates));
			if($flag){
				$this->User->id = $userData['User']['id'];
				$update = $this->User->save($data);
				if($update){
					$message = __("Your Profile update Successfully!");
					$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
					$this->redirect($this->request->referer());
				}

			}

		}
	}

	public function logout()
	{
		$userEmail = $this->Auth->user();
		$authUser = $this->User->find('first', array('conditions' => array('User.email' => $userEmail['User']['email'])));
		$loginTime = date('Y-m-d H:i:s');
		$this->User->id = $authUser['User']['id'];
		$this->User->saveField('last_login', $loginTime);
		$user = $this->Auth->logout();
		if ($user) {
			$this->Session->delete('userId');
			$this->Session->delete('groupId');
			$this->Session->delete('userEmail');
			$this->Session->delete('companyId');
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

	public function getAuthDetail()
	{
		$authUser = $this->Auth->user();
		$authDetail = $this->User->getAuthDetailByEmail($authUser['User']['email']);
		return $authDetail;
	}


}
