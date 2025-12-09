<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Videos_model');
    }

	public function index()
	{
		$data['video_category_all'] = $this->Videos_model->video_category_all();
		$data['banner_videos'] = $this->Videos_model->banner_videos();
		
		$this->load->view('videos',$data);
	}
}