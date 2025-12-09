<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_for_sponsors extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Call_for_sponsors_model');
    }

	public function index()
	{
		$data['call_for_sponsors_row'] = $this->Call_for_sponsors_model->call_for_sponsors_row();
		$data['banner_call_for_sponsors'] = $this->Call_for_sponsors_model->banner_call_for_sponsors();
		
		$this->load->view('call_for_sponsors',$data);
	}
}