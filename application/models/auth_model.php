<?php

class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function generateSalt()
    {
        return md5(uniqid(rand(), true));
    }
    
    function hashPassword($password)
    {
        return md5($password);
    }
    
    function authenticate($user)
    {
        $email = strtolower($user['username']);
        
        //load codeigniter helper 'security'
        $this->load->helper('security');
        
        //convert password to md5 hash and assign to variable $password
        $password = $this->hashPassword($user['password']);
        
        //build query to check if user exists
        $this->db->where('user_email', $email);
        $this->db->or_where('username', $email);
        $this->db->where('password', $password);
        $query    = $this->db->get('tbl_users');
        $userData = $query->result_array();

        if (empty($userData)) {
            return false;
        }

        error_log("Auth user data: " . print_r($userData, true));
        
        $this->db->where('uid', $userData[0]['uid']);

        $userId       = $userData[0]['uid'];
        $username     = $userData[0]['username'];
        $emailaddress = $userData[0]['user_email'];
        #$salt         = $userData[0]['salt'];
        $userHash     = $userData[0]['password'];
        $isAdmin      = $userData[0]['is_admin'];
        #$debug        = $userData[0]['debug'];
        #$updated      = $userData[0]['updated'];
        $avatar       =  $userData[0]['avatar'];
        $id           = null;
        $name         = null;
        $link         = null;
        $gender       = null;
        $timezone     = null;
        $locale       = null;
        $verified     = null;
        $updated_time = null;
        
        //put the user data into an array for our session
        $session_data = array(
            'logged_in' => true,
            'user_id' => $userId,
            'is_admin' => $isAdmin,
            'username' => $username,
            'email_address' => $emailaddress,
            'id' => $id,
            'name' => $name,
            'link' => $link,
            'gender' => $gender,
            'timezone' => $timezone,
            'locale' => $locale,
            'verified' => $verified,
            'updated_time' => $updated_time,
            'avatar' => $avatar
        );

        //set session data with the array of the users profile data
        $this->session->set_userdata($session_data);

        return true;
    }
}
?>