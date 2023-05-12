<?php
class M_Workorders Extends CI_Model

{
	public function _getWorkOrder($wid)

	{
		$tablename = 'POTblJobOrders p';
		$keyfield = 'p.jobID';
		$join = array(
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobcntID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId', //primary contact
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId', //proposal created by
			'LEFT JOIN crmTblContacts b ON p.jobSalesManagerAssigned = b.cntId', //sales manager linked to proposal
			'LEFT JOIN crmTblContacts c ON p.jobSalesAssigned = c.cntId', //sales person assigned
			'LEFT JOIN crmTblContacts d ON p.jobApprovedBy = d.cntId', // job approved by
			'LEFT JOIN crmTblContacts u ON p.jobLastUpdatedBy = u.cntId', // who last touched the job
			'LEFT JOIN dataLkpOrderStatus s ON p.jobStatus = s.ordStatusID',
		);
		$fields = array(
			'p.jobID',
			'p.jobMasterID',
			'p.jobcntID',
			'p.jobManagerID',
			'p.jobCommunityID',
			// billing address
			'p.jobBillingAddress1',
			'p.jobBillingAddress2',
			'p.jobBillingState',
			'p.jobBillingCity',
			'p.jobBillingZip',
			// job site location
			'p.jobAddress1',
			'p.jobAddress2',
			'p.jobState',
			'p.jobCity',
			'p.jobZip',
			'p.jobParcel',
			// job details
			'p.jobName',
			'p.jobStatus',
			'p.jobApprovedBy',
			'p.jobApproved',
			'p.jobRejectedBy',
			'p.jobRejectedDate',
			'p.jobRejectedReason',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobNTO',
			'p.jobPermit',
			'p.jobPrimaryContact',
			'p.jobPrimaryEmail',
			'p.jobApprovedDate',
			'p.jobCreatedBy',
			'p.jobCreatedDateTime',
			'p.jobSalesManagerAssigned',
			'p.jobSalesAssigned',
			'p.JobLastUpdated',
			'p.jobLastUpdatedBy',
			'p.jobDiscount',
			'p.jobProposalPDF',
			// property manager
			'manager.cntFirstName as managerFirst',
			'manager.cntLastName as managerLast',
			// community
			'community.cntFirstName as communityFirst',
			'community.cntLastName as communityLast',
			// created by
			'm.cntFirstName',
			'm.cntLastName',
			// client
			'a.cntId as clientid',
			'a.cntFirstName as clientfirst',
			'a.cntLastName as clientlast',
			'a.cntPrimaryEmail',
			'a.cntPrimaryPhone',
			'a.cntPrimaryAddress1',
			'a.cntPrimaryAddress2',
			'a.cntPrimaryState',
			'a.cntPrimaryCity',
			'a.cntPrimaryZip',
			'a.cntParcelNumber',
			// manager
			'b.cntFirstName as salesmanagerfirst',
			'b.cntLastName as salesmanagerlast',
			// lastUpdate
			'u.cntFirstName as updaterfirst',
			'u.cntLastName as updaterlast',
			// sales
			'c.cntFirstName as salesfirst',
			'c.cntLastName as saleslast',
			// approver
			'd.cntFirstName as approvefirst',
			'd.cntLastName as approvelast',
			's.ordStatus',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobMOTSentDatetime',
			'p.jobMOTSentBy',
			'p.jobNTOSentDatetime',
			'p.jobNTOSentBy',
		);
		// proposals have jobMasterID = 0
		$where = 'p.jobID =' . $pid;
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _createProposal($id)

	{
		$items = array(
			'tableName' => 'crmTblContacts',
			'fields' => array(
				'*',
			) ,
			'where' => 'cntId =' . $id,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$jobName = $this->validate->post('jobName', 'TEXT');
		$jobNTO = 0;
		if ($this->input->post('jobNTO') == 1)
		{
			$jobNTO = 1;
		}
		$jobPermit = 0;
		if ($this->input->post('jobPermit') == 1)
		{
			$jobPermit = 1;
		}
		$data['jobcntID'] = $id; //who is proposal for
		$data['jobPrimaryContact'] = $rows['cntAltContactName'];
		$data['jobPrimaryEmail'] = $rows['cntPrimaryEmail'];
		$data['jobPrimaryPhone'] = $rows['cntPrimaryPhone'];
		$data['jobAltPhone'] = $rows['cntAltPhone1'];
		$data['jobAddress1'] = $rows['cntPrimaryAddress1'];
		$data['jobAddress2'] = $rows['cntPrimaryAddress2'];
		$data['jobState'] = $rows['cntPrimaryState'];
		$data['jobCity'] = $rows['cntPrimaryCity'];
		$data['jobZip'] = $rows['cntPrimaryZip'];
		$data['jobName'] = $jobName;
		$data['jobNTO'] = $jobNTO;
		$data['jobPermit'] = $jobPermit;
		$data['jobCreatedBy'] = $this->USER_ID;
		$data['jobCreatedDateTime'] = date('Y-m-d h:i:s');
		$items = array(
			'tableName' => ' POTblJobOrders',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}

	public function _duplicateProposal($id)

	{

		$items = array(
			'tableName' => 'POTblJobOrders',
			'fields' => array(
				'*',
			) ,
			'where' => 'jobID =' . $id,
		);
		$rows = $this->dbpdo->getOne($items);
		
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}

		$fields = array(
			'jordStatus',
			'jordJobID',
			'jordName',
			'jordSort',
			'jordServiceID',
			// job site location
			'jordAddress1',
			'jordAddress2',
			'jordState',
			'jordCity',
			'jordZip',
			'jordParcel',
			'jordCustomNote',
			'jordStripingVendor',
			'jordProposalText',
			'jordCostPerDay',
			'jordDays',
			'jordVendorID',
			'jordVendorServiceDescription ',
			'jordCostPerLF',
			'jordLinearFeet',
			'jordSquareFeet',
			'jordCubicYards',
			'jordTons',
			'jordLoads',
			'jordSQYards',
			'jordLocations',
			'jordDepthInInches',
			'jordProfit',
			'jordPhases',
			'jordBreakeven',
			'jordYield',
			'jordPrimer',
			'jordFastSet',
			'jordSand',
			'jordAdditive',
			'jordSealer',
			'jordNote',
			'jordOverhead',
			'jordCost',
			'jordJobManagerID',
			'jordJobManagerID2',
			'jordStartDate',
			'jordEndDate',
			'jordScheduledBy',
			'jordUpdatedBy',
			'jordUpdatedDate'
		);
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'fields' => $fields,
			'where' => 'jordJobID =' . $id,
		);
		if (false === ($details = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		
		
		
		
		$jobName = $this->validate->post('jobName', 'TEXT');
		$jobNTO = 0;
		if ($this->input->post('jobNTO') == 1)
		{
			$jobNTO = 1;
		}
		$jobPermit = 0;
		if ($this->input->post('jobPermit') == 1)
		{
			$jobPermit = 1;
		}
		//$data['jobcntID'] = $id; //who is proposal for
		//$data['jobPrimaryContact'] = $rows['cntAltContactName'];
		//$data['jobPrimaryEmail'] = $rows['cntPrimaryEmail'];
		//$data['jobPrimaryPhone'] = $rows['cntPrimaryPhone'];
		$data['jobAltPhone'] = $rows['cntAltPhone1'];
		$data['jobAddress1'] = $rows['cntPrimaryAddress1'];
		$data['jobAddress2'] = $rows['cntPrimaryAddress2'];
		$data['jobState'] = $rows['cntPrimaryState'];
		$data['jobCity'] = $rows['cntPrimaryCity'];
		$data['jobZip'] = $rows['cntPrimaryZip'];
		$data['jobName'] = $rows['jobName'].' - Copy';
		$data['jobNTO'] = $rows['jobNTO'];
		$data['jobPermit'] = $rows['jobPermit'];
		$data['jobCreatedBy'] = $rows['jobCreatedBy'];
		$data['jobCreatedDateTime'] = date('Y-m-d h:i:s');
		$items = array(
			'tableName' => ' POTblJobOrders',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}

		$newid = $rows;
		
		foreach ($details as $key => $d){

			$details[$key]['jordJobID']=$rows;
			$details[$key]['jordProposalText']='';
			

		}
		

		
		$items = array(
			'tableName' => ' POTblJobOrderDetail',
			'columns'=> $fields,
			'rows' => $details
		);

		if (false === ($detrows = $this->dbpdo->insertMulti($items)))
		{
			echo $this->dbpdo->getErrorMessage();exit;
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}

		//duplicate equipment
		$fields_equip = array(
			'POequipjordID',
			'POequipEquipmentID',
			'POequipName',
			'POequipDaysNeeded',
			'POequipCost',
			'POequipMinCost',
			'POequipHoursDay',
			'POequipNumber'
		);

		$items = array(
			'tableName' => 'POTbljobOrderEquipment',
			'fields' => $fields_equip ,
			'where' => 'POequipjordID =' . $id,
		);
		$equip = $this->dbpdo->get($items);


		if($equip){
			foreach ($equip as $key => $d){

				$equip[$key]['POequipjordID']=$newid;

			}


			$items_equip = array(
				'tableName' => ' POTbljobOrderEquipment',
				'columns'=> $fields_equip,
				'rows' => $equip
			);

			if (false === ($detrows = $this->dbpdo->insertMulti($items_equip)))
			{
				echo $this->dbpdo->getErrorMessage();exit;
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}


		//duplicate pricing
		$fields_pricing = array(
			'jobmultijordID',
			'jobmultiScatID',
			'jobmultiQuantity',
			'jobmultiCost',
			'jobmultiSERVICE_DESC',
			'jobmultiSERVICE'
		);
		$items = array(
			'tableName' => 'POTbljobOrderMultiPricing',
			'fields' => $fields_pricing ,
			'where' => 'jobmultijordID =' . $id,
		);
		$pricings = $this->dbpdo->get($items);
		if($pricings){
			foreach ($pricings as $key => $d){

				$pricings[$key]['jobmultijordID']=$newid;
				$pricings[$key]['jobmultiSERVICE_DESC']=str_replace("'","//",$pricings[$key]['jobmultiSERVICE_DESC']);


			}
			$items_pricing = array(
				'tableName' => ' POTbljobOrderMultiPricing',
				'columns'=> $fields_pricing,
				'rows' => $pricings
			);

			if (false === ($detrows = $this->dbpdo->insertMulti($items_pricing)))
			{
				echo $this->dbpdo->getErrorMessage();exit;
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}






		
		return $rows;
	}

	public function _getWOEquipment($sid) //get all equipment

	{
		$fields = array(
			'*'
		);
		$join = array(
			'JOIN dataTblEquipment a ON p.POequipEquipmentID = a.equipID',
		);
		$items = array(
			'tableName' => 'WOTbljobOrderEquipment p',
			'join' => $join,
			'where' => 'POequipjordID =' . $sid . ' AND POequipFinal = 0',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOEquipmentEST($sid) //get all equipment

	{
		$fields = array(
			'*'
		);
		$join = array(
			'JOIN dataTblEquipment a ON p.POequipEquipmentID = a.equipID',
		);
		$items = array(
			'tableName' => 'WOTbljobOrderEquipment p',
			'join' => $join,
			'where' => 'POequipjordID =' . $sid . ' AND POequipFinal = 1',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOEquipmentDate($rdate) //get all equipment

	{
		$fields = array(
			'*'
		);
		$join = array(
			'JOIN dataTblEquipment a ON p.POequipEquipmentID = a.equipID',
		);
		$items = array(
			'tableName' => 'WOTbljobOrderEquipment p',
			'join' => $join,
			'where' => 'POequipDate ="' . $rdate . '" AND POequipFinal = 0',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getServiceEquipment($sid) //get all equipment

	{
		$items = array(
			'tableName' => 'POTbljobOrderEquipment',
			'where' => 'POequipjordID =' . $sid,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _deletePOEquipment($id) //delete this vehicle on po

	{
		$items = array(
			'tableName' => 'POTbljobOrderEquipment',
			'where' => 'POequipID =' . $id,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _addPOEquipment($sid)

	{
		$items = array(
			'tableName' => 'dataTblEquipment',
			'fields' => array(
				'*',
			) ,
			'where' => 'equipID =' . $this->input->post('POequipEquipmentID') ,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$data = array();
		$data['POequipjordID'] = $sid;
		$data['POequipEquipmentID'] = $this->input->post('POequipEquipmentID');
		$data['POequipDaysNeeded'] = $this->input->post('POequipDaysNeeded');
		$data['POequipNumber'] = $this->input->post('POequipNumber');
		$data['POequipHoursDay'] = $this->input->post('POequipHoursDay');
		$data['POequipRate'] = $rows['equipRate'];
		$data['POequipCost'] = $rows['equipCost'];
		$data['POequipMinCost'] = $rows['equipMinCost'];
		$data['POequipName'] = $rows['equipName'];
		$items = array(
			'tableName' => 'POTbljobOrderEquipment',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getServiceOther($sid) //get all othjer fees for this service item

	{
		$items = array(
			'tableName' => 'POTblJobOrderAdditionalCosts',
			'where' => 'jobcostjordID =' . $sid,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _deleteWOMaterial($id)

	{
		$items = array(
			'tableName' => 'WOTbljobOrderMaterials',
			'where' => 'womatID =' . $id,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOMaterials($sid)

	{
		$join = array(
			'JOIN dataTblMaterials a ON p.womatMatID = a.matID',
			'LEFT JOIN crmTblContacts c ON p.womatVendorID = c.cntId',
		);
		$fields = array(
			'a.*',
			'p.*',
			'c.cntFirstName',
			'c.cntLastName'
		);
		$items = array(
			'tableName' => 'WOTbljobOrderMaterials p',
			'join' => $join,
			'fields' => $fields,
			'where' => 'womatjordID =' . $sid . ' AND womatFinal = 0',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOMaterialsEST($sid)

	{
		$join = array(
			'JOIN dataTblMaterials a ON p.womatMatID = a.matID',
			'LEFT JOIN crmTblContacts c ON p.womatVendorID = c.cntId',
		);
		$fields = array(
			'a.*',
			'p.*',
			'c.cntFirstName',
			'c.cntLastName'
		);
		$items = array(
			'tableName' => 'WOTbljobOrderMaterials p',
			'join' => $join,
			'fields' => $fields,
			'where' => 'womatjordID =' . $sid . ' AND womatFinal = 1f',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOMaterialsDate($rdate)

	{
		$join = array(
			'JOIN dataTblMaterials a ON p.womatMatID = a.matID',
			'LEFT JOIN crmTblContacts c ON p.womatVendorID = c.cntId',
		);
		$fields = array(
			'a.*',
			'p.*',
			'c.cntFirstName',
			'c.cntLastName'
		);
		$items = array(
			'tableName' => 'WOTbljobOrderMaterials p',
			'join' => $join,
			'fields' => $fields,
			'where' => 'womatDate ="' . $rdate . '" AND womatFinal = 0',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOOther($sid) //get all othjer fees for this service item

	{
		$items = array(
			'tableName' => 'WOTblJobOrderAdditionalCosts',
			'where' => 'jobcostjordID =' . $sid . ' AND jobcostFinal = 0',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOOtherEST($sid) //get all othjer fees for this service item

	{
		$items = array(
			'tableName' => 'WOTblJobOrderAdditionalCosts',
			'where' => 'jobcostjordID =' . $sid . ' AND jobcostFinal = 1',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOOtherDate($rdate) //get all othjer fees for this service item

	{
		$items = array(
			'tableName' => 'WOTblJobOrderAdditionalCosts',
			'where' => 'jobcostDate ="' . $rdate . '" AND jobcostFinal = 0',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _deletePOOther($id) //delete this other on  po item

	{
		$items = array(
			'tableName' => 'POTblJobOrderAdditionalCosts',
			'where' => 'jobcostID =' . $id,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _deleteWOOther($id) //delete this other on  po item

	{
		$items = array(
			'tableName' => 'WOTblJobOrderAdditionalCosts',
			'where' => 'jobcostID =' . $id,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _markPOUpdated($pid)

	{
		$data['JobLastUpdatedBy'] = $this->USER_ID;
		$data['JobLastUpdated'] = $this->CurrentDate;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _woSendToBilling($pid)

	{
		$data['JobLastUpdatedBy'] = $this->USER_ID;
		$data['JobLastUpdated'] = $this->CurrentDate;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updateStripingVendor($sid, $vendorid)

	{
		$data = array();
		$data['jordStripingVendor'] = $vendorid;
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $data,
			'where' => 'jordID = :ID',
			'params' => array(
				'ID' => $sid
			) ,
		);
		if (false === $this->dbpdo->update($items))
		{
			return array(
				'error' => 'Error updating .....<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		return $sid;
	}
	public function _savePOservices($sid)

	{
		$serviceData = $this->dbpdo->createFieldArrayFromPOST('POTblJobOrderDetail');
		if (empty($serviceData['jordAdditive']))
		{
			$serviceData['jordAdditive'] = 0;
		}
		if ($serviceData['jordServiceID'] == 17 && $serviceData['jordAdditive'] == 0) //sub contractor get overhead from their record
		{
			// get crm data  	jordVendorID
			$items = array(
				'tableName' => 'crmTblContacts',
				'fields' => 'cntOverHead',
				'where' => 'cntId = :ID',
				'params' => array(
					'ID' => $serviceData['jordVendorID']
				) ,
			);
			if (false === ($rows = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			$serviceData['jordAdditive'] = $rows['cntOverHead'];
		}
		if ($serviceData['jordServiceID'] == 2 && $serviceData['jordAdditive'] == 0)
		{
			$serviceData['jordAdditive'] = $this->validate->post('rockcost', "FLOAT");
		}
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $serviceData,
			'where' => 'jordID = :ID',
			'params' => array(
				'ID' => $sid
			) ,
		);
		if (false === $this->dbpdo->update($items))
		{
			return array(
				'error' => 'Error updating .....<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		return $sid;
	}
	public function _deletePOStripng($sid)

	{
		// ok now delete any existing po striping data
		$items = array(
			'tableName' => 'POTbljobOrderMultiPricing',
			'where' => 'jobmultijordID = :ID',
			'params' => array(
				'ID' => $sid
			) ,
		);
		if (false === $this->dbpdo->delete($items))
		{
			return array(
				'error' => 'Error updating .....<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		return $sid;
	}
	public function _savePOStripng($sid, $scatid, $service, $service_desc, $quantity, $cost)

	{
		$data = array();
		$data['jobmultijordID'] = $sid;
		$data['jobmultiScatID'] = $scatid;
		$data['jobmultiQuantity'] = $quantity;
		$data['jobmultiCost'] = $cost;
		$data['jobmultiSERVICE_DESC'] = $service_desc;
		$data['jobmultiSERVICE'] = $service;
		$items = array(
			'tableName' => 'POTbljobOrderMultiPricing',
			'data' => $data,
		);
		if (false === $this->dbpdo->insert($items))
		{
			return array(
				'error' => 'Error updating .....<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		return $sid;
	}
	public function _getWODaily($sid)

	{
		$items = array(
			'tableName' => 'WOTbljobOrderNightly',
			'where' => 'womjordID =' . $sid,
		);
		$result = $this->dbpdo->get($items);
		if (!$result)
		{
			return array(
				'error' => 'Error updating .....<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		return $result;
	}
	public function _saveWODaily($sid)

	{
		$womjordID = $this->input->post('womjordID');
		$womDate = $this->input->post('womDate');
		$date = new DateTime($womDate);
		$womDate = $date->format('Y-m-d');
		$womCheckRemoveEquipment = $this->validate->post('womCheckRemoveEquipment', "INTEGER");
		$womCheckRemoveTools = $this->validate->post('womCheckRemoveTools', "INTEGER");
		$womCheckRefill = $this->validate->post('womCheckRefill', "INTEGER");
		$womCheckTruck = $this->validate->post('womCheckTruck', "INTEGER");
		$womNote = $this->validate->post('womNote', "TEXT", FALSE);
		$data = array();
		$data['womjordID'] = $womjordID;
		$data['womDate'] = $womDate;
		$data['womjordID'] = $womjordID;
		$data['womCheckRemoveEquipment'] = $womCheckRemoveEquipment;
		$data['womCheckRemoveTools'] = $womCheckRemoveTools;
		$data['womCheckRefill'] = $womCheckRefill;
		$data['womCheckTruck'] = $womCheckTruck;
		$data['womNote'] = $womNote;
		$data['womCreatedby'] = $this->USER_ID;
		$items = array(
			'tableName' => 'WOTbljobOrderNightly',
			'data' => $data,
		);
		$result = $this->dbpdo->insert($items);
		if (!$result)
		{
			return array(
				'error' => 'Error updating .....<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		return $result;
	}
	public function _removePOService($sid)

	{
		$where = "jordID =" . $sid;
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// equipment
		$where = "POequipjordID =" . $sid;
		$items = array(
			'tableName' => 'POTbljobOrderEquipment',
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// subs
		$where = "posubjordID =" . $sid;
		$items = array(
			'tableName' => 'POTbljobOrderSubContractors',
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// vehicle
		$where = "POVjordID =" . $sid;
		$items = array(
			'tableName' => 'POTbljobOrderVehicles',
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// labor
		$where = "POlaborjordID =" . $sid;
		$items = array(
			'tableName' => 'POTbljobOrderLabor',
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$where = "jobcostjordID =" . $sid;
		$items = array(
			'tableName' => 'POTblJobOrderAdditionalCosts',
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$where = "jobmultijordID =" . $sid;
		$items = array(
			'tableName' => 'POTbljobOrderMultiPricing',
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _removePOSub($id)

	{
		$where = "posubID =" . $id;
		$items = array(
			'tableName' => 'POTbljobOrderSubContractors',
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _addPOSub($sid)

	{
		$data = array();
		$data['posubHaveBid'] = 0;
		$data['posubjordID'] = $sid;
		$data['posubDescription'] = $this->validate->post('posubDescription', 'TEXT');
		$data['posubOverHead'] = $this->validate->post('posubOverHead', 'SAFETEXT');
		$data['posubCost'] = $this->validate->post('posubCost', 'SAFETEXT');
		$data['posubVendorID'] = $this->validate->post('posubVendorID', 'INTEGER');
		if ($this->input->post('posubHaveBid') == 1)
		{
			$data['posubHaveBid'] = 1;
		}
		$items = array(
			'tableName' => 'POTbljobOrderSubContractors',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _addWOOther($sid, $final = null) // ad labor to po item

	{
		$jobcostFinal = 0;
		if ($final)
		{
			$jobcostFinal = 1;
		}
		$data = array();
		$data['jobcostjordID'] = $sid;
		$data['jobcostFinal'] = $jobcostFinal;
		$data['jobcostDescription'] = $this->validate->post('jobcostDescription', 'TEXT');
		$data['jobcostAmount'] = $this->validate->post('jobcostAmount', 'SAFETEXT');
		$date = new DateTime($this->input->post('jobcostDate'));
		$jobcostDate = $date->format('Y-m-d');
		$data['jobcostDate'] = $jobcostDate;
		$data['jobcostCreatedBy'] = $this->USER_ID;
		$items = array(
			'tableName' => 'WOTblJobOrderAdditionalCosts',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _addPOOther($sid) // ad labor to po item

	{
		$data = array();
		$data['jobcostjordID'] = $sid;
		$data['jobcostDescription'] = $this->validate->post('jobcostDescription', 'TEXT');
		$data['jobcostAmount'] = $this->validate->post('jobcostAmount', 'SAFETEXT');
		$data['jobcostTitle'] = $this->validate->post('jobcostTitle', 'SAFETEXT');
		$items = array(
			'tableName' => 'POTblJobOrderAdditionalCosts',
			'data' => $data,
		);

		//POTbljobOrderMultiPricing

		/*$items = array(
			'tableName' => 'POTbljobOrderMultiPricing',
			'fields' => 'MAX(jobmultiScatID)+1 as scatID',
			'where' => "jobmultijordID =" . $sid . " and jobmultiSERVICE='Miscellaneous'",
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			$scatID = 1;
		}
		else {
			$scatID= $rows[0]['scatID'];
		}

		

		$data = array();
		$data['jobmultijordID'] = $sid;
		$data['jobmultiScatID'] = $scatID;
		$data['jobmultiSERVICE_DESC'] = $this->validate->post('jobcostDescription', 'TEXT');
		$data['jobmultiCost'] = $this->validate->post('jobcostAmount', 'SAFETEXT');
		$data['jobmultiSERVICE'] = 'Miscellaneous';
		$items = array(
			'tableName' => 'POTbljobOrderMultiPricing',
			'data' => $data,
		);*/
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOLabor($sid) //get all labor for this service item

	{
		$join = array(
			'JOIN crmTblContacts a ON p.POEmpID = a.cntId',
		);
		$fields = array(
			'a.cntFirstName',
			'a.cntLastName',
			'p.*'
		);
		$items = array(
			'tableName' => 'WOTbljobOrderLabor p',
			'fields' => $fields,
			'join' => $join,
			'where' => 'POlaborjordID =' . $sid . ' AND POlaborFinal = 0',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOLaborEST($sid) //get all labor for this service item

	{
		$join = array(
			'JOIN crmTblContacts a ON p.POEmpID = a.cntId',
		);
		$fields = array(
			'a.cntFirstName',
			'a.cntLastName',
			'p.*'
		);
		$items = array(
			'tableName' => 'WOTbljobOrderLabor p',
			'fields' => $fields,
			'join' => $join,
			'where' => 'POlaborjordID =' . $sid . ' AND POlaborFinal = 1',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOLaborDate($rdate) //get all labor for this service item

	{
		$join = array(
			'JOIN crmTblContacts a ON p.POEmpID = a.cntId',
		);
		$fields = array(
			'a.cntFirstName',
			'a.cntLastName',
			'p.*'
		);
		$items = array(
			'tableName' => 'WOTbljobOrderLabor p',
			'fields' => $fields,
			'join' => $join,
			'where' => 'POlaborDate ="' . $rdate . '" AND POlaborFinal = 0',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getServiceLabor($sid) //get all labor for this service item

	{
		$items = array(
			'tableName' => 'POTbljobOrderLabor',
			'where' => 'POlaborjordID =' . $sid,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _deletePOLabor($id) //delete this labor on  po item

	{
		$items = array(
			'tableName' => 'POTbljobOrderLabor',
			'where' => 'POlaborID =' . $id,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _addWOLabor($sid, $final = null)

	{
		$POlaborFinal = 0;
		if ($final)
		{
			$POlaborFinal = 1;
		}
		$POlaborDate = $this->input->post('POlaborDate');
		$date = new DateTime($POlaborDate);
		$POlaborDate = $date->format('Y-m-d');
		$data = array();
		$data['POlaborjordID'] = $sid;
		$data['POlaborFinal'] = $POlaborFinal;
		$data['POEmpID'] = $this->input->post('POEmpID');
		$data['POlaborEndTime'] = $this->input->post('POlaborEndTime');
		$data['POlaborStartTime'] = $this->input->post('POlaborStartTime');
		$data['POlaborDate'] = $POlaborDate;
		$data['POlaborCreatedBy'] = $this->USER_ID;
		$items = array(
			'tableName' => 'WOTbljobOrderLabor',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _deleteWOLabor($id)

	{
		$items = array(
			'tableName' => 'WOTbljobOrderLabor',
			'where' => 'POlaborID =' . $id,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _addPOLabor($sid) // ad labor to po item

	{
		$items = array(
			'tableName' => 'dataLkpWorkerRates',
			'fields' => array(
				'*',
			) ,
			'where' => 'rateID =' . $this->input->post('POlaborRateID') ,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$data = array();
		$data['POlaborjordID'] = $sid;
		$data['POlaborRateID'] = $this->input->post('POlaborRateID');
		$data['POlaborDaysNeeded'] = $this->input->post('POlaborDaysNeeded');
		$data['POlaborNumber'] = $this->input->post('POlaborNumber');
		$data['POlaborHoursDay'] = $this->input->post('POlaborHoursDay');
		$data['POlaborRate'] = $rows['rateAmount'];
		$data['POlaborName'] = $rows['rateName'];
		$items = array(
			'tableName' => 'POTbljobOrderLabor',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getServiceVehicles($sid) //get all vehicles for this service item

	{
		$items = array(
			'tableName' => 'POTbljobOrderVehicles',
			'where' => 'POVjordID =' . $sid,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOVehicles($sid) //get all vehicles for this service item

	{
		$fields = array(
			'*'
		);
		$join = array(
			'JOIN dataTblCompanyVehicles a ON p.POVvehicleID = a.vehicleID',
		);
		$items = array(
			'tableName' => 'WOTbljobOrderVehicles p',
			'where' => 'POVjordID  =' . $sid . ' AND POVFinal = 0',
			'fields' => $fields,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOVehiclesEST($sid) //get all vehicles for this service item

	{
		$fields = array(
			'*'
		);
		$join = array(
			'JOIN dataTblCompanyVehicles a ON p.POVvehicleID = a.vehicleID',
		);
		$items = array(
			'tableName' => 'WOTbljobOrderVehicles p',
			'where' => 'POVjordID  =' . $sid . ' AND POVFinal = 1',
			'fields' => $fields,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOVehiclesDate($rdate) //get all vehicles for this service item

	{
		$fields = array(
			'*'
		);
		$join = array(
			'JOIN dataTblCompanyVehicles a ON p.POVvehicleID = a.vehicleID',
		);
		$items = array(
			'tableName' => 'WOTbljobOrderVehicles p',
			'where' => 'POVDate  ="' . $rdate . '" AND POVFinal = 0',
			'fields' => $fields,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOvehiclelist() // list of company vehicles

	{
		$fields = array(
			'*'
		);
		$join = array(
			'JOIN dataLkpVehicleTypes a ON p.vehicleTypeID = a.vtypeID',
		);
		$items = array(
			'tableName' => 'dataTblCompanyVehicles p',
			'where' => 'p.vehicleActive = 1',
			'fields' => $fields,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _deletePOVehicle($id) //delete this vehicle on po

	{
		$items = array(
			'tableName' => 'POTbljobOrderVehicles',
			'where' => 'POVID =' . $id,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _addPOVehicle($sid)

	{
		$items = array(
			'tableName' => 'dataLkpVehicleTypes',
			'fields' => array(
				'*',
			) ,
			'where' => 'vtypeID =' . $this->input->post('POVvehicleTypeID') ,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$data = array();
		$data['POVjordID'] = $sid;
		$data['POVvehicleTypeID'] = $this->input->post('POVvehicleTypeID');
		$data['POVDaysNeeded'] = $this->input->post('POVDaysNeeded');
		$data['POVNumber'] = $this->input->post('POVNumber');
		$data['POVHoursDay'] = $this->input->post('POVHoursDay');
		$data['POVRate'] = $rows['vtypeRate'];
		$data['POVvehicleName'] = $rows['vtypeName'];
		$items = array(
			'tableName' => 'POTbljobOrderVehicles',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _createProposal2($id)

	{
		$jobName = $this->validate->post('jobName', 'TEXT');
		$cid = $this->validate->post('cid', 'INTEGER');
		$cntParcelNumber = $this->validate->post('cntParcelNumber', 'SAFETEXT');
		$jobPrimaryContact = $this->validate->post('jobPrimaryContact', 'TEXT');
		$jobPrimaryEmail = $this->validate->post('jobPrimaryEmail', 'TEXT');
		$jobPrimaryPhone = $this->validate->post('jobPrimaryPhone', 'SAFETEXT');
		$jobAltPhone = $this->validate->post('jobAltPhone', 'SAFETEXT');
		$cntPrimaryAddress1 = $this->validate->post('cntPrimaryAddress1', 'TEXT');
		$cntPrimaryAddress2 = $this->validate->post('cntPrimaryAddress2', 'TEXT');
		$cntPrimaryState = $this->validate->post('cntPrimaryState', 'SAFETEXT');
		$cntPrimaryCity = $this->validate->post('cntPrimaryCity', 'SAFETEXT');
		$cntPrimaryZip = $this->validate->post('cntPrimaryZip', 'SAFETEXT');
		$jobNTO = 0;
		if ($this->input->post('jobNTO') == 1)
		{
			$jobNTO = 1;
		}
		$jobPermit = 0;
		if ($this->input->post('jobPermit') == 1)
		{
			$jobPermit = 1;
		}
		$data['jobParcel'] = $cntParcelNumber;
		$data['jobcntID'] = $id; //who is proposal for
		$data['jobPrimaryContact'] = $jobPrimaryContact;
		$data['jobPrimaryEmail'] = $jobPrimaryEmail;
		$data['jobPrimaryPhone'] = $jobPrimaryPhone;
		$data['jobAltPhone'] = $jobAltPhone;
		$data['jobAddress1'] = $cntPrimaryAddress1;
		$data['jobAddress2'] = $cntPrimaryAddress2;
		$data['jobState'] = $cntPrimaryState;
		$data['jobCity'] = $cntPrimaryCity;
		$data['jobZip'] = $cntPrimaryZip;
		$data['jobName'] = $jobName;
		$data['jobNTO'] = $jobNTO;
		$data['jobPermit'] = $jobPermit;
		$data['jobCreatedBy'] = $this->USER_ID;
		$data['jobCreatedDateTime'] = date('Y-m-d h:i:s');
		$items = array(
			'tableName' => ' POTblJobOrders',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _createProposal3($id) //parent id

	{
		$jobName = $this->validate->post('jobName', 'TEXT');
		$cid = $this->validate->post('cid', 'INTEGER'); //primary id
		// ok so now we get propperty manager and parcel from the property linked
		// jobCommunityID //property id
		$jobCommunityID = $this->validate->post('jobCommunityID', 'INTEGER');
		$jobPrimaryContact = $this->validate->post('jobPrimaryContact', 'TEXT');
		$jobPrimaryEmail = $this->validate->post('jobPrimaryEmail', 'TEXT');
		$jobPrimaryPhone = $this->validate->post('jobPrimaryPhone', 'SAFETEXT');
		$jobBillingCity = $this->validate->post('jobBillingCity', 'TEXT');
		$jobBillingAddress1 = $this->validate->post('jobBillingAddress1', 'TEXT');
		$jobBillingAddress2 = $this->validate->post('jobBillingAddress2', 'TEXT');
		$jobBillingState = $this->validate->post('jobBillingState', 'SAFETEXT');
		$jobBillingZip = $this->validate->post('jobBillingZip', 'SAFETEXT');
		$jobAltPhone = $this->validate->post('jobAltPhone', 'SAFETEXT');
		if ($jobCommunityID > 0)
		{
			$jobNTO = 0;
			if ($this->input->post('jobNTO') == 1)
			{
				$jobNTO = 1;
			}
			$jobPermit = 0;
			if ($this->input->post('jobPermit') == 1)
			{
				$jobPermit = 1;
			}
			// get these from property
			$items = array(
				'tableName' => ' crmTblContacts',
				'fields' => array(
					'*',
				) ,
				'where' => 'cntId = ' . $jobCommunityID,
			);
			if (false === ($result = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			$cntParcelNumber = $result['cntParcelNumber'];
			$cntPrimaryAddress1 = $result['cntPrimaryAddress1'];
			$cntPrimaryAddress2 = $result['cntPrimaryAddress2'];
			$cntPrimaryState = $result['cntPrimaryState'];
			$cntPrimaryCity = $result['cntPrimaryCity'];
			$cntPrimaryZip = $result['cntPrimaryZip'];
			$jobManagerID = $result['cntManagerId'];
			$data['jobcntID'] = $id; //who is proposal for
			$data['jobPrimaryContact'] = $jobPrimaryContact;
			$data['jobPrimaryEmail'] = $jobPrimaryEmail;
			$data['jobPrimaryPhone'] = $jobPrimaryPhone;
			$data['jobAltPhone'] = $jobAltPhone;
			$data['jobParcel'] = $cntParcelNumber;
			$data['jobManagerID'] = $jobManagerID;
			$data['jobCommunityID'] = $jobCommunityID;
			$data['jobBillingAddress1'] = $jobBillingAddress1;
			$data['jobBillingAddress2'] = $jobBillingAddress2;
			$data['jobBillingState'] = $jobBillingState;
			$data['jobBillingCity'] = $jobBillingCity;
			$data['jobBillingZip'] = $jobBillingZip;
			$data['jobAddress1'] = $cntPrimaryAddress1;
			$data['jobAddress2'] = $cntPrimaryAddress2;
			$data['jobState'] = $cntPrimaryState;
			$data['jobCity'] = $cntPrimaryCity;
			$data['jobZip'] = $cntPrimaryZip;
			$data['jobName'] = $jobName;
			$data['jobNTO'] = $jobNTO;
			$data['jobPermit'] = $jobPermit;
			$data['jobCreatedBy'] = $this->USER_ID;
			$data['jobCreatedDateTime'] = date('Y-m-d h:i:s');
			$items = array(
				'tableName' => ' POTblJobOrders',
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->insert($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			return $rows;
		}
		return array(
			'error' => "There was no property ID"
		);
	}
	public function _createProposal4($parentid, $propertyid)

	{
		$jobName = $this->validate->post('jobName', 'TEXT', FALSE);
		$pid = $this->validate->post('pid', 'INTEGER'); //primary id
		$cid = $this->validate->post('cid', 'INTEGER'); //comunity id
		$jobAddress1 = $this->validate->post('jobAddress1', 'TEXT', FALSE);
		$jobAddress2 = $this->validate->post('jobAddress2', 'TEXT', FALSE);
		$jobCity = $this->validate->post('jobCity', 'TEXT', FALSE);
		$jobState = $this->validate->post('jobState', 'TEXT', FALSE);
		$jobZip = $this->validate->post('jobZip', 'TEXT', FALSE);
		$jobBillAddress1 = $this->validate->post('jobBillingAddress1', 'TEXT', FALSE);
		$jobBillAddress2 = $this->validate->post('jobBillingAddress2', 'TEXT', FALSE);
		$jobBillState = $this->validate->post('jobBillingState', 'TEXT', FALSE);
		$jobBillCity = $this->validate->post('jobBillingCity', 'TEXT', FALSE);
		$jobBillZip = $this->validate->post('jobBillingZip', 'TEXT', FALSE);
		$jobPrimaryContact = $this->validate->post('jobPrimaryContact', 'TEXT', FALSE);
		$jobPrimaryEmail = $this->validate->post('jobPrimaryEmail', 'TEXT', FALSE);
		$jobPrimaryPhone = $this->validate->post('jobPrimaryPhone', 'TEXT', FALSE);
		$jobAltPhone = $this->validate->post('jobAltPhone', 'TEXT', FALSE);
		if ($propertyid > 0)
		{
			$jobNTO = 0;
			if ($this->input->post('jobNTO') == 1)
			{
				$jobNTO = 1;
			}
			$jobPermit = 0;
			if ($this->input->post('jobPermit') == 1)
			{
				$jobPermit = 1;
			}
			// get these from property
			$items = array(
				'tableName' => ' crmTblContacts',
				'fields' => array(
					'*',
				) ,
				'where' => 'cntId = ' . $propertyid,
			);
			if (false === ($result = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			$jobParcelNumber = $result['cntParcelNumber'];
			$jobAddress1 = $result['cntPrimaryAddress1'];
			$jobAddress2 = $result['cntPrimaryAddress2'];
			$jobState = $result['cntPrimaryState'];
			$jobCity = $result['cntPrimaryCity'];
			$jobZip = $result['cntPrimaryZip'];
			$jobManagerID = $result['cntManagerId'];
			// get these from parent
			$items = array(
				'tableName' => ' crmTblContacts',
				'fields' => array(
					'*',
				) ,
				'where' => 'cntId = ' . $parentid,
			);
			if (false === ($result = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			$jobAltPhone = $result['cntAltPhone1'];
			$jobPrimaryEmail = $result['cntPrimaryEmail'];
			$jobPrimaryPhone = $result['cntPrimaryPhone'];
			$jobBillAddress1 = $result['cntPrimaryAddress1'];
			$jobBillAddress2 = $result['cntPrimaryAddress2'];
			$jobBillState = $result['cntPrimaryState'];
			$jobBillCity = $result['cntPrimaryCity'];
			$jobBillZip = $result['cntPrimaryZip'];
			$data['jobcntID'] = $parentid; //who is proposal for
			//           $data['jobPrimaryContact'] = $jobPrimaryContact;
			$data['jobPrimaryEmail'] = $jobPrimaryEmail;
			$data['jobPrimaryPhone'] = $jobPrimaryPhone;
			$data['jobAltPhone'] = $jobAltPhone;
			$data['jobParcel'] = $jobParcelNumber;
			$data['jobManagerID'] = $jobManagerID;
			$data['jobCommunityID'] = $propertyid;
			$data['jobAddress1'] = $jobAddress1;
			$data['jobAddress2'] = $jobAddress2;
			$data['jobState'] = $jobAddress1;
			$data['jobCity'] = $jobCity;
			$data['jobState'] = $jobState;
			$data['jobZip'] = $jobZip;
			$data['jobBillingAddress1'] = $jobBillAddress1;
			$data['jobBillingAddress2'] = $jobBillAddress2;
			$data['jobBillingState'] = $jobBillAddress1;
			$data['jobBillingCity'] = $jobBillCity;
			$data['jobBillingState'] = $jobBillState;
			$data['jobBillingZip'] = $jobBillZip;
			$data['jobPrimaryContact'] = $jobPrimaryContact;
			$data['jobName'] = $jobName;
			$data['jobNTO'] = $jobNTO;
			$data['jobPermit'] = $jobPermit;
			$data['jobCreatedBy'] = $this->USER_ID;
			$data['jobCreatedDateTime'] = date('Y-m-d h:i:s');
			$items = array(
				'tableName' => ' POTblJobOrders',
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->insert($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			return $rows;
		}
	}
	public function _listServices()

	{
		$items = array(
			'tableName' => 'dataLkpServiceCategories',
			'fields' => array(
				'*',
			) ,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOlist()

	{
		$items = array(
			'tableName' => 'WOTblJobMaster',
			'fields' => array(
				'*',
			) ,
			'where' => 'jobMasterCompleted = 0',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _ListWO($showcompleted = null)

	{
		$tablename = 'POTblJobOrders p';
		$limit=100;
		$keyfield = 'p.jobID';
		$join = array(
			'JOIN WOTblJobMaster x ON p.jobMasterID = x.jobMasterID',
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobcntID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId',
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId',
			'LEFT JOIN crmTblContacts s ON p.jobSalesManagerAssigned = s.cntId',
			'LEFT JOIN crmTblContacts z ON p.jobSalesAssigned = z.cntId',
			'LEFT JOIN dataLkpOrderStatus b ON p.jobStatus = b.ordStatusID',
		);
		$fields = array(
			'p.jobID',
			'p.jobMasterID',
			'p.jobcntID',
			'p.jobManagerID',
			'p.jobCommunityID',
			// billing address
			'p.jobBillingAddress1',
			'p.jobBillingAddress2',
			'p.jobBillingState',
			'p.jobBillingCity',
			'p.jobBillingZip',
			// job site location
			'p.jobAddress1',
			'p.jobAddress2',
			'p.jobState',
			'p.jobCity',
			'p.jobZip',
			'p.jobParcel',
			'p.jobPrimaryContact',
			'p.jobPrimaryEmail',
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
			'p.jobPermit',
			// property manager
			'manager.cntFirstName as managerFirst',
			'manager.cntLastName as managerLast',
			// community
			'community.cntFirstName as communityFirst',
			'community.cntLastName as communityLast',
			// created by
			'm.cntFirstName',
			'm.cntLastName',
			// client
			'a.cntFirstName as clientfirst',
			'a.cntLastName as clientlast',
			// sales
			'z.cntFirstName as salesfirst',
			'z.cntLastName as saleslast',
			'(SELECT SUM(jordCost) FROM POTblJobOrderDetail WHERE POTblJobOrderDetail.jordJobID = p.jobID ) AS totalcost',
			'(SELECT GROUP_CONCAT(jordName ORDER BY jordName DESC SEPARATOR "<br />") FROM POTblJobOrderDetail WHERE jordjobID = p.jobID) AS JobNames ',
			// assigned manager
			's.cntFirstName as managerfirst',
			's.cntLastName as managerlast',
			's.cntjobTitle as managertitle',
			's.cntPrimaryPhone as managerphone',
			's.cntPrimaryEmail as manageremail',
			'b.ordStatus',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobMOTSentDatetime',
			'p.jobMOTSentBy',
			'p.jobNTOSentDatetime',
			'p.jobNTOSentBy',
			'p.jobReadyToClose',
			'p.jobCompletedDateTime',
			'p.jobCompletedBy',
			'p.jobCompleted',
			'p.jobReadyToBill',
			'p.jobBilledDate',
			'p.jobBilledBy',
			'p.jobBilled',
			'p.jobBillingInvoice',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'x.jobMasterID',
			'x.jobMasterStatus',
			'x.jobMasterMonth',
			'x.jobMasterYear',
			'x.jobMasterNumber',
			'x.jobMasterCreatedDate',
			'x.jobMasterCreatedBy',
			'x.jobMasterCompleted',
		);
		/*
		1	Pending
		2 	Approved
		3 	Rejected
		4 	Signed
		5 	Active Job
		6 	Completed Job
		7 	Job Cancelled
		*/
		if ($showcompleted == 1) //show completed
		{
			$where = 'p.jobStatus = 6';
		}
		elseif ($showcompleted == 3) //show billed
		{
			$where = ' p.jobStatus = 8';
		}
		elseif ($showcompleted == 2) //show all
		{
			$where = ' p.jobStatus > 4';
		}
		else
		// default to active only
		{
			$where = ' p.jobStatus = 5';
		}
		if ($this->USER_ROLE != 1 && $this->USER_ROLE != 6) // admin and office can see all
		{
			$where = $where . ' AND (p.jobSalesManagerAssigned =' . $this->USER_ID . ' OR p.jobSalesAssigned =' . $this->USER_ID . ' OR p.jobCreatedBy =' . $this->USER_ID . ')';
		}
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
			//'limit' => $limit

		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}

	public function _ListWOfullsearch($showcompleted = null,$searchtext=null)

	{
		$tablename = 'POTblJobOrders p';
		$limit=100;
		$keyfield = 'p.jobID';
		$join = array(
			'JOIN WOTblJobMaster x ON p.jobMasterID = x.jobMasterID',
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobcntID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId',
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId',
			'LEFT JOIN crmTblContacts s ON p.jobSalesManagerAssigned = s.cntId',
			'LEFT JOIN crmTblContacts z ON p.jobSalesAssigned = z.cntId',
			'LEFT JOIN dataLkpOrderStatus b ON p.jobStatus = b.ordStatusID',
		);
		$fields = array(
			'p.jobID',
			'p.jobMasterID',
			'p.jobcntID',
			'p.jobManagerID',
			'p.jobCommunityID',
			// billing address
			'p.jobBillingAddress1',
			'p.jobBillingAddress2',
			'p.jobBillingState',
			'p.jobBillingCity',
			'p.jobBillingZip',
			// job site location
			'p.jobAddress1',
			'p.jobAddress2',
			'p.jobState',
			'p.jobCity',
			'p.jobZip',
			'p.jobParcel',
			'p.jobPrimaryContact',
			'p.jobPrimaryEmail',
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
			'p.jobPermit',
			// property manager
			'manager.cntFirstName as managerFirst',
			'manager.cntLastName as managerLast',
			// community
			'community.cntFirstName as communityFirst',
			'community.cntLastName as communityLast',
			// created by
			'm.cntFirstName',
			'm.cntLastName',
			// client
			'a.cntFirstName as clientfirst',
			'a.cntLastName as clientlast',
			// sales
			'z.cntFirstName as salesfirst',
			'z.cntLastName as saleslast',
			'(SELECT SUM(jordCost) FROM POTblJobOrderDetail WHERE POTblJobOrderDetail.jordJobID = p.jobID ) AS totalcost',
			'(SELECT GROUP_CONCAT(jordName ORDER BY jordName DESC SEPARATOR "<br />") FROM POTblJobOrderDetail WHERE jordjobID = p.jobID) AS JobNames ',
			// assigned manager
			's.cntFirstName as managerfirst',
			's.cntLastName as managerlast',
			's.cntjobTitle as managertitle',
			's.cntPrimaryPhone as managerphone',
			's.cntPrimaryEmail as manageremail',
			'b.ordStatus',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobMOTSentDatetime',
			'p.jobMOTSentBy',
			'p.jobNTOSentDatetime',
			'p.jobNTOSentBy',
			'p.jobReadyToClose',
			'p.jobCompletedDateTime',
			'p.jobCompletedBy',
			'p.jobCompleted',
			'p.jobReadyToBill',
			'p.jobBilledDate',
			'p.jobBilledBy',
			'p.jobBilled',
			'p.jobBillingInvoice',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'x.jobMasterID',
			'x.jobMasterStatus',
			'x.jobMasterMonth',
			'x.jobMasterYear',
			'x.jobMasterNumber',
			'x.jobMasterCreatedDate',
			'x.jobMasterCreatedBy',
			'x.jobMasterCompleted',
		);
		/*
		1	Pending
		2 	Approved
		3 	Rejected
		4 	Signed
		5 	Active Job
		6 	Completed Job
		7 	Job Cancelled
		*/
		if ($showcompleted == 1) //show completed
		{
			$where = 'p.jobStatus = 6';
		}
		elseif ($showcompleted == 3) //show billed
		{
			$where = ' p.jobStatus = 8';
		}
		elseif ($showcompleted == 2) //show all
		{
			$where = ' p.jobStatus > 4';
		}
		else
			// default to active only
		{
			$where = ' p.jobStatus = 5';
		}

		if($searchtext <> '')
			$where.= " AND p.jobName like '".$searchtext."%'";

		if ($this->USER_ROLE != 1 && $this->USER_ROLE != 6) // admin and office can see all
		{
			$where = $where . ' AND (p.jobSalesManagerAssigned =' . $this->USER_ID . ' OR p.jobSalesAssigned =' . $this->USER_ID . ' OR p.jobCreatedBy =' . $this->USER_ID . ')';
		}
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
			'limit' => $limit

		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}

	public function _ListProposals($cid = null, $showrejected = null)

	{
		$tablename = 'POTblJobOrders p';
		$keyfield = 'p.jobID';
		$limit=8000;
		$join = array(
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobCommunityID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId', // primary copntact
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId', //creator of proposal
			'LEFT JOIN crmTblContacts s ON p.jobSalesManagerAssigned = s.cntId', //internal employee assigned
			'LEFT JOIN crmTblContacts z ON p.jobSalesAssigned = z.cntId', //internal employee assigned
			'LEFT JOIN dataLkpOrderStatus b ON p.jobStatus = b.ordStatusID',
		);
		$fields = array(
			'p.jobID',
			'p.jobMasterID',
			'p.jobcntID',
			'p.jobPrimaryContact',
			'p.jobPrimaryEmail',
			'p.jobManagerID',
			'p.jobCommunityID',
			// billing address
			'p.jobBillingAddress1',
			'p.jobBillingAddress2',
			'p.jobBillingState',
			'p.jobBillingCity',
			'p.jobBillingZip',
			// job site location
			'p.jobAddress1',
			'p.jobAddress2',
			'p.jobState',
			'p.jobCity',
			'p.jobZip',
			'p.jobParcel',
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
			// property manager
			'manager.cntFirstName as managerFirst',
			'manager.cntLastName as managerLast',
			// community
			'community.cntFirstName as communityFirst',
			'community.cntLastName as communityLast',
			// created by
			'm.cntFirstName',
			'm.cntLastName',
			// client
			'a.cntFirstName as clientfirst',
			'a.cntLastName as clientlast',
			// sales
			'z.cntFirstName as salesfirst',
			'z.cntLastName as saleslast',
			// manager
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
			'(SELECT GROUP_CONCAT(jordName ORDER BY jordName DESC SEPARATOR "<br />") FROM POTblJobOrderDetail WHERE jordjobID = p.jobID) AS servicenames ',
		);
		// proposals have jobMasterID = 0f
		if ($this->USER_ROLE == 1 || $this->USER_ROLE == 6) // admin and office can see all
		{
			$where = 'p.jobMasterID = 0';
		}
		else
		// only allow users assigned
		{
			$where = 'p.jobMasterID = 0 AND (p.jobSalesManagerAssigned =' . $this->USER_ID . ' OR p.jobSalesAssigned =' . $this->USER_ID . ' OR p.jobCreatedBy =' . $this->USER_ID . ')';
		}
		if ($cid)
		{
			$where.= ' AND p.jobcntID = ' . $cid;
		}
		if ($showrejected) //show all
		{
			$where.= ' AND p.jobStatus <= 4';
		}
		else
		// hide rejected
		{
			$where.= ' AND p.jobStatus <= 4 AND p.jobStatus <> 3';
		}
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}

	public function _ListProposalsWithSearch($cid = null, $showrejected = null,$searchtext=null)

	{
		$tablename = 'POTblJobOrders p';
		$keyfield = 'p.jobID';

		$join = array(
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobCommunityID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId', // primary copntact
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId', //creator of proposal
			'LEFT JOIN crmTblContacts s ON p.jobSalesManagerAssigned = s.cntId', //internal employee assigned
			'LEFT JOIN crmTblContacts z ON p.jobSalesAssigned = z.cntId', //internal employee assigned
			'LEFT JOIN dataLkpOrderStatus b ON p.jobStatus = b.ordStatusID',
		);
		$fields = array(
			'p.jobID',
			'p.jobMasterID',
			'p.jobcntID',
			'p.jobPrimaryContact',
			'p.jobPrimaryEmail',
			'p.jobManagerID',
			'p.jobCommunityID',
			// billing address
			'p.jobBillingAddress1',
			'p.jobBillingAddress2',
			'p.jobBillingState',
			'p.jobBillingCity',
			'p.jobBillingZip',
			// job site location
			'p.jobAddress1',
			'p.jobAddress2',
			'p.jobState',
			'p.jobCity',
			'p.jobZip',
			'p.jobParcel',
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
			// property manager
			'manager.cntFirstName as managerFirst',
			'manager.cntLastName as managerLast',
			// community
			'community.cntFirstName as communityFirst',
			'community.cntLastName as communityLast',
			// created by
			'm.cntFirstName',
			'm.cntLastName',
			// client
			'a.cntFirstName as clientfirst',
			'a.cntLastName as clientlast',
			// sales
			'z.cntFirstName as salesfirst',
			'z.cntLastName as saleslast',
			// manager
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
			'(SELECT GROUP_CONCAT(jordName ORDER BY jordName DESC SEPARATOR "<br />") FROM POTblJobOrderDetail WHERE jordjobID = p.jobID) AS servicenames ',
		);
		// proposals have jobMasterID = 0f
		if ($this->USER_ROLE == 1 || $this->USER_ROLE == 6) // admin and office can see all
		{
			$where = 'p.jobMasterID = 0';
		}
		else
			// only allow users assigned
		{
			$where = 'p.jobMasterID = 0 AND (p.jobSalesManagerAssigned =' . $this->USER_ID . ' OR p.jobSalesAssigned =' . $this->USER_ID . ' OR p.jobCreatedBy =' . $this->USER_ID . ')';
		}
		if ($cid)
		{
			$where.= ' AND p.jobcntID = ' . $cid;
		}
		if ($showrejected) //show all
		{
			$where.= ' AND p.jobStatus <= 4';
		}
		else
			// hide rejected
		{
			$where.= ' AND p.jobStatus <= 4 AND p.jobStatus <> 3';
		}
		if($searchtext <> '')
			$where.= " AND p.jobName like '".$searchtext."%'";

		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
			'limit' => $limit
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}


    public function _SearchProposals($filter)
    {
        $tablename = 'POTblJobOrders p';
        $join = array(
            'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
            'LEFT JOIN crmTblContacts community ON p.jobCommunityID = community.cntId', //community involved
            'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId', // primary copntact
            'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId', //creator of proposal
            'LEFT JOIN crmTblContacts s ON p.jobSalesManagerAssigned = s.cntId', //internal employee assigned
            'LEFT JOIN crmTblContacts z ON p.jobSalesAssigned = z.cntId', //internal employee assigned
            'LEFT JOIN dataLkpOrderStatus b ON p.jobStatus = b.ordStatusID',
        );
        $fields = array(
            'p.jobID',
            'p.jobMasterID',
            'p.jobcntID',
            'p.jobPrimaryContact',
            'p.jobPrimaryEmail',
            'p.jobManagerID',
            'p.jobCommunityID',
            // billing address
            'p.jobBillingAddress1',
            'p.jobBillingAddress2',
            'p.jobBillingState',
            'p.jobBillingCity',
            'p.jobBillingZip',
            // job site location
            'p.jobAddress1',
            'p.jobAddress2',
            'p.jobState',
            'p.jobCity',
            'p.jobZip',
            'p.jobParcel',
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
            // property manager
            'manager.cntFirstName as managerFirst',
            'manager.cntLastName as managerLast',
            // community
            'community.cntFirstName as communityFirst',
            'community.cntLastName as communityLast',
            // created by
            'm.cntFirstName',
            'm.cntLastName',
            // client
            'a.cntFirstName as clientfirst',
            'a.cntLastName as clientlast',
            // sales
            'z.cntFirstName as salesfirst',
            'z.cntLastName as saleslast',
            // manager
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
            '(SELECT GROUP_CONCAT(jordName ORDER BY jordName DESC SEPARATOR "<br />") FROM POTblJobOrderDetail WHERE jordjobID = p.jobID) AS servicenames ',
        );
        // proposals have jobMasterID = 0f
        if ($this->USER_ROLE == 1 || $this->USER_ROLE == 6) // admin and office can see all
        {
            $where = 'p.jobMasterID = 0';
        }
        else
            // only allow users assigned
        {
            $where = 'p.jobMasterID = 0 AND (p.jobSalesManagerAssigned =' . $this->USER_ID . ' OR p.jobSalesAssigned =' . $this->USER_ID . ' OR p.jobCreatedBy =' . $this->USER_ID . ')';
        }
        foreach($filter as $f){
            $where .= ' AND ' .$f;
        }

        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'where' => $where,
            'join' => $join,
        );
        if (false === ($rows = $this->dbpdo->get($items)))
        {
            return array(
                'error' => $this->dbpdo->getErrorMessage()
            );
        }


        return $rows;
    }



    public function _getProposalcount($me, $property, $parent)

	{
		// am I the creator of the property or manager assigned on a previous proposal for this property
		$tablename = 'POTblJobOrders';
		$join = array(
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobCommunityID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts client ON p.jobcntID = client.cntId',
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId',
			'LEFT JOIN crmTblContacts b ON p.jobSalesManagerAssigned = b.cntId',
			'LEFT JOIN crmTblContacts c ON p.jobSalesAssigned = c.cntId',
			'LEFT JOIN crmTblContacts d ON p.jobApprovedBy = d.cntId',
			'LEFT JOIN crmTblContacts u ON p.jobLastUpdatedBy = u.cntId',
			'LEFT JOIN dataLkpOrderStatus s ON p.jobStatus = s.ordStatusID',
		);
		$fields = array(
			'p.jobID'
		);
		$where = 'p.jobID =' . $pid;
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getProposal($pid, $showfromwo = null)

	{
		$tablename = 'POTblJobOrders p';
		$keyfield = 'p.jobID';
		$join = array(
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobCommunityID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts client ON p.jobcntID = client.cntId',
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId',
			'LEFT JOIN crmTblContacts b ON p.jobSalesManagerAssigned = b.cntId',
			'LEFT JOIN crmTblContacts c ON p.jobSalesAssigned = c.cntId',
			'LEFT JOIN crmTblContacts d ON p.jobApprovedBy = d.cntId',
			'LEFT JOIN crmTblContacts u ON p.jobLastUpdatedBy = u.cntId',
			'LEFT JOIN dataLkpOrderStatus s ON p.jobStatus = s.ordStatusID',
		);
		$fields = array(
			'p.jobID',
			'p.jobMasterID',
			'p.jobcntID',
			'p.jobManagerID',
			'p.jobCommunityID',
			'p.jobProjectDate',
			// billing address
			'p.jobBillingAddress1',
			'p.jobBillingAddress2',
			'p.jobBillingState',
			'p.jobBillingCity',
			'p.jobBillingZip',
			// job site location
			'p.jobAddress1',
			'p.jobAddress2',
			'p.jobState',
			'p.jobCity',
			'p.jobZip',
			'p.jobParcel',
			'p.jobName',
			'p.jobStatus',
			'p.jobApprovedBy',
			'p.jobApproved',
			'p.jobRejectedBy',
			'p.jobRejectedDate',
			'p.jobRejectedReason',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobMOT',
			'p.jobNTO',
			'p.jobPermit',
			'p.jobPrimaryContact',
			'p.jobPrimaryEmail',
			'p.jobPrimaryPhone',
			'p.jobAltPhone',
			'p.jobApprovedDate',
			'p.jobCreatedBy',
			'p.jobCreatedDateTime',
			'p.jobSalesManagerAssigned',
			'p.jobSalesAssigned',
			'p.JobLastUpdated',
			'p.jobLastUpdatedBy',
			'p.jobDiscount',
			'p.jobProposalPDF',
			'p.jobMOTSentDatetime',
			'p.jobMOTSentBy',
			'p.jobNTOSentDatetime',
			'p.jobNTOSentBy',
			// property manager
			'manager.cntFirstName as managerFirst',
			'manager.cntLastName as managerLast',
			// community
			'community.cntFirstName as communityFirst',
			'community.cntLastName as communityLast',
			'community.cntPrimaryAddress1 as communityLast',
			'community.cntPrimaryAddress2 as communityLast',
			'community.cntPrimaryCity as communityLast',
			'community.cntPrimaryState as communityLast',
			'community.cntPrimaryZip as communityLast',
			'community.cntParcelNumber',
			// created by
			'm.cntPrimaryEmail as creatoremail',
			'm.cntPrimaryPhone as creatorphone',
			'm.cntFirstName ',
			'm.cntLastName',
			// client
			'client.cntId as clientid',
			'client.cntFirstName as clientfirst',
			'client.cntLastName as clientlast',
			'client.cntPrimaryEmail',
			'client.cntPrimaryPhone',
			'client.cntPrimaryAddress1',
			'client.cntPrimaryAddress2',
			'client.cntPrimaryState',
			'client.cntPrimaryCity',
			'client.cntPrimaryZip',
			// manager
			'b.cntjobTitle as managertitle',
			'b.cntFirstName as managerfirst',
			'b.cntLastName as managerlast',
			'b.cntPrimaryPhone as managerphone',
			'b.cntPrimaryEmail as manageremail',
			// lastUpdate
			'u.cntFirstName as updaterfirst',
			'u.cntLastName as updaterlast',
			// sales
			'c.cntjobTitle as salestitle',
			'c.cntSignature AS salesSignature',
			'c.cntFirstName as salesfirst',
			'c.cntLastName as saleslast',
			'c.cntPrimaryPhone as salesphone',
			'c.cntPrimaryEmail as salesemail',
			// approver
			'd.cntFirstName as approvefirst',
			'd.cntLastName as approvelast',
			's.ordStatus',
		);
		// proposals have jobMasterID = 0
		if ($showfromwo) // we are trying to print a proposal from a work order screen
		{
			$where = 'p.jobID =' . $pid;
		}
		else
		{
			$where = 'p.jobMasterID = 0 AND p.jobID =' . $pid;
		}
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWO($pid)

	{
		$tablename = 'WOTblJobMaster x';
		$join = array(
			'LEFT JOIN POTblJobOrders p ON p.jobMasterID = x.jobMasterID',
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobcntID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId',
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId',
			'LEFT JOIN crmTblContacts b ON p.jobSalesManagerAssigned = b.cntId',
			'LEFT JOIN crmTblContacts c ON p.jobSalesAssigned = c.cntId',
			'LEFT JOIN crmTblContacts d ON p.jobApprovedBy = d.cntId',
			'LEFT JOIN crmTblContacts u ON p.jobLastUpdatedBy = u.cntId',
			'LEFT JOIN dataLkpOrderStatus s ON p.jobStatus = s.ordStatusID',
		);
		$fields = array(
			'p.jobID',
			'p.jobMasterID',
			'p.jobcntID',
			'p.jobManagerID',
			'p.jobCommunityID',
			// billing address
			'p.jobBillingAddress1',
			'p.jobBillingAddress2',
			'p.jobBillingState',
			'p.jobBillingCity',
			'p.jobBillingZip',
			// job site location
			'p.jobAddress1',
			'p.jobAddress2',
			'p.jobState',
			'p.jobCity',
			'p.jobZip',
			'p.jobParcel',
			'p.jobName',
			'p.jobStatus',
			'p.jobApprovedBy',
			'p.jobApproved',
			'p.jobRejectedBy',
			'p.jobRejectedDate',
			'p.jobRejectedReason',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobNTO',
			'p.jobPermit',
			'p.jobPrimaryContact',
			'p.jobPrimaryEmail',
			'p.jobPrimaryPhone',
			'p.jobAltPhone',
			'p.jobApprovedDate',
			'p.jobCreatedBy',
			'p.jobCreatedDateTime',
			'p.jobSalesManagerAssigned',
			'p.jobSalesAssigned',
			'p.JobLastUpdated',
			'p.jobLastUpdatedBy',
			'p.jobDiscount',
			'p.jobProposalPDF',
			// property manager
			'manager.cntFirstName as managerFirst',
			'manager.cntLastName as managerLast',
			// community
			'community.cntFirstName as communityFirst',
			'community.cntLastName as communityLast',
			'community.cntPrimaryAddress1 as communityAddress1',
			'community.cntPrimaryAddress2 as communityAddress2',
			'community.cntPrimaryCity as communityCity',
			'community.cntPrimaryState as communityState',
			'community.cntPrimaryZip as communityZip',
			// created by
			'm.cntFirstName',
			'm.cntLastName',
			// client
			'a.cntId as clientid',
			'a.cntFirstName as clientfirst',
			'a.cntLastName as clientlast',
			'a.cntPrimaryEmail',
			'a.cntPrimaryPhone',
			'a.cntPrimaryAddress1',
			'a.cntPrimaryAddress2',
			'a.cntPrimaryState',
			'a.cntPrimaryCity',
			'a.cntPrimaryZip',
			'a.cntParcelNumber',
			'a.cntAltContactName',
			// manager
			'b.cntFirstName as managerfirst',
			'b.cntLastName as managerlast',
			'b.cntjobTitle as managertitle',
			'b.cntPrimaryPhone as managerphone',
			'b.cntPrimaryEmail as manageremail',
			// lastUpdate
			'u.cntFirstName as updaterfirst',
			'u.cntLastName as updaterlast',
			// sales
			'c.cntFirstName as salesfirst',
			'c.cntLastName as saleslast',
			'c.cntjobTitle as salestitle',
			'c.cntPrimaryPhone as salesphone',
			'c.cntPrimaryEmail as salesemail',
			// approver
			'd.cntFirstName as approvefirst',
			'd.cntLastName as approvelast',
			's.ordStatus',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobMOT',
			'p.jobMOTSentDatetime',
			'p.jobMOTSentBy',
			'p.jobNTOSentDatetime',
			'p.jobNTOSentBy',
			'p.jobReadyToClose',
			'p.jobCompletedDateTime',
			'p.jobCompletedBy',
			'p.jobCompleted',
			'p.jobReadyToBill',
			'p.jobBilledDate',
			'p.jobBilledBy',
			'p.jobBilled',
			'p.jobBillingInvoice',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'x.jobMasterID as JMID',
			'x.jobMasterStatus',
			'x.jobMasterMonth',
			'x.jobMasterYear',
			'x.jobMasterNumber',
			'x.jobMasterCreatedDate',
			'x.jobMasterCreatedBy',
			'x.jobMasterCompleted',
			'x.jobMasterCompletedBy',
			'x.jobMasterCompletedDate',
			'(SELECT SUM(jordCost) FROM POTblJobOrderDetail WHERE POTblJobOrderDetail.jordJobID = p.jobID ) AS totalcost',
		);
		// proposals have jobMasterID = 0 they will not show
		$where = array(
			'p.jobMasterID > 0',
			'p.jobID =' . $pid
		);
		if ($this->USER_ROLE == 1 || $this->USER_ROLE == 6) // admin and office can see all
		{
			$where = array(
				'p.jobMasterID > 0',
				'p.jobID =' . $pid
			);
		}
		else
		// only allow users assigned
		{
			$where = array(
				'p.jobMasterID > 0',
				'p.jobID =' . $pid,
				'(p.jobSalesManagerAssigned =' . $this->USER_ID . ' OR p.jobSalesAssigned =' . $this->USER_ID . ' OR p.jobCreatedBy =' . $this->USER_ID . ')'
			);
		}
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOService($pid, $sid)

	{
		$tablename = 'WOTblJobMaster x';
		$join = array(
			'LEFT JOIN POTblJobOrders p ON p.jobMasterID = x.jobMasterID',
			'LEFT JOIN POTblJobOrderDetail e ON p.jobID = e.jordJobID',
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobcntID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId',
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId',
			'LEFT JOIN crmTblContacts b ON p.jobSalesManagerAssigned = b.cntId',
			'LEFT JOIN crmTblContacts c ON p.jobSalesAssigned = c.cntId',
			'LEFT JOIN crmTblContacts d ON p.jobApprovedBy = d.cntId',
			'LEFT JOIN crmTblContacts u ON p.jobLastUpdatedBy = u.cntId',
			'LEFT JOIN dataLkpOrderStatus s ON p.jobStatus = s.ordStatusID',
		);
		$fields = array(
			'p.jobID',
			'p.jobMasterID',
			'p.jobcntID',
			'p.jobManagerID',
			'p.jobCommunityID',
			// billing address
			'p.jobBillingAddress1',
			'p.jobBillingAddress2',
			'p.jobBillingState',
			'p.jobBillingCity',
			'p.jobBillingZip',
			// job site location
			'p.jobAddress1',
			'p.jobAddress2',
			'p.jobState',
			'p.jobCity',
			'p.jobZip',
			'p.jobParcel',
			'p.jobName',
			'p.jobStatus',
			'p.jobApprovedBy',
			'p.jobApproved',
			'p.jobRejectedBy',
			'p.jobRejectedDate',
			'p.jobRejectedReason',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobNTO',
			'p.jobPermit',
			'p.jobPrimaryContact',
			'p.jobPrimaryEmail',
			'p.jobPrimaryPhone',
			'p.jobAltPhone',
			'p.jobApprovedDate',
			'p.jobCreatedBy',
			'p.jobCreatedDateTime',
			'p.jobSalesManagerAssigned',
			'p.jobSalesAssigned',
			'p.JobLastUpdated',
			'p.jobLastUpdatedBy',
			'p.jobDiscount',
			'p.jobProposalPDF',
			// property manager
			'manager.cntFirstName as managerFirst',
			'manager.cntLastName as managerLast',
			// community
			'community.cntFirstName as communityFirst',
			'community.cntLastName as communityLast',
			'community.cntPrimaryAddress1 as communityAddress1',
			'community.cntPrimaryAddress2 as communityAddress2',
			'community.cntPrimaryCity as communityCity',
			'community.cntPrimaryState as communityState',
			'community.cntPrimaryZip as communityZip',
			// created by
			'm.cntFirstName',
			'm.cntLastName',
			// client
			'a.cntId as clientid',
			'a.cntFirstName as clientfirst',
			'a.cntLastName as clientlast',
			'a.cntPrimaryEmail',
			'a.cntPrimaryPhone',
			'a.cntPrimaryAddress1',
			'a.cntPrimaryAddress2',
			'a.cntPrimaryState',
			'a.cntPrimaryCity',
			'a.cntPrimaryZip',
			'a.cntParcelNumber',
			'a.cntAltContactName',
			// manager
			'b.cntFirstName as managerfirst',
			'b.cntLastName as managerlast',
			'b.cntjobTitle as managertitle',
			'b.cntPrimaryPhone as managerphone',
			'b.cntPrimaryEmail as manageremail',
			// lastUpdate
			'u.cntFirstName as updaterfirst',
			'u.cntLastName as updaterlast',
			// sales
			'c.cntFirstName as salesfirst',
			'c.cntLastName as saleslast',
			'c.cntjobTitle as salestitle',
			'c.cntPrimaryPhone as salesphone',
			'c.cntPrimaryEmail as salesemail',
			// approver
			'd.cntFirstName as approvefirst',
			'd.cntLastName as approvelast',
			's.ordStatus',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobMOT',
			'p.jobMOTSentDatetime',
			'p.jobMOTSentBy',
			'p.jobNTOSentDatetime',
			'p.jobNTOSentBy',
			'p.jobReadyToClose',
			'p.jobCompletedDateTime',
			'p.jobCompletedBy',
			'p.jobCompleted',
			'p.jobReadyToBill',
			'p.jobBilledDate',
			'p.jobBilledBy',
			'p.jobBilled',
			'p.jobBillingInvoice',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'x.jobMasterID as JMID',
			'x.jobMasterStatus',
			'x.jobMasterMonth',
			'x.jobMasterYear',
			'x.jobMasterNumber',
			'x.jobMasterCreatedDate',
			'x.jobMasterCreatedBy',
			'x.jobMasterCompleted',
			'x.jobMasterCompletedBy',
			'x.jobMasterCompletedDate',
			'e.jordID',
			'(SELECT SUM(jordCost) FROM POTblJobOrderDetail WHERE POTblJobOrderDetail.jordJobID = p.jobID ) AS totalcost',
		);
		// proposals have jobMasterID = 0 they will not show
		$where = array(
			'p.jobMasterID > 0',
			'p.jobID =' . $pid,
			'e.jordID=' . $sid
		);
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOALL($pid, $sid = null)

	{
		$tablename = 'WOTblJobMaster x';
		$join = array(
			'LEFT JOIN POTblJobOrders p ON p.jobMasterID = x.jobMasterID',
			'LEFT JOIN crmTblContacts manager ON p.jobManagerID = manager.cntId', //property manager contact if any
			'LEFT JOIN crmTblContacts community ON p.jobcntID = community.cntId', //community involved
			'LEFT JOIN crmTblContacts a ON p.jobcntID = a.cntId',
			'LEFT JOIN crmTblContacts m ON p.jobCreatedBy = m.cntId',
			'LEFT JOIN crmTblContacts b ON p.jobSalesManagerAssigned = b.cntId',
			'LEFT JOIN crmTblContacts c ON p.jobSalesAssigned = c.cntId',
			'LEFT JOIN crmTblContacts d ON p.jobApprovedBy = d.cntId',
			'LEFT JOIN crmTblContacts u ON p.jobLastUpdatedBy = u.cntId',
			'LEFT JOIN dataLkpOrderStatus s ON p.jobStatus = s.ordStatusID',
		);
		$fields = array(
			'p.jobID',
			'p.jobMasterID',
			'p.jobcntID',
			'p.jobManagerID',
			'p.jobCommunityID',
			// billing address
			'p.jobBillingAddress1',
			'p.jobBillingAddress2',
			'p.jobBillingState',
			'p.jobBillingCity',
			'p.jobBillingZip',
			// job site location
			'p.jobAddress1',
			'p.jobAddress2',
			'p.jobState',
			'p.jobCity',
			'p.jobZip',
			'p.jobParcel',
			'p.jobName',
			'p.jobStatus',
			'p.jobApprovedBy',
			'p.jobApproved',
			'p.jobRejectedBy',
			'p.jobRejectedDate',
			'p.jobRejectedReason',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobNTO',
			'p.jobPermit',
			'p.jobPrimaryContact',
			'p.jobPrimaryEmail',
			'p.jobPrimaryPhone',
			'p.jobAltPhone',
			'p.jobApprovedDate',
			'p.jobCreatedBy',
			'p.jobCreatedDateTime',
			'p.jobSalesManagerAssigned',
			'p.jobSalesAssigned',
			'p.JobLastUpdated',
			'p.jobLastUpdatedBy',
			'p.jobDiscount',
			'p.jobProposalPDF',
			// property manager
			'manager.cntFirstName as managerFirst',
			'manager.cntLastName as managerLast',
			// community
			'community.cntFirstName as communityFirst',
			'community.cntLastName as communityLast',
			'community.cntPrimaryAddress1 as communityAddress1',
			'community.cntPrimaryAddress2 as communityAddress2',
			'community.cntPrimaryCity as communityCity',
			'community.cntPrimaryState as communityState',
			'community.cntPrimaryZip as communityZip',
			// created by
			'm.cntFirstName',
			'm.cntLastName',
			// client
			'a.cntId as clientid',
			'a.cntFirstName as clientfirst',
			'a.cntLastName as clientlast',
			'a.cntPrimaryEmail',
			'a.cntPrimaryPhone',
			'a.cntPrimaryAddress1',
			'a.cntPrimaryAddress2',
			'a.cntPrimaryState',
			'a.cntPrimaryCity',
			'a.cntPrimaryZip',
			'a.cntParcelNumber',
			'a.cntAltContactName',
			// manager
			'b.cntFirstName as managerfirst',
			'b.cntLastName as managerlast',
			'b.cntjobTitle as managertitle',
			'b.cntPrimaryPhone as managerphone',
			'b.cntPrimaryEmail as manageremail',
			// lastUpdate
			'u.cntFirstName as updaterfirst',
			'u.cntLastName as updaterlast',
			// sales
			'c.cntFirstName as salesfirst',
			'c.cntLastName as saleslast',
			'c.cntjobTitle as salestitle',
			'c.cntPrimaryPhone as salesphone',
			'c.cntPrimaryEmail as salesemail',
			// approver
			'd.cntFirstName as approvefirst',
			'd.cntLastName as approvelast',
			's.ordStatus',
			'p.jobAlertBy',
			'p.jobAlertNote',
			'p.jobAlert',
			'p.jobMOT',
			'p.jobMOTSentDatetime',
			'p.jobMOTSentBy',
			'p.jobNTOSentDatetime',
			'p.jobNTOSentBy',
			'p.jobReadyToClose',
			'p.jobCompletedDateTime',
			'p.jobCompletedBy',
			'p.jobCompleted',
			'p.jobReadyToBill',
			'p.jobBilledDate',
			'p.jobBilledBy',
			'p.jobBilled',
			'p.jobBillingInvoice',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'p.jobBillingAmount',
			'p.jobBillingNote',
			'x.jobMasterID as JMID',
			'x.jobMasterStatus',
			'x.jobMasterMonth',
			'x.jobMasterYear',
			'x.jobMasterNumber',
			'x.jobMasterCreatedDate',
			'x.jobMasterCreatedBy',
			'x.jobMasterCompleted',
			'x.jobMasterCompletedBy',
			'x.jobMasterCompletedDate',
			'(SELECT SUM(jordCost) FROM POTblJobOrderDetail WHERE POTblJobOrderDetail.jordJobID = p.jobID ) AS totalcost',
		);
		// proposals have jobMasterID = 0 they will not show
		$where = array(
			'p.jobMasterID > 0',
			'p.jobID =' . $pid
		);
		if ($this->USER_ROLE == 1 || $this->USER_ROLE == 6) // admin and office can see all
		{
			$where = array(
				'p.jobMasterID > 0',
				'p.jobID =' . $pid
			);
		}
		else
		// only allow users assigned
		{
			$where = array(
				'p.jobMasterID > 0',
				'p.jobID =' . $pid,
				'(p.jobSalesManagerAssigned =' . $this->USER_ID . ' OR p.jobSalesAssigned =' . $this->USER_ID . ' OR p.jobCreatedBy =' . $this->USER_ID . ')'
			);
		}
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// get all details for this work proposal
		$details = $this->_getAllPODetails($pid, $sid);
		$detailviews = array();
		// get detail specs
		if (!$sid)
		{
			foreach($details as $d)
			{
				$result = array();
				$result = $d;
				// vehicles
				$result['vehicles'] = $this->_getServiceVehicles($d['jordID']);
				// equipment
				$result['equipment'] = $this->_getServiceEquipment($d['jordID']);
				// labor
				$result['labor'] = $this->_getServiceLabor($d['jordID']);
				// other
				$result['other'] = $this->_getServiceOther($d['jordID']);
				// get subs
				$result['subs'] = $this->_getPOSubs($d['jordID']);
				$detailviews[] = $result;
			}
		}
		else
		{
			$result = $details;
			// vehicles
			$result['vehicles'] = $this->_getServiceVehicles($details['jordID']);
			// equipment
			$result['equipment'] = $this->_getServiceEquipment($details['jordID']);
			// labor
			$result['labor'] = $this->_getServiceLabor($details['jordID']);
			// other
			$result['other'] = $this->_getServiceOther($details['jordID']);
			// get subs
			$result['subs'] = $this->_getPOSubs($details['jordID']);
			$detailviews = $result;
		}
		$rows['details'] = $detailviews;
		return $rows;
	}
	public function _deleteWOEquipment($id)

	{
		$items = array(
			'tableName' => 'WOTbljobOrderEquipment',
			'where' => 'POequipID =' . $id,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _saveWOEquipment($sid, $final = null)

	{
		$POequipFinal = 0;
		if ($final)
		{
			$POequipFinal = 1;
		}
		$POequipjordID = $sid;
		$POequipEquipmentID = $this->input->post('POequipEquipmentID');
		$POequipHours = $this->input->post('POequipHours');
		$POequipDate = $this->input->post('POequipDate');
		$POEquipCost = $this->input->post('POEquipCost');
		$POEquipRate = $this->input->post('POEquipRate');
		$POequipNumber = $this->input->post('POequipNumber');
		$data = array();
		$data['POequipjordID'] = $POequipjordID;
		$data['POequipEquipmentID'] = $POequipEquipmentID;
		$data['POequipHours'] = $POequipHours;
		$data['POequipFinal'] = $POequipFinal;
		$data['POequipDate'] = $POequipDate;
		$data['POEquipCost'] = $POEquipCost;
		$data['POEquipRate'] = $POEquipRate;
		$data['POequipNumber'] = $POequipNumber;
		$data['POequipCreatedBy'] = $this->USER_ID;
		$items = array(
			'tableName' => 'WOTbljobOrderEquipment',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _addWOMaterial($sid, $final = null)

	{
		$womatFinal = 0;
		if ($final)
		{
			$womatFinal = 1;
		}
		$womatMatID = $this->input->post('womatMatID');
		$womatVendorID = $this->input->post('womatVendorID');
		$womatAmount = $this->input->post('womatAmount');
		$womatCost = $this->input->post('womatCost');
		$womatDate = $this->input->post('womatDate');
		$date = new DateTime($womatDate);
		$womatDate = $date->format('Y-m-d');
		$data = array();
		$data['womatVendorID'] = $womatVendorID;
		$data['womatFinal'] = $womatFinal;
		$data['womatMatID'] = $womatMatID;
		$data['womatjordID'] = $sid;
		$data['womatAmount'] = $womatAmount;
		$data['womatCost'] = $womatCost;
		$data['womatDate'] = $womatDate;
		$data['womatCreatedby'] = $this->USER_ID;
		$items = array(
			'tableName' => 'WOTbljobOrderMaterials',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _deleteWOVehicle($vid)

	{
		$items = array(
			'tableName' => 'WOTbljobOrderVehicles',
			'where' => 'POVID =' . $vid,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _saveWOVehicle($sid, $final = null)

	{
		$POVFinal = 0;
		if ($final)
		{
			$POVFinal = 1;
		}
		$POVRate = $this->input->post('POVRate');
		$POVDate = $this->input->post('POVDate');
		$POVjordID = $sid;
		$POVvehicleID = $this->input->post('POVvehicleID');
		$POVHoursUsed = $this->input->post('POVHoursUsed');
		$data = array();
		$data['POVCreatedBy'] = $this->USER_ID;
		$data['POVFinal'] = $POVFinal;
		$data['POVDate'] = $POVDate;;
		$data['POVjordID'] = $POVjordID;
		$data['POVvehicleID'] = $POVvehicleID;
		$data['POVHoursUsed'] = $POVHoursUsed;
		$data['POVRate'] = $POVRate;
		$items = array(
			'tableName' => 'WOTbljobOrderVehicles',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _removeWODaily($nid)

	{
		$items = array(
			'tableName' => 'WOTbljobOrderNightly',
			'where' => 'womID  =' . $nid,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWONightlyRep($nid)

	{
		$fields = array(
			'd.womID',
			'd.womjordID',
			'd.womCheckRemoveEquipment',
			'd.womCheckRemoveTools',
			'd.womCheckRefill',
			'd.womCheckTruck',
			'd.womCreatedDate',
			'd.womNote',
			'd.womCreatedby',
			'd.womDate',
			'contact.cntFirstName',
			'contact.cntlastName',
			'service.jordName',
			'master.jobMasterID',
			'master.jobMasterStatus',
			'master.jobMasterMonth',
			'master.jobMasterYear',
			'master.jobMasterNumber',
		);
		$join = array(
			'LEFT JOIN crmTblContacts contact ON contact.cntId = d.womCreatedby',
			'LEFT JOIN POTblJobOrderDetail service ON service.jordID = d.womjordID',
			'LEFT JOIN POTblJobOrders joborder ON joborder.jobID = service.jordJobID',
			'LEFT JOIN WOTblJobMaster master ON master.jobMasterID  = joborder.jobMasterID',
		);
		$items = array(
			'tableName' => 'WOTbljobOrderNightly d',
			'join' => $join,
			'fields' => $fields,
			'where' => 'womID  =' . $nid,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getNightlyChecklist($sid)

	{
		$fields = array(
			'p.*',
			'a.cntFirstName',
			'a.cntLastName'
		);
		$join = array(
			'LEFT JOIN crmTblContacts a ON p.womCreatedby = a.cntId',
		);
		$items = array(
			'tableName' => 'WOTbljobOrderNightly p',
			'where' => 'womjordID  =' . $sid,
			'join' => $join,
			'fields' => $fields,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _saveWOServiceNote($sid)

	{
		$where = "jordID =" . $sid;
		$data = array();
		$data['jordCustomNote'] = $this->validate->post('jordCustomNote', 'TEXT');
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _saveWOManagers($sid)

	{
		$where = "jordID =" . $sid;
		$data = array();
		$data['jordJobManagerID'] = $this->validate->post('jordJobManagerID', 'INTEGER');
		$data['jordJobManagerID2'] = $this->validate->post('jordJobManagerID2', 'INTEGER');
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _rollbackBilling($pid)

	{
		$where = "jobID =" . $pid;
		$data = array();
		$data['jobBilled'] = 0; // not billed
		$data['jobStatus'] = 6; //completed
		$data['jobReadyToBill'] = 1; // not billed
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _rollbackService($sid)

	{
		$where = "jordID =" . $sid;
		$data = array();
		$data['jordCompleted'] = 0; // not completed
		$data['jordStatus'] = "SCHEDULED"; // not billed
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _rollbackCompleted($pid)

	{
		$where = "jobID =" . $pid;
		$data = array();
		$data['jobCompleted'] = 0; // not completed
		$data['jobReadyToBill'] = 0; // not billed
		$data['jobReadyToClose'] = 1; // ready to complete
		$data['jobStatus'] = 5; //completed
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _saveWOSchedule($sid)

	{
		$where = "jordID =" . $sid;
		$data = array();
		$data['jordAddress1'] = ($this->input->post('jordAddress1'));
		$data['jordAddress2'] = ($this->input->post('jordAddress2'));
		$data['jordState'] = $this->input->post('jordState');
		$data['jordCity'] = ($this->input->post('jordCity'));
		$data['jordZip'] = ($this->input->post('jordZip'));
		$data['jordParcel'] = ($this->input->post('jordParcel'));
		$jordStartDate = $this->input->post('jordStartDate');
		if (empty($jordStartDate))
		{
			$jordStartDate = null;
		}
		else
		{
			$jordStartDate = $this->input->post('jordStartDate');
			$date = new DateTime($jordStartDate);
			$jordStartDate = $date->format('Y-m-d');
		}
		$jordEndDate = $this->input->post('jordEndDate');
		if (empty($jordEndDate))
		{
			$jordEndDate = null;
		}
		else
		{
			$jordEndDate = $this->input->post('jordEndDate');
			$date = new DateTime($jordEndDate);
			$jordEndDate = $date->format('Y-m-d');
		}
		$data['jordStartDate'] = $jordStartDate;
		$data['jordEndDate'] = $jordEndDate;
		$data['jordStatus'] = 'SCHEDULED';
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updatePricing($pid)

	{
		// first delete all then add all
		$tablename = 'POTblMaterialsCost';
		$where = 'omatjobID =' . $pid;
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// get all current costs
		$items = array(
			'tableName' => 'dataTblMaterials',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		foreach($rows as $r)
		{
			$data = array();
			$data['omatMatID'] = $r['matID'];
			$data['omatjobID'] = $pid;
			$data['omatName'] = $r['matName'];
			$data['omatCost'] = $r['matCost'];
			$data['omatAltCost'] = $r['matAltCost'];
			$items = array(
				'tableName' => 'POTblMaterialsCost',
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->insert($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
	}
	public function _getServiceCategories()

	{
		$fields = 'cmpServiceID,cmpServiceCat,cmpServiceName';
		$orderBy = 'cmpServiceCat, cmpServiceName';
		$items = array(
			'tableName' => 'dataTblCompanyServices',
			'fields' => $fields,
			'orderBy' => $orderBy,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPOSubs($pid)

	{
		$tablename = 'POTbljobOrderSubContractors p';
		$fields = array(
			'p.posubID',
			'p.posubVendorID',
			'p.posubjordID',
			'p.posubCost',
			'p.posubOverHead',
			'p.posubDescription',
			'p.posubHaveBid',
			// sub
			'a.cntId as clientid',
			'a.cntFirstName',
			'a.cntLastName',
		);
		$join = array(
			'LEFT JOIN crmTblContacts a ON p.posubVendorID  = a.cntId',
		);
		$fields = array(
			'*'
		);
		$where = array(
			'posubjordID = :pid',
		);
		$params = array(
			'pid' => $pid,
		);
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'join' => $join,
			'where' => $where,
			'params' => $params,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPOScheduledServices()

	{
		$tablename = 'POTblJobOrderDetail p';
		$join = array(
			'LEFT JOIN POTblJobOrders m ON m.jobid = p.jordJobID',
			'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = m.jobMasterID',
		);
		$fields = array(
			'p.*',
			'm.jobid',
			'w.jobMasterMonth',
			'w.jobMasterYear',
			'w.jobMasterNumber',
		);
		$where = array(
			"p.jordStatus = 'SCHEDULED'",
			"m.jobMasterID > 0",
		);
		$orderby = "p.jordStartDate";
		if ($this->USER_ROLE == 4 || $this->USER_ROLE == 5) // job managers
		{
			$where[] = "(jordJobManagerID = " . $this->USER_ID . " OR jordJobManagerID2 = " . $this->USER_ID . ")";
		}
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'where' => $where,
			'orderBy' => $orderby,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOScheduledServices()

	{
		$tablename = 'POTblJobOrderDetail p';
		$join = array(
			'LEFT JOIN POTblJobOrders m ON m.jobid = p.jordJobID',
			'LEFT JOIN crmTblContacts c ON c.cntId = m.jobcntID',
			'LEFT JOIN crmTblContacts s ON s.cntId = m.jobSalesManagerAssigned',
			'LEFT JOIN crmTblContacts j ON j.cntId = p.jordJobManagerID',
			'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = m.jobMasterID',
			'JOIN dataTblCompanyServices d ON d.cmpServiceID = p.jordServiceID',
			'LEFT JOIN WOTbljobOrderPermits pr on pr.wopjordID = p.jordID',
		);
		$fields = array(
			'p.*', // all from job order detail
			'pr.wopStatus', // status of permits
			'pr.wopID',
			'm.jobid',
			// fields define work order number
			'w.jobMasterMonth',
			'w.jobMasterYear',
			'w.jobMasterNumber',
			'd.cmpServiceCat', //category
			'd.cmpServiceName As ServiceName', //service type
			// customer
			'c.cntFirstName',
			'c.cntLastName',
			// sales manager
			's.cntFirstName As managerFirst',
			's.cntLastName As managerLast',
			// jon manager
			'j.cntFirstName As jobmanagerFirst',
			'j.cntLastName As jobmanagerLast',
		);
		$where = array(
			"m.jobMasterID > 0",
			"p.jordStatus <> 'COMPLETED'", //service is not completed
			"m.jobStatus = 5", //job is active
		);
		$orderby = "p.jordStartDate";
		if ($this->USER_ROLE == 4 || $this->USER_ROLE == 5) // job managers
		{
			$where[] = "(jordJobManagerID = " . $this->USER_ID . " OR jordJobManagerID2 = " . $this->USER_ID . ")";
		}
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'where' => $where,
			'orderBy' => $orderby,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOScheduledServicesFiltered($filter = null)

	{
		$tablename = 'POTblJobOrderDetail p';
		$join = array(
			'LEFT JOIN POTblJobOrders m ON m.jobid = p.jordJobID',
			'LEFT JOIN crmTblContacts c ON c.cntId = m.jobcntID',
			'LEFT JOIN crmTblContacts s ON s.cntId = m.jobSalesAssigned',
			'LEFT JOIN crmTblContacts j ON j.cntId = p.jordJobManagerID',
			'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = m.jobMasterID',
			'JOIN dataTblCompanyServices d ON d.cmpServiceID = p.jordServiceID',
			'LEFT JOIN WOTbljobOrderPermits pr on pr.wopjordID = p.jordID',
		);
		$fields = array(
			'p.*', // all from job order detail
			'pr.wopStatus', // status of permits
			'pr.wopID',
			'm.jobid',
			'm.jobName',
			// fields define work order number
			'w.jobMasterMonth',
			'w.jobMasterYear',
			'w.jobMasterNumber',
			'd.cmpServiceID', //category
			'd.cmpServiceCat', //category
			'd.cmpServiceName As ServiceName', //service type
			// customer
			'c.cntFirstName',
			'c.cntLastName',
			// sales manager
			's.cntFirstName As managerFirst',
			's.cntLastName As managerLast',
			// jon manager
			'j.cntFirstName As jobmanagerFirst',
			'j.cntLastName As jobmanagerLast',
		);
		if ($filter)
		{
			$where = $filter;
			// return $where;
		}
		else
		{
			$where = array(
				"m.jobMasterID > 0",
				"p.jordStatus <> 'COMPLETED' AND p.jordStatus <> 'CANCELLED'", //service is not completed
				"m.jobStatus = 5", //job is active
			);
		}
		$orderby = "p.jordStartDate";
		// only admin and office should be here
		/*  if($this->USER_ROLE == 4 || $this->USER_ROLE == 5) // job managers
		{
		$where[] = "(jordJobManagerID = ".$this->USER_ID . " OR jordJobManagerID2 = ". $this->USER_ID.")";
		}
		*/
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'where' => $where,
			'orderBy' => $orderby,
		);
		if (false === ($count = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$data = array(
			'rows' => $rows,
			'count' => $count
		);
		return $data;
		// return $rows;
	}
	public function _getSelectedService($stype)

	{
		$tablename = 'dataTblCompanyServices p';
		$where = "cmpServiceID =" . intval($stype);
		$join = array(
			'LEFT JOIN dataLkpServiceCategories a ON p.cmpServiceCat = a.catname',
			'LEFT JOIN dataTBL_IMPORTServicesFormulas s ON p.cmpServiceID = s.ServiceID',
		);
		$fields = array(
			'p.cmpServiceID',
			'p.cmpServiceCat',
			'p.cmpServiceName',
			'p.cmpServiceDesc',
			'p.cmpProposalTextAlt',
			'p.cmpProposalTextAltES',
			'p.cmpProposalText',
			'p.cmpServiceCreatedby',
			'p.cmpServiceDefaultRate',
			'p.cmpServicePreferredRate',
			'p.cmpServiceOption',
			'p.cmpServiceUpdatedby',
			'p.cmpServiceLastUpdate',
			'a.catname',
			'a.catcolor',
			's.SubService',
			's.Human_Input',
			's.System_output_Formula',
			's.Cost_calculation',
		);
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _CloseWorkOrder($pid)

	{
		$data['jobStatus'] = 6;
		$data['jobCompletedBy'] = $this->USER_ID;
		$data['jobCompleted'] = 1;
		$data['jobReadyToBill'] = 1;
		$data['jobCompletedDateTime'] = $this->CurrentDate;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// also insert a note
		$tablename = 'POTblJobOrderNotes';
		$jnotReminderDate = null;
		$jnotReminder = 0;
		$data = array();
		$data['jnotJobId'] = $pid;
		$data['jnotNote'] = $this->USER_FULLNAME . ' marked this job completed.';
		$data['jnotReminder'] = $jnotReminder;
		$data['jnotReminderDate'] = $jnotReminderDate;
		$data['jnotCreatedBy'] = $this->USER_ID;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _CloseAndBill($pid)

	{
		$data['jobStatus'] = 8; //billed
		$data['jobBilledBy'] = $this->USER_ID;
		$data['jobBilled'] = 1;
		$data['jobBilledDate'] = $this->CurrentDate;
		$data['jobBillingInvoice'] = $this->validate->post('jobBillingInvoice', 'SAFETEXT');
		$data['jobBillingAmount'] = $this->validate->post('jobBillingAmount', 'FLOAT');
		$data['jobBillingNote'] = $this->validate->post('jobBillingNote', 'SAFETEXT');
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// also insert a note
		$tablename = 'POTblJobOrderNotes';
		$jnotReminderDate = null;
		$jnotReminder = 0;
		$data = array();
		$data['jnotJobId'] = $pid;
		$data['jnotNote'] = $this->USER_FULLNAME . ' marked this job billed.';
		$data['jnotReminder'] = $jnotReminder;
		$data['jnotReminderDate'] = $jnotReminderDate;
		$data['jnotCreatedBy'] = $this->USER_ID;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _rejectPO($pid, $switch = null)

	{
		$jobRejectedReason = $this->validate->post('jobRejectedReason', 'TEXT');
		$jobStatus = 3; //reject by default
		$rejected = "PROPOSAL REJECTED:";
		If ($switch)
		{
			$jobStatus = 1;
			$rejected = "PROPOSAL RE OPENED:";
		}
		$data['jobApproved'] = 0;
		$data['jobStatus'] = $jobStatus;
		$data['jobRejectedBy'] = $this->USER_ID;
		$data['jobRejectedDate'] = $this->CurrentDate;
		$data['jobRejectedReason'] = ($jobRejectedReason);
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// also insert a note
		$tablename = 'POTblJobOrderNotes';
		$jnotReminderDate = null;
		$jnotReminder = 0;
		$data = array();
		$data['jnotJobId'] = $pid;
		$data['jnotNote'] = $rejected . ($jobRejectedReason);
		$data['jnotReminder'] = $jnotReminder;
		$data['jnotReminderDate'] = $jnotReminderDate;
		$data['jnotCreatedBy'] = $this->USER_ID;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _convertPO($pid)

	{
		// create new job Master ID
		// jobMasterCode derive from formula YEAR-MONTH-NUMBER OF JOBS THIS YEAR
		// first get number of jobs this _YEAR
		$jobMasterID = $this->input->post('jobMasterID'); // do we have a job master id to link to?

		if ($jobMasterID == 0) // then create a new one
		{
			$jobMasterNumber = 1;
			$currYear = date("Y", strtotime($this->CurrentDate));
			$currMonth = date("m", strtotime($this->CurrentDate));
			$items = array(
				'tableName' => 'WOTblJobMaster',
				'fields' => 'MAX(jobMasterNumber) as MAXID',
				'where' => 'jobMasterYear =' . $currYear,
			);
			if (false === ($result = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			// if no numbers for this year start at 1
			if (!$result['MAXID'])
			{
				$id = 1;
			}
			else
			{
				$id = $result['MAXID'] + 1;
			}
			// start a new job Master get id
			$data['jobMasterMonth'] = $currMonth;
			$data['jobMasterYear'] = $currYear;
			$data['jobMasterNumber'] = $id;
			$data['jobMasterCreatedBy'] = $this->USER_ID;
			$items = array(
				'tableName' => 'WOTblJobMaster',
				'data' => $data,
			);
			if (false === ($result = $this->dbpdo->insert($items)))
			{

				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}

			$jobMasterID = $result;
			$data = array();
			$data['jobMasterID'] = $result;
		}
		else
		// use existing work order to link it to
		{
			$data = array();
			$data['jobMasterID'] = $jobMasterID;
		}
		// change status of proposal
		$data['jobStatus'] = 5;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $jobMasterID;
	}
	public function _approvePO($pid, $switch = null)

	{
		$approve = 1;
		$data['jobStatus'] = 2;
		If ($switch)
		{
			$approve = 0;
			$data['jobStatus'] = 1;
		}
		$data['jobApprovedBy'] = $this->USER_ID;
		$data['jobApprovedDate'] = $this->CurrentDate;
		$data['jobApproved'] = $approve;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updateDiscount($pid)

	{
		$data['jobDiscount'] = $this->input->post('jobDiscount');
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updateWONTO($pid)

	{
		$data['jobNTOSentBy'] = $this->USER_ID;
		$data['jobNTOSentDatetime'] = $this->CurrentDate;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _completeService($sid, $pid)

	{
		$data['jordStatus'] = 'COMPLETED';
		$data['jordUpdatedBy'] = $this->USER_ID;
		$data['jordUpdatedDate'] = $this->CurrentDate;
		$data['jordCompletedDateTime'] = $this->CurrentDate;
		$data['jordCompletedBy'] = $this->USER_ID;
		$data['jordCompleted'] = 1;
		$where = 'jordID = ' . $sid;
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// ok are all my services completed or cancelled
		$where = array(
			'jordjobID = ' . $pid,
			'(jordStatus <> "CANCELLED" AND jordStatus <> "COMPLETED")',
		);
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		if ($rows == 0)
		{
			// all completed so mark ready to close
			$data = array();
			$data['jobReadyToClose'] = 1;
			$data['JobLastUpdated'] = $this->CurrentDate;
			$data['jobLastUpdatedBy'] = $this->USER_ID;
			$where = array(
				'jobID = ' . $pid
			);
			$items = array(
				'tableName' => 'POTblJobOrders',
				'data' => $data,
				'where' => $where,
			);
			if (false === ($rows = $this->dbpdo->update($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		return $rows;
	}
	public function _updateWOMOT($pid)

	{
		$data['jobMOTSentBy'] = $this->USER_ID;
		$data['jobMOTSentDatetime'] = $this->CurrentDate;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updatePOText($id)

	{
		$jordProposalText = $this->validate->post('jordProposalText', 'TEXT');
		$data['jordProposalText'] = $jordProposalText;
		$where = 'jordID = ' . $id;
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updatePOManagers($pid)

	{
		$jobSalesManagerAssigned = $this->validate->post('jobSalesManagerAssigned', 'INTEGER');
		$jobSalesAssigned = $this->validate->post('jobSalesAssigned', 'INTEGER');
		$data['jobLastUpdatedBy'] = $this->USER_ID;
		$data['JobLastUpdated'] = $this->CurrentDate;
		$data['jobSalesManagerAssigned'] = $jobSalesManagerAssigned;
		$data['jobSalesAssigned'] = $jobSalesAssigned;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _setAlert($pid, $flag)

	{
		$jobAlertNote = $this->validate->post('jobAlertNote', 'TEXT');
		$data['jobAlertBy'] = $this->USER_ID;
		$data['jobAlert'] = $flag;
		$data['jobAlertNote'] = ($jobAlertNote);
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// also insert a note
		$tablename = 'POTblJobOrderNotes';
		$jnotReminderDate = null;
		$jnotReminder = 0;
		$data = array();
		$data['jnotJobId'] = $pid;
		$data['jnotNote'] = 'ALERT:' . ($jobAlertNote);
		$data['jnotReminder'] = $jnotReminder;
		$data['jnotReminderDate'] = $jnotReminderDate;
		$data['jnotCreatedBy'] = $this->USER_ID;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getMultiPricing()

	{
		$items = array(
			'tableName' => 'dataTblMultiVendorPricing',
			'orderBy' => 'SERVICE, SERVICE_DESC',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getstripingservice()

	{
		$items = array(
			'tableName' => 'dataTblStripingServices',
			'orderBy' => 'SERVICE',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getMultiPricingW($pid, $sid)

	{
		$data = array();
		$result = array();
		$items = array(
			'tableName' => 'dataTblMultiVendorPricing',
			'orderBy' => 'dataTblStripingServices.DSORT',
			'join' => 'LEFT JOIN dataTblStripingServices ON dataTblStripingServices.SERVICE = dataTblMultiVendorPricing.SERVICE',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		// loop througn each item
		$quans = array();
		foreach($rows as $r)
		{
			// try and get a value if already inserted
			$items = array(
				'tableName' => 'POTbljobOrderMultiPricing',
				'where' => 'jobmultijordID =' . $sid . ' AND jobmultiScatID =' . $r['ScatID'],
			);
			if (false === ($scats = $this->dbpdo->getOne($items)))
			{
				$data['ScatID'] = $r['ScatID'];
				$data['SERVICE'] = $r['SERVICE'];
				$data['SERVICE_DESC'] = $r['SERVICE_DESC'];
				$data['PFS'] = $r['PFS'];
				$data['Native_Lines'] = $r['Native_Lines'];
				$data['Scott_Munroe'] = $r['Scott_Munroe'];
				$data['All_Striping'] = $r['All_Striping'];
				$data['STANDARD'] = $r['STANDARD'];
				$data['quantity'] = 0;
			}
			else
			{
				$data['ScatID'] = $r['ScatID'];
				$data['SERVICE'] = $r['SERVICE'];
				$data['SERVICE_DESC'] = $r['SERVICE_DESC'];
				$data['PFS'] = $r['PFS'];
				$data['Native_Lines'] = $r['Native_Lines'];
				$data['Scott_Munroe'] = $r['Scott_Munroe'];
				$data['All_Striping'] = $r['All_Striping'];
				$data['STANDARD'] = $r['STANDARD'];
				$data['quantity'] = $scats['jobmultiQuantity'];
			}
			$result[] = $data;
		}
		return $result;
	}
	public function _updatePOAddress($pid)

	{
		$jobName = $this->validate->post('jobName', 'TEXT', FALSE);
		$jobPrimaryContact = $this->validate->post('jobPrimaryContact', 'TEXT', FALSE);
		$jobPrimaryEmail = $this->validate->post('jobPrimaryEmail', 'TEXT', FALSE);
		$jobPrimaryPhone = $this->validate->post('jobPrimaryPhone', 'SAFETEXT');
		$jobAltPhone = $this->validate->post('jobAltPhone', 'SAFETEXT');
		$jobAddress1 = $this->validate->post('jobBillingAddress1', 'TEXT', FALSE);
		$jobAddress2 = $this->validate->post('jobBillingAddress2', 'TEXT', FALSE);
		$jobCity = $this->validate->post('jobBillingCity', 'TEXT', FALSE);
		$jobState = $this->validate->post('jobBillingState', 'TEXT', FALSE);
		$jobZip = $this->validate->post('jobBillingZip', 'TEXT', FALSE);
		if (!$jobAddress2)
		{
			$jobAddress2 = '';
		}
		if (!$jobCity)
		{
			$jobCity = '';
		}
		$jobNTO = 0;
		if ($this->input->post('jobNTO') == 1)
		{
			$jobNTO = 1;
		}
		$jobPermit = 0;
		if ($this->input->post('jobPermit') == 1)
		{
			$jobPermit = 1;
		}
		$data['jobName'] = ($jobName);
		$data['jobPrimaryContact'] = ($jobPrimaryContact);
		$data['jobPrimaryEmail'] = $jobPrimaryEmail;
		$data['jobPrimaryPhone'] = $jobPrimaryPhone;
		$data['jobAltPhone'] = $jobAltPhone;
		$data['jobLastUpdatedBy'] = $this->USER_ID;
		$data['jobNTO'] = $jobNTO;
		$data['jobPermit'] = $jobPermit;
		$data['JobLastUpdated'] = $this->CurrentDate;
		$data['jobBillingAddress1'] = ($jobAddress1);
		$data['jobBillingAddress2'] = ($jobAddress2);
		$data['jobBillingCity'] = $jobCity;
		$data['jobBillingState'] = $jobState;
		$data['jobBillingZip'] = $jobZip;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updatePOLocation($pid)

	{
		$jobAddress1 = $this->validate->post('jobAddress1', 'TEXT', FALSE);
		$jobAddress2 = $this->validate->post('jobAddress2', 'TEXT', FALSE);
		$jobCity = $this->validate->post('jobCity', 'TEXT', FALSE);
		$jobState = $this->validate->post('jobState', 'TEXT', FALSE);
		$jobParcel = $this->validate->post('jobParcel', 'TEXT', FALSE);
		$jobZip = $this->validate->post('jobZip', 'TEXT', FALSE);
		if (!$jobAddress2)
		{
			$jobAddress2 = '';
		}
		if (!$jobParcel)
		{
			$jobParcel = '';
		}
		if (!$jobCity)
		{
			$jobCity = '';
		}
		$data['jobLastUpdatedBy'] = $this->USER_ID;
		$data['JobLastUpdated'] = $this->CurrentDate;
		$data['jobAddress1'] = ($jobAddress1);
		$data['jobAddress2'] = ($jobAddress2);
		$data['jobCity'] = $jobCity;
		$data['jobState'] = $jobState;
		$data['jobZip'] = $jobZip;
		$data['jobParcel'] = $jobParcel;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updatePOClient($pid)

	{
		$jobcntID = $this->validate->post('jobcntID', 'INTEGER');

		$data['jobcntID'] = $jobcntID;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updateWOAddress($pid)

	{
		$jobPrimaryContact = $this->validate->post('jobPrimaryContact', 'TEXT', FALSE);
		$jobPrimaryEmail = $this->validate->post('jobPrimaryEmail', 'TEXT', FALSE);
		$jobPrimaryPhone = $this->validate->post('jobPrimaryPhone', 'SAFETEXT', FALSE);
		$jobAltPhone = $this->validate->post('jobAltPhone', 'SAFETEXT', FALSE);
		$jobBillingAddress1 = $this->validate->post('jobBillingAddress1', 'TEXT', FALSE);
		$jobBillingAddress2 = $this->validate->post('jobBillingAddress2', 'TEXT', FALSE);
		$jobBillingCity = $this->validate->post('jobBillingCity', 'TEXT', FALSE);
		$jobBillingState = $this->validate->post('jobBillingState', 'SAFETEXT', FALSE);
		$jobBillingZip = $this->validate->post('jobBillingZip', 'SAFETEXT', FALSE);
		$jobNTO = 0;
		if ($this->input->post('jobNTO') == 1)
		{
			$jobNTO = 1;
		}
		$jobPermit = 0;
		if ($this->input->post('jobPermit') == 1)
		{
			$jobPermit = 1;
		}
		$jobMOT = 0;
		if ($this->input->post('jobMOT') == 1)
		{
			$jobMOT = 1;
		}
		$data['jobPrimaryContact'] = $jobPrimaryContact;
		$data['jobPrimaryEmail'] = $jobPrimaryEmail;
		$data['jobPrimaryPhone'] = $jobPrimaryPhone;
		$data['jobAltPhone'] = $jobAltPhone;
		$data['jobLastUpdatedBy'] = $this->USER_ID;
		$data['jobMOT'] = $jobMOT;
		$data['jobNTO'] = $jobNTO;
		$data['jobPermit'] = $jobPermit;
		$data['JobLastUpdated'] = $this->CurrentDate;
		$data['jobBillingAddress1'] = ($jobBillingAddress1);
		$data['jobBillingAddress2'] = ($jobBillingAddress2);
		$data['jobBillingCity'] = $jobBillingCity;
		$data['jobBillingState'] = $jobBillingState;
		$data['jobBillingZip'] = $jobBillingZip;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _updateWOSAddress($pid)

	{
		$jobAddress1 = $this->validate->post('jobAddress1', 'TEXT', FALSE);
		$jobAddress2 = $this->validate->post('jobAddress2', 'TEXT', FALSE);
		$jobCity = $this->validate->post('jobCity', 'TEXT', FALSE);
		$jobState = $this->validate->post('jobState', 'SAFETEXT', FALSE);
		$jobZip = $this->validate->post('jobZip', 'SAFETEXT', FALSE);
		$data['jobLastUpdatedBy'] = $this->USER_ID;
		$data['JobLastUpdated'] = $this->CurrentDate;
		$data['jobAddress1'] = ($jobAddress1);
		$data['jobAddress2'] = ($jobAddress2);
		$data['jobCity'] = $jobCity;
		$data['jobState'] = $jobState;
		$data['jobZip'] = $jobZip;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _changeSortOrder($jordID, $value)

	{
		$tablename = 'POTblJobOrderDetail';
		$where = "jordID =" . $jordID;
		$data['jordSort'] = $value;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getAllPODetails($pid = null, $sid = null) //proposal id

	{
		if (!$sid)
		{
			$where = 'p.jordJobID  = ' . $pid;
		}
		else
		{
			$where = 'p.jordID  = ' . $sid;
		}
		if ($this->USER_ROLE == 1 || $this->USER_ROLE == 6 || $this->USER_ROLE == 2 || $this->USER_ROLE == 3)
		{
			// admin can see all
		}
		else
		// non admin must be assigned in some way
		{
			$where.= ' AND (p.jordJobManagerID =' . $this->USER_ID . ' OR p.jordJobManagerID2 =' . $this->USER_ID . ' OR j.jobCreatedBy =' . $this->USER_ID . ')';
		}
		$tablename = 'POTblJobOrderDetail p';
		$join = array(
			'LEFT JOIN dataTblCompanyServices a ON p.jordServiceID = a.cmpServiceID',
			'LEFT JOIN  POTblJobOrders j ON p.jordJobID = j.jobId',
			'LEFT JOIN crmTblContacts b ON p.jordVendorID  = b.cntId',
			'LEFT JOIN crmTblContacts c ON p.jordJobManagerID  = c.cntId',
			'LEFT JOIN crmTblContacts d ON p.jordJobManagerID2  = d.cntId',
		);
		$fields = array(
			'p.jordID',
			'p.jordStatus',
			'p.jordJobID',
			'p.jordName',
			'p.jordSort',
			'p.jordServiceID',
			'j.jobProjectDate',
			// job site location
			'p.jordAddress1',
			'p.jordAddress2',
			'p.jordState',
			'p.jordCity',
			'p.jordZip',
			'p.jordParcel',
			'p.jordCustomNote',
			'p.jordStripingVendor',
			'p.jordProposalText',
			'p.jordCostPerDay',
			'p.jordDays',
			'p.jordVendorID',
			'p.jordVendorServiceDescription ',
			'p.jordCostPerLF',
			'p.jordLinearFeet',
			'p.jordSquareFeet',
			'p.jordCubicYards',
			'p.jordTons',
			'p.jordLoads',
			'p.jordSQYards',
			'p.jordLocations',
			'p.jordDepthInInches',
			'p.jordProfit',
			'p.jordPhases',
			'p.jordBreakeven',
			'p.jordYield',
			'p.jordPrimer',
			'p.jordFastSet',
			'p.jordSand',
			'p.jordAdditive',
			'p.jordSealer',
			'p.jordNote',
			'p.jordOverhead',
			'p.jordCost',
			'p.jordJobManagerID',
			'p.jordJobManagerID2',
			'p.jordStartDate',
			'p.jordEndDate',
			'p.jordScheduledBy',
			'p.jordUpdatedBy',
			'p.jordUpdatedDate',
			'a.cmpServiceID',
			'a.cmpServiceCat',
			'a.cmpServiceName',
			'a.cmpProposalText',
			'a.cmpServiceDesc',
			'a.cmpServiceCreatedby',
			'a.cmpServiceDefaultRate',
			'a.cmpServicePreferredRate',
			'a.cmpServiceOption',
			'a.cmpServiceUpdatedby',
			'a.cmpServiceLastUpdate',
			'a.cmpProposalTextAlt',
			'a.cmpProposalTextAltES',
			// job manager 1
			'c.cntFirstName as manager1firstname',
			'c.cntLastName as manager1lastname',
			'c.cntPrimaryPhone as manager1phone',
			// job manager 2
			'd.cntFirstName as manager2firstname',
			'd.cntLastName as manager2lastname',
			'b.cntFirstName as subfirstname',
			'b.cntOverHead',
			'b.cntAltContactName as subaltname',
			'b.cntLastName as sublastname',
			'(SELECT COUNT(*) FROM WOTbljobOrderPermits WHERE p.jordID = WOTbljobOrderPermits.wopjordID  AND (WOTbljobOrderPermits.wopStatus <> "Completed" OR WOTbljobOrderPermits.wopStatus <> "Approved")) AS pending_permits',
		);
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'where' => $where,
			'orderBy' => 'p.jordSort',
		);
		if (!$sid)
		{
			if (false === ($rows = $this->dbpdo->get($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		else
		{
			if (false === ($rows = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		return $rows;
	}
	public function _getPOServices($pid) //po id

	{
		$where = 'jordjobID  = ' . $pid;
		$fields = array(
			'*'
		);
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _togglePending($sid) //get single service

	{
		$where = array(
			'jordID =' . $sid
		);
		$fields = array(
			'*'
		);
		$tablename = 'POTblJobOrderDetail';
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		if ($rows['jordStatus'] == "PENDING")
		{
			$data = array(
				'jordStatus' => 'NOT SCHEDULED'
			);
			$items = array(
				'tableName' => $tablename,
				'where' => $where,
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->update($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		else
		{
			$data = array(
				'jordStatus' => 'PENDING'
			);
			$items = array(
				'tableName' => $tablename,
				'where' => $where,
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->update($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		return $rows;
	}
	public function _getPOService($pid, $sid) //get single service

	{
		$where = array(
			'jordjobID =' . $pid,
			'jordID =' . $sid
		);
		$fields = array(
			'*'
		);
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPODetails($sid) //detail id

	{
		$where = 'jordID  = ' . $sid;
		$fields = array(
			'*'
		);
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _deleteMedia($pid, $note_id)

	{
		$tablename = 'POTblJobOrderMedia';
		$where = array(
			'jobmdJobID = :cid',
			'jobmdId = :noteid',
		);
		$params = array(
			'cid' => $pid,
			'noteid' => $note_id,
		);
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'params' => $params,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPOMaterials($pid)

	{
		$tablename = 'POTblMaterialsCost';
		$where = array(
			'omatjobID = :pid',
		);
		$params = array(
			'pid' => $pid,
		);
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'params' => $params,
		);
		if (false === ($rows = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		if ($rows == 0)
		{
			$this->_updatePricing($pid);
		}
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getMediaByID($ids, $pid)

	{
		$instr = implode(",", $ids);
		$tablename = 'POTblJobOrderMedia';
		$fields = array(
			'*'
		);
		$join = array(
			'LEFT JOIN POLkpDocumentTypes On POLkpDocumentTypes.PODocTypeID = POTblJobOrderMedia.jobmdDocumentTypeID'
		);
		$orderBy = "POLkpDocumentTypes.PODocTypeSection";
		$where = array(
			'jobmdJobID = :cid',
			'jobmdId IN (' . $instr . ')',
		);
		$params = array(
			'cid' => $pid,
		);
		// $orderBy = 'jobmdDocumentTypeID';
		$items = array(
			'tableName' => $tablename,
			'params' => $params,
			'join' => $join,
			'where' => $where,
			'fields' => $fields,
			'orderBy' => $orderBy,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getSitePlan($pid, $sid = null)

	{
		if ($sid)
		{
			$tablename = 'POTblJobOrderMedia';
			// try service first
			$fields = array(
				'*'
			);
			$where = array(
				'jobmdJobID = :cid',
				'jobmdJordID = :sid',
				'jobmdDocumentTypeID = 4',
			);
			$params = array(
				'sid' => $sid,
				'cid' => $pid,
			);
			$items = array(
				'tableName' => $tablename,
				'params' => $params,
				'where' => $where,
				'fields' => $fields,
			);
			if (false === ($rows = $this->dbpdo->getOne($items)))
			{
				$fields = array(
					'*'
				);
				$where = array(
					'jobmdJobID = :cid',
					'jobmdJordID = 0', // entire proposal
					'jobmdDocumentTypeID = 4',
				);
				$params = array(
					'cid' => $pid,
				);
				$items = array(
					'tableName' => $tablename,
					'params' => $params,
					'where' => $where,
					'fields' => $fields,
				);
				if (false === ($rows = $this->dbpdo->getOne($items)))
				{
					return array(
						'error' => $this->dbpdo->getErrorMessage() . 'not found'
					);
				}
			}
		}
		else
		{
			$tablename = 'POTblJobOrderMedia';
			$fields = array(
				'*'
			);
			$where = array(
				'jobmdJobID = :cid',
				'jobmdJordID = 0', //entire proposal
				'jobmdDocumentTypeID = 4',
			);
			$params = array(
				'cid' => $pid,
			);
			$items = array(
				'tableName' => $tablename,
				'params' => $params,
				'where' => $where,
				'fields' => $fields,
			);
			if (false === ($rows = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage() . ' no record'
				);
			}
		}
		return $rows;
	}
	public function _getMediaByUser($pid)

	{
		$tablename = 'POTblJobOrderMedia p';
		$join = array(
			'LEFT JOIN POTblJobOrderDetail d ON p.jobmdJordID  = d.jordID',
			'LEFT JOIN POLkpDocumentTypes a ON p.jobmdDocumentTypeID  = a.PODocTypeID',
			'LEFT JOIN crmTblContacts b ON p.jobpdUploadedby  = b.cntId',
		);
		$fields = array(
			'p.jobmdId ',
			'p.jobmdAdminOnly',
			'p.jobmdJobID',
			'p.jobmdDocumentTypeID',
			'p.jobmdDescription',
			'p.jobmdFileName',
			'p.jobmdCreatedDateTime',
			'p.jobpdUploadedby',
			'p.jobmdfileType',
			'p.jobmdfilePath',
			'p.jobmdorigName',
			'p.jobmdfileExt',
			'p.jobmdfileSize',
			'p.jobmdisImage',
			'p.jobmdImageWidth',
			'p.jobmdImageHeight',
			'p.jobmdImageType',
			'a.PODocTypeName',
			'd.jordName',
			'CONCAT(b.cntFirstName ," ",b.cntLastName) as uploader',
		);
		$where = array(
			'jobmdJobID = :cid',
			'jobpdUploadedby = ' . $this->USER_ID,
		);
		$params = array(
			'cid' => $pid,
		);
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'join' => $join,
			'params' => $params,
			'fields' => $fields,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getMedia($pid, $sid = null)

	{
		$tablename = 'POTblJobOrderMedia p';
		$join = array(
			'LEFT JOIN POTblJobOrderDetail d ON p.jobmdJordID  = d.jordID',
			'LEFT JOIN POLkpDocumentTypes a ON p.jobmdDocumentTypeID  = a.PODocTypeID',
			'LEFT JOIN crmTblContacts b ON p.jobpdUploadedby  = b.cntId',
		);
		$fields = array(
			'p.jobmdId ',
			'p.jobmdAdminOnly',
			'p.jobmdJobID',
			'p.jobmdDocumentTypeID',
			'p.jobmdDescription',
			'p.jobmdFileName',
			'p.jobmdCreatedDateTime',
			'p.jobpdUploadedby',
			'p.jobmdfileType',
			'p.jobmdfilePath',
			'p.jobmdorigName',
			'p.jobmdfileExt',
			'p.jobmdfileSize',
			'p.jobmdisImage',
			'p.jobmdImageWidth',
			'p.jobmdImageHeight',
			'p.jobmdImageType',
			'a.PODocTypeName',
			'd.jordName',
			'CONCAT(b.cntFirstName ," ",b.cntLastName) as uploader',
		);
		$where = array(
			'jobmdJobID = :cid',
		);
		$params = array(
			'cid' => $pid,
		);
		if ($sid)
		{
			$where = array(
				'jobmdJobID = :cid',
				'jobmdJordID = :sid',
			);
			$params = array(
				'cid' => $pid,
				'sid' => $sid,
			);
		}
		if ($this->USER_ROLE != 1 && $this->USER_ROLE != 6) // admin and office can see all
		{
			$where[] = '((p.jobmdAdminOnly = 1 AND p.jobpdUploadedby = ' . $this->USER_ID . ') OR (p.jobmdAdminOnly <> 1))';
		}
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'join' => $join,
			'params' => $params,
			'fields' => $fields,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getProjectNotes($pid, $note_id = null)

	{

		$tablename = 'POTblJobOrderNotes p';
		$join = array(
			'LEFT JOIN crmTblContacts b ON p.jnotCreatedBy  = b.cntId',
			'LEFT JOIN POTblJobOrderDetail d ON p.jnotJordId  = d.jordID',
		);
		$fields = array(
			'p.*',
			'd.jordName',
			'd.jordID',
			'CONCAT(b.cntFirstName ," ",b.cntLastName) as creator',
		);
		$where = array(
			'jnotJobId = :cid',
		);
		$params = array(
			'cid' => $pid,
		);
		if (!$note_id) //get all
		{
			$items = array(
				'tableName' => $tablename,
				'join' => $join,
				'where' => $where,
				'params' => $params,
				'fields' => $fields,
			);
			if (false === ($rows = $this->dbpdo->get($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		else
		{
			$where = array(
				'jnotJobId = :cid',
				'jnotId = :noteid',
			);
			$params = array(
				'cid' => $pid,
				'noteid' => $note_id,
			);
			$items = array(
				'tableName' => $tablename,
				'join' => $join,
				'where' => $where,
				'params' => $params,
				'fields' => $fields,
			);
			if (false === ($rows = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		return $rows;
	}
	public function _savePONote($pid, $note_id = null)

	{
		$data = array();
		$tablename = 'POTblJobOrderNotes';
		$jnotReminderDate = null;
		$jnotReminder = 0;
		$jnotId = $this->validate->post('jnotId', 'INTEGER');
		$jnotJordId = $this->validate->post('jnotJordId', 'INTEGER');
		$jobID = $this->validate->post('jobID', 'INTEGER');
		$jnotNote = $this->validate->post('jnotNote', 'TEXT');
		if ($this->input->post('jnotReminder') == 1)
		{
			$jnotReminder = 1;
			$jnotReminderDate = $this->input->post('jnotReminderDate');
			$date = new DateTime($jnotReminderDate);
			$jnotReminderDate = $date->format('Y-m-d');
			if ($jnotReminderDate > $this->CurrentDate)
			{
				$data['jnotReminderSent'] = 0; //reset reminder
			}
			else
			{
				$data['jnotReminderSent'] = 1; //cancel reminder if date is in the past
			}
		}
		if (empty($jnotReminderDate))
		{
			$jnotReminder = 0;
			$jnotReminderDate = null;
		}
		$data = array();
		$data['jnotJobId'] = $jobID;
		$data['jnotJordId'] = $jnotJordId;
		$data['jnotNote'] = ($jnotNote);
		$data['jnotReminder'] = $jnotReminder;
		$data['jnotReminderDate'] = $jnotReminderDate;
		$data['jnotCreatedBy'] = $this->USER_ID;
		if (!$note_id) //new record
		{
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->insert($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		else
		// update
		{
			$where = 'jnotId = 0';
			if ($jnotId == $note_id)
			{
				$where = 'jnotId =' . $note_id;
			}
			$items = array(
				'tableName' => $tablename,
				'where' => $where,
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->update($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		return $rows;
	}

	public function _savePODate($pid, $note_id = null)

	{

		$data = array();
		$tablename = 'POTblJobOrders';
		$jnotPDate = null;

		$jobProjectDate = $this->input->post('jpdate');
		$date = new DateTime($jobProjectDate);
		$jobProjectDate = $date->format('Y-m-d');

		$data = array();
		$data['jobID'] = $pid;
		$data['jobProjectDate'] = $jobProjectDate;


				$where = 'jobID =' . $pid;

			$items = array(
				'tableName' => $tablename,
				'where' => $where,
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->update($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}

		return $rows;
	}

	public function _cancelJob($pid, $reopen = null)

	{
		$data = array();
		$tablename = 'POTblJobOrders';
		$where = array(
			'jobID = :pid',
		);
		$params = array(
			'pid' => $pid,
		);
		$data['jobStatus'] = 7;
		if ($reopen)
		{
			$data['jobStatus'] = 5;
		}
		$data['JobLastUpdatedBy'] = $this->USER_ID;
		$data['JobLastUpdated'] = $this->CurrentDate;
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'params' => $params,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->update($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$tablename = 'POTblJobOrderNotes';
		$jnotReminderDate = null;
		$jnotReminder = 0;
		// add note
		$data = array();
		$data['jnotJobId'] = $pid;
		$data['jnotJordId'] = 0;
		$data['jnotNote'] = 'Project was cancelled';
		if ($reopen)
		{
			$data['jnotNote'] = 'Project was re-opened';
		}
		$data['jnotReminder'] = $jnotReminder;
		$data['jnotReminderDate'] = $jnotReminderDate;
		$data['jnotCreatedBy'] = $this->USER_ID;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getLinkstoCustomer($parentid, $propertyid, $uid)

	{
		// do we have any links to this property
		// did I create this property
		$tablename = 'crmTblContacts';
		$where = array(
			'cntid = ' . $propertyid,
			'cntCreatedBy = ' . $uid
		);
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		if ($rows == 1) // ok we can do this
		{
			return $rows;
		}
		// did I have a link to a prior proposal for this propoerty
		$tablename = 'POTblJobOrders';
		$where = array(
			'jobCommunityID =' . $propertyid,
			'(jobCreatedBy =' . $uid . ' OR jobSalesManagerAssigned = ' . $uid . ' OR jobSalesAssigned = ' . $uid . ')',
		);
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getContactNotes($cid, $limit = 10)

	{
		$tablename = 'crmTblContactNotes';
		$fields = array(
			'*'
		);
		$where = array(
			'crmTblContactNotes.cnotContactId  = :cid',
		);
		$orderBy = 'crmTblContactNotes.cnotCreatedDate';
		$params = array(
			'cid' => $cid,
		);
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'params' => $params,
			'fields' => $fields,
			'limit' => $limit,
			'orderBy' => $orderBy,
			'orderType' => 'DESC',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getLastContact($cid)

	{
		$tablename = 'crmTblContactNotes';
		$join = array(
			'LEFT JOIN crmTblContacts c ON crmTblContactNotes.cnotCreatedby = c.cntId',
		);
		$fields = array(
			'CONCAT(c.cntFirstName," ", c.cntLastName) As Creator',
			'crmTblContactNotes.*'
		);
		$where = array(
			'crmTblContactNotes.cnotContactId  = :cid',
		);
		$orderBy = 'crmTblContactNotes.cnotCreatedDate';
		$params = array(
			'cid' => $cid,
		);
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'join' => $join,
			'params' => $params,
			'fields' => $fields,
			'orderBy' => $orderBy,
			'orderType' => 'DESC',
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _uploadMediaM($pid, $results)

	{
		$file_name = $results['file_name'];
		$file_type = $results['file_type'];
		$file_path = $results['file_path'];
		$orig_name = $results['orig_name'];
		$file_ext = $results['file_ext'];
		$file_size = $results['file_size'];
		$is_image = $results['is_image'];
		$image_width = $results['image_width'];
		$image_height = $results['image_height'];
		$image_type = $results['image_type'];
		$jobmdJordID = $this->validate->post("jobmdJordID", "INTEGER");
		$jobmdAdminOnly = $this->validate->post("jobmdAdminOnly", "INTEGER");
		$jobmdDescription = $this->validate->post("jobmdDescription", "TEXT");
		$data['jobmdDocumentTypeID'] = $this->input->post('jobmdDocumentTypeID');
		$data['jobmdJordID'] = $jobmdJordID;
		$data['jobmdAdminOnly'] = $jobmdAdminOnly;
		$data['jobpdUploadedby'] = $this->USER_ID;
		$data['jobmdDescription'] = $jobmdDescription;
		$data['jobmdFileName'] = $file_name;
		$data['jobmdfileType'] = $file_type;
		$data['jobmdfilePath'] = $file_path;
		$data['jobmdorigName'] = $orig_name;
		$data['jobmdfileExt'] = $file_ext;
		$data['jobmdfileSize'] = $file_size;
		$data['jobmdisImage'] = $is_image;
		$data['jobmdImageWidth'] = $image_width;
		$data['jobmdImageHeight'] = $image_height;
		$data['jobmdImageType'] = $image_type;
		$data['jobmdJobID'] = $pid;
		$tablename = 'POTblJobOrderMedia';
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _uploadMedia($pid, $results)

	{
		$file_name = $results['file_name'];
		$file_type = $results['file_type'];
		$file_path = $results['file_path'];
		$orig_name = $results['orig_name'];
		$file_ext = $results['file_ext'];
		$file_size = $results['file_size'];
		$is_image = $results['is_image'];
		$image_width = $results['image_width'];
		$image_height = $results['image_height'];
		$image_type = $results['image_type'];
		$jobmdJordID = $this->validate->post("jobmdJordID", "INTEGER");
		$jobmdAdminOnly = $this->validate->post("jobmdAdminOnly", "INTEGER");
		$jobmdDescription = $this->validate->post("jobmdDescription", "TEXT");
		$data['jobmdDocumentTypeID'] = $this->input->post('jobmdDocumentTypeID');
		$data['jobmdJordID'] = $jobmdJordID;
		$data['jobmdAdminOnly'] = $jobmdAdminOnly;
		$data['jobpdUploadedby'] = $this->USER_ID;
		$data['jobmdDescription'] = $jobmdDescription;
		$data['jobmdFileName'] = $file_name;
		$data['jobmdfileType'] = $file_type;
		$data['jobmdfilePath'] = $file_path;
		$data['jobmdorigName'] = $orig_name;
		$data['jobmdfileExt'] = $file_ext;
		$data['jobmdfileSize'] = $file_size;
		$data['jobmdisImage'] = $is_image;
		$data['jobmdImageWidth'] = $image_width;
		$data['jobmdImageHeight'] = $image_height;
		$data['jobmdImageType'] = $image_type;
		$data['jobmdJobID'] = $pid;
		$tablename = 'POTblJobOrderMedia';
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _fetch_mediaTypes()

	{
		$tablename = 'POLkpDocumentTypes';
		$fields = array(
			'*'
		);
		$orderBy = 'PODocTypeName';
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'orderBy' => $orderBy,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPOOtherlist($pid)

	{
		$tablename = 'dataLkpOtherCosts';
		$fields = array(
			'*'
		);
		$orderBy = 'OtherCost';
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'orderBy' => $orderBy,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPOvehiclelist($pid)

	{
		$tablename = 'dataLkpVehicleTypes';
		$fields = array(
			'*'
		);
		$orderBy = 'vtypeName';
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'orderBy' => $orderBy,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOequipmentlist()

	{
		$tablename = 'dataTblEquipment';
		$fields = array(
			'*'
		);
		$orderBy = 'equipName';
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'orderBy' => $orderBy,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPOequipmentlist()

	{
		$tablename = 'dataTblEquipment';
		$fields = array(
			'*'
		);
		$orderBy = 'equipName';
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'orderBy' => $orderBy,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _createProposalDetail($pid, $stype, $jordVendorID)

	{
		$items = array(
			'tableName' => 'POTblJobOrders',
			'fields' => array(
				'*',
			) ,
			'where' => 'jobID =' . $pid,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$items = array(
			'tableName' => 'dataTblCompanyServices',
			'fields' => array(
				'*',
			) ,
			'where' => 'cmpServiceID =' . $stype,
		);
		if (false === ($service = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$data['jordProposalText'] = $service['cmpProposalText'];
		$data['jordName'] = $service['cmpServiceCat'] . ' ' . $service['cmpServiceName'];
		$data['jordStatus'] = 'NOT SCHEDULED';
		$data['jordServiceID'] = $stype;
		$data['jordVendorID'] = $jordVendorID;
		$data['jordJobID'] = $pid;
		$data['jordAddress1'] = $rows['jobAddress1'];
		$data['jordAddress2'] = $rows['jobAddress2'];
		$data['jordState'] = $rows['jobState'];
		$data['jordCity'] = $rows['jobCity'];
		$data['jordZip'] = $rows['jobZip'];
		$data['jordParcel'] = $rows['jobParcel'];
		$items = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOlaborlist($pid) //get employees

	{
		$tablename = 'crmTblContacts';
		$fields = array(
			'*'
		);
		$where = array(
			'cntIsEmployee = 1 AND cntStatusId = 1',
		);
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'fields' => $fields,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPOlaborlist($pid)

	{
		$tablename = 'dataLkpWorkerRates';
		$fields = array(
			'*'
		);
		$orderBy = 'rateID';
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'orderBy' => $orderBy,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getWOPermitLog($pid, $wopID) //proposal id , permit it

	{
		$tablename = 'WOTbljobOrderPermitLog';
		$fields = array(
			'*'
		);
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _saveWOPermitLog($pid, $wopID)

	{
		/*
		plogID
		plogPermitID
		plogNote
		plogDate
		plogAmount
		plogCreatedBy
		plogCreatedDateTime
		*/
		$data = array();
		$tablename = 'WOTbljobOrderPermitLog';
		$jobID = $this->validate->post('jobID', 'INTEGER');
		$wopType = $this->validate->post('wopType', 'SAFETEXT');
		$wopNumber = $this->validate->post('wopNumber', 'SAFETEXT');
		$wopCounty = $this->validate->post('wopCounty', 'SAFETEXT');
		$wopStatus = $this->validate->post('wopStatus', 'SAFETEXT');
		$wopNote = $this->validate->post('wopNote', 'TEXT');
		$data = array();
		$data['wopType'] = $wopType;
		$data['wopNumber'] = $wopNumber;
		$data['wopCounty'] = ($wopCounty);
		$data['wopStatus'] = $wopStatus;
		$data['wopNote'] = ($wopNote);
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _saveWOPermit($pid, $wopID = null)

	{
		$data = array();
		$tablename = 'WOTbljobOrderPermits';
		$wopjordID = $this->validate->post('wopjordID', 'INTEGER');
		$jobID = $this->validate->post('jobID', 'INTEGER');
		$wopType = $this->validate->post('wopType', 'SAFETEXT');
		$wopNumber = $this->validate->post('wopNumber', 'SAFETEXT');
		$wopCounty = $this->validate->post('wopCounty', 'SAFETEXT');
		$wopStatus = $this->validate->post('wopStatus', 'SAFETEXT');
		$wopNote = $this->validate->post('wopNote', 'TEXT');
		$wopfee1 = $this->validate->post('wopfee1', 'FLOAT');
		$wopfee2 = $this->validate->post('wopfee2', 'FLOAT');
		$data = array();
		$data['wopType'] = $wopType;
		$data['wopNumber'] = $wopNumber;
		$data['wopfee1'] = $wopfee1;
		$data['wopfee2'] = $wopfee2;
		$data['wopCounty'] = $wopCounty;
		$data['wopStatus'] = $wopStatus;
		$data['wopNote'] = ($wopNote);
		$data['wopjordID'] = ($wopjordID);
		if (!$wopID) //new record
		{
			$data['wopjobID'] = $jobID;
			$data['wopCreatedBy'] = $this->USER_ID;
			$data['wopCreatedDate'] = $this->CurrentDate;
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->insert($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		else
		// update

		{
			$where = 'wopID =' . $wopID;
			$items = array(
				'tableName' => $tablename,
				'where' => $where,
				'data' => $data,
			);
			if (false === ($rows = $this->dbpdo->update($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		return $rows;
	}
	public function _checkPermits($pid, $status = null)

	{
		$tablename = 'WOTbljobOrderPermits';
		$fields = array(
			'*'
		);
		if ($status)
		{
			$where = 'wopStatus = "' . $status . '" AND wopjobID =' . $pid;
		}
		else
		{
			$where = 'wopjobID =' . $pid;
		}
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _openPermits($pid, $all = false)

	{
		$tablename = 'WOTbljobOrderPermits';
		$fields = array(
			'*'
		);
		if (!$all)
		{
			$where = 'wopStatus = "Approved" AND wopjobID =' . $pid;
		}
		else
		{
			$where = 'wopjobID =' . $pid;
		}
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _saveServiceChecklist()

	{
		$serviceData = $this->dbpdo->createFieldArrayFromPOST('WOTbljobOrderCheckList');
		$date = new DateTime($serviceData['checklistDate']);
		$serviceData['checklistDate'] = $date->format('Y-m-d');
		$items = array(
			'tableName' => 'WOTbljobOrderCheckList',
			'data' => $serviceData,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getServiceChecklist($sid)

	{
		$tablename = 'WOTbljobOrderCheckList p';
		$join = array(
			'LEFT JOIN crmTblContacts m ON p.checkListUser = m.cntId',
		);
		$fields = array(
			'p.*',
			'm.cntFirstName',
			'm.cntLastName',
		);
		$where = 'wochecklistjordID = ' . $sid;
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _printServiceChecklist($sid)

	{
		$tablename = 'WOTbljobOrderCheckList p';
		$join = array(
			'LEFT JOIN crmTblContacts m ON p.checkListUser = m.cntId',
			'LEFT JOIN POTblJobOrderDetail d ON p.wochecklistjordID = d.jordID',
			'LEFT JOIN POTblJobOrders j ON d.jordjobID = j.jobID',
			'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = j.jobMasterID',
		);
		$fields = array(
			'p.*',
			'm.cntFirstName',
			'm.cntLastName',
			'd.jordName',
			'd.jordCustomNote',
			'w.jobMasterYear',
			'w.jobMasterMonth',
			'w.jobMasterNumber',
		);
		$where = 'wochecklistID = ' . $sid;
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getChecklist($type)

	{
		$tablename = 'WOLkpjobOrderCheckList';
		$fields = array(
			'*'
		);
		$where = 'clServiceCat = "' . $type . '"';
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _savePermitLog($wopID)

	{
		$tablename = 'WOTbljobOrderPermitLog';
		$plogNote = $this->validate->post('plogNote', 'TEXT');
		$plogHours = $this->validate->post('plogHours', 'INTEGER');
		$plogDate = $this->validate->post('plogDate', 'DATE');
		$date = new DateTime($plogDate);
		$plogDate = $date->format('Y-m-d');
		$data = array();
		$data['plogwopID'] = $wopID;
		$data['plogCreatedBy'] = $this->USER_ID;
		$data['plogDate'] = $plogDate;
		$data['plogNote'] = ($plogNote);
		$data['plogHours'] = $plogHours;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		if (false === ($rows = $this->dbpdo->insert($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _removePermit($wopID)

	{
		$tablename = 'WOTbljobOrderPermits';
		$where = 'wopID =' . $wopID;
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _removePermitLog($wopID)

	{
		$tablename = 'WOTbljobOrderPermitLog';
		$where = 'plogID =' . $wopID;
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->delete($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPermitsLog($wopID)

	{
		$tablename = 'WOTbljobOrderPermits';
		$join = array(
			'LEFT JOIN WOTbljobOrderPermitLog ON WOTbljobOrderPermits.wopID = WOTbljobOrderPermitLog.plogwopID',
			'LEFT JOIN POTblJobOrderDetail ON POTblJobOrderDetail.jordID = WOTbljobOrderPermits.wopjordID',
		);
		$fields = array(
			'WOTbljobOrderPermitLog.*',
			'WOTbljobOrderPermits.wopNumber',
			'WOTbljobOrderPermits.wopCounty',
			'POTblJobOrderDetail.jordName',
		);
		$where = 'plogwopID =' . $wopID;
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'where' => $where,
			'join' => $join,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPermits($pid, $id = null)

	{
		$tablename = 'WOTbljobOrderPermits d';
		$join = array(
			//            'LEFT JOIN WOTbljobOrderPermitLog ON d.wopID = WOTbljobOrderPermitLog.plogwopID',
			'LEFT JOIN POTblJobOrderDetail s ON d.wopjordID = s.jordID',
		);
		$fields = array(
			'd.*',
			's.jordID',
			's.jordName',
			'(SELECT SUM(plogHours) FROM WOTbljobOrderPermitLog WHERE d.wopID = WOTbljobOrderPermitLog.plogwopID) AS loghours',
		);
		if (!$id)
		{
			$where = 'wopjobID =' . $pid;
			$items = array(
				'tableName' => $tablename,
				'join' => $join,
				'fields' => $fields,
				'where' => $where,
			);
			if (false === ($rows = $this->dbpdo->get($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		else
		{
			$where = 'wopID =' . $id;
			$items = array(
				'tableName' => $tablename,
				'join' => $join,
				'fields' => $fields,
				'where' => $where,
			);
			if (false === ($rows = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
		}
		return $rows;
	}
	public function _getServicePermits($pid, $sid, $approved = false)

	{
		// gets all permits for a specific service
		$tablename = 'WOTbljobOrderPermits d';
		$join = array(
			'LEFT JOIN POTblJobOrderDetail s ON d.wopjordID = s.jordID',
		);
		$fields = array(
			'd.*',
			's.jordID',
			's.jordName',
		);
		$where = 'wopjobID =' . $pid . ' AND wopjordID =' . $sid;
		if ($approved) //show count if any are not ready
		{
			$where = $where . " AND (wopStatus != 'Approved' AND wopStatus != 'Completed')";
		}
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'where' => $where,
		);
		if (false === ($rows = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPermitStatus()

	{
		$fields = array(
			'*'
		);
		$items = array(
			'tableName' => 'WOLkpPermitStatus',
			'fields' => $fields,
			'orderBy' => 'wopSort',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getPermitTypes()

	{
		$fields = array(
			'*'
		);
		$items = array(
			'tableName' => 'WOLkpPermitTypes',
			'fields' => $fields,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getEmployee($id = null)

	{
		$tablename = 'crmTblContacts m';
		$keyfield = 'cntId';
		$join = array(
			'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
		);
		$fields = array(
			'm.cntId',
			'm.cntFirstName',
			'm.cntLastName',
			'm.cntMiddleName',
			'm.cntSalutation',
			'm.cntGender',
			'm.cntAvatar',
			'm.cntSignature',
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
			'(SELECT COUNT(*) FROM crmTblContactNotes WHERE m.cntId = crmTblContactNotes.cnotContactId) AS note_count',
			'm.cntSecAccess',
			'm.cntRole',
			'm.cntPassword',
			'm.cntAltContactName',
			'm.cntcid',
		);
		if (!$id)
		{
			$where = array(
				'm.cntIsEmployee = 1 AND cntStatusId = 1',
			);
			$items = array(
				'tableName' => $tablename,
				'where' => $where,
				'fields' => $fields,
			);
			if (false === ($rows = $this->dbpdo->get($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			return $rows;
		}
		else
		{
			// get one
			// options where= params, params = data binding, join, groupBy, orderBy, orderType, limit, start,fields
			$where = array(
				$keyfield . ' = :id',
			);
			$params = array(
				'id' => $id,
			);
			$items = array(
				'tableName' => $tablename,
				'where' => $where,
				'params' => $params,
				'fields' => $fields,
			);
			if (false === ($rows = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			if (empty($rows['cntAvatar']) || !file_exists($this->WEBCONFIG['webUploadFolder'] . 'crm/' . $rows['cntAvatar']))
			{
				$rows['cntAvatar'] = null;
			}
			if (empty($rows['cntSignature']) || !file_exists($this->WEBCONFIG['webUploadFolder'] . 'crm/' . $rows['cntSignature']))
			{
				$rows['cntSignature'] = null;
			}
			return $rows;
		}
	}
	public function _getProposalTC($jobID)

	{
		// get TC
		$tablename = 'POTbljobOrderTC';
		$where = array(
			'jobTCjobID = :id',
		);
		$params = array(
			'id' => $jobID,
		);
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'params' => $params,
			'orderBy' => 'jobTCSection',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getTC()

	{
		// get TC
		$tablename = 'dataLkpTC';
		$items = array(
			'tableName' => $tablename,
			'orderBy' => 'TCSection',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _buildTC($jobID)

	{
		// get TC
		$tablename = 'dataLkpTC';
		$items = array(
			'tableName' => $tablename,
			'orderBy' => 'TCSection',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		foreach($rows as $r)
		{
			$data = array();
			$data['jobTCjobID'] = $jobID;
			$data['jobTCText'] = $r['TCText'];
			$data['jobTCSection'] = $r['TCSection'];
			$data['jobTCTitle'] = $r['TCTitle'];
			$data['jobTCCreatedBy'] = $this->USER_ID;
			$items = array(
				'tableName' => 'POTbljobOrderTC',
				'data' => $data,
			);
			if (false === ($result = $this->dbpdo->insert($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			// insert into  POTbljobOrderTC
		}
		return $result;
	}
	public function _getTotalCostByService($jordID)

	{
		$ctotal = array(
			'equipcost' => 0,
			'laborcost' => 0,
			'othercost' => 0,
			'vehiclecost' => 0,
			'materialcost' => 0,
		);
		// get additional costs
		$tablename = 'WOTblJobOrderAdditionalCosts';
		$sumfield = 'jobcostAmount';
		$jid = 'jobcostjordID';
		$items = array(
			'tableName' => $tablename,
			'fields' => array(
				'SUM(jobcostAmount) as sumcost'
			) ,
			'where' => $jid . ' = ' . $jordID,
		);
		if (false === ($rows = $this->dbpdo->getOne($items)))
		{
			return array(
				'error' => "Additional Costs: " . $this->dbpdo->getErrorMessage()
			);
		}
		$sumtotal = $rows['sumcost'];
		if (is_null($rows['sumcost']))
		{
			$sumtotal = 0;
		}
		$ctotal['othercost'] = $sumtotal;
		// get equipment costs
		$tablename = 'WOTbljobOrderEquipment';
		$jid = 'POequipjordID';
		$mycost = 0;
		$items = array(
			'tableName' => $tablename,
			'fields' => array(
				'*'
			) ,
			'where' => $jid . ' = ' . $jordID,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => "Equip: " . $this->dbpdo->getErrorMessage()
			);
		}
		foreach($rows as $r)
		{
			if ($r['POEquipRate'] == 'per day')
			{
				$mycost = $mycost + $r['POequipCost'] * $r['POequipNumber'];
			}
			else
			{
				$mycost = $mycost + $r['POequipCost'] * $r['POequipNumber'] * $r['POequipHours'];
			}
		}
		$ctotal['equipcost'] = $mycost;
		// get vehicle
		$tablename = 'WOTbljobOrderVehicles';
		$jid = 'POVjordID';
		$mycost = 0;
		$items = array(
			'tableName' => $tablename,
			'fields' => array(
				'*'
			) ,
			'where' => $jid . ' = ' . $jordID,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => "Vehicle Costs: " . $this->dbpdo->getErrorMessage()
			);
		}
		foreach($rows as $r)
		{
			$mycost = $mycost + $r['POVHoursUsed'] + $r['POVRate'];
		}
		$ctotal['vehiclecost'] = $mycost;
		// Get materials
		$tablename = 'WOTbljobOrderMaterials';
		$jid = 'womatjordID';
		$mycost = 0;
		$items = array(
			'tableName' => $tablename,
			'fields' => array(
				'*'
			) ,
			'where' => $jid . ' = ' . $jordID,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => "Materials Costs: " . $this->dbpdo->getErrorMessage()
			);
		}
		foreach($rows as $r)
		{
			$mycost = $mycost + $r['womatAmount'] * $r['womatCost'];
		}
		$ctotal['materialcost'] = $mycost;
		// get labor
		$tablename = 'WOTbljobOrderLabor p';
		$jid = 'POlaborjordID';
		$items = array(
			'tableName' => $tablename,
			'fields' => array(
				'(UNIX_TIMESTAMP( CONCAT( p.POlaborDate, ":", p.POlaborEndTime ) ) - UNIX_TIMESTAMP( CONCAT( p.POlaborDate, ":", p.POlaborStartTime ) )) as diff',
			) ,
			'where' => $jid . ' = ' . $jordID,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => "Labor Costs: " . $this->dbpdo->getErrorMessage()
			);
		}
		$sumtotal = 0;
		foreach($rows as $r)
		{
			$sumtotal = $sumtotal + $r['diff'];
		}
		if (is_null($sumtotal))
		{
			$sumtotal = 0;
		}
		$ctotal['laborcost'] = $sumtotal;
		return $ctotal;
	}
	public function _getImages($pid)

	{
		$images = $this->db->query("SELECT * FROM
				`POTblJobOrderMedia`
			WHERE `jobmdJobID` = {$pid}");
		$images = $images->result_array();
		return $images;
	}
	public function _getWorkOrderForMedia($pid)

	{
		$workOrder = $this->db->query("SELECT * FROM
				`POTblJobOrders`
			WHERE `jobID` = {$pid}");
		$workOrder = $workOrder->result_array();
		return $workOrder;
	}
	public function _saveProposalEmail($from, $to, $title, $message, $timestamp, $pid)

	{
		$tablename = 'proposalReminders';
		$data = array();
		$data['proposalID'] = $pid;
		$data['proposalEmailSubject'] = $title;
		$data['proposalEmailBody'] = $message;
		$data['proposalEmailTo'] = $to;
		$data['proposalEmailFrom'] = $from;
		$data['proposalEmailWhenToSend'] = $timestamp;
		$data['propsoalEmailIsReminded'] = 0;
		if ($message && $timestamp && $from)
		{ // insert
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
			);
			if (!$this->dbpdo->insert($items))
			{
				return array(
					'error' => 'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage()
				);
			}
			return true;
		}
	}
	public function _getProposalEmailData()

	{
		$get_rows = $this->db->query('SELECT 
				*
			FROM 
				proposalReminders
			WHERE
				`proposalReminders`.`proposalEmailWhenToSend` = CURDATE()
			AND `proposalReminders`.`propsoalEmailIsReminded` = 0
			');
		$rows = $get_rows->result();
		return $rows;
	}
	public function setProposalEmailToIsReminded($pid)

	{
		$where = 'proposalID = ' . $pid;
		$data = array(
			'propsoalEmailIsReminded' => 1
		);
		$items = array(
			'tableName' => 'proposalReminders',
			'data' => $data,
			'where' => $where,
		);
		return $this->dbpdo->update($items);
	}
	public function _saveWorkorderEmail($from, $to, $title, $message, $timestamp, $pid, $job)

	{
		$tablename = 'workorderReminders';
		$data = array();
		$data['workOrderJobID'] = $job;
		$data['workorderID'] = $pid;
		$data['workorderEmailSubject'] = $title;
		$data['workorderEmailBody'] = $message;
		$data['workorderEmailTo'] = $to;
		$data['workorderEmailFrom'] = $from;
		$data['workorderEmailWhenToSend'] = $timestamp;
		$data['workorderEmailIsReminded'] = 0;
		if ($message && $timestamp && $from)
		{ // insert
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
			);
			if (!$this->dbpdo->insert($items))
			{
				return $this->db->_error_message();
			}
			return $this->db->_error_message();
		}
	}
	public function _getWorkorderEmailData()

	{
		$get_rows = $this->db->query('SELECT 
				*
			FROM 
				workorderReminders
			WHERE
				`workorderReminders`.`workorderEmailWhenToSend` = CURDATE()
			AND `workorderReminders`.`workorderEmailIsReminded` = 0
			');
		$rows = $get_rows->result();
		return $rows;
	}
	public function setWorkorderEmailToIsReminded($job)

	{
		$where = 'workorderJobID = ' . $job;
		$data = array(
			'workorderEmailIsReminded' => 1
		);
		$items = array(
			'tableName' => 'workorderReminders',
			'data' => $data,
			'where' => $where,
		);
		return $this->dbpdo->update($items);
	}
	public function closeAllJobsInWorkorder($pid)

	{
		$data['JobLastUpdatedBy'] = $this->USER_ID;
		$data['JobLastUpdated'] = $this->CurrentDate;
		$data['jobCompleted'] = 1;
		$where = 'jobID = ' . $pid;
		$items = array(
			'tableName' => 'POTblJobOrders',
			'data' => $data,
			'where' => $where,
		);
		$data1['jordCompletedBy'] = $this->USER_ID;
		$data1['jordUpdatedDate'] = date("Y-m-d H:i:s");
		$data['jordCompletedDateTime'] = date("Y-m-d");
		$data1['jordCompleted'] = 1;
		$where1 = 'jordJobID = ' . $pid;
		$items1 = array(
			'tableName' => 'POTblJobOrderDetail',
			'data' => $data1,
			'where' => $where1,
		);
		$this->dbpdo->update($items);
		$this->dbpdo->update($items1);
		return true;
	}
	public function _getSelectedImages($pid, $images)

	{
		$rows = [];
		foreach($images as $image)
		{
			$get_rows = $this->db->query("SELECT * FROM POTblJobOrderMedia WHERE jobmdJobID = " . $pid . " AND jobmdFileName =  " . "'{$image}'");
			$rows[] = $get_rows->result_array();
		}
		return $rows;
	}
	public function _getEmailsForProposals()

	{

		$get_rows = [];
		$times = $this->db->query("SELECT * FROM timeToSendEmails WHERE timeToSend NOT LIKE 7");
		$times = $times->result_array();
		foreach($times as $time)
		{
			$messages = $this->db->query('SELECT 
					*
				FROM 
					proposalEmailTemplate
				LEFT JOIN
					proposalMessages ON(proposalEmailTemplate.ID = proposalMessages.emailTemplateID)
				LEFT JOIN
					POTblJobOrders ON(proposalMessages.projectID = POTblJobOrders.jobID)
				LEFT JOIN
					POTblJobOrderDetail ON(POTblJobOrders.jobID = POTblJobOrderDetail.jordJobID)
				WHERE 
					isHot = 0 AND DATE_ADD(proposalMessages.dateCreated, INTERVAL ' . $time['timeToSend'] . ' DAY) = CURDATE()');
			$get_rows[] = $messages->result();
		}
		$hotmessages = $this->db->query('SELECT 
					*
				FROM
					proposalEmailTemplate
				LEFT JOIN
					proposalMessages ON(proposalEmailTemplate.ID = proposalMessages.emailTemplateID)
				LEFT JOIN
					POTblJobOrders ON(proposalMessages.projectID = POTblJobOrders.jobID)
				LEFT JOIN
					POTblJobOrderDetail ON(POTblJobOrders.jobID = POTblJobOrderDetail.jordJobID)
				WHERE
					isHot = 1 AND DATE_ADD(proposalMessages.dateCreated, INTERVAL 7 DAY) = CURDATE()');
		$get_rows[] = $hotmessages->result();
		return $get_rows;
	}
	public function _saveProposalEmailTemplate($title, $message)

	{
		$tablename = 'proposalEmailTemplate';
		$data = array();
		$data['title'] = $title;
		$data['body'] = $message;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		$this->dbpdo->insert($items);
		return true;
	}
	public function _getEmailTemplates()

	{
		$templates = $this->db->query("SELECT * FROM proposalEmailTemplate");
		return $templates->result_array();
	}
	public function _saveProposalEmailMessage($template, $ishot, $message, $from, $to, $pid, $date)

	{
		$tablename = 'proposalMessages';
		$data = array();
		$data['projectID'] = $pid;
		$data['customMessage'] = $message;
		$data['isHot'] = $ishot;
		$data['emailTemplateID'] = $template;
		$data['emailTo'] = $to;
		$data['emailFrom'] = $from;
		$data['dateCreated'] = $date;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		$this->dbpdo->insert($items);
		return true;
	}
	public function _workorderEmailSubjects()

	{
		$subjects = "SELECT * FROM workorderEmailTemplates";
		$subjects = $this->db->query($subjects);
		return $subjects->result_array();
	}
	public function _workorderEmails($id)

	{
		$get_emails = "SELECT body, subject FROM workorderEmailTemplates WHERE ID = '$id'";
		$get_emails = $this->db->query($get_emails);
		return $get_emails->result_array();
	}
	public function _getEmployeeDetails($id)

	{
		$get_employees = "SELECT * FROM crmTblContacts WHERE cntId = '$id'";
		$get_employees = $this->db->query($get_employees);
		return $get_employees->result();
	}
	public function _getClientDataForEmail($id)

	{
		$get_client_data = "SELECT * FROM POTblJobOrders LEFT JOIN POTblJobOrderDetail ON(POTblJobOrders.jobID = POTblJobOrderDetail.jordJobID) WHERE POTblJobOrders.jobID = '$id'";
		$get_rows = $this->db->query($get_client_data);
		return $get_rows->result();
	}

	public function _getWOScheduledServices2()

	{
		$tablename = 'POTblJobOrderDetail p';
		$join = array(
			'LEFT JOIN POTblJobOrders m ON m.jobid = p.jordJobID',
			'LEFT JOIN crmTblContacts c ON c.cntId = m.jobcntID',
			'LEFT JOIN crmTblContacts s ON s.cntId = m.jobSalesManagerAssigned',
			'LEFT JOIN crmTblContacts j ON j.cntId = p.jordJobManagerID',
			'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = m.jobMasterID',
			'JOIN dataTblCompanyServices d ON d.cmpServiceID = p.jordServiceID',
			'LEFT JOIN WOTbljobOrderPermits pr on pr.wopjordID = p.jordID',
		);
		$fields = array(
			'p.*',
			'pr.wopStatus',
			'pr.wopID',
			'm.jobid',
			'w.jobMasterMonth',
			'w.jobMasterYear',
			'w.jobMasterNumber',
			'd.cmpServiceCat',
			'd.cmpServiceName As ServiceName',
			'c.cntFirstName',
			'c.cntLastName',
			's.cntFirstName As managerFirst',

			's.cntLastName As managerLast',
			'j.cntFirstName As jobmanagerFirst',
			'j.cntLastName As jobmanagerLast',
		);
		$where = array(
			"m.jobMasterID > 0",
			"p.jordStatus <> 'COMPLETED'",
		);
		$orderby = "p.jordStartDate";
		if ($this->USER_ROLE == 4 || $this->USER_ROLE == 5) // job managers
		{
			$where[] = "(jordJobManagerID = " . $this->USER_ID . " OR jordJobManagerID2 = " . $this->USER_ID . ")";
		}
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'where' => $where,
			'orderBy' => $orderby,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	/**
	 *   This was added by JVC
	 *
	 */
	private function _buildAddress($address, $city = '', $state = '', $zip = '', $country = '', $separator = '<br />', $address2 = '')
	{
		$result = array();
		$line1 = array();
		$line1[] = $address;
		if (!empty($address2))
		{
			$line1[] = $address2;
		}
		if (count($line1))
		{
			$result[] = count($line1) > 1 ? implode(', ', $line1) : $line1[0];
		}
		$line2 = array();
		if (!empty($city))
		{
			$line2[] = $city;
		}
		$stateZip = array();
		if (!empty($state))
		{
			$stateZip[] = $state;
		}
		if (!empty($zip))
		{
			$stateZip[] = $zip;
		}
		if (!empty($stateZip))
		{
			$line2[] = implode(' ', $stateZip);
		}
		if (!empty($line2))
		{
			$result[] = implode(', ', $line2);
		}
		if (!empty($country))
		{
			$result[] = $country;
		}
		return implode($separator, $result);
	}
	public function getWOScheduledServicesExtended()

	{
		$tablename = 'POTblJobOrderDetail p';
		$join = array(
			'LEFT JOIN POTblJobOrders m ON m.jobid = p.jordJobID',
			'LEFT JOIN crmTblContacts c ON c.cntId = m.jobcntID',
			'LEFT JOIN crmTblContacts s ON s.cntId = m.jobSalesManagerAssigned',
			'LEFT JOIN crmTblContacts j ON j.cntId = p.jordJobManagerID',
			'LEFT JOIN WOTblJobMaster w ON w.jobMasterID = m.jobMasterID',
			'JOIN dataTblCompanyServices d ON d.cmpServiceID = p.jordServiceID',
			'LEFT JOIN WOTbljobOrderPermits pr on pr.wopjordID = p.jordID',
		);
		$fields = array(
			'p.*', // all from job order detail
			'pr.wopStatus', // status of permits
			'pr.wopID',
			'm.jobid',
			// fields define work order number
			'w.jobMasterMonth',
			'w.jobMasterYear',
			'w.jobMasterNumber',
			'd.cmpServiceCat', //category
			'd.cmpServiceName As ServiceName', //service type
			// customer
			'c.cntFirstName',
			'c.cntLastName',
			// sales manager
			's.cntFirstName As managerFirst',
			's.cntLastName As managerLast',
			// jon manager
			'j.cntFirstName As jobmanagerFirst',
			'j.cntLastName As jobmanagerLast',
		);
		$where = array(
			"m.jobMasterID > 0",
			"p.jordStatus <> 'COMPLETED'", //service is not completed
			"m.jobStatus = 5", //job is active
		);
		/* filter items (check if in POST: submitted filter form, or in GET: pagination) */
		$status = $this->input->post('f_status') ? $this->input->post('f_status') : ($this->input->get('fst') ? $this->input->get('fst') : null);
		$serviceCategory = $this->input->post('f_service_category') ? $this->input->post('f_service_category') : ($this->input->get('fscat') ? $this->input->get('fscat') : null);
		$customerId = $this->input->post('f_customer_id') ? $this->input->post('f_customer_id') : ($this->input->get('fcid') ? $this->input->get('fcid') : null);
		$jobManagerId = $this->input->post('f_job_manager_id') ? $this->input->post('f_job_manager_id') : ($this->input->get('fjmid') ? $this->input->get('fjmid') : null);
		$serviceIds = $this->input->post('f_service_ids') ? $this->input->post('f_service_ids') : ($this->input->get('fsids') ? $this->input->get('fsids') : null);
		$salesManagerIds = $this->input->post('f_sales_manager_ids') ? $this->input->post('f_sales_manager_ids') : ($this->input->get('fsmids') ? $this->input->get('fsmids') : null);
		$address = $this->input->post('f_address') ? $this->input->post('f_address') : ($this->input->get('fad') ? $this->input->get('fad') : null);
		if (!empty($status) || !empty($customerId) || !empty($jobManagerId) || !empty($salesManagerIds) || !empty($serviceCategory) || !empty($serviceIds) || !empty($address))
		{
			if (!empty($status))
			{
				if ($status != '-1')
				{
					$where[] = "jordStatus = '" . $status . "'";
				}
				else
				{
					$status = null;
				}
			}
			if (!empty($serviceCategory))
			{
				if ($serviceCategory != '-1')
				{
					$where[] = "cmpServiceCat = '" . $serviceCategory . "'";
				}
				else
				{
					$serviceCategory = null;
				}
			}
			if (!empty($customerId))
			{
				if ($customerId != '-1')
				{
					$where[] = "jobcntID = '" . $customerId . "'";
				}
				else
				{
					$customerId = null;
				}
			}
			if (!empty($jobManagerId))
			{
				if ($jobManagerId != '-1')
				{
					$where[] = "jobcntID = '" . $jobManagerId . "'";
				}
				else
				{
					$jobManagerId = null;
				}
			}
			if (!empty($serviceIds))
			{
				$where[] = "jordServiceID IN (" . str_replace('|', ',', $serviceIds) . ")";
			}
			if (!empty($salesManagerIds))
			{
				$where[] = "jobSalesManagerAssigned IN (" . str_replace('|', ',', $salesManagerIds) . ")";
			}
			if (!empty($address))
			{
				$where[] = "(jordAddress1 LIKE '%$address%' OR jordAddress2 LIKE '%$address%' OR jordCity LIKE '%$address%' OR jordState LIKE '%$address%' OR jordZip LIKE '%$address%')";
			}
		}
		if ($this->USER_ROLE == 4 || $this->USER_ROLE == 5)
		{ // job managers
			$where[] = "(jordJobManagerID = " . $this->USER_ID . " OR jordJobManagerID2 = " . $this->USER_ID . ")";
		}
		$gotoPage = $this->input->get('p') ? $this->input->get('p') : 1;
		$rowsPerPage = $this->input->get('rp') ? $this->input->get('rp') : 10;
		$startRow = ($gotoPage == 1) ? 0 : (($gotoPage - 1) * $rowsPerPage);
		$orderBy = $this->input->get('o') ? $this->input->get('o') : 'jordStartDate';
		$orderType = $this->input->get('t') ? $this->input->get('t') : 'ASC';
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'where' => $where,
			'limit' => $rowsPerPage,
			'start' => $startRow,
			'setTotal' => $rowsPerPage !== false && $startRow !== false,
			'orderBy' => $orderBy,
			'orderType' => $orderType,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		$totalRows = $this->dbpdo->getTotalRows();
		foreach($rows as & $row)
		{ // _buildAddress($address, $city = '', $state = '', $zip = '', $country = '', $separator = '<br />', $address2 = '')
			$row['fullAdress'] = str_replace('"', '', $this->_buildAddress($row['jordAddress1'], $row['jordCity'], $row['jordState'], $row['jordZip'], null, ' ', $row['jordAddress2']));
		}
		$query = $this->input->server('QUERY_STRING');
		if ($this->input->post('_f'))
		{
			// remove previous filter variables from query and add the new ones:
			$queryArray = explode('&', $query);
			$newArr = array();
			foreach($queryArray as $item)
			{
				if (!empty($item))
				{
					if (strpos($item, 'fst=') !== 0 && strpos($item, 'fcid=') !== 0 && strpos($item, 'fscat=') !== 0 && strpos($item, 'fjmid=') !== 0 && strpos($item, 'fsids=') !== 0 && strpos($item, 'fsmids=') !== 0 && strpos($item, 'fad=') !== 0)
					{
						$newArr[] = $item;
					}
				}
			}
			if (!empty($status) && $status != '-1')
			{
				$newArr[] = 'fst=' . $status;
			}
			if (!empty($customerId) && $customerId != '-1')
			{
				$newArr[] = 'fcid=' . $customerId;
			}
			if (!empty($serviceCategory) && $serviceCategory != '-1')
			{
				$newArr[] = 'fscat=' . $serviceCategory;
			}
			if (!empty($jobManagerId) && $jobManagerId != '-1')
			{
				$newArr[] = 'fjmid=' . $jobManagerId;
			}
			if (!empty($serviceIds))
			{
				$newArr[] = 'fsids=' . $serviceIds;
			}
			if (!empty($salesManagerIds))
			{
				$newArr[] = 'fsmids=' . $salesManagerIds;
			}
			if (!empty($address))
			{
				$newArr[] = 'fad=' . $address;
			}
			$query = implode('&', $newArr);
		}
		$paginator = array(
			'rowsPerPage' => $rowsPerPage,
			'startRow' => $startRow,
			'totalRows' => $totalRows,
			'currentPage' => $gotoPage,
			'lastPage' => (!empty($rowsPerPage)) ? floor(($totalRows - 1) / $rowsPerPage) + 1 : 1,
			'url' => rtrim($this->input->server('REDIRECT_URL') , '/') ,
			'query' => $query,
		);
		$sorter = array(
			'orderBy' => $orderBy,
			'orderType' => $orderType,
			'url' => rtrim($this->input->server('REDIRECT_URL') , '/') ,
			'query' => $query,
		);
		$filter = array(
			'status' => $status,
			'customerId' => $customerId,
			'jobManagerId' => $jobManagerId,
			'salesManagerIds' => $salesManagerIds,
			'serviceCategory' => $serviceCategory,
			'serviceIds' => $serviceIds,
			'address' => $address,
			'url' => rtrim($this->input->server('REDIRECT_URL') , '/') ,
			'query' => $query,
		);
		return array(
			'rows' => $rows,
			'paginator' => $paginator,
			'sorter' => $sorter,
			'filter' => $filter,
		);
	}
	public function buildStatusCB($arr = array(
))
	{
		$items = array(
			'tableName' => 'POLkpjobDetailStatus',
			'fieldKey' => 'OrderStatus',
			'fieldValue' => 'OrderStatus',
			'ordered' => 'OrderStatus',
			'defaultArray' => $arr,
		);
		if (false === ($rows = $this->dbpdo->getFieldAssocArray($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function jobStatusCB()

	{
		$tablename = 'POLkpjobDetailStatus';
		$fields = array(
			'OrderStatus',
		);
		$orderby = "OrderStatus";
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'orderBy' => $orderby,
			'where' => 'OrderStatus <> "COMPLETED" AND OrderStatus <> "CANCELLED" ',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function jobCustomersCB()

	{
		$items = array(
			'tableName' => 'crmTblContacts ',
			'join' => array(
				'LEFT JOIN POTblJobOrders ON POTblJobOrders.jobcntID = crmTblContacts.cntId',
			) ,
			'fields' => array(
				'jobcntID AS ID',
				'TRIM(CONCAT(cntFirstname," ",cntLastname)) AS FULL_NAME',
			) ,
			'where' => array(
				'POTblJobOrders.jobStatus = 5',
			) ,
			'groupBy' => 'FULL_NAME',
			'orderBy' => 'FULL_NAME',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function buildCustomersCB($arr = array(
))
	{
		$items = array(
			'tableName' => 'crmTblContacts ',
			'join' => array(
				'LEFT JOIN POTblJobOrders ON POTblJobOrders.jobcntID = crmTblContacts.cntId',
			) ,
			'fields' => array(
				'jobcntID AS ID',
				'TRIM(CONCAT(cntFirstname," ",cntLastname)) AS FULL_NAME',
			) ,
			'where' => array(
				'POTblJobOrders.jobStatus = 5',
			) ,
			'groupBy' => 'FULL_NAME',
			'orderBy' => 'FULL_NAME',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function JobManagersCB()

	{
		$tablename = 'POTblJobOrderDetail p';
		$items = array(
			'tableName' => $tablename,
			'join' => array(
				'LEFT JOIN crmTblContacts m ON m.cntID = p.jordJobManagerID',
				'LEFT JOIN POTblJobOrders c ON c.jobID = p.jordjobID',
			) ,
			'fields' => array(
				'p.jordJobManagerID AS ID',
				'TRIM(CONCAT(m.cntFirstname," ",m.cntLastname)) AS FULL_NAME',
			) ,
			'where' => array(
				'p.jordStatus <> "CANCELLED" ',
				'p.jordStatus <> "COMPLETED" ',
				'c.jobStatus = 5',
				'p.jordJobManagerID > 0',
			) ,
			'groupBy' => 'FULL_NAME',
			'orderBy' => 'FULL_NAME',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function buildJobManagersCB($arr = array(
))
	{
		$this->load->model('M_Crm');
		if (false === ($rows = $this->M_Crm->_getEmployeeByRole(4)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		foreach($rows as $row)
		{
			$arr[$row['cntId']] = trim($row['cntFirstName'] . ' ' . $row['cntFirstName']);
		}
		return $arr;
	}
	public function JobSalesManagersCB()

	{
		$tablename = 'POTblJobOrders p';
		$items = array(
			'tableName' => $tablename,
			'join' => array(
				'LEFT JOIN crmTblContacts m ON m.cntID = p.jobSalesAssigned',
			) ,
			'fields' => array(
				'p.jobSalesAssigned AS ID',
				'TRIM(CONCAT(m.cntFirstname," ",m.cntLastname)) AS FULL_NAME',
			) ,
			'where' => array(
				'p.jobStatus = 5',
				'p.jobSalesAssigned > 0',
			) ,
			'groupBy' => 'FULL_NAME',
			'orderBy' => 'FULL_NAME',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function buildSalesManagersCB($arr = array(
))
	{
		$this->load->model('M_Crm');
		if (false === ($rows = $this->M_Crm->_getEmployeeByRole(2)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		foreach($rows as $row)
		{
			$arr[$row['cntId']] = trim($row['cntFirstName'] . ' ' . $row['cntFirstName']);
		}
		return $arr;
	}
	public function ServiceCategoriesCB()

	{
		$tablename = 'dataLkpServiceCategories c';
		$join = 'left join dataTblCompanyServices s on s.cmpServiceCat = c.catname';
		$fields = array(
			'c.catname',
			's.cmpServiceID',
			's.cmpServiceName',
		);
		$orderby = "c.catname,s.cmpServiceName";
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'orderBy' => $orderby,
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function buildjobcustomers($arr = array(
))
	{
		$items = array(
			'tableName' => 'dataLkpServiceCategories',
			'fieldKey' => 'catname',
			'fieldValue' => 'catname',
			'ordered' => 'catname',
			'defaultArray' => $arr,
		);
		if (false === ($rows = $this->dbpdo->getFieldAssocArray($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function buildServiceNamesCB($arr = array(
))
	{
		$items = array(
			'tableName' => 'dataTblCompanyServices',
			'fieldKey' => 'cmpServiceID',
			'fieldValue' => 'cmpServiceName',
			'ordered' => 'cmpServiceName',
			'defaultArray' => $arr,
		);
		if (false === ($rows = $this->dbpdo->getFieldAssocArray($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	/**
	 *      END  added by JVC
	 *
	 */
}