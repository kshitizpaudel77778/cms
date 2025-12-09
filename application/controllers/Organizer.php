<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizer extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Organizer_model');
    }

	public function index($slug)
	{
		$data['organizer_single'] = $this->Organizer_model->organizer_single($slug);
		$data['banner_organizer_detail'] = $this->Organizer_model->banner_organizer_detail();
		
		$this->load->view('organizer',$data);
	}
}