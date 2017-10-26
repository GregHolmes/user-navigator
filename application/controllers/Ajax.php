<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();

        $this->load->view('session_check');
        $this->load->model('User_model', '', True);
        $this->load->library('form_validation');        
    }
    
    private function _getsessionuser()
    {
        $p = $this->session->userdata('logged_in');

        return $p['username'];
    }

    private function _getsessionuserid()
    {
        $p = $this->session->userdata('logged_in');
        $userid = $p['uid'];

        return $userid;
    }
    
    public function index()
    {
        // Nothing here
    }

    public function review()
    {
        if (!empty($_GET)) {
            $lat = $_GET['lat'];
            $lng = $_GET['lng'];           
            $this->load->model('Review');
            $reviews         = $this->Review->get_last_10_reviews($lat,$lng);
            $data['results'] = json_encode($reviews, JSON_PRETTY_PRINT);
            $this->load->view('ajax', $data);
        }
    }
    
    function nearby()
    {
        if (!empty($_GET)) {
            $lat = $_GET['lat'];
            $lng = $_GET['lng'];
            
            $lat = sprintf("%.3f", $lat);
            $lng = sprintf("%.3f", $lng);
            
            $data = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lng&radius=400&key=KEY");
            
            $data = json_decode($data, True);
            
            $data = $data["results"];
            
            $data['results'] = json_encode($data, JSON_PRETTY_PRINT);
            $this->load->view('ajax', $data);
        }
    }
    
    function checkin()
    {
        if ($this->input->is_ajax_request()) {
            $userid = $this->_getsessionuserid();
            $checkin_story = $this->input->post('story');
            $checkin_place = $this->input->post('checkinplace');
            $checkin_place_id = $this->input->post('checkinplace_id');
            $checkin_geometry = json_encode($this->input->post('coord'));
            
            $data_array = array(
                'uid' => $userid,
                'checkin_story' => $checkin_story,
                'checkin_place' => $checkin_place,
                'checkin_geometry' => $checkin_geometry,
                'checkin_place_id' => $checkin_place_id
            );
            
            $data['id'] = $this->User_model->checkin($data_array);

            if ($data['id']) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'status' => 'success',
                    'message' => '<span class="f-15">Successfully checked in @ <small> ' . $checkin_place . '</small></span>'
                )));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'status' => 'danger',
                    'message' => '<span class="f-15">Something went wrong !</span>'
                )));
            }
        }
    }

    function addreview()
    {
        if ($this->input->is_ajax_request()) {
            $userid = $this->_getsessionuserid();
            $info = $this->input->post('review');
            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');

            $data_array = array(
                'uid' => $userid,
                'info' => $info,
                'lat' => $lat,
                'lng' =>$lng            
            );

            if (empty($lat) OR empty($lng)) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'status' => 'danger',
                    'message' => '<span class="f-15">Something went wrong !</span>'
                )));

                die();
            }
            
            $data['id'] = $this->User_model->addreview($data_array);

            if ($data['id']) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'status' => 'success',
                    'message' => '<span class="f-15">Successfully added your review</span>'
                )));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'status' => 'danger',
                    'message' => '<span class="f-15">Something went wrong !</span>'
                )));
            }
        }
    }

    function deletecheckin()
    {
        if ($this->input->is_ajax_request()) {
            $userid = $this->_getsessionuserid();
            $checkin_id = $this->input->post('checkin_id');

            $data['id'] = $this->User_model->deletecheckin($checkin_id);

            if ($data['id']) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'message' => '<span class="f-15">Successfully deleted checkin <small> </small></span>',
                    'output' => $data['id']
                )));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'message' => '<span class="f-15">Something went wrong!</span>',
                    'output' => $data['id']
                )));
            }   
        } 

    }

    function basicinfoupdate()
    {
        if ($this->input->is_ajax_request()) {
            $userid = $this->_getsessionuserid();
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $full_name = "$first_name $last_name";
            $user_gender = $this->input->post('user_gender');
            $user_birthday = $this->input->post('user_birthday');
            
            if ($user_birthday) {
                $user_birthday = DateTime::createFromFormat('d/m/Y', $user_birthday);
                $user_birthday = $user_birthday->format('Y-m-d');
            } else {
                $user_birthday = "N/A";
            }

            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
            
            $data_array = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'full_name' => $full_name,
                'user_gender' => $user_gender,
                'user_birthday' => $user_birthday
            );
            
            $data['id'] = $this->User_model->basicinfoupdate($userid, $data_array);

            if ($data['id'] != 0) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'message' => '<span class="f-15">Something went wrong. Try again later.</span>'
                )));                

            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'message' => '<span class="f-15">Successfully updated profile information.</small></span>'
                )));
            }
        }
    }

    function contactinfoupdate()
    {
        if ($this->input->is_ajax_request()) {
            $userid = $this->_getsessionuserid();
            $phone = $this->input->post('phone');
            $user_email = $this->input->post('user_email');
            $twitter = $this->input->post('twitter');
            $skype = $this->input->post('skype');

            $data_array = array(
                'phone' => $phone,
                'user_email' => $user_email,
                'twitter' => $twitter,
                'skype' => $skype,
            );

            $data_array = array_filter($data_array);
            $data['id'] = $this->User_model->contactinfoupdate($userid, $data_array);

            if ($data['id'] != 0) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'message' => '<span class="f-15">Something went wrong. Try again later.</span>'
                )));                

            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'message' => '<span class="f-15">Successfully updated contact information.</small></span>'
                )));
            }
        }
    }

    function addnewevent()
    {
        if ($this->input->is_ajax_request()) {
            $userid = $this->_getsessionuserid();

            $event_name = $this->input->post('event_name');
            $event_location = $this->input->post('event_location');
            $event_time = $this->input->post('event_time');
            $event_desc = $this->input->post('event_desc');

            $event_time = DateTime::createFromFormat('m/d/Y h:i A', $event_time);
            $event_time = $event_time->format('Y-m-d H:i:s');

            $this->form_validation->set_rules('event_name', 'Event name', 'trim|required');
            $this->form_validation->set_rules('event_location', 'Event location', 'trim|required');
            $this->form_validation->set_rules('event_time', 'Event time', 'trim|required');
            $this->form_validation->set_rules('event_desc', 'Event description', 'trim|required');

            $data_array = array(
                'event_name' => $event_name,
                'uid' => $userid,
                'event_location' => $event_location,
                'event_time' => $event_time,
                'event_desc' => $event_desc,
            );

            $data['id'] = $this->User_model->addnewevent($data_array);

            if (!$data['id']) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'message' => '<span class="f-15">Something went wrong. Try again later.</span>'
                )));                

            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    'message' => '<span class="f-15">Successfully added new event information.</small></span>'
                )));
            }
        }
    }

    function getMarkers()
    {
        $this->load->model('Map_model');
        $markers = $this->Map_model->get_markers();
        $data['results'] = json_encode($markers, JSON_PRETTY_PRINT);
        $this->load->view('ajax', $data);
        
    }

    function getpolylines()
    {
        $this->load->model('Map_model');
        $polylines = $this->Map_model->get_polylines();
        $data['results'] = json_encode($polylines, JSON_PRETTY_PRINT);
        $this->load->view('ajax', $data);
        
    }
    
    function getuser()
    {
        $user = $this->_getsessionusername();

        echo $user;
    }
    
    function savepath()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->model('Map_model');
            $type = $this->input->post('type');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $encoded_path = $this->input->post('encoded_path');

            $color='blue';
            $alert='success';
            $weight='5';
            $dashed='1';

            if ($type === 'accprone') {
                $color = 'red';
                $alert = 'danger';
                $weight= '7';
            }

            if ($type === 'unmetalled') {
                $color = 'green';
                $alert = 'warning';
                $weight= '10';
                $dashed='0';
            }
            
            $data_array = array(
                'type' => $type,
                'title' => $title,
                'description' => $description,
                'encoded_path' => $encoded_path,
                'color' =>$color,
                'alert' => $alert,
                'weight' => $weight,
                'uid' => $this->session->userdata('logged_in')['uid'],
                'dashed' => $dashed
            );
            
            $data['id'] = $this->Map_model->savepath($data_array);
            
            if ($data['id']) {
                echo "Path Successfully Saved!";
            } else {
                echo "error!";
            }
            
        }
    }

    public function circle_add()
    {
        if (!empty($_POST)) {
            $username = $this->_getsessionuser();
            $friend_id = $this->input->post('friend_id');
            $value = $this->User_model->connection_check($username, $friend_id);

            if ($value) {
                $response = $this->User_model->circleAdd($username, $friend_id);
                echo 'Successfully added to your circle';
            } else {
                echo 'Error adding to circle';
            }
        }
    }

    public function circle_remove()
    {
        if ($this->input->is_ajax_request()) {
            $username = $this->_getsessionuser();
            $friend_id = $this->input->post('friend_id');
            $value = $this->User_model->connection_check($username, $friend_id);

            if ($value) {
                echo 'Error removing from circle';
            } else {
                $response = $this->User_model->circleRemove($username, $friend_id);
                echo 'Successfully removed from your circle';
            }
        }
    }

    public function savemarker()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->model('Map_model');
            $name = $this->input->post('name');
            $info = $this->input->post('address');
            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');
            $uid = $this->session->userdata('logged_in')['uid'];
            $type = $this->input->post('type');
            
            $data_array = array(
                'uid' => $uid,
                'name' => $name,
                'info' => $info,
                'lat' => $lat,
                'lng' => $lng,
                'type' => $type
            );
            
            $data['id'] = $this->Map_model->savemarker($data_array);
            
            if ($data['id']) {
                echo "Path Successfully Saved!";
            } else {
                echo "error!";
            }
        }
    }
}
