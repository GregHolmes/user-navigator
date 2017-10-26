<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        $this->load->view('is_admin');
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_footer');
        $this->load->model('Admin_model');
    }

    /**
     * @return mixed
     */
    private function _getsessionuser()
    {
        $p = $this->session->userdata('logged_in');
        $username = $p['username'];

        return $username;
    }


	public function index()
	{
		$this->load->view('admin/index');
	}

    public function viewusers()
    {
        $data['users'] = $this->Admin_model->getAllUsers();
        $this->load->view('admin/user/listusers',$data);
    }	

    public function viewreviews()
    {
        $data['reviews'] = $this->Admin_model->getAllReviews();
        $this->load->view('admin/viewreviews',$data);
    } 

    public function viewmarkers()
    {
        $data['markers'] = $this->Admin_model->getAllMarkers();
        $this->load->view('admin/viewmarkers',$data);
    }   

    public function viewpaths()
    {
        $data['lines'] = $this->Admin_model->getAllPolylines();
        $this->load->view('admin/viewpaths',$data);
    }

    public function deletepath($p = 0)
    {
        $data['lines'] = $this->Admin_model->deletepath($p);

        redirect('admin/viewpaths');
    }

    public function deletemarker($p = 0)
    {
        $data['lines'] = $this->Admin_model->deletemarker($p);

        redirect('admin/viewmarkers');
    }

    public function deletereview($p = 0)
    {
        $data['lines'] = $this->Admin_model->deletereview($p);

        redirect('admin/viewreviews');
    }   
}
