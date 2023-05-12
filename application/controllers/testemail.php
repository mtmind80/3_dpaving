<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class testEmail extends EX_Controller {

	public function index()
	{
        $this->load->library('email');
        $config = array();
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
		
		$this->email->from('testing@gmail.com');
        $this->email->to('herb@allpaving.com');
        $this->email->subject('Testing from cronjob');
        $this->email->message('This is the body of the testing message sent from a cronjob');
		
        $result = $this->email->send();
	}

}