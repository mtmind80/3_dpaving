<?php

class M_Resources Extends CI_Model
{





    public function _getPOOtherlist()
    {
        $tablename = 'dataLkpOtherCosts';

        $fields = array('*');

        $orderBy = 'OtherCost';


        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
            'orderBy' => $orderBy,
        );


        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;

    }


/* Multi vendor pricing

*/
public function _saveMultiVendorPricing($id = null)

{

    $ScatID= $this->validate->post('ScatID', 'INTEGER');
    $PFS = $this->validate->post('PFS', 'FLOAT');
    $Native_Lines = $this->validate->post('Native_Lines', 'FLOAT');
    $Scott_Munroe = $this->validate->post('Scott_Munroe', 'FLOAT');
    $All_Striping = $this->validate->post('All_Striping', 'FLOAT');
    $STANDARD = $this->validate->post('STANDARD', 'FLOAT');
    $SERVICE_DESC = $this->validate->post('SERVICE_DESC', 'TEXT');
    if(!$SERVICE_DESC) {$SERVICE_DESC ='NA';}

    $data['PFS'] = $PFS;
    $data['Native_Lines'] = $Native_Lines;
    $data['Scott_Munroe'] = $Scott_Munroe;
    $data['All_Striping'] = $All_Striping;
    $data['STANDARD'] = $STANDARD;
    $data['SERVICE_DESC'] = $SERVICE_DESC;

        $where = array(
            'ScatID = :ScatID',
        );
        $params = array(
            'ScatID' => $ScatID,
        );

    if($this->input->post('beenhere') == 1) //form was submitted
    {

        if(!$id) //insert new
        {

            $OTHER_SERVICE = $this->validate->post('OTHER_SERVICE', 'SAFETEXT');
            $SERVICE = $this->validate->post('SERVICE', 'SAFETEXT');
            $data['SERVICE'] = $SERVICE;
            if(!$SERVICE && $OTHER_SERVICE)
            {
                $data['SERVICE'] = $OTHER_SERVICE;
            }
            $items = array(
                'tableName' => 'dataTblMultiVendorPricing',
                'data'      => $data,
            );
            if (!$ScatID = $this->dbpdo->insert($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

        }
        else //update
        {
            $items = array(
                'tableName' => 'dataTblMultiVendorPricing',
                'data'      => $data,
                'where' => $where,
                'params' => $params,
            );
            if (!$this->dbpdo->update($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

        }


    }

    return $ScatID;
}

    public function _getMultiVendor($serviceId = null)

    {


        $tablename = 'dataTblMultiVendorPricing';

        $fields = array('*');


        if(!$serviceId)
        {
            //get all
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
                'orderBy' => 'SERVICE'
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
                'ScatID = :serviceId',
            );

            $params = array(
                'serviceId' =>  $serviceId,
            );

            $items = array(
                'tableName' => $tablename,
                'where'  => $where,
                'params' => $params,
                'fields' => $fields,
            );
            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;

        }
    }



    public function _getMultiVendorServices()

    {

        $tablename = 'dataTblMultiVendorPricing';
        $fields = array('SERVICE');
            //get all
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
                'groupBy' => 'SERVICE',
                'orderBy' => 'SERVICE',

            );

            if (false === ($rows = $this->dbpdo->get($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;

    }



    /* BEGIN VEHICLE SECTION

    */

public function _getVehicle($vehicleid = null)

{


    $tablename = 'dataTblCompanyVehicles';

    $join = array(
        'LEFT JOIN dataLkpVehicleTypes ON dataTblCompanyVehicles.vehicleTypeID = dataLkpVehicleTypes.vtypeID',
        'LEFT JOIN dataTblLocations ON dataTblCompanyVehicles.vehicleLocation = dataTblLocations.locID',
    );
    $fields = array('dataTblCompanyVehicles .*','dataLkpVehicleTypes.vtypeName','dataTblLocations.locName', 'dataTblLocations.locAddress'
    );


    if(!$vehicleid)
    {
        //get all
        $items = array(
            'tableName' => $tablename,
            'join' => $join,
            'fields' => $fields,
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
            'vehicleID = :vehicleid',
        );

        $params = array(
            'vehicleid' =>  $vehicleid,
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


    public function _deleteVehicle($id,$action = 0)

    {

        $data['vehicleActive'] = $action;
        $where = array(
                'vehicleID = :vehicleID',
            );
            $params = array(
                'vehicleID' => $id,
            );

            $items = array(
                'tableName' => 'dataTblCompanyVehicles',
                'data'      => $data,
                'where' => $where,
                'params' => $params,
            );
            if (!$this->dbpdo->update($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;
     }


    public function _saveVehicle($id = null)

    {

        $vehicleName= $this->validate->post('vehicleName', 'SAFETEXT');
        $vehicleDescription = $this->validate->post('vehicleDescription', 'SAFETEXT');
        if(!$vehicleDescription)
        {
            $vehicleDescription ='NA';
        }

        if ($vehiclePurchaseDate = $this->validate->post('vehiclePurchaseDate', 'DATE')) {
            $date = new DateTime($vehiclePurchaseDate);
            $vehiclePurchaseDate = $date->format('Y-m-d');
        }
        $vehicleVinNumber= $this->validate->post('vehicleVinNumber', 'SAFETEXT',FALSE);
        $vehicleLocation= $this->validate->post('vehicleLocation', 'INTEGER');
        $vehicleTypeID = $this->validate->post('vehicleTypeID', 'INTEGER');
        $vehicleActive = 1;
        if($this->input->post('vehicleActive') == 0)
        {
            $vehicleActive = 0;
        }
        $data['vehicleName'] = $vehicleName;
        $data['vehicleDescription'] = $vehicleDescription;
        $data['vehiclePurchaseDate'] = $vehiclePurchaseDate;
        $data['vehicleVinNumber'] = $vehicleVinNumber;
        $data['vehicleLocation'] = $vehicleLocation;
        $data['vehicleTypeID'] = $vehicleTypeID;
        $data['vehicleActive']= $vehicleActive;



        if(!$id)
        { // insert


            $data['vehicleCreatedBy']= $this->USER_ID;
            //start transaction test
            $this->dbpdo->transactionBegin();
            $items = array(
                'tableName' => 'dataTblCompanyVehicles',
                'data'      => $data,
            );
            if (!$this->dbpdo->insert($items)) {
                $this->dbpdo->transactionRollBack();
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return $this->dbpdo->transactionCommit();

        }
        else

        {
            //update
            $vehicleActive = 1;//default to active
            if($this->input->post('vehicleActive') == "True")
            {
                $vehicleActive = 0;
            }
            $data['vehicleActive']= $vehicleActive;
            $where = array(
                'vehicleID = :vehicleID',
            );
            $params = array(
                'vehicleID' => $id,
            );

            //start transaction test
            $this->dbpdo->transactionBegin();
            $items = array(
                'tableName' => 'dataTblCompanyVehicles',
                'data'      => $data,
                'where' => $where,
                'params' => $params,
            );
            if (!$this->dbpdo->update($items)) {
                $this->dbpdo->transactionRollBack();
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return $this->dbpdo->transactionCommit();

        }
    }



    /* END VEHICLE SECTION

    */

    /* Begin document types


    */
    public function _getDocTypes($id = null) // one or all
    {


        $tablename = 'POLkpDocumentTypes';
        $keyfield = 'PODocTypeID';

        $fields = array('*');

        if(!$id)
        {
            //get all
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
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
                $keyfield. ' = :id',
            );

            $params = array(
                'id' =>  $id,
            );

            $items = array(
                'tableName' => $tablename,
                'where'  => $where,
                'params' => $params,
                'fields' => $fields,
            );
            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;

        }
    }

    public function _saveDocTypes($id) //insert or update
    {

        // 	PODocTypeID 	PODocTypeName 	PODocTypeSection
        $tablename = 'POLkpDocumentTypes';
        $keyfield = 'PODocTypeID';
        $PODocTypeName = $this->validate->post('PODocTypeName', 'SAFETEXT');
        $PODocTypeSection = $this->validate->post('PODocTypeSection', 'INTEGER');

        if(!$PODocTypeName)
        {
            return array('error' =>'Error doc type name was not the right type.<br />');

        }
        else
        {
            $data['PODocTypeName'] = $PODocTypeName;
            $data['PODocTypeSection'] = $PODocTypeSection;
        }

        if(!$id)
        { // insert

            $items = array(
                'tableName' => 'POLkpDocumentTypes',
                'data'      => $data,
            );
            if (!$this->dbpdo->insert($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;

        }
        else

        {

            $where = array(
                $keyfield. ' = :id',
            );
            $params = array(
                'id' => $id,
            );

            $items = array(
                'tableName' => $tablename,
                'data' => $data,
                'where' => $where,
                'params' => $params,
            );
            if (!$this->dbpdo->update($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;

        }

    }


    /* Begin Vehicle types


    */
    public function _getVehicleTypes($id = null) // one or all
    {


        $tablename = 'dataLkpVehicleTypes';

        $fields = array('*');



        if(!$id)
        {
            //get all
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
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
                'vtypeID = :id',
            );

            $params = array(
                'id' =>  $id,
            );

            $items = array(
                'tableName' => $tablename,
                'where'  => $where,
                'params' => $params,
                'fields' => $fields,
            );
            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;

        }
    }

    public function _saveVehicleTypes($id) //insert or update
    {

        // 	vtypeID 	vtypeName 	vtypeDescription 	vtypeRate
        $vtypeID= $this->validate->post('vtypeID', 'INTEGER');
        $vtypeName = $this->validate->post('vtypeName', 'SAFETEXT');
        $vtypeDescription = $this->validate->post('vtypeDescription', 'SAFETEXT');
        $vtypeRate = $this->validate->post('vtypeRate', 'FLOAT');

        $data['vtypeName'] = $vtypeName;
        $data['vtypeDescription'] = $vtypeDescription;
        $data['vtypeRate'] = $vtypeRate;

        if(!$id)
        { // insert

            $items = array(
                'tableName' => 'dataLkpVehicleTypes',
                'data'      => $data,
            );
            if (!$this->dbpdo->insert($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;

        }
        else

        {

            $where = array(
                'vtypeID = :vtypeID',
            );
            $params = array(
                'vtypeID' => $id,
            );

            $items = array(
                'tableName' => 'dataLkpVehicleTypes',
                'data'      => $data,
                'where' => $where,
                'params' => $params,
            );
            if (!$this->dbpdo->update($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;

        }

    }


    /* BEGIN VEHICLE LOG

    */

    public function _getVehicleLogs($vehicle_id) // all for a vehicle
    {


        $where = array(
            'vlogVehicleID = :vlogVehicleID',
        );
        $orderby = array(
            'vlogDate',
        );
        $params = array(
            'vlogVehicleID' => $vehicle_id,
        );
        $items = array(
            'tableName' => 'dataTblCompanyVehicleLog',
            'where' => $where,
            'params' => $params,
            'orderby' => $orderby,
        );

        if (false === ($rows = $this->dbpdo->get($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;
    }



    public function _saveVehicleLog() //insert only
    {

     //   vlogVehicleID 	vlogTypeID 	vlogNote 	vlogDate 	vlogAmount 	vlogCreatedBy

        $vlogVehicleID = $this->validate->post('vlogVehicleID', 'INTEGER');
        $vlogType = $this->validate->post('vlogType', 'SAFETEXT');
        $vlogNote = $this->validate->post('vlogNote', 'SAFETEXT');
        $vlogAmount = $this->validate->post('vlogAmount', 'FLOAT');
        if ($vlogDate = $this->validate->post('vlogDate', 'DATE')) {
            $date = new DateTime($vlogDate);
            $vlogDate = $date->format('Y-m-d');
        }

        $data['vlogVehicleID'] = $vlogVehicleID;
        $data['vlogType'] = $vlogType;
        $data['vlogNote'] = $vlogNote;
        $data['vlogDate'] = $vlogDate;
        $data['vlogAmount'] = $vlogAmount;
        $data['vlogCreatedBy'] = $this->USER_ID;


            $items = array(
                'tableName' => 'dataTblCompanyVehicleLog',
                'data'      => $data,
            );
            if (!$this->dbpdo->insert($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;


    }


    public function _deleteVehicleLog($vlogID) // delete entry only
    {

        $where = array(
            'vlogID = :vlogID',
        );
        $params = array(
            'vlogID' => $vlogID,
        );
        $items = array(
            'tableName' => 'dataTblCompanyVehicleLog',
            'where' => $where,
            'params' => $params,
        );
        if (!$this->dbpdo->delete($items)) {
            return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
        }

        return true;

    }



    /* END VEHICLE LOG SECTION

     */

    /* BEGIN MATERIALS SECTION

     */

public function _getMaterials($id = null)
{

    $tablename = 'dataTblMaterials';
    $keyfield = 'matID';

    $fields = array('*');

    if(!$id)
    {
        //get all
        $items = array(
            'tableName' => $tablename,
            'fields' => $fields,
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
            $keyfield .' = :id',
        );

        $params = array(
            'id' =>  $id,
        );

        $items = array(
            'tableName' => $tablename,
            'where'  => $where,
            'params' => $params,
            'fields' => $fields,
        );
        if (false === ($rows = $this->dbpdo->getOne($items))) {
            return array('error' => $this->dbpdo->getErrorMessage());
        }

        return $rows;

    }
}

    public function _saveMaterials($matid,$matcost,$mataltcost)
    {

        $data['matCost'] = $matcost;
        $data['matAltCost'] = $mataltcost;
        $where = array(
            'matID = :matID',
        );
        $params = array(
            'matID' => $matid,
        );

        $items = array(
            'tableName' => 'dataTblMaterials',
            'data'      => $data,
            'where' => $where,
            'params' => $params,
        );
        if (!$this->dbpdo->update($items)) {
            return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
        }

        return true;

    }
    /* END MATERIALS SECTION

     */

    /* EQUIPMENT

    */

    public function _getEquipment($id = null)
    {
        $tablename = 'dataTblEquipment';
        $keyfield = 'equipID';

        $fields = array('*');

        if(!$id)
        {
            //get all
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
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
                $keyfield .' = :id',
            );

            $params = array(
                'id' =>  $id,
            );

            $items = array(
                'tableName' => $tablename,
                'where'  => $where,
                'params' => $params,
                'fields' => $fields,
            );
            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;

        }


    }


    public function _saveEquipment($id = null)
    {



            //   equipID 	equipName 	equipRate 	equipCost 	equipMinCost
            $tablename = 'dataTblEquipment';
            $equipName = $this->validate->post('equipName', 'SAFETEXT');
            $equipRate = $this->validate->post('equipRate', 'SAFETEXT');
            $equipCost = $this->validate->post('equipCost', 'FLOAT');
            $equipMinCost = $this->validate->post('equipMinCost', 'FLOAT');

            $data['equipName'] = $equipName;
            $data['equipRate'] = $equipRate;
            $data['equipCost'] = $equipCost;
            $data['equipMinCost'] = $equipMinCost;
            $data['equipUpdatedBy'] = $this->USER_ID;


            if(!$id)
            { // insert

                $items = array(
                    'tableName' => $tablename,
                    'data'      => $data,
                );
                if (!$this->dbpdo->insert($items)) {
                    return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
                }

                return true;

            }
            else

            {
                //update
                $equipID = $this->validate->post('equipID', 'INTEGER');
                $where = array(
                    'equipID = :equipID',
                );
                $params = array(
                    'equipID' => $equipID,
                );

                $items = array(
                    'tableName' => $tablename,
                    'data'      => $data,
                    'where' => $where,
                    'params' => $params,
                );
                if (!$this->dbpdo->update($items)) {
                    return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
                }

                return true;

            }


        }

    /* END EQUIPMENT

    */



    public function _getServiceColors($id = null)
    {

        $tablename = ' dataLkpServiceCategories';
        $keyfield = 'catname';
        $orderBy = "catname";
        $fields = array('*');

        if(!$id)
        {
            //get all
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
                'orderBy' => $orderBy,
            );


            if (false === ($rows = $this->dbpdo->get($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

        }
        else
        {
            //get one
            //options where= params, params = data binding, join, groupBy, orderBy, orderType, limit, start,fields
            $where = array(
                $keyfield .' = :id',
            );

            $params = array(
                'id' =>  $id,
            );

            $items = array(
                'tableName' => $tablename,
                'where'  => $where,
                'params' => $params,
                'fields' => $fields,
            );
            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }


        }
            return $rows;



    }

    /* BEGIN SERVICES SECTION


 cmpServiceID,	cmpServiceCat,cmpServiceName,cmpServiceDesc,cmpServiceCreatedby,cmpServiceDefaultRate,cmpServicePreferredRate,cmpServiceOption

*/

    public function _getService($id = null)
    {

        $tablename = 'dataTblCompanyServices';
        $keyfield = 'cmpServiceID';

        $fields = array('*');

        if(!$id)
        {
            //get all
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
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
                $keyfield .' = :id',
            );

            $params = array(
                'id' =>  $id,
            );

            $items = array(
                'tableName' => $tablename,
                'where'  => $where,
                'params' => $params,
                'fields' => $fields,
            );
            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;

        }



    }

    public function _saveService($id = null)

    {


//     cmpServiceID,	cmpServiceCat,cmpServiceName,cmpServiceDesc,cmpServiceCreatedby,cmpServiceDefaultRate,cmpServicePreferredRate,cmpServiceOption


        $tablename = 'dataTblCompanyServices';
        $cmpServiceID = $this->validate->post('cmpServiceID', 'INTEGER');
        $cmpServiceCat = $this->validate->post('cmpServiceCat', 'SAFETEXT');
        $cmpServiceName = $this->validate->post('cmpServiceName', 'SAFETEXT');
        $cmpProposalTextAlt = $this->input->post('cmpProposalTextAlt');
        $cmpProposalTextAltES = $this->input->post('cmpProposalTextAltES');
        $cmpProposalText = $this->input->post('cmpProposalText');
        $cmpServiceDefaultRate = $this->validate->post('cmpServiceDefaultRate', 'FLOAT');
        $cmpServicePreferredRate = $this->validate->post('cmpServicePreferredRate', 'FLOAT');
  //      $cmpServiceOption = $this->validate->post('cmpServiceOption', 'SAFETEXT');

        $data['cmpServiceCat'] = $cmpServiceCat;
        $data['cmpServiceName'] = $cmpServiceName;
        $data['cmpProposalText'] = $cmpProposalText;
        $data['cmpProposalTextAlt'] = $cmpProposalTextAlt;
        $data['cmpProposalTextAltES'] = $cmpProposalTextAltES;
        $data['cmpServiceDefaultRate'] = $cmpServiceDefaultRate;
        $data['cmpServicePreferredRate'] = $cmpServicePreferredRate;
//        $data['cmpServiceOption'] = $cmpServiceOption;


        if(!$id)
        { // insert

            $data['cmpServiceCreatedby'] = $this->USER_ID;
            $items = array(
                'tableName' => $tablename,
                'data'      => $data,
            );
            if (!$this->dbpdo->insert($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;

        }
        else
       {
            //update
            $data['cmpServiceUpdatedby'] = $this->USER_ID;

            $where = array(
                'cmpServiceID = :cmpServiceID',
            );
            $params = array(
                'cmpServiceID' => $cmpServiceID,
            );

            $items = array(
                'tableName' => $tablename,
                'data'      => $data,
                'where' => $where,
                'params' => $params,
            );
            if (!$this->dbpdo->update($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;

        }


    }


   /* END SERVICES SECTION

*/


    /* WORKER RATES

    */

    public function _getWorkerRates($id = null)
    {
        $tablename = 'dataLkpWorkerRates';
        $keyfield = 'rateID';

        $fields = array('*');

        if(!$id)
        {
            //get all
            $items = array(
                'tableName' => $tablename,
                'fields' => $fields,
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
                $keyfield .' = :id',
            );

            $params = array(
                'id' =>  $id,
            );

            $items = array(
                'tableName' => $tablename,
                'where'  => $where,
                'params' => $params,
                'fields' => $fields,
                'fields' => $fields,
            );
            if (false === ($rows = $this->dbpdo->getOne($items))) {
                return array('error' => $this->dbpdo->getErrorMessage());
            }

            return $rows;

        }


    }


    public function _saveWorkerRates($id = null)
    {



        //   rateID 	rateName 	rateAmount
        $tablename = 'dataLkpWorkerRates';
        $rateName = $this->validate->post('rateName', 'SAFETEXT');
        $rateAmount = $this->validate->post('rateAmount', 'FLOAT');

        $data['rateName'] = $rateName;
        $data['rateAmount'] = $rateAmount;


        if(!$id)
        { // insert

            $items = array(
                'tableName' => $tablename,
                'data'      => $data,
            );
            if (!$this->dbpdo->insert($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;

        }
        else

        {
            //update
            $rateID = $this->validate->post('rateID', 'INTEGER');
            $where = array(
                'rateID = :rateID',
            );
            $params = array(
                'rateID' => $rateID,
            );

            $items = array(
                'tableName' => $tablename,
                'data'      => $data,
                'where' => $where,
                'params' => $params,
            );
            if (!$this->dbpdo->update($items)) {
                return array('error' =>'Error inserting message data into table.<br />' . $this->dbpdo->getErrorMessage());
            }

            return true;

        }


    }

    /* END WORKER RATE

    */


}