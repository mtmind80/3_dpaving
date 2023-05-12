<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends EX_Locked {
    // this controller requires login


    function __construct()
    {
        parent::__construct();


        $allowed_roles = array(1,2,3,4,5,6); //only admin and office
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
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li class="active">Messages</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);


        //resources template
        $this->smarty->assignContentTemplate('messages/message_main');

        //load models

        $this->load->model('M_Messages');

    }


    public function index($filter = null)

    {
        redirect($this->WEBCONFIG['webStartPage'].'messages/myMessages/', 'refresh');

    }

    public function myMessages($filter = null)

    {
        $id = $this->USER_ID;
        $data = $this->M_Messages->_getMessages($id, null,100);
        $this->smarty->assign('data', $data);
        $read = $this->M_Messages->_read($id);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('filter', $filter);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT','messages/messageList.tpl');
        $this->smarty->view();

    }


    public function addMessage()

    {
        $this->M_Messages->_sendMessage();
        redirect($this->WEBCONFIG['webStartPage'].'messages/myMessages/', 'refresh');

    }


    public function hideMessage($messageid)
    {

        $this->M_Messages->_hide($messageid);
        redirect($this->WEBCONFIG['webStartPage'].'messages/myMessages/', 'refresh');


    }
}
