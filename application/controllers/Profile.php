<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->view('session_check');
        $this->load->model('User_model', '', true);
        $this->load->helper('security');

        $username = $this->_getsessionuser();

        $data['username'] = $username;
        $data['info'] = $this->User_model->getuserDetails($username);
        $data['online_users'] = $this->User_model->getOnlineUsers($username);

        $this->load->view('raw/basic_header', $data);
        $this->load->view('raw/basic_footer');
        
    }
    private function _getsessionuser()
    {
        $p = $this->session->userdata('logged_in');

        return $p['username'];
    }

    public function index()
    {
        redirect('user');
    }
    
    
    public function view($p='0',$p1=0)
    {
        if (empty($p) OR $p === $this->session->userdata('logged_in')['username']) {
            redirect('user');
        } else {
            $user = $p;
        }
        
        $data['info'] = $this->User_model->getuserDetails($user);
        $data['connected'] = $this->User_model->getAllConnections($user);

        if (empty($p1)) {
            $this->load->view('profileview/profile_basic', $data);
            $this->load->view('profileview/profile_main_content', $data);
        } else if ($p1 === 'timeline') {
            $value1 = $this->User_model->connection_checkbyuname($this->session->userdata('logged_in')['username'], $user);
            $value2 = $this->User_model->connection_checkbyuname($user, $this->session->userdata('logged_in')['username']);

            echo "<pre> $value1 and $value2 </pre>";

            if (empty($value1) and empty($value2)) {
                $feed_array['feeds'] = $this->User_model->timeline($user);
            } else {
                $feed_array['feeds']='';
            }

            $this->load->view('profileview/profile_basic', $data);
            $this->load->view('profileview/timeline',$feed_array);
        }
    }

    public function search()
    {
        $username = $this->_getsessionuser();

        if ($_GET) {
            $term = $this->input->get('query');
            $term = html_escape($term);

            if (strlen($term) < 3) {
                $data['error'] = '<div class="alert alert-danger">Your search query must be atleast 3 character in length</div>';
                $data['count'] = 0;
                $data['query'] = 'your query';
            } else {
                $allConnections = array();

                foreach ($this->User_model->getAllConnections($username) as $user) {
                    $allConnections[] = $user->username;
                }

                $allUsers = $this->User_model->searchUsers($term);
                $resultset = [];

                foreach ($allUsers as $user) {
                    if (in_array($user->username, $allConnections)) {
                        $resultset[] = array(
                            'is_in_circles' => 1,
                            'data' => $user
                        );
                    } else {
                        $resultset[] = array(
                            'is_in_circles' => 0,
                            'data' => $user
                        );
                    }
                }

                $data['users'] = $resultset;
                $data['count'] = count($data['users']);
                $data['query'] = $term;
            }

            $this->load->view('user/search', $data);
        }
    }
    
    public function all()
    {
        $data['users'] = $this->User_model->getAllUsers();
        $data['count'] = count($data['users']);
        $data['query'] = "all users";

        $this->load->view('user/search', $data);
    }
    
    public function suggestions()
    {
        $username = $this->_getsessionuser();
        $data['info'] = $this->User_model->getuserDetails($username);
        $data['users'] = $this->User_model->suggestions($username);
        $data['connected'] = $this->User_model->getAllConnections($username);

        $this->load->view('user/profile_basic', $data);
        $this->load->view('user/profile_connections', $data);
    }

    public function connected()
    {
        $username = $this->_getsessionuser();
        
        $data['info'] = $this->User_model->getuserDetails($username);
        $data['users'] = $this->User_model->getAllConnections($username);
        $data['connected'] = $this->User_model->getAllConnections($username);
        
        $this->load->view('user/profile_basic', $data);
        $this->load->view('user/profile_connected', $data);
    }

    public function online_users()
    {
        $username = $this->_getsessionuser();
        $data['info'] = $this->User_model->getuserDetails($username);
        $data['users'] = $this->User_model->getOnlineUsers($username);
        
        $this->load->view('user/profile_basic', $data);
        $this->load->view('user/online_users', $data);
    }

    public function addevent()
    {
        $this->load->view('user/addevent');
    }
    
    function logout()
    {
        $this->User_model->mark_offline($this->session->userdata('logged_in')['uid']);
        $this->session->unset_userdata('logged_in');

        session_destroy();

        redirect('login', 'refresh');
    }
    
    function events()
    {
        $this->load->view('user/events');
    }
    
    public function checkin()
    {
        $this->load->view('user/checkin');
    }

    public function timeline()
    {
        $username = $this->_getsessionuser();
        
        $data['info'] = $this->User_model->getuserDetails($username);
        $data['users'] = $this->User_model->getAllConnections($username);
        $data['connected'] = $this->User_model->getAllConnections($username);
        $feed_array['feeds'] = $this->User_model->timeline($username);

        $this->load->view('user/profile_basic', $data);
        $this->load->view('user/timeline',$feed_array);
    }
}
