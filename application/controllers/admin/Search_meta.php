<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_meta extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Search_meta_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		$data['search_meta'] = $this->Search_meta_model->show_search_meta();

		if(isset($_POST['form1']))
		{

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$valid = 1;

			$seo_title = $this->input->post('seo_title', true);
			$seo_meta_description = $this->input->post('seo_meta_description', true);

			if($seo_title == '')
			{
				$valid = 0;
				$error .= 'Title can not be empty';
			}

			if($seo_meta_description == '')
			{
				$valid = 0;
				$error .= 'Meta Description can not be empty';
			}
           
		    if($valid == 1) 
		    {
				$form_data = array(
					'seo_title'            => $seo_title,
					'seo_meta_description' => $seo_meta_description
	            );
	            $this->Search_meta_model->update_search_meta($form_data);
				
				$success = 'Meta Information is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/search-meta');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/search-meta');
		    }
		}
		else
		{
			$this->load->view('admin/search_meta',$data);
		}		
	}

}