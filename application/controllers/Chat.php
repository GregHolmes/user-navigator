<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {

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

    private function _getsessionuserid()
    {
        $p      = $this->session->userdata('logged_in');
        $userid = $p['uid'];
        return $userid;
    }


	public function index()
	{
                $this->load->model('user_model');
                $this->load->model('message_model');
                $limit = 10;
                $start = 0;
                $messageData = $this->message_model->getChatMessages($limit, $start);
                $newMessageDataArray = array();
                foreach($messageData as $message){
                    $userData = $this->user_model->getUserDataById($message['uid']);
                    $newMessage = array(
                        'uid' => $message['uid'],
                        'message' => $message['message'],
                        'datetime' => $message['datetime'],
                        'avatar' => $userData[0]['avatar'],
                        'username' => $userData[0]['username']
                    );
                    
                    $newMessage['messageHtml'] = $this->message_model->generateMessageHtml($newMessage);
                    
                    array_push($newMessageDataArray, $newMessage);
                }

                $returnData['messageData'] = array_reverse($newMessageDataArray);
                
		$this->load->view('chat_view', $returnData);
       
	}

    public function user($p=0)
    {
        $this->load->model('user_model');
        $this->load->model('message_model');
        $limit = 10;
        $start = 0;
        $messageData = $this->message_model->getChatMessagesbyuser($limit, $start,$p);

        $uid = $this->_getsessionuserid();
        $newMessageDataArray = array();
        foreach($messageData as $message)
        {
            $userData = $this->user_model->getUserDataById($message['sender']);                         
            $newMessage = array(
                'uid' => $message['receiver'],
                'message' => $message['message'],
                'datetime' => $message['datetime'],
                'avatar' => $userData[0]['avatar'],
                'username' => $userData[0]['username']
            );
            
            $newMessage['messageHtml'] = $this->message_model->generateMessageHtml($newMessage);
            
            array_push($newMessageDataArray, $newMessage);
        }

        $returnData['messageData'] = array_reverse($newMessageDataArray);
        $returnData['receiver'] = $p;
        $returnData['receiveruid'] = $this->message_model->get_username($p);    
        $this->load->view('im_view', $returnData);
       
    }
}
