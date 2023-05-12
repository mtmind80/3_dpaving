<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EX_Locked extends EX_Controller {


    function __construct()
    {
        parent::__construct();

        /*check access to locked pages
        if(!$this->M_System->_checkAccess($this->USER_ID))
        {
                $this->session->set_flashdata('msg', 'Sorry you are not allowed in.');
                //read it $this->session->flashdata('item');
                redirect($this->WEBCONFIG['webStartPage'].'logout', 'refresh');
       }
       */

        //check access and refresh all items ?
        $result = $this->M_System->_checkAccessRole($this->USER_ID);
        //print_r($result);

        if(empty($result['error']) && !empty($result['cntSecAccess']))
        {
            if($result['cntSecAccess'] != 1 || $result['cntIsEmployee'] != 1 || $result['cntStatusId'] != 1 )
            {

                /*
                 * cntSecAccess = access to internet
                 * cntIsEmployee = Is an employee
                 * cntStatusId = 1 = active 0 = disabled
                 */
                //echo "You are bannedx";
                //exit();
                $this->session->set_flashdata('msg', 'Sorry you are not allowed in.');

                redirect($this->WEBCONFIG['webStartPage'].'logout', 'refresh');
            }
            $userInfo = $this->session->userdata('userInfo');

            $userInfo['USER_ACCESS'] = $result['cntSecAccess'];
            $userInfo['USER_ID'] = $result['cntId'];
            $userInfo['USER_FIRSTNAME'] = $result['cntFirstName'];
            $userInfo['USER_LASTNAME'] = $result['cntLastName'];
            $userInfo['USER_FULLNAME'] = $result['cntFirstName'] . ' ' . $result['cntLastName'];
            $userInfo['USER_EMAIL'] =$result['cntPrimaryEmail'];
            $userInfo['USER_ROLE'] = $result['cntRole'];
            $userInfo['USER_GENDER'] = $result['cntGender'];

            $this->session->set_userdata('userInfo', $userInfo);
            // set to prevent session hijacking:
            $this->session->set_userdata('LoggedInUserAgent', $_SERVER['HTTP_USER_AGENT']);
            $this->session->set_userdata('LoggedInUserIP', $_SERVER['REMOTE_ADDR']);


        }
        else
        {

            $this->session->set_flashdata('msg', 'Sorry you are not allowed in.');
            redirect($this->WEBCONFIG['webStartPage'].'logout', 'refresh');

        }


    }

}
