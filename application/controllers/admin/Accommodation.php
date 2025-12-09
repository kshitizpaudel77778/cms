<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accommodation extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Accommodation_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['accommodation_page_info'] = $this->Accommodation_model->show_accommodation_page_info();
		$data['accommodation_all'] = $this->Accommodation_model->show_accommodation_all();
		
		if(isset($_POST['form_accommodation_page_info']))
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
            $this->Accommodation_model->update_accommodation_page_info($form_data);
			
			$success = 'Page Information is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/accommodation');
		}

		elseif(isset($_POST['form_accommodation_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$name = $this->input->post('name', true);
			$description = $this->input->post('description', true);
			
			if($name == '')
			{
				$valid = 0;
		        $error .= 'Name can not be empty<br>';
			}

			if($description == '')
			{
				$valid = 0;
		        $error .= 'Description can not be empty<br>';
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
		    	$next_id = $this->Accommodation_model->get_ai_id_accommodation();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        if($mime == 'image/jpeg') {$ext = 'jpg';}
		        elseif($mime == 'image/png') {$ext = 'png';}
		        elseif($mime == 'image/gif') {$ext = 'gif';}

		        $final_name = 'accommodation-'.$ai_id.'.'.$ext;
	        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

	    		$form_data = array(
					'name'        => $name,
					'description' => $description,
					'photo'       => $final_name
	            );
	            $this->Accommodation_model->add_accommodation($form_data);
				
				$success = 'Accommodation is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/accommodation');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/accommodation');
		    }
		}

		elseif(isset($_POST['form_accommodation_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$name = $this->input->post('name', true);
			$description = $this->input->post('description', true);
			$current_photo = $this->input->post('current_photo', true);
			$id = $this->input->post('id', true);
			
			if($name == '')
			{
				$valid = 0;
		        $error .= 'Name can not be empty<br>';
			}

			if($description == '')
			{
				$valid = 0;
		        $error .= 'Description can not be empty<br>';
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
		    	if($path == '')
		    	{
		    		$form_data = array(
						'name'        => $name,
						'description' => $description
		            );
		            $this->Accommodation_model->update_accommodation($id,$form_data);
		    	}
		    	else
		    	{
		    		unlink('./public/uploads/'.$current_photo);

		    		if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'accommodation-'.$id.'.'.$ext;
	        		move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data = array(
						'name'        => $name,
						'description' => $description,
						'photo'       => $final_name
		            );
		            $this->Accommodation_model->update_accommodation($id,$form_data);
		    	}
	    		
				$success = 'Accommodation is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/accommodation');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/accommodation');
		    }
		}

		else
		{
			$this->load->view('admin/accommodation',$data);
		}

	}
	
	public function delete_accommodation($id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Accommodation_model->accommodation_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/accommodation');
        	exit;
    	}

    	$accommodation_row = $this->Accommodation_model->accommodation_single($id);
        if($accommodation_row) {
            unlink('./public/uploads/'.$accommodation_row['photo']);
        }

        $this->Accommodation_model->delete_accommodation($id);
        $success = 'Accommodation is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/accommodation');
	}

}