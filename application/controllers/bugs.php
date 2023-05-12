<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bugs extends EX_Locked {
    // this controller requires login


    function __construct()
    {
        parent::__construct();


        $allowed_roles = array(1,2,3,4,5, 6);
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
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li>
        <li class="active">Bugs</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //load models
        $this->load->model('M_Bugs');
        //resources template
        $this->smarty->assignContentTemplate('bugs/bugs_main');


    }




    public function index()

    {

        $data = $this->M_Bugs->_getBugs();
        $this->smarty->assign('data',$data);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT','bugs/bugList.tpl');
        $this->smarty->view();


    }


    public function create()

    {



        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT','bugs/bugAdd.tpl');
        $this->smarty->view();


    }

    public function edit($id)

    {

        $data = $this->M_Bugs->_getBugs($id);
        $this->smarty->assign('data',$data);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT','bugs/bugEdit.tpl');
        $this->smarty->view();


    }

    public function test($id)

    {

        $data = $this->M_Bugs->_getBugs($id);
        $this->smarty->assign('data',$data);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assign('CONTENT','bugs/bugTest.tpl');
        $this->smarty->view();


    }

    public function save($id = null)

    {

        if($result = $this->M_Bugs->_save($id))
        {
            $this->session->set_flashdata('msg','Your data was saved');
            redirect($this->WEBCONFIG['webStartPage'].'bugs/', 'refresh');
        }
        $this->session->set_flashdata('msg','Your data was NOT saved');
        redirect($this->WEBCONFIG['webStartPage'].'bugs/create/', 'refresh');

    }

    public function showList($removefilter = null)

    {


        if($removefilter == 1)
        {
            $this->session->unset_userdata('bugfilter');
        }

            $this->smarty->assignPageTitle('3D Paving Application');
            $this->smarty->assign('CONTENT','bug/bugList.tpl');
            $this->smarty->view();


    }


}
