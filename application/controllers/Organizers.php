<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizers extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Organizers_model');
    }

	public function index()
	{
		$data['organizer_all'] = $this->Organizers_model->organizer_all();
		$data['banner_organizers'] = $this->Organizers_model->banner_organizers();
		
		$this->load->view('organizers',$data);
	}
}