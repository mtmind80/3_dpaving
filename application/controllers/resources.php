<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resources extends EX_Locked {
    // this controller requires login


    function __construct()
    {
        parent::__construct();


        $allowed_roles = array(1,6); //only admin and office
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
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li class="active">Resources</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //resources template
        $this->smarty->assignContentTemplate('resources/res_main');

        //load models

        $this->load->model('M_Resources');


    }


    public function index($filter = null)

    {

        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->view();
    }


    // DOCUMENT TYPES
    public function DocTypesList()

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li class="active">Resources</li><li class="active">Document Types</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Resources->_getDocTypes();
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/DocTypesList.tpl');

        $this->smarty->view();
    }


    public function CreateDocTypes()

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li class="active">Resources</li>
        <li class="active">Add Document Type</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/DocTypesAdd.tpl');

        $this->smarty->view();
    }

    public function editDocTypes($id)

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Edit Document Types</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        $data = $this->M_Resources->_getDocTypes($id);

        $this->smarty->assign('data', $data);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT', 'resources/DocTypesEdit.tpl');

        $this->smarty->view();

    }

    public function saveDocTypes($id = null)

    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');
        $result = $this->M_Resources->_saveDocTypes($id);
        if($result)
        {
            $this->session->set_flashdata('msg','Your data was saved');
            if($id)
            {
                $this->session->set_flashdata('msg','Your document type data was updated');
                redirect($this->WEBCONFIG['webStartPage'].'resources/editDocTypes/'.$id, 'refresh');
            }
        }
        redirect($this->WEBCONFIG['webStartPage'].'resources/CreateDocTypes', 'refresh');

    }

    //END DOCUMENT TYPES

    // COMPANY VEHICLES
    public function vehicleList()

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li class="active">Resources</li><li class="active">Vehicle List</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $vehicles = $this->M_Resources->_getVehicle();
        $this->smarty->assign('vehicles', $vehicles);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/vehicleList.tpl');

        $this->smarty->view();
    }


    public function CreateVehicle()

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li class="active">Resources</li><li class="active">Add Vehicle</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        // get widgets
        $vtypes = $this->M_Common->_getVTypes();
        $locations = $this->M_Common->_getLocations();

        //assign widgets and data
        $this->smarty->assign('vtypes', $vtypes);
        $this->smarty->assign('locations', $locations);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/vehicleAdd.tpl');

        $this->smarty->view();
    }

    public function editVehicle($id)

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Edit Vehicle</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        // get widgets
        $vtypes = $this->M_Common->_getVTypes();
        $locations = $this->M_Common->_getLocations();

        //assign widgets and data
        $this->smarty->assign('vtypes', $vtypes);
        $this->smarty->assign('locations', $locations);
        $this->smarty->assignPageTitle('3D Paving Application');

        //get data
        if($result = $this->M_Resources->_getVehicle($id))
        {
            $this->smarty->assign('result', $result);
            //insert into resource template
             $this->smarty->assign('CONTENT', 'resources/vehicleEdit.tpl');
        }
        else
        {
            //insert into resource template
            $this->smarty->assign('CONTENT', 'resources/vehicleAdd.tpl');
        }

            $this->smarty->view();

    }

    public function deleteVehicle($id = 0, $action = 0)
    {
            $this->M_Resources->_deleteVehicle($id, $action);
            $this->session->set_flashdata('msg','Vehicle Was Disabledd');
            redirect($this->WEBCONFIG['webStartPage'].'resources/vehicleList', 'refresh');
    }

    public function saveVehicle($id = null)

    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');
        $result = $this->M_Resources->_saveVehicle($id);
        if($result)
        {
            $this->session->set_flashdata('msg','Your data was saved');
            if($id)
            {
                $this->session->set_flashdata('msg','Your vehicle data was updated');
                redirect($this->WEBCONFIG['webStartPage'].'resources/editVehicle/'.$id, 'refresh');
            }
        }
        redirect($this->WEBCONFIG['webStartPage'].'resources/CreateVehicle', 'refresh');

    }

    //END COMPANY VEHICLES

    /* VEHICLE TYPES
        $table = 'dataLkpVehicleTypes';
        fields vtypeID 	vtypeName 	vtypeDescription 	vtypeRate
    */



    public function vehicleTypeList($id = null)

    {
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Vehicle Types and Rates</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $vehicles = $this->M_Resources->_getVehicleTypes($id);
        $this->smarty->assign('vehicles', $vehicles);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/vehicleTypeList.tpl');

        $this->smarty->view();


    }

    public function CreateVehicleType()

    {
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Vehicle Types and Rates</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $vehicles = $this->M_Resources->_getVehicleTypes();
        $this->smarty->assign('vehicles', $vehicles);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/vehicleTypeAdd.tpl');

        $this->smarty->view();


    }


    public function saveVehicleType($id = null)

    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Resources->_saveVehicleTypes($id))
        {
            $this->session->set_flashdata('msg','Your data was saved');
            if($id)
            {
                $this->session->set_flashdata('msg','Your vehicle type data was updated');
                redirect($this->WEBCONFIG['webStartPage'].'resources/editVehicleType/'.$id, 'refresh');
            }
        }

        redirect($this->WEBCONFIG['webStartPage'].'resources/CreateVehicleType', 'refresh');

    }


    public function editVehicleType($id)

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Edit Vehicle Type</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);


        $this->smarty->assignPageTitle('3D Paving Application');

        //get data
        if($result = $this->M_Resources->_getVehicleTypes($id))
        {
            $this->smarty->assign('result', $result);
            //insert into resource template
            $this->smarty->assign('CONTENT', 'resources/vehicleTypeEdit.tpl');
        }
        else
        {
            //insert into resource template
            $this->smarty->assign('CONTENT', 'resources/vehicleTypeAdd.tpl');
        }

        $this->smarty->view();

    }

    //END VEHICLE TYPES


    // VEHICLE LOGS




    public function CreateVehicleLog($vehicle_id)

    {
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li><a href="'.$this->SITE_URL.'resources/vehicleList">Vehicle List</a></li>
        <li class="active">Vehicle Log</li>';




        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $this->smarty->assign('vehicleName', 'big truck'); //vehicleName
        //get data
        $vehicleLog = $this->M_Resources->_getVehicleLogs($vehicle_id);
        $this->smarty->assign('vehicleLog', $vehicleLog);

        $vehicles = $this->M_Resources->_getVehicle($vehicle_id);
        $this->smarty->assign('vehicles', $vehicles);


        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/vehicleLogList.tpl');

        $this->smarty->view();


    }


    public function saveVehicleLog($vehicle_id)

    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Resources->_saveVehicleLog($vehicle_id))
        {
            $this->session->set_flashdata('msg','Your data was saved');
        }
        redirect($this->WEBCONFIG['webStartPage'].'resources/CreateVehicleLog/'.$vehicle_id, 'refresh');
    }


    public function deleteVehicleLog($logid,$vehicle_id)

    {

        $this->M_Resources->_deleteVehicleLog($logid);
        $this->session->set_flashdata('msg','Vehicle Log Entry Was Deleted');
        redirect($this->WEBCONFIG['webStartPage'].'resources/CreateVehicleLog/'.$vehicle_id, 'refresh');

    }


    //END VEHICLE LOG


    public function OtherCosts()
    {
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Other Costs</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Resources-> _getPOOtherlist();
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/othercostList.tpl');

        $this->smarty->view();


    }


    // MATERIALS



public function materialsList($matid = null)

{

    //breadcrumb
    $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Materials</li>';
    $this->smarty->assign('BREADCRUMB', $breadcrumb);

    //get data
    $data = $this->M_Resources->_getMaterials($matid);
    $this->smarty->assign('data', $data);

    $this->smarty->assignPageTitle('3D Paving Application');
    //insert into resource template
    $this->smarty->assign('CONTENT', 'resources/materialsList.tpl');

    $this->smarty->view();


}

    public function saveMaterials($matid = null)

    {

        $this->session->set_flashdata('msg','Your data was updated');
        $formValues = $this->input->post(NULL, TRUE);
        if($formValues)
        {
            foreach($formValues as $key => $value)
            {
                if(substr($key, 0, 7) == 'matcost')

                {
                    $matcost = $value;
                    $matpieces = explode ('_', $key);
                    $matid = $matpieces[1];
                    $mataltcost = $this->input->post('mataltcost_'.$matid);
                    //echo '<br/>Insert into ' .$matcost .'-'. $mataltcost .'-'. $matid;
                    $this->M_Resources->_saveMaterials($matid,$matcost,$mataltcost);
                }
            }

        }
        redirect($this->WEBCONFIG['webStartPage'].'resources/materialsList/', 'refresh');
    }


    //END MATERIALS


//LOCATIONS

public function showLocations()
{
    //breadcrumb
    $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Company locations</li>';
    $this->smarty->assign('BREADCRUMB', $breadcrumb);

    //get data
    $data = $this->M_Common->_getLocations();
    $this->smarty->assign('data', $data);

    $this->smarty->assignPageTitle('3D Paving Application');
    //insert into resource template
    $this->smarty->assign('CONTENT', 'resources/locationList.tpl');

    $this->smarty->view();

}


    public function saveLocations($id)
    {

        //get data
        $this->session->set_flashdata('msg','Your data was updated');
        $data = $this->M_Common->_saveLocations($id);
        redirect($this->WEBCONFIG['webStartPage'].'resources/showLocations/', 'refresh');

    }


    public function editLocations($id)
    {
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Company locations</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Common->_getLocations($id);

        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/locationEdit.tpl');

        $this->smarty->view();

    }


// END LOCATIONS

    // MULTI VENDOR PRICING



    public function multivendorList()

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Multi Vendor Striping Pricing</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Resources->_getMultiVendor();
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/multivendorList.tpl');

        $this->smarty->view();


    }

    public function saveMultivendor($id = null)

    {
        $this->session->set_flashdata('msg','Your data was updated');
        $data = $this->M_Resources->_saveMultiVendorPricing($id);
        redirect($this->WEBCONFIG['webStartPage'].'resources/multivendorList/', 'refresh');
    }

    public function addMultivendor()
    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Resources</li>
        <li class="active">Add Multi Vendor Striping Pricing</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        $services = $this->M_Resources->_getMultiVendorServices();
        $this->smarty->assign('services', $services);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/multivendorAdd.tpl');

        $this->smarty->view();

    }

    //END Multi vendor
    //EQUIPMENT

    public function equipmentList($id = null)

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Equipment</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        //get data
        $data = $this->M_Resources->_getEquipment($id);
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/equipmentList.tpl');

        $this->smarty->view();



    }


    public function saveEquipment($id = null)

    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Resources->_saveEquipment($id))
        {
            $this->session->set_flashdata('msg','Your data was saved');
        }
        redirect($this->WEBCONFIG['webStartPage'].'resources/equipmentList/', 'refresh');

    }


    public function CreateEquipment()

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Create New Equipment</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/equipmentAdd.tpl');

        $this->smarty->view();

    }

    public function editEquipment($id)

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Edit Equipment</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Resources->_getEquipment($id); //get one


        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/equipmentEdit.tpl');

        $this->smarty->view();

    }
    //END EQUIPMENT


    //SERVICES SECTION

    public function serviceList($id = null)

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Services</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        //get data
        $data = $this->M_Resources->_getService($id);
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/servicesList.tpl');

        $this->smarty->view();



    }


    public function saveService($id = null)

    {

        foreach ($_POST as $key => $value)
        {
            //echo $key . ": " . $value . "<br>";
        }

        //exit();

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Resources->_saveService($id))
        {
            $this->session->set_flashdata('msg','Your data was saved');
        }

        redirect($this->WEBCONFIG['webStartPage'].'resources/serviceList/', 'refresh');

    }


    public function CreateService()

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Add Services</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $serviceslist = $this->M_Resources->_getServiceColors();
        $this->smarty->assign('serviceslist', $serviceslist);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/servicesAdd.tpl');

        $this->smarty->view();

    }

    public function editService($id)

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Edit Service</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Resources->_getService($id); //get one
        $this->smarty->assign('data', $data);

        $serviceslist = $this->M_Resources->_getServiceColors();
        $this->smarty->assign('serviceslist', $serviceslist);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/servicesEdit.tpl');

        $this->smarty->view();

    }



    //END SERVICES SECTION




    //WORKER RATES

    public function laborList($id = null)

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Labor Rates</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        //get data
        $data = $this->M_Resources->_getWorkerRates($id);
        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/laborList.tpl');

        $this->smarty->view();



    }


    public function saveLabor($id = null)

    {

        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        if($result = $this->M_Resources->_saveWorkerRates($id))
        {
            $this->session->set_flashdata('msg','Your data was saved');
        }
        redirect($this->WEBCONFIG['webStartPage'].'resources/laborList/', 'refresh');

    }


    public function CreateLabor()

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Labor Rates</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/laborAdd.tpl');

        $this->smarty->view();

    }

    public function editLabor($id)

    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Labor Rates</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Resources->_getWorkerRates($id); //get one


        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/laborEdit.tpl');

        $this->smarty->view();

    }

    public function showServicecolors($id = null)
    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li><a href="'.$this->SITE_URL.'resources/">Resources</a></li>
        <li>Service Colors</li>';

        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //get data
        $data = $this->M_Resources->_getServiceColors($id);

        $this->smarty->assign('data', $data);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT', 'resources/serviceColors.tpl');

        $this->smarty->view();



    }

}
