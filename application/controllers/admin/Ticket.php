<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Ticket_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		$data['setting'] = '';

		$data['ticket_page_info'] = $this->Ticket_model->show_ticket_page_info();
		$data['ticket_all'] = $this->Ticket_model->show_ticket_all();
		$data['ticket_detail_all'] = $this->Ticket_model->show_ticket_detail_all();

		if(isset($_POST['form_ticket_page_info']))
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
            $this->Ticket_model->update_ticket_page_info($form_data);
			
			$success = 'Page Information is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/ticket');
		}
		
		elseif(isset($_POST['form_ticket_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$ticket_name = $this->input->post('ticket_name', true);
			$ticket_price = $this->input->post('ticket_price', true);
			$ticket_maximum = $this->input->post('ticket_maximum', true);
			
			if($ticket_name == '')
			{
				$valid = 0;
		        $error .= 'Ticket Name can not be empty<br>';
			}

			if($ticket_price == '')
			{
				$valid = 0;
		        $error .= 'Ticket Price can not be empty<br>';
			}
			else
			{
				if(!is_numeric($ticket_price))
				{
					$valid = 0;
		        	$error .= 'Ticket Price must be numeric<br>';
				}
			}

			if($ticket_maximum == '')
			{
				$valid = 0;
		        $error .= 'Ticket Maximum can not be empty<br>';
			}
			else
			{
				if(!is_numeric($ticket_maximum))
				{
					$valid = 0;
		        	$error .= 'Ticket Maximum must be numeric<br>';
				}
			}
            
		    if($valid == 1)
		    {
	    		$form_data = array(
	    			'ticket_name' => $ticket_name,
	    			'ticket_price' => $ticket_price,
	    			'ticket_maximum' => $ticket_maximum,
	    			'ticket_sold' => 0
	            );
	            $this->Ticket_model->add_ticket($form_data);
				
				$success = 'Ticket is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/ticket');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/ticket');
		    }
		}

		elseif(isset($_POST['form_ticket_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$ticket_name = $this->input->post('ticket_name', true);
			$ticket_price = $this->input->post('ticket_price', true);
			$ticket_maximum = $this->input->post('ticket_maximum', true);
			$ticket_id = $this->input->post('ticket_id', true);
			
			if($ticket_name == '')
			{
				$valid = 0;
		        $error .= 'Ticket Name can not be empty<br>';
			}

			if($ticket_price == '')
			{
				$valid = 0;
		        $error .= 'Ticket Price can not be empty<br>';
			}
			else
			{
				if(!is_numeric($ticket_price))
				{
					$valid = 0;
		        	$error .= 'Ticket Price must be numeric<br>';
				}
			}

			if($ticket_maximum == '')
			{
				$valid = 0;
		        $error .= 'Ticket Maximum can not be empty<br>';
			}
			else
			{
				if(!is_numeric($ticket_maximum))
				{
					$valid = 0;
		        	$error .= 'Ticket Maximum must be numeric<br>';
				}
			}
            
		    if($valid == 1)
		    {
	    		$form_data = array(
					'ticket_name' => $ticket_name,
					'ticket_price' => $ticket_price,
					'ticket_maximum' => $ticket_maximum
	            );
	            $this->Ticket_model->update_ticket($ticket_id,$form_data);
	    		
				$success = 'Ticket is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/ticket');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/ticket');
		    }
		}


		elseif(isset($_POST['form_ticket_detail_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$ticket_detail_text = $this->input->post('ticket_detail_text', true);
			$ticket_detail_available = $this->input->post('ticket_detail_available', true);
			$ticket_id = $this->input->post('ticket_id', true);

			if($ticket_detail_text == '')
			{
				$valid = 0;
		        $error .= 'Ticket Detail Text field can not be empty<br>';
			}
			
		    if($valid == 1)
		    {
	    		$form_data = array(
	    			'ticket_detail_text' => $ticket_detail_text,
	    			'ticket_detail_available' => $ticket_detail_available,
	    			'ticket_id' => $ticket_id
	            );
	            $this->Ticket_model->add_ticket_detail($form_data);
				
				$success = 'Ticket Detail is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/ticket');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/ticket');
		    }
		}

		elseif(isset($_POST['form_ticket_detail_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$ticket_detail_text = $this->input->post('ticket_detail_text', true);
			$ticket_detail_available = $this->input->post('ticket_detail_available', true);
			$ticket_id = $this->input->post('ticket_id', true);
			$ticket_detail_id = $this->input->post('ticket_detail_id', true);
			
			if($ticket_detail_text == '')
			{
				$valid = 0;
		        $error .= 'Ticket Detail Text field can not be empty<br>';
			}
            
		    if($valid == 1) 
		    {
	    		$form_data = array(
					'ticket_detail_text' => $ticket_detail_text,
					'ticket_detail_available' => $ticket_detail_available,
					'ticket_id' => $ticket_id
	            );
	            $this->Ticket_model->update_ticket_detail($ticket_detail_id,$form_data);
		    	    			    		
				$success = 'Ticket Detail is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/ticket');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/ticket');
		    }
		}

		else
		{
			$this->load->view('admin/ticket',$data);
		}

	}
	
	public function delete_ticket($ticket_id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

		$tot = $this->Ticket_model->ticket_check($ticket_id);
    	if(!$tot) {
    		redirect(base_url().'admin/ticket');
        	exit;
    	}

        $this->Ticket_model->delete_ticket($ticket_id);
        $this->Ticket_model->delete_ticket_detail_by_ticket($ticket_id);

        $success = 'Ticket is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/ticket');
	}

	public function delete_ticket_detail($ticket_detail_id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Ticket_model->ticket_detail_check($ticket_detail_id);
    	if(!$tot) {
    		redirect(base_url().'admin/ticket');
        	exit;
    	}

        $this->Ticket_model->delete_ticket_detail($ticket_detail_id);

        $success = 'Ticket Detail is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/ticket');
	}

}