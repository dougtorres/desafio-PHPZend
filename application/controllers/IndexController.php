<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $dbMarca = new Application_Model_DbTable_Marca();
       $result = $dbMarca->fetchAll();
        echo $result->name;
    }


}

