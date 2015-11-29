<?php

class TranslationJobsController extends AppController
{
    public $name = "TranslationJobs";

    public $uses = array('TranslationJob', 'User', 'Company', 'Engine', 'Employee', 'Language');

    public $layout = 'Admin/profile_layout';

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Security->unlockedActions = array("index", 'create', '__writeFile','create_by_engine');
        $this->Security->csrfCheck = false;
        $this->Auth->allow();
    }

    public function getLanguageName($languageId)
    {
        $result = $this->Language->getNameById($languageId);
        return $result;
    }

    public function index()
    {
        $authUserId = $this->Session->read('userId');
        $results = $this->TranslationJob->getAllJobsByUserId($authUserId);
        $this->set('results', $results);

    }

    public function create()
    {
        $languages = $this->Language->getAllLanguageList();
        $this->set('languages', $languages);
        $this->set('formDisable', 'no');
        $authUserId = $this->Session->read('userId');
        $authCompanyId = $this->Session->read('companyId');
        $engines = $this->Engine->getEngineListCompanyId($authCompanyId);
        $this->set('engines', $engines);
        $this->loadModel('UserPackage');
        $companyPackage = $this->UserPackage->getUserPackageByCompanyIdForValidate($authCompanyId);
        if(empty($companyPackage)){
            $message = __("You Don't have any Package Selected Please Select any !");
            $this->Session->setFlash($message, "default", array('class' => 'alert alert-danger'));
            $this->set('formDisable', 'ok');
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (!empty($data)) {
                $fields = array("engine_id", "s_language", "t_language", "translation_file", "high_gloss", "low_gloss");
                $this->TranslationJob->set($data);
                if ($this->TranslationJob->validates($fields)) {
                    $translationFile = $data['TranslationJob']['translation_file'];
                    $translationFileName = $translationFile['name'];
                    $highGlossaryFile = $data['TranslationJob']['high_gloss'];
                    $highGlossaryFileName = $highGlossaryFile['name'];
                    $lowGlossaryFile = $data['TranslationJob']['low_gloss'];
                    $lowGlossaryFileName = $lowGlossaryFile['name'];
                    if (!empty($translationFileName) && !empty($highGlossaryFileName) && !empty($lowGlossaryFileName)) {
                        $data['TranslationJob']['translation_file'] = $translationFileName;
                        $data['TranslationJob']['high_gloss'] = $highGlossaryFileName;
                        $data['TranslationJob']['low_gloss'] = $lowGlossaryFileName;
                        $data['TranslationJob']['user_id'] = $authUserId;
                        $data['TranslationJob']['company_id'] = $authCompanyId;
                        $result = $this->TranslationJob->save($data, false);
                        if ($result) {
                            $id = $this->TranslationJob->id;
                            if (!empty($translationFile)) {
                                $fileCat = "translation";
                                $this->__writeFile($translationFile, $fileCat, $id);
                            }
                            if (!empty($highGlossaryFile)) {
                                $fileCat = "highGloss";
                                $this->__writeFile($highGlossaryFile, $fileCat, $id);
                            }
                            if (!empty($lowGlossaryFile)) {
                                $fileCat = "lowGloss";
                                $this->__writeFile($lowGlossaryFile, $fileCat, $id);
                            }
                            $message = __("New Translation Job added successfully !");
                            $this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
                            $this->redirect($this->request->referer());
                        } else {
                            $message = __("Could not add this time Please Check and try again !");
                            $this->Session->setFlash($message, "default", array('class' => 'alert alert-danger'));
                            $this->redirect($this->request->referer());
                        }
                    } else {
                        $message = __("Could not add this time Please verify all files !");
                        $this->Session->setFlash($message, "default", array('class' => 'alert alert-danger'));
                        $this->redirect($this->request->referer());
                    }
                }
            }

        }
    }

    private function __writeFile($file, $fileCat, $id)
    {
        $fileName = $file["name"];
        $dir = WWW_ROOT . "files" . DS . "TranslationJob" . DS . $fileCat . DS . $id;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $flag = move_uploaded_file($file["tmp_name"], $dir . DS . $fileName);
        return $flag;
    }

    public function update()
    {
    }

    public function remove($id)
    {
        $result = $this->TranslationJob->getDeleteById($id);
        if ($result) {
            $message = __("Translation Job Deleted now! ");
            $this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
            $this->redirect($this->request->referer());
        } else {
            $message = __("Translation Job Can't Deleted now, Please try later ");
            $this->Session->setFlash($message, "default", array('class' => 'alert alert-info'));
            $this->redirect($this->request->referer());
        }
    }

    public function create_by_engine($engineId)
    {
        $this->set('id', $engineId);
        $authUserId = $this->Session->read('userId');
        $authCompanyId = $this->Session->read('companyId');
        $engine = $this->Engine->getEngineDetailByEngineIdForJob($engineId);
        $this->set('engine', $engine);
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (!empty($data)) {
                $fields = array("translation_file", "high_gloss", "low_gloss");
                $this->TranslationJob->set($data);
                if ($this->TranslationJob->validates($fields)) {
                    $translationFile = $data['TranslationJob']['translation_file'];
                    $translationFileName = $translationFile['name'];
                    $highGlossaryFile = $data['TranslationJob']['high_gloss'];
                    $highGlossaryFileName = $highGlossaryFile['name'];
                    $lowGlossaryFile = $data['TranslationJob']['low_gloss'];
                    $lowGlossaryFileName = $lowGlossaryFile['name'];
                    if (!empty($translationFileName) && !empty($highGlossaryFileName) && !empty($lowGlossaryFileName)) {
                        $data['TranslationJob']['translation_file'] = $translationFileName;
                        $data['TranslationJob']['high_gloss'] = $highGlossaryFileName;
                        $data['TranslationJob']['low_gloss'] = $lowGlossaryFileName;
                        $data['TranslationJob']['user_id'] = $authUserId;
                        $data['TranslationJob']['company_id'] = $authCompanyId;
                        $data['TranslationJob']['engine_id'] = $engineId;
                        $data['TranslationJob']['s_language'] = $engine['Engine']['s_language'];
                        $data['TranslationJob']['t_language'] = $engine['Engine']['t_language'];

                        $result = $this->TranslationJob->save($data, false);
                        if ($result) {
                            $id = $this->TranslationJob->id;
                            if (!empty($translationFile)) {
                                $fileCat = "translation";
                                $this->__writeFile($translationFile, $fileCat, $id);
                            }
                            if (!empty($highGlossaryFile)) {
                                $fileCat = "highGloss";
                                $this->__writeFile($highGlossaryFile, $fileCat, $id);
                            }
                            if (!empty($lowGlossaryFile)) {
                                $fileCat = "lowGloss";
                                $this->__writeFile($lowGlossaryFile, $fileCat, $id);
                            }
                            $message = __("New Translation Job added successfully !");
                            $this->Session->setFlash($message, "default", array('class' => 'alert alert-success'));
                            $this->redirect($this->request->referer());
                        } else {
                            $message = __("Could not add this time Please Check and try again !");
                            $this->Session->setFlash($message, "default", array('class' => 'alert alert-danger'));
                            $this->redirect($this->request->referer());
                        }
                    } else {
                        $message = __("Could not add this time Please verify all files !");
                        $this->Session->setFlash($message, "default", array('class' => 'alert alert-danger'));
                        $this->redirect($this->request->referer());
                    }
                }
                $message = __("Could not add this time Please verify all files !");
                $this->Session->setFlash($message, "default", array('class' => 'alert alert-danger'));
                $this->redirect($this->request->referer());
            }

        }

    }
}

