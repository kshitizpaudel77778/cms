<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_for_volunteers extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Call_for_volunteers_model');
    }

	public function index()
	{
		$data['call_for_volunteers_row'] = $this->Call_for_volunteers_model->call_for_volunteers_row();
		$data['banner_call_for_volunteers'] = $this->Call_for_volunteers_model->banner_call_for_volunteers();
		
		$this->load->view('call_for_volunteers',$data);
	}
}