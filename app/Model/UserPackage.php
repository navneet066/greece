<?php

/**
 * Created by IntelliJ IDEA.
 * User: Himanshu
 * Date: 11/28/2015
 * Time: 10:36 PM
 */
class UserPackage extends AppModel
{
    public $name = 'UserPackage';

    public $useTable = 'user_packages';

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'company_id'
        ),
        'Package' => array(
            'className' => 'Package',
            'foreignKey' => 'package_id'
        )
    );

    public function getCompanyPackagesByCompanyId($companyId)
    {
        $conditions = array('UserPackage.company_id' => $companyId);
        $results = $this->find('all', array('conditions' => $conditions));
        return $results;
    }

    public function getUserPackageByCompanyIdForValidate($companyId)
    {
        $conditions = array('UserPackage.company_id' => $companyId);
        $results = $this->find('all', array('conditions' => $conditions));
        if (!empty($results)) {
            return true;
        } else {
            return false;
        }
    }

}