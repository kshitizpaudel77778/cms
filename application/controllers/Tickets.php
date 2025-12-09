<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->model('Tickets_model');
    }

	public function index()
	{
		if(isset($_SESSION['ticket_id']))
		{
			redirect(base_url().'tickets/buy');
			exit;
		}


		$data['ticket_all'] = $this->Tickets_model->ticket_all();
		$data['banner_tickets'] = $this->Tickets_model->banner_tickets();
		$this->load->view('tickets',$data);
	}

	public function package_select($ticket_id)
	{
		// check if tickets are sold
		$detail = $this->Tickets_model->check_ticket_sold($ticket_id);
		if($detail['ticket_sold'] >= $detail['ticket_maximum'])
		{
			$error = 'All tickets are already sold for this ticket package!';
			$this->session->set_flashdata('error',$error);
			redirect(base_url().'tickets');
		}
		else
		{
			$_SESSION['ticket_id'] = $ticket_id;
			redirect(base_url().'tickets/buy');
		}
	}

	public function buy_cancel()
	{
		unset($_SESSION['ticket_id']);
		redirect(base_url().'tickets/buy');	
	}

	public function buy()
	{
		if(!isset($_SESSION['ticket_id']))
		{
			redirect(base_url().'tickets');
			exit;
		}

		$data['ticket_detail'] = $this->Tickets_model->get_detail_by_ticket_id($_SESSION['ticket_id']);
		$data['agree'] = $this->Tickets_model->get_agree_text();

		if(isset($_POST['form1']))
		{
			$valid = 1;

			$first_name        = $this->input->post('first_name', true);
			$last_name         = $this->input->post('last_name', true);
			$email             = $this->input->post('email', true);
			$phone             = $this->input->post('phone', true);
			$country           = $this->input->post('country', true);
			$address           = $this->input->post('address', true);
			$state             = $this->input->post('state', true);
			$city              = $this->input->post('city', true);
			$zip               = $this->input->post('zip', true);
			$website           = $this->input->post('website', true);
			$want_to_be_listed = $this->input->post('want_to_be_listed', true);

			if($first_name == '')
		    {
		        $valid = 0;
		        $error .= ERROR_MESSAGE_EMPTY_FIRST_NAME.'<br>';
		    }

		    if($last_name == '')
		    {
		        $valid = 0;
		        $error .= ERROR_MESSAGE_EMPTY_LAST_NAME.'<br>';
		    }

		    if($email == '')
		    {
		        $valid = 0;
		        $error .= ERROR_MESSAGE_EMPTY_EMAIL.'<br>';
		    }
		    else
		    {
		        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		        {
		            $valid = 0;
		            $error .= ERROR_MESSAGE_VALID_EMAIL.'<br>';
		        }
		        else
		        {
		        	$chk = $this->Tickets_model->email_exist_check($email);
		        	if($chk)
		        	{
		        		$valid = 0;
		            	$error .= ERROR_MESSAGE_EXIST_EMAIL.'<br>';
		        	}
		        }
		    }

		    if($phone == '')
		    {
		        $valid = 0;
		        $error .= ERROR_MESSAGE_EMPTY_PHONE.'<br>';
		    }

		    if($country == '')
		    {
		        $valid = 0;
		        $error .= ERROR_MESSAGE_EMPTY_COUNTRY.'<br>';
		    }

		    if($address == '')
		    {
		        $valid = 0;
		        $error .= ERROR_MESSAGE_EMPTY_ADDRESS.'<br>';
		    }

		    if($state == '')
		    {
		        $valid = 0;
		        $error .= ERROR_MESSAGE_EMPTY_STATE.'<br>';
		    }

		    if($city == '')
		    {
		        $valid = 0;
		        $error .= ERROR_MESSAGE_EMPTY_CITY.'<br>';
		    }

		    if($zip == '')
		    {
		        $valid = 0;
		        $error .= ERROR_MESSAGE_EMPTY_ZIP.'<br>';
		    }

		    if($valid == 1)
		    {
		    	$_SESSION['first_name'] = $first_name;
		    	$_SESSION['last_name'] = $last_name;
		    	$_SESSION['email'] = $email;
		    	$_SESSION['phone'] = $phone;
		    	$_SESSION['country'] = $country;
		    	$_SESSION['address'] = $address;
		    	$_SESSION['state'] = $state;
		    	$_SESSION['city'] = $city;
		    	$_SESSION['zip'] = $zip;
		    	$_SESSION['website'] = $website;
		    	$_SESSION['want_to_be_listed'] = $want_to_be_listed;

		    	redirect(base_url().'tickets/buy-2');
		    }
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
        		redirect(base_url().'tickets/buy');
		    }
		}

		else
		{
			$data['banner_tickets'] = $this->Tickets_model->banner_tickets();		
			$this->load->view('buy',$data);
		}
	}

	public function buy_2()
	{
		if(!isset($_SESSION['ticket_id']))
		{
			redirect(base_url().'tickets');
			exit;
		}

		$data['ticket_detail'] = $this->Tickets_model->get_detail_by_ticket_id($_SESSION['ticket_id']);
		$data['banner_tickets'] = $this->Tickets_model->banner_tickets();		
		$this->load->view('buy-2',$data);
	}


	public function paypal()
	{
		$email_data = $this->Tickets_model->email_data();

		if(!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID']) ) {
	    
		    // Get payment info from URL
		    $paymentID = $_GET['paymentID'];
		    $token = $_GET['token'];
		    $payerID = $_GET['payerID'];
		    $booking_date = date('Y-m-d');
		    $booking_time = date('h:i:s A');
		    $ticket_no = time();

		    // Validate transaction via PayPal API
		    $paymentCheck = $this->validate($paymentID);
		    
		    // If the payment is valid and approved
		    if($paymentCheck && $paymentCheck->state == 'approved')
		    {
				if(PROJECT_MODE == 0) {
					$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
					redirect($_SERVER['HTTP_REFERER']);
				} else {
					// Get the transaction data. These are automatic from PayPal.
					$id = $paymentCheck->id;
					$state = $paymentCheck->state;
					$payerFirstName = $paymentCheck->payer->payer_info->first_name;
					$payerLastName = $paymentCheck->payer->payer_info->last_name;
					$payerName = $payerFirstName.' '.$payerLastName;
					$payerEmail = $paymentCheck->payer->payer_info->email;
					$payerID = $paymentCheck->payer->payer_info->payer_id;
					$payerCountryCode = $paymentCheck->payer->payer_info->country_code;
					$paidAmount = $paymentCheck->transactions[0]->amount->details->subtotal;
					$currency = $paymentCheck->transactions[0]->amount->currency;

					$ticket_data = $this->Tickets_model->get_detail_by_ticket_id($_SESSION['ticket_id']);
					$ticket_detail_what_av = $this->Tickets_model->get_ticket_detail_av($_SESSION['ticket_id']);
					$ticket_detail_what_not_av = $this->Tickets_model->get_ticket_detail_not_av($_SESSION['ticket_id']);

					// Array into string
					$aa = '';
					foreach($ticket_detail_what_av as $row)
					{
						$aa .= $row['ticket_detail_text'].'<br>';
					}

					$bb = '';
					foreach($ticket_detail_what_not_av as $row)
					{
						$bb .= $row['ticket_detail_text'].'<br>';
					}

					$form_data = array(
						'first_name'                       => $_SESSION['first_name'],
						'last_name'                        => $_SESSION['last_name'],
						'email'                            => $_SESSION['email'],
						'phone'                            => $_SESSION['phone'],
						'country'                          => $_SESSION['country'],
						'address'                          => $_SESSION['address'],
						'state'                            => $_SESSION['state'],
						'city'                             => $_SESSION['city'],
						'zip'                              => $_SESSION['zip'],
						'website'                          => $_SESSION['website'],
						'want_to_be_listed'                => $_SESSION['want_to_be_listed'],
						'ticket_no'                        => $ticket_no,
						'ticket_name'                      => $ticket_data['ticket_name'],
						'ticket_price'                     => $ticket_data['ticket_price'],
						'ticket_detail_what_available'     => $aa,
						'ticket_detail_what_not_available' => $bb,
						'booking_date'                     => $booking_date,
						'booking_time'                     => $booking_time,
						'payment_method'                   => 'PayPal',
						'payment_status'                   => 'Completed',
						'transaction_id'                   => $id
					);
					$this->Tickets_model->add_attendee($form_data);

					$t_data = $this->Tickets_model->get_ticket_table_data($_SESSION['ticket_id']);
					$ticket_sold_new = $t_data['ticket_sold']+1;

					$form_data1 = array(
						'ticket_sold' => $ticket_sold_new
					);
					$this->Tickets_model->update_ticket_table($_SESSION['ticket_id'],$form_data1);

					// Sending email
					$detail_show_url = base_url().'tickets/view';
					$msg = 'Thank you for purchasing the ticket. Your ticket no: '.$ticket_no;
					$msg .= '<br>Please click on this link to see your ticket details: ';
					$msg .= '<a href="'.$detail_show_url.'" target="_blank">'.$detail_show_url.''.'</a>';

					if($email_data['smtp_active'] == 'Yes') 
					{
						if($email_data['smtp_ssl'] == 'Yes') 
						{
							$config = array(
								'protocol' => 'smtp',
								'smtp_crypto' => 'ssl',
								'smtp_host' => $email_data['smtp_host'],
								'smtp_port' => $email_data['smtp_port'],
								'smtp_user' => $email_data['smtp_username'],
								'smtp_pass' => $email_data['smtp_password'],
								'mailtype'  => 'html', 
								'charset'   => 'utf-8'
							);
						}
						else
						{
							$config = array(
								'protocol' => 'smtp',
								'smtp_crypto' => 'tls',
								'smtp_host' => $email_data['smtp_host'],
								'smtp_port' => $email_data['smtp_port'],
								'smtp_user' => $email_data['smtp_username'],
								'smtp_pass' => $email_data['smtp_password'],
								'mailtype'  => 'html', 
								'charset'   => 'utf-8'
							);  
						}
						$this->load->library('email', $config);
					} else {
						$this->load->library('email');
					}

					$this->email->reply_to($email_data['receive_email_to']);
					$this->email->from($email_data['send_email_from']);
					$this->email->to($_SESSION['email']);

					$subject = 'Ticket Purchase Completed';
					$this->email->subject($subject);
					$this->email->message($msg);

					$this->email->set_mailtype("html");

					$this->email->send();

					unset($_SESSION['ticket_id']);
					unset($_SESSION['first_name']);
					unset($_SESSION['last_name']);
					unset($_SESSION['email']);
					unset($_SESSION['phone']);
					unset($_SESSION['country']);
					unset($_SESSION['address']);
					unset($_SESSION['state']);
					unset($_SESSION['city']);
					unset($_SESSION['zip']);
					unset($_SESSION['website']);
					unset($_SESSION['want_to_be_listed']);

					redirect(base_url().'tickets/payment-success');
		    	
				}

		    }
		    
		} else{
		    redirect(base_url());
		}
	}



	public function validate($paymentID)
	{

		$payment_data = $this->Tickets_model->payment_data();

		$client = $payment_data['paypal_client_id'];
		$secret = $payment_data['paypal_secret_key'];

		if($payment_data['paypal_mode'] == 'Sandbox')
		{
			$paypal_url = 'https://api.sandbox.paypal.com/v1/';	
		}
		else
		{
			$paypal_url = 'https://api.paypal.com/v1/';
		}
		

		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypal_url.'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $client.":".$secret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $response = curl_exec($ch);
        curl_close($ch);
        
        if(empty($response)){
            return false;
        }else{
            $jsonData = json_decode($response);
            $curl = curl_init($paypal_url.'payments/payment/'.$paymentID);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $jsonData->access_token,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            
            // Transaction data
            $result = json_decode($response);
            
            return $result;
        }
	}


	public function stripe()
	{
		$payment_data = $this->Tickets_model->payment_data();
		$email_data = $this->Tickets_model->email_data();

		require './public/payment/stripe/lib/init.php';		
		\Stripe\Stripe::setApiKey($payment_data['stripe_secret_key']);

		if(isset($_POST['stripeToken']))
		{
			$ticket_data = $this->Tickets_model->get_detail_by_ticket_id($_SESSION['ticket_id']);
	        $ticket_detail_what_av = $this->Tickets_model->get_ticket_detail_av($_SESSION['ticket_id']);
	        $ticket_detail_what_not_av = $this->Tickets_model->get_ticket_detail_not_av($_SESSION['ticket_id']);

			\Stripe\Stripe::setVerifySslCerts(false);

			$token = $_POST['stripeToken'];
			$cents = floatval($ticket_data['ticket_price']*100);

			$data=\Stripe\Charge::create(array(
				"amount" => $cents,
				"currency" => "usd",
				"description" => "Stripe Payment",
				"source" => $token,
			));

			$booking_date = date('Y-m-d');
		    $booking_time = date('h:i:s A');
		    $ticket_no = time();

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			} else {

				// Array into string
				$aa = '';
				foreach($ticket_detail_what_av as $row)
				{
					$aa .= $row['ticket_detail_text'].'<br>';
				}

				$bb = '';
				foreach($ticket_detail_what_not_av as $row)
				{
					$bb .= $row['ticket_detail_text'].'<br>';
				}

				$form_data = array(
					'first_name'                       => $_SESSION['first_name'],
					'last_name'                        => $_SESSION['last_name'],
					'email'                            => $_SESSION['email'],
					'phone'                            => $_SESSION['phone'],
					'country'                          => $_SESSION['country'],
					'address'                          => $_SESSION['address'],
					'state'                            => $_SESSION['state'],
					'city'                             => $_SESSION['city'],
					'zip'                              => $_SESSION['zip'],
					'website'                          => $_SESSION['website'],
					'want_to_be_listed'                => $_SESSION['want_to_be_listed'],
					'ticket_no'                        => $ticket_no,
					'ticket_name'                      => $ticket_data['ticket_name'],
					'ticket_price'                     => $ticket_data['ticket_price'],
					'ticket_detail_what_available'     => $aa,
					'ticket_detail_what_not_available' => $bb,
					'booking_date'                     => $booking_date,
					'booking_time'                     => $booking_time,
					'payment_method'                   => 'Stripe',
					'payment_status'                   => 'Completed',
					'transaction_id'                   => $data['id']
				);
				$this->Tickets_model->add_attendee($form_data);

				$t_data = $this->Tickets_model->get_ticket_table_data($_SESSION['ticket_id']);
				$ticket_sold_new = $t_data['ticket_sold']+1;

				$form_data1 = array(
					'ticket_sold' => $ticket_sold_new
				);
				$this->Tickets_model->update_ticket_table($_SESSION['ticket_id'],$form_data1);

				// Sending email
				$detail_show_url = base_url().'tickets/view';
				$msg = 'Thank you for purchasing the ticket. Your ticket no: '.$ticket_no;
				$msg .= '<br>Please click on this link to see your ticket details: ';
				$msg .= '<a href="'.$detail_show_url.'" target="_blank">'.$detail_show_url.''.'</a>';

				if($email_data['smtp_active'] == 'Yes') 
				{
					if($email_data['smtp_ssl'] == 'Yes') 
					{
						$config = array(
							'protocol' => 'smtp',
							'smtp_crypto' => 'ssl',
							'smtp_host' => $email_data['smtp_host'],
							'smtp_port' => $email_data['smtp_port'],
							'smtp_user' => $email_data['smtp_username'],
							'smtp_pass' => $email_data['smtp_password'],
							'mailtype'  => 'html', 
							'charset'   => 'utf-8'
						);
					}
					else
					{
						$config = array(
							'protocol' => 'smtp',
							'smtp_crypto' => 'tls',
							'smtp_host' => $email_data['smtp_host'],
							'smtp_port' => $email_data['smtp_port'],
							'smtp_user' => $email_data['smtp_username'],
							'smtp_pass' => $email_data['smtp_password'],
							'mailtype'  => 'html', 
							'charset'   => 'utf-8'
						);  
					}
					$this->load->library('email', $config);
				} else {
					$this->load->library('email');
				}

				$this->email->reply_to($email_data['receive_email_to']);
				$this->email->from($email_data['send_email_from']);
				$this->email->to($_SESSION['email']);

				$subject = 'Ticket Purchase Completed';
				$this->email->subject($subject);
				$this->email->message($msg);

				$this->email->set_mailtype("html");

				$this->email->send();

				unset($_SESSION['ticket_id']);
				unset($_SESSION['first_name']);
				unset($_SESSION['last_name']);
				unset($_SESSION['email']);
				unset($_SESSION['phone']);
				unset($_SESSION['country']);
				unset($_SESSION['address']);
				unset($_SESSION['state']);
				unset($_SESSION['city']);
				unset($_SESSION['zip']);
				unset($_SESSION['website']);
				unset($_SESSION['want_to_be_listed']);

				redirect(base_url().'tickets/payment-success');

			}

		}
	}


	public function payment_success()
	{
		$this->load->view('payment-success');
	}

	public function payment_cancel()
	{
		$this->load->view('payment-cancel');
	}

	public function view()
	{
		$data['banner_tickets'] = $this->Tickets_model->banner_tickets();

		if(isset($_POST['form1']))
		{
			$valid = 1;
			
			$ticket_no = $this->input->post('ticket_no', true);

			if($ticket_no == '')
			{
				$valid = 0;
				$error = 'Enter a ticket no';
			}
			else
			{
				$data['ticket_detail_info'] = $this->Tickets_model->check_ticket_no($ticket_no);
				if(!$data['ticket_detail_info'])
				{
					$valid = 0;
					$error = 'Invalid Ticket No';
				}
			}

			if($valid == 1)
			{
				$this->load->view('ticket-single-view',$data);
			}
			else
			{
				$this->session->set_flashdata('error',$error);
				redirect(base_url().'tickets/view');
			}
		}
		else
		{
			$this->load->view('ticket-single-view',$data);
		}
	}
}