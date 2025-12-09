<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speakers extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Speakers_model');
    }

	public function index()
	{
		$data['speaker_all'] = $this->Speakers_model->speaker_all();
		$data['banner_speakers'] = $this->Speakers_model->banner_speakers();
		
		$this->load->view('speakers',$data);
	}
}