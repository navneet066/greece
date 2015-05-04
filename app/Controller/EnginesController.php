<?php

/**
 * Created by IntelliJ IDEA.
 * User: Himanshu
 * Date: 01-04-2015
 * Time: PM 08:02
 */
class EnginesController extends AppController
{
	public $name = 'Engines';

	public $layout = 'Admin/profile_layout';

	public $uses = array('User', 'Engine', 'Timezone');

	public $components = array('Auth');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Security->unlockedActions = array("index", 'create');
		$this->Security->csrfCheck = false;
		$this->Auth->allow();
	}

	public function index()
	{
		$this->set('sideMenuControl', 'Engine ');
		$this->set('title_for_layout', __('Engine Management'));
		$this->set('pageHeader', array(__('Engine Management'), __('Engine Index')));
		$this->set('breadcrumbs', array(
			array('title' => __('Engine Management'), 'slug' => NULL),
			array('title' => __('Engine List'), 'slug' => NULL),
		));
		if (!($this->Auth->loggedIn())) {
			return $this->redirect(array('controller' => 'users', 'action' => 'admin_login'));
		}
		$this->set('sideMenuControl', 'index');
		$this->set('title_for_layout', __('Engine Management ::Index'));
		$this->set('pageHeader', array(__('Engine'), __('All Engine')));
		$this->set('breadcrumbs', array(
			array('title' => __('Engine Management'), 'slug' => NULL),
			array('title' => __('All Engine'), 'slug' => NULL),
		));

		$authUser = $this->Auth->user();
		$userId = $this->User->getAuthDetailByEmail($authUser['User']['email']);
		$engines = $this->Engine->getAllEngineByUserId($userId['User']['id']);
		$this->set('engines', $engines);

	}

	public function create()
	{
		$this->set('sideMenuControl', 'Engine ');
		$this->set('title_for_layout', __('Engine Management'));
		$this->set('pageHeader', array(__('Engine Management'), __('Engine Index')));
		$this->set('breadcrumbs', array(
			array('title' => __('Engine Management'), 'slug' => NULL),
			array('title' => __('Engine List'), 'slug' => NULL),
		));
		if (!($this->Auth->loggedIn())) {
			return $this->redirect(array('controller' => 'users', 'action' => 'admin_login'));
		}
		$this->set('sideMenuControl', 'index');
		$this->set('title_for_layout', __('Engine Management :: Create'));
		$this->set('pageHeader', array(__('Engine'), __('Add Engine')));
		$this->set('breadcrumbs', array(
			array('title' => __('Engine Management'), 'slug' => NULL),
			array('title' => __('Add Engine'), 'slug' => NULL),
		));
		$this->loadModel('Language');
		$languages = $this->Language->getAllLanguageList();
		$this->set('languages', $languages);
		if ($this->request->is('post')) {
			$user = $this->Auth->user();
			$authUser = $this->User->getAuthDetailByEmail($user['User']['email']);
			$data = $this->request->data;
			if (!empty($data)) {
				$this->Engine->set($data);
				$fields = array('engine_id', 'name', 'domain_name', 's_language', 't_language', 'tm_file', 'glossaries');
				if ($this->Engine->validates($fields)) {
					$tmFile = $data['Engine']['tm_file'];
					if (!empty($data['Engine']['ad_lm_file'])) {
						$extraFields = array('ad_lm_file', 'tune_corpus_file', 'test_ln', 'tune_ln', 'fast_track_training',
							'hybrid', 'casing');
						$this->Engine->validateExtraFields($extraFields);
						$adLmFile = $data['Engine']['ad_lm_file'];
						$data['Engine']['ad_lm_file'] = $adLmFile['name'];
					}
					$data['Engine']['tm_file'] = $tmFile['name'];
					$data['Engine']['user_id'] = $authUser['User']['id'];
					$data['Engine']['company_id'] = $authUser['User']['company_id'];
					$saved = $this->Engine->save($data, false);
					if ($saved) {
						$id = $this->Engine->id;
						if (!empty($tmFile)) {
							$fileCat = "tmFiles";
							$this->__writeFile($tmFile, $fileCat, $id);
						}
						if (!empty($adLmFile)) {
							$fileCat = "lmFiles";
							$this->__writeFile($adLmFile, $fileCat, $id);
						}
						if (!empty($tuneCorpusFile)) {
							$fileCat = "tcFiles";
							$this->__writeFile($tuneCorpusFile, $fileCat, $id);
						}
						$message = __("New Engine added successfully !");
						$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
						$this->redirect($this->request->referer());
					}
				}
			}

		}

	}


	private function __writeFile($file, $fileCat, $id)
	{
		$fileName = $file["name"];
		$dir = WWW_ROOT . "files" . DS . "Engines" . DS . $fileCat . DS . $id;
		if (!is_dir($dir)) {
			mkdir($dir, 0777, true);
		}
		$flag = move_uploaded_file($file["tmp_name"], $dir . DS . $fileName);
		return $flag;
	}


	public function update($id)
	{
		$this->set('sideMenuControl', 'Engine ');
		$this->set('title_for_layout', __('Engine Management'));
		$this->set('pageHeader', array(__('Engine Management'), __('Engine Index')));
		$this->set('breadcrumbs', array(
			array('title' => __('Engine Management'), 'slug' => NULL),
			array('title' => __('Engine List'), 'slug' => NULL),
		));
		if (!($this->Auth->loggedIn())) {
			return $this->redirect(array('controller' => 'users', 'action' => 'admin_login'));
		}
		$this->set('id', $id);
		if (!empty($id) && empty($this->request->data)) {
			$engines = $this->Engine->getEngineDetailById($id);
			unset($engines['Engine']['id']);
			$this->request->data = $engines;
		}
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->Engine->id = $id;
			$flag = $this->Engine->save($data);
			if ($flag) {
				$message = __("New Engine Updated successfully !");
				$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
				$this->redirect($this->request->referer());
			}
		}

	}

	public function remove($id)
	{
		if (!($this->Auth->loggedIn())) {
			return $this->redirect(array('controller' => 'users', 'action' => 'admin_login'));
		}
		$flag = $this->Engine->getRemoveEngine($id);
		if ($flag) {
			$message = __(" Engine Deleted now! ");
			$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
			$this->redirect($this->request->referer());
		} else {
			$message = __(" Engine Can't Deleted now, Please try lator ");
			$this->Session->setFlash($message, "default", array('class' => 'alert alert-info'));
			$this->redirect($this->request->referer());
		}
	}
}
