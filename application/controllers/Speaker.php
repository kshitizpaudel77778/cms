<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speaker extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Speaker_model');
    }

	public function index($slug)
	{
		$data['speaker_single'] = $this->Speaker_model->speaker_single($slug);
		$data['banner_speaker_detail'] = $this->Speaker_model->banner_speaker_detail();
		
		$this->load->view('speaker',$data);
	}
}