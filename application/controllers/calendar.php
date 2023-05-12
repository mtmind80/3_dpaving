<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends EX_Locked {
    // this controller requires login


    function __construct()
    {
        parent::__construct();


        $allowed_roles = array(1,2,3,4,5,6); // all users allowed
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
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li class="active">Calendar</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //load models

        $this->load->model('M_Calendar');
        $this->smarty->assignContentTemplate('calendar/cal_main');

}


    public function index($startdate = null, $filter = null)

    {
        //ok do we have a date submitted
        if($startdate && !is_numeric($startdate))
        {
            $date = strtotime($startdate);
            $dateRequested = $date;
            if (date('w', $date) == 0) // today is sunday
            {
                $thisSunday = $date;
            }
            else
            {
                $thisSunday =  strtotime('last sunday',$date);
            }

            $nextSunday = strtotime( 'next sunday',$thisSunday);
            $prevSunday = strtotime('last sunday',$thisSunday);
        }
        else //default to current date if none supplied
        {

           $prevSunday  = $this->prevSunday;
           $thisSunday = $this->thisSunday;
           $dateRequested = $this->strCurrentDate;
           $nextSunday = $this->nextSunday;
        }

        $thisMonday = strtotime( '+ 1 Day',$thisSunday);
        $thisTuesday = strtotime( '+ 2 Days',$thisSunday);
        $thisWednesday = strtotime( '+ 3 Days',$thisSunday);
        $thisThursday = strtotime( '+ 4 Days',$thisSunday);
        $thisFriday = strtotime( '+ 5 Days',$thisSunday);
        $thisSaturday = strtotime( '+ 6 Days',$thisSunday);

        $this->smarty->assign('startdate', $startdate);
        $this->smarty->assign('dateRequested', $dateRequested);
        $this->smarty->assign('thisMonday', $thisMonday);
        $this->smarty->assign('thisTuesday', $thisTuesday);
        $this->smarty->assign('thisWednesday', $thisWednesday);
        $this->smarty->assign('thisThursday', $thisThursday);
        $this->smarty->assign('thisFriday', $thisFriday);
        $this->smarty->assign('thisSaturday', $thisSaturday);

        $this->smarty->assign('thisSunday', $thisSunday);
        $this->smarty->assign('nextSunday', $nextSunday);
        $this->smarty->assign('prevSunday', $prevSunday);

        $PAGE_THEME ="page-calendar theme-default ";
        $this->smarty->assign('PAGE_THEME',$PAGE_THEME);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','calendar/calList.tpl');
        $this->smarty->view();
    }



    public function showcalendar($startdate = null, $filter = null)

    {
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Calendar</li><li class="active">CRM Reminders</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //ok do we have a date submitted
        if($startdate && is_numeric($startdate))
        {

            $dateRequested = $startdate;

            if (date('w', $startdate) == 0) // today is sunday
            {
                $thisSunday = $startdate;
            }
            else
            {
                $thisSunday =  strtotime('last sunday',$startdate);
                // $date = date('m/d/Y', $thisSunday);
            }

            $nextSunday = strtotime( 'next sunday',$startdate);
            $prevSunday = strtotime('last sunday',$startdate);

        }
        else //default to current date if none supplied
        {
            $dateRequested = $this->thisSunday;
            $prevSunday  = $this->prevSunday;
            $thisSunday = $this->thisSunday;
            $nextSunday = $this->nextSunday;
        }

        $year = date('Y',$dateRequested);
        $this->smarty->assign('year', $year);
        $this->smarty->assign('JAN', strtotime('1/1/'.$year));
        $this->smarty->assign('FEB', strtotime('2/1/'.$year));
        $this->smarty->assign('MAR', strtotime('3/1/'.$year));
        $this->smarty->assign('APR', strtotime('4/1/'.$year));
        $this->smarty->assign('MAY', strtotime('5/1/'.$year));
        $this->smarty->assign('JUN', strtotime('6/1/'.$year));
        $this->smarty->assign('JUL', strtotime('7/1/'.$year));
        $this->smarty->assign('AUG', strtotime('8/1/'.$year));
        $this->smarty->assign('SEP', strtotime('9/1/'.$year));
        $this->smarty->assign('OCT', strtotime('10/1/'.$year));
        $this->smarty->assign('NOV', strtotime('11/1/'.$year));
        $this->smarty->assign('DEC', strtotime('12/1/'.$year));

        $thisMonday = strtotime( '+ 1 Day',$thisSunday);
        $thisTuesday = strtotime( '+ 2 Days',$thisSunday);
        $thisWednesday = strtotime( '+ 3 Days',$thisSunday);
        $thisThursday = strtotime( '+ 4 Days',$thisSunday);
        $thisFriday = strtotime( '+ 5 Days',$thisSunday);
        $thisSaturday = strtotime( '+ 6 Days',$thisSunday);

        $this->smarty->assign('startdate', $startdate);
        $this->smarty->assign('dateRequested', $dateRequested);
        $this->smarty->assign('thisMonday', $thisMonday);
        $this->smarty->assign('thisTuesday', $thisTuesday);
        $this->smarty->assign('thisWednesday', $thisWednesday);
        $this->smarty->assign('thisThursday', $thisThursday);
        $this->smarty->assign('thisFriday', $thisFriday);
        $this->smarty->assign('thisSaturday', $thisSaturday);

        $this->smarty->assign('thisSunday', $thisSunday);
        $this->smarty->assign('nextSunday', $nextSunday);
        $this->smarty->assign('prevSunday', $prevSunday);

        $PAGE_THEME ="page-calendar theme-default ";
        //$this->smarty->assign('PAGE_THEME',$PAGE_THEME);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','calendar/calList.tpl');
        $this->smarty->view();
    }


    public function showcalendarReminder($startdate = null, $filter = null)
    //gonna shift to get whole month passed
    // startdate has month and year
    {
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Calendar</li><li class="active">CRM Reminders</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //ok do we have a date submitted
        if($startdate && is_numeric($startdate))
        {

            $dateRequested = $startdate;

            if (date('w', $startdate) == 0) // today is sunday
            {
                $thisSunday = $startdate;
            }
            else
            {
                $thisSunday =  strtotime('last sunday',$startdate);
                // $date = date('m/d/Y', $thisSunday);
            }

            $nextSunday = strtotime( 'next sunday',$startdate);
            $prevSunday = strtotime('last sunday',$startdate);

        }
        else //default to current date if none supplied
        {
            $dateRequested = $this->thisSunday;
            $prevSunday  = $this->prevSunday;
            $thisSunday = $this->thisSunday;
            $nextSunday = $this->nextSunday;
        }

        //ok do we have a date submitted
        if($startdate && is_numeric($startdate))
        {

            $thismonth = date('F' , $startdate);

            $month = date('m' , $startdate);
            $year  = date('Y', $startdate);
            $mydate = $month.'/01/'.$year;
            $start = date('Y-m-d', strtotime($mydate));

            $nextmonth = $month + 1;
            $nextyear = $year;

            if($nextmonth == 13)
            {
                $nextmonth = 1;
                $nextyear = ($year + 1);

            }
            $mydate = $nextmonth.'/01/'.$nextyear;
            $end = date('Y-m-d', strtotime($mydate));

        }
        else //default to current date if none supplied
        {
            $thismonth = date('F' , strtotime($this->CurrentDate));
            $month = date('m' , strtotime($this->CurrentDate));
            $year  = date('Y', strtotime($this->CurrentDate));
            $mydate = $month.'/01/'.$year;
            $start = date('Y-m-d', strtotime($mydate));
            $nextmonth = $month + 1;
            $nextyear = $year;

            if($nextmonth == 13)
            {
                $nextmonth = 1;
                $nextyear = ($year + 1);

            }
            $mydate = $nextmonth.'/01/'.$nextyear;
            $end = date('Y-m-d', strtotime($mydate));

        }





        $this->smarty->assign('thismonth', $thismonth);
        $this->smarty->assign('year', $year);
        $this->smarty->assign('JAN', strtotime('1/1/'.$year));
        $this->smarty->assign('FEB', strtotime('2/1/'.$year));
        $this->smarty->assign('MAR', strtotime('3/1/'.$year));
        $this->smarty->assign('APR', strtotime('4/1/'.$year));
        $this->smarty->assign('MAY', strtotime('5/1/'.$year));
        $this->smarty->assign('JUN', strtotime('6/1/'.$year));
        $this->smarty->assign('JUL', strtotime('7/1/'.$year));
        $this->smarty->assign('AUG', strtotime('8/1/'.$year));
        $this->smarty->assign('SEP', strtotime('9/1/'.$year));
        $this->smarty->assign('OCT', strtotime('10/1/'.$year));
        $this->smarty->assign('NOV', strtotime('11/1/'.$year));
        $this->smarty->assign('DEC', strtotime('12/1/'.$year));

        $this->smarty->assign('LASTYEAR', strtotime('1/1/'.($year - 1)));
        $this->smarty->assign('NEXTYEAR', strtotime('1/1/'.($year + 1)));


        $thisMonday = strtotime( '+ 1 Day',$thisSunday);
        $thisTuesday = strtotime( '+ 2 Days',$thisSunday);
        $thisWednesday = strtotime( '+ 3 Days',$thisSunday);
        $thisThursday = strtotime( '+ 4 Days',$thisSunday);
        $thisFriday = strtotime( '+ 5 Days',$thisSunday);
        $thisSaturday = strtotime( '+ 6 Days',$thisSunday);

        $this->smarty->assign('startdate', $startdate);
        $this->smarty->assign('dateRequested', $dateRequested);
        $this->smarty->assign('thisMonday', $thisMonday);
        $this->smarty->assign('thisTuesday', $thisTuesday);
        $this->smarty->assign('thisWednesday', $thisWednesday);
        $this->smarty->assign('thisThursday', $thisThursday);
        $this->smarty->assign('thisFriday', $thisFriday);
        $this->smarty->assign('thisSaturday', $thisSaturday);

        $this->smarty->assign('thisSunday', $thisSunday);
        $this->smarty->assign('nextSunday', $nextSunday);
        $this->smarty->assign('prevSunday', $prevSunday);

        $PAGE_THEME ="page-calendar theme-default ";
        //$this->smarty->assign('PAGE_THEME',$PAGE_THEME);


        //      get data
        $data = $this->M_Calendar->_getReminders($start,$end);
        $this->smarty->assign('data', $data);


        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','calendar/calListReminder.tpl');
        $this->smarty->view();
    }


    public function showcalendarWOdata($startdate = null, $filter = null)

    {


        $this->load->helper(array('file','utils'));

        $this->smarty->assign('start',$this->CurrentDate);
        $this->smarty->assign('end',$this->CurrentDate);
        $start = null;
        $end = null;

        if(isset($_GET['start']))
        {
            $start = $_GET['start'];
            $end = $_GET['end'];
            $this->smarty->assign('start',$start);
            $this->smarty->assign('end',$end);

        }
        else
        {
  //          echo 'no data';
//            exit();
        }
        $input_arrays = $this->M_Calendar->_getWOCalendarData($start, $end);
//        $data = $this->smarty->fetch('test.json.tpl');
//        $input_arrays = json_decode($data, true);



        $output_arrays = array();

        foreach ($input_arrays as $array) {
        // Convert the input array into a useful Event object
            $event = new Event($array);
            $output_arrays[] = $event->toArray();
        }

        // Send JSON to the client.
        echo json_encode($output_arrays);


        //echo $data;
    }
   public function showcalendarWO($startdate = null, $filter = null)

    {

        $this->smarty->assignContentTemplate('calendar/cal_main2');
        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Calendar</li><li class="active">Work Orders</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        $this->smarty->assign('startdate',$this->CurrentDate);

        $d = new DateTime($this->CurrentDate);
        $miliSeconds = $d->format('U') * 1000;
        //echo $miliSeconds.'<br/>';

//    This will be the value you pass to template.

//    If you need to get it back into date format, just do this:

       $seconds = $miliSeconds / 1000;
       $dateVar = date('Y-m-d', $seconds);

       //echo $dateVar.'<br/>';
       //echo $this->CurrentDate;
       //exit();
        //ok do we have a date submitted
        if($startdate && is_numeric($startdate))
        {
            $dateVar = date('Y-m-d', $startdate);
            $this->smarty->assign('startdate',$dateVar);

        }

        $PAGE_THEME ="page-calendar theme-default ";
        //$this->smarty->assign('PAGE_THEME',$PAGE_THEME);
        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','calendar/calListWO.tpl');
        $this->smarty->view();
    }





    public function showcalendarCE($year = null, $month = null) //company events

    {


        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Calendar</li><li class="active">Company Events</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //ok do we have a date submitted
        if($year && is_numeric($year))
        {

            $thisMonth = $month;
            $thisYear = $year;

        }
        else //default to current date if none supplied
        {
            $thisYear = date('Y', strtotime($this->CurrentDate));
            $thisMonth = date('m', strtotime($this->CurrentDate));
            $year = $thisYear;
            $month = $thisMonth;
        }

        $this->smarty->assign('year', $thisYear);
        $this->smarty->assign('month', $thisMonth);
        $this->smarty->assign('JAN', $thisYear .'/1');
        $this->smarty->assign('FEB', $thisYear .'/2');
        $this->smarty->assign('MAR', $thisYear .'/3');
        $this->smarty->assign('APR', $thisYear .'/4');
        $this->smarty->assign('MAY', $thisYear .'/5');
        $this->smarty->assign('JUN', $thisYear .'/6');
        $this->smarty->assign('JUL', $thisYear .'/7');
        $this->smarty->assign('AUG', $thisYear .'/8');
        $this->smarty->assign('SEP', $thisYear .'/9');
        $this->smarty->assign('OCT', $thisYear .'/10');
        $this->smarty->assign('NOV', $thisYear .'/11');
        $this->smarty->assign('DEC', $thisYear .'/12');
        $dateObj   = DateTime::createFromFormat('!m', $thisMonth);
        $monthName = $dateObj->format('F'); // March
        $this->smarty->assign('monthName', $monthName);
        $PAGE_THEME ="page-calendar theme-default ";
        //$this->smarty->assign('PAGE_THEME',$PAGE_THEME);

        $data = $this->M_Calendar->_getCompanyEvents($month, $year);
        $this->smarty->assign('data', $data);
        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','calendar/calListCE.tpl');
        $this->smarty->view();
    }

    public function showcalendarMonth($year = null, $month = null)

    {


        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Calendar</li><li class="active">Company Events</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //ok do we have a date submitted
        if($year && is_numeric($year))
        {

            $thisMonth = $month;
            $thisYear = $year;

        }
        else //default to current date if none supplied
        {
            $thisYear = date('Y', strtotime($this->CurrentDate));
            $thisMonth = date('m', strtotime($this->CurrentDate));
        }

        $this->smarty->assign('year', $thisYear);
        $this->smarty->assign('month', $thisMonth);
        $this->smarty->assign('JAN', $thisYear .'/1');
        $this->smarty->assign('FEB', $thisYear .'/2');
        $this->smarty->assign('MAR', $thisYear .'/3');
        $this->smarty->assign('APR', $thisYear .'/4');
        $this->smarty->assign('MAY', $thisYear .'/5');
        $this->smarty->assign('JUN', $thisYear .'/6');
        $this->smarty->assign('JUL', $thisYear .'/7');
        $this->smarty->assign('AUG', $thisYear .'/8');
        $this->smarty->assign('SEP', $thisYear .'/9');
        $this->smarty->assign('OCT', $thisYear .'/10');
        $this->smarty->assign('NOV', $thisYear .'/11');
        $this->smarty->assign('DEC', $thisYear .'/12');
        $dateObj   = DateTime::createFromFormat('!m', $thisMonth);
        $monthName = $dateObj->format('F'); // March
        $this->smarty->assign('monthName', $monthName);
        $PAGE_THEME ="page-calendar theme-default ";
        //$this->smarty->assign('PAGE_THEME',$PAGE_THEME);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','calendar/calListMonthly.tpl');
        $this->smarty->view();
    }


    public function saveEvent($id = null)

    {
        $this->session->set_flashdata('msg','Sorry Your data was NOT saved');

        $formValues = $this->input->post(NULL, TRUE);
        if($formValues)
        {
            foreach($formValues as $key => $value)
            {

           // echo $key .'-'. $value.'<br/>';

            }

        }

        $results = $this->M_Calendar->_saveEvent($id);
        if($results)
        {
            $this->session->set_flashdata('msg','Your data was saved');

        }

        redirect($this->WEBCONFIG['webStartPage'].'calendar/editcalendarCE/', 'refresh');


    }



    //EDIT COMPANY EVENTS

    public function editcalendarCE($id = null)
    {

        //breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Calendar</li><li class="active">Company Events</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $edit = null;

        //we get all comp events and let user add or edit.
        if($id)
        {
            //get data if edit
            $edit = $this->M_Calendar->_getCompanyEventsList($id);

        }

       //get all events
        $data = $this->M_Calendar->_getCompanyEventsList();
        $this->smarty->assign('data', $data);
        $this->smarty->assign('edit', $edit);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','calendar/companyEvents.tpl');
        $this->smarty->view();

    }


    //END COMPANY EVENTS

}

