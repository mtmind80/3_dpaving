<?php

class Dummy extends CI_Model
{

    public function getItems()
    {
        $items = array(
            'tableName' => 'dummy',
            'fields' => array(
                '*',
            ),
            'limit' => 6,
        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;
    }

}