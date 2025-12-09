<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Parking_model');
    }

	public function index()
	{
		$data['parking_description'] = $this->Parking_model->parking_description();
		$data['parking_place_all'] = $this->Parking_model->parking_place_all();
		$data['banner_parking'] = $this->Parking_model->banner_parking();
		
		$this->load->view('parking',$data);
	}
}