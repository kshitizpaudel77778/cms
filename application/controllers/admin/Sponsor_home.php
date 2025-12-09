<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsor_home extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Sponsor_home_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['sponsor_title_subtitle'] = $this->Sponsor_home_model->show_sponsor_title_subtitle();
		
		if(isset($_POST['form_sponsor_title_subtitle']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$title = $this->input->post('title', true);
			$subtitle = $this->input->post('subtitle', true);
           
    		$form_data = array(
				'title' => $title,
				'subtitle' => $subtitle
            );
            $this->Sponsor_home_model->update_sponsor_title_subtitle($form_data);
			
			$success = 'Home page sponsor title and subtitle are updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/sponsor-home');
		}		

		else
		{
			$this->load->view('admin/sponsor_home',$data);
		}

	}

}