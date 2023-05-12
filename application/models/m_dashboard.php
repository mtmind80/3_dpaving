<?php

class M_Dashboard extends CI_Model
{




    public function _get_crm_new()
    {
        // create filter for sql
        $filterWhere = 'cntIsEmployee <> 1 AND cntStatusId = 1 AND cntCreatedDate >="'.$this->Month.'"';
        $fields = array('cntId');


            //now get records
            $items = array(
                'tableName' => 'crmTblContacts',
                'fields' => $fields,
                'where' => $filterWhere,
            );

        $total_records = $this->dbpdo->count($items);


        return $total_records;


    }
    public function _get_crm_reminder()
    {
        return 0;

    }
    public function _get_crm_total()// all except employees
    {
        // create filter for sql
        $filterWhere = 'cntIsEmployee <> 1';
        $fields = array('cntId');


        //now get records
        $items = array(
            'tableName' => 'crmTblContacts',
            'fields' => $fields,
            'where' => $filterWhere,
        );

        $total_records = $this->dbpdo->count($items);


        return $total_records;
    }

    // proposals
    public function _get_proposal_bystatus($status = null)
    {

        // create filter for sql
        $filterWhere = 'jobStatus < 3';

        if($status == 'rejected')
        {
            // create filter for sql
            $filterWhere = 'jobStatus = 3';

        }
        if($status == 'approved')
        {
            // create filter for sql
            $filterWhere = 'jobStatus = 4';

        }

        $fields = array('jobID');

        //now get records
        $items = array(
            'tableName' => 'POTblJobOrders',
            'fields' => $fields,
            'where' => $filterWhere,
        );

        $total_records = $this->dbpdo->count($items);

        return $total_records;

    }


//work orders
    public function _get_workorder_completed()
    {

       // create filter for sql
       $filterWhere = 'jobMasterCompleted = 1';

        $fields = array('jobMasterID');

        //now get records
        $items = array(
            'tableName' => 'WOTblJobMaster',
            'fields' => $fields,
            'where' => $filterWhere,
        );

        $total_records = $this->dbpdo->count($items);

        return $total_records;

    }

    public function _get_workorder_total()
    {
        $fields = array('jobMasterID');

        //now get records
        $items = array(
            'tableName' => 'WOTblJobMaster',
            'fields' => $fields,
        );

        $total_records = $this->dbpdo->count($items);

        return $total_records;
    }

    public function _get_workorder_active()
    {
        // create filter for sql
        $filterWhere = 'jobMasterCompleted = 0';

        $fields = array('jobMasterID');

        //now get records
        $items = array(
            'tableName' => 'WOTblJobMaster',
            'fields' => $fields,
            'where' => $filterWhere,
        );

        if (false === ($total_records = $this->dbpdo->count($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }


        return $total_records;
    }



    public function _get_readytoclose()
    {

        // estimator closes this
        // status of ALL service is completed
        $filterWhere = array('p.jobReadyToClose = 1','p.jobStatus = 5','p.jobCompleted = 0','p.jobMasterID > 0'); //estimator not completed


        $tablename ="POTblJobOrders p";
        $fields = array('p.*',
            'd.*','w.jobMasterStatus',
            'w.jobMasterMonth',
            'w.jobMasterYear',
            'w.jobMasterNumber',
            'w.jobMasterCreatedDate',
            'w.jobMasterCreatedBy',
            'w.jobMasterCompleted',
            'w.jobMasterCompletedBy',
            'w.jobMasterCompletedDate'
        );

        $join = array(
            'LEFT JOIN POTblJobOrderDetail d ON d.jordID = p.jobID',
            'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = p.jobMasterID',
        );
        $orderBy = 'p.JobLastUpdated'; // order by the last update

        if($this->USER_ROLE == 4 || $this->USER_ROLE == 5) // job managers
        {
            //     $filterWhere[] = "(d.jordJobManagerID = ".$this->USER_ID . " OR d.jordJobManagerID2 = ". $this->USER_ID.")";
        }


        //now get records
        $items = array(
            'tableName' => $tablename,
            'join' => $join,
            'orderBy' => $orderBy,
            'fields' => $fields,
            'where' => $filterWhere,
        );

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }



        return $rows;


    }

    public function _do_close()
    {

        // estimator closed
        $filterWhere = array('p.jobStatus = 6'.'jobCompleted = 0'); //estimator not completed

        $tablename ="POTblJobOrders p";
        $fields = array('p.*',
            'd.*','w.jobMasterStatus',
            'w.jobMasterMonth',
            'w.jobMasterYear',
            'w.jobMasterNumber',
            'w.jobMasterCreatedDate',
            'w.jobMasterCreatedBy',
            'w.jobMasterCompleted',
            'w.jobMasterCompletedBy',
            'w.jobMasterCompletedDate'
        );

        $join = array(
            'LEFT JOIN POTblJobOrderDetail d ON d.jordID = p.jobID',
            'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = p.jobMasterID',
        );
        $orderBy = 'p.JobLastUpdated'; // order by the last update

        if($this->USER_ROLE == 4 || $this->USER_ROLE == 5) // job managers
        {
            //     $filterWhere[] = "(d.jordJobManagerID = ".$this->USER_ID . " OR d.jordJobManagerID2 = ". $this->USER_ID.")";
        }


        //now get records
        $items = array(
            'tableName' => $tablename,
            'join' => $join,
            'orderBy' => $orderBy,
            'fields' => $fields,
            'where' => $filterWhere,
        );

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }



        return $rows;


    }


    public function _get_readytopermit() // proposals where all services are completed but permits remain
    {

        if($this->USER_ROLE == 4 || $this->USER_ROLE == 5) // job managers
        {
            $where[] = "(jordJobManagerID = ".$this->USER_ID . " OR jordJobManagerID2 = ". $this->USER_ID.")";
        }


    }


    public function _get_readytobill() // proposals where all services are completed and estimator signed off
    {


        // admin closes this
        // create filter for sql
        // status of ALL service is completed
        $filterWhere = array(
            'p.jobReadyToBill = 1',
            'p.jobStatus = 6',
            'jobCompleted = 1',
        ); //estimator completed

        $tablename ="POTblJobOrders p";
        $fields = array('p.*',
            'd.*','w.jobMasterStatus',
            'w.jobMasterMonth',
            'w.jobMasterYear',
            'w.jobMasterNumber',
            'w.jobMasterCreatedDate',
            'w.jobMasterCreatedBy',
            'w.jobMasterCompleted',
            'w.jobMasterCompletedBy',
            'w.jobMasterCompletedDate'
        );

        $join = array(
            'LEFT JOIN POTblJobOrderDetail d ON d.jordID = p.jobID',
            'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = p.jobMasterID',
        );
        $orderBy = 'p.jobCompletedDateTime'; // order by the date closed by job manager

        //now get records
        $items = array(
            'tableName' => $tablename,
            'join' => $join,
            'orderBy' => $orderBy,
            'fields' => $fields,
            'where' => $filterWhere,
        );

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }



        return $rows;

    }

    public function _do_bill() // proposals where all services are completed and estimator signed off
    {


        // admin closes this
        // create filter for sql
        // status of ALL service is completed
        $filterWhere = array('p.jobStatus = 6'.'jobCompleted = 1'); //estimator completed

        $tablename ="POTblJobOrders p";
        $fields = array('p.*',
            'd.*','w.jobMasterStatus',
            'w.jobMasterMonth',
            'w.jobMasterYear',
            'w.jobMasterNumber',
            'w.jobMasterCreatedDate',
            'w.jobMasterCreatedBy',
            'w.jobMasterCompleted',
            'w.jobMasterCompletedBy',
            'w.jobMasterCompletedDate'
        );

        $join = array(
            'LEFT JOIN POTblJobOrderDetail d ON d.jordID = p.jobID',
            'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = p.jobMasterID',
        );
        $orderBy = 'p.jobCompletedDateTime'; // order by the date closed by job manager

        if($this->freadytobillUSER_ROLE == 4 || $this->USER_ROLE == 5) // job managers
        {
       //     $filterWhere[] = "(d.jordJobManagerID = ".$this->USER_ID . " OR d.jordJobManagerID2 = ". $this->USER_ID.")";
        }


        //now get records
        $items = array(
            'tableName' => $tablename,
            'join' => $join,
            'orderBy' => $orderBy,
            'fields' => $fields,
            'where' => $filterWhere,
        );

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }



        return $rows;


    }


}