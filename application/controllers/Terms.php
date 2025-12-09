<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Terms_model');
    }

	public function index()
	{
		$data['terms_row'] = $this->Terms_model->terms_row();
		$data['banner_terms'] = $this->Terms_model->banner_terms();
		
		$this->load->view('terms',$data);
	}
}