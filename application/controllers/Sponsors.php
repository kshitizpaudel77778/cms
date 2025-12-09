<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Sponsors_model');
    }

	public function index()
	{
		$data['sponsor_category_all'] = $this->Sponsors_model->sponsor_category_all();
		$data['banner_sponsors'] = $this->Sponsors_model->banner_sponsors();
		
		$this->load->view('sponsors',$data);
	}
}