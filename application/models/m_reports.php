<?php

class M_Reports Extends CI_Model
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



    public function _ListProposals($showo = null)
    {

        $tablename = 'POTblJobOrders p';
        $keyfield = 'p.jobID';

        $join = array(
            'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId',
            'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId',
            'LEFT JOIN crmTblContacts s ON p.jobSalesManagerAssigned = s.cntId',
            'LEFT JOIN crmTblContacts z ON p.jobSalesAssigned = z.cntId',
            'LEFT JOIN dataLkpOrderStatus b ON p.jobStatus = b.ordStatusID',
            'LEFT JOIN WOTblJobMaster w ON p.jobMasterID = w.jobMasterID',

        );

        $fields = array('p.jobID',
            'p.jobMasterID',
            'p.jobcntID',
            'p.jobAddress1',
            'p.jobAddress2',
            'p.jobPrimaryContact',
            'p.jobPrimaryEmail',
            'p.jobState',
            'p.jobCity',
            'p.jobZip',
            'p.jobName',
            'p.jobStatus',
            'p.jobApprovedBy',
            'p.jobApprovedDate',
            'p.jobApproved',
            'p.jobRejectedBy',
            'p.jobRejectedDate',
            'p.jobRejectedReason',
            'p.jobCreatedBy',
            'p.jobCreatedDateTime',
            'p.jobSalesManagerAssigned',
            'p.jobSalesAssigned',
            'p.JobLastUpdated',
            'p.jobLastUpdatedBy',
            'p.jobDiscount',
            'p.jobProposalPDF',
            //created by
            'm.cntFirstName',
            'm.cntLastName',
            //client
            'a.cntFirstName as clientfirst',
            'a.cntLastName as clientlast',
            //sales
            'z.cntFirstName as salesfirst',
            'z.cntLastName as saleslast',
            //manager
            's.cntFirstName as managerfirst',
            's.cntLastName as managerlast',
            'b.ordStatus',
            'p.jobAlertBy',
            'p.jobAlertNote',
            'p.jobAlert',
            'p.jobMOTSentDatetime',
            'p.jobMOTSentBy',
            'p.jobNTOSentDatetime',
            'p.jobNTOSentBy',
            '(SELECT SUM(jordCost) FROM POTblJobOrderDetail WHERE POTblJobOrderDetail.jordJobID = p.jobID ) AS totalcost',
            '(SELECT GROUP_CONCAT(jordName ORDER BY jordName DESC SEPARATOR ", ") FROM POTblJobOrderDetail WHERE jordjobID = p.jobID) AS services ',

            'w.jobMasterStatus',
            'w.jobMasterMonth',
            'w.jobMasterYear',
            'w.jobMasterNumber',
            'w.jobMasterCreatedDate',
            'w.jobMasterCreatedBy',
            'w.jobMasterCompleted',
        );


        $where ='p.jobID <> 0' ;

        if($showo) // only work orders
        {
            $where .= ' AND p.jobMasterID > 0';

        }
        $jobcntID = $this->input->post('jobcntID');
        if(intval($jobcntID) > 0)
        {
            $where .= ' AND p.jobcntID = ' . $jobcntID;

        }
        $jobStatus = $this->input->post('jobStatus');
        if(intval($jobStatus) > 0)
        {

            $where .= ' AND p.jobStatus = ' . $jobStatus;

        }

        $jobCreatedBy = $this->input->post('jobCreatedBy');
        if(intval($jobCreatedBy) > 0)
        {

            $where .= ' AND p.jobCreatedBy = ' . $jobCreatedBy;

        }

        $jobSalesManagerAssigned = $this->input->post('jobSalesManagerAssigned');
        if(intval($jobSalesManagerAssigned) > 0)
        {

            $where .= ' AND p.jobSalesManagerAssigned = ' . $jobSalesManagerAssigned;
        }

        $jobSalesAssigned = $this->input->post('jobSalesAssigned');
        if(intval($jobSalesAssigned) > 0)
        {

            $where .= ' AND p.jobSalesAssigned = ' . $jobSalesAssigned;

        }

        if($this->input->post('quarterlyreport') == true) {

            
            
            $quarter = $this->input->post('quarter');
            $year = $this->input->post('year');
            switch ($quarter) {
            case 1:
                    $searchStart = '01/01/' .$year;
                    $searchEnd = '03/31/' .$year;
                break;
            case 2:
                    $searchStart = '04/01/' .$year;
                    $searchEnd = '06/30/' .$year;
                break;
            case 3:
                    $searchStart = '07/01/' .$year;
                    $searchEnd = '09/30/' .$year;
                break;
            default:
                    $searchStart = '10/01/' .$year;
                    $searchEnd = '12/31/' .$year;
				break;

            }

    
        } else {
            $searchStart = $this->input->post('searchStart');
            $searchEnd = $this->input->post('searchEnd');
        }
        
        //$searchStart = $this->input->post('searchStart');
        //$searchEnd = $this->input->post('searchEnd');


        if($searchStart != '')
        {
            $date = new DateTime($searchStart);
            $searchStart = $date->format('Y-m-d');



            $where .= ' AND p.jobApprovedDate >= "'. $searchStart.'"';
            if($searchEnd != '')
            {
                $date = new DateTime($searchEnd);
                $searchEnd = $date->format('Y-m-d');

                 $where .= ' AND p.jobApprovedDate <= "' . $searchEnd .'"';
            }
        }


        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'where' => $where,
            'join' => $join,

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }


    public function _getLabor()
    {
        $tablename = ' WOTbljobOrderLabor p';


        $join = array(

            'LEFT JOIN crmTblContacts a ON p.POEmpID = a.cntId',
        );

        $fields = array(
            'a.cntId ',
            'a.cntFirstName ',
            'a.cntLastName',

        );
        $groupBy = "a.cntId,a.cntFirstName,a.cntLastName";

        $orderBy = "a.cntFirstName,a.cntLastName";


        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'groupBy' => $groupBy,
            'orderBy' => $orderBy,
            'join' => $join,

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }



    public function _getLaborReport()

    {

    //parameters date or employee
    $POEmpID = $this->input->post('POEmpID');
    $searchStart = $this->input->post('searchStart');
    $searchEnd = $this->input->post('searchEnd');

    $date = new DateTime($searchStart);
    $searchStart = $date->format('Y-m-d');


    $date = new DateTime($searchEnd);
    $searchEnd = $date->format('Y-m-d');


    $where = 'p.POEmpID <> 0';
    if($POEmpID > 0)
    {
        $where .= ' AND p.POEmpID  = '. $POEmpID;

    }

    if($searchStart != '' && $searchEnd != '' )
    {
        $where .= ' AND p.POlaborDate  >= "'. $searchStart .'" AND p.POlaborDate  <= "'. $searchEnd .'"';

    }

    $tablename = 'WOTbljobOrderLabor p';


    $join = array(

        'LEFT JOIN crmTblContacts a ON p.POEmpID = a.cntId',
        'LEFT JOIN POTblJobOrderDetail d ON p.POlaborjordID = d.jordId',
        'LEFT JOIN POTblJobOrders x ON d.jordjobID = x.jobID',
        'LEFT JOIN WOTblJobMaster z ON x.jobMasterID = z.jobMasterID',

    );

    $fields = array(
        //created by
        'p.POlaborStartTime',
        'p.POlaborEndTime',
        'p.POlaborDate',
        'a.cntId ',
        'a.cntFirstName ',
        'a.cntLastName',

        'd.jordjobID',
        'd.jordName',
        'x.jobName',
        'UNIX_TIMESTAMP( CONCAT( p.POlaborDate, ":", p.POlaborStartTime ) ) AS start' ,
        'UNIX_TIMESTAMP( CONCAT( p.POlaborDate, ":", p.POlaborEndTime ) ) AS end' ,
        '(UNIX_TIMESTAMP( CONCAT( p.POlaborDate, ":", p.POlaborEndTime ) ) - UNIX_TIMESTAMP( CONCAT( p.POlaborDate, ":", p.POlaborStartTime ) )) as diff',
        'z.jobMasterYear',
        'z.jobMasterMonth',
        'z.jobMasterNumber',

    );
    $searchtype =$this->input->post('searchtype');
    if($searchtype == 0)
    {
//        $groupBy = "a.cntId,a.cntFirstName,a.cntLastName";
    }

    $orderBy = "POEmpID";


    $items = array(
        'tableName' => $tablename,
        'where' => $where,
        'fields' => $fields,
  //      'groupBy' => $groupBy,
        'orderBy' => $orderBy,
        'join' => $join,

    );
    if (false === ($rows = $this->dbpdo->get($items))) {
        return array('error' => $this->dbpdo->getErrorMessage());
    }

    return $rows;


}



    public function _getProposalSalesPeople()
    {
        $tablename = 'POTblJobOrders p';
        $keyfield = 'p.jobID';

        $join = array(

            'LEFT JOIN crmTblContacts a ON p.jobSalesAssigned = a.cntId',
        );

        $fields = array(
            //created by
            'a.cntId ',
            'a.cntFirstName ',
            'a.cntLastName',

        );
        $groupBy = "a.cntId,a.cntFirstName,a.cntLastName";

        $orderBy = "a.cntFirstName,a.cntLastName";
        $where = "p.jobSalesAssigned > 0";

        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'where' => $where,
            'groupBy' => $groupBy,
            'orderBy' => $orderBy,
            'join' => $join,

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }
    public function _getProposalSalesManager()
    {
        $tablename = 'POTblJobOrders p';
        $keyfield = 'p.jobID';

        $join = array(

            'LEFT JOIN crmTblContacts a ON p.jobSalesManagerAssigned = a.cntId',
        );

        $fields = array(
            //created by
            'a.cntId ',
            'a.cntFirstName ',
            'a.cntLastName',

        );
        $groupBy = "a.cntId,a.cntFirstName,a.cntLastName";

        $orderBy = "a.cntFirstName,a.cntLastName";

        $where = "p.jobSalesManagerAssigned > 0";

        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'where' => $where,
            'groupBy' => $groupBy,
            'orderBy' => $orderBy,
            'join' => $join,

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }


    public function _getProposalClients()
    {
        $tablename = 'POTblJobOrders p';
        $keyfield = 'p.jobID';

        $join = array(
            'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId',
        );

        $fields = array(
            //client
            'a.cntId',
            'a.cntFirstName',
            'a.cntLastName',
        );

        $groupBy = "a.cntId,a.cntFirstName,a.cntLastName";

        $orderBy = "a.cntFirstName,a.cntLastName";


        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'groupBy' => $groupBy,
            'orderBy' => $orderBy,
            'join' => $join,

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;


    }

    public function _getProposalCreators()
    {
        $tablename = 'POTblJobOrders p';
        $keyfield = 'p.jobID';

        $join = array(

            'LEFT JOIN crmTblContacts a ON p.jobCreatedBy = a.cntId',
        );

        $fields = array(
            //created by
            'a.cntId ',
            'a.cntFirstName ',
            'a.cntLastName',

        );
        $groupBy = "a.cntId,a.cntFirstName,a.cntLastName";

        $orderBy = "a.cntFirstName,a.cntLastName";


        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'groupBy' => $groupBy,
            'orderBy' => $orderBy,
            'join' => $join,

        );
        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

return $rows;


}


    public function _getUserList($xport = null)
    {

        //defaults
        // create filter for sql
        $filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1';

        //default ordering lastname firstname
        $orderby ='m.cntLastName, m.cntFirstName';
        $ordertype ='ASC';
        //text to display
        $filter_str = "Where Status is Active";
        //default limit and offset
        $limit = 25;
        $page_num = 1; //current page
        $filter = 0;
        $offset = 0;
        $total_pages = 1; //total pages
        $params = array();



        $join = array(
            'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
            'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
            'LEFT JOIN crmTblContacts AS b ON m.cntDevelopmentId = b.cntId',
            'LEFT JOIN crmTblContacts AS c ON m.cntCreatedBy = c.cntId',
            'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
        );

        $fields = array('m.cntId',
            'm.cntFirstName',
            'm.cntLastName',
            'm.cntMiddleName',
            'm.cntSalutation',
            'm.cntGender',
            'm.cntAvatar',
            'm.cntDepartment',
            'm.cntJobTitle',
            'm.cntDateOfBirth',
            'm.cntStatusId',
            'm.cntCreatedDate',
            'm.cntCreatedBy',
            'm.cntUpdatedDate',
            'm.cntUpdatedBy',
            'm.cntLastContactDate',
            'm.cntLastContactedBy',
            'm.cntIsEmployee',
            'm.cntHireDate',
            'm.cntPrimaryEmail',
            'm.cntPrimaryPhone',
            'm.cntPrimaryAddress1',
            'm.cntPrimaryAddress2',
            'm.cntPrimaryState',
            'm.cntPrimaryCity',
            'm.cntPrimaryZip',
            'm.cntQualified',
            'm.cntPrimaryCountry',
            'm.cntCompanyId',
            'm.cntDevelopmentId',
            'm.cntComment',
            'm.cntParcelNumber',

            'm.cntBillAddress1',
            'm.cntBillAddress2',
            'm.cntBillCity',
            'm.cntBillState',
            'm.cntBillZip',
            'm.cntShipAddress1',
            'm.cntShipAddress2',
            'm.cntShipCity',
            'm.cntShipState',
            'm.cntShipZip',
            'm.cntAltPhone1',
            'm.cntAltPhone2',
            'm.cntAltEmail',

            'a.cntFirstName AS CompanyName',
            'a.cntLastName AS CompanyLastName',
            'b.cntFirstName AS DevelopmentName',
            'b.cntLastName AS DevelopmentLastName',

           // 'c.cntFirstName AS CreatorFirstName',
           // 'c.cntLastName AS CreatorLastName',

            '(SELECT COUNT(*) FROM POTblJobOrders WHERE m.cntId = POTblJobOrders.jobcntID AND jobMasterID < 0) AS workorder_count',
            '(SELECT COUNT(*) FROM POTblJobOrders WHERE m.cntId = POTblJobOrders.jobcntID) AS project_count',
            '(SELECT COUNT(*) FROM crmTblContactNotes WHERE m.cntId = crmTblContactNotes.cnotContactId) AS note_count',
            '(SELECT ccatName FROM crmLkpCategories WHERE m.cntcid = crmLkpCategories.ccatId) AS primarycat',

            'm.cntSecAccess',
            'm.cntRole',
            'm.cntPassword',
            'm.cntAltContactName',
            'm.cntcid',
            'm.cntOverHead',

        );



        //load params from session if just paging changing limit etc
        $cmsfilter = $this->session->userdata('cmsfilter');
        if(!empty($cmsfilter))
        {
            $limit = $cmsfilter['limit'];
            $offset = $cmsfilter['offset'];
            $page_num = $cmsfilter['page_num'];
            $filter = $cmsfilter['filter'];
            $filterWhere = $cmsfilter['filterWhere'];
            $ordertype = $cmsfilter['ordertype'];
            $orderby = $cmsfilter['orderby'];
            $filter_str = $cmsfilter['filter_str'];
            $join = $cmsfilter['join'];

        }

        //detect request
        //simple reorder by column keep same params, modify order
        if($this->input->post('reorder') == '1')
        {

            if($this->validate->post('orderby', 'SAFETEXT'))
            {
                $orderby = $this->input->post('orderby');
                //swap ordertype
                $ordertype = $this->validate->post('ordertype', 'SAFETEXT');

            }
        }


        //simple page change keep same params go to page request
        if($this->validate->post('page','INTEGER') && $this->input->post('turnpage') == 1)
        {
            //modify offset
            $page_num = $this->validate->post('page','INTEGER');
            $offset = ($page_num - 1) * $limit;

        }

        //just change number of records per page to show change limit only
        if($this->input->post('limit') && $this->input->post('changelimit') == 1)
        {
            $limit = $this->validate->post('limit', 'INTEGER');
            if(!$limit || $limit < 10 || $limit > 100){$limit = 10;}
            $offset = 0;
            $page_num = 1; //return to first page

        }
        // we did a search so renew params
        $search = $this->input->post('search');
        if($search ==1)//search by field value and or category
        {
            //default ordering lastname firstname
            $orderby ='m.cntLastName, m.cntFirstName';
            $ordertype ='ASC';
            //text to display
            $filter_str = "Where Status is Active";
            //reset joins
            $join = array(
                'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
                'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
                'LEFT JOIN crmTblContacts AS b ON m.cntDevelopmentId = b.cntId'
            );
            //reset page and offset
            $offset = 0;
            $page_num = 1;
            //searchField,searchValue,searchCat,searchServ
            //new search
            $filter = 1;

            $searchCreator = $this->validate->post('searchCreator', 'INTEGER');
            $searchHasWO = $this->validate->post('searchHasWO', 'INTEGER');
            $searchStart = $this->validate->post('searchStart', 'DATE');
            $searchEnd = $this->validate->post('searchEnd', 'DATE');

            $searchServiceID  = $this->validate->post('searchServ', 'SAFETEXT');
            $searchCatID  = $this->validate->post('searchCat', 'SAFETEXT');
            $searchFieldName  = $this->validate->post('searchField', 'SAFETEXT');
            $searchFieldValue  = $this->validate->post('searchValue', 'SAFETEXT');
            $catName  = $this->validate->post('categoryName', 'SAFETEXT');
            $serviceName  = $this->validate->post('serviceName', 'SAFETEXT');
            //@todo get more sophisticated about which fields are being searched, if name use first and last name

            $cntQualified = $this->input->post('cntQualified');
            //restore defaults keep limit intact revert to page 1 and defaults
            $filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1';
            if($cntQualified == 1)
            {
                $filter_str .=' AND Contact IS Qualified';
                $filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1 AND m.cntQualified = 1';
            }
            if($cntQualified == 2)
            {
                $filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1 AND m.cntQualified = 0';
                $filter_str .=' AND Contact IS NOT Qualified';
            }

            if($searchFieldName == "m.cntFirstName" || $searchFieldName == "m.cntLastName")
            {
                $filterWhere .= " AND " .$searchFieldName ." LIKE '".$searchFieldValue ."%'";
                $filter_str .=' AND Name Like "' .$searchFieldValue .'"';
            }
            elseif($searchFieldName != "All Records")
            {
                $filterWhere .= " AND " . $searchFieldName ." = '".$searchFieldValue ."'";
                $filter_str .=' AND ' . $searchFieldName .' = ' .$searchFieldValue;

            }
            if($searchCatID > 0)
            {
                // add condition to where search primary cat and all secondary cats
                $filterWhere .= ' AND ((m.cntcid =' .$searchCatID .') OR (crmFcsContactsCategories.cntcatCategoryId =' .$searchCatID .'))';
                //update join
                $join[] =  'LEFT JOIN crmFcsContactsCategories ON m.cntId = crmFcsContactsCategories.cntcatContactId';

                $filter_str .=" AND Category=" . $catName;
            }

            if($searchCreator)
            {
                $filterWhere .= ' AND (m.cntCreatedBy = ' . $searchCreator . ')';
            }

            if($searchHasWO)
            {

                // find contacts with proposals or work orders
                if($searchHasWO ==1)
                {
                  //  $filterWhere .= ' AND (workorder_count = 0 AND project_count = 0)';
                }
                if($searchHasWO ==2)
                {
                   // $filterWhere .= ' AND (project_count > 0)';
                }
                if($searchHasWO ==3)
                {
                    //$filterWhere .= ' AND ((SELECT COUNT(*) FROM POTblJobOrders WHERE m.cntId = POTblJobOrders.jobcntID AND jobMasterID < 0) > 0 )';
                }


            }
            if($searchStart)

            {
                $filterWhere .= ' AND (m.cntCreatedDate >= ' . $this->input->post('searchStart') . ')';
            }
            if($searchEnd)
            {
                $filterWhere .= ' AND (m.cntCreatedDate <= ' . $this->input->post('searchEnd') . ')';
            }


            if($searchServiceID > 0)
            {
                // add condition to where
                $filterWhere .= ' AND crmFcsContactsServices.cntservServiceID =' .$searchServiceID;
                //update join
                $join[] = 'LEFT JOIN crmFcsContactsServices ON m.cntId = crmFcsContactsServices.cntservContactId';
                $filter_str .=" AND Service=" . $serviceName;

            }


        }

        // if we are role restricted we will have to add a param to where clause
        if($this->USER_ROLE == '2') //sales manager add condition to where
        {
            //Sales Manager
            $filterWhere .= ' AND m.cntId = 0';
            //$filterWhere .= ' AND (POTblJobOrders.jobSalesManagerAssigned ='.$this->USER_ID .' OR m.cntCreatedBy = '.$this->USER_ID .')';

        }

        if($this->USER_ROLE == '3') //sales person add condition to where
        {
            $filterWhere .= ' AND m.cntId = 0';
            //$filterWhere .= ' AND (POTblJobOrders.jobSalesAssigned ='.$this->USER_ID .' OR m.cntCreatedBy = '.$this->USER_ID .')';

        }

        if($this->USER_ROLE == '4') //job manager add condition to where
        {
            $filterWhere .= ' AND m.cntId = 0';
                       // $filterWhere .= ' AND (POTblJobOrders.jobManagerAssigned ='.$this->USER_ID .' OR m.cntCreatedBy = '.$this->USER_ID .')';

        }

        if($this->USER_ROLE == '5') //not allowed in at all
        {
            $filterWhere .= ' AND m.cntId = 0';

        }

        if($xport) // get all
        {
            //now get records
            $items = array(
                'tableName' => 'crmTblContacts m',
                'fields' => $fields,
                'join' => $join,
                'orderType' => $ordertype,
                'where' => $filterWhere,
                'orderBy' => $orderby,
                'orderBy' => $orderby,
            );

        }
        else
        {
            //now get records
            $items = array(
                'tableName' => 'crmTblContacts m',
                'fields' => $fields,
                'join' => $join,
                'orderType' => $ordertype,
                'limit' => $limit,
                'start' => $offset,
                'where' => $filterWhere,
                'orderBy' => $orderby,
            );
        }

        $total_records = $this->dbpdo->count($items);

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        //update the session filter
        $cmsfilter = array('filterWhere' => $filterWhere, 'orderby' => $orderby,'ordertype' => $ordertype,'page_num' => $page_num,'offset' =>$offset,'limit'=>$limit,'filter_str' => $filter_str,'filter' => $filter, 'join' => $join);
        $this->session->set_userdata('cmsfilter', $cmsfilter);

        If(((intval($total_records) - intval($limit))) > 0)
        {
            $total_pages = intval($total_records/$limit); //pages equal to total count divided by limit and add 1
            if(intval($total_records/$limit) != ($total_records/$limit)) // there is remainder so add a page
            {
                $total_pages = $total_pages + 1;
            }
        }

        $results['limit'] = $limit;  //sent in from post
        $results['page_num'] = $page_num; // number passed in to get
        $results['rows'] = $rows; //data returned from query
        $results['ordertype'] = $ordertype; //preserve order
        $results['orderby'] = $orderby;
        $results['filter'] = $filter; //description of filter to show user
        $results['filter_str'] = $filter_str; //description of filter to show user
        $results['filterWhere'] = $filterWhere; //where statement used
        $results['total_records'] = $total_records; //count of records
        $results['total_pages'] = $total_pages; //how many pages in recordset derived from total records divided by limit
        $results['offset'] = $offset; //offset derived from page_num passed in x limit page 3 time limit 10 equals offset of 30

        return $results;

    }


    public function _getCRMUser($id)

    {

        $tablename = 'crmTblContacts m';
        $keyfield = 'm.cntId';

        $join = array(
            'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
            'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
            'LEFT JOIN crmTblContacts AS b ON m.cntDevelopmentId = b.cntId',
            'LEFT JOIN crmTblContacts AS c ON m.cntCreatedBy = c.cntId',
            'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
        );

        $fields = array('m.cntId',
            'm.cntFirstName',
            'm.cntLastName',
            'm.cntMiddleName',
            'm.cntSalutation',
            'm.cntGender',
            'm.cntAvatar',
            'm.cntDepartment',
            'm.cntJobTitle',
            'm.cntDateOfBirth',
            'm.cntStatusId',
            'm.cntCreatedDate',
            'm.cntCreatedBy',
            'm.cntUpdatedDate',
            'm.cntUpdatedBy',
            'm.cntLastContactDate',
            'm.cntLastContactedBy',
            'm.cntIsEmployee',
            'm.cntHireDate',
            'm.cntPrimaryEmail',
            'm.cntPrimaryPhone',
            'm.cntPrimaryAddress1',
            'm.cntPrimaryAddress2',
            'm.cntPrimaryState',
            'm.cntPrimaryCity',
            'm.cntPrimaryZip',
            'm.cntQualified',
            'm.cntPrimaryCountry',
            'm.cntCompanyId',
            'm.cntDevelopmentId',
            'm.cntComment',
            'm.cntParcelNumber',
            'CONCAT(a.cntFirstName, " ", a.cntLastName) As CompanyName',
            'a.cntPrimaryEmail AS companyEmail',
            'a.cntPrimaryPhone AS companyPhone',
            'a.cntPrimaryAddress1 AS companyAddress1',
            'a.cntPrimaryAddress2 AS companyAddress2',
            'a.cntPrimaryState AS companyState',
            'a.cntPrimaryCity AS companyCity',
            'a.cntPrimaryZip AS companyZip',

            'CONCAT(b.cntFirstName, " ", b.cntLastName) As DevelopmentName',
            'b.cntPrimaryEmail AS developmentEmail',
            'b.cntPrimaryPhone AS developmentPhone',
            'b.cntPrimaryAddress1 AS developmentAddress1',
            'b.cntPrimaryAddress2 AS developmentAddress2',
            'b.cntPrimaryState AS developmentState',
            'b.cntPrimaryCity AS developmentCity',
            'b.cntPrimaryZip AS developmentZip',

            'CONCAT(c.cntFirstName," ", c.cntLastName) AS Creator',

            '(SELECT COUNT(*) FROM POTblJobOrders WHERE m.cntId = POTblJobOrders.jobcntID) AS project_count',
            '(SELECT COUNT(*) FROM crmTblContactNotes WHERE m.cntId = crmTblContactNotes.cnotContactId) AS note_count',
            'm.cntSecAccess',
            'm.cntRole',
            'm.cntPassword',
            'm.cntParcelNumber',
            'm.cntBillAddress1',
            'm.cntBillAddress2',
            'm.cntBillCity',
            'm.cntBillState',
            'm.cntBillZip',
            'm.cntShipAddress1',
            'm.cntShipAddress2',
            'm.cntShipCity',
            'm.cntShipState',
            'm.cntShipZip',
            'm.cntAltPhone1',
            'm.cntAltPhone2',
            'm.cntAltEmail',
            'm.cntAltContactName',
            'm.cntcid',

        );

        $where = array(
            $keyfield .' = :id',
        );

        $params = array(
            'id' =>  $id,
        );

        //now get records
        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'join' => $join,
            'params' => $params,
            'where' => $where,
        );

        if (false === ($rows = $this->dbpdo->getOne($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        if (empty($rows['cntAvatar']) || !file_exists($this->WEBCONFIG['webUploadFolder'] . 'crm/'.$rows['cntAvatar']))
        {
            $rows['cntAvatar'] = null;
        }
        if (empty($rows['cntSignature']) || !file_exists($this->WEBCONFIG['webUploadFolder'] . 'crm/'.$rows['cntSignature']))
        {
            $rows['cntSignature'] = null;
        }
        return $rows;

    }





    public function _showCRMCategories($usrid)
    {

        $tablename = 'crmFcsContactsCategories';
        $join = array(

            'JOIN crmLkpCategories ON crmFcsContactsCategories.cntcatCategoryId = crmLkpCategories.ccatId',

        );
        $fields = array('*'
        );

        $where = array(
            'crmFcsContactsCategories.cntcatContactId  = :cid',
        );

        $orderBy = 'crmLkpCategories.ccatName';

        $params = array(
            'cid' =>  $usrid,
        );

        //get all
        $items = array(
            'tableName' => $tablename,
            'where'  => $where,
            'join' => $join,
            'params' => $params,
            'fields' => $fields,
            'orderBy' => $orderBy,
        );


        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;
    }


    //CRM SERVICES

    public function _showCRMServices($usrid)
    {

        $tablename = 'crmFcsContactsServices';
        $join = array(

            'JOIN crmLkpCRMServices ON crmFcsContactsServices.cntservServiceID = crmLkpCRMServices.cservId',

        );
        $fields = array('*'
        );

        $where = array(
            'crmFcsContactsServices.cntservContactId  = :cid',
        );

        $orderBy = 'crmLkpCRMServices.cservName';

        $params = array(
            'cid' =>  $usrid,
        );

        //get all
        $items = array(
            'tableName' => $tablename,
            'where'  => $where,
            'join' => $join,
            'params' => $params,
            'fields' => $fields,
            'orderBy' => $orderBy,
        );


        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;
    }



}