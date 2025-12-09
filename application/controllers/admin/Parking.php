<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Parking_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['parking_description'] = $this->Parking_model->show_parking_description();
		$data['parking_place_all'] = $this->Parking_model->show_parking_place_all();
		
		if(isset($_POST['form_description']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$description = $this->input->post('description', true);
			$seo_title = $this->input->post('seo_title', true);
			$seo_meta_description = $this->input->post('seo_meta_description', true);
           
    		$form_data = array(
				'description' => $description,
				'seo_title' => $seo_title,
				'seo_meta_description' => $seo_meta_description
            );
            $this->Parking_model->update_parking_description($form_data);
			
			$success = 'Parking Information is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/parking');
		}


		elseif(isset($_POST['form_parking_place_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$parking_place_name = $this->input->post('parking_place_name', true);
			$parking_place_description = $this->input->post('parking_place_description', true);
			$parking_place_map = $this->input->post('parking_place_map', true);
			
			if($parking_place_name == '')
			{
				$valid = 0;
		        $error .= 'Parking Place Name can not be empty<br>';
			}

			if($parking_place_map == '')
			{
				$valid = 0;
		        $error .= 'Parking Place Map Code can not be empty<br>';
			}
            
		    if($valid == 1)
		    {
	    		$form_data = array(
	    			'parking_place_name' => $parking_place_name,
	    			'parking_place_description' => $parking_place_description,
	    			'parking_place_map' => $parking_place_map
	            );
	            $this->Parking_model->add_parking_place($form_data);
				
				$success = 'Parking Place is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/parking');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/parking');
		    }
		}

		elseif(isset($_POST['form_parking_place_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$parking_place_name = $this->input->post('parking_place_name', true);
			$parking_place_description = $this->input->post('parking_place_description', true);
			$parking_place_map = $this->input->post('parking_place_map', true);
			$parking_place_id = $this->input->post('parking_place_id', true);
			
			if($parking_place_name == '')
			{
				$valid = 0;
		        $error .= 'Parking Place Name can not be empty<br>';
			}

			if($parking_place_map == '')
			{
				$valid = 0;
		        $error .= 'Parking Place Map Code can not be empty<br>';
			}
            
		    if($valid == 1) 
		    {
	    		$form_data = array(
					'parking_place_name' => $parking_place_name,
	    			'parking_place_description' => $parking_place_description,
	    			'parking_place_map' => $parking_place_map
	            );
	            $this->Parking_model->update_parking_place($parking_place_id,$form_data);
	    		
				$success = 'Parking Place is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/parking');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/parking');
		    }
		}

		else
		{
			$this->load->view('admin/parking',$data);
		}

	}
	
	public function delete_parking_place($parking_place_id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Parking_model->parking_place_check($parking_place_id);
    	if(!$tot) {
    		redirect(base_url().'admin/parking');
        	exit;
    	}

        $this->Parking_model->delete_parking_place($parking_place_id);
        $success = 'Parking Place is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/parking');
	}

}