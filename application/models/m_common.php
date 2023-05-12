<?php

class M_Common Extends CI_Model
{


public function _getVehicleLogTypes()

{
    //vehicle types
    $items = array(
        'tableName' => 'dataLkpCompanyVehicleLogTypes',
        'fields' => array(
            '*',
        ),
        'orderBy' =>'vlogType',

    );
    if (false === ($rows = $this->dbpdo->get($items))) {
        return array('error' => $this->dbpdo->getErrorMessage());
    }

    return $rows;



}

    public function _getTimeValues()
    {


        $items = array(
            'tableName' => 'dataLkpTimeValues',
            'fields' => array(
                '*',
            ),
            'orderBy' =>'timevalue',

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }

    public function _getVTypes()
    {
        //vehicle types
        $items = array(
            'tableName' => 'dataLkpVehicleTypes',
            'fields' => array(
                '*',
            ),

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }

    public function _saveLocations($id)


    {

        $locManager = $this->validate->post('locManager', 'SAFETEXT', FALSE);
        $locName = $this->validate->post('locName', 'SAFETEXT');
        $locAddress = $this->validate->post('locAddress', 'SAFETEXT', FALSE);
        $locCity = $this->validate->post('locCity', 'SAFETEXT', FALSE);
        $locState = $this->validate->post('locState', 'SAFETEXT', FALSE);
        $locZip = $this->validate->post('locZip', 'SAFETEXT', FALSE);
        $locPhone = $this->validate->post('locPhone', 'SAFETEXT', FALSE);



        $data['locManager'] = $locManager;
        $data['locPhone'] = $locPhone;
        $data['locAddress'] = $locAddress;
        $data['locState'] = $locState;
        $data['locCity'] = $locCity;
        $data['locZip'] = $locZip;
        $data['locName'] = $locName;

        if(!$id)
        { // insert


            $items = array(
                'tableName' => ' dataTblLocations',
                'data'      => $data,
            );
            if (!$this->dbpdo->insert($items)) {
                 return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

        }
        else

        {
            //update
            $where = array(
                'locID = :locID',
            );
            $params = array(
                'locID' => $id,
            );

            $items = array(
                'tableName' => ' dataTblLocations',
                'data'      => $data,
                'where' => $where,
                'params' => $params,
            );
            if (!$this->dbpdo->update($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }


        }

    }




    public function _getLocations($id = null)
    {
        //get office locations
        if(!$id)
        {

            $items = array(
                'tableName' => 'dataTblLocations',
                'fields' => array(
                    '*',
                ),

            );
            if (false === ($rows = $this->dbpdo->get($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }




        }
        else
        {

            $items = array(
                'tableName' => 'dataTblLocations',
                'fields' => array('*'),
                'where' => 'locID =' .$id,
              );
            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

        }

        return $rows;


    }



       public function _getHelp($id)


       {

           //get one
           $where = array(
               'helpID = :id',
           );

           $params = array(
               'id' =>  $id,
           );

           $items = array(
               'tableName' => 'sysHelp',
               'where'  => $where,
               'params' => $params,
           );
           if (false === ($rows = $this->dbpdo->getOne($items))) {
               return array('error' => $this->dbpdo->getErrorMessage());
           }

           return $rows;


       }


    public function _getCompanyList()

    {

        $tablename = 'POTblJobOrders';

        $join = array('JOIN crmTblContacts on crmTblContacts.cntId = POTblJobOrders.jobcntID');
        //$fields = array('p.jobcntID', 'c.cntFirstName');
        $fields = array('POTblJobOrders.jobcntID, crmTblContacts.cntFirstName');
        $orderBy ="crmTblContacts.cntFirstName";
        $groupBy ="POTblJobOrders.jobcntID";

        $items = array(
            'tableName' => $tablename,
            'groupBy' => $groupBy,
            'join' => $join,
            'fields' => $fields,
            'orderBy' => $orderBy,
        );


        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }




    public function _getManagerList()

    {

        $tablename = 'crmTblContacts';



        $fields = array('cntId',
            'cntFirstName',
            'cntLastName',
        );


        $join = array(
            'INNER JOIN POTblJobOrders ON POTblJobOrders.jobCreatedBy = crmTblContacts.cntId',
        );

        $where = array(
            'cntIsEmployee = 1',
            'cntStatusId = 1',
            'cntRole = 1',
        );


        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'join' => $join,
            'groupBy' =>'cntId',
            'orderBy' => 'cntFirstName, cntLastName',
        );

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }



    public function _getEmployeeList()

    {

        $tablename = 'crmTblContacts';



        $fields = array('cntId',
            'cntFirstName',
            'cntLastName',
        );




            $where = array(
                'cntIsEmployee = 1',
                'cntStatusId = 1',
            );


            $items = array(
                'tableName' => $tablename,
                'where'  => $where,
                'fields' => $fields,
                'orderBy' => 'cntFirstName, cntLastName',
            );


            if (false === ($rows = $this->dbpdo->get($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;


    }



    public function _getLastTasks($userid, $limit = 5) //get last five
    {

        $tablename = 'taskTblTaskManager';

        $join = array(
            'LEFT JOIN crmTblContacts m ON taskTblTaskManager.taskCreatedBy = m.cntId',
        );
        $fields = array('taskTblTaskManager.*','CONCAT(m.cntFirstName, " " , m.cntLastName) as Creator',
        );
        $where = array('taskStatus = 0','taskAssignedTo = ' . $userid);

        $orderBy ="taskDueDate";
        $orderType ="DESC";
        //get all
        $items = array(
            'tableName' => $tablename,
            'join' => $join,
            'fields' => $fields,
            'where' => $where,
            'limit' => $limit,
            'orderBy' => $orderBy,
            'orderType' => $orderType,
        );


        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }


public function _getLastMessages()
{

    $tablename = 'msgTblMessages';

    $fields = array('*',
    );
    $where = array('msgRead = 0','msgOwnerID  = ' . $this->USER_ID,'msgSenderID  <> ' . $this->USER_ID);


    //get all
    $items = array(
        'tableName' => $tablename,
        'fields' => $fields,
        'where' => $where,
    );
    $total_records = $this->dbpdo->count($items);
    return $total_records;
}


    public function _getWidget($tablename,$keyfield, $labelfield,$orderby = null, $groupby = null)
    {


        $fields = array($keyfield, $labelfield);
        if($orderby)
        {

        }
        if($groupby)
        {

        }

        //get all
        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
        );

        if($orderby)
        {
            $items['orderBy'] = $orderby;
        }
        if($groupby)
        {
            $items['groupBy'] = $groupby;

        }

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }
}