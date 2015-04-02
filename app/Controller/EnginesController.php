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

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Security->unlockedActions = array("index", 'create');
        $this->Security->csrfCheck = false;
        $this->Auth->allow();
    }

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
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (!empty($data)) {
                $this->Engine->set($data);
                $fields = array('engine_id', 'name', 'domain_name', 's_language', 't_language', 'tm_file', 'glossaries');
                if ($this->Engine->validates($fields)) {
                    $tmFile = $data['Engine']['tm_file'];
                    if(!empty($data['Engine']['ad_lm_file'])){
                        $extraFields = array('ad_lm_file','tune_corpus_file','test_ln','tune_ln','fast_track_training',
                            'hybrid','casing');
                        $this->Engine->validateExtraFields($extraFields);
                        $adLmFile = $data['Engine']['ad_lm_file'];
                        $data['Engine']['ad_lm_file'] = $adLmFile['name'];
                    }
                    $data['Engine']['tm_file'] = $tmFile['name'];
                    $data['Engine']['user_id'] = 7;
                    $saved = $this->Engine->save($data, false);
                    if ($saved) {
                        $id = $this->Engine->id;
                        if(!empty($tmFile)){
                            $fileCat = "tmFiles";
                            $this->__writeFile($tmFile, $fileCat, $id);
                        }
                        if(!empty($adLmFile)){
                            $fileCat = "lmFiles";
                            $this->__writeFile($adLmFile, $fileCat, $id);
                        }
                        if(!empty($tuneCorpusFile)){
                            $fileCat = "tcFiles";
                            $this->__writeFile($tuneCorpusFile, $fileCat,  $id);
                        }
                        $message = __("New Employee added successfully !");
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
        $dir = WWW_ROOT ."files" . DS . "Engines" . DS . $fileCat . DS . $id;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $flag = move_uploaded_file($file["tmp_name"], $dir . DS . $fileName);
        return $flag;
    }


    public function update()
    {

    }
}
