<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->view('session_check');
        $this->load->model('User_model', '', True);
        $username = $this->_getsessionuser();
        $data['info'] = $this->User_model->getuserDetails($username);  
        $data['online_users'] = $this->User_model->getOnlineUsers($username);
        $this->load->view('raw/basic_header',$data);
        $this->load->view('raw/basic_footer');
    }
    
     private function _getsessionuser()
    {
        $p = $this->session->userdata('logged_in');
        $username = $p['username'];
        return $username;
    }
}
