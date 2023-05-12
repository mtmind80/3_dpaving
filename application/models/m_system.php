<?php

class M_System extends CI_Model
{


    public function _getWebConfig()
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

    public function _saveToken($token)

    {
        $data = array();
        $data['token'] = $token;
        $items = array(
            'tableName' => 'token',
            'data'      => $data,
        );
        if (!$this->dbpdo->insert($items)) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }
        return true;
    }

    public function _setClefLogout($clef_id)
    {
            $data = array();
            $data['cntlogout'] = 1;
            $where = "cntClefID =". $clef_id;
            $items = array(
            'tableName' => ' crmTblContacts',
            'data'      => $data,
            'where'      => $where,
            );
            if (!$this->dbpdo->update($items)) {
            return array('error' =>'Error updating table.<br />' . $this->dbpdo->getErrorMessage());
            }
            return true;

    }

    public function _doLogin()
    {

        $Email = $this->validate->post('email', 'EMAIL');
        $Password = $this->validate->post('usrpass', 'PASSWORD');
        if(!$Email || !$Password)
        {
            return array('error' => 'Missing Email or Password');
        }

        $where = array(
            'cntPrimaryEmail = :Email',
            'cntPassword = :Password',
            'cntIsEmployee = :cntIsEmployee',  //currently user must be an employee for access to this application
            'cntStatusId = :cntStatusId', //user disabled from crm  - status is not 1
            'cntSecAccess = :cntSecAccess', //internet access set to 1

        );

        $params = array(
            'Email' =>  $Email,
            'Password' =>  $Password,
            'cntIsEmployee' => '1',//is employee
            'cntStatusId' => '1', // enabled
            'cntSecAccess' => '1' //has internet access
        );
        $items = array(
            'tableName' => 'crmTblContacts',
            'where'  => $where,
            'params' => $params,
        );
        
        if (false === ($row = $this->dbpdo->getOne($items)))
        {
            
            return array('error' => $this->dbpdo->getErrorMessage());
        }
        else
        {
           

            if (empty($row['cntAvatar']) || !file_exists($this->WEBCONFIG['webUploadFolder'] . 'crm/'.$row['cntAvatar']))
            {
                $row['cntAvatar'] = null;
            }
            if (empty($row['cntSignature']) || !file_exists($this->WEBCONFIG['webUploadFolder'] . 'crm/'.$row['cntSignature']))
            {
                $row['cntSignature'] = null;
            }
            return $row;
        }
    }


    public function _doLoginclef($email, $id)
    {

        $where = array(
            'cntPrimaryEmail = :Email',
            'cntClefID = :ClefID',
            'cntIsEmployee = :cntIsEmployee',  //currently user must be an employee for access to this application
            'cntStatusId = :cntStatusId', //user disabled from crm  - status is not 1
            'cntSecAccess = :cntSecAccess', //internet access set to 1

        );

        $params = array(
            'ClefID' =>  $id,
            'Email' =>  $email,
            'cntIsEmployee' => '1',//is employee
            'cntStatusId' => '1', // enabled
            'cntSecAccess' => '1' //has internet access
        );
        $items = array(
            'tableName' => 'crmTblContacts',
            'where'  => $where,
            'params' => $params,
        );
        if (false === ($row = $this->dbpdo->getOne($items)))
        {
            return array('error' => $this->dbpdo->getErrorMessage());
        }
        else
        {

            if (empty($row['cntAvatar']) || !file_exists($this->WEBCONFIG['webUploadFolder'] . 'crm/'.$row['cntAvatar']))
            {
                $row['cntAvatar'] = null;
            }
            if (empty($row['cntSignature']) || !file_exists($this->WEBCONFIG['webUploadFolder'] . 'crm/'.$row['cntSignature']))
            {
                $row['cntSignature'] = null;
            }
            return $row;
        }


    }


    public function _checkAccess($uid)
    {

        $where = array(
            'cntId = :ID',
            'cntIsEmployee = :cntIsEmployee',
            'cntStatusId = :cntStatusId',
            'cntSecAccess = :cntSecAccess'
              );

        $params = array(
            'ID' =>  $uid,
            'cntIsEmployee' => '1',
            'cntStatusId' => '1',
            'cntSecAccess' => '1'
        );
        $items = array(
            'tableName' => 'crmTblContacts',
            'where'  => $where,
            'params' => $params,
        );
        if (false === ($count = $this->dbpdo->count($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }
        return (boolean)$count;
    }

    public function _checkAccessRole($uid)
    {

        $where = array(
            'cntId = :ID',
            'cntIsEmployee = :cntIsEmployee',
            'cntStatusId = :cntStatusId',
            'cntSecAccess = :cntSecAccess'
        );

        $params = array(
            'ID' =>  $uid,
            'cntIsEmployee' => '1',
            'cntStatusId' => '1',
            'cntSecAccess' => '1'
        );
        $items = array(
            'tableName' => 'crmTblContacts',
            'where'  => $where,
            'params' => $params,
        );
        if (false === ($row = $this->dbpdo->getOne($items)))
        {
            return array('error' => $this->dbpdo->getErrorMessage());
        }
        else
        {
            return $row;

        }
    }


    public function _getStates()
    {
       $fields = array(
            '*'
        );
        $items = array(
            'tableName' => 'sysTblStates',
            'fields'  => $fields,
        );
        if (false === ($row = $this->dbpdo->get($items)))
        {
            return array('error' => $this->dbpdo->getErrorMessage());
        }
        return $row;

    }

    public function resetCRMnote($noteid)
    {
        $items = array(
            'tableName' => 'crmTblContactNotes',
            'where' => 'cnotId = :ID',
            'params' => array(
                'ID' =>$noteid,
            ),
            'data' => array(
                'cnotReminderSent' => 1,
            ),
        );
        $this->dbpdo->update($items);
        return true;


    }

    public function getCRMReminders()
    {

        $items = array(
            'tableName' => 'crmTblContactNotes',
            'join' => 'JOIN crmTblContacts ON crmTblContacts.cntId = crmTblContactNotes.cnotCreatedby',
            'fields' => array(
                'CONCAT(cntFirstName, " ", cntLastName) AS contactFullName',
                'cntPrimaryEmail AS contactEmail',
                'cnotCreatedby',
                'cnotId',
                'cnotNote',
                'cnotReminderDate',
            ),
            'where' => '(cnotReminder = 1 AND cnotReminderSent = 0 AND cnotReminderDate <= CURDATE())',
        );

        $rows = $this->dbpdo->get($items);

        if (!$rows){
            return array('error' => $this->dbpdo->getErrorMessage());
        }


        return $rows;

    }


    public function resetPOnote($noteid)
    {
        $items = array(
            'tableName' => 'POTblJobOrderNotes',
            'where' => 'jnotId = :ID',
            'params' => array(
                'ID' => $noteid,
            ),
            'data' => array(
                'jnotReminderSent' => 1,
            ),
        );
        $this->dbpdo->update($items);

        return true;

    }

    public function getProposalReminders()
    {

        $items = array(
            'tableName' => 'POTblJobOrderNotes m',
            'join' => 'JOIN crmTblContacts ON crmTblContacts.cntId = m.jnotCreatedBy',
            'fields' => array(
                'CONCAT(cntFirstName, " ", cntLastName) AS contactFullName',
                'cntPrimaryEmail AS contactEmail',

                'm.jnotNote',
                'm.jnotId',
                'm.jnotReminderDate',


            ),
            'where' => '(m.jnotReminder = 1 AND m.jnotReminderSent = 0 AND m.jnotReminderDate <= CURDATE())',
        );

        $rows = $this->dbpdo->get($items);

        if (!$rows){
            return array('error' => $this->dbpdo->getErrorMessage());
        }


        return $rows;

        }

    public function _doLogTransaction($transType,$transNote,$transSessionID, $locations)
    {

        $data['hostname'] = '';
        $data['ip'] = '';
        $data['city'] = '';
        $data['region'] = '';
        $data['countryCode'] = '';
        $data['countryName'] = '';
        $data['postal'] = '';
        $data['org'] = '';
        $data['loc'] = '';
        $data['lat'] = '';
        $data['lng'] = '';


        if($locations)
        {
            $data['hostname'] = $locations['hostname'];
            $data['ip'] = $locations['ip'];
            $data['city'] = $locations['city'];
            $data['region'] = $locations['region'];
            $data['countryCode'] = $locations['countryCode'];
            $data['countryName'] = $locations['countryName'];
            $data['postal'] = $locations['postal'];
            $data['org'] = $locations['org'];
            $data['loc'] = $locations['loc'];
            $data['lat'] = $locations['lat'];
            $data['lng'] = $locations['lng'];

        }

        $data['transType'] = $transType;
        $data['transNote']= $transNote;
        $data['transIP'] = $_SERVER['REMOTE_ADDR'];
        $data['transBrowser'] = $_SERVER['HTTP_USER_AGENT'];
        $data['transUser_ID']= $this->USER_ID;
        $data['transSessionID']= $transSessionID;

        $items = array(
        'tableName' => 'sysTransactions',
        'data'      => $data,
        );
        if (!$this->dbpdo->insert($items)) {
        return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
        }

        return true;
    }


    public function _logLetter($data)
    {
/*
        $data['clientname'] = $this->input->post('clientname');
        $data['communityname'] = $this->input->post('communityname');
        $data['location'] = $this->input->post('location');
        $data['city'] = $this->input->post('city');
        $data['manager'] = $this->input->post('manager');
        $data['startdate'] = $this->input->post('startdate');
        $data['manageremail'] = $this->input->post('manageremail');
        $data['managerphone'] = $this->input->post('managerphone');
        $data['title'] = $this->input->post('title');
        $data['lettername'] = $pdfname;

        */
        $data['transIP'] = $_SERVER['REMOTE_ADDR'];
        $data['transBrowser'] = $_SERVER['HTTP_USER_AGENT'];
        $data['transUser_ID']= $this->USER_ID;

        $items = array(
            'tableName' => 'WOTblLetterlog',
            'data'      => $data,
        );
        if (!$this->dbpdo->insert($items)) {
            return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
        }

        return true;
    }




}
