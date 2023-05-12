<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Apperror extends EX_Controller {

	public function catchErrors($e = null)
	{
        $this->CORE_TEMPLATE = 'core/corelogin';

        switch ($e) {
            case 1:
                $msg ='No Permissions to this resource. ';
        break;
            case 2:
                $msg ='Too Many logins error 2 ';
        break;
            case 3:
                 $msg ='Error 3 ';
        break;
            case 4:
                $msg ='404 Error ';
                break;

            default:
                $msg =' Error default unknown ';
        }

        // @todo do something here to record error email to admin



        $this->load->helper('url');
        $url = uri_string();
        //load models
        $this->load->model('M_System');
        $transType ="ERROR";
        $emailvar = "Not Sent";

        if($this->config->config['sendError'])
        {
            $emailit =  mail($this->config->config['emailErrorTo'] , 'Error In Application', $msg . $url);
            if ($emailit){$emailvar = "Email Sent";}
        }

        $transNote = $msg . " URL:".$url.' - ' .$emailvar;
        $this->doLogTransaction($transType,$transNote,$this->SESSION_ID);

        $this->smarty->assign('errmsg', $msg);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('error');
        $this->smarty->view();
	}


    private function _processError()
    {
        if ($this->config->config['send404Error']) {
            $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            mail($this->config->config['email_error_to'], '404 Page Not Found', 'Error 404 - Page not found at: ' . $this->REAL_URL, $headers);
        }
        log_message('error', '404 Page Not Found' . $this->REAL_URL);
    }


    public function sorry($note)
    {

        $msg = $note;
        $this->load->helper('url');
        $url = uri_string();
        //load models
        $this->load->model('M_System');
        $transType ="NOTALLOWED";
        $transNote = $msg . " URL:".$url;
        $this->doLogTransaction($transType,$transNote,$this->SESSION_ID);

        $this->smarty->assign('errmsg', $msg);
        $this->smarty->assignPageTitle('3D Paving Application');
        $this->smarty->assignContentTemplate('error');
        $this->smarty->view();


    }


}
