<?php
class M_CRM extends CI_Model

{
	public function _getCRMByCat2($cat_id, $id = null)

	{
		$tablename = 'crmFcsContactsCategories';
		$join = array(
			'LEFT JOIN crmTblContacts m ON crmFcsContactsCategories.cntcatContactId = m.cntId',
		);
		$fields = array(
			'*',
			'm.cntFirstName',
			'm.cntLastName',
			'm.cntPrimaryEmail',
			'm.cntPrimaryPhone',
			'm.cntPrimaryAddress1',
			'm.cntPrimaryAddress2',
			'm.cntPrimaryState',
			'm.cntPrimaryCity',
			'm.cntPrimaryZip',
			'm.cntQualified',
			'm.cntParcelNumber',
			'm.cntOverHead',
			'm.cntAltContactName',
			'm.cntcid',
		);
		$cats = '';
		$ncats = '';
		if (is_array($cat_id))
		{
			foreach($cat_id as $c)
			{
				if ($cats == '')
				{
					$cats = $cats . "cntcatCategoryId = " . $c;
					$ncats = $ncats . "m.cntcid = " . $c;
				}
				else
				{
					$cats = $cats . " OR cntcatCategoryId = " . $c;
					$ncats = $ncats . " OR m.cntcid = " . $c;
				}
			}
			$where = array(
				$cats,
				$ncats
			);
			$params = null;
		}
		else
		{
			if ($id)
			{
				$where = array(
					'cntcatCategoryId = :catid OR m.cntcid = :catid',
					'cntcatContactId <> :id',
				);
				$params = array(
					'catid' => $cat_id,
					'id' => $id,
				);
			}
			else
			{
				$where = array(
					'cntcatCategoryId = :catid OR m.cntcid = :catid',
				);
				$params = array(
					'catid' => $cat_id,
				);
			}
		}
		$orderby = "m.cntFirstName, m.cntLastName";
		// now get records
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'join' => $join,
			'orderBy' => $orderby,
			'params' => $params,
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
	public function _getCRMByCat($cat_id, $id = null)

	{
		$tablename = 'crmTblContacts m';
		$join = array(
			'LEFT JOIN crmFcsContactsCategories f ON m.cntId = f.cntcatContactId',
			'LEFT JOIN crmLkpCategories c ON f.cntcatCategoryId = c.ccatid',
		);
		$fields = array(
			'm.cntId',
			'm.cntFirstName',
			'm.cntLastName',
			'm.cntPrimaryEmail',
			'm.cntPrimaryPhone',
			'm.cntPrimaryAddress1',
			'm.cntPrimaryAddress2',
			'm.cntPrimaryState',
			'm.cntPrimaryCity',
			'm.cntPrimaryZip',
			'm.cntQualified',
			'm.cntParcelNumber',
			'm.cntOverHead',
			'm.cntAltContactName',
			'm.cntcid',
			'c.ccatName',
		);
		$params = array();
		if (is_array($cat_id))
		{
			$cats = implode(",", $cat_id);
			$where = 'f.cntcatCategoryId IN (' . $cats . ') OR m.cntcid IN (' . $cats . ') ';
		}
		else
		{
			if ($id)
			{
				$where = array(
					'f.cntcatCategoryId = :catid OR m.cntcid = :catid',
					'f.cntcatContactId <> :id',
				);
				$params = array(
					'catid' => $cat_id,
					'id' => $id,
				);
			}
			else
			{
				$where = array(
					'f.cntcatCategoryId = :catid OR m.cntcid = :catid',
				);
				$params = array(
					'catid' => $cat_id,
				);
			}
		}
		$orderby = "m.cntFirstName, m.cntLastName";
		// now get records
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'join' => $join,
			'orderBy' => $orderby,
			'params' => $params,
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
	public function _getCRMByMainCat($cat_id, $id = null)

	{
		$tablename = 'crmTblContacts m';
		$join = array(
			'LEFT JOIN crmFcsContactsCategories f ON m.cntId = f.cntcatContactId',
			'LEFT JOIN crmLkpCategories c ON f.cntcatCategoryId = c.ccatid',
		);
		$fields = array(
			'm.cntId',
			'm.cntFirstName',
			'm.cntLastName',
			'm.cntPrimaryEmail',
			'm.cntPrimaryPhone',
			'm.cntPrimaryAddress1',
			'm.cntPrimaryAddress2',
			'm.cntPrimaryState',
			'm.cntPrimaryCity',
			'm.cntPrimaryZip',
			'm.cntQualified',
			'm.cntParcelNumber',
			'm.cntOverHead',
			'm.cntAltContactName',
			'm.cntcid',
			'c.ccatName',
		);
		if (is_array($cat_id))
		{
			$cats = implode(",", $cat_id);
			$where = 'm.cntcid IN (' . $cats . ') AND m.cntIsEmployee = 0';
		}
		$orderby = "m.cntFirstName, m.cntLastName";
		// now get records
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'join' => $join,
			'orderBy' => $orderby,
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
	public function _searchName($firstname, $lastname, $cid) //seearch for any duplicate

	{
		$tablename = 'crmTblContacts c';
		$fields = array(
			'c.cntId, c.cntFirstName, c.cntCompanyId, c.cntLastName, c.cntPrimaryAddress1, c.cntPrimaryAddress2, c.cntPrimaryCity, c.cntPrimaryState, c.cntPrimaryZip, c.cntPrimaryPhone, c.cntPrimaryEmail,m.cntFirstName as companyname',
			't.ccatName',
			't.ccatDescription'
		);
		$join = array(
			'LEFT JOIN crmTblContacts m ON c.cntCompanyId = m.cntId',
			'JOIN crmLkpCategories t ON c.cntcid = t.ccatId',
		);
		$where = array(
			'c.cntFirstName like :first',
			'c.cntLastName like :last',
		);
		// $where = array(
		//    '(cntFirstName like :first OR cntLastName like :last)',
		// );
		$orderby = "c.cntLastName,c.cntFirstName";
		$params = array(
			'first' => "%" . $firstname . "%",
			'last' => "%" . $lastname . "%",
		);
		if ($lastname == '')
		{
			$where = array(
				'(c.cntFirstName like :first)',
			);
			$params = array(
				'first' => "%" . $firstname . "%",
			);
		}
		if ($cid != 12 && $cid != 13 && $cid != 0) // not one of these search only in the same category
		{
			// $where[] = 'c.cntcid = :cid';
			// $params['cid'] = $cid;
		}
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'params' => $params,
			'orderBy' => $orderby,
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
	public function _searchName2($firstname, $lastname, $cid) //search for manager or general contact

	{
		$tablename = 'crmTblContacts c';
		$fields = array(
			'c.cntId',
			'c.cntFirstName',
			'c.cntCompanyId',
			'c.cntLastName',
			'c.cntPrimaryAddress1',
			'c.cntPrimaryAddress2',
			'c.cntPrimaryCity',
			'c.cntPrimaryState',
			'c.cntPrimaryZip',
			'c.cntPrimaryPhone',
			'c.cntPrimaryEmail',
			'm.cntFirstName as companyfirstname',
			'm.cntLastName as companylastname',
			't.ccatName',
			't.ccatDescription'
		);
		$join = array(
			'LEFT JOIN crmTblContacts m ON c.cntCompanyId = m.cntId',
			'JOIN crmLkpCategories t ON c.cntcid = t.ccatId',
		);
		$where = array(
			'(c.cntcid  = 12 OR c.cntcid = 13 OR c.cntcid = 18)', // managers or general contacts
			// 'c.cntCompanyID != '. $cid, // not related already to parent
			'c.cntFirstName like :first',
		);
		$orderby = "c.cntLastName,c.cntFirstName";
		// $where = array(
		//    '(cntFirstName like :first OR cntLastName like :last)',
		// );
		$params = array(
			'first' => "%" . $firstname . "%",
		);
		if ($lastname != '')
		{
			$where[] = 'c.cntLastName like :last';
			$params['last'] = "%" . $lastname . "%";
		}
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'orderBy' => $orderby,
			'params' => $params,
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
	public function _searchName3($firstname, $lastname, $cid) //search for properties

	{
		$tablename = 'crmTblContacts c';
		$fields = array(
			'c.cntId',
			'c.cntFirstName',
			'c.cntCompanyId',
			'c.cntLastName',
			'c.cntPrimaryAddress1',
			'c.cntPrimaryAddress2',
			'c.cntPrimaryCity',
			'c.cntPrimaryState',
			'c.cntPrimaryZip',
			'c.cntPrimaryPhone',
			'c.cntPrimaryEmail',
			'm.cntFirstName as companyfirstname',
			'm.cntLastName as companylastname',
			't.ccatName',
			't.ccatDescription'
		);
		$join = array(
			'LEFT JOIN crmTblContacts m ON c.cntCompanyId = m.cntId',
			'JOIN crmLkpCategories t ON c.cntcid = t.ccatId',
		);
		$where = array(
			'(c.cntcid  = 9)', //properties only
			// 'c.cntCompanyID != '. $cid, // not already related already to parent
			'c.cntFirstName like :first',
		);
		// $where = array(
		//    '(cntFirstName like :first OR cntLastName like :last)',
		// );
		$orderby = "c.cntLastName,c.cntFirstName";
		$params = array(
			'first' => "%" . $firstname . "%",
		);
		if ($lastname != '')
		{
			$where[] = 'c.cntLastName like :last';
			$params['last'] = "%" . $lastname . "%";
		}
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'params' => $params,
			'orderBy' => $orderby,
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
	public function _searchEmail($email)

	{
		$tablename = 'crmTblContacts';
		$fields = array(
			'*'
		);
		$where = array(
			'cntPrimaryEmail = :email',
		);
		// $where = array(
		//    '(cntFirstName like :first OR cntLastName like :last)',
		// );
		$params = array(
			'email' => $email,
		);
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'params' => $params,
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
	public function _getCRMCreators() //list of users who have created a crm entry

	{
		$tablename = 'crmTblContacts p';
		$join = array(
			'JOIN crmTblContacts m ON p.cntId = m.cntCreatedBy',
		);
		$fields = array(
			'p.cntId',
			'p.cntFirstName',
			'p.cntLastName',
		);
		// now get records
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'join' => $join,
			'groupBy' => 'p.cntId, p.cntFirstName, p.cntLastName',
			'orderBy' => 'p.cntlastName, p.cntFirstName',
		);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getUserList($xport = null)

	{
		// defaults
		// create filter for sql
		$filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1';
		// default ordering lastname firstname
		$orderby = 'm.cntLastName, m.cntFirstName';
		$ordertype = 'ASC';
		// text to display
		$filter_str = "Where Status is Active";
		// default limit and offset
		$limit = 25;
		$page_num = 1; //current page
		$filter = 0;
		$offset = 0;
		$total_pages = 1; //total pages
		$params = array();
		// pull in parent companies if linked and associated manager if linked
		$join = array(
			// 'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
			'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
			'LEFT JOIN crmTblContacts AS b ON m.cntManagerId = b.cntId',
			'LEFT JOIN crmLkpCategories c ON m.cntcid = c.ccatId',
			// 'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
		);
		$fields = array(
			'm.cntId',
			'm.cntFirstName',
			'm.cntLastName',
			'm.cntMiddleName',
			'm.cntSalutation',
			'm.cntGender',
			'm.cntSignature',
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
			'm.cntManagerId',
			'm.cntComment',
			'm.cntParcelNumber',
			'm.cntSecAccess',
			'm.cntRole',
			'm.cntPassword',
			'm.cntAltContactName',
			'm.cntcid',
			'm.cntOverHead',
			'a.cntFirstName AS CompanyName',
			'a.cntLastName AS CompanyLastName',
			'a.cntPrimaryPhone As CompanyPhone',
			'a.cntPrimaryAddress1 AS CompanyAddress1',
			'a.cntPrimaryAddress2 AS CompanyAddress2',
			'a.cntPrimaryState as CompanyState',
			'a.cntPrimaryCity as CompanyCity',
			'a.cntPrimaryZip AS CompanyZip',
			'b.cntFirstName AS ManagerName',
			'b.cntLastName AS ManagerLastName',
			'b.cntPrimaryEmail AS ManagerEmail',
			'b.cntPrimaryPhone AS ManagerPhone',
			'b.cntPrimaryAddress1 AS ManagerAddress1',
			'b.cntPrimaryAddress2 AS ManagerAddress2',
			'b.cntPrimaryState AS ManagerState',
			'b.cntPrimaryCity AS ManagerCity',
			'b.cntPrimaryZip AS ManagerZip',
			'c.ccatName',
			'(SELECT COUNT(*) FROM POTblJobOrders WHERE m.cntId = POTblJobOrders.jobcntID) AS project_count',
			'(SELECT COUNT(*) FROM crmTblContactNotes WHERE m.cntId = crmTblContactNotes.cnotContactId) AS note_count',
			'(SELECT ccatName FROM crmLkpCategories WHERE m.cntcid = crmLkpCategories.ccatId) AS primarycat',
		);
		// load params from session if just paging changing limit etc
		$cmsfilter = $this->session->userdata('cmsfilter');
		if (!empty($cmsfilter))
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
		// detect request
		// simple reorder by column keep same params, modify order
		if ($this->input->post('reorder') == '1')
		{
			if ($this->validate->post('orderby', 'SAFETEXT'))
			{
				$orderby = $this->input->post('orderby');
				$ordertype = $this->validate->post('ordertype', 'SAFETEXT');
				if (!$ordertype)
				{
					$ordertype = 'ASC';
				}
				// swap ordertype
				if ($orderby == 'm.cntFirstName')
				{
					$orderby = 'm.cntLastName ' . $ordertype . ', m.cntFirstName';
				}
			}
		}
		// simple page change keep same params go to page request
		if ($this->validate->post('page', 'INTEGER') && $this->input->post('turnpage') == 1)
		{
			// modify offset
			$page_num = $this->validate->post('page', 'INTEGER');
			$offset = ($page_num - 1) * $limit;
		}
		// just change number of records per page to show change limit only
		if ($this->input->post('limit') && $this->input->post('changelimit') == 1)
		{
			$limit = $this->validate->post('limit', 'INTEGER');
			if (!$limit || $limit < 10 || $limit > 100)
			{
				$limit = 25;
			}
			$offset = 0;
			$page_num = 1; //return to first page
		}
		// we did a search so renew params
		$search = $this->input->post('search');
		if ($search == 1) //search by field value and or category
		{
			// default ordering lastname firstname
			$orderby = 'm.cntLastName, m.cntFirstName';
			$ordertype = 'ASC';
			// text to display
			$filter_str = "Where Status is Active";
			// reset joins
			$join = array(
				// 'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
				'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
				'LEFT JOIN crmTblContacts AS b ON m.cntManagerId = b.cntId',
				'LEFT JOIN crmLkpCategories c ON m.cntcid = c.ccatId',
				// 'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
			);
			// reset page and offset
			$offset = 0;
			$page_num = 1;
			// searchField,searchValue,searchCat,searchServ
			// new search
			$filter = 1;
			$searchServiceID = $this->validate->post('searchServ', 'SAFETEXT');
			$searchCatID = $this->validate->post('searchCat', 'SAFETEXT');
			$searchFieldName = $this->validate->post('searchField', 'SAFETEXT');
			$searchFieldValue = $this->validate->post('searchValue', 'TEXT');
			$catName = $this->validate->post('categoryName', 'SAFETEXT');
			$serviceName = $this->validate->post('serviceName', 'SAFETEXT');
			// @todo get more sophisticated about which fields are being searched, if name use first and last name
			$cntQualified = $this->input->post('cntQualified');
			// restore defaults keep limit intact revert to page 1 and defaults
			$filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1';
			if ($cntQualified == 1)
			{
				$filter_str.= ' AND Contact IS Qualified';
				$filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1 AND m.cntQualified = 1';
			}
			if ($cntQualified == 2)
			{
				$filterWhere = 'm.cntIsEmployee <> 1 AND m.cntStatusId = 1 AND m.cntQualified = 0';
				$filter_str.= ' AND Contact IS NOT Qualified';
			}
			if ($searchFieldName == "m.cntFirstName" || $searchFieldName == "m.cntLastName")
			{
				$filterWhere.= " AND " . $searchFieldName . " LIKE '" . $searchFieldValue . "%'";
				$filter_str.= ' AND Name Like "' . $searchFieldValue . '"';
			}
			elseif ($searchFieldName != "All Records")
			{
				$filterWhere.= " AND " . $searchFieldName . " = '" . $searchFieldValue . "'";
				$filter_str.= ' AND ' . $searchFieldName . ' = ' . $searchFieldValue;
			}
			if ($searchCatID > 0)
			{
				// add condition to where search primary cat and all secondary cats
				$filterWhere.= ' AND ((m.cntcid =' . $searchCatID . ') OR (crmFcsContactsCategories.cntcatCategoryId =' . $searchCatID . '))';
				// update join
				$join[] = 'LEFT JOIN crmFcsContactsCategories ON m.cntId = crmFcsContactsCategories.cntcatContactId';
				$filter_str.= " AND Category=" . $catName;
			}
			if ($searchServiceID > 0)
			{
				// add condition to where
				$filterWhere.= ' AND crmFcsContactsServices.cntservServiceID =' . $searchServiceID;
				// update join
				$join[] = 'LEFT JOIN crmFcsContactsServices ON m.cntId = crmFcsContactsServices.cntservContactId';
				$filter_str.= " AND Service=" . $serviceName;
			}
		}
		// if we are role restricted we will have to add a param to where clause
		if ($this->USER_ROLE == '2') //sales manager add condition to where
		{
			// Sales Manager
			$filterWhere.= ' AND (' . $this->USER_ID . ' IN (SELECT GROUP_CONCAT(jobSalesManagerAssigned) FROM POTblJobOrders WHERE m.cntId = jobcntID) OR m.cntCreatedBy = ' . $this->USER_ID . ' OR m.cntQualified = 0)';
		}
		if ($this->USER_ROLE == '3') //sales person add condition to where
		{
			$filterWhere.= ' AND (' . $this->USER_ID . ' IN (SELECT GROUP_CONCAT(jobSalesAssigned) FROM POTblJobOrders WHERE m.cntId = jobcntID) OR m.cntCreatedBy = ' . $this->USER_ID . ' OR m.cntQualified = 0)';
		}
		if ($this->USER_ROLE == '4') //job manager add condition to where
		{
			$filterWhere.= ' AND (' . $this->USER_ID . ' IN (SELECT GROUP_CONCAT(jobSalesAssigned) FROM POTblJobOrders WHERE m.cntId = jobcntID) OR m.cntCreatedBy = ' . $this->USER_ID . ' OR m.cntQualified = 0)';
		}
		if ($this->USER_ROLE == '5') //not allowed in at all
		{
			$filterWhere.= ' AND m.cntId = 0';
		}
		// return $filterWhere;
		if ($xport) // get all
		{
			// now get records
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
			// now get records
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
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}


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
		If (((intval($total_records) - intval($limit))) > 0)
		{
			$total_pages = intval($total_records / $limit); //pages equal to total count divided by limit and add 1
			if (intval($total_records / $limit) != ($total_records / $limit)) // there is remainder so add a page
			{
				$total_pages = $total_pages + 1;
			}
		}
		$results['limit'] = $limit; //sent in from post
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
	public function _getAllContacts()

	{
	    $filterWhere = 'm.cntId <> 0';
	    
	    If ( ($this->input->post('fullsearch') == 'Go') && ($this->input->post('fullsearchtext') != '')  )
		{
			$fullsearch = 1;
			$limit=500;
			$searchtext=$this->input->post('fullsearchtext');
			
			$filterWhere .= " AND m.cntFirstName like '".$searchtext."%'";
		
			
		}
		else {
		    $fullsearch = 0;
		    $limit=100;
		   
		}
	    
		// default ordering lastname firstname
		$orderby = 'm.cntLastName, m.cntFirstName';
		$ordertype = 'ASC';
		$join = array(
			// 'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
			'LEFT JOIN crmTblContacts AS a ON m.cntCompanyId = a.cntId',
			'LEFT JOIN crmTblContacts AS b ON m.cntManagerId = b.cntId',
			'LEFT JOIN crmLkpCategories c ON m.cntcid = c.ccatId'
			// 'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
		);
		$fields = array(
			'm.cntId',
			'm.cntFirstName',
			'm.cntLastName',
			'm.cntMiddleName',
			'm.cntSalutation',
			'm.cntGender',
			//'m.cntAvatar',
			//'m.cntSignature',
			'm.cntDepartment',
			'm.cntJobTitle',
			//'m.cntDateOfBirth',
			'm.cntStatusId',
			//'m.cntCreatedDate',
			//'m.cntCreatedBy',
			//'m.cntUpdatedDate',
			//'m.cntUpdatedBy',
			//'m.cntLastContactDate',
			//'m.cntLastContactedBy',
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
			'm.cntManagerId',
			'm.cntComment',
			'm.cntParcelNumber',
			'm.cntSecAccess',
			'm.cntRole',
			//'m.cntPassword',
			//'m.cntAltContactName',
			'm.cntcid',
			'm.cntOverHead',
			'a.cntFirstName AS CompanyName',
			'a.cntLastName AS CompanyLastName',
			'a.cntPrimaryPhone As CompanyPhone',
			'a.cntPrimaryAddress1 AS CompanyAddress1',
			'a.cntPrimaryAddress2 AS CompanyAddress2',
			'a.cntPrimaryState as CompanyState',
			'a.cntPrimaryCity as CompanyCity',
			'a.cntPrimaryZip AS CompanyZip',
			'b.cntFirstName AS ManagerName',
			'b.cntLastName AS ManagerLastName',
			'b.cntPrimaryEmail AS ManagerEmail',
			'b.cntPrimaryPhone AS ManagerPhone',
			'b.cntPrimaryAddress1 AS ManagerAddress1',
			'b.cntPrimaryAddress2 AS ManagerAddress2',
			'b.cntPrimaryState AS ManagerState',
			'b.cntPrimaryCity AS ManagerCity',
			'b.cntPrimaryZip AS ManagerZip',
			'c.ccatName',
		);
		//$filterWhere = 'm.cntId <> 0';
		// if we are role restricted we will have to add a param to where clause
		/*if ($this->USER_ROLE == '2') //sales manager add condition to where
		{
			// Sales Manager
			$filterWhere.= ' AND (' . $this->USER_ID . ' IN (SELECT GROUP_CONCAT(jobSalesManagerAssigned) FROM POTblJobOrders WHERE m.cntId = jobcntID) OR m.cntCreatedBy = ' . $this->USER_ID . ' OR m.cntQualified = 0)';
		}
		if ($this->USER_ROLE == '3') //sales person add condition to where
		{
			$filterWhere.= ' AND (' . $this->USER_ID . ' IN (SELECT GROUP_CONCAT(jobSalesAssigned) FROM POTblJobOrders WHERE m.cntId = jobcntID) OR m.cntCreatedBy = ' . $this->USER_ID . ' OR m.cntQualified = 0)';
		}
		if ($this->USER_ROLE == '4') //job manager add condition to where
		{
			$filterWhere.= ' AND (' . $this->USER_ID . ' IN (SELECT GROUP_CONCAT(jobSalesAssigned) FROM POTblJobOrders WHERE m.cntId = jobcntID) OR m.cntCreatedBy = ' . $this->USER_ID . ' OR m.cntQualified = 0)';
		}
		if ($this->USER_ROLE == '5') //not allowed in at all
		{
			$filterWhere = 'm.cntId = 0';
		}*/
		// now get records
		$items = array(
			'tableName' => 'crmTblContacts m',
			'fields' => $fields,
			'join' => $join,
			'orderType' => $ordertype,
			'where' => $filterWhere,
			'orderBy' => $orderby,
			'limit' => $limit,
		);
		$total_records = $this->dbpdo->count($items);
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		
		$results['rows'] = $rows;
		$results['filterWhere'] = $filterWhere; //where statement used
		$results['total_records'] = $total_records; //count of records
		return $results;
	}
	public function _getManagers($id) //only property manager types

	{
		$tablename = 'crmTblContacts c';
		$fields = array(
			'c.cntId',
			'c.cntFirstName',
			'c.cntMiddleName',
			'c.cntLastName',
			'c.cntPrimaryAddress1',
			'c.cntPrimaryAddress2',
			'c.cntPrimaryCity',
			'c.cntPrimaryState',
			'c.cntPrimaryZip',
			'c.cntPrimaryPhone',
			'c.cntPrimaryEmail',
			'c.cntAltPhone1',
			'c.cntAltPhone2',
			'c.cntAltEmail',
			'm.cntFirstName as companyname',
			'm.cntLastName as companylastname',
			'm.cntPrimaryPhone as companyphone',
			'm.cntPrimaryEmail as companyemail',
			't.ccatName',
			't.ccatDescription'
		);
		$join = array(
			'LEFT JOIN crmTblContacts m ON c.cntCompanyId = m.cntId',
			'LEFT JOIN crmLkpCategories t ON c.cntcid = t.ccatId',
		);
		// property manager types
		$where = array(
			'(c. cntcid = 12 OR c. cntcid = 13)',
			'c.cntCompanyId = :id',
		);
		$params = array(
			'id' => $id,
		);
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'params' => $params,
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
	public function _getRelated($id) //not managers or properties

	{
		$tablename = 'crmTblContacts c';
		$fields = array(
			'c.cntId',
			'c.cntFirstName',
			'c.cntMiddleName',
			'c.cntLastName',
			'c.cntPrimaryAddress1',
			'c.cntPrimaryAddress2',
			'c.cntPrimaryCity',
			'c.cntPrimaryState',
			'c.cntPrimaryZip',
			'c.cntPrimaryPhone',
			'c.cntPrimaryEmail',
			'm.cntFirstName as companyfirstname',
			'm.cntLastName as companylastname',
			'm.cntPrimaryPhone as companyphone',
			'm.cntPrimaryEmail as companyemail',
			't.ccatName',
			't.ccatDescription'
		);
		$join = array(
			'LEFT JOIN crmTblContacts m ON c.cntCompanyId = m.cntId',
			'LEFT JOIN crmLkpCategories t ON c.cntcid = t.ccatId',
		);
		// get all related contacts
		$where = array(
			'c.cntCompanyId = :id',
		);
		// not a property
		$where = array(
			'(c. cntcid != 9 AND c. cntcid != 12 AND c. cntcid != 13)', //not managers or properties
			'c.cntCompanyId = :id',
		);
		$params = array(
			'id' => $id,
		);
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'params' => $params,
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
	public function _getAllRelated($id)

	{
		$tablename = 'crmTblContacts c';
		$fields = array(
			'c.cntId',
			'c.cntFirstName',
			'c.cntMiddleName',
			'c.cntLastName',
			'c.cntPrimaryAddress1',
			'c.cntPrimaryAddress2',
			'c.cntPrimaryCity',
			'c.cntPrimaryState',
			'c.cntPrimaryZip',
			'c.cntPrimaryPhone',
			'c.cntPrimaryEmail',
			'm.cntFirstName as companyname',
			'm.cntLastName as companylastname',
			'm.cntPrimaryPhone as companyphone',
			'm.cntPrimaryEmail as companyemail',
			't.ccatName',
			't.ccatDescription'
		);
		$join = array(
			'LEFT JOIN crmTblContacts m ON c.cntCompanyId = m.cntId',
			'LEFT JOIN crmLkpCategories t ON c.cntcid = t.ccatId',
		);
		// get all related contacts
		$where = array(
			'c.cntCompanyId = :id',
		);
		$params = array(
			'id' => $id,
		);
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'params' => $params,
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
	public function _getManagerProperties($id)

	{
		$tablename = 'crmTblContacts m';
		$keyfield = 'm.cntManagerId';
		// now get records
		$join = array(
			'LEFT JOIN crmTblContacts a ON m.cntCompanyId = a.cntId',
		);
		$fields = array(
			'm.*',
			'a.cntFirstName as companyfirstname',
			'a.cntLastName as companylastname'
		);
		$where = array(
			$keyfield . ' = :id',
			'm.cntcid = 9',
		);
		$params = array(
			'id' => $id,
		);
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'join' => $join,
			'params' => $params,
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
	public function _getManagerOfProperties($id) //property id

	{
		$tablename = 'crmTblContacts m';
		// now get records
		$fields = array(
			'*'
		);
		$where = array(
			'm.cntId  = :id',
			'm.cntcid = 9',
		);
		$params = array(
			'id' => $id,
		);
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'params' => $params,
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
	public function _getProperties($id) //only property types

	{
		$tablename = 'crmTblContacts c';
		$fields = array(
			'c.cntId',
			'c.cntFirstName',
			'c.cntMiddleName',
			'c.cntLastName',
			'c.cntPrimaryAddress1',
			'c.cntPrimaryAddress2',
			'c.cntPrimaryCity',
			'c.cntPrimaryState',
			'c.cntPrimaryZip',
			'c.cntPrimaryPhone',
			'c.cntPrimaryEmail',
			'm.cntFirstName as companyname',
			'm.cntLastName as companylastname',
			'm.cntPrimaryPhone as companyphone',
			'm.cntPrimaryEmail as companyemail',
			'b.cntFirstName as managerfirstname',
			'b.cntLastName as managerlastname',
			'b.cntPrimaryPhone as managerphone',
			'b.cntPrimaryEmail as manageremail',
			't.ccatName',
			't.ccatDescription'
		);
		$join = array(
			'LEFT JOIN crmTblContacts m ON c.cntCompanyId = m.cntId',
			'LEFT JOIN crmTblContacts b ON c.cntManagerId = b.cntId',
			'LEFT JOIN crmLkpCategories t ON c.cntcid = t.ccatId',
		);
		// property manager types
		$where = array(
			'(c. cntcid = 9)',
			'c.cntCompanyId = :id',
		);
		$params = array(
			'id' => $id,
		);
		$items = array(
			'tableName' => $tablename,
			'join' => $join,
			'fields' => $fields,
			'params' => $params,
			'where' => $where,
		);
		// return $items;
		if (false === ($rows = $this->dbpdo->get($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return $rows;
	}
	public function _getCRMUserLight($id)

	{
		$tablename = 'crmTblContacts';
		$keyfield = 'cntId';
		// now get records
		$fields = array(
			'*'
		);
		$where = array(
			$keyfield . ' = :id',
		);
		$params = array(
			'id' => $id,
		);
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'params' => $params,
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
	public function _getCRMUser($id)

	{
		$tablename = 'crmTblContacts m';
		$keyfield = 'm.cntId';
		$join = array(
			'LEFT JOIN POTblJobOrders ON m.cntId = POTblJobOrders.jobcntID',
			'LEFT JOIN crmTblContacts a ON m.cntCompanyId = a.cntId',
			'LEFT JOIN crmTblContacts b ON m.cntManagerId = b.cntId',
			'LEFT JOIN crmTblContacts c ON m.cntCreatedBy = c.cntId',
			'LEFT JOIN crmTblContactNotes ON m.cntId = crmTblContactNotes.cnotContactId ',
			'LEFT JOIN crmLkpCategories d ON m.cntcid = d.ccatId',
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
			'm.cntManagerId',
			'm.cntComment',
			'm.cntParcelNumber',
			'a.cntFirstName AS CompanyName',
			'a.cntLastName AS CompanyLastName',
			'a.cntPrimaryEmail AS companyEmail',
			'a.cntPrimaryPhone AS companyPhone',
			'a.cntPrimaryAddress1 AS companyAddress1',
			'a.cntPrimaryAddress2 AS companyAddress2',
			'a.cntPrimaryState AS companyState',
			'a.cntPrimaryCity AS companyCity',
			'a.cntPrimaryZip AS companyZip',
			'b.cntFirstName AS ManagerName',
			'b.cntLastName AS ManagerLastName',
			'b.cntPrimaryEmail AS ManagerEmail',
			'b.cntPrimaryPhone AS ManagerPhone',
			'b.cntPrimaryAddress1 AS ManagerAddress1',
			'b.cntPrimaryAddress2 AS ManagerAddress2',
			'b.cntPrimaryState AS ManagerState',
			'b.cntPrimaryCity AS ManagerCity',
			'b.cntPrimaryZip AS ManagerZip',
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
			'm.cntOverHead',
			'd.ccatName',
			'd.ccatEntity',
			'd.ccatWizard',
			'd.ccatDescription',
		);
		$where = array(
			$keyfield . ' = :id',
		);
		$params = array(
			'id' => $id,
		);
		$items = array(
			'tableName' => $tablename,
			'fields' => $fields,
			'join' => $join,
			'params' => $params,
			'where' => $where,
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
	public function _getCRMProposals($cid, $status = null)

	{
		$tablename = 'POTblJobOrders';
		$fields = array(
			'jobID'
		);
		$where = 'jobcntID =' . $cid;
		if ($status)
		{
			if ($status == 4)
			{
				$where = 'jobcntID =' . $cid . ' AND jobStatus < 4';
			}
			else
			{
				$where = 'jobcntID =' . $cid . ' AND jobStatus > 4';
			}
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
	public function _getCRMUserServices($id)

	{
		$tablename = 'crmLkpCRMServices';
		$fields = array(
			'*',
			'(SELECT cntservContactId FROM crmFcsContactsServices WHERE crmFcsContactsServices.cntservContactId = ' . $id . ' AND crmFcsContactsServices.cntservServiceID = crmLkpCRMServices.cservId) AS servuserid',
		);
		$orderBy = 'crmLkpCRMServices.cservName';
		// get all
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
	public function _getCRMUserCategories($id)

	{
		$tablename = 'crmLkpCategories';
		$fields = array(
			'*',
			'(SELECT cntcatContactId FROM crmFcsContactsCategories WHERE crmFcsContactsCategories.cntcatContactId = ' . $id . ' AND crmFcsContactsCategories.cntcatCategoryId = crmLkpCategories.ccatId) AS catuserid',
		);
		$orderBy = 'crmLkpCategories.ccatDoNotDelete DESC, crmLkpCategories.ccatName';
		// get all
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
	public function _saveQuickAdd()

	{
		$tablename = 'crmTblContacts';
		$this->load->helper('date');
		$format = 'DATE_RFC822';
		$time = time();
		$sdate = standard_date($format, $time);
		$date = new DateTime($sdate);
		$CurrentDate = $date->format('Y-m-d');
		$cntId = $this->validate->post('cntId', 'INTEGER'); //user to link to
		$cntFirstName = $this->validate->post('cntFirstName', 'TEXT');
		$cntLastName = $this->validate->post('cntLastName', 'TEXT');
		if (!$cntLastName)
		{
			$cntLastName = '';
		}
		$cntMiddleName = $this->validate->post('cntMiddleName', 'TEXT', FALSE);
		$cntSalutation = $this->validate->post('cntSalutation', 'SAFETEXT', FALSE);
		$cntGender = $this->validate->post('cntGender', 'TEXT');
		$cntOverHead = 0;
		$cntcid = $this->validate->post('cntcid', 'INTEGER');
		if (!$cntcid || $cntcid == '' || $cntcid == 0)
		{
			$cntcid = 18;
		}
		$cntAltContactName = $this->validate->post('cntAltContactName', 'TEXT', FALSE);
		$cntStatusId = 1; //enabled by default
		$cntPrimaryEmail = $this->validate->post('cntPrimaryEmail', 'TEXT', FALSE);
		$cntAltEmail = $this->validate->post('cntAltEmail', 'TEXT', FALSE);
		if (!$cntAltEmail)
		{
			$cntAltEmail = '';
		}
		$cntPrimaryPhone = $this->validate->post('cntPrimaryPhone', 'TEXT', FALSE);
		$cntAltPhone1 = $this->validate->post('cntAltPhone1', 'TEXT', FALSE);
		$cntAltPhone2 = $this->validate->post('cntAltPhone2', 'TEXT', FALSE);
		$cntPrimaryAddress1 = $this->validate->post('cntPrimaryAddress1', 'TEXT', FALSE);
		$cntPrimaryAddress2 = $this->validate->post('cntPrimaryAddress2', 'TEXT', FALSE);
		$cntPrimaryCity = $this->validate->post('cntPrimaryCity', 'TEXT', FALSE);
		$cntPrimaryState = $this->validate->post('cntPrimaryState', 'TEXT', FALSE);
		$cntPrimaryZip = $this->validate->post('cntPrimaryZip', 'TEXT', FALSE);
		$cntPrimaryCountry = "US";
		$cntRole = 0; //$this->validate->post('cntRole', 'INTEGER');
		$cntSecAccess = 0;
		if (!$cntPrimaryPhone)
		{
			$cntPrimaryPhone = '';
		}
		if (!$cntAltPhone1)
		{
			$cntAltPhone1 = '';
		}
		if (!$cntAltPhone2)
		{
			$cntAltPhone2 = '';
		}
		if (!$cntPrimaryAddress1)
		{
			$cntPrimaryAddress1 = 'na';
		}
		if (!$cntPrimaryAddress2)
		{
			$cntPrimaryAddress2 = '';
		}
		if (!$cntPrimaryCity)
		{
			$cntPrimaryCity = '';
		}
		if (!$cntPrimaryState)
		{
			$cntPrimaryState = '';
		}
		if (!$cntPrimaryZip)
		{
			$cntPrimaryZip = '';
		}
		$data['cntcid'] = $cntcid;
		$data['cntOverHead'] = $cntOverHead;
		$data['cntPrimaryCity'] = $cntPrimaryCity;
		$data['cntCompanyId'] = 0;
		$data['cntDevelopmentId'] = 0;
		$data['cntManagerId'] = 0;
		$data['cntComment'] = '';
		$data['cntFirstName'] = ($cntFirstName);
		$data['cntLastName'] = ($cntLastName);
		$data['cntMiddleName'] = ($cntMiddleName);
		$data['cntSalutation'] = $cntSalutation;
		$data['cntGender'] = $cntGender;
		$data['cntQualified'] = 1;
		$data['cntAltContactName'] = ($cntAltContactName);
		$data['cntStatusId'] = 1; //default to 1 when created 0 is disabled
		$data['cntPrimaryEmail'] = $cntPrimaryEmail;
		$data['cntAltEmail'] = $cntAltEmail;
		$data['cntPrimaryPhone'] = $cntPrimaryPhone;
		$data['cntAltPhone1'] = $cntAltPhone1;
		$data['cntAltPhone2'] = $cntAltPhone2;
		$data['cntPrimaryAddress1'] = ($cntPrimaryAddress1);
		$data['cntPrimaryAddress2'] = ($cntPrimaryAddress2);
		$data['cntPrimaryCity'] = $cntPrimaryCity;
		$data['cntPrimaryState'] = $cntPrimaryState;
		$data['cntPrimaryZip'] = $cntPrimaryZip;
		$data['cntPrimaryCountry'] = $cntPrimaryCountry;
		$data['cntShipAddress1'] = ($cntPrimaryAddress1);
		$data['cntShipAddress2'] = ($cntPrimaryAddress2);
		$data['cntShipCity'] = $cntPrimaryCity;
		$data['cntShipState'] = $cntPrimaryState;
		$data['cntShipZip'] = $cntPrimaryZip;
		$data['cntBillAddress1'] = ($cntPrimaryAddress1);
		$data['cntBillAddress2'] = ($cntPrimaryAddress2);
		$data['cntBillCity'] = $cntPrimaryCity;
		$data['cntBillState'] = $cntPrimaryState;
		$data['cntBillZip'] = $cntPrimaryZip;
		$data['cntRole'] = $cntRole;
		$data['cntSecAccess'] = $cntSecAccess;
		$data['cntUpdatedBy'] = $this->USER_ID;
		$data['cntUpdatedDate'] = $this->CurrentTimeStamp;
		$data['cntQualified'] = 1;
		$data['cntcid'] = $cntcid;
		$data['cntCreatedDate'] = $this->CurrentTimeStamp;
		$data['cntCreatedBy'] = $this->USER_ID;
		// save the contact with just  aname
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
		);
		$userId = $this->dbpdo->insert($items);
		if ($userId === false)
		{
			return array(
				'error' => 'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		// create category for the new contact
		if ($cntcid)
		{
			$data = array();
			$data['cntcatCategoryId'] = $cntcid;
			$data['cntcatContactId'] = $userId;
			$items = array(
				'tableName' => 'crmFcsContactsCategories',
				'data' => $data,
			);
			$this->dbpdo->insert($items);
		}
		// ok so we created the new user assigned it the right cateogroy nowe have to update the primary contact
		$where = 'cntId =' . $cntId;
		$data = array();
		$data['cntCompanyId'] = $userId;
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
			'where' => $where,
		);
		$userId = $this->dbpdo->update($items);
		if ($userId === false)
		{
			return array(
				'error' => 'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		return $userId;
	}
	public function _saveContact($id = null)

	{
		$tablename = 'crmTblContacts';
		$this->load->helper('date');
		$format = 'DATE_RFC822';
		$time = time();
		$sdate = standard_date($format, $time);
		$date = new DateTime($sdate);
		$CurrentDate = $date->format('Y-m-d');
		$userId = $id;
		$cntQualified = 0;
		If ($this->input->post('cntQualified') == 1)
		{
			$cntQualified = 1;
		}
		if (!$id) // new record
		{
			$cntDevelopmentId = $this->validate->post('cntDevelopmentId', 'INTEGER');
			$cntManagerId = $this->validate->post('cntManagerId', 'INTEGER');
			$cntCompanyId = $this->validate->post('cntCompanyId', 'INTEGER');
		}
		$cntFirstName = ($this->validate->post('cntFirstName', 'text'));
		$cntLastName = ($this->validate->post('cntLastName', 'text'));
		if (!$cntLastName)
		{
			$cntLastName = '';
		}
		$cntMiddleName = $this->validate->post('cntMiddleName', 'TEXT', FALSE);
		$cntSalutation = $this->validate->post('cntSalutation', 'TEXT', FALSE);
		$cntGender = $this->validate->post('cntGender', 'TEXT');
		$cntOverHead = $this->validate->post('cntOverHead', 'INTEGER');
		if (!$cntOverHead)
		{
			$cntOverHead = 0;
		}
		$cntcid = $this->validate->post('cntcid', 'INTEGER');
		if (!$cntcid || $cntcid == '' || $cntcid == 0)
		{
			$cntcid = 18;
		}
		// all employees default to company 1
		$cntDepartment = $this->validate->post('cntDepartment', 'TEXT');
		if (!$cntDepartment)
		{
			$cntDepartment = null;
		}
		$cntJobTitle = $this->validate->post('cntJobTitle', 'TEXT');
		if (!$cntJobTitle)
		{
			$cntJobTitle = null;
		}
		$cntDateOfBirth = $this->input->post('cntDateOfBirth', FALSE);
		$date = new DateTime($cntDateOfBirth);
		$cntDateOfBirth = $date->format('Y-m-d');
		$cntAltContactName = $this->validate->post('cntAltContactName', 'TEXT', FALSE);
		$cntParcelNumber = $this->validate->post('cntParcelNumber', 'SAFETEXT', FALSE);
		if (empty($cntDateOfBirth))
		{
			$cntDateOfBirth = null;
		}
		$cntStatusId = 1; //enabled by default
		if ($this->input->post('cntStatusId'))
		{
			$cntStatusId = 0;
		}
		// crm note
		$cntLastContactDate = $this->validate->post('cntLastContactDate', 'DATE');
		$cntLastContactedBy = $this->validate->post('cntLastContactedBy', 'INTEGER');
		$cntPrimaryEmail = $this->validate->post('cntPrimaryEmail', 'EMAIL', FALSE);
		if (!$cntPrimaryEmail)
		{
			$cntPrimaryEmail = 'na';
		}
		$cntAltEmail = $this->validate->post('cntAltEmail', 'TEXT', FALSE);
		//        $cntPassword = $this->validate->post('cntPassword', 'TEXT');
		if (!$cntAltEmail)
		{
			$cntAltEmail = '';
		}
		$cntComment = $this->validate->post('cntComment', 'TEXT', FALSE);
		$cntPrimaryPhone = $this->validate->post('cntPrimaryPhone', 'SAFETEXT', FALSE);
		$cntAltPhone1 = $this->validate->post('cntAltPhone1', 'SAFETEXT', FALSE);
		$cntAltPhone2 = $this->validate->post('cntAltPhone2', 'SAFETEXT', FALSE);
		$cntPrimaryAddress1 = $this->validate->post('cntPrimaryAddress1', 'TEXT', FALSE);
		$cntPrimaryAddress2 = $this->validate->post('cntPrimaryAddress2', 'TEXT', FALSE);
		$cntPrimaryCity = $this->validate->post('cntPrimaryCity', 'TEXT', FALSE);
		$cntPrimaryState = $this->validate->post('cntPrimaryState', 'TEXT', FALSE);
		$cntPrimaryZip = $this->validate->post('cntPrimaryZip', 'SAFETEXT', FALSE);
		$cntPrimaryCountry = "US";
		// $this->validate->post('cntPrimaryCountry', 'SAFETEXT', FALSE);
		$cntBillAddress1 = $this->validate->post('cntBillAddress1', 'TEXT', FALSE);
		$cntBillAddress2 = $this->validate->post('cntBillAddress2', 'TEXT', FALSE);
		$cntBillCity = $this->validate->post('cntBillCity', 'TEXT', FALSE);
		$cntBillState = $this->validate->post('cntBillState', 'SAFETEXT', FALSE);
		$cntBillZip = $this->validate->post('cntBillZip', 'SAFETEXT', FALSE);
		$cntRole = 0; //$this->validate->post('cntRole', 'INTEGER');
		$cntSecAccess = 0;
		$cntSecQuestion = $this->validate->post('cntSecQuestion', 'SAFETEXT', FALSE);
		$cntSecAnswer = $this->validate->post('cntSecAnswer', 'SAFETEXT', FALSE);
		if (!$cntComment)
		{
			$cntComment = '';
		}
		if (!$cntPrimaryPhone)
		{
			$cntPrimaryPhone = '';
		}
		if (!$cntAltPhone1)
		{
			$cntAltPhone1 = '';
		}
		if (!$cntAltPhone2)
		{
			$cntAltPhone2 = '';
		}
		if (!$cntPrimaryAddress1)
		{
			$cntPrimaryAddress1 = 'na';
		}
		if (!$cntPrimaryAddress2)
		{
			$cntPrimaryAddress2 = '';
		}
		if (!$cntPrimaryCity)
		{
			$cntPrimaryCity = '';
		}
		if (!$cntPrimaryState)
		{
			$cntPrimaryState = '';
		}
		if (!$cntPrimaryZip)
		{
			$cntPrimaryZip = '';
		}
		if (!$cntBillAddress1)
		{
			$cntBillAddress1 = 'na';
		}
		if (!$cntBillAddress2)
		{
			$cntBillAddress2 = '';
		}
		if (!$cntBillCity)
		{
			$cntBillCity = '';
		}
		if (!$cntBillState)
		{
			$cntBillState = '';
		}
		if (!$cntBillZip)
		{
			$cntBillZip = '';
		}
		$data['cntcid'] = $cntcid;
		if ($cntParcelNumber != '')
		{
			$data['cntParcelNumber'] = $cntParcelNumber;
		}
		$data['cntOverHead'] = $cntOverHead;
		$data['cntPrimaryCity'] = $cntPrimaryCity;
		if (!$id) // new record
		{
			$data['cntCompanyId'] = $cntCompanyId;
			$data['cntDevelopmentId'] = $cntDevelopmentId;
			$data['cntManagerId'] = $cntManagerId;
		}
		$data['cntComment'] = addslashes($cntComment);
		$data['cntFirstName'] = ($cntFirstName);
		$data['cntLastName'] = ($cntLastName);
		$data['cntMiddleName'] = ($cntMiddleName);
		$data['cntSalutation'] = $cntSalutation;
		$data['cntGender'] = $cntGender;
		$data['cntQualified'] = $cntQualified;
		$data['cntDepartment'] = ($cntDepartment);
		$data['cntJobTitle'] = ($cntJobTitle);
		$data['cntDateOfBirth'] = $cntDateOfBirth;
		$data['cntAltContactName'] = ($cntAltContactName);
		$data['cntStatusId'] = $cntStatusId; //default to 1 when created 0 is disabled
		$data['cntPrimaryEmail'] = $cntPrimaryEmail;
		$data['cntAltEmail'] = $cntAltEmail;
		$data['cntPrimaryPhone'] = $cntPrimaryPhone;
		$data['cntAltPhone1'] = $cntAltPhone1;
		$data['cntAltPhone2'] = $cntAltPhone2;
		$data['cntPrimaryAddress1'] = ($cntPrimaryAddress1);
		$data['cntPrimaryAddress2'] = ($cntPrimaryAddress2);
		$data['cntPrimaryCity'] = $cntPrimaryCity;
		$data['cntPrimaryState'] = $cntPrimaryState;
		$data['cntPrimaryZip'] = $cntPrimaryZip;
		$data['cntPrimaryCountry'] = $cntPrimaryCountry;
		$data['cntBillAddress1'] = ($cntBillAddress1);
		$data['cntBillAddress2'] = ($cntBillAddress2);
		$data['cntBillCity'] = $cntBillCity;
		$data['cntBillState'] = $cntBillState;
		$data['cntBillZip'] = $cntBillZip;
		if (!$id) // new record set all address the same
		{
			$data['cntShipAddress1'] = ($cntPrimaryAddress1);
			$data['cntShipAddress2'] = ($cntPrimaryAddress2);
			$data['cntShipCity'] = $cntPrimaryCity;
			$data['cntShipState'] = $cntPrimaryState;
			$data['cntShipZip'] = $cntPrimaryZip;
		}
		$data['cntRole'] = $cntRole;
		$data['cntSecAccess'] = $cntSecAccess;
		$data['cntUpdatedBy'] = $this->USER_ID;
		$data['cntUpdatedDate'] = $this->CurrentTimeStamp;
		if (!$id)
		{ // insert
			$data['cntCreatedDate'] = $this->CurrentTimeStamp;
			$data['cntCreatedBy'] = $this->USER_ID;
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
			);
			$userId = $this->dbpdo->insert($items);
			
			if ($userId === false)
			{
				return array(
					'error' => 'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage()
				);
			}
			/*
			* on the create new feature we now may have a company or development by default
			* what we want to do now is create at least one category for this new user
			* we may have a category selected like development or company  the category id will be passed in a variable called categoryid
			*  if categoryid is null or 0 then we should add the default category which is
			* 9 	Community/Development
			* 10 	Government Agency
			* 8 	Company
			* 6 	Client
			* 2 	Vendor
			* 11 	Sub Contractor
			*/
			// add at least one cat
			$data = array();
			$data['cntcatCategoryId'] = $cntcid;
			$data['cntcatContactId'] = $userId;
			$items = array(
				'tableName' => 'crmFcsContactsCategories',
				'data' => $data,
			);
			$this->dbpdo->insert($items);
		}
		else
		// update
		{
			$cntId = $this->validate->post('cntId', 'INTEGER');
			$where = array(
				'cntId = :cntId',
			);
			$params = array(
				'cntId' => $cntId,
			);
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
				'where' => $where,
				'params' => $params,
			);
			if ($id == $cntId)
			{
				if (!$rows = $this->dbpdo->update($items))
				{
					return array(
						'error' => 'Error updating message data into table.<br />' . $this->dbpdo->getErrorMessage()
					);
				}
			}
			$userId = $cntId;
		}
		// upload avatar if any
		if (false !== ($result = $this->_uploadAvatar($userId)))
		{
			if (true !== $result['success'])
			{
				return array(
					'error' => $result['message']
				);
			}
			else
			{
				$items = array(
					'tableName' => $tablename,
					'data' => array(
						'cntAvatar' => $result['filename']
					) ,
					'where' => 'cntId = :userId',
					'params' => array(
						'userId' => $userId
					) ,
				);
				if (false === $this->dbpdo->update($items))
				{
					return array(
						'error' => $this->dbpdo->getErrorMessage()
					);
				}
				// we just uploaded an avatar if there was an old one delete it
				$oldAvatar = $this->validate->post('oldAvatar', 'FILENAME');
				if (!empty($oldAvatar) && file_exists($config['upload_path'] = './media/crm/' . $oldAvatar))
				{
					unlink($config['upload_path'] = './media/crm/' . $oldAvatar);
				}
			}
		}
		else
		{ // no avatar defined to be uploaded. Check if in edit, user wants to remove current
			if ($this->validate->post('removeAvatar', 'INTEGER'))
			{
				$items = array(
					'tableName' => 'crmTblContacts',
					'data' => array(
						'cntAvatar' => null
					) ,
					'where' => 'cntId = :userId',
					'params' => array(
						'userId' => $userId
					) ,
				);
				if (false === $this->dbpdo->update($items))
				{
					return array(
						'error' => $this->dbpdo->getErrorMessage()
					);
				}
				$oldAvatar = $this->validate->post('oldAvatar', 'FILENAME');
				if (!empty($oldAvatar) && file_exists($config['upload_path'] = './media/crm/' . $oldAvatar))
				{
					unlink($config['upload_path'] = './media/crm/' . $oldAvatar);
				}
			}
		}
		return $userId;
	}
	public function _saveAdditionalInfo($id = null)

	{
		$tablename = 'crmTblContacts';
		$this->load->helper('date');
		$format = 'DATE_RFC822';
		$time = time();
		$sdate = standard_date($format, $time);
		$date = new DateTime($sdate);
		$CurrentDate = $date->format('Y-m-d');
		$cntManagerId = $this->validate->post('cntManagerId', 'INTEGER');
		$cntCompanyId = $this->validate->post('cntCompanyId', 'INTEGER');
		$cntDevelopmentId = $this->validate->post('cntDevelopmentId', 'INTEGER');
		$data['cntManagerId'] = $cntManagerId;
		$data['cntCompanyId'] = $cntCompanyId;
		$data['cntDevelopmentId'] = $cntDevelopmentId;
		$data['cntUpdatedBy'] = $this->USER_ID;
		$data['cntUpdatedDate'] = $this->CurrentTimeStamp;
		// update
		$cntId = $this->validate->post('cntId', 'INTEGER');
		if ($cntId == $id)
		{
			$where = array(
				'cntId = :cntId',
			);
			$params = array(
				'cntId' => $cntId,
			);
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
				'where' => $where,
				'params' => $params,
			);
			if (!$rows = $this->dbpdo->update($items))
			{
				return array(
					'error' => 'Error updating message data into table.<br />' . $this->dbpdo->getErrorMessage()
				);
			}
		}
		return $cntId;
	}
	public function _savecatandservice($id)

	{
		if ($this->input->post('beenhere') == 1)
		{
			$data = array();
			$str_return = array();
			$cntId = $this->validate->post('cntId', 'INTEGER');
			if ($id == $cntId)
			{
				$where = "cntcatContactId = " . $cntId;
				$items = array(
					'tableName' => 'crmFcsContactsCategories',
					'where' => $where,
				);
				$this->dbpdo->delete($items);
				$where = "cntservContactId = " . $cntId;
				$items = array(
					'tableName' => 'crmFcsContactsServices',
					'where' => $where,
				);
				$this->dbpdo->delete($items);
				foreach($_POST as $key => $value)
				{
					// insert service
					if (substr($key, 0, 4) == 'serv') //insert a service
					{
						$data = array();
						$data['cntservServiceID'] = $value;
						$data['cntservContactId'] = $cntId;
						$items = array(
							'tableName' => 'crmFcsContactsServices',
							'data' => $data,
						);
						$userId = $this->dbpdo->insert($items);
						$str_return[] = $userId;
						$str_return[] = 'Service Inserted: ' . $data['cntservServiceID'] . ',' . $data['cntservContactId'] . '<br/>';
					}
					if (substr($key, 0, 3) == 'cat') //insert a category
					{
						$data = array();
						$data['cntcatCategoryId'] = $value;
						$data['cntcatContactId'] = $cntId;
						$items = array(
							'tableName' => 'crmFcsContactsCategories',
							'data' => $data,
						);
						$userId = $this->dbpdo->insert($items);
						$str_return[] = $userId;
						$str_return[] = 'Cats Inserted: ' . $data['cntcatCategoryId'] . ',' . $data['cntcatContactId'] . '<br/>';
					}
				} //loop
				return $str_return;
			} //did we submit correctly
		}
		return false;
	}
	// CRM NOTES
	public function _getCRMNotes($usrid, $note_id = null)

	{
		$tablename = 'crmTblContactNotes';
		$keyfield = 'cnotId';
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
			'cid' => $usrid,
		);
		if (!$note_id)
		{
			// get all
			$items = array(
				'tableName' => $tablename,
				'where' => $where,
				'join' => $join,
				'params' => $params,
				'fields' => $fields,
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
		else
		{
			// get one
			// options where= params, params = data binding, join, groupBy, orderBy, orderType, limit, start,fields
			$where = array(
				$keyfield . ' = :id',
				'cnotContactId = :cid',
			);
			$params = array(
				'id' => $note_id,
				'cid' => $usrid,
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
	public function _saveCRMNotes($id, $note_id = null) //contact id

	{
		$tablename = 'crmTblContactNotes';
		$cnotReminderDate = null;
		$cnotReminder = 0;
		$cntId = $this->validate->post('cntId', 'INTEGER');
		$cnotNote = $this->validate->post('cnotNote', 'TEXT');
		if ($this->input->post('cnotReminder') == 1)
		{
			$cnotReminder = 1;
			$cnotReminderDate = $this->input->post('cnotReminderDate');
			$date = new DateTime($cnotReminderDate);
			$cnotReminderDate = $date->format('Y-m-d');
		}
		if (empty($cnotReminderDate))
		{
			$cnotReminder = 0;
			$cnotReminderDate = null;
		}
		$data = array();
		$data['cnotNote'] = ($cnotNote);
		$data['cnotReminder'] = $cnotReminder;
		$data['cnotReminderDate'] = $cnotReminderDate;
		if (!$note_id)
		{ // insert
			$data['cnotContactId'] = $cntId;
			$data['cnotCreatedby'] = $this->USER_ID;
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
		else
		{
			// update
			$where = array(
				'cnotId = :cnotId',
			);
			$params = array(
				'cnotId' => $note_id,
			);
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
				'where' => $where,
				'params' => $params,
			);
			if (!$this->dbpdo->update($items))
			{
				return array(
					'error' => 'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage()
				);
			}
			return true;
		}
	}
	// END CRM NOTES
	// CATEGORIES
	public function _showCRMCategories($usrid)

	{
		$tablename = 'crmFcsContactsCategories';
		$join = array(
			'JOIN crmLkpCategories ON crmFcsContactsCategories.cntcatCategoryId = crmLkpCategories.ccatId',
		);
		$fields = array(
			'*'
		);
		$where = array(
			'crmFcsContactsCategories.cntcatContactId  = :cid',
		);
		$orderBy = 'crmLkpCategories.ccatName';
		$params = array(
			'cid' => $usrid,
		);
		// get all
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'join' => $join,
			'params' => $params,
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
	// CRM SERVICES
	public function _showCRMServices($usrid)

	{
		$tablename = 'crmFcsContactsServices';
		$join = array(
			'JOIN crmLkpCRMServices ON crmFcsContactsServices.cntservServiceID = crmLkpCRMServices.cservId',
		);
		$fields = array(
			'*'
		);
		$where = array(
			'crmFcsContactsServices.cntservContactId  = :cid',
		);
		$orderBy = 'crmLkpCRMServices.cservName';
		$params = array(
			'cid' => $usrid,
		);
		// get all
		$items = array(
			'tableName' => $tablename,
			'where' => $where,
			'join' => $join,
			'params' => $params,
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
	/*
	END CRM SERVICES
	*/
	/*
	EMPLOYEE SECTION
	*/
	public function _getEmployee($id = null, $showall = null)

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
			if ($showall)
			{
				$where = array(
					'm.cntIsEmployee = 1',
				);
			}
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
	public function _getEmployeeByRole($roleid, $active = null)

	{
		$tablename = 'crmTblContacts';
		$fields = array(
			'*',
		);
		$where = array(
			'cntIsEmployee = 1 AND cntRole =' . intval($roleid) ,
		);
		if ($roleid == 9) // get sales and managers and admin
		{
			$where = array(
				'cntIsEmployee = 1 AND cntRole <=3',
			);
		}
		if ($roleid == 10) //sales managers and admin
		{
			$where = array(
				'cntIsEmployee = 1 AND cntRole <= 2',
			);
		}
		if($active){
		    array_push($where, 'cntStatusid = 1' );
		}
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
	public function _saveEmployee($id = null)

	{
		$tablename = 'crmTblContacts';
		$this->load->helper('date');
		$format = 'DATE_RFC822';
		$time = time();
		$sdate = standard_date($format, $time);
		$date = new DateTime($sdate);
		$CurrentDate = $date->format('Y-m-d');
		$cntFirstName = $this->validate->post('cntFirstName', 'TEXT');
		$cntLastName = $this->validate->post('cntLastName', 'TEXT');
		$cntMiddleName = $this->validate->post('cntMiddleName', 'TEXT');
		$cntSalutation = $this->validate->post('cntSalutation', 'SAFETEXT');
		$cntGender = $this->validate->post('cntGender', 'SAFETEXT');
		if (!$cntMiddleName)
		{
			$cntMiddleName = null;
		}
		$cntCompanyId = $this->validate->post('cntCompanyId', 'INTEGER');
		// all employees default to company 1
		$cntDepartment = $this->validate->post('cntDepartment', 'TEXT');
		if (!$cntDepartment)
		{
			$cntDepartment = null;
		}
		$cntJobTitle = $this->validate->post('cntJobTitle', 'TEXT');
		if (!$cntJobTitle)
		{
			$cntJobTitle = null;
		}
		$cntDateOfBirth = $this->input->post('cntDateOfBirth');
		$date = new DateTime($cntDateOfBirth);
		$cntDateOfBirth = $date->format('Y-m-d');
		if (empty($cntDateOfBirth))
		{
			$cntDateOfBirth = $CurrentDate;
		}
		// crm note
		$cntLastContactDate = $CurrentDate;
		$cntLastContactedBy = $this->USER_ID;
		$cntHireDate = $this->input->post('cntHireDate');
		$date = new DateTime($cntHireDate);
		$cntHireDate = $date->format('Y-m-d');
		if (empty($cntHireDate))
		{
			$cntHireDate = $CurrentDate;
		}
		$cntPrimaryEmail = $this->validate->post('cntPrimaryEmail', 'EMAIL');
		$cntPassword = $this->validate->post('cntPassword', 'SAFETEXT');
		$cntPrimaryPhone = $this->validate->post('cntPrimaryPhone', 'SAFETEXT', FALSE);
		$cntPrimaryAddress1 = $this->validate->post('cntPrimaryAddress1', 'TEXT', FALSE);
		$cntPrimaryAddress2 = $this->validate->post('cntPrimaryAddress2', 'TEXT', FALSE);
		$cntPrimaryCity = $this->validate->post('cntPrimaryCity', 'TEXT', FALSE);
		$cntPrimaryState = $this->validate->post('cntPrimaryState', 'SAFETEXT', FALSE);
		$cntPrimaryZip = $this->validate->post('cntPrimaryZip', 'SAFETEXT', FALSE);
		$cntPrimaryCountry = $this->validate->post('cntPrimaryCountry', 'SAFETEXT', FALSE);
		$cntRole = $this->validate->post('cntRole', 'INTEGER');
		$cntSecQuestion = $this->validate->post('cntSecQuestion', 'SAFETEXT');
		$cntSecAnswer = $this->validate->post('cntSecAnswer', 'SAFETEXT');
		// true false
		$cntStatusId = 1; //enabled by default
		if ($this->input->post('cntStatusId'))
		{
			$cntStatusId = 0;
		}
		$cntSecAccess = 0; //disabled by default
		if ($this->input->post('cntSecAccess'))
		{
			$cntSecAccess = 1;
		}
		$cntIsEmployee = 1;
		// Images
		$cntAvatar = $this->validate->post('cntAvatar', 'SAFETEXT');
		$cntSignature = $this->validate->post('cntSignature', 'SAFETEXT');
		$data['cntFirstName'] = ($cntFirstName);
		$data['cntLastName'] = ($cntLastName);
		$data['cntMiddleName'] = $cntMiddleName;
		$data['cntSalutation'] = $cntSalutation;
		$data['cntGender'] = $cntGender;
		$data['cntCompanyId'] = 1; //default employees to company 1
		// when uplopad images
		// $data['cntAvatar'] = $cntAvatar;
		// $data['cntSignature'] = $cntSignature;
		$data['cntDepartment'] = $cntDepartment;
		$data['cntJobTitle'] = $cntJobTitle;
		$data['cntDateOfBirth'] = $cntDateOfBirth;
		$data['cntStatusId'] = $cntStatusId; //default to 1 when created 0 is disabled
		$data['cntIsEmployee'] = 1; //always an employee in this context
		$data['cntHireDate'] = $cntHireDate;
		$data['cntPrimaryEmail'] = $cntPrimaryEmail;
		$data['cntPassword'] = $cntPassword;

		$data['cntPrimaryPhone'] = $cntPrimaryPhone;
		$data['cntPrimaryAddress1'] = ($cntPrimaryAddress1);
		$data['cntPrimaryAddress2'] = ($cntPrimaryAddress2);
		$data['cntPrimaryCity'] = $cntPrimaryCity;
		$data['cntPrimaryState'] = $cntPrimaryState;
		$data['cntPrimaryZip'] = $cntPrimaryZip;
		$data['cntPrimaryCountry'] = $cntPrimaryCountry;
		$data['cntRole'] = $cntRole;
		// only used whe  surr is changing their own profile
		// $data['cntSecQuestion'] = $cntSecQuestion;
		// $data['cntSecAnswer'] = $cntSecAnswer;
		$data['cntSecAccess'] = $cntSecAccess;
		// when add note
		// $data['cntLastContactDate'] = $cntLastContactDate;
		// $data['cntLastContactedBy'] =  $this->USER_ID;
		$data['cntUpdatedBy'] = $this->USER_ID;
		$data['cntUpdatedDate'] = $this->CurrentTimeStamp;
		$data['cntManagerId'] = 0;
		if (!$id)
		{ // insert
			// new record check for duplicate email and password here
			// @todo check for any duplicates
			$data['cntCreatedDate'] = $this->CurrentTimeStamp;
			$data['cntCreatedBy'] = $this->USER_ID;
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
			);
			$userId = $this->dbpdo->insert($items);
			if ($userId === false)
			{
				return array(
					'error' => 'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage()
				);
			}
		}
		else
		{
			// existing record check for duplicate email and password not mine here
			// @todo check for duplicates that are not me.
			// update
			$cntId = $this->validate->post('cntId', 'INTEGER');
			$where = array(
				'cntId = :cntId',
			);
			$params = array(
				'cntId' => $cntId,
			);
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
				'where' => $where,
				'params' => $params,
			);
			if (!$rows = $this->dbpdo->update($items))
			{
				return array(
					'error' => 'Error updating message data into table.<br />' . $this->dbpdo->getErrorMessage()
				);
			}
			$userId = $cntId;
		}
		// $userId should contain a number of id
		// upload avatar if any
		if (false !== ($result = $this->_uploadSignature($userId)))
		{
			if (true !== $result['success'])
			{
				return array(
					'error' => $result['message']
				);
			}
			else
			{
				$items = array(
					'tableName' => 'crmTblContacts',
					'data' => array(
						'cntSignature' => $result['filename']
					) ,
					'where' => 'cntId = :userId',
					'params' => array(
						'userId' => $userId
					) ,
				);
				if (false === $this->dbpdo->update($items))
				{
					return array(
						'error' => $this->dbpdo->getErrorMessage()
					);
				}
			}
		}
		if (false !== ($result = $this->_uploadAvatar($userId)))
		{
			if (true !== $result['success'])
			{
				return array(
					'error' => $result['message']
				);
			}
			else
			{
				$items = array(
					'tableName' => 'crmTblContacts',
					'data' => array(
						'cntAvatar' => $result['filename']
					) ,
					'where' => 'cntId = :userId',
					'params' => array(
						'userId' => $userId
					) ,
				);
				if (false === $this->dbpdo->update($items))
				{
					return array(
						'error' => $this->dbpdo->getErrorMessage()
					);
				}
				// we just uploaded an avatar if there was an old one delete it
				$oldAvatar = $this->validate->post('oldAvatar', 'FILENAME');
				if (!empty($oldAvatar) && file_exists($config['upload_path'] = './media/crm/' . $oldAvatar))
				{
					unlink($config['upload_path'] = './media/crm/' . $oldAvatar);
				}
			}
		}
		else
		{ // no avatar defined to be uploaded. Check if in edit, user wants to remove current
			if ($this->validate->post('removeAvatar', 'INTEGER'))
			{
				$items = array(
					'tableName' => 'crmTblContacts',
					'data' => array(
						'cntAvatar' => null
					) ,
					'where' => 'cntId = :userId',
					'params' => array(
						'userId' => $userId
					) ,
				);
				if (false === $this->dbpdo->update($items))
				{
					return array(
						'error' => $this->dbpdo->getErrorMessage()
					);
				}
				$oldAvatar = $this->validate->post('oldAvatar', 'FILENAME');
				if (!empty($oldAvatar) && file_exists($config['upload_path'] = './media/crm/' . $oldAvatar))
				{
					unlink($config['upload_path'] = './media/crm/' . $oldAvatar);
				}
			}
		}
		return $userId;
	}
	/* END EMPLOYEE
	*/
	// manage crm categories
	public function _saveCategory($id)

	{
		$tablename = 'crmLkpCategories';
		$ccatId = $this->input->post('ccatId');
		$ccatName = $this->validate->post('ccatName', 'SAFETEXT');
		$data['ccatName'] = ($ccatName);
		if (!$id)
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
		else
		{
			// update
			$data['ccatId'] = $ccatId;
			$where = array(
				'ccatId = :ccatId',
			);
			$params = array(
				'ccatId' => $ccatId,
			);
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
				'where' => $where,
				'params' => $params,
			);
			if (!$this->dbpdo->update($items))
			{
				return array(
					'error' => 'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage()
				);
			}
			return true;
		}
	}
	public function _getCRMCategories($id = null)

	{
		$tablename = 'crmLkpCategories';
		$keyfield = 'ccatId';
		$orderby = 'ccatName';
		$fields = array(
			'*'
		);
		if (!$id)
		{
			// get all
			$items = array(
				'tableName' => $tablename,
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
				'field' => $fields,
			);
			if (false === ($rows = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			return $rows;
		}
	}
	// end manage categoruies
	// manage crm services
	public function _saveServices($id = null)

	{
		$tablename = 'crmLkpCRMServices';
		$cservId = $this->input->post('cservId');
		$cservName = $this->validate->post('cservName', 'SAFETEXT');
		$data['cservName'] = ($cservName);
		if (!$id)
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
		else
		{
			// update
			$where = array(
				'cservId = :cservId',
			);
			$params = array(
				'cservId' => $cservId,
			);
			$items = array(
				'tableName' => $tablename,
				'data' => $data,
				'where' => $where,
				'params' => $params,
			);
			if (!$this->dbpdo->update($items))
			{
				return array(
					'error' => 'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage()
				);
			}
			return true;
		}
	}
	public function _getCRMServices($id = null)

	{
		$tablename = 'crmLkpCRMServices';
		$keyfield = 'cservId';
		$orderby = 'cservName';
		$fields = array(
			'*'
		);
		if (!$id)
		{
			// get all
			$items = array(
				'tableName' => $tablename,
				'field' => $fields,
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
				'orderBy' => $orderby,
				'field' => $fields,
			);
			if (false === ($rows = $this->dbpdo->getOne($items)))
			{
				return array(
					'error' => $this->dbpdo->getErrorMessage()
				);
			}
			return $rows;
		}
	}
	// end crm services
	public function _changeCompanyLink($cid, $mid)

	{
		// cid is new company mid is contact id
		$tablename = 'crmTblContacts';
		$data["cntCompanyID"] = $cid;
		$where = array(
			'cntId = :cntId',
		);
		$params = array(
			'cntId' => $mid,
		);
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
			'where' => $where,
			'params' => $params,
		);
		if (!$rows = $this->dbpdo->update($items))
		{
			return array(
				'error' => 'Error updating message data into table.<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		return $mid;
	}
	// crm utils
	public function _emailExists($email, $userId = null)

	{
		$where = array(
			'cntPrimaryEmail = :email',
		);
		$params = array(
			'email' => $email,
		);
		if ($userId)
		{
			$where[] = 'cntId != :userId';
			$params['userId'] = $userId;
		}
		$items = array(
			'tableName' => 'crmTblContacts',
			'where' => $where,
			'params' => $params,
		);
		if (false === ($count = $this->dbpdo->count($items)))
		{
			return array(
				'error' => $this->dbpdo->getErrorMessage()
			);
		}
		return (boolean)$count;
	}
	private function _uploadAvatar($contactId)
	{
		$this->load->library('images');
		return $this->images->uploadImage('avatar', $config['upload_path'] = './media/crm/', array(
			'jpg',
			'png'
		) , 'AVATAR_' . $contactId . '_');
	}
	private function _uploadSignature($contactId)
	{
		$this->load->library('images');
		return $this->images->uploadSignature('empsignature', $config['upload_path'] = './media/crm/', array(
			'jpg',
			'png'
		) , 'SIG_' . $contactId . '_');
	}
	public function _getCRMCats($cats)

	{
		$tablename = 'crmLkpCategories';
		$fields = array(
			'*'
		);
		if (is_array($cats))
		{
			$where = '(';
			foreach($cats as $c)
			{
				if ($where == '(')
				{
					$where = $where . 'ccatid = ' . $c;
				}
				else
				{
					$where = $where . ' OR ccatid = ' . $c;
				}
			}
			$where = $where . ')';
		}
		else
		{
			$where = "ccatid =" . $cats;
		}
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
	public function _unlinkcompany($id)

	{
		$tablename = 'crmTblContacts';
		$data['cntCompanyId'] = 0;
		$where = array(
			'cntId = :cntId',
		);
		$params = array(
			'cntId' => $id,
		);
		$items = array(
			'tableName' => $tablename,
			'data' => $data,
			'where' => $where,
			'params' => $params,
		);
		if (!$rows = $this->dbpdo->update($items))
		{
			return array(
				'error' => 'Error updating message data into table.<br />' . $this->dbpdo->getErrorMessage()
			);
		}
		return $id;
	}
	/*
	*  Get Reminder Data
	*/
	// SAVE NEW REMINDER ABOUT JOBS THAT HAVE PASSED
	public function _saveCRMReminder($fromEmail, $message, $service_id, $timestamp)

	{
		$tablename = 'crmReminders';
		$data = array();
		$data['from_email'] = $fromEmail;
		$data['message'] = $message;
		$data['service_type_id'] = $service_id;
		$data['time_offset'] = $timestamp;
		if ($message && $timestamp && $service_id)
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
	// GET CLIENT REMINDER TO BE EDITED
	public function _getClientReminderToBeEdited($id)

	{
		$getCrmReminder = $this->db->query("SELECT * FROM crmReminders WHERE id = {$id}");
		$getCrmReminder = $getCrmReminder->result_array();
		return $getCrmReminder;
	}
	// SAVE EDITED CLIENT REMINDER
	public function _saveEditedCRMReminder($id, $fromEmail, $message, $service, $timestamp)

	{
		$data = array();
		$data['from_email'] = $fromEmail;
		$data['message'] = $message;
		$data['service_type_id'] = $service;
		$data['time_offset'] = $timestamp;
		$this->db->where('id', $id);
		$this->db->update('crmReminders', $data);
	}
	// SEND CLIENT REMINDER ABOUT PAST JOBS
	public function _sendCrmReminder()

	{
		$getReminderData = $this->db->query("SELECT * FROM crmReminders");
		$getReminderData = $getReminderData->result_array();
		$rows = array();
		foreach($getReminderData as $data)
		{
			$get_rows = $this->db->query("SELECT 
				*
			FROM 
				`POTblJobOrders`
			INNER JOIN 
				`POTblJobOrderDetail`  ON (`POTblJobOrderDetail`.`jordJobID` = `POTblJobOrders`.`jobID`)
			LEFT JOIN 
				`dataTblCompanyServices` ON(`POTblJobOrderDetail`.`jordServiceID` =   `dataTblCompanyServices`.`cmpServiceID`)
			INNER JOIN
				`crmReminders` ON(`POTblJobOrderDetail`.`jordServiceID` = `crmReminders`.`service_type_id`)
			WHERE
				`dataTblCompanyServices`.`cmpServiceID` = {$data['service_type_id']}
			AND
				DATE_ADD(`POTblJobOrderDetail`.`jordCompletedDateTime`, INTERVAL {$data['time_offset']} DAY) = CURDATE()");
			$rows = $get_rows->result();
		}
		return $rows;
	}
	// GET REMINDER DATA FOR POST JOB REMINDER
	public function _getCrmDataForEdit()

	{
		$postData = $this->db->query("SELECT 
				*
			FROM
				`crmReminders`
			INNER JOIN
				`dataTblCompanyServices` ON(`crmReminders`.`service_type_id` = `dataTblCompanyServices`.`cmpServiceID`)");
		$data = $postData->result_array();
		return $data;
	}
	/*
	*   Set Job Reminder functionality
	*/
	// GET COMPANY SERVICES
	public function _getCompanyServices()

	{
		$services = $this->db->query("SELECT `dataTblCompanyServices`.`cmpServiceID`, `dataTblCompanyServices`.`cmpServiceName` FROM `dataTblCompanyServices`");
		return $services->result_array();
	}
	// CHECK TO SEE IF POST JOB REMINDER ALREADY EXISTS
	public function _getCrmPostJobData($serviceID, $timestamp)

	{
		$getPostJobData = $this->db->query("SELECT * FROM crmReminders WHERE service_type_id = '$serviceID' AND time_offset = '$timestamp'");
		$rows = $getPostJobData->result_array();
		return $rows;
	}
	// SAVE PRE JOB JOB REMINDER
	public function _saveCRMJobReminder($fromEmail, $message, $service_id, $timestamp)

	{
		$tablename = 'crmJobReminders';
		$data = array();
		$data['from_email'] = $fromEmail;
		$data['message'] = $message;
		$data['service_type_id'] = $service_id;
		$data['time_offset'] = $timestamp;
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
	// GET PRE JOB REMINDERS
	public function _getCrmJobStartReminders()

	{
		$getReminderData = $this->db->query("SELECT * FROM crmJobReminders");
		$getReminderData = $getReminderData->result_array();
		$rows = array();
		foreach($getReminderData as $data)
		{
			$get_rows = $this->db->query("SELECT 
				*
			FROM 
				`POTblJobOrders`
			INNER JOIN 
				`POTblJobOrderDetail`  ON (`POTblJobOrderDetail`.`jordJobID` = `POTblJobOrders`.`jobID`)
			LEFT JOIN 
				`dataTblCompanyServices` ON(`POTblJobOrderDetail`.`jordServiceID` =   `dataTblCompanyServices`.`cmpServiceID`)
			INNER JOIN
				`crmJobReminders` ON(`POTblJobOrderDetail`.`jordServiceID` = `crmJobReminders`.`service_type_id`)
			WHERE
				`dataTblCompanyServices`.`cmpServiceID` = {$data['service_type_id']}
			AND
				DATE_SUB(`POTblJobOrderDetail`.`jordStartDate`, INTERVAL {$data['time_offset']} DAY) = CURDATE()");
			$rows = $get_rows->result();
		}
		return $rows;
	}
	// CHECK TO SEE IF PRE JOB REMINDER ALREADY EXISTS
	public function _getCrmPreJobData($serviceID, $timestamp)

	{
		$getPostJobData = $this->db->query("SELECT * FROM crmJobReminders WHERE service_type_id = '$serviceID' AND time_offset = '$timestamp'");
		$rows = $getPostJobData->result_array();
		return $rows;
	}
	// GET DATA FOR PRE JOB REMINDER TO BE EDITED
	public function _getJobReminderToBeEdited($id)

	{
		$getCrmJobReminder = $this->db->query("SELECT * FROM crmJobReminders WHERE id = {$id}");
		$getCrmJobReminder = $getCrmJobReminder->result_array();
		return $getCrmJobReminder;
	}
	// SAVE EDITED PRE JOB REMINDER
	public function _saveEditedCRMJobReminder($id, $fromEmail, $message, $service, $timestamp)

	{
		$data = array();
		$data['from_email'] = $fromEmail;
		$data['message'] = $message;
		$data['service_type_id'] = $service;
		$data['time_offset'] = $timestamp;
		$this->db->where('id', $id);
		$this->db->update('crmJobReminders', $data);
	}
	// GET REMINDER DATA FOR PRE JOB REMINDER
	public function _getCrmJobDataForEdit()

	{
		$postData = $this->db->query("SELECT 
				*
			FROM
				`crmJobReminders`
			INNER JOIN
				`dataTblCompanyServices` ON(`crmJobReminders`.`service_type_id` = `dataTblCompanyServices`.`cmpServiceID`)");
		$data = $postData->result_array();
		return $data;
	}
}