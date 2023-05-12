<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Workorders extends EX_Locked

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
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
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
        <li class="active">Work Orders</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// load models
		$this->load->model('M_Crm');
		$this->load->model('M_Workorders');
		$this->smarty->assignContentTemplate('projects/wo_main');
	}
	public function index($filter = null)

	{
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->view();
	}
	public function create2($id) //create from existing client

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$data = $this->M_Crm->_getCRMUser($id);
		/*
		check this user cannot be a property,and this user must have at least one property ??
		*/
		$allowed = array(
			1,
			7,
			10,
			12,
			13,
			14,
			16,
			17
		);
		if (!in_array($data['cntcid'], $allowed))
		{
			$this->session->set_flashdata('msg', 'There was a problem, you cannot create a proposal for this type of contact. ');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/create/', 'refresh');
		}
		// do I have properties
		$properties = $this->M_Crm->_getProperties($id);
		if (!count($properties))
		{
			$this->session->set_flashdata('msg', 'There was a problem, you cannot create a proposal for this type of contact without a property. ');
			redirect($this->WEBCONFIG['webStartPage'] . 'crm/PropertyWizard/' . $id, 'refresh');
		}
		// do I have managers
		$managers = $this->M_Crm->_getManagers($id);
		// do I have related contacts
		$related = $this->M_Crm->_getRelated($id);
		$this->smarty->assignContentTemplate('projects/po_main');
		$this->smarty->assign('related', $related);
		$this->smarty->assign('properties', $properties);
		$this->smarty->assign('managers', $managers);
		$this->smarty->assign('data', $data);
		$this->smarty->assign('id', $id);
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'projects/poName.tpl');
		$this->smarty->view();
	}
	public function startProposal($parentid, $propertyid) //create from existing client

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		if ($this->USER_ROLE == 1 || $this->USER_ROLE == 6 || $this->USER_ROLE == 2)
		{
		}
		else
		{
			// can I use this client
			/*
			* Do i have a connection to this client
			* If User_role = 2 or 3
			*/
			// Did i create this property or any other proposal for this propoerty
			$result = $this->M_Workorders->_getLinkstoCustomer($parentid, $propertyid, $this->USER_ID);
			if (!$result)
			{
				$this->session->set_flashdata('msg', 'You must see an administrator to start a new proposal on this property.');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
			/* Now I am ok to start this
			*/
		}
		$data = $this->M_Crm->_getCRMUser($parentid);
		$property = $this->M_Crm->_getCRMUser($propertyid);
		$this->smarty->assignContentTemplate('projects/po_main');
		$this->smarty->assign('property', $property);
		$this->smarty->assign('data', $data);
		$this->smarty->assign('parentid', $parentid);
		$this->smarty->assign('propertyid', $propertyid);
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'projects/poName2.tpl');
		$this->smarty->view();
	}
	public function create()

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->smarty->assignContentTemplate('projects/po_main');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'projects/poNew.tpl');
		$this->smarty->view();
	}
	public function createProposalNewClient()

	{
		echo 'we aRE HERE';
		exit();
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		if ($_POST['jobName'] == '' || $_POST['cntFirstName'] == '')
		{
			foreach($_POST as $key => $value)
			{
				echo $key . ": " . $value . "<br />";
			}
			exit();
		}
		$this->session->set_flashdata('msg', 'Sorry Your data was NOT saved');
		if ($result = $this->M_Crm->_saveContact())
		{
			$pid = $this->M_Workorders->_createProposal($result);
			$this->M_Workorders->_updatePricing($pid);
			$this->session->set_flashdata('msg', 'New proposal created');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/addPOservices/' . $pid, 'refresh');
		}
		else
		{
			$this->session->set_flashdata('msg', 'There was a problem');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/create/', 'refresh');
		}
	}
	public function StartProposal2($parentid, $propertyid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$cid = $this->validate->post('cid', 'INTEGER');
		$pid = $this->validate->post('pid', 'INTEGER');
		$result = $this->M_Workorders->_createProposal4($parentid, $propertyid);
		
		$rows = $this->M_Workorders->_updatePricing($result);
		$this->session->set_flashdata('msg', 'New proposal created');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/client/' . $result, 'refresh');
	}
	public function createProposalWithClient($id)

	{
		echo 'we aRE HERE';
		exit();
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$cid = $this->validate->post('cid', 'INTEGER');
		if ($id != $cid)
		{
			exit('Bad Code');
		}
		$result = $this->M_Workorders->_createProposal3($cid);
		$rows = $this->M_Workorders->_updatePricing($result);
		$this->session->set_flashdata('msg', 'New proposal created');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/addPOservices/' . $result, 'refresh');
	}

	public function duplicateProposalWithoutClient($id)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		
		$result = $this->M_Workorders->_duplicateProposal($id);
		//$rows = $this->M_Workorders->_updatePricing($result);
		$this->session->set_flashdata('msg', 'New proposal created');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/addPOservices/' . $result, 'refresh');
	}
	public function client($pid)

	{
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Proposal Client</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		
		//get all contacts
		$data = $this->M_Crm->_getAllContacts();
		$this->smarty->assign('contactlist', $data);
		// get current detail data
		$proposal = $this->M_Workorders->_getProposal($pid);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assign('cntId', $proposal['clientid']);
		// 2-Sales Manager 3-Sales Person
		$salesPeople = $this->M_Crm->_getEmployeeByRole(9,1);
		$salesManagers = $this->M_Crm->_getEmployeeByRole(10,1);
		$this->smarty->assign('salesPeople', $salesPeople);
		$this->smarty->assign('salesManagers', $salesManagers);
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$lastContact = $this->M_Workorders->_getLastContact($proposal['jobcntID']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('projects/po_main2');
		$this->smarty->assign('CONTENT', 'projects/poClient.tpl');
		$this->smarty->view();
	}
	public function addPOManager($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Proposal Managers Updated');
		$result = $this->M_Workorders->_updatePOManagers($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/client/' . $pid, 'refresh');
	}
	public function updatePOAddress($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Proposal Address Updated');
		$result = $this->M_Workorders->_updatePOAddress($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/client/' . $pid, 'refresh');
	}
	public function updatePOClient($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Proposal Client Updated');
		$result = $this->M_Workorders->_updatePOClient($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/client/' . $pid, 'refresh');
	}
	public function updatePOLocation($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Proposal Location Updated');
		$result = $this->M_Workorders->_updatePOLocation($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/client/' . $pid, 'refresh');
	}
	public function updateWOAddress($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //admin office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Work Order Primary Address Updated');
		$result = $this->M_Workorders->_updateWOAddress($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOclient/' . $pid, 'refresh');
	}
	public function updateWOSAddress($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //admin office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Work Order Primary Address Updated');
		$result = $this->M_Workorders->_updateWOSAddress($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOclient/' . $pid, 'refresh');
	}
	public function Notes($pid, $edit = null)

	{
		$this->smarty->assign('note_id', $edit);
		$this->smarty->assignContentTemplate('projects/po_main');
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Proposal Notes</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$proposal = $this->M_Workorders->_getProposal($pid);
		$services = $this->M_Workorders->_getPOServices($pid);
		$this->smarty->assign('services', $services);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$pdate = date_create($proposal['jobProjectDate']);

		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$notes = $this->M_Workorders->_getProjectNotes($pid, null);
		$this->smarty->assign('notes', $notes);
		if ($edit)
		{
			$edit = $this->M_Workorders->_getProjectNotes($pid, $edit);
		}
		$this->smarty->assign('edit', $edit);
		$this->smarty->assign('pdate', $proposal['jobProjectDate']);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('projects/po_main2');
		$this->smarty->assign('CONTENT', 'projects/poNotes.tpl');
		$this->smarty->view();
	}
	public function savePONote($pid, $note_id = null)

	{
		$this->session->set_flashdata('msg', 'Proposal Note Updated');
		if (!$note_id)
		{
			$this->session->set_flashdata('msg', 'Proposal Note Saved');
		}
		$result = $this->M_Workorders->_savePONote($pid, $note_id);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/Notes/' . $pid, 'refresh');
	}

	public function savePDate($pid, $note_id = null)

	{
		$this->session->set_flashdata('msg', 'Proposal Date Updated');
		if (!$note_id)
		{
			$this->session->set_flashdata('msg', 'Proposal Date Saved');
		}
		$result = $this->M_Workorders->_savePODate($pid, $note_id);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/Notes/' . $pid, 'refresh');
	}
	public function convertPO($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Proposal was converted to an active Job');
		$result = $this->M_Workorders->_convertPO($pid);
		// get current proposal
		$proposal = $this->M_Workorders->_getWO($pid);
		$woID = $proposal['jobMasterYear'] . $proposal['jobMasterMonth'] . str_pad($proposal['jobMasterNumber'], 5, "0", STR_PAD_LEFT);
		$FromName = $this->USER_FULLNAME;
		$FromEmail = $this->USER_EMAIL;
		$SendTo = $this->WEBCONFIG['webBillingEmail'];
		$subject = "Send a Deposit Invoice";
		// The message
		$message = "Send a Deposit invoice\r\n";
		$message.= "Work order:" . $woID . "\r\n";
		$message.= "Proposal:" . $proposal['jobName'] . "\r\n";
		$message.= "Client:" . $proposal['clientfirst'] . " " . $proposal['clientlast'] . "\r\n";
		$message.= "Billing Address" . $proposal['jobBillingAddress1'] . "\r\n";
		$message.= $proposal['jobBillingAddress2'] . "\r\n";
		$message.= $proposal['jobBillingState'] . "\r\n";
		$message.= $proposal['jobBillingCity'] . "\r\n";
		$message.= $proposal['jobBillingZip'] . "\r\n";
		$message.= "Site Address" . $proposal['jobAddress1'] . "\r\n";
		$message.= $proposal['jobAddress2'] . "\r\n";
		$message.= $proposal['jobState'] . "\r\n";
		$message.= $proposal['jobCity'] . "\r\n";
		$message.= $proposal['jobZip'] . "\r\n";
		$message.= "Managers:\r\n";
		$message.= "Sales Manager:" . $proposal['managerfirst'] . " " . $proposal['managerlast'] . "\r\n";
		$message.= "Sales Person:" . $proposal['salesfirst'] . " " . $proposal['saleslast'] . "\r\n";
		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$message = wordwrap($message, 70, "\r\n");
		$this->load->library('email');
		$this->email->from($FromEmail, $FromName);
		$this->email->to($SendTo);
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		// Send
		// mail($this->WEBCONFIG['webBillingEmail'], 'Send a Deposit invoice', $message);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/showWOList/', 'refresh');
	}
	public function rejectPO($pid, $switch = null)

	{
		$allowed_roles = array(
			1,
			6
		); //admin only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		if ($switch)
		{
			$this->session->set_flashdata('msg', 'Proposal Un Rejected');
			$result = $this->M_Workorders->_rejectPO($pid, $switch);
		}
		else
		{
			$this->session->set_flashdata('msg', 'Proposal Rejected');
			$result = $this->M_Workorders->_rejectPO($pid);
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/Status/' . $pid, 'refresh');
	}
	public function approvePO($pid, $switch = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin sales manager and office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		if ($switch)
		{
			$this->session->set_flashdata('msg', 'Proposal Un Approved');
			$result = $this->M_Workorders->_approvePO($pid, $switch);
		}
		else
		{
			$this->session->set_flashdata('msg', 'Proposal Approved');
			$result = $this->M_Workorders->_approvePO($pid);
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/Status/' . $pid, 'refresh');
	}
	public function updateDiscount($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			6
		); //admin sales manager and office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Discount Updated');
		$result = $this->M_Workorders->_updateDiscount($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/addPOservices/' . $pid, 'refresh');
	}
	public function Status($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Proposal Status</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$proposal = $this->M_Workorders->_getProposal($pid);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid); //project notes
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('cntId', $proposal['clientid']); //client notes
		$this->smarty->assign('notelist', $notelist);
		$wolist = $this->M_Workorders->_getWOlist(); //open work orders
		$this->smarty->assign('wolist', $wolist);
		// 2-Sales Manager 3-Sales Person
		$salesPeople = $this->M_Crm->_getEmployeeByRole(3);
		$salesManagers = $this->M_Crm->_getEmployeeByRole(2);
		$this->smarty->assign('salesPeople', $salesPeople);
		$this->smarty->assign('salesManagers', $salesManagers);
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('projects/po_main2');
		$this->smarty->assign('CONTENT', 'projects/poStatus.tpl');
		$this->smarty->view();
	}
	public function previewPO($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Proposal Preview</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getProposal($pid);
		//print_r($proposal);exit;
		//required presented date
		if($proposal['jobProjectDate']=='' || $proposal['jobProjectDate']=='0000-00-00'){
			$this->session->set_flashdata('msg', 'Proposal Presented Date is required');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/Notes/' . $pid, 'refresh');
		}

		$proposalDetails = $this->M_Workorders->_getAllPODetails($pid);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('proposalDetails', $proposalDetails);
		$TandC = $this->smarty->fetch('common/TandC.tpl');
		$this->smarty->assign('TandC', $TandC);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$serviceCats = $this->M_Workorders->_getServiceCategories();
		$this->smarty->assign('serviceCats', $serviceCats);
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('projects/po_main3');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'projects/poPreview.tpl');
		$this->smarty->view();
	}
	public function Media($pid, $useImages = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Proposal Media</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getProposal($pid, 1);
		$services = $this->M_Workorders->_getPOServices($pid);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$mediatypes = $this->M_Workorders->_fetch_mediaTypes();
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$lastContact = $this->M_Workorders->_getLastContact($proposal['jobcntID']); //get last note for this client may oer may not be about this proposal
		$medialist = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('medialist', $medialist);
		$this->smarty->assign('mediatypes', $mediatypes);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('services', $services);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('projects/po_mainfull');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'projects/poMedia.tpl');
		if ($useImages)
		{
			$this->smarty->assign('CONTENT', 'projects/poMediaSelect.tpl');
		}
		$this->smarty->view();
	}
	public function DeleteMedia($pid, $note_id, $filename)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$result = $this->M_Workorders->_deleteMedia($pid, $note_id);
		if ($result)
		{
			// delete file
			$file_path = './media/projects/' . $filename;
			unlink($file_path);
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/Media/' . $pid, 'refresh');
	}
	public function DeleteWOMedia($pid, $note_id, $filename)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$result = $this->M_Workorders->_deleteMedia($pid, $note_id);
		if ($result)
		{
			// delete file
			$file_path = './media/projects/' . $filename;
			unlink($file_path);
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOMedia/' . $pid, 'refresh');
	}
	public function newPOservices($pid, $sid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$stype = $this->input->post('stype');
		$jordVendorID = 0;
		if ($stype == 17)
		{
			$jordVendorID = $this->input->post('jordVendorID');
		}
		foreach($_POST as $key => $value)
		{
			//        echo $key . ": " . $value . "<br />";
		}
		$result = $this->M_Workorders->_createProposalDetail($pid, $stype, $jordVendorID);
		$this->M_Workorders->_updatePricing($pid);
		if ($stype == 18) //striping
		{
		    
		    $this->session->set_flashdata('msg', 'New proposal service created');
            $vendorid = 'All_Striping';
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/changeStripingVendor/' . $pid .'/' . $result .'/'. $vendorid, 'refresh');
			exit();


			//$this->session->set_flashdata('msg', 'New proposal service created');
			//redirect($this->WEBCONFIG['webStartPage'] . 'workorders/selectVendor/' . $pid . '/' . $result, 'refresh');
			//exit();
		}
		if (intval($result) == $result)
		{
			$this->session->set_flashdata('msg', 'New proposal service created');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $result, 'refresh');
		}
		else
		{
			$this->session->set_flashdata('msg', 'New proposal service was NOT created');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/addPOservices/' . $pid, 'refresh');
		}
	}
	public function changeStripingVendor($pid, $sid, $vendorid)

	{
		// change vendor and go to edit page
		$result = $this->M_Workorders->_updateStripingVendor($sid, $vendorid);
		echo "please wait processing.....";
		//echo 'workorders/editPOStriping/' . $pid . '/' . $sid;
		//print_r($result);
		//exit();
		$this->session->set_flashdata('msg', 'Striping Vendor Selected');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOStriping/' . $pid . '/' . $sid, 'refresh');
	}

	public function selectVendor($pid, $sid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Select Striping Vendor</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getProposal($pid);
		$this->smarty->assign('proposal', $proposal);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('projects/po_main2');
		$this->smarty->assign('CONTENT', 'projects/poChangeStripingVendor.tpl');
		$this->smarty->view();
	}
	public function savePOservices($pid, $sid)

	{
		foreach($_POST as $key => $value)
		{
			//    echo $key . ": " . $value . "<br />";
		}
		$this->M_Workorders->_markPOUpdated($pid); //mark as updated by me now
		$result = $this->M_Workorders->_savePOservices($sid); //sid is this service line item
		$this->session->set_flashdata('msg', 'Service Was Saved');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid, 'refresh');
	}
	public function savePOStriping($pid, $sid)

	{
		// delete current
		$this->M_Workorders->_deletePOStripng($sid);
		$this->M_Workorders->_markPOUpdated($pid); //mark as updated by me now
		$result = $this->M_Workorders->_savePOservices($sid); //sid is this service line item
		foreach($_POST as $key => $value)
		{
			if (substr($key, 0, 5) == "Quant" && is_numeric($value))
			{
				//          echo $key . ": " . $value . "<br />";
				$mary = explode("__", $key);
				$scatid = $mary[1];
				//            echo $scatid. "<br />";
				$total = $this->input->post('Total__' . $scatid);
				$service = $this->input->post('SERVICE__' . $scatid);
				$cost = $this->input->post('Cost__' . $scatid);
				$quantity = $this->input->post('Quantity__' . $scatid);
				$service_desc = $this->input->post('SERVICE_DESC__' . $scatid);
				$result = $this->M_Workorders->_savePOStripng($sid, $scatid, $service, $service_desc, $quantity, $cost);
			}
		}
		$this->session->set_flashdata('msg', 'Service Was Saved');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOStriping/' . $pid . '/' . $sid, 'refresh');
	}
	public function addPOservices($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Proposal Services</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getProposal($pid);
		$proposalDetails = $this->M_Workorders->_getAllPODetails($pid);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('proposalDetails', $proposalDetails);
		$TandC = $this->smarty->fetch('common/TandC.tpl');
		$this->smarty->assign('TandC', $TandC);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		// all sub list
		$subcontractors = $this->M_Crm->_getCRMByCat(11);
		$this->smarty->assign('subcontractors', $subcontractors);
		$serviceCats = $this->M_Workorders->_getServiceCategories();
		$this->smarty->assign('serviceCats', $serviceCats);
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('projects/po_main2');
		$this->smarty->assign('CONTENT', 'projects/poServices.tpl');
		$this->smarty->view();
	}
	public function changeServiceOrder($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //@todo admin only
		$this->checkRoleAccess($allowed_roles);
		foreach($_POST as $key => $value)
		{
			// echo $key . ": " . $value . "<br />";
			if (strpos($key, '_') === false)
			{
			}
			else
			{
				$sid = explode("_", $key);
				$myid = $sid[1];
				//        echo $myid;
				$this->M_Workorders->_changeSortOrder($myid, $value);
			}
		}
		$this->session->set_flashdata('msg', 'Services have been sorted');
		$this->M_Workorders->_updatePricing($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/addPOservices/' . $pid, 'refresh');
	}
	public function alertPO($pid, $flag)

	{
		// flag is set to trun on or off alert
		$this->M_Workorders->_setAlert($pid, $flag);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/Status/' . $pid, 'refresh');
	}
	public function updatePricing($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3
		); //@todo admin only
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Material pricing for this proposal was updated to current values');
		$this->M_Workorders->_updatePricing($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/client/' . $pid, 'refresh');
	}
	public function deletePOvehicle($pid, $sid, $id)

	{
		// save vehicle
		$this->M_Workorders->_deletePOVehicle($id); //sid is this service line item to add vehicle
		$this->session->set_flashdata('msg', 'Vehicle removed from proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#vehicle', 'refresh');
	}
	public function addPOvehicle($pid, $sid)

	{
		// save vehicle
		$this->M_Workorders->_addPOVehicle($sid); //sid is this service line item to add vehicle
		$this->session->set_flashdata('msg', 'Vehicle added to proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#vehicle', 'refresh');
	}
	public function deleteWOMaterial($pid, $sid, $id, $jm = null)

	{
		$this->M_Workorders->_deleteWOMaterial($id); //id is the item to delete
		$this->session->set_flashdata('msg', 'Materials costs removed ');
		if ($jm)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1/#materials', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid . '/#materials', 'refresh');
	}
	public function addWOMaterial($pid, $sid, $jm = null)

	{
		$final = null;
		if ($jm == 2)
		{
			$final = 1;
		}
		$results = $this->M_Workorders->_addWOMaterial($sid, $final); //sid is this service line item to add
		$this->session->set_flashdata('msg', 'Materials costs added ');
		if ($jm == 1)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1/#materials', 'refresh');
		}
		if ($jm == 2)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEST/' . $pid . '/' . $sid . '/#materials', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid . '/#materials', 'refresh');
	}
	public function deleteWOOther($pid, $sid, $id, $jm = null)

	{
		$this->M_Workorders->_deleteWOOther($id); //id is the item to delete
		$this->session->set_flashdata('msg', 'Other costs removed ');
		if ($jm)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1/#other', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid . '/#other', 'refresh');
	}
	public function addWOOther($pid, $sid, $jm = null)

	{
		$final = null;
		if ($jm == 2)
		{
			$final = 1;
		}
		// save labor
		$results = $this->M_Workorders->_addWOOther($sid, $final); //sid is this service line item to add
		$this->session->set_flashdata('msg', 'Additional costs added ');
		if ($jm == 1)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1/#other', 'refresh');
		}
		if ($jm == 2)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEST/' . $pid . '/' . $sid . '/#other', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid . '/#other', 'refresh');
	}
	public function deletePOOther($pid, $sid, $id)

	{
		$this->M_Workorders->_deletePOOther($id); //id is the item to delete
		$this->session->set_flashdata('msg', 'Additional costs removed from proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#other', 'refresh');
	}
	public function deletePOSOther($pid, $sid, $id)

	{
		$this->M_Workorders->_deletePOOther($id); //id is the item to delete
		$this->session->set_flashdata('msg', 'Additional costs removed from proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOStriping/' . $pid . '/' . $sid . '/#other', 'refresh');
	}
	public function addPOOther($pid, $sid)

	{
		// save labor
		$results = $this->M_Workorders->_addPOOther($sid); //sid is this service line item to add
		$this->session->set_flashdata('msg', 'Additional costs added to proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#other', 'refresh');
	}
	public function addPOSOther($pid, $sid)

	{
		// save labor
		$results = $this->M_Workorders->_addPOOther($sid); //sid is this service line item to add
		$this->session->set_flashdata('msg', 'Additional costs added to proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOStriping/' . $pid . '/' . $sid, 'refresh');
	}
	public function deletePOlabor($pid, $sid, $id)

	{
		$this->M_Workorders->_deletePOLabor($id); //sid is this service line item to add vehicle
		$this->session->set_flashdata('msg', 'Labor removed from proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#labor', 'refresh');
	}
	public function addPOlabor($pid, $sid)

	{
		// save labor
		$results = $this->M_Workorders->_addPOLabor($sid); //sid is this service line item to add
		$this->session->set_flashdata('msg', 'Labor added to proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#labor', 'refresh');
	}
	public function deletePOSub($pid, $sid, $id)

	{
		$this->M_Workorders->_removePOSub($id);
		$this->session->set_flashdata('msg', 'Sub Contractor removed from proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#subs', 'refresh');
	}
	public function deletePOequipment($pid, $sid, $id)

	{
		$this->M_Workorders->_deletePOEquipment($id); //sid is this service line item
		$this->session->set_flashdata('msg', 'Equipment removed from proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#equipment', 'refresh');
	}
	public function addPOequipment($pid, $sid)

	{
		$results = $this->M_Workorders->_addPOEquipment($sid); //sid is this service line item to add
		$this->session->set_flashdata('msg', 'Equipment added to proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#equipment', 'refresh');
	}
	public function removePOservices($pid, $sid)

	{
		$results = $this->M_Workorders->_removePOService($sid); //sid is this service line item
		$this->session->set_flashdata('msg', 'Service removed from proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/addPOservices/' . $pid, 'refresh');
	}
	public function addPOSub($pid, $sid)

	{
		// save sub
		$results = $this->M_Workorders->_addPOSub($sid); //sid is this service line item to add
		$this->session->set_flashdata('msg', 'Sub Contractor added to proposal');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/editPOservices/' . $pid . '/' . $sid . '/#subs', 'refresh');
	}
	public function removePOStriping($pid, $sid)

	{
		// remove sid
		$results = $this->M_Workorders->_removePOStriping($sid); //sid is this service line item
		$this->session->set_flashdata('msg', 'Striping Service Removed');
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/addPOservices/' . $pid, 'refresh');
	}
	public function editPOStriping($pid, $sid) //proposal id and service id

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Proposal Edit Services</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		// other
		$other = $this->M_Workorders->_getServiceOther($sid);
		
		$this->smarty->assign('other', $other);
		$othercost=0;
		foreach ($other as $o){
			$othercost += $o['jobcostAmount'];
		}
		
		$this->smarty->assign('othercost', $othercost);
		// widgets
		$otherlist = $this->M_Workorders->_getPOOtherlist($pid);
		$this->smarty->assign('otherlist', $otherlist);
		/*foreach ($details as $d)
		{
		$mydetails = $d;
		}
		*/
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// get current pricing
		$pricing = $this->M_Workorders->_getMultiPricingW($pid, $sid);
		$stripingservice = $this->M_Workorders->_getstripingservice();
		$this->smarty->assign('pricing', $pricing);
		$this->smarty->assign('stripingservice', $stripingservice);
		// get current proposal data
		$proposal = $this->M_Workorders->_getProposal($pid);
		$this->smarty->assign('proposal', $proposal);
		// get materials pricing data
		$materials = $this->M_Workorders->_getPOMaterials($pid);
		$mat = array();
		foreach($materials as $m)
		{
			$mat[$m['omatName']] = $m['omatCost'];
		}
		$this->smarty->assign('materials', $materials);
		$this->smarty->assign('mat', $mat);
		// sidebars
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		$this->smarty->assignContentTemplate('projects/po_main2');
		$this->smarty->assign('CONTENT', 'projects/poAddStriping.tpl');
		$this->smarty->view();
	}
	public function editPOservices($pid, $sid) //proposal id and service id

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Proposal Edit Services</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		/*foreach ($details as $d)
		{
		$mydetails = $d;
		}
		*/
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// get materials pricing data
		$materials = $this->M_Workorders->_getPOMaterials($pid);
		$mat = array();
		foreach($materials as $m)
		{
			$mat[$m['omatName']] = $m['omatCost'];
		}
		$this->smarty->assign('materials', $materials);
		$this->smarty->assign('mat', $mat);
		// data
		// vehicles
		$vehicles = $this->M_Workorders->_getServiceVehicles($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment
		$equipment = $this->M_Workorders->_getServiceEquipment($sid);
		$this->smarty->assign('equipment', $equipment);
		// labor
		$labor = $this->M_Workorders->_getServiceLabor($sid);
		$this->smarty->assign('labor', $labor);
		// other
		$other = $this->M_Workorders->_getServiceOther($sid);
		$this->smarty->assign('other', $other);
		// widgets
		$otherlist = $this->M_Workorders->_getPOOtherlist($pid);
		$this->smarty->assign('otherlist', $otherlist);
		// get vehicles
		$vehiclelist = $this->M_Workorders->_getPOvehiclelist($pid);
		$this->smarty->assign('vehiclelist', $vehiclelist);
		// get equipment
		$equipmentlist = $this->M_Workorders->_getPOequipmentlist($pid);
		$this->smarty->assign('equipmentlist', $equipmentlist);
		// get labor
		$laborlist = $this->M_Workorders->_getPOlaborlist($pid);
		$this->smarty->assign('laborlist', $laborlist);
		// get subs
		$subs = $this->M_Workorders->_getPOSubs($sid);
		$this->smarty->assign('subs', $subs);
		// all sub list
		$subcontractors = $this->M_Crm->_getCRMByCat(11);
		$this->smarty->assign('subcontractors', $subcontractors);
		// get current proposal data
		$proposal = $this->M_Workorders->_getProposal($pid);
		$this->smarty->assign('proposal', $proposal);
		// sidebars
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		$this->smarty->assignContentTemplate('projects/po_main2');
		$this->smarty->assign('CONTENT', 'projects/poAddServices.tpl');
		$this->smarty->view();
	}
	public function showPOList($cid = null, $showrejected = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// when we show work orders we need to check role
		// for admin and office show all,
		// for all others they should be restricted
		// to seeing only the work orders they have access to via the   jobSalesManagerAssigned, 	jobSalesAssigned fields
		if ($cid == 0)
		{
			$cid = null;
		}
        $proposals = '';//$this->M_Workorders->_ListProposals($cid, $showrejected);
        $this->smarty->assign('cid', $cid);
        $this->smarty->assign('showrejected', $showrejected);
        $this->smarty->assign('proposals', $proposals);
        $this->smarty->assignContentTemplate('projects/po_main3');
		$this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT', 'projects/poSearch.tpl');
        $this->smarty->view();

	}


	public function fullsearch($cid = null, $showrejected = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// when we show work orders we need to check role
		// for admin and office show all,
		// for all others they should be restricted
		// to seeing only the work orders they have access to via the   jobSalesManagerAssigned, 	jobSalesAssigned fields
		if ($cid == 0)
		{
			$cid = null;
		}
		$searchtext=$_POST['searchalltext'];

		$proposals = $this->M_Workorders->_ListProposalsWithSearch($cid, $showrejected,$searchtext);
		$this->smarty->assign('cid', $cid);
		$this->smarty->assign('showrejected', $showrejected);
		$this->smarty->assign('proposals', $proposals);
		$this->smarty->assignContentTemplate('projects/po_mainfull');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'projects/polist.tpl');
		$this->smarty->view();
	}
	/*
	* Work order section
	*/


    /*
    * Work order section
    */
    public function searchPO(){

        $filter = [];
        $showrejected =0;

        foreach($_POST as $key => $value) {

            //echo $key . "=>" . $value . "<br/>";
        }

        if ($_POST['jobName'] != '') {
            $filter[] = "p.jobName LIKE '%" . htmlspecialchars($_POST['jobName']) . "%'";
        }

        if ($_POST['jobCreatedBy'] != 0) {
            $filter[] = "p.jobCreatedBy = " . $_POST['jobCreatedBy'];
        }
        if ($_POST['jobcntID'] !=0) {

            $filter[] = "p.jobcntID = " . $_POST['jobcntID'];
        }


        if ($_POST['startdate'] != '' && $_POST['enddate'] != '' && (strtotime($_POST['enddate']) > strtotime($_POST['startdate'])))
        {
            $startime = date("Y-m-d", strtotime($_POST['startdate']));
            $endtime = date("Y-m-d", strtotime($_POST['enddate']));

            $filter[] = "(p.jobCreatedDateTime between '".  $startime . "' AND '" . $endtime . "')";
        }

        if ($_POST['showrejected'] == 1) {
            $filter[] = "p.jobStatus <= 4";
        } else {
            $filter[] = "p.jobStatus <= 3";
        }

        if ($_POST['pid'] && is_numeric($_POST['pid']))
        {
            $filter =[];
            $filter[] = "p.jobID = " . $_POST['pid'];
        }


        $proposals = $this->M_Workorders->_SearchProposals($filter);


        if (!$proposals) {
            $where = " Filter: ";
            foreach($filter as $f){
                $where .= $f . ' ';
            }

            $this->session->set_flashdata('msg', "No records found that match your search!" );

            redirect($this->WEBCONFIG['webStartPage'] . 'workorders/showPOList', 'refresh');
        }

        $this->smarty->assign('cid', 0);
        $this->smarty->assign('showrejected', $showrejected);
        $this->smarty->assign('proposals', $proposals);
        $this->smarty->assignContentTemplate('projects/po_main3');
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT', 'projects/posearchresults.tpl');
        $this->smarty->view();

    }


    public function showWOList($showcompleted = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$proposals = $this->M_Workorders->_ListWO($showcompleted);
		$this->smarty->assign('showcompleted', $showcompleted);
		$this->smarty->assign('proposals', $proposals);
		$this->smarty->assignContentTemplate('workorders/wo_main');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/wolist.tpl');
		$this->smarty->view();
	}

	public function wolistfullsearch($showcompleted = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and sales
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);

		$searchtext=$_POST['searchalltext'];

		$proposals = $this->M_Workorders->_ListWOfullsearch($showcompleted,$searchtext);
		$this->smarty->assign('showcompleted', $showcompleted);
		$this->smarty->assign('proposals', $proposals);
		$this->smarty->assignContentTemplate('workorders/wo_main');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/wolist.tpl');
		$this->smarty->view();
	}

	public function showServiceList($showcompleted = null)

	{
		$allowed_roles = array(
			1,
			4,
			5,
			6
		); //admin office and job managers
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$services = $this->M_Workorders->_getPOScheduledServices();
		$this->smarty->assign('showcompleted', $showcompleted);
		$this->smarty->assign('services', $services);
		$this->smarty->assignContentTemplate('workorders/wo_mainslim');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woServicelist.tpl');
		$this->smarty->view();
	}
	public function showAdminServiceList()

	{
		$filter = null;
		if ($this->input->post("beenhere") == 1)
		{
			//      echo "<pre>";
			$filter = '';
			$filter = $filter . "p.jordStatus <> 'COMPLETED' AND p.jordStatus <> 'CANCELLED' AND m.jobStatus = 5 "; //job is active
			foreach($_POST as $key => $value)
			{
				// echo '<br/>' .$key .  ' <br/>';
				$values = '';
				if ($key == 'status')
				{
					//   echo '<br/>status:' .$value ;
					if ($value != '0')
					{
						$filter = "m.jobStatus = 5 "; //job is active
						$filter = $filter . " AND p.jordStatus ='" . $value . "' ";
					}
				}
				if ($key == 'jobmanagerid')
				{
					if (is_array($value))
					{
						foreach($value as $v)
						{
							if ($v != '0')
							{
								$values = $values . $v . ',';
							}
						}
						$values = substr($values, 0, -1);
						if ($values != '')
						{
							$filter = $filter . " AND p.jordJobManagerID IN (" . $values . ")";
						}
					}
				}
				if ($key == 'salesmanagerid')
				{
					if (is_array($value))
					{
						foreach($value as $v)
						{
							if ($v != '0')
							{
								$values = $values . $v . ',';
							}
						}
						$values = substr($values, 0, -1);
						if ($values != '')
						{
							$filter = $filter . " AND m.jobSalesAssigned IN (" . $values . ")";
						}
					}
					else
					{
						// echo $value;
					}
				}
				if ($key == 'customerid')
				{
					if ($value != '0')
					{
						$filter = $filter . " AND m.jobcntID =" . $value;
					}
				}
				if ($key == 'servicecategory')
				{
					if (is_array($value))
					{
						foreach($value as $v)
						{
							if ($v != '0')
							{
								$values = $values . $v . ',';
							}
						}
						$values = substr($values, 0, -1);
						if ($values != '')
						{
							$filter = $filter . " AND p.jordServiceID IN (" . $values . ")";
						}
					}
					else
					{
						// echo $value;
					}
				}
				if ($key == 'address')
				{
					if ($value != '')
					{
						if (is_numeric($value)) //not a city
						{
							$filter = $filter . " AND (p.jordAddress1 LIKE '%" . $value . "%' OR p.jordZip = '" . $value . "')";
						}
						else
						// not a zip
						{
							$filter = $filter . " AND (p.jordAddress1 LIKE '%" . $value . "%' OR p.jordCity LIKE '%" . $value . "%')";
						}
					}
				}
			}
			//          echo $filter;
			//          echo "</pre>";
			//        exit();
		}
		$allowed_roles = array(
			1,
			6
		); //admin office
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$data = $this->M_Workorders->_getWOScheduledServicesFiltered($filter);
		// print_r($data);
		// exit();
		$this->smarty->assign('services', $data['rows']);
		$this->smarty->assign('count', $data['count']);
		$statusCB = $this->M_Workorders->jobStatusCB();
		$this->smarty->assign('STATUS_CB', $statusCB);
		$customersCB = $this->M_Workorders->jobCustomersCB();
		$this->smarty->assign('CUSTOMERS_CB', $customersCB);
		$jobManagersCB = $this->M_Workorders->JobManagersCB();
		$this->smarty->assign('JOB_MANAGERS_CB', $jobManagersCB);
		$salesManagersCB = $this->M_Workorders->jobSalesManagersCB();
		$this->smarty->assign('SALES_MANAGERS_CB', $salesManagersCB);
		$serviceNamesCB = $this->M_Workorders->ServiceCategoriesCB();
		$this->smarty->assign('SERVICE_NAMES_CB', $serviceNamesCB);
		$this->smarty->assignContentTemplate('workorders/wo_mainslim');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woServiceAdminlist.tpl');
		$this->smarty->view();
	}
	/**
	 *   This was added by JVC
	 *
	 */
	public function showAdminServiceListExtended()

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		); //admin office and job managers
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignCSS('bootstrap-multiselect, jvc_styles');
		$this->smarty->assignExtJS('https://maps.googleapis.com/maps/api/js?v=3.11&sensor=false&key=AIzaSyA8b9jXO_Ig25YsVZcwSMMLJYC7MpOqnhg');
		//       $this->smarty->assignExtJS('https://maps.googleapis.com/maps/api/js?v=3.11&sensor=false&key=' . $this->config['googlemapapikey'] );
		// $this->smarty->assignExtJS('https://maps.googleapis.com/maps/api/js?sensor=false');
		$this->smarty->assignJS('bootstrap-multiselect, jvc_scripts');
		$orderBy = $this->input->get('o');
		$this->smarty->assign('ORDER_BY', $orderBy);
		$orderType = $this->input->get('t');
		$this->smarty->assign('ORDER_TYPE', $orderType);
		$statusCB = $this->M_Workorders->buildStatusCB(array(
			'-1' => ''
		));
		$this->smarty->assign('STATUS_CB', $statusCB);
		$customersCB = $this->M_Workorders->buildCustomersCB(array(
			'-1' => ''
		));
		$this->smarty->assign('CUSTOMERS_CB', $customersCB);
		$jobManagersCB = $this->M_Workorders->buildJobManagersCB(array(
			'-1' => ''
		));
		$this->smarty->assign('JOB_MANAGERS_CB', $jobManagersCB);
		$salesManagersCB = $this->M_Workorders->buildSalesManagersCB();
		$this->smarty->assign('SALES_MANAGERS_CB', $salesManagersCB);
		$serviceNamesCB = $this->M_Workorders->buildServiceNamesCB();
		$this->smarty->assign('SERVICE_NAMES_CB', $serviceNamesCB);
		$serviceCategoriesCB = $this->M_Workorders->buildServiceCategoriesCB(array(
			'-1' => ''
		));
		$this->smarty->assign('SERVICE_CATEGORIES_CB', $serviceCategoriesCB);
		$result = $this->M_Workorders->getWOScheduledServicesExtended();
		if (!empty($result['rows']['error']))
		{
			die(var_dump($result['rows']['error']));
		}
		$this->smarty->assign('ROWS', $result['rows']);
		$this->smarty->assign('PAGINATOR', $result['paginator']);
		$this->smarty->assign('SORTER', $result['sorter']);
		$this->smarty->assign('FILTER', $result['filter']);
		$this->smarty->assignContentTemplate('workorders/woServiceAdminListExtended');
		$this->smarty->view();
	}
	/**
	 *   END added by JVC
	 *
	 */
	public function WOChangeStatus($sid)

	{
		$this->session->set_flashdata('msg', 'Status Updated');
		$result = $this->M_Workorders->_togglePending($sid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/showAdminServiceList', 'refresh');
	}
	public function saveChecklist($pid, $sid, $jm = null)

	{
		$this->session->set_flashdata('msg', 'Daily Checklist saved');
		$result = $this->M_Workorders->_saveServiceChecklist();
		if ($jm)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/showServiceList/', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistP/' . $pid . '/' . $sid, 'refresh');
	}
	public function WOAdminClose($pid)

	{
		// show admin any open permits
		// if no open permits then go to close page
		$allpermits = $this->M_Workorders->_checkPermits($pid);
		$closedpermits = $this->M_Workorders->_checkPermits($pid, 'Completed');
		if ($allpermits != $closedpermits) // all are closed
		{
			$this->session->set_flashdata('msg', 'You must close all permits before billing.');
			// go chek yopur permits
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOPermits/' . $pid, 'refresh');
		}
		$this->session->set_flashdata('msg', 'Mark this job as billed!');
		// go to close po
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOAdminBill/' . $pid, 'refresh');
	}
	public function woCloseAndBill($pid)

	{
		$results = $this->M_Workorders->_CloseAndBill($pid);
		$this->session->set_flashdata('msg', 'Job was marked as billed!');
		// go to close po
		redirect($this->WEBCONFIG['webStartPage'] . 'dashboard', 'refresh');
	}
	public function WOAdminBill($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and job managers
		// get current proposal data
		$proposal = $this->M_Workorders->_getWO($pid);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfullJM');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woAdminBilling.tpl');
		$this->smarty->view();
	}
	public function woSendToBilling($pid) // estimator can only send this to bill

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and job managers
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Job Closed!\nSent to billing.');
		$result = $this->M_Workorders->_CloseWorkOrder($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'dashboard/', 'refresh');
	}
	public function WOChecklistP($pid, $sid, $jm = null)

	{
		// no more used for JM relies o proposal
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Service Description and Daily Forms</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		if (!isset($proposal['clientid']))
		{
			print_r($proposal);
			echo "You do not have access to this Work Order";
			exit();
		}
		$this->smarty->assign('proposal', $proposal);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		$checklists = $this->M_Workorders->_getServiceChecklist($sid);
		$this->smarty->assign('checklists', $checklists);
		/*
		$Asphalt = $this->M_Workorders->_getChecklist('Asphalt');
		$this->smarty->assign('Asphalt',$Asphalt);
		$Concrete = $this->M_Workorders->_getChecklist('Concrete');
		$this->smarty->assign('Concrete',$Concrete);
		$Seal_Coating = $this->M_Workorders->_getChecklist('Seal Coating');
		$this->smarty->assign('Seal_Coating',$Seal_Coating);
		*/
		// sidebars
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assign('cntId', $proposal['clientid']);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woServicePreCheck.tpl');
		if ($jm)
		{
			$this->smarty->assignContentTemplate('workorders/wo_mainfullJM');
			$this->smarty->assignPageTitle('3D Paving Application');
			$this->smarty->assign('CONTENT', 'workorders/woServicePreCheck_JM.tpl');
		}
		$this->smarty->view();
	}
	public function WOChecklistPJM($pid, $sid)

	{
		// no more used for JM relies o proposal
		$allowed_roles = array(
			1,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Service Description and Daily Forms</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		$checklists = $this->M_Workorders->_getServiceChecklist($sid);
		$this->smarty->assign('checklists', $checklists);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfullJM');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woServicePreCheck_JM.tpl');
		$this->smarty->view();
	}
	public function addWOvehicle($pid, $sid, $jm = null)

	{
		$final = null;
		if ($jm == 2)
		{
			$final = 1;
		}
		$this->session->set_flashdata('msg', 'Vehicle saved');
		$result = $this->M_Workorders->_saveWOVehicle($sid, $final);
		if ($jm == 1)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1', 'refresh');
		}
		if ($jm == 2)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEST/' . $pid . '/' . $sid . '/#vehicle', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid . '/#vehicle', 'refresh');
	}
	public function deleteWOvehicle($pid, $sid, $vid, $jm = null)

	{
		$this->session->set_flashdata('msg', 'Vehicle removed');
		$result = $this->M_Workorders->_deleteWOVehicle($vid);
		if ($jm)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid, 'refresh');
	}
	public function addWOequipment($pid, $sid, $jm = null)

	{
		$final = null;
		if ($jm == 2)
		{
			$final = 1;
		}
		$this->session->set_flashdata('msg', 'Equipment saved');
		$result = $this->M_Workorders->_saveWOEquipment($sid, $final);
		if ($jm == 1)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/#equipment', 'refresh');
		}
		if ($jm == 2)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEST/' . $pid . '/' . $sid . '/#equipment', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid, 'refresh');
	}
	public function deleteWOEquipment($pid, $sid, $nid, $jm = null)

	{
		$this->session->set_flashdata('msg', 'Equipment removed');
		$result = $this->M_Workorders->_deleteWOEquipment($nid);
		if ($jm)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid, 'refresh');
	}
	public function saveWODaily($pid, $sid, $jm = null)

	{
		$this->smarty->assign('usedate', $_POST['womDate']);
		$this->session->set_flashdata('msg', 'Nightly Checklist saved');
		$result = $this->M_Workorders->_saveWODaily($sid);
		if (!empty($result['error']))
		{
			$this->session->set_flashdata('msg', 'Check that the note you entered was saved. ');
		}
		if ($jm)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid, 'refresh');
	}
	public function deleteWONightly($pid, $sid, $nid, $jm = null)

	{
		$this->session->set_flashdata('msg', 'Nightly Checklist removed');
		$result = $this->M_Workorders->_removeWODaily($nid);
		if ($jm)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid, 'refresh');
	}
	public function deleteWOlabor($pid, $sid, $id, $jm = null)

	{
		$this->M_Workorders->_deleteWOLabor($id);
		$this->session->set_flashdata('msg', 'Labor removed ');
		if ($jm)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1/#labor', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid . '/#labor', 'refresh');
	}
	public function addWOlabor($pid, $sid, $jm = null)

	{
		$final = null;
		if ($jm == 2)
		{
			$final = 1;
		}
		// save labor
		$results = $this->M_Workorders->_addWOLabor($sid, $final); //sid is this service line item to add
		$this->session->set_flashdata('msg', 'Labor added');
		if ($jm == 1)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEJM/' . $pid . '/' . $sid . '/1/#labor', 'refresh');
		}
		if ($jm == 2)
		{
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistEST/' . $pid . '/' . $sid . '/#labor', 'refresh');
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOChecklistE/' . $pid . '/' . $sid . '/#labor', 'refresh');
	}
	public function WOChecklistE($pid, $sid, $jm = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Service End of Day Report</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$this->smarty->assign('proposal', $proposal);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		/*foreach ($details as $d)
		{
		$mydetails = $d;
		}
		*/
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		$nightly = $this->M_Workorders->_getNightlyChecklist($sid);
		$this->smarty->assign('nightly', $nightly);
		$materialvendors = $this->M_Crm->_getCRMByCat(19);
		$this->smarty->assign('materialvendors', $materialvendors);
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// get materials pricing data
		$materialslist = $this->M_Workorders->_getPOMaterials($pid);
		$mat = array();
		foreach($materialslist as $m)
		{
			$mat[$m['omatName']] = $m['omatCost'];
		}
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// SAVED ITEMS FOR THIS SERVICE
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$this->smarty->assign('materialslist', $materialslist);
		$this->smarty->assign('mat', $mat);
		// data
		// vehicles we saved  for this service
		$vehicles = $this->M_Workorders->_getWOVehicles($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment we saved for this service
		$equipment = $this->M_Workorders->_getWOEquipment($sid);
		$this->smarty->assign('equipment', $equipment);
		// labor we saved  for this service
		$labor = $this->M_Workorders->_getWOlabor($sid);
		$this->smarty->assign('labor', $labor);
		// other costs  saved for this service
		$other = $this->M_Workorders->_getWOOther($sid);
		$this->smarty->assign('other', $other);
		// materials we saved  for this service
		$materials = $this->M_Workorders->_getWOMaterials($sid);
		$this->smarty->assign('materials', $materials);
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// widgets
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$otherlist = $this->M_Workorders->_getPOOtherlist($pid);
		$this->smarty->assign('otherlist', $otherlist);
		// get vehicles list of company vehocles
		$vehiclelist = $this->M_Workorders->_getWOvehiclelist();
		$this->smarty->assign('vehiclelist', $vehiclelist);
		// get equipment list
		$equipmentlist = $this->M_Workorders->_getWOequipmentlist($pid);
		$this->smarty->assign('equipmentlist', $equipmentlist);
		// get labor list
		$laborlist = $this->M_Workorders->_getWOlaborlist($pid); //list of employees
		$this->smarty->assign('laborlist', $laborlist);
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// sidebars
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assign('cntId', $proposal['clientid']);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woServiceDailyRep.tpl');
		if ($jm)
		{
			$this->smarty->assignContentTemplate('workorders/wo_mainfullJM');
			$this->smarty->assignPageTitle('3D Paving Application');
			$this->smarty->assign('CONTENT', 'workorders/woServiceDailyRep_JM.tpl');
		}
		$this->smarty->view();
	}
	public function WOChecklistEJM($pid, $sid)

	{
		$allowed_roles = array(
			1,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Service End of Day Report</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		$nightly = $this->M_Workorders->_getNightlyChecklist($sid);
		$this->smarty->assign('nightly', $nightly);
		$materialvendors = $this->M_Crm->_getCRMByCat(19);
		$this->smarty->assign('materialvendors', $materialvendors);
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// get materials pricing data
		$materialslist = $this->M_Workorders->_getPOMaterials($pid);
		$mat = array();
		foreach($materialslist as $m)
		{
			$mat[$m['omatName']] = $m['omatCost'];
		}
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// SAVED ITEMS FOR THIS SERVICE
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$this->smarty->assign('materialslist', $materialslist);
		$this->smarty->assign('mat', $mat);
		// data
		// vehicles we saved  for this service
		$vehicles = $this->M_Workorders->_getWOVehicles($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment we saved for this service
		$equipment = $this->M_Workorders->_getWOEquipment($sid);
		$this->smarty->assign('equipment', $equipment);
		// labor we saved  for this service
		$labor = $this->M_Workorders->_getWOlabor($sid);
		$this->smarty->assign('labor', $labor);
		// other costs  saved for this service
		$other = $this->M_Workorders->_getWOOther($sid);
		$this->smarty->assign('other', $other);
		// materials we saved  for this service
		$materials = $this->M_Workorders->_getWOMaterials($sid);
		$this->smarty->assign('materials', $materials);
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// widgets
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$otherlist = $this->M_Workorders->_getPOOtherlist($pid);
		$this->smarty->assign('otherlist', $otherlist);
		// get vehicles list of company vehocles
		$vehiclelist = $this->M_Workorders->_getWOvehiclelist();
		$this->smarty->assign('vehiclelist', $vehiclelist);
		// get equipment list
		$equipmentlist = $this->M_Workorders->_getWOequipmentlist($pid);
		$this->smarty->assign('equipmentlist', $equipmentlist);
		// get labor list
		$laborlist = $this->M_Workorders->_getWOlaborlist($pid); //list of employees
		$this->smarty->assign('laborlist', $laborlist);
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfullJM');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woServiceDailyRep_JM.tpl');
		$this->smarty->view();
	}
	public function WOChecklistE_JM($pid, $sid)

	{
		$allowed_roles = array(
			1,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>End of Service Report</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$this->smarty->assign('proposal', $proposal);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		/*foreach ($details as $d)
		{
		$mydetails = $d;
		}
		*/
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		$nightly = $this->M_Workorders->_getNightlyChecklist($sid);
		$this->smarty->assign('nightly', $nightly);
		$materialvendors = $this->M_Crm->_getCRMByCat(19);
		$this->smarty->assign('materialvendors', $materialvendors);
		foreach($details as $d)
		{
			$mydetails = $d;
		}
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// get materials pricing data
		$materialslist = $this->M_Workorders->_getPOMaterials($pid);
		$mat = array();
		foreach($materialslist as $m)
		{
			$mat[$m['omatName']] = $m['omatCost'];
		}
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// SAVED ITEMS FOR THIS SERVICE
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$this->smarty->assign('materialslist', $materialslist);
		$this->smarty->assign('mat', $mat);
		// data
		// vehicles we saved  for this service
		$vehicles = $this->M_Workorders->_getWOVehicles($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment we saved for this service
		$equipment = $this->M_Workorders->_getWOEquipment($sid);
		$this->smarty->assign('equipment', $equipment);
		// labor we saved  for this service
		$labor = $this->M_Workorders->_getWOlabor($sid);
		$this->smarty->assign('labor', $labor);
		// other costs  saved for this service
		$other = $this->M_Workorders->_getWOOther($sid);
		$this->smarty->assign('other', $other);
		// materials we saved  for this service
		$materials = $this->M_Workorders->_getWOMaterials($sid);
		$this->smarty->assign('materials', $materials);
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// widgets
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$otherlist = $this->M_Workorders->_getPOOtherlist($pid);
		$this->smarty->assign('otherlist', $otherlist);
		// get vehicles list of company vehocles
		$vehiclelist = $this->M_Workorders->_getWOvehiclelist();
		$this->smarty->assign('vehiclelist', $vehiclelist);
		// get equipment list
		$equipmentlist = $this->M_Workorders->_getWOequipmentlist($pid);
		$this->smarty->assign('equipmentlist', $equipmentlist);
		// get labor list
		$laborlist = $this->M_Workorders->_getWOlaborlist($pid); //list of employees
		$this->smarty->assign('laborlist', $laborlist);
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$this->smarty->assign('cntId', $proposal['clientid']);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfullJM');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woServiceDailyRep_JM.tpl');
		$this->smarty->view();
	}
	public function WOChecklistEST($pid, $sid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>End of Service Report</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		/*
		foreach ($details as $d)
		{
		$mydetails = $d;
		}
		*/
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		$proposalDetails = $this->M_Workorders->_getPODetails($sid);
		$proposalDetails['equipcost'] = 0;
		$proposalDetails['othercost'] = 0;
		$proposalDetails['vehiclecost'] = 0;
		$proposalDetails['materialcost'] = 0;
		$proposalDetails['laborcost'] = 0;
		$result = array();
		$servicecost = $this->M_Workorders->_getTotalCostByService($proposalDetails['jordID']);
		$proposalDetails['equipcost'] = $servicecost['equipcost'];
		$proposalDetails['othercost'] = $servicecost['othercost'];
		$proposalDetails['vehiclecost'] = $servicecost['vehiclecost'];
		$proposalDetails['materialcost'] = $servicecost['materialcost'];
		$proposalDetails['laborcost'] = $servicecost['laborcost'];
		$result[] = $proposalDetails;
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('proposalDetails', $result);
		$materialvendors = $this->M_Crm->_getCRMByCat(19);
		$this->smarty->assign('materialvendors', $materialvendors);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// get materials pricing data
		$materialslist = $this->M_Workorders->_getPOMaterials($pid);
		$mat = array();
		foreach($materialslist as $m)
		{
			$mat[$m['omatName']] = $m['omatCost'];
		}
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// SAVED ITEMS FOR THIS SERVICE
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$this->smarty->assign('materialslist', $materialslist);
		$this->smarty->assign('mat', $mat);
		// data
		// vehicles we saved  for this service
		$vehicles = $this->M_Workorders->_getWOVehiclesEST($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment we saved for this service
		$equipment = $this->M_Workorders->_getWOEquipmentEST($sid);
		$this->smarty->assign('equipment', $equipment);
		// labor we saved  for this service
		$labor = $this->M_Workorders->_getWOlaborEST($sid);
		$this->smarty->assign('labor', $labor);
		// other costs  saved for this service
		$other = $this->M_Workorders->_getWOOtherEST($sid);
		$this->smarty->assign('other', $other);
		// materials we saved  for this service
		$materials = $this->M_Workorders->_getWOMaterialsEST($sid);
		$this->smarty->assign('materials', $materials);
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		// widgets
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$otherlist = $this->M_Workorders->_getPOOtherlist($pid);
		$this->smarty->assign('otherlist', $otherlist);
		// get vehicles list of company vehocles
		$vehiclelist = $this->M_Workorders->_getWOvehiclelist();
		$this->smarty->assign('vehiclelist', $vehiclelist);
		// get equipment list
		$equipmentlist = $this->M_Workorders->_getWOequipmentlist($pid);
		$this->smarty->assign('equipmentlist', $equipmentlist);
		// get labor list
		$laborlist = $this->M_Workorders->_getWOlaborlist($pid); //list of employees
		$this->smarty->assign('laborlist', $laborlist);
		// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		$this->smarty->assign('cntId', $proposal['clientid']);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfullJM');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woServiceDailyRep_EST.tpl');
		$this->smarty->view();
	}
	public function WOPreview($pid) //proposal id we always look at the proposal level

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Preview</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		if (!isset($proposal['jobcntID']))
		{
			exit('You do not have access to this work order');
		}
		$proposalDetails = $this->M_Workorders->_getAllPODetails($pid);
		$result = array();
		foreach($proposalDetails as $data)
		{
			$servicecost = $this->M_Workorders->_getTotalCostByService($data['jordID']);
			$data['equipcost'] = $servicecost['equipcost'];
			$data['othercost'] = $servicecost['othercost'];
			$data['vehiclecost'] = $servicecost['vehiclecost'];
			$data['materialcost'] = $servicecost['materialcost'];
			$data['laborcost'] = $servicecost['laborcost'];
			$result[] = $data;
		}
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('proposalDetails', $result);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_main');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woPreview.tpl');
		$this->smarty->view();
	}
	public function saveWOSchedule($pid, $sid)

	{
		$this->session->set_flashdata('msg', 'Work Order Schedule Updated');
		$result = $this->M_Workorders->_saveWOSchedule($sid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOSchedule/' . $pid . '/' . $sid, 'refresh');
	}
	public function WOSchedule($pid, $sid)

	{
		$allowed_roles = array(
			1,
			2,
			4,
			5,
			6
		); //admin office and job managers
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Service Schedule</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$permitsnotapproved = $this->M_Workorders->_getServicePermits($pid, $sid, true); //show any permits if any that are not ready to schedule
		$this->smarty->assign('permitsnotapproved', $permitsnotapproved);
		$this->smarty->assign('proposal', $proposal);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		/*
		* foreach ($details as $d)
		{
		$mydetails = $d;
		}
		*/
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// sidebars
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		// $permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		// $permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE);//how many not completed
		// $this->smarty->assign('permits',$permits);
		// $this->smarty->assign('permitsneeded',$permitsneeded);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woSchedule.tpl');
		$this->smarty->view();
	}
	public function WOServiceDetail($pid, $sid) //proposal id we always look at the proposal level

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Service Description</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		if (!isset($proposal['jobID']))
		{
			exit('you are not authorized to see this work order');
		}
		$this->smarty->assign('proposal', $proposal);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		/*foreach ($details as $d)
		{
		$mydetails = $d;
		}
		*/
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		$tack = ceil($mydetails['jordSquareFeet'] / 108);
		$this->smarty->assign('tack', $tack);
		// data
		// vehicles
		$vehicles = $this->M_Workorders->_getServiceVehicles($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment
		$equipment = $this->M_Workorders->_getServiceEquipment($sid);
		$this->smarty->assign('equipment', $equipment);
		$medialist = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('medialist', $medialist);
		// labor
		$labor = $this->M_Workorders->_getServiceLabor($sid);
		$this->smarty->assign('labor', $labor);
		// other
		$other = $this->M_Workorders->_getServiceOther($sid);
		$this->smarty->assign('other', $other);
		// get subs
		$subs = $this->M_Workorders->_getPOSubs($sid);
		$this->smarty->assign('subs', $subs);
		// sidebars
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woService.tpl');
		$this->smarty->view();
	}
	public function WOServiceDetailView($pid, $sid) //proposal id we always look at the proposal level

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// get current detail data
		$proposal = $this->M_Workorders->_getWOService($pid, $sid);
		$this->smarty->assign('proposal', $proposal);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// data
		// vehicles
		$vehicles = $this->M_Workorders->_getServiceVehicles($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment
		$equipment = $this->M_Workorders->_getServiceEquipment($sid);
		$this->smarty->assign('equipment', $equipment);
		// labor
		$labor = $this->M_Workorders->_getServiceLabor($sid);
		$this->smarty->assign('labor', $labor);
		// other
		$other = $this->M_Workorders->_getServiceOther($sid);
		$this->smarty->assign('other', $other);
		// get subs
		$subs = $this->M_Workorders->_getPOSubs($sid);
		$this->smarty->assign('subs', $subs);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->CORE_TEMPLATE = 'core/coreslim';
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('workorders/woServiceView.tpl');
		$this->smarty->view();
	}
	public function WOServiceDetailViewSend($pid, $sid) //proposal id we always look at the proposal level

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$email = $this->validate->post('sendto', "EMAIL");
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$this->smarty->assign('proposal', $proposal);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// data
		// vehicles
		$vehicles = $this->M_Workorders->_getServiceVehicles($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment
		$equipment = $this->M_Workorders->_getServiceEquipment($sid);
		$this->smarty->assign('equipment', $equipment);
		// labor
		$labor = $this->M_Workorders->_getServiceLabor($sid);
		$this->smarty->assign('labor', $labor);
		// other
		$other = $this->M_Workorders->_getServiceOther($sid);
		$this->smarty->assign('other', $other);
		// get subs
		$subs = $this->M_Workorders->_getPOSubs($sid);
		$this->smarty->assign('subs', $subs);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not completed
		$html = $this->load->view('rep_profile', $data, true);
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('cntId', $proposal['clientid']);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->CORE_TEMPLATE = 'core/coreslim';
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('workorders/woServiceView.tpl');
		$html = $this->smarty->view();
		// $html = 'Yes'. $html;
		echo $html;
		exit();
		pdf_create($html, 'service');
	}
	public function WOServiceDetailMail($pid, $sid) //proposal id we always look at the proposal level

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$data = array();
		foreach($_POST as $key => $value)
		{
			// echo $key . ": " . $value . "<br />";f
		}
		$email = $this->input->post('sendto');
		$data['email'] = $email;
		// get current detail data
		$ids = array();
		foreach($_POST as $key => $value)
		{
			// echo $key .' = '. $value.'<br/>';
			if (strpos($key, 'upload') === false)
			{
			}
			else
			{
				$ids[] = $value;
			}
		}
		if (count($ids))
		{
			$images = $this->M_Workorders->_getMediaByID($ids, $pid);
		}
		else
		{
			$images = array();
		}
		$siteplan = $this->M_Workorders->_getSitePlan($pid, $sid);
		$data['siteplan'] = $siteplan;
		// get current detail data
		$proposal = $this->M_Workorders->_getWOALL($pid, $sid);
		$p = $proposal['details'];
		$woID = $proposal['jobMasterYear'] . $proposal['jobMasterMonth'] . str_pad($proposal['jobMasterNumber'], 5, "0", STR_PAD_LEFT);
		$data['woID'] = $woID;
		$data['sid'] = $sid;
		$data['pid'] = $pid;
		$data['images'] = $images;
		$data['CurrentDate'] = $this->CurrentDate;
		$data['proposal'] = $proposal;
		$data['WEB_CONFIG'] = $this->WEBCONFIG;
		$html = $this->load->view('rep_workorderWithImagesSS', $data, true);
		//         echo $html;
		//       exit();
		// The message
		$subject = "Service Details " . $woID;
		$message = "Service Details\r\n";
		$message.= "Work order:" . $woID . "\r\n";
		$message.= "Proposal:" . $proposal['jobName'] . "\r\n";
		$message.= "Client:" . $proposal['clientfirst'] . " " . $proposal['clientlast'] . "\r\n";
		$message.= "Billing Address" . $proposal['jobBillingAddress1'] . "\r\n";
		$message.= $proposal['jobBillingAddress2'] . "\r\n";
		$message.= $proposal['jobBillingState'] . "\r\n";
		$message.= $proposal['jobBillingCity'] . "\r\n";
		$message.= $proposal['jobBillingZip'] . "\r\n";
		$message.= "Site Address" . $proposal['jobAddress1'] . "\r\n";
		$message.= $proposal['jobAddress2'] . "\r\n";
		$message.= $proposal['jobState'] . "\r\n";
		$message.= $proposal['jobCity'] . "\r\n";
		$message.= $proposal['jobZip'] . "\r\n";
		$message.= "Managers:\r\n";
		$message.= "Sales Manager:" . $proposal['managerfirst'] . " " . $proposal['managerlast'] . "\r\n";
		$message.= "Sales Person:" . $proposal['salesfirst'] . " " . $proposal['saleslast'] . "\r\n";
		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$message = wordwrap($message, 70, "\r\n");
		$this->load->helper('email');
		$this->session->set_flashdata('msg', 'Checking Email');
		if (valid_email($email))
		{
			$this->session->set_flashdata('msg', 'Mail was sent');
			$this->load->helper(array(
				'dompdf',
				'file'
			));
			$pdf = pdf_create($html, 'service', 0);
			$filename = './media/single_service.pdf';
			if (file_exists($filename))
			{
				unlink($filename);
			}
			file_put_contents($filename, $pdf);
			$FromName = "AllPaving";
			$FromEmail = $this->USER_EMAIL;
			$SendTo = $email;
			$subject = "Service Details " . $woID;
			$message = "Service Details " . $woID . "\r\n" . $p['jordName'];
			$this->load->library('email');
			$this->email->from($FromEmail, $FromName);
			$this->email->to($SendTo);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->attach($filename);
			$this->email->send();
			//            echo $this->email->print_debugger();
		}
		else
		{
			$this->session->set_flashdata('msg', 'No valid email');
			// echo 'email is not valid' .$message;
		}
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOServiceDetail/' . $pid . '/' . $sid, 'refresh');
		// exit();
	}
	public function WOLienRelease($pid) //proposal id we always look at the proposal level

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$data = array();
		$data['proposal'] = $proposal;
		$data['CurrentDate'] = $this->CurrentDate;
		$wid = $proposal['jobMasterYear'] . '-' . $proposal['jobMasterMonth'] . '-' . str_pad($proposal['jobMasterNumber'], 5, "0", STR_PAD_LEFT);
		$html = $this->load->view('rep_lein_release', $data, true);
		// echo $html;
		// exit();
		// $this->session->set_flashdata('msg','Mail was sent');
		$this->load->helper(array(
			'dompdf',
			'file'
		));
		$pdf = pdf_create($html, 'lien_release' . $wid);
		exit();
	}
	public function WOServiceStart($pid, $sid) //proposal id we always look at the proposal level

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Service Description</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$this->smarty->assign('proposal', $proposal);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		/*foreach ($details as $d)
		{
		$mydetails = $d;
		}
		*/
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		// data
		// vehicles
		$vehicles = $this->M_Workorders->_getServiceVehicles($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment
		$equipment = $this->M_Workorders->_getServiceEquipment($sid);
		$this->smarty->assign('equipment', $equipment);
		// labor
		$labor = $this->M_Workorders->_getServiceLabor($sid);
		$this->smarty->assign('labor', $labor);
		// other
		$other = $this->M_Workorders->_getServiceOther($sid);
		$this->smarty->assign('other', $other);
		// get subs
		$subs = $this->M_Workorders->_getPOSubs($sid);
		$this->smarty->assign('subs', $subs);
		// sidebars
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woStart.tpl');
		$this->smarty->view();
	}
	public function saveWOJobManagers($pid, $sid)

	{
		$this->session->set_flashdata('msg', 'Work Order Schedule Updated');
		$result = $this->M_Workorders->_saveWOManagers($sid); //based on the service
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOManagers/' . $pid . '/' . $sid, 'refresh');
	}
	public function woSaveCustomNote($pid, $sid)

	{
		$this->session->set_flashdata('msg', 'Service Note Updated');
		$result = $this->M_Workorders->_saveWOServiceNote($sid); //based on the service
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOPreview/' . $pid, 'refresh');
	}
	public function WOCustomInstructions($pid, $sid)

	{
		$allowed_roles = array(
			1,
			6
		); //admin office and job managers
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Service Special Instructions</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('proposalDetails', $mydetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfull');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woCustomInstructions.tpl');
		$this->smarty->view();
	}
	public function WOManagers($pid, $sid) // we always manage at the service level this page allows users to select or change a service manager

	{
		$allowed_roles = array(
			1,
			4,
			5,
			6
		); //admin office and job managers
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Managers</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		/*foreach ($details as $d)
		{
		$mydetails = $d;
		}
		*/
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('proposalDetails', $mydetails);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		// 4-job Manager 5-Regular employee
		$managers = $this->M_Crm->_getEmployeeByRole(4);
		$employees = $this->M_Crm->_getEmployeeByRole(5);
		$this->smarty->assign('managers', $managers);
		$this->smarty->assign('employees', $employees);
		$this->smarty->assign('cntId', $proposal['clientid']);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woManagers.tpl');
		$this->smarty->view();
	}
	public function WOEMailLetter($lettertype)

	{
		// populate data from input
		$data['clientname'] = $this->input->post('clientname');
		$data['communityname'] = $this->input->post('communityname');
		$data['location'] = $this->input->post('location');
		$data['city'] = $this->input->post('city');
		$data['manager'] = $this->input->post('manager');
		$data['startdate'] = $this->input->post('startdate');
		$data['manageremail'] = $this->input->post('manageremail');
		$data['managerphone'] = $this->input->post('managerphone');
		$data['title'] = $this->input->post('title');
		$this->smarty->assign('data', $data);
		$this->load->helper(array(
			'file'
		));
		switch ($lettertype)
		{
		case 1:
			// check in letter
			$html = $this->smarty->fetch('reports/Letter_check_inE.tpl', $data);
			break;

		case 2: //start date
			$html = $this->smarty->fetch('reports/Letter_start_dateE.tpl', $data);
			break;

		case 3: //follow up
			$html = $this->smarty->fetch('reports/Letter_follow-upE.tpl', $data);
			break;

		case 4: //Thank you letter
			$html = $this->smarty->fetch('reports/Letter_thank_youE.tpl', $data);
			break;

		default:
			echo "Noooo";
		}
		// $html = wordwrap($html, 90, "\r\n");
		echo $html;
	}
	public function WOLetter($lettertype, $pid = null, $usepdf = null)

	{
		// populate data from input
		if (!$pid)
		{
			$pid = 0;
		}
		$data['pid'] = $pid;
		// work order id
		$data['clientname'] = $this->input->post('clientname');
		$data['communityname'] = $this->input->post('communityname');
		$data['location'] = $this->input->post('location');
		$data['city'] = $this->input->post('city');
		$data['manager'] = $this->input->post('manager');
		$data['startdate'] = $this->input->post('startdate');
		$data['manageremail'] = $this->input->post('manageremail');
		$data['managerphone'] = $this->input->post('managerphone');
		$data['title'] = $this->input->post('title');
		$this->smarty->assign('data', $data);
		$pdfname = 'pdffile';
		switch ($lettertype)
		{
		case 1:
			// check in letter
			$html = $this->smarty->fetch('reports/Letter_check_in.tpl', $data);
			$pdfname = 'Check_in_With_Client';
			break;

		case 2: //start date
			$html = $this->smarty->fetch('reports/Letter_start_date.tpl', $data);
			$pdfname = 'Job_Start_Date_Notice';
			break;

		case 3: //follow up
			$html = $this->smarty->fetch('reports/Letter_follow-up.tpl', $data);
			$pdfname = 'Folow_UP_With_Client';
			break;

		case 4: //Thank you letter
			$html = $this->smarty->fetch('reports/Letter_thank_you.tpl', $data);
			$pdfname = 'Thank_You';
			break;

		default:
			echo "Noooooo";
		}
		$data['lettername'] = $pdfname;
		// log it
		$this->M_System->_logLetter($data);
		$html = wordwrap($html, 90, "\r\n");
		if ($usepdf)
		{
			// write pdf
			$this->load->helper(array(
				'dompdf',
				'file'
			));
			pdf_create($html, $pdfname);
		}
		else
		{
			echo $html;
		}
	}
	public function WOLetters($pid)

	{
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Letters</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assignContentTemplate('workorders/wo_main');
		$this->smarty->assign('CONTENT', 'workorders/woLetters.tpl');
		$this->smarty->view();
	}
	public function WONotes($pid, $edit = null)

	{
		$this->smarty->assign('note_id', $edit);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Notes</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$services = $this->M_Workorders->_getPOServices($pid);
		$this->smarty->assign('services', $services);
		$notes = $this->M_Workorders->_getProjectNotes($pid, null);
		$this->smarty->assign('notes', $notes);
		if ($edit)
		{
			$edit = $this->M_Workorders->_getProjectNotes($pid, $edit);
		}
		$this->smarty->assign('edit', $edit);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		// sidebar data
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assign('CONTENT', 'workorders/woNotes.tpl');
		$this->smarty->view();
	}
	public function saveWONote($pid, $note_id = null)

	{
		$this->session->set_flashdata('msg', 'Work Order Note Updated');
		if (!$note_id)
		{
			$this->session->set_flashdata('msg', 'Work Order Note Saved');
		}
		$result = $this->M_Workorders->_savePONote($pid, $note_id);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WONotes/' . $pid, 'refresh');
	}
	public function cancelWO($pid)

	{
		$allowed_roles = array(
			1
		);
		$this->checkRoleAccess($allowed_roles);
		$result = $this->M_Workorders->_cancelJob($pid, null);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOClient/' . $pid, 'refresh');
	}
	public function reopenWO($pid)

	{
		$allowed_roles = array(
			1
		);
		$this->checkRoleAccess($allowed_roles);
		$result = $this->M_Workorders->_cancelJob($pid, 1);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOClient/' . $pid, 'refresh');
	}
	public function WOMedia($pid, $useImages = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Media</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		if (!isset($proposal['jobMasterMonth']))
		{
			echo "This is not a work order.";
			exit();
		}
		$services = $this->M_Workorders->_getPOServices($pid);
		$mediatypes = $this->M_Workorders->_fetch_mediaTypes();
		$medialist = $this->M_Workorders->_getMedia($pid);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		$this->smarty->assign('medialist', $medialist);
		$this->smarty->assign('mediatypes', $mediatypes);
		$this->smarty->assign('services', $services);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfull');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woMedia.tpl');
		if ($useImages)
		{
			$this->smarty->assign('CONTENT', 'workorders/woMediaSelect.tpl');
		}
		$this->smarty->view();
	}
	public function WOMediaSS($pid, $sid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Media</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		if (!isset($proposal['jobMasterMonth']))
		{
			echo "This is not a work order.";
			exit();
		}
		$service = $this->M_Workorders->_getPOService($pid, $sid);
		$medialist = $this->M_Workorders->_getMedia($pid);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('service', $service);
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		$this->smarty->assign('medialist', $medialist);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfull');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woMediaSelectSS.tpl');
		$this->smarty->view();
	}
	public function WOMediaEST($pid, $sid) //estimator upload at end of service

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Media</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$services = $this->M_Workorders->_getPOService($pid, $sid);
		$mediatypes = $this->M_Workorders->_fetch_mediaTypes();
		$medialist = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('medialist', $medialist);
		$this->smarty->assign('mediatypes', $mediatypes);
		$this->smarty->assign('services', $services);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfullJM');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woMediaEST.tpl');
		$this->smarty->view();
	}
	public function WOMediaJM($pid, $sid)

	{
		$allowed_roles = array(
			1,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Upload Media</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$service = $this->M_Workorders->_getPODetails($sid);
		$this->smarty->assign('service', $service);
		$mediatypes = $this->M_Workorders->_fetch_mediaTypes();
		$medialist = $this->M_Workorders->_getMediaByUser($pid);
		$this->smarty->assign('medialist', $medialist);
		$this->smarty->assign('mediatypes', $mediatypes);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfullJM');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woMedia_JM.tpl');
		$this->smarty->view();
	}
	public function WONTOSent($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Work Order NTO Sent');
		$result = $this->M_Workorders->_updateWONTO($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOclient/' . $pid, 'refresh');
	}
	public function WOMOTSent($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Work Order MOT complete');
		$result = $this->M_Workorders->_updateWOMOT($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOclient/' . $pid, 'refresh');
	}
	public function WOServiceCompleted($pid, $sid) //mark service completed

	{
		$allowed_roles = array(
			1,
			2,
			6
		); //admin office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Service marked complete');
		$result = $this->M_Workorders->_completeService($sid, $pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOPreview/' . $pid, 'refresh');
	}
	public function WOServiceCompletedJM($pid, $sid) //mark service completed

	{
		$allowed_roles = array(
			1,
			3,
			4,
			6
		); //admin office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Service marked complete');
		$result = $this->M_Workorders->_completeService($sid, $pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/showServiceList/', 'refresh');
	}
	public function WOMarkCompletedOLD($pid)

	{
		$allowed_roles = array(
			1,
			6
		); //admin office only
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$this->session->set_flashdata('msg', 'Service marked complete');
		$result = $this->M_Workorders->_CloseWorkOrder($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOClient/' . $pid, 'refresh');
	}
	public function WOEstimatorClose($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Preview</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		if (!isset($proposal['jobcntID']))
		{
			exit('You do not have access to this work order');
		}
		$proposalDetails = $this->M_Workorders->_getAllPODetails($pid);
		$result = array();
                $complete = true;
		foreach($proposalDetails as $data)
		{
			$servicecost = $this->M_Workorders->_getTotalCostByService($data['jordID']);
			$data['equipcost'] = $servicecost['equipcost'];
			$data['othercost'] = $servicecost['othercost'];
			$data['vehiclecost'] = $servicecost['vehiclecost'];
			$data['materialcost'] = $servicecost['materialcost'];
			$data['laborcost'] = $servicecost['laborcost'];
			$result[] = $data;

                        if($data['jordStatus'] != 'COMPLETED') {
				$complete=false;
			}
		}

                $this->smarty->assign('completeStatus', $complete);

		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('proposalDetails', $result);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_mainfullEST');
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assign('CONTENT', 'workorders/woPreviewClose_EST.tpl');
		$this->smarty->view();
	}
	public function WOclient($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order ' . $pid . ' Client</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$ntosender = '';
		$motsender = '';
		// get mot and NTO approver
		if ($proposal['jobMOTSentBy'] > 0)
		{
			$results = $this->M_Crm->_getCRMUserLight($proposal['jobMOTSentBy']);
			if ($results)
			{
				$motsender = $results['cntFirstName'] . ' ' . $results['cntLastName'];
			}
		}
		if ($proposal['jobNTOSentBy'] > 0)
		{
			$results = $this->M_Crm->_getCRMUserLight($proposal['jobNTOSentBy']);
			if ($results)
			{
				$ntosender = $results['cntFirstName'] . ' ' . $results['cntLastName'];
			}
		}
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$emailMessages = $this->M_Workorders->_workorderEmailSubjects();
		$this->smarty->assign('emailOptions', $emailMessages);
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		$this->smarty->assign('ntosender', $ntosender);
		$this->smarty->assign('motsender', $motsender);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assign('CONTENT', 'workorders/woClient.tpl');
		$this->smarty->view();
	}
	public function WOPermitLog($pid, $wopID)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('wopID', $wopID);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Permits Log</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$this->smarty->assign('proposal', $proposal);
		$PermitInfo = $this->M_Workorders->_getPermits($pid, $wopID);
		$this->smarty->assign('PermitInfo', $PermitInfo);
		$PermitLog = $this->M_Workorders->_getPermitsLog($wopID);
		$this->smarty->assign('PermitLog', $PermitLog);
		// sidebars data
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assign('CONTENT', 'workorders/woPermitLogList.tpl');
		$this->smarty->view();
	}
	public function removePermitLog($pid, $wopID, $logid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Permit Log Removed');
		$result = $this->M_Workorders->_removePermitLog($logid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOPermitLog/' . $pid . '/' . $wopID, 'refresh');
	}
	public function removePermit($pid, $wopID)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Permit Removed');
		$result = $this->M_Workorders->_removePermit($wopID);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOPermits/' . $pid, 'refresh');
	}
	public function savePermitLog($pid, $wopID)

	{
		$this->session->set_flashdata('msg', 'Permit Log Added');
		$result = $this->M_Workorders->_savePermitLog($wopID);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOPermitLog/' . $pid . '/' . $wopID, 'refresh');
	}
	public function saveWOPermit($pid, $wopID = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->session->set_flashdata('msg', 'Permit Updated');
		if (!$wopID)
		{
			$this->session->set_flashdata('msg', 'Permit Saved');
		}
		$result = $this->M_Workorders->_saveWOPermit($pid, $wopID);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOPermits/' . $pid, 'refresh');
	}
	public function WOPermits($pid, $edit = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('wopid', $edit);
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Permits</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$this->smarty->assign('proposal', $proposal);
		$services = $this->M_Workorders->_getPOServices($pid);
		$this->smarty->assign('services', $services);
		$permitslist = $this->M_Workorders->_getPermits($pid);
		$this->smarty->assign('permitslist', $permitslist);
		$results = null;
		if ($edit)
		{
			$results = $this->M_Workorders->_getPermits($pid, $edit);
		}
		$this->smarty->assign('edit', $results);
		// widgets
		$wtype = $this->M_Workorders->_getPermitTypes();
		$this->smarty->assign('wtype', $wtype);
		$wstatus = $this->M_Workorders->_getPermitStatus();
		$this->smarty->assign('wstatus', $wstatus);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		// sidebars data
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assign('CONTENT', 'workorders/woPermits.tpl');
		$this->smarty->view();
	}
	public function WOPreDailyReport($wid) //addnote

	{
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('projects/wo_main');
		$this->smarty->view();
	}
	public function WODailyReport($wid) //addnote

	{
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('projects/wo_main');
		$this->smarty->view();
	}
	public function showServiceTools()

	{
		$id = $this->input->post('id');
		$sid = $this->input->post('sid');
		$username = $this->input->post('username');
		$this->smarty->assign('id', $id);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('username', $username);
		$this->CORE_TEMPLATE = 'core/coreexport';
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('workorders/woServiceMenu');
		$this->smarty->view();
	}
	public function savePOText($id)

	{
		// exit();
		$details = $this->M_Workorders->_getPOdetails($id);
		$result = $this->M_Workorders->_updatePOText($id);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/previewPO/' . $details['jordJobID'], 'refresh');
	}
	public function showProposalText($id)

	{
		// $id = $this->input->post('id');
		$username = $this->input->post('username');
		$this->smarty->assign('id', $id);
		$this->smarty->assign('username', $username);
		$proposal = $this->M_Workorders->_getPODetails($id);
		$this->smarty->assign('proposal', $proposal);
		$this->CORE_TEMPLATE = 'core/coreexport';
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('projects/proposalText');
		$this->smarty->view();
	}
	public function showWOTools()

	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$this->smarty->assign('id', $id);
		$this->smarty->assign('username', $username);
		$this->CORE_TEMPLATE = 'core/coreexport';
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('workorders/woMenu');
		$this->smarty->view();
	}
	public function showTools()

	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$this->smarty->assign('id', $id);
		$this->smarty->assign('username', $username);
		$this->CORE_TEMPLATE = 'core/coreexport';
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('projects/poMenu');
		$this->smarty->view();
	}
	public function uploadMedia($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->load->helper(array(
			'form',
			'url'
		));
		$config['upload_path'] = './media/projects/';
		$config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|xlsx|ppt|pptx|pdf|odt|ods';
		$config['max_size'] = $this->WEBCONFIG['webMaxUploadSize'];
		// $config['max_width']  = $this->WEBCONFIG['webMaxWidth'];
		// $config['max_height']  = $this->WEBCONFIG['webMaxHeight'];
		$config['remove_spaces'] = TRUE;
		$config['width'] = 1000;
		$config['maintain_ratio'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('media'))
		{
			echo "There was an error<p>";
			echo "It's not the end of the world, go back try again.<p>";
			print_r(array(
				'error' => $this->upload->display_errors()
			));
		}
		else
		{
			$data = array(
				'upload_data' => $this->upload->data()
			);
			$results = $data['upload_data'];
			$max_height = 800;
			$max_width = 1000;
			if ($results['image_width'] > $max_width || $results['image_height'] > $max_height)
			{
				$configResize = array(
					'source_image' => $results['full_path'],
					'width' => $max_width,
					'height' => $max_height,
					'maintain_ratio' => TRUE
				);
				$this->load->library('image_lib', $configResize);
				$this->image_lib->resize();
			}
			$this->M_Workorders->_uploadMedia($pid, $results);
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/Media/' . $pid, 'refresh');
		}
	}
	public function uploadWOMedia($pid, $jm = null)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->load->helper(array(
			'form',
			'url'
		));
		$config['upload_path'] = './media/projects/';
		$config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|xlsx|ppt|pptx|pdf|odt|ods';
		$config['max_size'] = $this->WEBCONFIG['webMaxUploadSize'];
		$config['max_width'] = $this->WEBCONFIG['webMaxWidth'];
		$config['max_height'] = $this->WEBCONFIG['webMaxHeight'];
		$config['width'] = 1000;
		$config['maintain_ratio'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('media'))
		{
			echo "There was an error<p>";
			echo "It's not the end of the world, go back try again.<p>";
			print_r(array(
				'error' => $this->upload->display_errors()
			));
		}
		else
		{
			$data = array(
				'upload_data' => $this->upload->data()
			);
			$results = $data['upload_data'];
			$max_height = 800;
			$max_width = 1000;
			if ($results['image_width'] > $max_width || $results['image_height'] > $max_height)
			{
				$configResize = array(
					'source_image' => $results['full_path'],
					'width' => $max_width,
					'height' => $max_height,
					'maintain_ratio' => TRUE
				);
				$this->load->library('image_lib', $configResize);
				$this->image_lib->resize();
			}
			$this->M_Workorders->_uploadMedia($pid, $results);
			if ($jm == 1) //job manager
			{
				$this->session->set_flashdata('msg', 'Your file was uploaded.');
				redirect($this->WEBCONFIG['webStartPage'] . 'workorders/showServiceList/', 'refresh');
			}
			if ($jm == 2) //Estimator
			{
				$this->session->set_flashdata('msg', 'Your file was uploaded.');
				redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOEstimatorClose/' . $pid, 'refresh');
			}
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOMedia/' . $pid, 'refresh');
		}
	}
	public function printMedia($pid)

	{
		$ids = array();
		foreach($_POST as $key => $value)
		{
			// echo $key .' = '. $value.'<br/>';
			if (strpos($key, 'upload') === false)
			{
			}
			else
			{
				$ids[] = $value;
			}
		}
		$data = array();
		// get all media ids   pull them into a recordset
		$images = $this->M_Workorders->_getMediaByID($ids, $pid);
		// print_r($images);
		$data['images'] = $images;
		$html = $this->load->view('rep_media', $data, true);
		// echo $html;
		// exit();
		// $this->session->set_flashdata('msg','Mail was sent');
		$this->load->helper(array(
			'dompdf',
			'file'
		));
		$pdf = pdf_create($html, 'proposal_images' . $pid);
	}
	public function printNightlyRep($pid)

	{
		$data = array();
		// get all media ids   pull them into a recordset
		$notes = $this->M_Workorders->_getWONightlyRep($pid);
		$data['notes'] = $notes;
		$rdate = $notes['womDate'];
		// get vehicles
		$vehicle = $this->M_Workorders->_getWOVehiclesDate($rdate);
		$data['vehicle'] = $vehicle;
		// get equipment
		$equipment = $this->M_Workorders->_getWOEquipmentDate($rdate);
		$data['equipment'] = $equipment;
		// get materials
		$materials = $this->M_Workorders->_getWOMaterialsDate($rdate);
		$data['materials'] = $materials;
		// get other
		$labor = $this->M_Workorders->_getWOLaborDate($rdate);
		$data['labor'] = $labor;
		// get other
		$other = $this->M_Workorders->_getWOOtherDate($rdate);
		$data['other'] = $other;
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();
		$html = $this->load->view('rep_nightlyrep', $data, true);
		// $this->session->set_flashdata('msg','Mail was sent');
		$this->load->helper(array(
			'dompdf',
			'file'
		));
		$pdf = pdf_create($html, 'nightly_report' . $pid);
	}
	public function printDailyRep($pid)

	{
		$data = array();
		// get all media ids   pull them into a recordset
		$notes = $this->M_Workorders->_printServiceChecklist($pid);
		$data['notes'] = $notes;
		$html = $this->load->view('rep_dailyrep', $data, true);
		// $this->session->set_flashdata('msg','Mail was sent');
		$this->load->helper(array(
			'dompdf',
			'file'
		));
		$pdf = pdf_create($html, 'daily_report' . $pid);
	}
	public function rollbackBilling($pid, $showcompleted = 1)

	{
		$allowed_roles = array(
			1,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->M_Workorders->_rollbackBilling($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/showWOList/' . $showcompleted, 'refresh');
	}
	public function rollbackCompleted($pid, $showcompleted = 1)

	{
		$allowed_roles = array(
			1,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->M_Workorders->_rollbackCompleted($pid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/showWOList/' . $showcompleted, 'refresh');
	}
	public function rollbackService($pid, $sid)

	{
		$allowed_roles = array(
			1,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->M_Workorders->_rollbackService($sid);
		redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOPreview/' . $pid, 'refresh');
	}
	
		public function saveProposalEmail($pid)

	{
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jnotNote', 'Proposal Reminder Message', 'xss_clean|required');
		$this->form_validation->set_rules('jnotTitle', 'Proposal Reminder Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jnotReminderDate', 'Day To Send Reminder', 'trim|required|xss_clean');
		$this->form_validation->set_rules('cnotNoteSender', 'Email From', 'required|valid_email');
		$this->form_validation->set_rules('cnotSendNoteTo', 'Email To', 'required|valid_email');
		$this->form_validation->set_rules('jobID', 'Project ID', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/clientReminder/' . $pid, 'refresh');
		}
		else
		{
			$date = date('Y-m-d', strtotime($this->input->post('jnotReminderDate')));
			$from = $this->input->post('cnotNoteSender');
			$to = $this->input->post('cnotSendNoteTo');
			$title = $this->input->post('jnotTitle');
			$message = $this->input->post('jnotNote');
			$pid = $this->input->post('jobID');
			$this->M_Workorders->_saveProposalEmail($from, $to, $title, $message, $date, $pid);
			$this->session->set_flashdata('msg', "Your Reminder has been updated");
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/clientReminder/' . $pid, 'refresh');
		}
	}
	public function sendProposalEmails()

	{
		/*if(!$this->input->is_cli_request())
		{
		echo "This script can only be accessed via the command line" . PHP_EOL;
		return;
		} */
		$appointments = $this->M_Workorders->_getProposalEmailData();
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
				'smtp_user' => 'apikey',
				'smtp_pass' => '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',
				'smtp_port' => 587,
				'crlf' => "\r\n",
				'newline' => "\r\n"
			);
			$this->email->initialize($config);
			foreach($appointments as $appointment)
			{
				$this->email->set_newline("\r\n");
				$data = array(
					'message_body' => $appointment->proposalEmailBody
				);
				$body = $this->load->view('emails/emailTemplate.php', $data, TRUE);
				$this->email->message($body);
				$this->email->to($appointment->proposalEmailTo);
				$this->email->from($appointment->proposalEmailFrom);
				$this->email->subject($appointment->proposalEmailSubject);
				$this->email->send();
				$this->M_Workorders->setProposalEmailToIsReminded($appointment->proposalID);
			}
		}
	}
	public function CreateWorkorderEmail($pid, $sid)

	{
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Emails</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		$services = $this->M_Workorders->_getPOServices($pid);
		$this->smarty->assign('services', $services);
		$notes = $this->M_Workorders->_getProjectNotes($pid, null);
		$this->smarty->assign('notes', $notes);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		// sidebar data
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$allowed_roles = array(
			1,
			2,
			3,
			4,
			5,
			6
		);
		$this->checkRoleAccess($allowed_roles);
		$this->smarty->assign('allowed_roles', $allowed_roles);
		// get current detail data
		$proposal = $this->M_Workorders->_getWO($pid);
		if (!isset($proposal['jobID']))
		{
			exit('you are not authorized to see this work order');
		}
		$this->smarty->assign('proposal', $proposal);
		$mydetails = $this->M_Workorders->_getAllPODetails($pid, $sid);
		$this->smarty->assign('details', $mydetails);
		$services = $this->M_Workorders->_getSelectedService($mydetails['jordServiceID']);
		$this->smarty->assign('services', $services);
		$tack = ceil($mydetails['jordSquareFeet'] / 108);
		$this->smarty->assign('tack', $tack);
		// data
		// vehicles
		$vehicles = $this->M_Workorders->_getServiceVehicles($sid);
		$this->smarty->assign('vehicles', $vehicles);
		// equipment
		$equipment = $this->M_Workorders->_getServiceEquipment($sid);
		$this->smarty->assign('equipment', $equipment);
		$medialist = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('medialist', $medialist);
		// labor
		$labor = $this->M_Workorders->_getServiceLabor($sid);
		$this->smarty->assign('labor', $labor);
		// other
		$other = $this->M_Workorders->_getServiceOther($sid);
		$this->smarty->assign('other', $other);
		// get subs
		$subs = $this->M_Workorders->_getPOSubs($sid);
		$this->smarty->assign('subs', $subs);
		// sidebars
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$this->smarty->assign('cntId', $proposal['clientid']);
		$this->smarty->assign('lastContact', $lastContact);
		// $this->smarty->assign('proposalDetails',$proposalDetails);
		$this->smarty->assign('sid', $sid);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assign('CONTENT', 'workorders/WONotifications.tpl');
		$this->smarty->view();
	}
	public function saveWOEmail($pid, $sid)

	{
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jnotNote', 'Proposal Reminder Message', 'xss_clean|required');
		$this->form_validation->set_rules('jnotEmailTitle', 'Proposal Reminder Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('cnotNoteSender', 'Email From', 'required|valid_email');
		$this->form_validation->set_rules('cnotSendNoteTo', 'Email To', 'required|valid_email');
		$this->form_validation->set_rules('workOrderID', 'Work Order ID', 'required');
		$this->form_validation->set_rules('jobID', 'Project ID', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/CreateWorkorderEmail/' . $pid . '/' . $sid, 'refresh');
		}
		else
		{
			$sendNow = $this->input->post('cnotSendNoteNow');
			if ($sendNow == "1")
			{
				$from = $this->input->post('cnotNoteSender');
				$to = $this->input->post('cnotSendNoteTo');
				$title = $this->input->post('jnotEmailTitle');
				$message = $this->input->post('jnotNote');
				$this->load->library('email');
				$this->load->helper('url');
				$config = array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => '1',
					'protocol' => 'smtp',
					'smtp_host' => 'smtp.sendgrid.net',
					'smtp_user' => 'apikey',
					'smtp_pass' => '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',
					'smtp_port' => 587,
					'crlf' => "\r\n",
					'newline' => "\r\n"
				);
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$email = $this->input->post('jnotNote');
				$data = array(
					'message_body' => $email
				);
				$body = $this->load->view('emails/emailTemplate.php', $data, TRUE);
				$this->email->message($body);
				$this->email->to($to);
				$this->email->from($from);
				$this->email->subject($title);
				$this->email->send();
				$this->session->set_flashdata('msg', "Your Email Has Been Sent");
				redirect($this->WEBCONFIG['webStartPage'] . 'workorders/CreateWorkorderEmail/' . $pid . '/' . $sid, 'refresh');
			}
			else
			{
				$this->form_validation->set_rules('jnotReminderDate', 'Day To Send Reminder', 'trim|required|xss_clean');
				if ($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
					redirect($this->WEBCONFIG['webStartPage'] . 'workorders/CreateWorkorderEmail/' . $pid . '/' . $sid, 'refresh');
				}
				else
				{
					$date = date('Y-m-d', strtotime($this->input->post('jnotReminderDate')));
					$from = $this->input->post('cnotNoteSender');
					$to = $this->input->post('cnotSendNoteTo');
					$title = $this->input->post('jnotEmailTitle');
					$message = $this->input->post('jnotNote');
					$job = $this->input->post('workOrderID');
					$pid = $this->input->post('jobID');
					$this->M_Workorders->_saveWorkorderEmail($from, $to, $title, $message, $date, $pid, $job);
					$this->session->set_flashdata('msg', "Your Reminder has been set");
					redirect($this->WEBCONFIG['webStartPage'] . 'workorders/CreateWorkorderEmail/' . $pid . '/' . $sid, 'refresh');
				}
			}
		}
	}
	public function sendWorkorderEmails()

	{
		if (!$this->input->is_cli_request())
		{
			echo "This script can only be accessed via the command line" . PHP_EOL;
			return;
		}
		$appointments = $this->M_Workorders->_getWorkorderEmailData();
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
				'smtp_user' => 'apikey',
				'smtp_pass' => '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',
				'smtp_port' => 587,
				'crlf' => "\r\n",
				'newline' => "\r\n"
			);
			$this->email->initialize($config);
			foreach($appointments as $appointment)
			{
				$this->email->set_newline("\r\n");
				$data = array(
					'message_body' => $appointment->workorderEmailBody
				);
				$body = $this->load->view('emails/emailTemplate.php', $data, TRUE);
				$this->email->message($body);
				$this->email->to($appointment->workorderEmailTo);
				$this->email->from($appointment->workorderEmailFrom);
				$this->email->subject($appointment->workorderEmailSubject);
				$this->email->send();
				$this->M_Workorders->setWorkorderEmailToIsReminded($appointment->workorderJobID);
			}
		}
	}
	public function CloseWO($pid)

	{
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Close Work Order</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$proposal = $this->M_Workorders->_getWO($pid);
		$services = $this->M_Workorders->_getPOServices($pid);
		$this->smarty->assign('services', $services);
		$notes = $this->M_Workorders->_getProjectNotes($pid, null);
		$this->smarty->assign('notes', $notes);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$permits = $this->M_Workorders->_openPermits($pid, TRUE); //how many do i have
		$permitsneeded = $this->M_Workorders->_openPermits($pid, FALSE); //how many not approved
		$permitscomplete = $this->M_Workorders->_checkPermits($pid, 'Completed'); //how many completed
		$this->smarty->assign('permits', $permits);
		$this->smarty->assign('permitsneeded', $permitsneeded);
		$this->smarty->assign('permitscomplete', $permitscomplete);
		// sidebar data
		$media = $this->M_Workorders->_getMedia($pid);
		$workorderImages = [];
		foreach($media as $image)
		{
			$workorderImages[] = array(
				'imagePath' => '/media/projects/' . $image['jobmdFileName'],
				'imageName' => $image['jobmdFileName']
			);
		}
		$this->smarty->assign('media', $workorderImages);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assignContentTemplate('workorders/wo_main2');
		$this->smarty->assign('CONTENT', 'workorders/CloseWO.tpl');
		$this->smarty->view();
	}
	public function CloseoutWO($pid)

	{
		$allowed_roles = array(
			1,
			2,
			3,
			6
		); //admin office and job managers
		$this->checkRoleAccess($allowed_roles);
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jnotNote', 'Proposal Reminder Message', 'xss_clean');
		$this->form_validation->set_rules('cnotEmailTitle', 'Proposal Reminder Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('cnotNoteSender', 'Email From', 'required|valid_email');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOPreview/' . $pid, 'refresh');
		}
		else
		{
			$result = $this->M_Workorders->_CloseWorkOrder($pid);
			$images = $this->input->post('cnotSelectedImage');
			if ($images != '')
			{
				$checkForImages = $this->M_Workorders->_getSelectedImages($pid, $images);
			}
			if ($checkForImages != '')
			{
				$this->load->library('email');
				$config = array(
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'priority' => '1',
					'protocol' => 'smtp',
					'smtp_host' => 'smtp.sendgrid.net',
					'smtp_user' => 'apikey',
					'smtp_pass' => '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',
					'smtp_port' => 587,
					'crlf' => "\r\n",
					'newline' => "\r\n"
				);
				$this->email->initialize($config);
				foreach($checkForImages as $image)
				{
					foreach($image as $imageName)
					{
						$this->email->attach($_SERVER["DOCUMENT_ROOT"] . '/media/projects/' . $imageName["jobmdFileName"]);
					}
				}
				$from = $this->input->post('cnotNoteSender');
				$to = $this->input->post('cnotSendNoteTo');
				$title = $this->input->post('cnotEmailTitle');
				$message = $this->input->post('jnotNote');
				$data = array(
					'message_body' => $message
				);
				$body = $this->load->view('emails/emailTemplate.php', $data, TRUE);
				$this->email->message($body);
				$this->email->to($to);
				$this->email->from($from);
				$this->email->subject($title);
				$this->email->send();
				$this->M_Workorders->closeAllJobsInWorkorder($pid);
				$this->session->set_flashdata('msg', "Your Email Was Sent With Images");
				redirect($this->WEBCONFIG['webStartPage'] . 'dashboard', 'refresh');
			}
			else
			{
				$this->load->library('email');
				$config = array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => '1',
					'protocol' => 'smtp',
					'smtp_host' => 'smtp.sendgrid.net',
					'smtp_user' => 'apikey',
					'smtp_pass' => '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',
					'smtp_port' => 587,
					'crlf' => "\r\n",
					'newline' => "\r\n"
				);
				$this->email->initialize($config);
				$from = $this->input->post('cnotNoteSender');
				$to = $this->input->post('cnotSendNoteTo');
				$title = $this->input->post('cnotEmailTitle');
				$message = $this->input->post('jnotNote');
				$data = array(
					'message_body' => $message
				);
				$body = $this->load->view('emails/emailTemplate.php', $data, TRUE);
				$this->email->message($body);
				$this->email->to($to);
				$this->email->from($from);
				$this->email->subject($title);
				$this->email->send();
				$this->M_Workorders->closeAllJobsInWorkorder($pid);
				$this->session->set_flashdata('msg', "Your Email Was Sent");
				redirect($this->WEBCONFIG['webStartPage'] . 'WOPreview/' . $pid, 'refresh');
			}
			$this->session->set_flashdata('msg', "Your Email Didn't Send, There Was An Issue With Your Data");
			redirect($this->WEBCONFIG['webStartPage'] . 'dashboard', 'refresh');
		}
	}
	public function proposalEmailTemplate()

	{
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Work Order Emails</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		$this->smarty->assignContentTemplate('workorders/wo_main3');
		$this->smarty->assign('CONTENT', 'workorders/proposalEmailTemplate.tpl');
		$this->smarty->view();
	}
	public function saveProposalEmailTemplate()

	{
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jnotNote', 'Proposal Reminder Message', 'xss_clean|required');
		$this->form_validation->set_rules('emailTemplateSubject', 'Proposal Reminder Title', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/proposalEmailTemplate', 'refresh');
		}
		else
		{
			$title = $this->input->post('emailTemplateSubject');
			$message = $this->input->post('jnotNote');
			$this->M_Workorders->_saveProposalEmailTemplate($title, $message);
			$this->session->set_flashdata('msg', "Your Reminder has been set");
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/proposalEmailTemplate', 'refresh');
		}
	}
	public function clientReminder($pid, $edit = null)

	{
		$this->smarty->assign('note_id', $edit);
		$this->smarty->assignContentTemplate('projects/po_main');
		// default a breadcrumb and page title
		$breadcrumb = '<li><a href="' . $this->WEBCONFIG['webStartPage'] . 'dashboard">Home</a></li><li>Proposal Notes</li>';
		$this->smarty->assign('BREADCRUMB', $breadcrumb);
		$this->smarty->assignPageTitle('3D Paving Application');
		// get current detail data
		$proposal = $this->M_Workorders->_getProposal($pid);
		$services = $this->M_Workorders->_getPOServices($pid);
		$this->smarty->assign('services', $services);
		$pmedia = $this->M_Workorders->_getMedia($pid);
		$this->smarty->assign('pmedia', $pmedia);
		$pnotelist = $this->M_Workorders->_getProjectNotes($pid);
		$this->smarty->assign('pnotelist', $pnotelist);
		$notelist = $this->M_Workorders->_getContactNotes($proposal['clientid']);
		$this->smarty->assign('notelist', $notelist);
		$this->smarty->assign('cntId', $proposal['clientid']);
		$dStart = date_create($proposal['jobCreatedDateTime']);
		$dEnd = date_create($this->CurrentDate);
		$dDiff = $dStart->diff($dEnd);
		$old = $dDiff->format('%R'); // use for point out relation: smaller/greater
		$age = $dDiff->days;
		$lastContact = $this->M_Workorders->_getLastContact($proposal['clientid']); //get last note for this client may oer may not be about this proposal
		$notes = $this->M_Workorders->_getProjectNotes($pid, null);
		$this->smarty->assign('notes', $notes);
		$templates = $this->M_Workorders->_getEmailTemplates();
		$this->smarty->assign('templates', $templates);
		$this->smarty->assign('edit', $edit);
		$this->smarty->assign('proposal', $proposal);
		$this->smarty->assign('lastContact', $lastContact);
		$this->smarty->assign('old', $old);
		$this->smarty->assign('age', $age);
		$this->smarty->assign('pid', $pid);
		$this->smarty->assignContentTemplate('projects/po_main2');
		$this->smarty->assign('CONTENT', 'workorders/clientReminder.tpl');
		$this->smarty->view();
	}
	public function saveProposalEmailReminder($pid)

	{
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jnotEmailTemplate', 'Proposal Reminder Message', 'xss_clean');
		$this->form_validation->set_rules('ishot', 'Proposal Reminder Title', 'trim|xss_clean');
		$this->form_validation->set_rules('jnotNote', 'Proposal Email Extra Notes', 'trim|xss_clean');
		$this->form_validation->set_rules('cnotNoteSender', 'Proposal Sender', 'trim|required|xss_clean');
		$this->form_validation->set_rules('cnotSendNoteTo', 'Proposal Receiver', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please make sure that all inputs are put entered correctly');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/clientReminder/' . $pid, 'refresh');
		}
		else
		{
			$template = $this->input->post('jnotEmailTemplate');
			$ishot = $this->input->post('ishot');
			$message = $this->input->post('jnotNote');
			$from = $this->input->post('cnotNoteSender');
			$to = $this->input->post('cnotSendNoteTo');
			$date = date('Y-m-d');
			$this->M_Workorders->_saveProposalEmailMessage($template, $ishot, $message, $from, $to, $pid, $date);
			$this->session->set_flashdata('msg', "Your Reminder has been set");
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/clientReminder/' . $pid, 'refresh');
		}
	}
	public function sendProposalEmailMessages()

	{
		$appointments = $this->M_Workorders->_getEmailsForProposals();
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
				'smtp_user' => 'apikey',
				'smtp_pass' => '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',
				'smtp_port' => 587,
				'crlf' => "\r\n",
				'newline' => "\r\n"
			);
			$this->email->initialize($config);
			foreach($appointments as $appointmentGroup)
			{
				foreach($appointmentGroup as $appointment)
				{
					$this->email->set_newline("\r\n");
					$this->email->to($appointment->emailTo);
					$this->email->from($appointment->emailFrom);
					$this->email->subject($appointment->title);
					$message = $appointment->body;
					if (strpos($message, "[client_name]"))
					{
						$message = str_replace("[client_name]", ucfirst(strtolower(strtok($appointment->jobPrimaryContact, " "))) , $message);
					}
					if (strpos($message, "[project_description]"))
					{
						$message = str_replace("[project_description]", $appointment->jordName, $message);
					}
					if (strpos($message, "[todays_date]"))
					{
						$message = str_replace("[todays_date]", date("F j, Y") , $message);
					}
					if (strpos($message, "[custom_message]"))
					{
						$message = str_replace("[custom_message]", $appointment->customMessage, $message);
					}
					$data = array(
						'message_body' => $message
					);
					$body = $this->load->view('emails/emailTemplate.php', $data, TRUE);
					$this->email->message($body);
					$this->email->send();
				}
			}
		}
	}
	public function sendWOEmail($id)

	{
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cnotNoteSender', 'From Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('cnotSendNoteTo', 'To Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('emailMessage', 'Message', 'required|xss_clean');
		$this->form_validation->set_rules('emailSubject', 'Subject', 'required|xss_clean');
		$this->form_validation->set_rules('cnotNoteSenderName', 'Subject', 'required|xss_clean');
		$this->form_validation->set_rules('userID', 'User', 'required|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg', 'Please enter there is an email address tied to the customer that the project is for');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOClient/' . $id, 'refresh');
		}
		else
		{
			$user_id = $this->input->post('userID');
			$employeeData = $this->M_Workorders->_getEmployeeDetails($user_id);
			$clientsData = $this->M_Workorders->_getClientDataForEmail($id);
			$this->load->library('email');
			$this->load->helper('url');
			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.sendgrid.net',
				'smtp_user' => 'apikey',
				'smtp_pass' => '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',
				'smtp_port' => 587,
				'crlf' => "\r\n",
				'newline' => "\r\n"
			);
			$this->email->initialize($config);
			foreach($clientsData as $data)
			{
				$this->email->set_newline("\r\n");
				$from = $this->input->post('cnotNoteSender');
				$username = $this->input->post('cnotNoteSenderName');
				$subject = $this->input->post('emailSubject');
				$message = $this->input->post('emailMessage');
				$this->email->to('cnotSendNoteTo');
				$this->email->from($from);
				foreach($employeeData as $e)
				{
					if (!empty($e->cntPrimaryEmail))
					{
						$message = str_replace("[sender-email]", $e->cntPrimaryEmail, $message);
					}
					else
					{
						$message = str_replace("[sender-email]", '', $message);
					}
					if (strpos($message, "[sender-phone]"))
					{
						if (!empty($e->cntPrimaryPhone))
						{
							$message = str_replace("[sender-phone]", $e->cntPrimaryPhone, $message);
						}
						else
						{
							$message = str_replace("[sender-phone]", '', $message);
						}
					}
				}
				if (strpos($message, "[client-first-name]"))
				{
					$message = str_replace("[client-first-name]", ucfirst(strtolower(strtok($data->jobPrimaryContact, " "))) , $message);
				}
				if (strpos($message, "[date-of-service]"))
				{
					$message = str_replace("[date-of-service]", $data->jordStartDate, $message);
				}
				if (strpos($message, "[sender-name]"))
				{
					$message = str_replace("[sender-name]", $username, $message);
				}
				$emailMessage = array(
					'message_body' => $message
				);
				$body = $this->load->view('emails/emailTemplate.php', $emailMessage, TRUE);
				$this->email->message($body);
				$this->email->subject($subject);
				$this->email->send();
			}
			$this->session->set_flashdata('msg', 'Message Sent');
			redirect($this->WEBCONFIG['webStartPage'] . 'workorders/WOClient/' . $id, 'refresh');
		}
	}
	
	public function getTemplates($id)
	{
		$templates = $this->M_Workorders->_workorderEmails($id);
		$this->output->set_content_type('application/json')->set_output(json_encode($templates));
	}
}
