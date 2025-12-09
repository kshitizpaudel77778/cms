<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Video_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		$data['setting'] = '';

		$data['video_page_info'] = $this->Video_model->show_video_page_info();
		$data['video_category_all'] = $this->Video_model->show_video_category_all();
		$data['video_all'] = $this->Video_model->show_video_all();

		if(isset($_POST['form_video_page_info']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$seo_title = $this->input->post('seo_title', true);
			$seo_meta_description = $this->input->post('seo_meta_description', true);
           
    		$form_data = array(
				'seo_title' => $seo_title,
				'seo_meta_description' => $seo_meta_description
            );
            $this->Video_model->update_video_page_info($form_data);
			
			$success = 'Page Information is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/video');
		}
		
		elseif(isset($_POST['form_video_category_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$video_category_name = $this->input->post('video_category_name', true);
			
			if($video_category_name == '')
			{
				$valid = 0;
		        $error .= 'Video Category Name can not be empty<br>';
			}			
            
		    if($valid == 1)
		    {
	    		$form_data = array(
	    			'video_category_name' => $video_category_name
	            );
	            $this->Video_model->add_video_category($form_data);
				
				$success = 'Video Category is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/video');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/video');
		    }
		}

		elseif(isset($_POST['form_video_category_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$video_category_name = $this->input->post('video_category_name', true);
			$video_category_id = $this->input->post('video_category_id', true);
			
			if($video_category_name == '')
			{
				$valid = 0;
		        $error .= 'Video Category Name can not be empty<br>';
			}
            
		    if($valid == 1)
		    {
		    	
	    		$form_data = array(
					'video_category_name' => $video_category_name
	            );
	            $this->Video_model->update_video_category($video_category_id,$form_data);
	    		
				$success = 'Video Category is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/video');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/video');
		    }
		}


		elseif(isset($_POST['form_video_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$video_caption = $this->input->post('video_caption', true);
			$video_code = $this->input->post('video_code', true);
			$video_category_id = $this->input->post('video_category_id', true);

			if($video_code == '')
			{
				$valid = 0;
		        $error .= 'Video Code can not be empty<br>';
			}
			
		    if($valid == 1)
		    {
	    		$form_data = array(
	    			'video_code' => $video_code,
	    			'video_caption' => $video_caption,
	    			'video_category_id' => $video_category_id
	            );
	            $this->Video_model->add_video($form_data);
				
				$success = 'Video is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/video');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/video');
		    }
		}

		elseif(isset($_POST['form_video_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$video_caption = $this->input->post('video_caption', true);
			$video_code = $this->input->post('video_code', true);
			$video_category_id = $this->input->post('video_category_id', true);
			$video_id = $this->input->post('video_id', true);
			
			if($video_code == '')
			{
				$valid = 0;
		        $error .= 'Video Code can not be empty<br>';
			}
            
		    if($valid == 1) 
		    {
	    		$form_data = array(
					'video_code' => $video_code,
					'video_caption' => $video_caption,
					'video_category_id' => $video_category_id
	            );
	            $this->Video_model->update_video($video_id,$form_data);
		    	    			    		
				$success = 'Video is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/video');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/video');
		    }
		}

		else
		{
			$this->load->view('admin/video',$data);
		}

	}
	
	public function delete_category($video_category_id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

		$tot = $this->Video_model->video_category_check($video_category_id);
    	if(!$tot) {
    		redirect(base_url().'admin/video');
        	exit;
    	}

        $this->Video_model->delete_video_category($video_category_id);
        $this->Video_model->delete_video_by_category($video_category_id);

        $success = 'Video Category is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/video');
	}

	public function delete_video($video_id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Video_model->video_check($video_id);
    	if(!$tot) {
    		redirect(base_url().'admin/video');
        	exit;
    	}

        $this->Video_model->delete_video($video_id);

        $success = 'Video is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/video');
	}

}