<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends EX_Locked {
    // this controller requires login


    function __construct()
    {
        parent::__construct();


        $allowed_roles = array(1,2,3,4,5,6); //only admin and office
        $this->smarty->assign('allowed_roles', $allowed_roles);

        $userInfo = $this->session->userdata('userInfo');
        if($userInfo['USER_ACCESS'] == FALSE)
            {
                redirect($this->WEBCONFIG['webStartPage'], 'refresh');
            }
        if(!in_array ($userInfo['USER_ROLE'], $allowed_roles))
        {
            redirect($this->WEBCONFIG['webStartPage'].'apperror/catchErrors/1', 'refresh');
        }

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Reports</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //load models
        $this->load->model('M_Reports');

        $this->load->helper(array('dompdf', 'file'));

        $this->smarty->assignContentTemplate('reports/rep_main');


    }




    public function index($filter = null)

    {

        $this->smarty->assignPageTitle( $this->WEBCONFIG['webSitetitle'] );
        $this->smarty->view();
    }




    public function crm()

    {

        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT','reports/SearchCRM.tpl');

        $this->smarty->view();
    }



    //get list of contacts from crm tables use filter
    public function SearchCRM($removefilter = null)

    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //load models
        $this->load->model('M_Crm');

        if($removefilter == 1)
        {
            $this->session->unset_userdata('cmsfilter');
        }
        if($removefilter == 2)
        {
            $filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1 AND m.cntCreatedDate >="'.$this->Month.'"';
            //default ordering lastname firstname
            $orderby ='m.cntLastName, m.cntFirstName';
            $ordertype ='ASC';
            //text to display
            $filter_str = "Where Status is Active";
            //default limit and offset
            $limit = 25;
            $page_num = 1; //current page
            $filter = 1;
            $offset = 0;
            $total_pages = 1; //total pages
            $params = array();
            $join = array(
                'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
                'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
                'LEFT JOIN crmTblContacts AS b ON m.cntDevelopmentId = b.cntId',
                'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
            );
            //update the session filter
            $cmsfilter = array('filterWhere' => $filterWhere, 'orderby' => $orderby,'ordertype' => $ordertype,'page_num' => $page_num,'offset' =>$offset,'limit'=>$limit,'filter_str' => $filter_str,'filter' => $filter, 'join' => $join);
            $this->session->set_userdata('cmsfilter', $cmsfilter);

        }

        if($removefilter == 3)//leads
        {
            $filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1 AND m.cntQualified = 0';
            //default ordering lastname firstname
            $orderby ='m.cntLastName, m.cntFirstName';
            $ordertype ='ASC';
            //text to display
            $filter_str = "Where Status is Active AND Contact IS NOT Qualified ";
            //default limit and offset
            $limit = 25;
            $page_num = 1; //current page
            $filter = 1;
            $offset = 0;
            $total_pages = 1; //total pages
            $params = array();
            $join = array(
                'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
                'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
                'LEFT JOIN crmTblContacts AS b ON m.cntDevelopmentId = b.cntId',
                'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
            );
            //update the session filter
            $cmsfilter = array('filterWhere' => $filterWhere, 'orderby' => $orderby,'ordertype' => $ordertype,'page_num' => $page_num,'offset' =>$offset,'limit'=>$limit,'filter_str' => $filter_str,'filter' => $filter, 'join' => $join);
            $this->session->set_userdata('cmsfilter', $cmsfilter);

        }

        $data = $this->M_Reports->_getUserList();

        $creatorListCB = $this->M_Crm->_getCRMCreators();
        $this->smarty->assign('creatorListCB',$creatorListCB);
        $categoryCB = $this->M_Crm->_getCRMCategories();
        $servicesCB = $this->M_Crm->_getCRMServices();

        $this->smarty->assign('categoryCB',$categoryCB);
        $this->smarty->assign('servicesCB',$servicesCB);
        $this->smarty->assign('data',$data);

        if(!empty($data['error']))
        {
            print_r($data);

            exit();
        }

        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT','reports/SearchCRM.tpl');
        $this->smarty->view();


    }




    public function exportCRMList()
    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);

        $data = $this->M_Reports->_getUserList(1);
        $this->smarty->assign('data',$data);

        if(!empty($data['error']))
        {
            print_r($data);

            exit();
        }

        $this->output->set_header("Content-type: application/octet-stream");
        $this->output->set_header("Content-Disposition: attachment; filename=exceldata.xls");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");


        $this->CORE_TEMPLATE = 'core/coreexport';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('reports/crmExport.tpl');


        $this->smarty->view();

    }



    public function exportProposal()
    {

        $allowed_roles = array(1,2,3,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);

        $data= $this->M_Reports->_ListProposals();
        $this->smarty->assign('data',$data);
            if(!empty($data['error']))
            {
                print_r($data);

                exit();
            }

        $this->output->set_header("Content-type: application/octet-stream");
        $this->output->set_header("Content-Disposition: attachment; filename=exceldata.xls");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        $this->CORE_TEMPLATE = 'core/coreexport';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('reports/proposalExport.tpl');
        $this->smarty->view();

    }

    public function proposal()


        {

            $allowed_roles = array(1,6); //5 general employee not allowed
            $this->checkRoleAccess($allowed_roles);

            $beenhere = $this->input->post('beenhere');

            $creatorListCB = $this->M_Reports->_getProposalCreators();
            $clientListCB = $this->M_Reports->_getProposalClients();



            $this->smarty->assign('creatorListCB',$creatorListCB);
            $this->smarty->assign('clientListCB',$clientListCB);

            $managerListCB = $this->M_Reports->_getProposalSalesManager();
            $this->smarty->assign('managerListCB',$managerListCB);

            $salesListCB = $this->M_Reports->_getProposalSalesPeople();
            $this->smarty->assign('salesListCB',$salesListCB);

            $this->smarty->assign('beenhere',$beenhere);

            if($beenhere == 1) // get data
            {


                $proposals = $this->M_Reports->_ListProposals();

                $this->smarty->assign('proposals',$proposals);
                if(!empty($proposals['error']))
                {
                    print_r($proposals);

                    exit();
                }
            }


            $this->smarty->assignPageTitle('3D Paving Application');
            $this->smarty->assign('CONTENT','reports/SearchProposals.tpl');
            $this->smarty->view();


        }



    public function labor()

    {

        $allowed_roles = array(1,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        $searchStart = $this->input->post('searchStart');

        $searchEnd = $this->input->post('searchEnd');
        $this->smarty->assign('searchStart',$searchStart);
        $this->smarty->assign('searchEnd',$searchEnd);

        $searchtype = $this->input->post('searchtype');
        $beenhere = $this->input->post('beenhere');

        $this->smarty->assign('searchtype',$searchtype);
        $this->smarty->assign('beenhere',$beenhere);

        $empListCB = $this->M_Reports->_getLabor();
        $this->smarty->assign('empListCB',$empListCB);

        if($beenhere == 1) // get data
        {
            $data = $this->M_Reports->_getLaborReport();

            if($searchtype == 0) // summary
            {
                $result = array();
                $report = array();
                $report['diff'] = 0;
                $report['cntId'] = $data[0]['cntId'];

                foreach($data as $d)
                {

                    if($report['cntId'] != $d['cntId'])
                    {
                        $result[] = $report;
                        $report = array();
                        $report['diff'] = 0;
                        $report['cntId'] = $d['cntId'];

                    }

                    $report['cntFirstName'] = $d['cntFirstName'];
                    $report['cntLastName'] = $d['cntLastName'];
                    $report['diff'] = $report['diff'] + $d['diff'];


                }

                $result[] = $report;
                $data = $result;

            }


            $this->smarty->assign('data',$data);
            if(!empty($data['error']))
            {
                print_r($data);

                exit();
            }
        }
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT','reports/SearchLabor.tpl');
        $this->smarty->view();


    }

    public function exportLabor()

    {

        $allowed_roles = array(1,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        $searchtype = $this->input->post('searchtype');
        $this->smarty->assign('searchtype',$searchtype);
        $beenhere = $this->input->post('beenhere');
        $searchStart = $this->input->post('searchStart');

        $searchEnd = $this->input->post('searchEnd');
        $this->smarty->assign('searchStart',$searchStart);
        $this->smarty->assign('searchEnd',$searchEnd);
        if($beenhere == 1) // get data
        {
            $data = $this->M_Reports->_getLaborReport();

            if($searchtype == 0) // summary
            {
                $result = array();
                $report = array();
                $report['diff'] = 0;
                $report['cntId'] = $data[0]['cntId'];

                foreach($data as $d)
                {

                    if($report['cntId'] != $d['cntId'])
                    {
                        $result[] = $report;
                        $report = array();
                        $report['diff'] = 0;
                        $report['cntId'] = $d['cntId'];

                    }

                    $report['cntFirstName'] = $d['cntFirstName'];
                    $report['cntLastName'] = $d['cntLastName'];
                    $report['diff'] = $report['diff'] + $d['diff'];


                }

                $result[] = $report;
                $data = $result;

            }


            $this->smarty->assign('data',$data);
            if(!empty($data['error']))
            {
                print_r($data);

                exit();
            }
        }

        $this->output->set_header("Content-type: application/octet-stream");
        $this->output->set_header("Content-Disposition: attachment; filename=exceldata.xls");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        $this->CORE_TEMPLATE = 'core/coreexport';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('reports/laborExport.tpl');
        $this->smarty->view();


    }



    public function workorder()


        {

            $allowed_roles = array(1,6); //5 general employee not allowed
            $this->checkRoleAccess($allowed_roles);

            $beenhere = $this->input->post('beenhere');

            $creatorListCB = $this->M_Reports->_getProposalCreators();
            $clientListCB = $this->M_Reports->_getProposalClients();



            $this->smarty->assign('creatorListCB',$creatorListCB);
            $this->smarty->assign('clientListCB',$clientListCB);

            $managerListCB = $this->M_Reports->_getProposalSalesManager();
            $this->smarty->assign('managerListCB',$managerListCB);

            $salesListCB = $this->M_Reports->_getProposalSalesPeople();
            $this->smarty->assign('salesListCB',$salesListCB);

            $this->smarty->assign('beenhere',$beenhere);

            if($beenhere == 1) // get data
            {
                $proposals = $this->M_Reports->_ListProposals(1);


                $this->smarty->assign('proposals',$proposals);
                if(!empty($proposals['error']))
                {
                    print_r($proposals);

                    exit();
                }
            }
            $this->smarty->assignPageTitle('3D Paving Application');
            $this->smarty->assign('CONTENT','reports/SearchWorkorders.tpl');
            $this->smarty->view();


        }



    public function exportWorkorder()


    {
        $data= $this->M_Reports->_ListProposals(1);
        $this->smarty->assign('data',$data);
        if(!empty($data['error']))
        {
            print_r($data);

            exit();
        }

        $this->output->set_header("Content-type: application/octet-stream");
        $this->output->set_header("Content-Disposition: attachment; filename=exceldata.xls");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        $this->CORE_TEMPLATE = 'core/coreexport';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('reports/workorderExport.tpl');
        $this->smarty->view();

    }

        public function ProfileToPDF($id)
    {

        $results = $this->M_Reports->_getCRMUser($id);
        $services = $this->M_Reports->_showCRMServices($id);
        $categories = $this->M_Reports->_showCRMCategories($id);

        $data['CurrentDate'] = $this->CurrentDate;
        $data['data'] = $results;
        $data['services'] = $services;
        $data['categories'] = $categories;
        $html = $this->load->view('rep_profile', $data, true);

        //function to write pdf
        pdf_create($html, 'profile');

    }

    public function ProposalToPDF($id)
    {


        //load models
        $this->load->model('M_Workorders');
        $allowed_roles = array(1,2,3,6); //admin office and sales only
        $this->checkRoleAccess($allowed_roles);
        $this->smarty->assign('allowed_roles', $allowed_roles);


        //get current detail data
        $proposal = $this->M_Workorders->_getProposal($id, 1);


        $proposalDetails = $this->M_Workorders->_getAllPODetails($id);
        $TandC = $this->smarty->fetch('common/TandC.tpl');
        $repheader = $this->smarty->fetch('common/report_header.tpl');

        $data['CurrentDate'] = $this->CurrentDate;
        $data['TandC'] = $TandC;
        $data['repheader'] = $repheader;
        $data['proposal'] = $proposal;
        $data['proposalDetails'] = $proposalDetails;
        $data['WEB_CONFIG'] = $this->WEBCONFIG;

        $html = $this->load->view('rep_proposal', $data, true);
        //	echo $html;
        //exit();

        //  wordwrap($html, 80, "<br />", true);

        //function to write pdf
        pdf_create($html, 'proposal', TRUE);





    }


    public function ProposalToPDFWithImages2($pid)

    {


        $allowed_roles = array(1,2,3,6); //admin office and sales only
        $this->checkRoleAccess($allowed_roles);
        $this->smarty->assign('allowed_roles', $allowed_roles);
        //load models
        $this->load->model('M_Workorders');
        $ids = array();
        foreach ($_POST as $key => $value)
        {
            //echo $key .' = '. $value.'<br/>';
            if (strpos($key, 'upload') === false)
            {
            }
            else
            {
                $ids[] = $value;

            }
        }



        if(count($ids))
        {
           $images = $this->M_Workorders->_getMediaByID($ids,$pid);
        }
        else
        {
            $images = array();
        }


        //get current detail data
        $proposal = $this->M_Workorders->_getProposal($pid, 1);

        $proposalDetails = $this->M_Workorders->_getAllPODetails($pid);
        $TandC = $this->smarty->fetch('common/TandC.tpl');
        $repheader = $this->smarty->fetch('common/report_header.tpl');

        $data['images'] = $images;
        $data['CurrentDate'] = $this->CurrentDate;
        $data['TandC'] = $TandC;
        $data['repheader'] = $repheader;
        $data['proposal'] = $proposal;
        $data['proposalDetails'] = $proposalDetails;
        $data['WEB_CONFIG'] = $this->WEBCONFIG;

        $html = $this->load->view('rep_proposalWithImages', $data, true);
        //$html = $this->load->view('rep_proposal', $data, true);
       	//echo $html;
	    //exit();

       //  wordwrap($html, 80, "<br />", true);


       try {
         pdf_create($html, 'proposal', TRUE);
       }

       //catch exception
       catch(Exception $e) {
         echo 'Message: ' .$e->getMessage();
       }


        //function to write pdf
	 //pdf_create($html, 'proposal', TRUE);



    }

 public function ProposalToPDFWithImages($pid)

    {


        $allowed_roles = array(1,2,3,6); //admin office and sales only
        $this->checkRoleAccess($allowed_roles);
        $this->smarty->assign('allowed_roles', $allowed_roles);
        //load models
        $this->load->model('M_Workorders');
        $ids = array();
        foreach ($_POST as $key => $value)
        {
            //echo $key .' = '. $value.'<br/>';
            if (strpos($key, 'upload') === false)
            {
            }
            else
            {
                $ids[] = $value;

            }
        }



        if(count($ids))
        {
           $images = $this->M_Workorders->_getMediaByID($ids,$pid);
        }
        else
        {
            $images = array();
        }

        //get current detail data
        $proposal = $this->M_Workorders->_getProposal($pid, 1);
        $proposalDetails = $this->M_Workorders->_getAllPODetails($pid);
        $TandC = $this->smarty->fetch('common/TandC2.tpl');
        $repheader = $this->smarty->fetch('common/report_header.tpl');

        $data['images'] = $images;
        $data['CurrentDate'] = $this->CurrentDate;
        $data['TandC'] = $TandC;
        $data['repheader'] = $repheader;
        $data['proposal'] = $proposal;
        $data['proposalDetails'] = $proposalDetails;
        $data['WEB_CONFIG'] = $this->WEBCONFIG;

        $html = $this->load->view('rep_proposalWithImages2', $data, true);
        //$html = $this->load->view('rep_proposal', $data, true);
       	//echo $html;
	    //exit();

       //  wordwrap($html, 80, "<br />", true);

        //function to write pdf
        pdf_createWFooter($html, 'proposal', TRUE);



    }



    public function WOToPDF($pid)
    {

        $allowed_roles = array(1,2,3,6); //admin office and sales only
        $this->checkRoleAccess($allowed_roles);
        $this->smarty->assign('allowed_roles', $allowed_roles);

        //load models
        $this->load->model('M_Workorders');

        $ids = array();
        foreach ($_POST as $key => $value)
        {
            //echo $key .' = '. $value.'<br/>';
            if (strpos($key, 'upload') === false)
            {
            }
            else
            {
                $ids[] = $value;

            }
        }



        if(count($ids))
        {
            $images = $this->M_Workorders->_getMediaByID($ids,$pid);
        }
        else
        {
            $images = array();
        }

        $siteplan = $this->M_Workorders->_getSitePlan($pid);

        $data['siteplan'] = $siteplan;
        //get current detail data
        $proposal = $this->M_Workorders->_getWOALL($pid);
        $data['pid'] = $pid;
        $data['images'] = $images;
        $data['CurrentDate'] = $this->CurrentDate;
        $data['proposal'] = $proposal;
        $data['WEB_CONFIG'] = $this->WEBCONFIG;
        $html = $this->load->view('rep_workorderWithImages', $data, true);

//        $html = $this->load->view('rep_workorder', $data, true);
//        wordwrap($html, 80, "<br />", true);
        //echo $html;
        //exit();
        //function to write pdf
        pdf_create($html, 'workorder', TRUE);



    }


    public function WOToPDFSS($pid,$sid)
    {

        $allowed_roles = array(1,2,3,6); //admin office and sales only
        $this->checkRoleAccess($allowed_roles);
        $this->smarty->assign('allowed_roles', $allowed_roles);

        //load models
        $this->load->model('M_Workorders');


        $ids = array();
        foreach ($_POST as $key => $value)
        {
            //echo $key .' = '. $value.'<br/>';
            if (strpos($key, 'upload') === false)
            {
            }
            else
            {
                $ids[] = $value;

            }
        }



        if(count($ids))
        {
            $images = $this->M_Workorders->_getMediaByID($ids,$pid);
        }
        else
        {
            $images = array();
        }

        $siteplan = $this->M_Workorders->_getSitePlan($pid,$sid);

        $data['siteplan'] = $siteplan;
        //get current detail data
        $proposal = $this->M_Workorders->_getWOALL($pid,$sid);

        $data['sid'] = $sid;
        $data['pid'] = $pid;
        $data['images'] = $images;
        $data['CurrentDate'] = $this->CurrentDate;
        $data['proposal'] = $proposal;
        $data['WEB_CONFIG'] = $this->WEBCONFIG;
        $html = $this->load->view('rep_workorderWithImagesSS', $data, true);

//        $html = $this->load->view('rep_workorder', $data, true);
//        wordwrap($html, 80, "<br />", true);
//        echo $html;
 //       exit();
        //function to write pdf
        pdf_create($html, 'single_service', TRUE);



    }


    public function TaskToPDF($id = null)


    {
        $this->load->model('M_Tasks');


        if(!$id) //if i did not ask for an id then use mine
        {
            $id = $this->USER_ID;
        }

        $data = $this->M_Tasks->_getLastTasks($id, 25);
        $user = $this->M_Tasks->_getTaskUser($id);// who is this task for

        $this->smarty->assign('user', $user);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('id', $id);

        $html = $this->smarty->fetch('reports/rep_Tasks.tpl');

        //function to write pdf

        pdf_create($html, 'tasks');


    }


    public function testpdf()
    {

    //    echo ($this->SITE_URL . 'application/assets/');
     //   exit();
        $this->load->helper(array('dompdf', 'file'));
        $data['html'] = read_file('./rep_test.php');
        $data['profileName'] = "Mike trachtenberg";



        // page info here, db calls, etc.
        //$data = "Hello World"; //loaded data here;
        //marry to html
        $html = $this->load->view('rep_test', $data, true);


        //function to write pdf
        pdf_create($html, 'exportlist');
        //or
       // $data = pdf_create($html, '', false);
       // write_file('assets/name.pdf', $data);
        //if you want to write it to disk and/or send it as an attachment
        //create a download link or attach send email and then then delete

    }


    public function CheckInLetterPrep($pid) //proposal id

    {

        //load models
        $this->load->model('M_Workorders');
        $allowed_roles = array(1,2,3,6); //admin office and sales only
        $this->checkRoleAccess($allowed_roles);
        $this->smarty->assign('allowed_roles', $allowed_roles);


        //get current detail data
        $proposal = $this->M_Workorders->_getWO($pid);
        $this->smarty->assign('proposal', $proposal);


        $this->smarty->assign('pid',$pid);
        $this->smarty->assignContentTemplate('workorders/wo_main2');
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT','workorders/woLetterCheckin.tpl');
        $this->smarty->view();



    }


    public function CheckInLetterPrint()

    {

        $data['clientfirst'] = $this->input->post('clientfirst');
        $data['clientlast'] = $this->input->post('clientlast');
        $data['location'] = $this->input->post('location');
        $data['jobCity'] = $this->input->post('jobCity');
        $data['managerfirst'] = $this->input->post('managerfirst');
        $data['managerlast'] = $this->input->post('managerlast');
        $data['title'] = $this->input->post('title');


        $data['WEB_CONTENT'] = $WEB_CONTENT;
        $data['WEB_CONFIG'] = $this->WEBCONFIG;
        $html = $this->load->view('rep_checkinletter', $data, true);
        wordwrap($html, 80, "<br />", true);
        //function to write pdf
        pdf_create($html, 'checkin');




    }



}
