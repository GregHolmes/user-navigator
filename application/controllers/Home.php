<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        $this->load->view('session_check');
        $this->load->model('User_model', '', true);

        $username = $this->_getsessionuser();

        $data['info'] = $this->User_model->getuserDetails($username); 
        $data['online_users'] = $this->User_model->getOnlineUsers($username);

        $this->load->view('raw/basic_header', $data);
        $this->load->view('raw/basic_footer');
    }

    private function _getsessionuser()
    {
        $p = $this->session->userdata('logged_in');
        $username = $p['username'];

        return $username;
    }


	public function index()
	{
		$this->load->view('raw/index');		
	}

	public function alerts()
	{
		$this->load->view('raw/alerts');		
	}
	
	public function animations()
	{
		$this->load->view('raw/animations');		
	}
	
	public function boxshadow()
	{
		$this->load->view('raw/box_shadow');		
	}
	
	public function breadcrumb()
	{
		$this->load->view('raw/breadcrumb');		
	}

	public function buttons()
	{
		$this->load->view('raw/buttons');		
	}
	
	public function calendar()
	{
		$this->load->view('raw/calendar');		
	}

	public function colors()
	{
		$this->load->view('raw/colors');		
	}

	public function components()
	{
		$this->load->view('raw/components');		
	}

	public function contacts()
	{
		$this->load->view('raw/contacts');		
	}

	public function datatables()
	{
		$this->load->view('raw/datatables');		
	}

	public function flotcharts()
	{
		$this->load->view('raw/flotcharts');		
	}

	public function formcomponents()
	{
		$this->load->view('raw/formcomponents');		
	}

	public function formelements()
	{
		$this->load->view('raw/formelements');		
	}

	public function formexamples()
	{
		$this->load->view('raw/formexamples');		
	}

	public function formvalidations()
	{
		$this->load->view('raw/formvalidations');		
	}
}
