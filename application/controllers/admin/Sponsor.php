<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsor extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Sponsor_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['sponsor_page_info'] = $this->Sponsor_model->show_sponsor_page_info();
		$data['sponsor_category_all'] = $this->Sponsor_model->show_sponsor_category_all();
		$data['sponsor_all'] = $this->Sponsor_model->show_sponsor_all();
		
		if(isset($_POST['form_sponsor_page_info']))
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
            $this->Sponsor_model->update_sponsor_page_info($form_data);
			
			$success = 'Page Information is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/sponsor');
		}

		elseif(isset($_POST['form_sponsor_category_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$sponsor_category_name = $this->input->post('sponsor_category_name', true);
			
			if($sponsor_category_name == '')
			{
				$valid = 0;
		        $error .= 'Sponsor Category Name can not be empty<br>';
			}
          
		    if($valid == 1)
		    {
	    		$form_data = array(
	    			'sponsor_category_name' => $sponsor_category_name
	            );
	            $this->Sponsor_model->add_sponsor_category($form_data);
				
				$success = 'Sponsor Category is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/sponsor');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/sponsor');
		    }
		}

		elseif(isset($_POST['form_sponsor_category_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$sponsor_category_name = $this->input->post('sponsor_category_name', true);
			$sponsor_category_id = $this->input->post('sponsor_category_id', true);
			
			if($sponsor_category_name == '')
			{
				$valid = 0;
		        $error .= 'Sponsor Category Name can not be empty<br>';
			}
           
		    if($valid == 1)
		    {		    	
	    		$form_data = array(
					'sponsor_category_name' => $sponsor_category_name
	            );
	            $this->Sponsor_model->update_sponsor_category($sponsor_category_id,$form_data);
	    		
				$success = 'Sponsor Category is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/sponsor');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/sponsor');
		    }
		}


		elseif(isset($_POST['form_sponsor_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$sponsor_url = $this->input->post('sponsor_url', true);
			$sponsor_category_id = $this->input->post('sponsor_category_id', true);
			
			$path = $_FILES['sponsor_photo']['name'];
		    $path_tmp = $_FILES['sponsor_photo']['tmp_name'];

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
		    	$next_id = $this->Sponsor_model->get_ai_id_sponsor();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        if($mime == 'image/jpeg') {$ext = 'jpg';}
		        elseif($mime == 'image/png') {$ext = 'png';}
		        elseif($mime == 'image/gif') {$ext = 'gif';}

		        $final_name = 'sponsor-'.$ai_id.'.'.$ext;
	        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

	    		$form_data = array(
	    			'sponsor_url' => $sponsor_url,
	    			'sponsor_photo' => $final_name,
	    			'sponsor_category_id' => $sponsor_category_id
	            );
	            $this->Sponsor_model->add_sponsor($form_data);
				
				$success = 'Sponsor is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/sponsor');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/sponsor');
		    }
		}

		elseif(isset($_POST['form_sponsor_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$sponsor_url = $this->input->post('sponsor_url', true);
			$sponsor_category_id = $this->input->post('sponsor_category_id', true);
			$sponsor_id = $this->input->post('sponsor_id', true);
			$current_photo = $this->input->post('current_photo', true);
			
			$path = $_FILES['sponsor_photo']['name'];
		    $path_tmp = $_FILES['sponsor_photo']['tmp_name'];

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
						'sponsor_url' => $sponsor_url,
						'sponsor_category_id' => $sponsor_category_id
		            );
		            $this->Sponsor_model->update_sponsor($sponsor_id,$form_data);
		    	}
		    	else
		    	{
		    		unlink('./public/uploads/'.$current_photo);

		    		if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'sponsor-'.$sponsor_id.'.'.$ext;
	        		move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

	        		$form_data = array(
						'sponsor_url' => $sponsor_url,
						'sponsor_photo' => $final_name,
						'sponsor_category_id' => $sponsor_category_id
		            );
		            $this->Sponsor_model->update_sponsor($sponsor_id,$form_data);
		    	}
	    			    		
				$success = 'Sponsor is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/sponsor');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/sponsor');
		    }
		}

		else
		{
			$this->load->view('admin/sponsor',$data);
		}

	}
	
	public function delete_category($sponsor_category_id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

		$tot = $this->Sponsor_model->sponsor_category_check($sponsor_category_id);
    	if(!$tot) {
    		redirect(base_url().'admin/sponsor');
        	exit;
    	}

    	// Delete sponsors from a particular category
    	$sponsors_by_category_id = $this->Sponsor_model->sponsors_by_category_id($sponsor_category_id);
    	foreach($sponsors_by_category_id as $rr)
    	{
    		unlink('./public/uploads/'.$rr['sponsor_photo']);
    	}

        $this->Sponsor_model->delete_sponsor_category($sponsor_category_id);
        $this->Sponsor_model->delete_sponsor_by_category($sponsor_category_id);

        $success = 'Sponsor Category is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/sponsor');
	}

	public function delete_sponsor($sponsor_id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Sponsor_model->sponsor_check($sponsor_id);
    	if(!$tot) {
    		redirect(base_url().'admin/sponsor');
        	exit;
    	}

    	$sponsor_single = $this->Sponsor_model->sponsor_single($sponsor_id);
    	unlink('./public/uploads/'.$sponsor_single['sponsor_photo']);

        $this->Sponsor_model->delete_sponsor($sponsor_id);

        $success = 'Sponsor is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/sponsor');
	}

}