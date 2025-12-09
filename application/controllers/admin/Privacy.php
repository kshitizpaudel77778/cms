<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Privacy_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		
		$data['privacy'] = $this->Privacy_model->show_privacy();

		if(isset($_POST['form1']))
		{

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$valid = 1;

			$title = $this->input->post('title', true);
			$content = $this->input->post('content', true);
			$seo_title = $this->input->post('seo_title', true);
			$seo_meta_description = $this->input->post('seo_meta_description', true);
			
			if($title=='')
			{
				$valid = 0;
				$error .= 'Title can not be empty<br>';
			}

			if($content=='')
			{
				$valid = 0;
				$error .= 'Content can not be empty<br>';
			}
           
		    if($valid == 1) 
		    {
				$form_data = array(
					'title' => $title,
					'content' => $content,
					'seo_title' => $seo_title,
					'seo_meta_description' => $seo_meta_description
	            );
	            $this->Privacy_model->update_privacy($form_data);
				
				$success = 'Privacy Page Content is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/privacy');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/privacy');
		    }         
		}
		else
		{
			$this->load->view('admin/privacy',$data);
		}		
	}
}