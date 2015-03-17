<?php
/**
 * Created by IntelliJ IDEA.
 * User: Himanshu Mishra
 * Date: 17/3/15
 * Time: 1:20 PM
 * To change this template use File | Settings | File Templates.
 */

class HomesController extends AppController{

    public $name = 'Homes';

    public $uses = array('User', 'Home', 'Country');

    public $layout = 'homes';

    public  function index(){

    }
}

