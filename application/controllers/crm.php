<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class CRM extends EX_Locked

{
	// this controller requires login
	function __construct()
	{
		parent::__construct();
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$userInfo = $this->session->userdata('userInfo');
		if ($userInfo['USER_ACCESS'] == FALSE)
		{
			redirect($this->WEBCONFIG['webStartPage'], 'refresh');
		}
		if (!in_array($userInfo['USER_ROLE'], $allowed_roles))
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'apperror/catchErrors/1', 'refresh');
		}
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// load models
		$this->load->model('M_Crm');
		// resources template
		$this->smarty->assignContentTemplate('crm/crm_main');
	}
	// get list of contacts from crm tables use filter
	public function showList($removefilter = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		if ($removefilter == 1)
		{
			$this->session->unset_userdata('cmsfilter');
		}
		if ($removefilter == 2) //contacts created this month
		{
			$filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1 AND m.cntCreatedDate >="' . $this->Month . '"';
			// default ordering lastname firstname
			$orderby = 'm.cntLastName, m.cntFirstName';
			$ordertype = 'ASC';
			// text to display
			$filter_str = "Where Status is Active";
			// default limit and offset
			$limit = 25;
			$page_num = 1; //current page
			$filter = 1;
			$offset = 0;
			$total_pages = 1; //total pages
			$params = array();
			$join = array(
				'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
				'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
				'LEFT JOIN crmTblContacts AS b ON m.cntManagerId = b.cntId',
				'LEFT JOIN crmLkpCategories c ON m.cntcid = c.ccatId',
				'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
			);
			$join = array(
				// 'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
				'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
				'LEFT JOIN crmTblContacts AS b ON m.cntManagerId = b.cntId',
				'LEFT JOIN crmLkpCategories c ON m.cntcid = c.ccatId',
				// 'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
			);
			// update the session filter
			$cmsfilter = array(
				'filterWhere' => $filterWhere,
				'orderby' => $orderby,
				'ordertype' => $ordertype,
				'page_num' => $page_num,
				'offset' => $offset,
				'limit' => $limit,
				'filter_str' => $filter_str,
				'filter' => $filter,
				'join' => $join
			);
			$this->session->set_userdata('cmsfilter', $cmsfilter);
		}
		if ($removefilter == 3) //leads unqualified
		{
			$filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1 AND m.cntQualified = 0';
			// default ordering lastname firstname
			$orderby = 'm.cntLastName, m.cntFirstName';
			$ordertype = 'ASC';
			// text to display
			$filter_str = "Where Status is Active AND Contact IS NOT Qualified ";
			// default limit and offset
			$limit = 25;
			$page_num = 1; //current page
			$filter = 1;
			$offset = 0;
			$total_pages = 1; //total pages
			$params = array();
			$join = array(
				// 'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
				'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
				'LEFT JOIN crmTblContacts AS b ON m.cntManagerId = b.cntId',
				'LEFT JOIN crmLkpCategories c ON m.cntcid = c.ccatId',
				// 'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
			);
			// update the session filter
			$cmsfilter = array(
				'filterWhere' => $filterWhere,
				'orderby' => $orderby,
				'ordertype' => $ordertype,
				'page_num' => $page_num,
				'offset' => $offset,
				'limit' => $limit,
				'filter_str' => $filter_str,
				'filter' => $filter,
				'join' => $join
			);
			$this->session->set_userdata('cmsfilter', $cmsfilter);
		}
		if (isset($cmsfilter))
		{
			// print_r($cmsfilter);
			//  exit();
		}
		foreach($_POST as $key => $value)
		{
			//    echo $key .' = ' . $value;
		}
		// exit();
		$data = $this->M_Crm->_getUserList();
		$categoryCB = $this->M_Crm->_getCRMCategories();
		$servicesCB = $this->M_Crm->_getCRMServices();
		$this->smarty->assign('categoryCB', $categoryCB);
		$this->smarty->assign('servicesCB', $servicesCB);
		$this->smarty->assign('data', $data);
		if (!empty($data['error']))
		{
			print_r($data);
			exit();
		}
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('crm/crm_main2');
		$this->smarty->assign('CONTENT', 'crm/crmList.tpl');
		$this->smarty->view();
	}
	public function showCRMList()

	{
		ini_set('memory_limit', '-1');
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //job managers and field worker
		$this->checkRoleAccess($allowed_roles);
		// $data = $this->M_Crm->_getUserList();
		

		$data = $this->M_Crm->_getAllContacts();
		//        print_r($data);
		//       exit();
		$this->smarty->assign('data', $data);
		if (!empty($data['error']))
		{
			print_r($data);
			exit();
		}
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('crm/crm_mainfull');
		$this->smarty->assign('CONTENT', 'crm/crmList2.tpl');
		$this->smarty->view();
	}
	public function exportList()

	{
		ini_set('memory_limit', '-1');
		$allowed_roles = array(
			1,
			6
		); //admin office
		$this->checkRoleAccess($allowed_roles);
		$data = $this->M_Crm->_getUserList(1);
		$this->smarty->assign('data', $data);
		if (!empty($data['error']))
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
	// create contact step 1
	public function create($cid = null) //add new contact form step 1 cid can be category id to save

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //4 , 5 job manager  general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Contact Step 1</li>';
		$this->smarty->assign('cid', 18); //default to general contact
		$cidname = "General Contact";
		$this->smarty->assign('cidname', $cidname);
		if (!$cid)
		{
			$cid = 18;
		}
		if ($cid)
		{
			$cidname = $this->M_Crm->_getCRMCategories($cid);
			$this->smarty->assign('cidname', $cidname);
			$this->smarty->assign('cid', $cid);
		}
		$this->smarty->assign('properties', null);
		$this->smarty->assign('managers', null);
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('crm/crm_mainNote');
		$this->smarty->assign('CONTENT', 'crm/crmAdd.tpl');
		$this->smarty->view();
	}
	public function select() //add new contact form step 1

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //4 , 5 job manager  general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Contact Step 1</li>';
		$cidname = $this->M_Crm->_getCRMCategories();
		$this->smarty->assign('cidname', $cidname);
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('crm/crm_mainfull');
		$this->smarty->assign('CONTENT', 'crm/crmSelect.tpl');
		$this->smarty->view();
	}
	public function startWizard($cid = null) //add new contact form step 1 cid can be category id to save

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //4 , 5 job manager  general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Contact Step 1</li>';
		$this->smarty->assign('cid', 18); //default to general contact
		$cidname = "General Contact";
		$this->smarty->assign('cidname', $cidname);
		if ($cid)
		{
			$cidname = $this->M_Crm->_getCRMCategories($cid);
			$this->smarty->assign('cidname', $cidname);
			$this->smarty->assign('cid', $cid);
		}
		$this->smarty->assign('properties', null);
		$this->smarty->assign('managers', null);
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('crm/crm_mainNote');
		$this->smarty->assign('CONTENT', 'crm/crmWizard1.tpl');
		$this->smarty->view();
	}
	public function saveWizard($cid = null)

	{
		if (!$cid)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/startWizard/', 'refresh');
		}
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		);
		// 5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($result = $this->M_Crm->_saveContact())
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
			// if create new then redirect to page 2 of wizard
			if ($cid == 12 || $cid == 13) // these are managers go straight to properties
			{
				redirect($this->WEBCONFIG['webStartPage'] . 'crm/PropertyWizard/' . $result, 'refresh');
			}
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/ManagerWizard/' . $result, 'refresh');
		}
	}
	public function ManagerWizard($cid) //add managers

	{
		// $cid = contact id
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
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
		$this->smarty->assign('properties', null);
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('crm/crm_mainNote');
		//        $this->smarty->assignContentTemplate('crm/crm_main');
		$this->smarty->assign('CONTENT', 'crm/crmWizard2.tpl'); // add manager form
		$this->smarty->view();
	}
	public function saveWizardManager($cid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		// add a anew manager linked to company and category cid
		if ($result = $this->M_Crm->_saveContact())
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
		}
		else
		{
			$this->session->set_flashdata('msg', 'There was an error. Your data was NOT saved');
			
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/ManagerWizard/' . $cid, 'refresh');
	}
	public function PropertyWizard($cid) //add properties to parent

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
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
		$this->smarty->assign('compmanagers', $managers);
		$this->smarty->assign('managers', null);
		// get properties
		$properties = $this->M_Crm->_getProperties($cid);
		$this->smarty->assign('properties', $properties);
		$this->smarty->assignContentTemplate('crm/crm_mainNote');
		$this->smarty->assign('CONTENT', 'crm/crmWizard3.tpl');
		$this->smarty->view();
	}
	public function saveWizardProperty($cid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		// add a anew property linked to cid
		if ($result = $this->M_Crm->_saveContact())
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
		}
		else
		{
			$this->session->set_flashdata('msg', 'There was an error. Your data was NOT saved');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/PropertyWizard/' . $cid, 'refresh');
	}
	public function changeManager($cid, $mid) //swap manager link

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		// add a anew property linked to cid
		if ($result = $this->M_Crm->_changeCompanyLink($cid, $mid))
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
		}
		else
		{
			$this->session->set_flashdata('msg', 'There was an error. Your data was NOT saved');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/ManagerWizard/' . $cid, 'refresh');
	}
	public function changeProperty($cid, $mid) //swap property

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		// add a anew property linked to cid
		if ($result = $this->M_Crm->_changeCompanyLink($cid, $mid))
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
		}
		else
		{
			$this->session->set_flashdata('msg', 'There was an error. Your data was NOT saved');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/PropertyWizard/' . $cid, 'refresh');
	}
	public function saveContact($id = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($result = $this->M_Crm->_saveContact($id))
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
			if ($id)
			{
				$this->session->set_flashdata('msg', 'Your data was updated');
				redirect($this->WEBCONFIG['webStartPage'] . 'crm/editContact/' . $id, 'refresh');
			}
		}
		// if create new then redirect to page 2 of wizard
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/additionalinformation/' . $result, 'refresh');
	}
	// step 2
	public function additionalinformation($id) //add new contact form step 2

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //4 , 5 job manager  general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Contact Step 2</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assign('id', $id);
		// i have company in here if linked
		$data = $this->M_Crm->_getCRMUser($id);
		$mymanagers = null;
		if ($data['cntCompanyId'] > 0)
		{
			// get managers linked to this parent.
			$mymanagers = $this->M_Crm->_getManagers($data['cntCompanyId']); //manager types only
		}
		// get managers linked to this contact.
		$managers = $this->M_Crm->_getManagers($id); //manager types only
		// get properties linked to this contact.
		$properties = $this->M_Crm->_getProperties($id); //properties only
		// get properties I am the manager of.
		$mproperties = $this->M_Crm->_getManagerProperties($id); //properties  I am the manager id of only
		$related = $this->M_Crm->_getRelated($id); //not managers or properties
		// link to companies
		$companycats = array(
			1,
			7,
			10,
			14,
			16,
			17
		); // I could be linked to these as a property
		$companies = $this->M_Crm->_getCRMByMainCat($companycats); // all company types
		$this->smarty->assign('related', $related); //properties related to contact
		$this->smarty->assign('mproperties', $mproperties); //properties related to contact
		$this->smarty->assign('properties', $properties); //properties related to contact
		$this->smarty->assign('companies', $companies); // company types for drop down list to link
		$this->smarty->assign('mymanagers', $mymanagers); //any managers related to contact ?
		$this->smarty->assign('managers', $managers); //any managers related to contact ?
		$this->smarty->assign('data', $data);
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('crm/crm_main');
		$this->smarty->assign('CONTENT', 'crm/crmAdditionalInformation.tpl');
		$this->smarty->view();
	}
	public function saveadditionalinformation($id) //add new contact form step 2

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($this->input->post('beenhere') == 1)
		{
			if ($result = $this->M_Crm->_saveAdditionalInfo($id))
			{
				$this->session->set_flashdata('msg', 'Your data was saved');
			}
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/additionalinformation/' . $id, 'refresh');
	}
	// step 3
	public function catandservice($id) //add new contact form step 3

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //4 , 5 job manager  general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
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
		$this->smarty->assign('CONTENT', 'crm/crmCatAndService.tpl');
		$this->smarty->view();
	}
	// Sub tables CRM categories add or remove a services and category from USER
	public function savecatandservice($id)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($this->input->post('beenhere') == 1)
		{
			$result = $this->M_Crm->_savecatandservice($id);
			if ($result)
			{
				$this->session->set_flashdata('msg', 'Your data was saved');
			}
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/catandservice/' . $id, 'refresh');
	}
	public function editContact($id)

	{
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Edit Contact</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get data
		$categoryCB = $this->M_Crm->_getCRMCategories();
		$this->smarty->assign('categoryCB', $categoryCB);
		$data = $this->M_Crm->_getCRMUser($id);
		$this->smarty->assign('data', $data);
		$this->smarty->assign('id', $id);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/crmEdit.tpl');
		$this->smarty->view();
	}
	public function viewContact($id)

	{
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Profile</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get data
		$data = $this->M_Crm->_getCRMUser($id);
		$proposals = $this->M_Crm->_getCRMProposals($id, 4);
		$workorders = $this->M_Crm->_getCRMProposals($id, 5);
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
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/crmProfile.tpl');
		$this->smarty->view();
	}
	public function viewContactU() // view owners profile @todo can they change their profile?

	{
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">My Profile</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get data
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
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/crmProfileView.tpl');
		$this->smarty->view();
	}
	// EMPLOYEE SECTION
	public function editEmployee($id)

	{
		$allowed_roles = array(
			1,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">Resources</li><li class="active">Employees</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get data
		$data = $this->M_Crm->_getEmployee($id);
		$this->smarty->assign('data', $data);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/employeeEdit.tpl');
		$this->smarty->view();
	}
	public function employeeList($id = null, $showall = null)

	{
		$allowed_roles = array(
			1,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">Resources</li><li class="active">Employees</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get data
		$data = $this->M_Crm->_getEmployee($id, $showall);
		$this->smarty->assign('data', $data);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/employeeList.tpl');
		$this->smarty->view();
	}
	public function CreateEmployee() //add new employee form

	{
		$allowed_roles = array(
			1,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Add Employee</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/employeeAdd.tpl');
		$this->smarty->view();
	}
	public function saveEmployee($id = null) //add new employee form

	{
		$allowed_roles = array(
			1,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($result = $this->M_Crm->_saveEmployee($id))
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
			if ($id)
			{
				$this->session->set_flashdata('msg', 'Your data was updated');
				redirect($this->WEBCONFIG['webStartPage'] . 'crm/editEmployee/' . $id, 'refresh');
				exit();
			}
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/employeeList/', 'refresh');
	}
	// end employee section
	public function CRM_ChangeStatus($cid, $action = 0) //default to disable

	{
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('crm/crm_main');
		$this->smarty->view();
	}
	// Manage lookup
	// crm categories lookup functions create list save
	public function CreateCategory() //present new cat form

	{
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">CRM Category</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/categoryAdd.tpl');
		$this->smarty->view();
	}
	public function editCategory($id) //present edit form

	{
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Edit CRM Category</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$data = $this->M_Crm->_getCRMCategories($id);
		$this->smarty->assign('data', $data);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/categoryEdit.tpl');
		$this->smarty->view();
	}
	public function categoryList($id = null) //list all cetgories

	{
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Categories</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get data
		$data = $this->M_Crm->_getCRMCategories($id);
		$this->smarty->assign('data', $data);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/categoryList.tpl');
		$this->smarty->view();
	}
	public function saveCategory($id = null) //insert or update cetgories

	{
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($result = $this->M_Crm->_saveCategory($id))
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
			if ($id)
			{
				$this->session->set_flashdata('msg', 'Your data was updated');
				redirect($this->WEBCONFIG['webStartPage'] . 'crm/editCategory/' . $id, 'refresh');
			}
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/categoryList', 'refresh');
	}
	// services
	public function CreateService() //present new cat form

	{
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">CRM Services</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/servicesAdd.tpl');
		$this->smarty->view();
	}
	public function editService($id) //present edit form

	{
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Edit CRM Service</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$data = $this->M_Crm->_getCRMServices($id);
		$this->smarty->assign('data', $data);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/servicesEdit.tpl');
		$this->smarty->view();
	}
	public function servicesList($id = null) //list all cetgories

	{
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">CRM Services</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get data
		$data = $this->M_Crm->_getCRMServices($id);
		$this->smarty->assign('data', $data);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/servicesList.tpl');
		$this->smarty->view();
	}
	public function saveServices($id = null) //insert or update cetgories

	{
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		$result = $this->M_Crm->_saveServices($id);
		if ($result)
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
			if ($id)
			{
				$this->session->set_flashdata('msg', 'Your data was updated');
				redirect($this->WEBCONFIG['webStartPage'] . 'crm/editService/' . $id, 'refresh');
			}
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/servicesList', 'refresh');
	}
	// Contact Notes
	public function saveEmployeeNote($id, $note_id = null) //contact id

	{
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($result = $this->M_Crm->_saveCRMNotes($id, $note_id))
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/employeeNotes/' . $id, 'refresh');
	}
	public function quickAdd($cat_id)

	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$this->smarty->assign('id', $id);
		$this->smarty->assign('username', $username);
		$this->smarty->assign('cat_id', $cat_id);
		$companycats = array(
			1,
			7,
			10
		); // I could be linked to these as a property
		$catlist = $this->M_Crm->_getCRMCats($companycats);
		$this->smarty->assign('catlist', $catlist);
		$this->CORE_TEMPLATE = 'core/coreexport';
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('crm/crmQuickAdd');
		$this->smarty->view();
	}
	public function employeeNotes($id, $note_id = null) //get all or one

	{
		$allowed_roles = array(
			1,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Employee Notes</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$edit = null;
		// get data
		if ($note_id)
		{
			$data = $this->M_Crm->_getCRMNotes($id); //get all
			$edit = $this->M_Crm->_getCRMNotes($id, $note_id); //get one
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
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/employeeNotes.tpl');
		$this->smarty->view();
	}
	public function crmNotes($id, $note_id = null) //get all or one

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Contact Notes</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$edit = null;
		// get data
		// get data
		if ($note_id)
		{
			$data = $this->M_Crm->_getCRMNotes($id, null); //get all
			$edit = $this->M_Crm->_getCRMNotes($id, $note_id); //get one
		}
		else
		{
			$data = $this->M_Crm->_getCRMNotes($id, $note_id);
		}
		$user = $this->M_Crm->_getCRMUser($id);
		$this->smarty->assign('user', $user);
		$this->smarty->assign('note_id', $note_id);
		$this->smarty->assign('edit', $edit);
		$this->smarty->assign('data', $data);
		$this->smarty->assign('id', $id);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/crmNotes.tpl');
		$this->smarty->view();
	}
	public function saveCRMNote($id, $note_id = null) //contact id

	{
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($result = $this->M_Crm->_saveCRMNotes($id, $note_id))
		{
			if (isset($_POST['cnotSendNote']))
			{
				$this->load->helper(array(
					'form',
					'url'
				));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('cnotNoteSender', 'From Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('cnotSendNoteTo', 'To Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('cnotNote', 'Message', 'required|xss_clean');
				if ($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('msg', 'Please enter a valid email address for the person receiving the reminder');
					redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetClientReminder/' . $id, 'refresh');
				}
				else
				{
					$this->load->library('email');
					$this->email->initialize(array(
						'protocol' => 'smtp',
						'smtp_host' => 'smtp.sendgrid.net',
						'smtp_user' => 'AllPaving',
						'smtp_pass' => 'allpaving2012',
						'smtp_port' => 587,
						'crlf' => "\r\n",
						'newline' => "\r\n"
					));
					$this->email->from($this->input->post('cnotNoteSender'));
					$this->email->to( /*$this->input->post('cnotSendNote')*/
					'jbrowngraphicdesign@gmail.com');
					$this->email->subject('Message from 3D Paving');
					$this->email->message($this->input->post('cnotNote'));
					$this->email->send();
					$this->session->set_flashdata('msg', "Your note has been shared with the client");
					redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetClientReminder/' . $id, 'refresh');
				}
			}
			$this->session->set_flashdata('msg', 'Your data was saved');
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetClientReminder/' . $id, 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmNotes/' . $id, 'refresh');
	}
	public function saveQuickAdd($id)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($result = $this->M_Crm->_saveQuickAdd())
		{
			$this->session->set_flashdata('msg', 'Your data was saved');
		}
		// if create new then redirect to page 2 of wizard
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/additionalinformation/' . $id, 'refresh');
	}
	// END contact notes
	public function checkEmail()

	{
		$email = $this->validate->post('email', 'EMAIL');
		$id = $this->validate->post('id', 'SAFETEXT');
		if ($id == 0)
		{
			$id = null;
		}
		$result = $this->M_Crm->_emailexists($email, $id);
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
	public function searchName($firstname = null, $lastname = null, $cid = null)

	{
		if (isset($_POST['cid'])) // what category am I searching in
		{
			$cid = $_POST['cid'];
		}
		if (isset($_POST['firstname']))
		{
			$firstname = $_POST['firstname'];
		}
		if (isset($_POST['lastname']))
		{
			$lastname = $_POST['lastname'];
		}
		if (!$firstname && !$lastname)
		{
			echo '<h3>Possible Name Matches</h3>';
			exit();
		}
		// default go to manager employee add,
		$gotofunction = 'ManagerWizard';
		if ($cid == 12 || $cid == 13) // if we start with a manager and find a match then go to property
		{
			$gotofunction = 'PropertyWizard';
		}
		if ($cid == 0) //override to edit contact
		{
			$gotofunction = 'editContact';
		}
		$result = $this->M_Crm->_searchName($firstname, $lastname, $cid);
		$strresponse = '<h3>Possible Name Matches</h3>';
		$linkid = '';
		if ($result)
		{
			$strresponse = '<div class="alert" style="width:100%;">Please check for a duplicate record.</div>';
			foreach($result as $r)
			{
				/*
				These are search results that can override entry
				If they are picked then use them if goto is manager then use the id, if goto is property then use the companyid found id
				*/
				$strresponse = $strresponse . '<br/>';
				$strresponse = $strresponse . '<table style="width:100%;"><tr>';
				$strresponse = $strresponse . '<td  style="width:80%;">';
				$linkid = $r['cntId'];
				if (($cid == 12 || $cid == 13) && $r['cntCompanyId'] > 0) // if we start with a manager and find a match then go to property
				{
					$linkid = $r['cntCompanyId'];
				}
				$strresponse = $strresponse . '<a href="' . $this->SITE_URL . 'crm/' . $gotofunction . '/' . $linkid . '"  title="Click to Select">' . $r['cntFirstName'] . ' ' . $r['cntLastName'] . '</a><br/>';
				if ($r['cntPrimaryAddress1'] != '')
				{
					$strresponse = $strresponse . $r['cntPrimaryAddress1'] . ' ' . $r['cntPrimaryAddress2'] . '<br/>';
				}
				if ($r['cntPrimaryCity'] != '')
				{
					$strresponse = $strresponse . $r['cntPrimaryCity'] . ' ' . $r['cntPrimaryState'] . ', ' . $r['cntPrimaryZip'] . ' <br/>';
				}
				$strresponse = $strresponse . '<span class="alert-info">' . $r['ccatName'] . '</span><br/>';
				$strresponse = $strresponse . $r['companyname'];
				// $strresponse = $strresponse .$r['cntPrimaryEmail'] ;
				$strresponse = $strresponse . '</td>';
				$strresponse = $strresponse . '<td  style="width:20%;"><a href="' . $this->SITE_URL . 'crm/' . $gotofunction . '/' . $linkid . '"  title="Click to Select"><img src="' . $this->SITE_URL . 'assets/images/usearrow2.gif" width="35" title="Click to use this contact" alt="Use this contact" border="0"></a> <br/>';
				$strresponse = $strresponse . '</td>';
				$strresponse = $strresponse . '</tr>';
				$strresponse = $strresponse . '</table>';
				$strresponse = $strresponse . '<br/>';
			}
		}
		echo trim($strresponse);
		// echo json_encode($result);
	}
	public function searchName2($firstname = null, $lastname = null, $cid = null) // searching duplicate managers

	{
		if (isset($_POST['cid'])) // what is parent id
		{
			$cid = $_POST['cid'];
		}
		if (isset($_POST['firstname']))
		{
			$firstname = $_POST['firstname'];
		}
		if (isset($_POST['lastname']))
		{
			$lastname = $_POST['lastname'];
		}
		if (!$firstname && !$lastname)
		{
			echo '<h3>Possible Name Matches</h3>';
			exit();
		}
		$gotofunction = 'changeManager/' . $cid; //do you want to change this manager
		$result = $this->M_Crm->_searchName2($firstname, $lastname, $cid);
		$strresponse = '<h3>Possible Name Matches</h3>';
		if ($result)
		{
			$strresponse = '<div class="alert" style="width:100%;">Please check for a duplicate record.</div>';
			foreach($result as $r)
			{
				$strresponse = $strresponse . '<br/>';
				$strresponse = $strresponse . '<table style="width:100%;"><tr>';
				$strresponse = $strresponse . '<td  style="width:80%;">';
				$strresponse = $strresponse . '<a href="Javascript:changeMe(' . $r['cntId'] . ');" id="' . $r['cntId'] . '"  data-company="' . $r['companyfirstname'] . ' ' . $r['companylastname'] . '" title="Click to Select">' . $r['cntFirstName'] . ' ' . $r['cntLastName'] . '</a><br/>';
				if ($r['cntPrimaryAddress1'] != '')
				{
					$strresponse = $strresponse . $r['cntPrimaryAddress1'] . ' ' . $r['cntPrimaryAddress2'] . '<br/>';
				}
				if ($r['cntPrimaryCity'] != '')
				{
					$strresponse = $strresponse . $r['cntPrimaryCity'] . ' ' . $r['cntPrimaryState'] . ', ' . $r['cntPrimaryZip'] . ' <br/>';
				}
				$strresponse = $strresponse . '<span class="alert-info">' . $r['ccatName'] . '</span><br/>';
				$strresponse = $strresponse . 'Linked to Company:' . $r['companyfirstname'] . ' ' . $r['companylastname'];
				// $strresponse = $strresponse .$r['cntPrimaryEmail'] ;
				$strresponse = $strresponse . '</td>';
				$strresponse = $strresponse . '<td  style="width:20%;"><a href="Javascript:changeMe(' . $r['cntId'] . ');" id="' . $r['cntId'] . '"  data-company="' . $r['companyfirstname'] . ' ' . $r['companylastname'] . '"  title="Click to Select"><img src="' . $this->SITE_URL . 'assets/images/usearrow2.gif" width="35" title="Click to use this contact" alt="Use this contact" border="0"></a> <br/>';
				$strresponse = $strresponse . '</td>';
				$strresponse = $strresponse . '</tr>';
				$strresponse = $strresponse . '</table>';
				$strresponse = $strresponse . '<br/>';
			}
		}
		echo $strresponse;
		// echo json_encode($result);
	}
	public function searchName3($firstname = null, $lastname = null, $id = null) // searching duplicate properties

	{
		if (isset($_POST['id'])) // what is parent id
		{
			$id = $_POST['id'];
		}
		if (isset($_POST['firstname']))
		{
			$firstname = $_POST['firstname'];
		}
		if (isset($_POST['lastname']))
		{
			$lastname = $_POST['lastname'];
		}
		if (!$firstname && !$lastname)
		{
			echo '<h3>Possible Name Matches</h3>';
			exit();
		}
		$gotofunction = 'changeProperty/' . $id . '/'; //do you want to change this property and start a proposal
		// $gotofunction = 'editContact';
		$result = $this->M_Crm->_searchName3($firstname, $lastname, $id);
		$strresponse = '<h3>Possible Name Matches</h3>';
		if ($result)
		{
			$strresponse = '<div class="alert" style="width:100%;">Please check for a duplicate record.</div>';
			foreach($result as $r)
			{
				$strresponse = $strresponse . '<br/>';
				$strresponse = $strresponse . '<table style="width:100%;"><tr>';
				$strresponse = $strresponse . '<td  style="width:80%;">';
				$strresponse = $strresponse . '<a href="Javascript:changeMe(' . $r['cntId'] . ');" id="' . $r['cntId'] . '"  data-company="' . $r['companyfirstname'] . ' ' . $r['companylastname'] . '" title="Click to Select">' . $r['cntFirstName'] . ' ' . $r['cntLastName'] . '</a><br/>';
				if ($r['cntPrimaryAddress1'] != '')
				{
					$strresponse = $strresponse . $r['cntPrimaryAddress1'] . ' ' . $r['cntPrimaryAddress2'] . '<br/>';
				}
				if ($r['cntPrimaryCity'] != '')
				{
					$strresponse = $strresponse . $r['cntPrimaryCity'] . ' ' . $r['cntPrimaryState'] . ', ' . $r['cntPrimaryZip'] . ' <br/>';
				}
				$strresponse = $strresponse . '<span class="alert-info">' . $r['ccatName'] . '</span><br/>';
				$strresponse = $strresponse . 'Linked to Company<br />' . $r['companyfirstname'] . ' ' . $r['companylastname'];
				// $strresponse = $strresponse .$r['cntPrimaryEmail'] ;
				$strresponse = $strresponse . '</td>';
				$strresponse = $strresponse . '<td  style="width:20%;"><a href="Javascript:changeMe(' . $r['cntId'] . ');" id="' . $r['cntId'] . '"  data-company="' . $r['companyfirstname'] . ' ' . $r['companylastname'] . '"  title="Click to Select"><img src="' . $this->SITE_URL . 'assets/images/usearrow2.gif" width="35" title="Click to use this contact" alt="Use this contact" border="0"></a> <br/>';
				$strresponse = $strresponse . '</td>';
				$strresponse = $strresponse . '</tr>';
				$strresponse = $strresponse . '</table>';
				$strresponse = $strresponse . '<br/>';
			}
		}
		echo $strresponse;
		// echo json_encode($result);
	}
	public function searchEmail($email = null, $cid = null)

	{
		if (isset($_POST['email']))
		{
			$email = $_POST['email'];
		}
		if (isset($_POST['cid']))
		{
			$cid = $_POST['cid'];
		}
		if (!$email)
		{
			echo 'No Results Found';
			exit();
		}
		$gotofunction = 'ManagerWizard';
		if ($cid == 12 || $cid == 13)
		{
			$gotofunction = 'PropertyWizard';
		}
		$result = $this->M_Crm->_searchEmail($email);
		$strresponse = '<h3>Possible Email Matches</h3>';
		if ($result)
		{
			$strresponse = '<div class="alert" style="width:100%;">Please check for a duplicate record.</div>';
			foreach($result as $r)
			{
				$strresponse = $strresponse . '<br/><table  style="width:100%;"><tr><td style="width:80%;"><a href="' . $this->SITE_URL . 'crm/' . $gotofunction . '/' . $r['cntId'] . '"  title="Click to Select">' . $r['cntFirstName'] . ' ' . $r['cntLastName'] . '</a><br/>';
				$strresponse = $strresponse . $r['cntPrimaryAddress1'] . ' ' . $r['cntPrimaryAddress2'] . '<br/>';
				$strresponse = $strresponse . $r['cntPrimaryCity'] . ' ' . $r['cntPrimaryState'] . ', ' . $r['cntPrimaryZip'] . ' <br/>';
				$strresponse = $strresponse . $r['cntPrimaryEmail'];
				$strresponse = $strresponse . '</td><td  style="width:20%;"><a href="' . $this->SITE_URL . 'crm/' . $gotofunction . '/' . $r['cntId'] . '"  title="Click to Select"><img src="' . $this->SITE_URL . 'assets/images/usearrow2.gif" width="35" title="Click to use this contact" alt="Use this contact" border="0"></a> <br/>';
				$strresponse = $strresponse . '</td></tr></table><br/>';
			}
		}
		echo $strresponse;
	}
	public function unlinkcompany($id)

	{
		$this->M_Crm->_unlinkcompany($id);
		redirect($this->WEBCONFIG['webStartPage'] . 'crm/additionalInformation/' . $id, 'refresh');
	}
	/*
	*  FUNCTIONALITY TO SET UP REMINDER EMAILS
	*/
	// CREATE A NEW CLIENT REMINDER
	public function crmSetClientReminder()

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Contact Notes</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$edit = null;
		// Get company services
		$companyServices = $this->M_Crm->_getCompanyServices();
		$this->smarty->assign('companyServices', $companyServices);
		$reminders = $this->M_Crm->_getCrmDataForEdit();
		$this->smarty->assign('reminderData', $reminders);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/crmSetClientReminder.tpl');
		$this->smarty->view();
	}
	// SAVE NEW CLIENT REMINDER
	public function crmSaveClientReminder()

	{
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cnotReminderSender', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('crmTimeToSend', 'Reminder Days Offset', 'required|xss_clean');
		$this->form_validation->set_rules('cnotReminder', 'Reminder Message', 'required|xss_clean');
		$this->form_validation->set_rules('cmpServiceProvided', 'Service Provided', 'required|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetClientReminder/', 'refresh');
		}
		else
		{
			$timestamp = $this->input->post('crmTimeToSend');
			$fromEmail = $this->input->post('cnotReminderSender');
			$message = $this->input->post('cnotReminder');
			$service = $this->input->post('cmpServiceProvided');
			$checkForExistingReminder = $this->M_Crm->_getCrmPostJobData($service, $timestamp);
			if (count($checkForExistingReminder) == 0)
			{
				$this->M_Crm->_saveCRMReminder($fromEmail, $message, $service, $timestamp);
				$this->session->set_flashdata('msg', "Your Reminder has been set");
				redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetClientReminder/', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('msg', "That Reminder already exists, click below the reminder form on a service to edit its message");
				redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetClientReminder/', 'refresh');
			}
		}
	}
	// EDIT CLIENT REMINDER
	public function crmEditClientReminder($id)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Contact Notes</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$edit = null;
		$reminderToBeEdited = $this->M_Crm->_getClientReminderToBeEdited($id);
		$this->smarty->assign('reminderToBeEdited', $reminderToBeEdited);
		// Get company services
		$companyServices = $this->M_Crm->_getCompanyServices();
		$this->smarty->assign('companyServices', $companyServices);
		$this->smarty->assign('id', $id);
		// Get reminder data to be edited
		$reminders = $this->M_Crm->_getCrmDataForEdit();
		$this->smarty->assign('reminderData', $reminders);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/crmEditClientReminder.tpl');
		$this->smarty->view();
	}
	// SAVE EDITED CLIENT REMINDER
	public function crmSaveEditedClientReminder($id)

	{
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cnotReminderSender', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('crmTimeToSend', 'Reminder Days Offset', 'required|xss_clean');
		$this->form_validation->set_rules('cnotReminder', 'Reminder Message', 'required|xss_clean');
		$this->form_validation->set_rules('cmpServiceProvided', 'Service Provided', 'required|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetClientReminder/', 'refresh');
		}
		else
		{
			$timestamp = $this->input->post('crmTimeToSend');
			$fromEmail = $this->input->post('cnotReminderSender');
			$message = $this->input->post('cnotReminder');
			$service = $this->input->post('cmpServiceProvided');
			$this->M_Crm->_saveEditedCRMReminder($id, $fromEmail, $message, $service, $timestamp);
			$this->session->set_flashdata('msg', "Your Reminder has been updated");
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmEditClientReminder/' . $id, 'refresh');
		}
	}
	// SEND CLIENT REMINDER
	public function crmSendClientReminder()

	{
		/*if(!$this->input->is_cli_request())
		{
		echo "This script can only be accessed via the command line" . PHP_EOL;
		return;
		} */
		$appointments = $this->M_Crm->_sendCrmReminder();
		if (!empty($appointments))
		{
			$this->load->library('email');
			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.sendgrid.net',
				'smtp_user' => 'AllPaving',
				'smtp_pass' => 'allpaving2012',
				'smtp_port' => 587,
				'crlf' => "\r\n",
				'newline' => "\r\n"
			);
			$this->email->initialize($config);
			foreach($appointments as $appointment)
			{
				$this->email->to('Daren@allpaving.com');
				$this->email->from($appointment->jobPrimaryEmail);
				$this->email->subject($appointment->cmpServiceName);
				$data = array(
					'message_body' => $appointment->message
				);
				$body = $this->load->view('emails/emailTemplate.php', $data, TRUE);
				$this->email->message($body);
				$this->email->send();
			}
		}
	}
	/*
	*   FUNCTIONALITY TO SET UP JOB REMINDERS
	*/
	// GET DATA FOR PRE JOB REMINDER
	public function crmSetJobReminder()

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Contact Notes</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$edit = null;
		// Get company services
		$companyServices = $this->M_Crm->_getCompanyServices();
		$this->smarty->assign('companyServices', $companyServices);
		// Get reminder data to edit
		$reminders = $this->M_Crm->_getCrmJobDataForEdit();
		$this->smarty->assign('reminderData', $reminders);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/crmSetJobReminder.tpl');
		$this->smarty->view();
	}
	// SAVE PRE JOB REMINDER
	public function crmSaveJobReminder()

	{
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cnotReminderSender', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('crmTimeToSend', 'Reminder Days Offset', 'required|xss_clean');
		$this->form_validation->set_rules('cnotReminder', 'Reminder Message', 'required|xss_clean');
		$this->form_validation->set_rules('cmpServiceProvided', 'Service Provided', 'required|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetJobReminder/', 'refresh');
		}
		else
		{
			$timestamp = $this->input->post('crmTimeToSend');
			$fromEmail = $this->input->post('cnotReminderSender');
			$message = $this->input->post('cnotReminder');
			$service = $this->input->post('cmpServiceProvided');
			// Check to see if the reminder already exists
			$checkForExistingReminder = $this->M_Crm->_getCrmPreJobData($service, $timestamp);
			if (count($checkForExistingReminder) == 0)
			{
				// If Reminder doesn't exist, save the reminder
				$this->M_Crm->_saveCRMJobReminder($fromEmail, $message, $service, $timestamp);
				$this->session->set_flashdata('msg', "Your Reminder has been set");
				redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetJobReminder/', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('msg', "That reminder already exists, click below the reminder form on a service to edit its message");
				redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetJobReminder/', 'refresh');
			}
		}
	}
	// EDIT JOB REMINDER
	public function crmEditJobReminder($id)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //5 general employee not allowed
		$this->checkRoleAccess($allowed_roles);
		// breadcrumb
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li>
        <li class="active">CRM</li><li class="active">Contact Notes</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$edit = null;
		$reminderToBeEdited = $this->M_Crm->_getJobReminderToBeEdited($id);
		$this->smarty->assign('reminderToBeEdited', $reminderToBeEdited);
		$companyServices = $this->M_Crm->_getCompanyServices();
		// Get company services
		$this->smarty->assign('companyServices', $companyServices);
		$this->smarty->assign('id', $id);
		// Get Job Reminder and pass to edit page
		$reminders = $this->M_Crm->_getCrmJobDataForEdit();
		$this->smarty->assign('reminderData', $reminders);
		$this->smarty->assignPageTitle('3D Paving Application');
		// insert into resource template
		$this->smarty->assign('CONTENT', 'crm/crmEditJobReminder.tpl');
		$this->smarty->view();
	}
	// SAVE EDITED PRE JOB REMINDER
	public function crmSaveEditedJobReminder($id)

	{
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cnotReminderSender', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('crmTimeToSend', 'Reminder Days Offset', 'required|xss_clean');
		$this->form_validation->set_rules('cnotReminder', 'Reminder Message', 'required|xss_clean');
		$this->form_validation->set_rules('cmpServiceProvided', 'Service Provided', 'required|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmSetClientReminder/', 'refresh');
		}
		else
		{
			$timestamp = $this->input->post('crmTimeToSend');
			$fromEmail = $this->input->post('cnotReminderSender');
			$message = $this->input->post('cnotReminder');
			$service = $this->input->post('cmpServiceProvided');
			$this->M_Crm->_saveEditedCRMJobReminder($id, $fromEmail, $message, $service, $timestamp);
			$this->session->set_flashdata('msg', "Your Reminder has been updated");
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/crmEditJobReminder/' . $id, 'refresh');
		}
	}
	public function crmSendJobReminder()

	{
		/*if(!$this->input->is_cli_request())
		{
		echo "This script can only be accessed via the command line" . PHP_EOL;
		return;
		} */
		$appointments = $this->M_Crm->_getCrmJobStartReminders();
		if (!empty($appointments))
		{
			$this->load->library('email');
			$this->load->helper('url');
			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.sendgrid.net',
				'smtp_user' => 'AllPaving',
				'smtp_pass' => 'allpaving2012',
				'smtp_port' => 587,
				'crlf' => "\r\n",
				'newline' => "\r\n"
			);
			$this->email->initialize($config);
			foreach($appointments as $appointment)
			{
				$this->email->set_newline("\r\n");
				$this->email->to('jbrowngraphicdesign@gmail.com');
				$this->email->from($appointment->jobPrimaryEmail);
				$this->email->subject("Upcoming Project");
				$this->email->message($appointment->message);
				$this->email->send();
			}
		}
	}
}
