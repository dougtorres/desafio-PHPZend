<?php

class Application_Model_DbTable_Marca extends Zend_Db_Table_Abstract
{

    protected $_name = 'marca';
    
     public function getMarcas()
    {
        $select = $this->select()
                    ->order("name asc");
        return $this->fetchAll($select)->toArray();
    }

}

