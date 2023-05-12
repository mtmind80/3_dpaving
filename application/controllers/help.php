<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Help extends EX_Controller {

	public function index($helpid = null)
	{


        $this->smarty->view('common/help2');

	}

    public function save($id = null)
    {

    }


}
