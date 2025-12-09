<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Admin_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['admin_all'] = $this->Admin_model->show_admin_all();
	
		if(isset($_POST['form_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$full_name = $this->input->post('full_name', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);
			$status = $this->input->post('status', true);

			$password = password_hash($password, PASSWORD_DEFAULT);
					
			if($full_name == '') {
				$valid = 0;
		        $error .= 'Name can not be empty<br>';
			}

			if($email == '') {
                $valid = 0;
                $error .= 'Email address can not be empty<br>';
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $valid = 0;
                    $error .= 'Email address is not valid<br>';
                } else {
                    $tot = $this->Admin_model->check_email($email);
                    if($tot) {
                        $valid = 0;
                        $error .= 'Email already exists<br>';
                    }
                }
            }

			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];

			if($path != '')
		    {
		        $finfo = finfo_open(FILEINFO_MIME_TYPE);
		        $mime = finfo_file($finfo, $path_tmp);
		        if( $mime != 'image/jpeg' && $mime != 'image/png' && $mime != 'image/gif' )
		        {
		            $valid = 0;
		            $error .= 'Invalid photo type<br>';
		        }
		    }
		    else
		    {
		    	$valid = 0;
		        $error .= 'You must have to select a photo<br>';
		    }
            
		    if($valid == 1)
		    {
		    	$next_id = $this->Admin_model->get_ai_id();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        if($mime == 'image/jpeg') {$ext = 'jpg';}
		        elseif($mime == 'image/png') {$ext = 'png';}
		        elseif($mime == 'image/gif') {$ext = 'gif';}

		        $final_name = 'user-'.$ai_id.'.'.$ext;
	        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

	        	$form_data = array(
					'full_name' => $full_name,
					'email' => $email,
					'password' => $password,
					'photo' => $final_name,
					'token' => '',
					'role' => 'Admin',
					'status' => 'Active'
	            );
	            $this->Admin_model->add($form_data);
				
				$success = 'Admin is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/admin');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/admin');
		    }
		}

		elseif(isset($_POST['form_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$full_name = $this->input->post('full_name', true);
			$email = secure_data($this->input->post('email', true));
			$password = $this->input->post('password', true);
			$current_photo = $this->input->post('current_photo', true);
			$id = $this->input->post('id', true);

			$existing_data = $this->Admin_model->getData($id);
			
			if($full_name == '') {
				$valid = 0;
		        $error .= 'Name can not be empty<br>';
			}

			if($email == '') {
                $valid = 0;
                $error .= 'Email address can not be empty<br>';
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $valid = 0;
                    $error .= 'Email address is not valid<br>';
                } else {
                    $tot = $this->Admin_model->check_email_during_edit($email,$existing_data['email']);
                    if($tot) {
                        $valid = 0;
                        $error .= 'Email already exists<br>';
                    }
                }
            }

			if($password != '') {
				$form_data['password'] = password_hash($password, PASSWORD_DEFAULT);
			}

			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];

			if($path != '')
		    {
		        $finfo = finfo_open(FILEINFO_MIME_TYPE);
		        $mime = finfo_file($finfo, $path_tmp);
		        if( $mime != 'image/jpeg' && $mime != 'image/png' && $mime != 'image/gif' )
		        {
		            $valid = 0;
		            $error .= 'Invalid photo type<br>';
		        }
		    }
            
		    if($valid == 1) 
		    {
		    	if($path == '') {
		    		$form_data['full_name'] = $full_name;
		    		$form_data['email'] = $email;
		            $this->Admin_model->update($id,$form_data);
		    	} else {
		    		unlink('./public/uploads/'.$current_photo);

		    		if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'user-'.$id.'.'.$ext;
	        		move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data['full_name'] = $full_name;
		    		$form_data['email'] = $email;
		    		$form_data['photo'] = $final_name;
		            $this->Admin_model->update($id,$form_data);
		    	}	    		
	    		
				$success = 'Admin is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/admin');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/admin');
		    }
		}

		else
		{
			$this->load->view('admin/admin',$data);
		}

	}
	
	public function delete($id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
    	$item_row = $this->Admin_model->admin_single($id);
        if($item_row) {
            unlink('./public/uploads/'.$item_row['photo']);
        }

        $this->Admin_model->delete($id);
        $success = 'Admin is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/admin');
	}

}