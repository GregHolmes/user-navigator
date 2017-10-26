<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Img extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();

        $this->load->view('session_check');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->helper('string');
        $this->load->model('User_model');
    }
    
    
    private function _getsessionuser()
    {
        $p = $this->session->userdata('logged_in');
        $username = $p['username'];

        return $username;
    }

    public function index()
    {
        $username = $this->_getsessionuser();
        $data = $this->User_model->getuserDetails($username);
        $data = $data[0];
        $response_array = array(
            'name' => $data->full_name,
            'avatar' => base_url().'uploads/dp/thumbs/'.$data->avatar,
        );
        $response_array = json_encode($response_array,JSON_PRETTY_PRINT);

        echo "<pre>";
        print_r($response_array);  
        echo "</pre>"     ;
    }

    function get_avatar($uid)
    {
        $avatar = $this->User_model->get_avatar($uid);
        $avatarurl = 'uploads/dp/thumbs/'.$avatar;

        echo $avatarurl;        
    }

    public function upload()
    {
        if ($_POST) {
            $config['file_name']   = random_string('md5');
            $config['upload_path'] = './uploads/dp/';
            $config['max_size']    = '1000';
            
            $config['allowed_types'] = 'gif|jpg|png';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('imagefile')) {
                $upload_error = array(
                    'error' => $this->upload->display_errors()
                );
                print_r($upload_error);
            } else {
                $upload_data = $this->upload->data();
                echo $upload_data['file_name'];
            }
        }
    }

    public function crop()
    {
        if ($_POST) {
            $config['image_library'] = 'gd2';
            
            $config['new_image'] = './uploads/dp/thumbs/';
            
            $config['allowed_types'] = 'gif|jpg|png';
            $config['source_image'] = './uploads/dp/' . $_POST['filename'];
            $config['maintain_ratio'] = false;
            $config['width'] = $_POST['w'];
            $config['height'] = $_POST['h'];
            $config['x_axis'] = $_POST['x1'];
            $config['y_axis'] = $_POST['y1'];
            
            print_r($config);
            
            $this->image_lib->initialize($config);
            $this->load->library('image_lib', $config);
            
            if (!$this->image_lib->crop()) {
                echo $this->image_lib->display_errors();
            } else {
                $config['source_image']   = './uploads/dp/thumbs/' . $_POST['filename'];
                $config['maintain_ratio'] = TRUE;
                $config['width']          = 200;
                $config['height']         = 200;
                $config['new_image']      = './uploads/dp/thumbs/200x200/';
                $this->image_lib->initialize($config);
                
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                } else {
                    $p = $this->session->userdata('logged_in');
                    $username = $p['username'];
                    $data_array = array(
                        'avatar' => $_POST['filename'] );
                    $id = $this->User_model->updateAvatar($username,$data_array);

                    if ($id) {
                        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible text-center" role="alert" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Profile picture has been uploaded successfully!</div>');
                        redirect("user");
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible text-center" role="alert" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Profile picture failed to upload!</div>');
                        redirect("user");
                    }
                }
            }
        }
    }
}
