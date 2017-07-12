<?php
Class User_model extends CI_Model
{
    function login($username, $password)
    {
        $this->db->select('uid, username, password,is_admin,avatar');
        $this->db->from('tbl_users');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1)
            return $query->result();
        
        return False;
    }
    
    function addUser($data)
    {
        $this->db->insert('tbl_users', $data);
        return $this->db->insert_id();
    }

    function getUserDataById($userId)
    {
        $this->db->where('uid', $userId);
        $query = $this->db->get('tbl_users');
        return $query->result_array();
    }
    

    function timeline($username)
    {
        $query  = $this->db->query('select * from tbl_users,tbl_user_checkins where tbl_users.uid=tbl_user_checkins.uid and tbl_users.username=\''.$username.'\' ORDER BY tbl_user_checkins.checkin_time DESC');
        
        return $query->result();
    }


    function get_uid($username)
    {
        $this->db->select('uid');
        $this->db->from('tbl_users');
        $this->db->where('username', $username);        
        return $this->db->get()->row()->uid;        
    }

    function get_name($username)
    {
        $this->db->select('full_name');
        $this->db->from('tbl_users');
        $this->db->where('username', $username);        
        return $this->db->get()->row()->full_name;        
    }
    function get_avatar($username)
    {
        $this->db->select('avatar');
        $this->db->from('tbl_users');
        $this->db->where('username', $username);        
        return $this->db->get()->row()->avatar;        
    }    
    function searchUsers($data)
    {
        $this->db->like('first_name', $data);
        $this->db->or_like('last_name', $data);
        $this->db->or_like('full_name', $data);
        $this->db->or_like('username', $data);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

    function checkin($data)
    {
        $this->db->insert('tbl_user_checkins', $data);
        return $this->db->insert_id();

    }

    function addreview($data)
    {
        $this->db->insert('tbl_reviews', $data);
        return $this->db->insert_id();

    }
    
    function deletecheckin($checkin_id)
    {
        $this->db->where('checkin_id', $checkin_id);        
        $this->db->where('uid', $this->session->userdata('logged_in')['uid']);
        $this->db->delete('tbl_user_checkins'); 
        
        return $this->db->affected_rows();
    }
    function getAllUsers()
    {
        $query = $this->db->get('tbl_users');
        return $query->result();
    }
    
    function getuid($username)
    {
        return $this->db->select('uid')->get_where('tbl_users', array('username' => $username))->row()->uid;
    } 
    function getuserDetails($data)
    {
        $this->db->where('username', $data);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }
    
    function updateAvatar($p, $data)
    {
        $this->db->where('username', $p);
        $this->db->update('tbl_users', $data);
        return $this->db->affected_rows();
    }
    
    /****************************/
    /*  @ Add to Circle methods */
    /****************************/
    
    function circleAdd($username, $friend_id)
    {
        $userid = $this->getuid($username);

        $data   = array(
            'uid' => $userid,
            'friend_id' => $friend_id
        );
        
        $this->db->insert('tbl_connections', $data);
        return $this->db->insert_id();
    }

    function circleRemove($username, $friend_id)
    {
        $userid = $this->getuid($username);

        $this->db->where('uid', $userid);
        $this->db->where('friend_id', $friend_id);
        $this->db->delete('tbl_connections'); 
        
        return $this->db->affected_rows();
    }
    
    function connection_check($username, $uid2)
    {
        $userid = $this->getuid($username);

        $this->db->where('uid', $userid);
        $this->db->where('friend_id', $uid2);
        $query = $this->db->get('tbl_connections');
        
        if ($query->num_rows() >= 1)
            return false;
        
        return True;
    }

    function connection_checkbyuname($username, $uid2)
    {
        $userid = $this->getuid($username);
        $uid2 = $this->getuid($uid2);


        $this->db->where('uid', $userid);
        $this->db->where('friend_id', $uid2);
        $query = $this->db->get('tbl_connections');
        
        if ($query->num_rows() >= 1)
            return false;
        
        return True;
    }
    
    function mark_online($username)
    {
        $userid = $this->getuid($username);

        $data   = array(
            'online_status' => '1'
        );
        $this->db->where('uid', $userid);
        $this->db->update('tbl_users', $data);
    }
    
    function mark_offline($uid)
    {
        
        $data   = array(
            'online_status' => '0'
        );
        $this->db->where('uid', $uid);
        $this->db->update('tbl_users', $data);
    }
    
    function getAllConnections($username)
    {
        $userid = $this->getuid($username);
        $query  = $this->db->query('select * from tbl_users,tbl_connections where tbl_users.uid = tbl_connections.friend_id and tbl_connections.uid= ' . $userid);
        
        return $query->result();
    }
    function getOnlineUsers($username)
    {
        $userid = $this->getuid($username);
        $query  = $this->db->query('select * from tbl_users,tbl_connections where tbl_users.uid = tbl_connections.uid and online_status=1 and tbl_connections.friend_id= ' . $userid);
        
        return $query->result();
    }
    
    
    function suggestions($username)
    {
        $userid = $this->getuid($username);
        $query  = $this->db->query('select * from tbl_users where tbl_users.uid NOT IN (select friend_id from  tbl_connections where uid= ' . $userid . ') AND  tbl_users.uid !=' . $userid);
        
        return $query->result();
        
    }

    function basicinfoupdate($id,$data)
    {        
        $this->db->where('uid', $id);
        $this->db->update('tbl_users', $data); 
        return $this->db->affected_rows() == 0;
    }
    function contactinfoupdate($id,$data)
    {        
        $this->db->where('uid', $id);
        $this->db->update('tbl_users', $data); 
        return $this->db->affected_rows() == 0;
    }    
    function addnewevent($data)
    {        
        $this->db->insert('tbl_events', $data); 
        $this->db->distinct();
        return $this->db->insert_id();
    }        
}
