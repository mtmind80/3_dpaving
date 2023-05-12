<?php

class M_BUGS extends CI_Model
{


    public function _getBugs($id = null)
    {

        $tablename = 'sysBugs';
        $keyfield = 'bugID';
        //now get records
        $fields = array('*');
        if($id) // get one
        {
            $where = array(
                $keyfield .' = :id',
            );

            $params = array(
                'id' =>  $id,
            );
            $orderby = array(
                'bugReportedDate',
            );

            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
                'params' => $params,
                'orderby' => $orderby,
                'where' => $where,
            );

            if (false === ($rows = $this->dbpdo->getOne($items)))
            {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

        }
        else
        {
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
            );

            if (false === ($rows = $this->dbpdo->get($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

        }
        return $rows;

    }



    public function _save($id = null)
    {

        $tablename = 'sysBugs';
        $data = array();

        if(isset($_POST['bugReportedDate']))
        {
           $bugReportedDate = $_POST['bugReportedDate'];
            $data['bugReportedDate'] = $bugReportedDate;
        }

        if(isset($_POST['bugReportedBy']))
        {
            $bugReportedBy = $_POST['bugReportedBy'];
            $data['bugReportedBy'] = htmlentities($bugReportedBy);
        }
        if(isset($_POST['bugReport']))
        {
            $bugReport = $_POST['bugReport'];
            $data['bugReport'] = htmlentities($bugReport);
        }
        if(isset($_POST['bugProject']))
        {
            $bugProject = $_POST['bugProject'];
            $data['bugProject'] = htmlentities($bugProject);
        }
        if(isset($_POST['bugURL']))
        {
            $bugURL = $_POST['bugURL'];
            $data['bugURL'] = htmlentities($bugURL);
        }
        if(isset($_POST['bugImage']))
        {
            $bugImage = $_POST['bugImage'];
            $data['bugImage'] = htmlentities($bugImage);
        }
        if(isset($_POST['bugActionTaken']))
        {
            $bugActionTaken = $_POST['bugActionTaken'];
            $data['bugActionTaken'] = htmlentities($bugActionTaken);
        }
        if(isset($_POST['bugActionTakenBy']))
        {
            $bugActionTakenBy = $_POST['bugActionTakenBy'];
            $data['bugActionTakenBy'] = htmlentities($bugActionTakenBy);
        }
        if(isset($_POST['bugActionTakenDate']))
        {
            $bugActionTakenDate = $_POST['bugActionTakenDate'];
            $data['bugActionTakenDate'] = $bugActionTakenDate;
        }
        if(isset($_POST['bugTestedDate']))
        {
            $bugTestedDate = $_POST['bugTestedDate'];
            $data['bugTestedDate'] = $bugTestedDate;
        }

        if(isset($_POST['bugFixedNote']))
        {
            $bugFixedNote = $_POST['bugFixedNote'];
            $data['bugFixedNote'] = htmlentities($bugFixedNote);
        }



        if(isset($_POST['bugTestedBy']))
        {
            $bugTestedBy = $_POST['bugTestedBy'];
            $data['bugTestedBy'] = htmlentities($bugTestedBy);
        }
        if(isset($_POST['bugFixed']))
        {
            $bugFixed = $_POST['bugFixed'];
            $data['bugFixed'] = htmlentities($bugFixed);
        }

        if($id) // update
        {
            $where = array(
                'bugID  = :id',
            );
            $params = array(
                'id' =>  $id,
            );
            $items = array(
                'tableName' => $tablename,
                'data' => $data,
                'params' => $params,
                'where' => $where,
            );

            $userId = $this->dbpdo->update($items);
            if ($userId === false) {
                return array('error' =>'Error inserting data into table.<br />' . $this->dbpdo->getErrorMessage());
            }


        }
        else
        {
            $items = array(
                'tableName' => $tablename,
                'data' => $data,
            );

            $id = $this->dbpdo->insert($items);
            if ($id === false) {
                return array('error' =>'Error inserting data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

        }

        return $id;

    }


}