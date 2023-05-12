<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EX_Model extends CI_Model {


    protected function _getTableData($tablename, $keyfield, $id = null)
       {

           $fields = array('*');
           if(!$id)
           {
               //get all
               $items = array(
                   'tableName' => $tablename,
                   'field' => $fields,
               );

               if (false === ($rows = $this->dbpdo->get($items))) {
                   return array('error' => $this->dbpdo->getErrorMessage());
               }

               return $rows;
           }
           else
           {
               //get one
               //options where= params, params = data binding, join, groupBy, orderBy, orderType, limit, start,fields
               $where = array(
                   $keyfield .' = :id',
               );

               $params = array(
                   'id' =>  $id,
               );

               $items = array(
                   'tableName' => $tablename,
                   'where'  => $where,
                   'params' => $params,
                   'field' => $fields,
               );
               if (false === ($rows = $this->dbpdo->getOne($items))) {
                   return array('error' => $this->dbpdo->getErrorMessage());
               }

               return $rows;

           }

    }
}//end of class
