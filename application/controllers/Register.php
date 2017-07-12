<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->load->model('User_model', '', True);
        $this->load->helper('security');
    }
    
    public function index()
    {
        if ($_POST)
        {
            
            $this->form_validation->set_rules('first_name', 'First name', 'required');
            $this->form_validation->set_rules('last_name', 'Last name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'alpha_numeric|required|is_unique[tbl_users.username]|min_length[5]|max_length[12]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_users.user_email]');
            
            $this->form_validation->set_message('is_natural', 'Please accept TOS');
            $this->form_validation->set_rules('eula', 'TOS', 'is_natural');
            
            if ($this->form_validation->run() == False)
            {
                echo json_encode(array(
                    'status' => 'error',
                    'message' => validation_errors()
                ));
                
            }
            else
            {
                $first_name = $this->input->post('first_name');
                $last_name  = $this->input->post('last_name');
                $full_name  = "$first_name $last_name";
                $username   = $this->input->post('username');
                $email      = $this->input->post('email');
                $password   = $this->input->post('password');
                
                
                $data_array = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'full_name' => $full_name,
                    'username' => $username,
                    'user_email' => $email,
                    'password' => md5($password)
                );
                
                
                $id = $this->User_model->addUser($data_array);
                
                $data['id'] = $id;
                
                if ($id)
                {
                    $sess_array = array();
                    
                    $sess_array = array(
                        'id' => $id,
                        'username' => $username
                    );
                    
                    $this->session->set_userdata('logged_in', $sess_array);
                    echo json_encode(array(
                        'status' => 'ok',
                        'details' => $sess_array
                    ));
                }
            }
            
        }
    }
    
    public function is_email_registered()
    {
        if ($this->input->is_ajax_request())
        {
            $email = $this->input->post('email');
            if (!$this->form_validation->is_unique($email, 'tbl_users.user_email'))
            {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'status' => 'error',
                    'message' => 'The email is already taken, choose another one'
                )));
            }
            else
            {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'status' => 'ok'
                )));
            }
        }
        
    }
    
    public function checkcr()
    {
        if ($this->input->is_ajax_request())
        {
            $email    = $this->input->post('thisemail');
            $username = $this->input->post('thisusername');
            
            if ($email)
            {
                $this->form_validation->set_rules('email', 'Email', 'valid_email|required|is_unique[tbl_users.user_email]');
                if ($this->form_validation->run() == False)
                {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        'status' => 'error',
                        'message' => form_error('email')
                    )));
                }
                else
                {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        'status' => 'ok',
                        'message' => 'This email is available'
                    )));
                }
            }
            
            if ($username)
            {
                $this->form_validation->set_rules('username', 'Username', 'alpha_numeric|required|is_unique[tbl_users.username]|min_length[5]|max_length[12]|xss_clean');
                if ($this->form_validation->run() == False)
                {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        'status' => 'error',
                        'message' => form_error('username')
                    )));
                }
                else
                {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        'status' => 'ok',
                        'message' => 'This username is available',
                        'class' => 'has-success'
                    )));
                }
            }
        }
    }
}
