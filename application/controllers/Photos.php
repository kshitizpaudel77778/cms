<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Photos_model');
    }

	public function index()
	{
		$data['photo_category_all'] = $this->Photos_model->photo_category_all();
		$data['banner_photos'] = $this->Photos_model->banner_photos();
		
		$this->load->view('photos',$data);
	}
}