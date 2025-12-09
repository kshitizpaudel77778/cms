<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendees extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Attendees_model');
    }

	public function index()
	{
		$data['attendees_all'] = $this->Attendees_model->attendees_all();
		$data['banner_attendees'] = $this->Attendees_model->banner_attendees();
		
		$this->load->view('attendees',$data);
	}
}