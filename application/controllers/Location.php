<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Location_model');
    }

	public function index()
	{
		$data['location_row'] = $this->Location_model->location_row();
		$data['banner_location'] = $this->Location_model->banner_location();
		
		$this->load->view('location',$data);
	}
}