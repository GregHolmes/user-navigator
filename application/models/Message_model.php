<?php
class Message_model extends CI_Model {
function __construct()
    {
        parent::__construct();
    }
    
    function insertMessage($messageData)
    {
        $this->db->insert('messages', $messageData); 
        return $this->db->insert_id();
    }

    function insertimMessage($messageData)
    {
        $this->db->insert('tbl_im', $messageData); 
        return $this->db->insert_id();
    }
    
    function getChatMessages($limit, $start)
    {
         $this->db->limit($limit, $start);
         $this->db->order_by('message_id', "desc"); 
         $query = $this->db->get('messages');
         return $query->result_array();
    }

    function getChatMessagesbyuser($limit, $start,$receiver)
    {
         $this->db->limit($limit, $start);
         $this->db->order_by('im_id', "desc"); 
         $uid = $this->session->userdata('logged_in')['uid'];
         $where = 'sender='.$uid.' and receiver='.$receiver.' or sender='.$receiver.' and receiver='.$uid.'';
         $this->db->where($where);
         $query = $this->db->get('tbl_im');
         return $query->result_array();
    }
    
    function generateMessageHtml($messageData)
    {
        $datetime = new DateTime($messageData['datetime']);
        $isoDateTime = $datetime->format(DateTime::ISO8601);
        $messageHtml = '<li class="left clearfix">'
                            .'<span class="chat-img pull-left">'
                                .'<img src="'.base_url().'uploads/dp/thumbs/200x200/'. $messageData['avatar'] . '" alt="User Avatar" class="img-circle" />'
                            .'</span>'
                            .'<div class="chat-body clearfix">'
                                .'<div class="header">'
                                    .'<strong class="primary-font">' . $messageData['username'] . '</strong>'
                                    .'<small class="pull-right  text-muted"><span class="glyphicon glyphicon-time"></span><time class="fancyTime" datetime="' . $isoDateTime . '"></time></small>'
                                .'</div>'
                                .'<p>'
                                    .htmlentities($messageData['message'])
                                .'</p>'
                            .'</div>'
                        .'</li>';
        
        return $messageHtml;
    }
    function generateimMessageHtml($messageData)
    {
        $datetime = new DateTime($messageData['datetime']);
        $isoDateTime = $datetime->format(DateTime::ISO8601);
        $messageHtml = '<li class="left clearfix">'
                            .'<span class="chat-img pull-left">'
                                .'<img src="'.base_url().'uploads/dp/thumbs/200x200/'. $messageData['avatar'] . '" alt="User Avatar" class="img-circle" />'
                            .'</span>'
                            .'<div class="chat-body clearfix">'
                                .'<div class="header">'
                                    .'<strong class="primary-font">' . $messageData['username'] . '</strong>'
                                    .'<small class="pull-right  text-muted"><span class="glyphicon glyphicon-time"></span><time class="fancyTime" datetime="' . $isoDateTime . '"></time></small>'
                                .'</div>'
                                .'<p>'
                                    .htmlentities($messageData['message'])
                                .'</p>'
                            .'</div>'
                        .'</li>';
        
        return $messageHtml;
    }

    function get_username($uid)
    {
        return $this->db->select('username')->get_where('tbl_users', array('uid' => $uid))->row()->username;
    }     
}