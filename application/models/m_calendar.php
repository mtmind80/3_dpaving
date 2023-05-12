<?php

class M_Calendar extends CI_Model
{




    public function getDate($ddate)
    {


        $items = array(
            'tableName' => 'sysWebConfig',
            'fields' => array(
                '*',
            ),

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;
    }



    public function _getReminders($startdate = null, $enddate = null, $id = null)
    {

        $tablename = 'crmTblContactNotes';

        $fields = array('*', 'm.cntFirstName', 'm.cntLastName'
        );


        $join = array(
            'LEFT JOIN crmTblContacts m ON crmTblContactNotes.cnotContactId = m.cntId',
        );
        $orderBy ="cnotReminderDate";
        $orderType ="ASC";

        if($id)
        {
            $where = array(
                'cnotId = :id',
                'cnotCreatedby = :userid',

            );
            $params = array(
                'id' =>  $id,
                'userid' =>  $this->USER_ID,
            );

        }
        else //get all
        {
            $where = array(
                'cnotCreatedby = :userid',
                'cnotReminder = :sent',
                'cnotReminderDate >= :startdate',
                'cnotReminderDate < :enddate',
            );

            $params = array(
                'userid' =>  $this->USER_ID,
                'sent' =>  1,
                'startdate' =>  $startdate,
                'enddate' =>  $enddate,
            );

        }

        //now get records
        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'join' => $join,
            'params' => $params,
            'orderBy' => $orderBy,
            'orderType' => $orderType,
            'where' => $where,
        );

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;

    }



    public function _getRemindersCount($startdate = null, $enddate = null)
    {

        $tablename = 'crmTblContactNotes';

        $fields = array('*', 'm.cntFirstName', 'm.cntLastName'
        );


        $join = array(
            'LEFT JOIN crmTblContacts m ON crmTblContactNotes.cnotContactId = m.cntId',
        );
        $orderBy ="cnotReminderDate";
        $orderType ="ASC";

            $where = array(
                'cnotCreatedby = :userid',
                'cnotReminderDate >= :startdate',
                'cnotReminderDate < :enddate',
            );

            $params = array(
                'userid' =>  $this->USER_ID,
                'startdate' =>  $startdate,
                'enddate' =>  $enddate,
            );


        //now get records
        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'join' => $join,
            'params' => $params,
            'orderBy' => $orderBy,
            'orderType' => $orderType,
            'where' => $where,
        );

        if (false === ($rows = $this->dbpdo->count($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;

    }



    public function _getRemindersList($startdate = null)
    {

        if(!$startdate)
        {
            $date = strtotime('yesterday');
            $oDate = new DateTime();
            $oDate->modify('-1 day');
            $startdate = $oDate->format('Y-m-d');

        }

        $tablename = 'crmTblContactNotes';

        $fields = array('*', 'm.cntFirstName', 'm.cntLastName'
        );

        $orderBy ="cnotReminderDate";
        $orderType ="ASC";


        $join = array(
            'LEFT JOIN crmTblContacts m ON crmTblContactNotes.cnotContactId = m.cntId',
        );

            $where = array(
                'cnotCreatedby = :userid',
                'cnotReminder = :sent',
                'cnotReminderDate >= :startdate',
            );

            $params = array(
                'userid' =>  $this->USER_ID,
                'sent' =>  1,
                'startdate' =>  $startdate,
            );


        //now get records
        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'join' => $join,
            'limit' => 5,
            'orderBy' => $orderBy,
            'orderType' => $orderType,
            'params' => $params,
            'where' => $where,
        );

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;

    }


    public function _getCompanyEvents($month, $year)
    {

        $tablename = 'dataTblCompanyEvents';

        $fields = array('*', 'm.cntFirstName', 'm.cntLastName'
        );

        $orderBy ="eventDate";
        $orderType ="ASC";
        $join = array(
            'LEFT JOIN crmTblContacts m ON dataTblCompanyEvents.eventCreatedBy = m.cntId',
        );

        $where = array(
            'MONTH(eventDate) = :month',
            'YEAR(eventDate) = :year',
        );

        $params = array(
            'month' =>  $month,
            'year' =>  $year,
        );


        //now get records
        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'join' => $join,
            'orderBy' => $orderBy,
            'params' => $params,
            'where' => $where,
        );

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;

    }

    public function _getCompanyEventsList($id = null)
    {

        $tablename = 'dataTblCompanyEvents';

        $fields = array('dataTblCompanyEvents.*', 'm.cntFirstName', 'm.cntLastName'
        );
        $orderBy ="eventDate";
        $orderType ="ASC";
        $join = array(
            'LEFT JOIN crmTblContacts m ON dataTblCompanyEvents.eventCreatedBy = m.cntId',
        );
        // get all by default
        $where = array(
            'eventID <> :id',
        );
        $params = array(
            'id' =>  0,
        );

        if($id)
        {
            $where = array(
                'eventID = :id',
            );
            $params = array(
                'id' =>  $id,
            );
            //now get records
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
                'join' => $join,
                'orderBy' => $orderBy,
                'params' => $params,
                'where' => $where,
            );

            if (false === ($rows = $this->dbpdo->get($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }


            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }
        }
        else //get all
        {
            //now get records
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
                'join' => $join,
                'limit' => 200,
                'orderBy' => $orderBy,
                'params' => $params,
                'where' => $where,
            );


            if (false === ($rows = $this->dbpdo->get($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

        }


        return $rows;

    }


    public function _saveEvent($id = null)

    {

        $tablename = 'dataTblCompanyEvents';

        $this->load->helper('date');
        $format = 'DATE_RFC822';
        $time = time();
        $sdate = standard_date($format, $time);
        $date = new DateTime($sdate);
        $CurrentDate = $date->format('Y-m-d');

        $eventName = $this->validate->post('eventName', 'SAFETEXT', FALSE);
        $eventDescription = $this->validate->post('eventDescription', 'SAFETEXT', FALSE);
        $eventTime = $this->input->post('eventTime');
        $eventDate = $this->input->post('eventDate');
        $date = new DateTime($eventDate);
        $eventDate = $date->format('Y-m-d');

        if(empty($eventDate))
        {
            $eventDate = null;
        }

        $data['eventTime'] = $eventTime;
        $data['eventDate'] = $eventDate;
        $data['eventCreatedBy'] = $this->USER_ID;
        $data['eventDescription'] = $eventDescription;
        $data['eventName'] = $eventName;

        //update
        if($id)
        {
            $where = array(
                'eventID = :Id',
            );
            $params = array(
                'Id' => $id,
            );

            $items = array(
                'tableName' => $tablename,
                'data'      => $data,
                'where' => $where,
                'params' => $params,
            );

            if (!$rows = $this->dbpdo->update($items)) {
                return array('error' =>'Error updating message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }
        }
        else
        {
            $items = array(
                'tableName' => $tablename,
                'data'      => $data,
            );

            if (!$rows = $this->dbpdo->insert($items)) {
                return array('error' =>'Error updating message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

        }


        return $rows;
    }



    public function _getWOCalendarData($start, $end)
    {

        $tablename = 'POTblJobOrderDetail p';

       $where = array("p.jordStartDate  >= '".$start ."'", "p.jordEndDate  <= '".$end ."'", "s.jobMasterID  > 0");

        if($this->USER_ROLE != 1 && $this->USER_ROLE != 6)// admin and office can see all
        {

           $where[] = '(p.jordJobManagerID ='.$this->USER_ID. ' OR p.jordJobManagerID2 ='. $this->USER_ID. ')';

        }

        $join = array(
            'LEFT JOIN dataTblCompanyServices a ON p.jordServiceID = a.cmpServiceID',
            'LEFT JOIN POTblJobOrders s ON p.jordjobID = s.jobID',
            'RIGHT JOIN dataLkpServiceCategories b ON a.cmpServiceCat  = b.catname',
        );


        if($this->USER_ROLE != 1 && $this->USER_ROLE != 6)// admin and office can see all
        {

            $fields = array('p.jordID as id',
                'p.jordName as title',
                'CONCAT("'.$this->SITE_URL.'workorders/showServiceList/", p.jordJobID, "/", p.jordID) as url',
                'b.catcolor as color',
                'p.jordStartDate as start',
                'DATE_ADD(p.jordEndDate, INTERVAL 1 DAY) as end',
            );

        }
        else
        {
            $fields = array('p.jordID as id',
                'p.jordName as title',
                'CONCAT("'.$this->SITE_URL.'workorders/WOServiceDetail/", p.jordJobID, "/", p.jordID) as url',
                'b.catcolor as color',
                'p.jordStartDate as start',
                'DATE_ADD(p.jordEndDate, INTERVAL 1 DAY) as end',

            );


        }
        $items = array(
            'tableName' => $tablename,
            'join' => $join,
            'fields' => $fields,
            'where' => $where,

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;
        //json_encode($rows, JSON_PRETTY_PRINT);



    }


}