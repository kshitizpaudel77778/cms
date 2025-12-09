<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_date extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Event_date_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['event_date_all'] = $this->Event_date_model->show_event_date_all();
		
		if(isset($_POST['form_event_date_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$ed_name = $this->input->post('ed_name', true);
			$ed_month = $this->input->post('ed_month', true);
			$ed_day = $this->input->post('ed_day', true);
			
			if($ed_name == '')
			{
				$valid = 0;
		        $error .= 'Event Date\'s Name can not be empty<br>';
			}

			if($ed_month == '')
			{
				$valid = 0;
		        $error .= 'Event Date\'s Month can not be empty<br>';
			}

			if($ed_day == '')
			{
				$valid = 0;
		        $error .= 'Event Date\'s Day can not be empty<br>';
			}
            
		    if($valid == 1)
		    {
	    		$form_data = array(
					'ed_name'  => $ed_name,
					'ed_month' => $ed_month,
					'ed_day'   => $ed_day
	            );
	            $this->Event_date_model->add_event_date($form_data);
				
				$success = 'Event Date is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/event-date');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/event-date');
		    }
		}

		elseif(isset($_POST['form_event_date_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$ed_name = $this->input->post('ed_name', true);
			$ed_month = $this->input->post('ed_month', true);
			$ed_day = $this->input->post('ed_day', true);
			$ed_id = $this->input->post('ed_id', true);
			
			if($ed_name == '')
			{
				$valid = 0;
		        $error .= 'Event Date\'s Name can not be empty<br>';
			}

			if($ed_month == '')
			{
				$valid = 0;
		        $error .= 'Event Date\'s Month can not be empty<br>';
			}

			if($ed_day == '')
			{
				$valid = 0;
		        $error .= 'Event Date\'s Day can not be empty<br>';
			}
           
		    if($valid == 1) 
		    {
	    		$form_data = array(
					'ed_name'  => $ed_name,
					'ed_month' => $ed_month,
					'ed_day'   => $ed_day
	            );
	            $this->Event_date_model->update_event_date($ed_id,$form_data);		    	
	    		
				$success = 'Event Date is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/event-date');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/event-date');
		    }
		}

		else
		{
			$this->load->view('admin/event_date',$data);
		}

	}
	
	public function delete_event_date($id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Event_date_model->event_date_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/event-date');
        	exit;
    	}

        $this->Event_date_model->delete_event_date($id);
        $this->Event_date_model->delete_event($id);

        $success = 'Event Date is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/event-date');
	}

}