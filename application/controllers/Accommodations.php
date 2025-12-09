<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accommodations extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Accommodations_model');
    }

	public function index()
	{
		$data['accommodations_all'] = $this->Accommodations_model->accommodations_all();
		$data['banner_accommodations'] = $this->Accommodations_model->banner_accommodations();
		
		$this->load->view('accommodations',$data);
	}
}