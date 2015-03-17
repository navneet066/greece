<?php
/**
 * Created by IntelliJ IDEA.
 * User: Himanshu
 * Date: 17/3/15
 * Time: 3:37 PM
 * To change this template use File | Settings | File Templates.
 */
class JobFunction extends AppModel
{

    public $useTable = 'job_functions';

    public function getList()
    {
        $results = $this->find('list', array("fields"=>"JobFunction.name"));
        return $results;
    }

}
