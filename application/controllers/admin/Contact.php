<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Contact_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		$data['setting'] = '';
		$data['contact'] = $this->Contact_model->show_contact();

		if(isset($_POST['form1']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$valid = 1;

			$address = $this->input->post('address', true);
			$phone = $this->input->post('phone', true);
			$email = $this->input->post('email', true);
			$seo_title = $this->input->post('seo_title', true);
			$seo_meta_description = $this->input->post('seo_meta_description', true);
			
			if($address=='')
			{
				$valid = 0;
				$error .= 'Address can not be empty<br>';
			}

			if($phone=='')
			{
				$valid = 0;
				$error .= 'Phone can not be empty<br>';
			}

			if($email=='')
			{
				$valid = 0;
				$error .= 'Email can not be empty<br>';
			}

          
		    if($valid == 1) 
		    {
				$form_data = array(
					'address' => $address,
					'phone' => $phone,
					'email' => $email,
					'seo_title' => $seo_title,
					'seo_meta_description' => $seo_meta_description
	            );
	            $this->Contact_model->update_contact($form_data);
				
				$success = 'Contact is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/contact');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/contact');
		    }         
		}
		else
		{
			$this->load->view('admin/contact',$data);
		}		
	}
}