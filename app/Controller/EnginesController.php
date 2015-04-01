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

	public $layout = 'Admin/admin_profile_layout';

	public function index()
	{
		$this->set('sideMenuControl', 'index');
		$this->set('title_for_layout', __('Engine Management ::Index'));
		$this->set('pageHeader', array(__('Engine'), __('All Engine')));
		$this->set('breadcrumbs', array(
			array('title' => __('Engine Management'), 'slug' => NULL),
			array('title' => __('All Engine'), 'slug' => NULL),
		));

	}

	public function create()
	{
		$this->set('sideMenuControl', 'index');
		$this->set('title_for_layout', __('Engine Management :: Create'));
		$this->set('pageHeader', array(__('Engine'), __('Add Engine')));
		$this->set('breadcrumbs', array(
			array('title' => __('Engine Management'), 'slug' => NULL),
			array('title' => __('Add Engine'), 'slug' => NULL),
		));
		if($this->request->is('post')){
			$data = $this->request->data;
			if(!empty($data)){
				$this->Engine->set($data);
				$fields = array('');
				if($this->Engine->validates($fields)){

				}
			}

		}

	}

	public function update()
	{

	}
}
