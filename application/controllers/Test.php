<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->view('raw/basic_header');
        $this->load->view('raw/basic_footer');
    }


    public function index() 
    {
        	print_r($this->session->userdata('logged_in'));
            echo $this->session->userdata('logged_in')['avatar'];
    }


}