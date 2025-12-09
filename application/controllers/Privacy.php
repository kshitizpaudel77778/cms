<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Privacy_model');
    }

	public function index()
	{
		$data['privacy_row'] = $this->Privacy_model->privacy_row();
		$data['banner_privacy'] = $this->Privacy_model->banner_privacy();
		
		$this->load->view('privacy',$data);
	}
}