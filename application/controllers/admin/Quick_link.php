<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quick_link extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Quick_link_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		$data['quick_link'] = $this->Quick_link_model->show_quick_link();

		if(isset($_POST['form1']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$title1 = secure_data($this->input->post('title1', true));
			$current_photo = secure_data($this->input->post('current_photo', true));

			if($title1 == '')
			{
				$valid = 0;
		        $error .= 'Title can not be empty<br>';
			}
			
			$path = $_FILES['icon1']['name'];
		    $path_tmp = $_FILES['icon1']['tmp_name'];

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
		    	if($path == '')
		    	{
		    		$form_data = array(
						'title1' => $title1
		            );
		            $this->Quick_link_model->update_quick_link($form_data);
		    	}
		    	else
		    	{
		    		unlink('./public/uploads/'.$current_photo);	    		

	    			if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'icon1.'.$ext;
		        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data = array(
		    			'title1' => $title1,
						'icon1' => $final_name
		            );
		            $this->Quick_link_model->update_quick_link($form_data);
		    	}
				
				$success = 'Icon 1 is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/quick-link');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/quick-link');
		    }
		}

		if(isset($_POST['form2']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$title2 = secure_data($this->input->post('title2', true));
			$current_photo = secure_data($this->input->post('current_photo', true));
			
			if($title2 == '')
			{
				$valid = 0;
		        $error .= 'Title can not be empty<br>';
			}

			$path = $_FILES['icon2']['name'];
		    $path_tmp = $_FILES['icon2']['tmp_name'];

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
	    		if($path == '')
		    	{
		    		$form_data = array(
						'title2' => $title2
		            );
		            $this->Quick_link_model->update_quick_link($form_data);
		    	}
		    	else
		    	{
		    		unlink('./public/uploads/'.$current_photo);	    		

	    			if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'icon2.'.$ext;
		        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data = array(
		    			'title2' => $title2,
						'icon2' => $final_name
		            );
		            $this->Quick_link_model->update_quick_link($form_data);
		    	}
				
				$success = 'Icon 2 is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/quick-link');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/quick-link');
		    }
		}

		if(isset($_POST['form3']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$valid = 1;

			$title3 = secure_data($this->input->post('title3', true));
			$current_photo = secure_data($this->input->post('current_photo', true));
			
			if($title3 == '')
			{
				$valid = 0;
		        $error .= 'Title can not be empty<br>';
			}

			$path = $_FILES['icon3']['name'];
		    $path_tmp = $_FILES['icon3']['tmp_name'];

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
	    		if($path == '')
		    	{
		    		$form_data = array(
						'title3' => $title3
		            );
		            $this->Quick_link_model->update_quick_link($form_data);
		    	}
		    	else
		    	{
		    		unlink('./public/uploads/'.$current_photo);	    		

	    			if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'icon3.'.$ext;
		        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data = array(
		    			'title3' => $title3,
						'icon3' => $final_name
		            );
		            $this->Quick_link_model->update_quick_link($form_data);
		    	}
				
				$success = 'Icon 3 is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/quick-link');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/quick-link');
		    }
		}
		else
		{
			$this->load->view('admin/quick_link',$data);
		}
	}

}