<?php

/**
 * Created by Himanshu M.
 * User: Himanshu
 * Date: 20-04-2015
 * Time: PM 11:06
 */
class PackagesController extends AppController
{
	public $uses = array();

	public $layout = 'Admin/profile_layout';

	public $name = 'Packages';

	public $components = array();

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Security->unlockedActions = array('index', 'create', 'update');
		$this->Security->csrfCheck = false;
		$this->Auth->allow();
	}

	public function index()
	{
		$results = $this->Package->getAllPackageForIndex();
		$this->set('packages', $results);

	}

	public function create()
	{
		if ($this->request->is('post')) {
			$data = $this->request->data;
			if (!empty($data)) {
				$this->Package->set($data);
				$fields = array('name', 'disk_storage', 'compute_hours', 'number_of_engines', 'lang_pairs', 'max_translated_words',
					'min_hour_per_page', 'valid_days', 'min_rate_word', 'min_rate_mb', 'extra_rate_word', 'extra_rate_mb',
					'extra_rate_add_mb', 'extra_rate_add_hour', 'extra_rate_add_engine', 'price');
				if ($this->Package->validates($fields)) {
					$saved = $this->Package->save($data);
					if ($saved) {
						$message = __("New Package added successfully !");
						$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
						$this->redirect(array("controller" => "packages", "action" => "index", "plugin" => null));
					}

				}

			}

		}
	}

	public function update($id)
	{
		$this->set("id", $id);
		if (!empty($id) && empty($this->request->data)) {
			$result = $this->Package->getPackageForUpdate($id);
			unset($result['Package']['id']);
			$this->request->data = $result;

		}
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->Package->id = $id;
			$flag = $this->Package->save($data);
			if ($flag) {
				$message = __("New Package Updated successfully !");
				$this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
				$this->redirect($this->request->referer());
			}
		}

	}

}
