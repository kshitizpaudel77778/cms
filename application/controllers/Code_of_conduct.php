<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code_of_conduct extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Code_of_conduct_model');
    }

	public function index()
	{
		$data['code_of_conduct_row'] = $this->Code_of_conduct_model->code_of_conduct_row();
		$data['banner_code_of_conduct'] = $this->Code_of_conduct_model->banner_code_of_conduct();
		
		$this->load->view('code_of_conduct',$data);
	}
}