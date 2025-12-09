<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Schedule_model');
    }

	public function index()
	{
		$data['event_date_all'] = $this->Schedule_model->event_date_all();
		$data['banner_schedule'] = $this->Schedule_model->banner_schedule();
		
		$this->load->view('schedule',$data);
	}
}