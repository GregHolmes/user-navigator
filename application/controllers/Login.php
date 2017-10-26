<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', '', true);
    }
    
    
    public function index()
    {
        $this->load->view('loginview');
    }
    
    function verify()
    {
        if ($_POST) {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
            
            if ($this->form_validation->run() == false) {
                echo 'Login failed. Invalid credentials.';
            } else {
                echo '<script>window.location.href ="' . base_url() . '";</script>';
            }
        }
    }

    function chat()
    {
        if ($_POST) {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
            
            $username = $this->input->post('username');

            if ($this->form_validation->run() == false) {
                $userid = 0;
                $this->output->set_content_type('application/json')->set_output(json_encode($userid));
            } else {
                $userid = $this->User_model->get_name($username);
                $this->output->set_content_type('application/json')->set_output(json_encode($userid));
            }
        }
    }

    function get_avatar($username)
    {
        $avatar = $this->User_model->get_avatar($username);
        $avatarurl = 'uploads/dp/thumbs/' . $avatar;

        echo $avatarurl;        
    }

    function check_database($password)
    {
        $username = $this->input->post('username');
        
        $result = $this->User_model->login($username, $password);

        if ($result) {
            $sess_array = array();

            foreach ($result as $row) {
                $sess_array[] = [
                    'uid' => $row->uid,
                    'username' => $row->username,
                    'admin' => $row->is_admin,
                    'avatar' =>$row->avatar
                ];

                $this->session->set_userdata('logged_in', $sess_array);   
                $setonline = $this->User_model->mark_online($username);
            }

            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');

            return false;
        }
    }
}
