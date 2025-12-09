<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_section extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Home_section_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		$data['home_section'] = $this->Home_section_model->show_home_section();

		if(isset($_POST['form1']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$section_name = $this->input->post('section_name', true);
			$section_status = $this->input->post('section_status', true);

			$arr1 = [];
			$arr2 = [];

			$i=0;
			foreach($section_name as $item)
			{
				$arr1[$i] = $item;
				$i++;
			}

			$i=0;
			foreach($section_status as $item)
			{
				$arr2[$i] = $item;
				$i++;
			}

			for($i=0;$i<count($arr1);$i++)
			{
				$form_data = array(
					'section_status' => $arr2[$i]
	            );
	            $this->Home_section_model->update_home_section($arr1[$i],$form_data);
			}			
			
			$success = 'Home section status is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/home-section');
		}
		else
		{
			$this->load->view('admin/home_section',$data);
		}		
	}

}