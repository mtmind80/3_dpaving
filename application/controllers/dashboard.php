<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends EX_Locked {


    function __construct()
    {
        parent::__construct();

        $allowed_roles = array(1,2,3,4,5,6);
        $this->smarty->assign('allowed_roles', $allowed_roles);


        //requires login
        $url = "example.com";
        $url = prep_url($url);

        $this->load->model('M_Dashboard');
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
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li class="active"><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Dashboard</a></li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);



        //load models

        $this->load->model('M_Dashboard');
    }


    public function index()

    {

        //get dashboard data

        $placeholder = 0;
        //new contacts

        //total created as of this month
        $this->smarty->assign('crm_new',  $this->M_Dashboard->_get_crm_new());

        //total crm
        $this->smarty->assign('crm_total', $this->M_Dashboard->_get_crm_total());


        // proposals
        $this->smarty->assign('proposal_active', $this->M_Dashboard->_get_proposal_bystatus());
        $this->smarty->assign('proposal_rejected', $this->M_Dashboard->_get_proposal_bystatus('rejected'));
        $this->smarty->assign('proposal_approved', $this->M_Dashboard->_get_proposal_bystatus('approved'));

        //work orders
        $this->smarty->assign('workorder_completed', $this->M_Dashboard->_get_workorder_completed());
        $this->smarty->assign('workorder_total', $this->M_Dashboard->_get_workorder_total());
        $this->smarty->assign('workorder_active', $this->M_Dashboard->_get_workorder_active());

        //ready to close
        $readytoclose = $this->M_Dashboard->_get_readytoclose();

        $this->smarty->assign('readytoclose', $readytoclose);

        //ready to bill
        $readytobill = $this->M_Dashboard->_get_readytobill();

        $this->smarty->assign('readytobill', $readytobill);



        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('dashboard');
        $this->smarty->view();


    }

}
