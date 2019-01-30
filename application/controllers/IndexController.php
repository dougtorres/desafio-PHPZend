<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        $this->logger = Zend_Registry::get('logger');
    }

    public function indexAction() {
        $marcasJson = file_get_contents('http://fipeapi.appspot.com/api/1/carros/marcas.json');
        $marcas = Zend_Json::decode($marcasJson);
        $carrosJson = file_get_contents('http://fipeapi.appspot.com/api/1/carros/veiculos/21.json');
        $carros= Zend_Json::decode($carrosJson);
        $dbMarca = new Application_Model_DbTable_Marca();
        print_r();
        $this->logger->log($dbMarca, Zend_log::DEBUG);
        $configuration = new Zend_Config_Ini(
                APPLICATION_PATH . '\configs\application.ini', 'production'
        );
        $params = $configuration->resources->db->params->toArray();
        $DB = new Zend_Db_Adapter_Pdo_Mysql($params);
        foreach ($marcas as $row) {
            $validator = new Zend_Validate_Db_RecordExists(
                    array(
                'table' => 'marca',
                'field' => 'id',
                'adapter' => $DB
                    )
            );
            if (!$validator->isValid($row["id"])) {
                $novaMarca = array(
                    "id" => $row["id"],
                    "name" => $row["name"],
                    "fipe_name" => $row["fipe_name"],
                    "order" => $row["order"],
                    "key" => $row["key"],
                );
                $dbMarca->insert($novaMarca);
                $this->logger->log("Achei", Zend_log::DEBUG);
            } else
                $this->logger->log("Achei", Zend_log::DEBUG);
        }

        foreach ($carros as $row) {
            $validator = new Zend_Validate_Db_RecordExists(
                    array(
                'table' => 'carro',
                'field' => 'id',
                'adapter' => $DB
                    )
            );
            if (!$validator->isValid($row["id"])) {
                $novoCarro = array(
                    "id" => $row["id"],
                    "name" => $row["name"],
                    "fipe_name" => $row["fipe_name"],
                    "order" => $row["order"],
                    "key" => $row["key"],
                );
                $dbMarca->insert($novaMarca);
                $this->logger->log("Achei", Zend_log::DEBUG);
            } else
                $this->logger->log("Achei", Zend_log::DEBUG);
        }
    }

}
