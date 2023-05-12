<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends EX_Controller {



    function __construct()
    {
        parent::__construct();

        $clef = $this->config->config['clefArray'];
        $this->APP_ID = $clef['CLEF_APP_ID'];
        $this->CLEF_JS = $clef['CLEF_JS'];
        $this->CLEF_BASE_URL = $clef['CLEF_BASE_URL'];
        $this->APP_SECRET = $clef['CLEF_APP_SECRET'];

        $this->smarty->assign('APP_ID', $clef['CLEF_APP_ID']);
        $this->smarty->assign('CLEF_JS', $clef['CLEF_JS']);
        $this->smarty->assign('CLEF_BASE_URL', $clef['CLEF_BASE_URL']);
        $this->smarty->assign('APP_SECRET', $clef['CLEF_APP_SECRET']);

    }



    public function index()
    {

        $this->CORE_TEMPLATE = 'core/corelogin';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('login');
        $this->smarty->view();
    }

    public function clef()
    {

        $this->CORE_TEMPLATE = 'core/corelogin';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('loginclef');
        $this->smarty->view();
    }



    public function login()
    {
        $userInfo = array();
        $userInfo['USER_ACCESS'] = 0;
        //@todo make sure we can check for duplicate password and email and not let that happen.
        //    now that we have allowed duplicate emails,
        $this->session->set_userdata('USER_LOGIN_ATTEMPTS', 1);
        $login_attempts = $this->session->userdata('USER_LOGIN_ATTEMPTS');
        if(!$login_attempts)
        {
            $this->session->set_userdata('USER_LOGIN_ATTEMPTS', 1);
        }
        else
        {
            $login_attempts = $login_attempts + 1;
            $this->session->set_userdata('USER_LOGIN_ATTEMPTS', $login_attempts);

        }

        if($login_attempts >= $this->config->config['max_login_attempts'])
        {
            $this->session->set_flashdata('msg', 'You have had too many failed attempts to login.');
            redirect($this->WEBCONFIG['webStartPage'].'apperror/2', 'refresh');

        }


        //do login here if good then set session
        $Email = $this->validate->post('email', 'EMAIL');
        $Password = $this->validate->post('usrpass', 'PASSWORD');
        if(isset($_POST['usrpass']) && isset($_POST['email']) && $Email && $Password)
        {

            $result = $this->M_System->_doLogin();
            
            


            if (empty($result['error']) && !empty($result['cntId']))
            {

                $userInfo['USER_LOGIN_ATTEMPTS'] = $login_attempts;
                $userInfo['USER_ACCESS'] = $result['cntSecAccess'];
                $userInfo['USER_ID'] = $result['cntId'];
                $userInfo['USER_FIRSTNAME'] = $result['cntFirstName'];
                $userInfo['USER_LASTNAME'] = $result['cntLastName'];
                $userInfo['USER_FULLNAME'] = $result['cntFirstName'] . ' ' . $result['cntLastName'];
                $userInfo['USER_EMAIL'] =$result['cntPrimaryEmail'];
                $userInfo['USER_ROLE'] = $result['cntRole'];
                $userInfo['IS_EMPLOYEE'] = $result['cntIsEmployee'];
                $userInfo['USER_GENDER'] = $result['cntGender'];

                $this->session->set_userdata('userInfo', $userInfo);
                // set to prevent session hijacking:
                $this->session->set_userdata('LoggedInUserAgent', $_SERVER['HTTP_USER_AGENT']);
                $this->session->set_userdata('LoggedInUserIP', $_SERVER['REMOTE_ADDR']);

                $this->getSessionInfo();

                $transNote = 'Good login-'. $Email;
                $transType = 'LOGIN';
                $this->doLogTransaction($transType,$transNote,$this->SESSION_ID);



            }
            else
            {

                $this->session->set_flashdata('msg', $result['error']);

                $transNote = 'Bad login-'.$Password .' '. $Email;
                $transType = 'BAD LOGIN ATTEMPT';
                $this->doLogTransaction($transType,$transNote . $result['error'],$this->SESSION_ID);
               // echo 'No record found';
                if (!empty($result['error']))
                {
                    $this->session->set_flashdata('msg', $result['error']);
                    redirect($this->WEBCONFIG['webStartPage'], 'refresh');
                    //echo $result['error'];
                }

            }
        }

        if(!$userInfo['USER_ACCESS'])
        {
            $this->session->set_flashdata('msg', 'Your username or password was not found.');
           redirect($this->WEBCONFIG['webStartPage'], 'refresh');
        }


        redirect($this->WEBCONFIG['webStartPage']. 'dashboard', 'refresh');
    }


    public function logout()

    {

        $session_id = $this->session->userdata('session_id');
        $transNote = 'Log out-'.$session_id;
        $transType = 'LOGOUT';
        $this->doLogTransaction($transType,$transNote,$this->SESSION_ID);

        $this->session->unset_userdata('userInfo');
        $this->session->sess_destroy();
        redirect($this->WEBCONFIG['webStartPage'], 'refresh');

    }

    public function comingsoon()

    {
        //default a breadcrumb and page title
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li>Coming Soon</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);
        $this->smarty->assignPageTitle('Feature Coming Soon');
        $this->smarty->assignContentTemplate('comingsoon');
        $this->smarty->view();


    }

    public function test()
    {

        $this->CORE_TEMPLATE = 'core/corelogin';
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('test');
        $this->smarty->view();
    }


    public function loginclef()
    {


        $userInfo = array();
        $userInfo['USER_ACCESS'] = 0;

        $login_attempts = $this->session->userdata('USER_LOGIN_ATTEMPTS');
        if(!$login_attempts)
        {
            $this->session->set_userdata('USER_LOGIN_ATTEMPTS', 1);
        }
        else
        {
            $login_attempts = $login_attempts + 1;
            $this->session->set_userdata('USER_LOGIN_ATTEMPTS', $login_attempts);

        }
        if($login_attempts >= 4)
        {
            $this->session->set_flashdata('msg', 'You have had too many failed attempts to login.');
            redirect($this->WEBCONFIG['webStartPage'].'apperror/2', 'refresh');

        }

        $code = '';
        if(isset($_GET["code"]))
        {
            $code = $_GET["code"];
        }

        $postdata = http_build_query(
            array(
                'code' => $code,
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET
            )
        );


        $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
        );


        $url = 'https://clef.io/api/v1/authorize';


        $context  = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $response = json_decode($response, true);

        if ($response && $response['success']) {
            $access_token = $response['access_token'];

            $opts = array('http' =>
            array(
                'method'  => 'GET'
            )
            );

            $url = 'https://clef.io/api/v1/info?access_token='.$access_token;

            $context  = stream_context_create($opts);
            $response = file_get_contents($url, false, $context);
            $response = json_decode($response, true);

            if ($response && $response['success']) {
                $user_info = $response['info'];

                //do login here if good then set session
                $Email = $user_info['email'];
                $id = $user_info['id'];

                $result = $this->M_System->_doLoginclef($Email, $id);
                //print_r($result);


                if (empty($result['error']) && !empty($result['cntId']))
                {

                    $userInfo['USER_LOGIN_ATTEMPTS'] = $login_attempts;
                    $userInfo['USER_ACCESS'] = $result['cntSecAccess'];
                    $userInfo['USER_ID'] = $result['cntId'];
                    $userInfo['USER_FIRSTNAME'] = $result['cntFirstName'];
                    $userInfo['USER_LASTNAME'] = $result['cntLastName'];
                    $userInfo['USER_FULLNAME'] = $result['cntFirstName'] . ' ' . $result['cntLastName'];
                    $userInfo['USER_EMAIL'] =$result['cntPrimaryEmail'];
                    $userInfo['USER_ROLE'] = $result['cntRole'];
                    $userInfo['IS_EMPLOYEE'] = $result['cntIsEmployee'];
                    $userInfo['USER_GENDER'] = $result['cntGender'];

                    $this->session->set_userdata('userInfo', $userInfo);
                    // set to prevent session hijacking:
                    $this->session->set_userdata('LoggedInUserAgent', $_SERVER['HTTP_USER_AGENT']);
                    $this->session->set_userdata('LoggedInUserIP', $_SERVER['REMOTE_ADDR']);

                    $this->getSessionInfo();

                    $transNote = 'Good login-'. $Email;
                    $transType = 'LOGIN';
                    $this->doLogTransaction($transType,$transNote,$this->SESSION_ID);



                }
                else
                {

                    $transNote = 'Bad CLEF login-'. $Email;
                    $transType = 'BAD CLEF LOGIN ATTEMPT';
                    $this->doLogTransaction($transType,$transNote,$this->SESSION_ID);
                    // echo 'No record found';
                    if (!empty($result['error']))
                    {
                        echo $result['error'];
                        exit();
                    }

                }


           }
            else
            {
                echo $response['error'];
                exit();
            }


        }
        else
        {
            echo $response['error'];
            exit();
        }

        redirect($this->WEBCONFIG['webStartPage']. 'dashboard', 'refresh');

    }



    public function logoutclef()

    {


        if(isset($_POST['logout_token'])) {

            $result = $this->M_System->_saveToken($_POST['logout_token']);
            $postdata = http_build_query(
                array(
                    'logout_token' => $_REQUEST['logout_token'],
                    'app_id' => $this->APP_ID,
                    'app_secret' => $this->APP_SECRET
                )
            );

            $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
            );
            $token = $_POST['logout_token'];
            $context  = stream_context_create($opts);
            $response = file_get_contents($this->CLEF_BASE_URL."logout", false, $context);

            $response = json_decode($response, true);

            if (isset($response['success']) && isset($response['clef_id'])) {
                //        $this->doLogTransaction($transType,$transNote,$this->SESSION_ID);
                $result = $this->M_System->_setClefLogout($response['clef_id']);

                //log them out
            }
        }

    }


}
