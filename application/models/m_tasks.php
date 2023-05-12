<?php

class M_Tasks Extends CI_Model
{




    public function _getTasks($userid, $task_id = null) //get one get all
    {

        $tablename = 'taskTblTaskManager';

        $join = array(
            'LEFT JOIN crmTblContacts m ON taskTblTaskManager.taskCreatedBy = m.cntId',
        );
        $fields = array('*','CONCAT(m.cntFirstName, " " , m.cntLastName) as Creator',
        );
        $where = array(
            'taskAssignedTo = :userid',
        );

        $params = array(
            'userid' =>  $userid,
        );


        $orderBy ="taskDueDate";
        $orderType ="DESC";

        if(!$task_id)
        {
            //get all
            $items = array(
                'tableName' => $tablename,
                'join' => $join,
                'fields' => $fields,
                'params' => $params,
                'where' => $where,
                'orderBy' => $orderBy,
                'orderType' => $orderType,
            );


            if (false === ($rows = $this->dbpdo->get($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;
        }
        else
        {
            //get one
            //options where= params, params = data binding, join, groupBy, orderBy, orderType, limit, start,fields
            $where = array(
                'taskID = :taskID',
                'taskAssignedTo = :userid',
            );

            $params = array(
                'taskID' =>  $task_id,
                'userid' =>  $userid,
            );

            $items = array(
                'tableName' => $tablename,
                'where'  => $where,
                'params' => $params,
                'join' => $join,
                'fields' => $fields,
            );
            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;

        }


    }



    public function _getLastTasks($userid, $limit = 5) //get last five
    {

        $tablename = 'taskTblTaskManager';

        $join = array(
            'LEFT JOIN crmTblContacts m ON taskTblTaskManager.taskCreatedBy = m.cntId',
        );
        $fields = array('taskTblTaskManager.*','CONCAT(m.cntFirstName, " " , m.cntLastName) as Creator',
        );
        $where ='taskAssignedTo = ' . $userid;

        $orderBy ="taskDueDate";
        $orderType ="DESC";
        //get all
        $items = array(
            'tableName' => $tablename,
            'join' => $join,
            'fields' => $fields,
            'where' => $where,
            'limit' => $limit,
            'orderBy' => $orderBy,
            'orderType' => $orderType,
        );


        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;

    }


    public function _save($userid, $task_id = null) //save or update

    {



        $taskDescription= $this->validate->post('taskDescription', 'SAFETEXT');
        if ($taskDueDate = $this->validate->post('taskDueDate', 'DATE')) {
            $date = new DateTime($taskDueDate);
            $taskDueDate = $date->format('Y-m-d');
        }
        $data = array();
        $data['taskDescription'] = $taskDescription;
        $data['taskDueDate'] = $taskDueDate;
        $data['taskAssignedTo'] = $userid;

        if(!$task_id)
        { // insert

            $data['taskCreatedBy']= $this->USER_ID;
            $items = array(
                'tableName' => 'taskTblTaskManager',
                'data'      => $data,
            );
            $result = $this->dbpdo->insert($items);

            if (!$result) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return $result;

        }
        else

        {

            $data = array();
            //if we are updating we are simply changing status to done
            //mark it done record response
            //@todo check for input user id and task match from form submission
            $taskResponse= $this->validate->post('taskResponse', 'SAFETEXT');
            $data['taskStatus'] = 1;
            $data['taskCompletedDateTime'] = $this->CurrentDate;;
            $data['taskResponse'] = $taskResponse;

            //update

            $where = array(
                'taskID = :taskID',
            );
            $params = array(
                'taskID' => $task_id,
            );

            $items = array(
                'tableName' => 'taskTblTaskManager',
                'data'      => $data,
                'where' => $where,
                'params' => $params,
            );
            $result = $this->dbpdo->update($items);
            if (!$result) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            $taskCreatedBy = $this->input->post('taskCreatedBy');
            if($taskCreatedBy != $this->USER_ID)
            {
            //send message

                $data = array();
                $data['msgOwnerID'] = $taskCreatedBy;//sending to your list
                $data['msgSenderID'] = $this->USER_ID; //from me
                $data['msgMessage'] = 'Task Completed:'.PHP_EOL .$taskDescription.PHP_EOL .'RESPONSE:'.$taskResponse;

                $items = array(
                    'tableName' => 'msgTblMessages',
                    'data'      => $data,
                );
                $rows = $this->dbpdo->insert($items);
                if (!$rows) {
                    return array('error' =>'Error .<br />' . $this->dbpdo->getErrorMessage());
                }
            }


            return $result;

        }

    }

    public function _getTaskUser($id)

    {

        $tablename = 'crmTblContacts';
        $keyfield = 'cntId';


        $fields = array('*'
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
            'params' => $params,
            'where' => $where,
        );

        if (false === ($rows = $this->dbpdo->getOne($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;
    }



}