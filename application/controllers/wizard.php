<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wizard extends EX_Locked {
    // this controller requires login


    function __construct()
    {
        parent::__construct();


        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
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
        <li class="active">CRM</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //load models
        $this->load->model('M_Crm');
        //resources template
        $this->smarty->assignContentTemplate('crm/crm_main');

    }

    function mypdf(){
        $this->load->library('pdf');
        $this->pdf->load_view('common/template');
        $this->pdf->render();
        $this->pdf->stream("welcome.pdf");
    }

    //get list of contacts from crm tables use filter
    public function showList($removefilter = null)

    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);

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
               // 'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
                'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
                'LEFT JOIN crmTblContacts AS b ON m.cntDevelopmentId = b.cntId',
                //'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
            );
            //update the session filter
            $cmsfilter = array('filterWhere' => $filterWhere, 'orderby' => $orderby,'ordertype' => $ordertype,'page_num' => $page_num,'offset' =>$offset,'limit'=>$limit,'filter_str' => $filter_str,'filter' => $filter, 'join' => $join);
            $this->session->set_userdata('cmsfilter', $cmsfilter);

        }

            $data = $this->M_Crm->_getUserList();

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
            $this->smarty->assignContentTemplate('crm/crm_main2');
            $this->smarty->assign('CONTENT','crm/crmList.tpl');
            $this->smarty->view();


    }


    public function exportList()
    {

        $allowed_roles = array(1,6); //admin office
        $this->checkRoleAccess($allowed_roles);

        $data = $this->M_Crm->_getUserList(1);
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
        $this->smarty->assignContentTemplate('crm/crmExport.tpl');


        $this->smarty->view();

    }

//create contact step 1
    public function create($cid = null) //add new contact form step 1 cid can be category id to save

    {

        $allowed_roles = array(1,2,3,6); //4 , 5 job manager  general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Contact Step 1</li>';

        $this->smarty->assign('cid', 18); //default to general contact
        $cidname = "General Contact";
        $this->smarty->assign('cidname', $cidname);

        if($cid)
        {
            $cidname = $this->M_Crm->_getCRMCategories($cid);
            $this->smarty->assign('cidname', $cidname);
            $this->smarty->assign('cid', $cid);
        }

        $this->smarty->assign('managers', null);
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/crm_mainNote');
        $this->smarty->assign('CONTENT','crm/crmAdd.tpl');
        $this->smarty->view();


    }


public function phptest()
{
    $html = $this->load->view('php_test.php');
    echo $html;

}
    public function select() //add new contact form step 1

    {

        $allowed_roles = array(1,2,3,6); //4 , 5 job manager  general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Contact Step 1</li>';

        $cidname = $this->M_Crm->_getCRMCategories();
        $this->smarty->assign('cidname', $cidname);
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/crm_mainfull');
        $this->smarty->assign('CONTENT','crm/crmSelect.tpl');
        $this->smarty->view();


    }

    public function startWizard($cid = null) //add new contact form step 1 cid can be category id to save

    {

        $allowed_roles = array(1,2,3,4,6); //4 , 5 job manager  general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Contact Step 1</li>';

        $this->smarty->assign('cid', 18); //default to general contact
        $cidname = "General Contact";
        $this->smarty->assign('cidname', $cidname);

        if($cid)
        {
            $cidname = $this->M_Crm->_getCRMCategories($cid);
            $this->smarty->assign('cidname', $cidname);
            $this->smarty->assign('cid', $cid);
        }
        $this->smarty->assign('managers', null);
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/crm_mainNote');
        $this->smarty->assign('CONTENT','crm/crmWizard1.tpl');
        $this->smarty->view();


    }


    public function saveWizard($cid = null, $ccatEntity = null)

    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Crm->_saveContact())
        {
            $this->session->set_flashdata('msg','Your data was saved');
            //if create new then redirect to page 2 of wizard
            if($cid == 12 || $cid == 13)// these are managers go straight to properties
            {

                redirect($this->WEBCONFIG['webStartPage'].'crm/PropertyWizard/'.$result, 'refresh');
            }
            redirect($this->WEBCONFIG['webStartPage'].'crm/ManagerWizard/'.$result, 'refresh');
        }

        print_r($result);
    }


    public function ManagerWizard($cid) //add managers

    {

        // $cid = contact id
        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Managers/Employees</li>';
        // get parent contact
        $company = $this->M_Crm->_getCRMUserLight($cid);
        $cidname = $this->M_Crm->_getCRMCategories($company['cntcid']);

        $this->smarty->assign('company', $company);
        $this->smarty->assign('cidname', $cidname);
        $this->smarty->assign('cid', $cid);
        // get managers
        $managers = $this->M_Crm->_getManagers($cid);

        $this->smarty->assign('managers', $managers);

        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/crm_mainNote');
//        $this->smarty->assignContentTemplate('crm/crm_main');

        $this->smarty->assign('CONTENT','crm/crmWizard2.tpl'); // add manager form
        $this->smarty->view();


    }


    public function PropertyWizard($cid) //add properties to parent

    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Properties</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $this->smarty->assignPageTitle('3D Paving Application');

        // get parent contact
        $company = $this->M_Crm->_getCRMUserLight($cid);
        $cidname = $this->M_Crm->_getCRMCategories($company['cntcid']);

        $this->smarty->assign('company', $company);
        $this->smarty->assign('cidname', $cidname);
        $this->smarty->assign('cid', $cid);
        // get managers
        $managers = $this->M_Crm->_getManagers($cid);
        $this->smarty->assign('managers', null);

            // get properties
        $properties = $this->M_Crm->_getProperties($cid);
        $this->smarty->assign('properties', $properties);

        $this->smarty->assignContentTemplate('crm/crm_mainNote');
        $this->smarty->assign('CONTENT','crm/crmWizard3.tpl');

        $this->smarty->view();


    }

    public function saveWizardManager($cid)
    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        //add a anew manager linked to cid
        if($result = $this->M_Crm->_saveContact())
        {
            $this->session->set_flashdata('msg','Your data was saved');
        }
        else
        {
            $this->session->set_flashdata('msg','There was an error. Your data was NOT saved');

        }

        redirect($this->WEBCONFIG['webStartPage'].'crm/ManagerWizard/'.$cid, 'refresh');

    }



    public function saveContact($id = null)

    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Crm->_saveContact($id))
        {
            $this->session->set_flashdata('msg','Your data was saved');
            if($id)
            {
                $this->session->set_flashdata('msg','Your data was updated');
                redirect($this->WEBCONFIG['webStartPage'].'crm/editContact/'.$id, 'refresh');
            }
        }
        //if create new then redirect to page 2 of wizard
        redirect($this->WEBCONFIG['webStartPage'].'crm/additionalinformation/'.$result, 'refresh');

    }


// step 2
    public function additionalinformation($id) //add new contact form step 2

    {

        $allowed_roles = array(1,2,3,6); //4 , 5 job manager  general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Contact Step 2</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $this->smarty->assign('id', $id);


        $data = $this->M_Crm->_getCRMUser($id);

        $developments = $this->M_Crm->_getCRMByCat(9, $id);

        $companies = $this->M_Crm->_getCRMByCat(8, $id);

        $this->smarty->assign('companies', $companies);
        $this->smarty->assign('developments', $developments);
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/crm_main');
        $this->smarty->assign('CONTENT','crm/crmAdditionalInformation.tpl');
        $this->smarty->view();


    }


    public function saveadditionalinformation($id) //add new contact form step 2

    {



        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');
        if($this->input->post('beenhere') ==1)
        {
            if($result = $this->M_Crm->_saveAdditionalInfo($id))
            {
                $this->session->set_flashdata('msg','Your data was saved');
            }

        }
        redirect($this->WEBCONFIG['webStartPage'].'crm/additionalinformation/'.$id, 'refresh');


    }


// step 3
    public function catandservice($id) //add new contact form step 3

    {

        $allowed_roles = array(1,2,3,6); //4 , 5 job manager  general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Contact Step 3</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $this->smarty->assign('id', $id);


        $data = $this->M_Crm->_getCRMUser($id);

        $this->smarty->assign('data', $data);


        $categories = $this->M_Crm->_getCRMUserCategories($id);

        $services = $this->M_Crm->_getCRMUserServices($id);

        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('services', $services);

        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/crm_main');
        $this->smarty->assign('CONTENT','crm/crmCatAndService.tpl');
        $this->smarty->view();


    }

//Sub tables CRM categories add or remove a services and category from USER
    public function savecatandservice($id)

    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');
        if($this->input->post('beenhere') ==1)
        {
            $result = $this->M_Crm->_savecatandservice($id);

            if($result)
            {
                $this->session->set_flashdata('msg','Your data was saved');
            }

        }

        redirect($this->WEBCONFIG['webStartPage'].'crm/catandservice/'.$id, 'refresh');
    }



    public function editContact($id)
    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Edit Contact</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $categoryCB = $this->M_Crm->_getCRMCategories();
        $this->smarty->assign('categoryCB',$categoryCB);

        $data = $this->M_Crm->_getCRMUser($id);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('id', $id);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','crm/crmEdit.tpl');

        $this->smarty->view();
    }



    public function viewContact($id)
    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Profile</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Crm->_getCRMUser($id);
        $proposals = $this->M_Crm->_getCRMProposals($id,4);
        $workorders = $this->M_Crm->_getCRMProposals($id,5);
        $this->smarty->assign('proposals', $proposals);
        $this->smarty->assign('workorders', $workorders);

        $services = $this->M_Crm->_showCRMServices($id);
        $categories = $this->M_Crm->_showCRMCategories($id);
        $notes = $this->M_Crm->_getCRMNotes($id);

        $this->smarty->assign('data', $data);
        $this->smarty->assign('services', $services);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('notes', $notes);

        $this->smarty->assign('id', $id);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','crm/crmProfile.tpl');

        $this->smarty->view();
    }


    public function viewContactU() // view owners profile @todo can they change their profile?
    {


        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">My Profile</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Crm->_getCRMUser($this->USER_ID);
        $services = $this->M_Crm->_showCRMServices($this->USER_ID);
        $categories = $this->M_Crm->_showCRMCategories($this->USER_ID);
        $notes = $this->M_Crm->_getCRMNotes($this->USER_ID);

        $this->smarty->assign('data', $data);
        $this->smarty->assign('services', $services);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('notes', $notes);

        $this->smarty->assign('id', $this->USER_ID);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','crm/crmProfileView.tpl');

        $this->smarty->view();
    }

//EMPLOYEE SECTION

    public function editEmployee($id)
    {
        $allowed_roles = array(1,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li><li class="active">Employees</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Crm->_getEmployee($id);
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','crm/employeeEdit.tpl');

        $this->smarty->view();
    }

    public function employeeList($id = null, $showall = null)
    {

        $allowed_roles = array(1,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li><li class="active">Employees</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Crm->_getEmployee($id,$showall);


        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','crm/employeeList.tpl');

        $this->smarty->view();
    }



    public function CreateEmployee() //add new employee form

    {
        $allowed_roles = array(1,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Employee</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);


        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'crm/employeeAdd.tpl');

        $this->smarty->view();


    }



    public function saveEmployee($id = null) //add new employee form

    {


        $allowed_roles = array(1,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Crm->_saveEmployee($id))
        {

            $this->session->set_flashdata('msg','Your data was saved');
            if($id)
            {
                $this->session->set_flashdata('msg','Your data was updated');
                redirect($this->WEBCONFIG['webStartPage'].'crm/editEmployee/'.$id, 'refresh');
            }
        }


        redirect($this->WEBCONFIG['webStartPage'].'crm/employeeList/', 'refresh');


    }

//end employee section

    public function CRM_ChangeStatus($cid, $action = 0)//default to disable

    {

        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/crm_main');
        $this->smarty->view();
    }



//Manage lookup

//crm categories lookup functions create list save
    public function CreateCategory() //present new cat form

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">CRM Category</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);


        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'crm/categoryAdd.tpl');

        $this->smarty->view();


    }

    public function editCategory($id) //present edit form

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Edit CRM Category</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $data = $this->M_Crm-> _getCRMCategories($id);
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'crm/categoryEdit.tpl');

        $this->smarty->view();


    }

    public function categoryList($id = null) //list all cetgories
    {
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Categories</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Crm->_getCRMCategories($id);

        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','crm/categoryList.tpl');

        $this->smarty->view();
    }


    public function saveCategory($id = null) //insert or update cetgories
    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Crm->_saveCategory($id))
        {

            $this->session->set_flashdata('msg','Your data was saved');
            if($id)
            {
                $this->session->set_flashdata('msg','Your data was updated');
                redirect($this->WEBCONFIG['webStartPage'].'crm/editCategory/'.$id, 'refresh');
            }
        }

        redirect($this->WEBCONFIG['webStartPage'].'crm/categoryList', 'refresh');

    }


//services



    public function CreateService() //present new cat form

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">CRM Services</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);


        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'crm/servicesAdd.tpl');

        $this->smarty->view();


    }

    public function editService($id) //present edit form

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Edit CRM Service</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $data = $this->M_Crm->_getCRMServices($id);
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'crm/servicesEdit.tpl');

        $this->smarty->view();


    }

    public function servicesList($id = null) //list all cetgories
    {
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">CRM Services</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Crm->_getCRMServices($id);

        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','crm/servicesList.tpl');

        $this->smarty->view();
    }


    public function saveServices($id = null) //insert or update cetgories
    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');
        $result = $this->M_Crm->_saveServices($id);

        if($result)
        {

            $this->session->set_flashdata('msg','Your data was saved');
            if($id)
            {
                $this->session->set_flashdata('msg','Your data was updated');
                redirect($this->WEBCONFIG['webStartPage'].'crm/editService/'.$id, 'refresh');
            }
        }

        redirect($this->WEBCONFIG['webStartPage'].'crm/servicesList', 'refresh');

    }

//Contact Notes

    public function saveEmployeeNote($id, $note_id = null) //contact id
    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Crm->_saveCRMNotes($id,$note_id))
        {
            $this->session->set_flashdata('msg','Your data was saved');
        }


        redirect($this->WEBCONFIG['webStartPage'].'crm/employeeNotes/'.$id, 'refresh');

    }

    public function quickAdd($cat_id)
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('username', $username);
        $this->smarty->assign('cat_id', $cat_id);

        $this->CORE_TEMPLATE = 'core/coreexport';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/quickAdd');
        $this->smarty->view();


    }

    public function employeeNotes($id, $note_id = null) //get all or one
    {


        $allowed_roles = array(1,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Employee Notes</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $edit = null;
        //get data
        if($note_id)
        {
            $data = $this->M_Crm->_getCRMNotes($id); //get all
            $edit = $this->M_Crm->_getCRMNotes($id,$note_id); //get one
        }
        else
        {
           $data = $this->M_Crm->_getCRMNotes($id);

        }

        $user = $this->M_Crm->_getEmployee($id);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('note_id', $note_id);
        $this->smarty->assign('edit', $edit);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('id', $id);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','crm/employeeNotes.tpl');

        $this->smarty->view();

    }


    public function crmNotes($id, $note_id = null) //get all or one
    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Contact Notes</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $edit = null;
        //get data
        //get data
        if($note_id)
        {
            $data = $this->M_Crm->_getCRMNotes($id,null); //get all
            $edit = $this->M_Crm->_getCRMNotes($id,$note_id); //get one
        }
        else
        {
            $data = $this->M_Crm->_getCRMNotes($id,$note_id);

        }
        $user = $this->M_Crm->_getCRMUser($id);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('note_id', $note_id);
        $this->smarty->assign('edit', $edit);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('id', $id);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','crm/crmNotes.tpl');

        $this->smarty->view();

    }

    public function saveCRMNote($id, $note_id = null) //contact id
    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Crm->_saveCRMNotes($id,$note_id))
        {
            $this->session->set_flashdata('msg','Your data was saved');
        }


        redirect($this->WEBCONFIG['webStartPage'].'crm/crmNotes/'.$id, 'refresh');

    }


    public function saveQuickAdd($id)

    {

        $allowed_roles = array(1,2,3,4,6); //5 general employee not allowed
        $this->checkRoleAccess($allowed_roles);
        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');


        if($result = $this->M_Crm->_saveQuickAdd())
        {
            $this->session->set_flashdata('msg','Your data was saved');

        }
        //if create new then redirect to page 2 of wizard
        redirect($this->WEBCONFIG['webStartPage'].'crm/additionalinformation/'.$id, 'refresh');

    }


    //END contact notes

    public function checkEmail()
    {
        $email = $this->validate->post('email', 'EMAIL');
        $id = $this->validate->post('id','SAFETEXT');
        if($id == 0)
        {
            $id = null;
        }

        $result = $this->M_Crm->_emailexists($email,$id);
        echo $result;

    }



    public function showTools()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('username', $username);
        $this->CORE_TEMPLATE = 'core/coreexport';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/crmMenu');
        $this->smarty->view();


    }


    public function showEmpTools()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('username', $username);
        $this->CORE_TEMPLATE = 'core/coreexport';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/employeeMenu');
        $this->smarty->view();


    }


    public function showMap()
    {

        $id = $this->input->post('id');
        $fulladdress = $this->input->post('fulladdress');
        $username = $this->input->post('username');
        $this->smarty->assign('fulladdress', $fulladdress);

        $this->smarty->assign('id', $id);
        $this->smarty->assign('username', $username);

        $this->CORE_TEMPLATE = 'core/coreexport';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('crm/crmMap');
        $this->smarty->view();


    }

    public function searchName($id = null, $firstname = null, $lastname = null, $cid = null)
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
        }

        if(isset($_POST['firstname']))
        {
            $firstname = $_POST['firstname'];
        }
        if(isset($_POST['lastname']))
        {
            $lastname = $_POST['lastname'];
        }
        if(isset($_POST['cid']))
        {
            $cid = $_POST['cid'];
        }
        if(!$firstname  && !$lastname)
        {
            echo '<h3>Possible Name Matches</h3>';
            exit();
        }
        $gotofunction = 'ManagerWizard';

        if($cid == 9 && $id)
        {
            $gotofunction = 'changePropertyOwner/'. $id;//do you want to change this property

        }

        if($cid == 12 || $cid == 13)
        {
            $gotofunction = 'PropertyWizard';

        }

        if($cid == 0)
        {
            $gotofunction = 'editContact';
        }
        $result = $this->M_Crm->_searchName($firstname,$lastname, $cid);

        $strresponse ='<h3>Possible Name Matches</h3>';
        if($result)
        {
            $strresponse ='<div class="alert">Please check for a duplicate record.</div>';

            foreach($result as $r)
            {
                $strresponse = $strresponse .'<br/>';
                $strresponse = $strresponse .'<table style="width:200px;"><tr>';
                $strresponse = $strresponse .'<td  style="width:160px;">';
                $strresponse = $strresponse .'<a href="'.$this->SITE_URL.'crm/'.$gotofunction.'/'.$r['cntId'].'"  title="Click to Select">'.$r['cntFirstName'].' ' . $r['cntLastName'] .'</a><br/>';
               if($r['cntPrimaryAddress1'] != '')
               {
                   $strresponse = $strresponse .$r['cntPrimaryAddress1'].' ' . $r['cntPrimaryAddress2'] .'<br/>';
               }
                if($r['cntPrimaryCity'] != '')
                {
                    $strresponse = $strresponse .$r['cntPrimaryCity'].' ' . $r['cntPrimaryState'] .', ' . $r['cntPrimaryZip'] .' <br/>';
                }
                $strresponse = $strresponse .'<span class="alert-info">'. $r['ccatName'].'</span><br/>';
                $strresponse = $strresponse .$r['companyname'];
                //$strresponse = $strresponse .$r['cntPrimaryEmail'] ;
                $strresponse = $strresponse .'</td>';
                $strresponse = $strresponse .'<td  style="width:40px;"><a href="'.$this->SITE_URL.'crm/'.$gotofunction.'/'.$r['cntId'].'"  title="Click to Select"><img src="'.$this->SITE_URL.'assets/images/usearrow2.gif" width="40" title="Click to use this contact" alt="Use this contact" border="0"></a> <br/>';
                $strresponse = $strresponse .'</td>';
                $strresponse = $strresponse .'</tr>';
                $strresponse = $strresponse .'</table>';
                $strresponse = $strresponse .'<br/>';
            }
        }
        echo $strresponse;
        //echo json_encode($result);

    }


    public function searchEmail($email = null, $cid = null)
    {
        if(isset($_POST['email']))
        {
            $email = $_POST['email'];
        }
        if(isset($_POST['cid']))
        {
            $cid = $_POST['cid'];
        }
        if(!$email)
        {
            echo 'No Results Found';
            exit();
        }
        $gotofunction = 'ManagerWizard';
        if($cid == 12 || $cid == 13)
        {
            $gotofunction = 'PropertyWizard';

        }
        $result = $this->M_Crm->_searchEmail($email);
        $strresponse ='<h3>Possible Email Matches</h3>';
        if($result)
        {
            $strresponse ='<div class="alert">Please check for a duplicate record.</div>';

            foreach($result as $r)
            {
                $strresponse = $strresponse .'<br/><table><tr><td><a href="'.$this->SITE_URL.'crm/'.$gotofunction.'/'.$r['cntId'].'"  title="Click to Select">'.$r['cntFirstName'].' ' . $r['cntLastName'] .'</a><br/>';
                $strresponse = $strresponse .$r['cntPrimaryAddress1'].' ' . $r['cntPrimaryAddress2'] .'<br/>';
                $strresponse = $strresponse .$r['cntPrimaryCity'].' ' . $r['cntPrimaryState'] .', ' . $r['cntPrimaryZip'] .' <br/>';
                $strresponse = $strresponse .$r['cntPrimaryEmail'] ;
                $strresponse = $strresponse .'</td><td valign="top"><a href="'.$this->SITE_URL.'crm/'.$gotofunction.'/'.$r['cntId'].'"  title="Click to Select"><img src="'.$this->SITE_URL.'assets/images/usearrow2.gif" width="40" title="Click to use this contact" alt="Use this contact" border="0"></a> <br/>';
                $strresponse = $strresponse .'</td></tr></table><br/>';
            }
        }
        echo $strresponse;
    }



}
