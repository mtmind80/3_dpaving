<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EX_Controller extends CI_Controller {

    public $CORE_TEMPLATE = 'core/core';
    public $WEBCONFIG = array();
    public $USER_LOGIN_ATTEMPTS;
    public $USER_ACCESS = 0;
    public $USER_ID = 0;
    public $USER_FIRSTNAME;
    public $USER_LASTNAME;
    public $USER_FULLNAME;
    public $USER_EMAIL;
    public $USER_ROLE = 0;
    public $SITE_URL = '';
    public $USER_GENDER ='';
    public $CurrentDate = '';
    public $CurrentTimeStamp = '';




    function __construct()
    {
        parent::__construct();

        // load common models
        $this->load->model(array('M_System','M_Messages','M_Common', 'M_Tasks', 'M_Calendar'));

        //LOAD SESSION INFO IF EXISTS
        $this->getSessionInfo();
        $this->SESSION_ID = $this->session->userdata('session_id');

        $this->load->helper('date');
        $format = 'DATE_RFC822';
        $time = time();
        $sdate = standard_date($format, $time);
        $date = new DateTime($sdate);
        $CurrentDate = $date->format('Y-m-d');
        $this->CurrentDate = $CurrentDate;
        $this->smarty->assign('CurrentDate', $this->CurrentDate);
        $CurrentTimeStamp = $date->format('Y-m-d H:i:s');
        $this->CurrentTimeStamp = $CurrentTimeStamp;
        $this->smarty->assign('CurrentTimeStamp', $this->CurrentTimeStamp);
        $date = strtotime($this->CurrentDate);
        $this->smarty->assign('strCurrentDate', $date);

        if (date('w', $date) == 0) // today is sunday
        {
            $thisSunday = $date;
        }
/*
 *
         elseif (date('w', $date) == 0) //if today is sunday
        {

             $thisSunday =  strtotime( 'next Sunday',$date);

        }
 */
        else
        {
            $thisSunday =  strtotime('last sunday',$date);
        }


        $this->thisSunday = $thisSunday;
        $nextSunday = strtotime( 'next sunday',$date);
        $this->nextSunday = $nextSunday;
        $prevSunday = strtotime('last sunday',$date);
        $this->prevSunday = $prevSunday;
        $this->smarty->assign('thisSunday', $this->thisSunday);
        $this->smarty->assign('nextSunday', $this->nextSunday);
        $this->smarty->assign('prevSunday', $this->prevSunday);

        $timevalues = $this->M_Common->_getTimeValues();
        $this->smarty->assign('timevalues', $timevalues);

        $this->SITE_URL = $this->WEBCONFIG['webStartPage'];
        //default a breadcrumb and page title
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //reset config start page if comes from database
        $this->config->config['base_url'] = $this->WEBCONFIG['webStartPage'];
        //assign defaults to smarty
        $this->smarty->assign('WEB_CONFIG', $this->WEBCONFIG);
        $this->smarty->assignPageTitle($this->WEBCONFIG['webSitetitle']);
        $this->smarty->assign('SITE_URL', $this->WEBCONFIG['webStartPage']);


        //hard coded widgets data is small enough to keep in config instead of database
        $this->smarty->assign('VehicleLogTypes',$this->M_Common->_getVehicleLogTypes());

        //system roles for labeling
        $system_roles = $this->config->config['system_roles'];
        $this->smarty->assign('system_roles', $system_roles);
        //$allowed_roles = array(1,2,3,4,5,6);
        $rolelist = $this->config->config['rolelist'];
        $this->smarty->assign('rolelist', $rolelist);
        $allstates = $this->M_System->_getStates();
        $states = '';
        $states .= '<OPTION VALUE="Florida" >Florida</option>';
        foreach ($allstates as $s)
        {
            $states .= '<OPTION VALUE="'.$s['stateName'] .'">'.$s['stateName'] .'</option>';

/*
 *
             if($s['stateName'] == 'Florida')
            {
                $states .= '<OPTION VALUE="'.$s['stateName'] .'" selected>'.$s['stateName'] .'</option>';

            }
            else
            {
                $states .= '<OPTION VALUE="'.$s['stateName'] .'">'.$s['stateName'] .'</option>';
            }
 */
        }
        $this->smarty->assign('states', $states);

        //employee list
        $employeelist = $this->M_Common->_getEmployeeList();
        $this->smarty->assign('employeelist', $employeelist);


        $companylist = $this->M_Common->_getCompanyList();
        $this->smarty->assign('companylist', $companylist);

        $managerlist = $this->M_Common->_getManagerList();
        $this->smarty->assign('managerlist', $managerlist);



        // for bootstrap
        $this->smarty->assign('PAGE_THEME', "theme-default main-menu-animated");

        //help default
        $this->smarty->assign('HELP_TITLE', 'HELP TITLE');
        $this->smarty->assign('HELP_DESC', 'HELP DESCRIPTION');
        $this->smarty->assign('HELP_URL', '');


        //assign messages to smarty
        $msg = $this->session->flashdata('msg');
        $this->smarty->assign('msg', $msg);


    }


    protected function getSessionInfo() // at start of each request
    {
        $userInfo = $this->session->userdata('userInfo');
        $webconfigAry = $this->session->userdata('webconfigAry');

        if (empty($webconfigAry)) // get web config
        {

            // load defaults from database
            $result = $this->M_System->_getWebConfig();
            $webconfigAry = array();
            foreach($result as $rows)
            {
                $webconfigAry[$rows['cfgKey']] = $rows['cfgValue'];
            }
            $webconfigAry['compAddress'] = $webconfigAry['webAddress'] .' '. $webconfigAry['webAddress1'];
            
            $this->WEBCONFIG = $webconfigAry;
            $this->session->set_userdata('webconfigAry',$webconfigAry);


        }
        else
        {
            $this->WEBCONFIG = $webconfigAry;

        }

        if (!empty($userInfo) && $userInfo['USER_ACCESS'] == 1) // user is logged in setup session
        {


            $this->USER_LOGIN_ATTEMPTS = $userInfo['USER_LOGIN_ATTEMPTS'];
            $this->USER_ACCESS = $userInfo['USER_ACCESS'];
            $this->USER_ID = $userInfo['USER_ID'];
            $this->USER_FIRSTNAME = $userInfo['USER_FIRSTNAME'];
            $this->USER_LASTNAME = $userInfo['USER_LASTNAME'];
            $this->USER_FULLNAME = $userInfo['USER_FULLNAME'];
            $this->USER_EMAIL = $userInfo['USER_EMAIL'];
            $this->USER_ROLE = $userInfo['USER_ROLE'];
            $this->USER_GENDER = $userInfo['USER_GENDER'];
            $this->IS_EMPLOYEE = $userInfo['IS_EMPLOYEE'];


            $this->smarty->assign('USER_ACCESS', $this->USER_ACCESS);
            $this->smarty->assign('USER_ID', $this->USER_ID);
            $this->smarty->assign('USER_FIRSTNAME', $this->USER_FIRSTNAME);
            $this->smarty->assign('USER_LASTNAME', $this->USER_LASTNAME);
            $this->smarty->assign('USER_FULLNAME', $this->USER_FULLNAME);
            $this->smarty->assign('USER_EMAIL', $this->USER_EMAIL);
            $this->smarty->assign('USER_ROLE', $this->USER_ROLE);
            $this->smarty->assign('USER_GENDER', $this->USER_GENDER);
            $this->smarty->assign('IS_EMPLOYEE', $this->IS_EMPLOYEE);
            $this->smarty->assign('userInfo', $userInfo);


            $nowDate = strtotime("now");
            $Month = date('Y-m-1',$nowDate);

            $CurrentDate = date('Y-m-d',$nowDate);
            $NextCurrentDate = strtotime("+ 1 month");
            $NextMonth = date('Y-m-1',$NextCurrentDate);

            $CurrentDay = date('d',$nowDate);
            $CurrentMonth = date('m',$nowDate);
            //$NextMonth = date('m',$NextCurrentDate);
            $CurrentYear = date('Y',$nowDate);
            $thisMonth = date('F', $nowDate);
            $this->CurrentDate = $CurrentDate;
            $this->CurrentMonth = $CurrentMonth;
            $this->NextMonth = $NextMonth;
            $this->Month = $Month;
            $this->CurrentDay = $CurrentDay;
            $this->CurrentYear = $CurrentYear;
            $this->smarty->assign('thisMonth', $thisMonth .', '. $CurrentYear);
                //user is allowed in
                // @todo Get messages count
                //system Messages
                $messagecount = $this->M_Common->_getLastMessages($this->USER_ID);
                $this->smarty->assign('messagecount', $messagecount);

                $message_contents = array(
                    array('messageid' =>1, 'message_recipient' => 'Mike','message_sender' =>'Mike','message_datetime' => '2015-03-12','recipientid' =>1,'senderid' =>1),
                    array('messageid' =>2, 'message_recipient' => 'Mike','message_sender' =>'Greg','message_datetime' => '2015-03-12','recipientid' =>1,'senderid' =>2),
                );
                $this->smarty->assign('message_contents', $message_contents);

                // @todo  Get User tasks
                // get my tasks
                $tasklist = $this->M_Common->_getLastTasks($this->USER_ID);
                $this->smarty->assign('tasklist', $tasklist);

                // @todo  Get Calendar Events

                // @todo  Get User Reminders

                $data = $this->M_Calendar->_getRemindersList();
                $this->smarty->assign('crmreminders', $data);

                // number iof reminders

                $crm_reminder = $this->M_Calendar->_getRemindersCount($Month, $NextMonth);

                $this->smarty->assign('crm_reminder', $crm_reminder);



                // @todo  Get User New Messages

                $this->load->helper('date');
                //setup dates for calendar
                $todayday = mdate("%d");
                $dayNames = array(
                   'Sun'=>'Sunday',
                    'Mon'=>'Monday',
                    'Tue'=>'Tuesday',
                    'Wed'=>'Wednesday',
                    'Thu'=>'Thursday',
                    'Fri'=>'Friday',
                    'Sat'=>'Saturday',
                );
                $todayname = $dayNames[mdate("%D")];
                $this->smarty->assign('todayday', $todayday);
                $this->smarty->assign('todayname', $todayname);

        }


    }

    public function showPostArray()
    {
        $str_post ='';
        //get all posted values
        $formValues = $this->input->post(NULL, TRUE);

        foreach($formValues as $key => $value)
        {
            $str_post .= $key .'='. $value. '<br/>';

        }

        return $str_post;
    }


public function checkRoleAccess($allowed_roles)
{
    $this->smarty->assign('allowed_roles', $allowed_roles);
    if(!in_array ($this->USER_ROLE, $allowed_roles))
    {
        redirect($this->WEBCONFIG['webStartPage'].'apperror/catchErrors/1', 'refresh');
    }
}


    public function doLogTransaction($transType,$transNote, $transSessionID)
    {

        $this->load->library('location');
        $locations = $this->location->getLocationFromIP();
        return $this->M_System->_doLogTransaction($transType,$transNote,$transSessionID,$locations);

    }


}


