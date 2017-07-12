<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Kolkata');

if(!$this->session->userdata('logged_in'))
{
	$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissible text-center" role="alert" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> You must be authenticated to access that page!</div>');
	redirect("login");
}

 ?>