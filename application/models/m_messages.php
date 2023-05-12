<?php

class M_Messages Extends CI_Model
{


    public function _getMessages($userid, $senderid = null, $number_of_messages = null)
    {
        $tablename = 'msgTblMessages m';

        $join = array(
            'LEFT JOIN crmTblContacts sender ON m.msgSenderID = sender.cntId',
            'LEFT JOIN crmTblContacts recipient ON m.msgOwnerID = recipient.cntId',
        );
        $fields = array('m.*',
            'CONCAT(sender.cntFirstName, " " , sender.cntLastName) as Sender',
            'CONCAT(recipient.cntFirstName, " " , recipient.cntLastName) as Recipient',
        );

        $where = "msgDisabled = 0 AND msgOwnerID = " .$userid;
       if($senderid) //get messages for me all or just from a certain user
        {
            $where = "msgDisabled = 0 AND msgOwnerID = " .$userid . " AND (msgSenderID = ".$userid." OR msgSenderID =".$senderid .")";
        }
        $orderBy ="m.msgSentDate";
        $orderType ="DESC";

            //get all
            $items = array(
                'tableName' => $tablename,
                'join' => $join,
                'fields' => $fields,
                'limit' => $number_of_messages,
                'where' => $where,
                'orderBy' => $orderBy,
                'orderType' => $orderType,
            );

            if (false === ($rows = $this->dbpdo->get($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;

    }

    public function _sendMessage()
    {

        // i am always writing a record with the senders id and one with my id as owner
        $tablename = 'msgTblMessages';


        /*
         * msgId,msgOwnerID,msgSenderID,msgMessage,msgSentDate,msgRead ,msgResponded,msgDisabled
        */
        if($msgSenderID = $this->validate->post('msgSenderID', 'INTEGER'))
        {
            $msgMessage = $this->validate->post('msgMessage', 'SAFETEXT');
              $data = array();
            $data['msgOwnerID'] = $this->USER_ID;//sending to my list
            $data['msgSenderID'] = $this->USER_ID; //from me
            $data['msgMessage'] = $msgMessage;

                $items = array(
                    'tableName' => $tablename,
                    'data'      => $data,
                );
                $rows = $this->dbpdo->insert($items);
                if (!$rows) {
                    return array('error' =>'Error .<br />' . $this->dbpdo->getErrorMessage());
                }

            $data = array();
            $data['msgOwnerID'] = $msgSenderID;//sending to your list
            $data['msgSenderID'] = $this->USER_ID; //from me
            $data['msgMessage'] = $msgMessage;

            $items = array(
                'tableName' => $tablename,
                'data'      => $data,
            );
            $rows = $this->dbpdo->insert($items);
            if (!$rows) {
                return array('error' =>'Error .<br />' . $this->dbpdo->getErrorMessage());
            }

        }
        return true;

    }

    public function _read($userid)
    {
        $tablename = 'msgTblMessages';

        /*
         * msgId,msgOwnerID,msgSenderID,msgMessage,msgSentDate,msgRead ,msgResponded,msgDisabled
        */
        if($userid == $this->USER_ID)
        {
            $data = array();
            $data['msgRead'] = 1;//sending to your list
            $where = 'msgOwnerID  = '.$userid;
            $items = array(
                'tableName' => $tablename,
                'data'  => $data,
                'where' => $where,
            );
            $rows = $this->dbpdo->update($items);
            if (!$rows) {
                return array('error' =>'Error .<br />' . $this->dbpdo->getErrorMessage());
            }

        }
        return true;

    }

    public function _hide($messageid)
    {
        // i am always writing a record with the senders id and one with my id as owner
        $tablename = 'msgTblMessages';

        /*
         * msgId,msgOwnerID,msgSenderID,msgMessage,msgSentDate,msgRead ,msgResponded,msgDisabled
        */

            $data = array();
            $data['msgDisabled'] = 1;//sending to your list
            $where = ' msgId  = '.$messageid . ' AND msgOwnerID ='. $this->USER_ID;
            $items = array(
                'tableName' => $tablename,
                'data'  => $data,
                'where' => $where,
            );
            $rows = $this->dbpdo->update($items);
            if (!$rows) {
                return array('error' =>'Error .<br />' . $this->dbpdo->getErrorMessage());
            }

        return true;

    }



}

