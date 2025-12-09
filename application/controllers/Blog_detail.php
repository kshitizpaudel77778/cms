<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_detail extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Blog_detail_model');
    }

	public function index($slug)
	{
		$data['blog_detail_single'] = $this->Blog_detail_model->blog_detail_single($slug);
		$data['blog_all'] = $this->Blog_detail_model->blog_all();
		$data['banner_blog_detail'] = $this->Blog_detail_model->banner_blog_detail();
		
		$this->load->view('blog_detail',$data);
	}
}