<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Blog_model');
    }

	public function index()
	{
		$data['blog_all'] = $this->Blog_model->blog_all();
		$data['banner_blog'] = $this->Blog_model->banner_blog();
		
		$this->load->view('blog',$data);
	}
}