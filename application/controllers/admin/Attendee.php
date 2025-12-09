<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendee extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Attendee_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['attendee_page_info'] = $this->Attendee_model->show_attendee_page_info();
		$data['attendee_all'] = $this->Attendee_model->show_attendee_all();
		$data['ticket_all'] = $this->Attendee_model->ticket_all();
		
		if(isset($_POST['form_attendee_page_info']))
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
            $this->Attendee_model->update_attendee_page_info($form_data);
			
			$success = 'Page Information is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/attendee');
		}

		elseif(isset($_POST['form_attendee_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$first_name = $this->input->post('first_name', true);
			$last_name = $this->input->post('last_name', true);
			$email = $this->input->post('email', true);
			$phone = $this->input->post('phone', true);
			$country = $this->input->post('country', true);
			$address = $this->input->post('address', true);
			$state = $this->input->post('state', true);
			$city = $this->input->post('city', true);
			$zip = $this->input->post('zip', true);
			$website = $this->input->post('website', true);
			$want_to_be_listed = $this->input->post('want_to_be_listed', true);
			$ticket_id = $this->input->post('ticket_id', true);

			if($first_name == '')
			{
				$valid = 0;
		        $error .= 'First Name can not be empty<br>';
			}

			if($last_name == '')
			{
				$valid = 0;
		        $error .= 'Last Name can not be empty<br>';
			}

			if($email == '')
			{
				$valid = 0;
		        $error .= 'Email can not be empty<br>';
			}
			else
			{
				if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		        {
		            $valid = 0;
		            $error .= 'Email address must be valid<br>';
		        }
		        else
		        {
		        	$chk = $this->Attendee_model->email_exist_check($email);
		        	if($chk)
		        	{
		        		$valid = 0;
		            	$error .= 'Email address already exists<br>';
		        	}
		        }
			}

			if($phone == '')
			{
				$valid = 0;
		        $error .= 'Phone can not be empty<br>';
			}

			if($country == '')
			{
				$valid = 0;
		        $error .= 'Country can not be empty<br>';
			}

			if($address == '')
			{
				$valid = 0;
		        $error .= 'Address can not be empty<br>';
			}

			if($state == '')
			{
				$valid = 0;
		        $error .= 'State can not be empty<br>';
			}

			if($city == '')
			{
				$valid = 0;
		        $error .= 'City can not be empty<br>';
			}

			if($zip == '')
			{
				$valid = 0;
		        $error .= 'Zip Code can not be empty<br>';
			}

			$ticket_table = $this->Attendee_model->check_ticket_availability($ticket_id);
        	if($ticket_table['ticket_sold'] >= $ticket_table['ticket_maximum'])
        	{
        		$valid = 0;
            	$error .= 'All tickets are already sold for this ticket package!<br>';
        	}
           
		    if($valid == 1)
		    {
		    	$booking_date = date('Y-m-d');
			    $booking_time = date('h:i:s A');
			    $ticket_no = time();
				$payment_method = 'Manually Added';
				$payment_status = 'Completed';
				$transaction_id = '';

				$ticket_detail_what_available = '';
				$ticket_detail_what_not_available = '';
				$ticket_d = $this->Attendee_model->show_detail_by_ticket_id($ticket_id);
				$ticket_dd = $this->Attendee_model->show_detail_more_by_ticket_id($ticket_id);
				foreach($ticket_dd as $rr)
				{
					if($rr['ticket_detail_available'] == 'Yes')
					{
						$ticket_detail_what_available .= $rr['ticket_detail_text'].'<br>';
					}
					else
					{
						$ticket_detail_what_not_available .= $rr['ticket_detail_text'].'<br>';
					}
				}

         		$form_data = array(
					'first_name'                       => $first_name,
					'last_name'                        => $last_name,
					'email'                            => $email,
					'phone'                            => $phone,
					'country'                          => $country,
					'address'                          => $address,
					'state'                            => $state,
					'city'                             => $city,
					'zip'                              => $zip,
					'website'                          => $website,
					'want_to_be_listed'                => $want_to_be_listed,
					'ticket_no'                        => $ticket_no,
					'ticket_name'                      => $ticket_d['ticket_name'],
					'ticket_price'                     => $ticket_d['ticket_price'],
					'ticket_detail_what_available'     => $ticket_detail_what_available,
					'ticket_detail_what_not_available' => $ticket_detail_what_not_available,
					'booking_date'                     => $booking_date,
					'booking_time'                     => $booking_time,
					'payment_method'                   => $payment_method,
					'payment_status'                   => $payment_status,
					'transaction_id'                   => $transaction_id
	            );
	            $this->Attendee_model->add_attendee($form_data);
				
				$success = 'Attendee is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/attendee');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/attendee');
		    }
		}

		else
		{
			$this->load->view('admin/attendee',$data);
		}

	}
	
	public function delete_attendee($id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Attendee_model->attendee_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/attendee');
        	exit;
    	}

    	// Reduce the sold amount and update tbl_ticket
    	

        $this->Attendee_model->delete_attendee($id);
        $success = 'Attendee is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/attendee');
	}

}