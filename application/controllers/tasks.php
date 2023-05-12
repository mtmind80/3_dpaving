<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends EX_Controller {


    function __construct()
    {
        parent::__construct();

          //define allowed roles
        $allowed_roles = array(1,2,3,4,5,6);
        //set to smarty
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

        // set a breadcrumb
        $breadcrumb = '<li><a href="'. $this->WEBCONFIG['webStartPage'] .'dashboard">Home</a></li><li class="active">Tasks</li>';
        $this->smarty->assign('BREADCRUMB', $breadcrumb);

        //load models

        $this->load->model('M_Tasks');

        //resources template
        $this->smarty->assignContentTemplate('tasks/tasks_main');


    }




    public function index($filter = null)

    {
        $this->smarty->assignPageTitle('3D Paving Application');

        $this->smarty->view();
    }

    public function create($id)

    {
        $PAGE_THEME="theme-default page-signup-alt";

        $this->CORE_TEMPLATE = 'core/corebasic';
        $this->smarty->assign('PAGE_THEME', $PAGE_THEME);
        $this->smarty->assign('id', $id);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('tasks/tasks_add.tpl');
        $this->smarty->view();


    }


    public function save()//save task for submitted user
    {

        $id = $this->input->post('cntid');

        $this->M_Tasks->_save($id);
        redirect($this->WEBCONFIG['webStartPage'].'tasks/addTask/'.$id, 'refresh');
        //$this->addTask($id);

    }

    public function saveC($task_id) //can only complete your own
    {
        $id = $this->USER_ID;

        $taskAssignedTo = $this->input->post('taskAssignedTo');
        if($taskAssignedTo == $id)
        {
           $this->M_Tasks->_save($id,$task_id);

        }
        redirect($this->WEBCONFIG['webStartPage'].'tasks/addTask/'.$id, 'refresh');
        //$this->addTask($id);
    }

     public function completeTask($taskID)
    {

        $data = $this->M_Tasks->_getTasks($this->USER_ID, $taskID);
        $user = $this->M_Tasks->_getTaskUser($this->USER_ID);// who is this task for

        $this->smarty->assign('user', $user);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('id', $this->USER_ID);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','tasks/taskComplete.tpl');

        $this->smarty->view();


    }


    public function addTask($id = null)


    {

echo $this->input->post('cntid');


        if(!$id) //if i did not ask for an id then use mine
        {
            $id = $this->USER_ID;
        }

        $data = $this->M_Tasks->_getTasks($id, null);
        $user = $this->M_Tasks->_getTaskUser($id);// who is this task for

        $this->smarty->assign('user', $user);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('id', $id);

        $this->smarty->assignPageTitle('3D Paving Application');
        //insert into resource template
        $this->smarty->assign('CONTENT','tasks/taskList.tpl');

        $this->smarty->view();

    }
}
