<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizer extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Organizer_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['organizer_page_info'] = $this->Organizer_model->show_organizer_page_info();
		$data['organizer_all'] = $this->Organizer_model->show_organizer_all();
		
		if(isset($_POST['form_organizer_page_info']))
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
            $this->Organizer_model->update_organizer_page_info($form_data);
			
			$success = 'Page Information is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/organizer');
		}

		elseif(isset($_POST['form_organizer_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$name = $this->input->post('name', true);
			$slug = $this->input->post('slug', true);
			$designation = $this->input->post('designation', true);
			$email = $this->input->post('email', true);
			$phone = $this->input->post('phone', true);
			$biography = $this->input->post('biography', true);
			$facebook = $this->input->post('facebook', true);
			$twitter = $this->input->post('twitter', true);
			$linkedin = $this->input->post('linkedin', true);
			$instagram = $this->input->post('instagram', true);
			$seo_title = $this->input->post('seo_title', true);
			$seo_meta_description = $this->input->post('seo_meta_description', true);
			
			if($name == '')
			{
				$valid = 0;
		        $error .= 'Name can not be empty<br>';
			}

			if($designation == '')
			{
				$valid = 0;
		        $error .= 'Designation can not be empty<br>';
			}

			if($email == '')
			{
				$valid = 0;
		        $error .= 'Email can not be empty<br>';
			}

			if($phone == '')
			{
				$valid = 0;
		        $error .= 'Phone can not be empty<br>';
			}

			if($biography == '')
			{
				$valid = 0;
		        $error .= 'Biography can not be empty<br>';
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
		    	$next_id = $this->Organizer_model->get_ai_id_organizer();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        if($slug == '') {
		    		$temp_string = strtolower($name);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	} else {
		    		$temp_string = strtolower($slug);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	}

		    	$tot_slug = $this->Organizer_model->slug_duplication_check($slug);
				if($tot_slug) {
					$slug = $slug.'-1';
				}

		        if($mime == 'image/jpeg') {$ext = 'jpg';}
		        elseif($mime == 'image/png') {$ext = 'png';}
		        elseif($mime == 'image/gif') {$ext = 'gif';}

		        $final_name = 'organizer-'.$ai_id.'.'.$ext;
	        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

	    		$form_data = array(
					'name'                 => $name,
					'slug'                 => $slug,
					'designation'          => $designation,
					'email'                => $email,
					'phone'                => $phone,
					'biography'            => $biography,
					'facebook'             => $facebook,
					'twitter'              => $twitter,
					'linkedin'             => $linkedin,
					'instagram'            => $instagram,
					'photo'                => $final_name,
					'seo_title'            => $seo_title,
					'seo_meta_description' => $seo_meta_description
	            );
	            $this->Organizer_model->add_organizer($form_data);
				
				$success = 'Organizer is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/organizer');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/organizer');
		    }
		}

		elseif(isset($_POST['form_organizer_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$name = $this->input->post('name', true);
			$slug = $this->input->post('slug', true);
			$designation = $this->input->post('designation', true);
			$email = $this->input->post('email', true);
			$phone = $this->input->post('phone', true);
			$biography = $this->input->post('biography', true);
			$facebook = $this->input->post('facebook', true);
			$twitter = $this->input->post('twitter', true);
			$linkedin = $this->input->post('linkedin', true);
			$instagram = $this->input->post('instagram', true);
			$current_photo = $this->input->post('current_photo', true);
			$seo_title = $this->input->post('seo_title', true);
			$seo_meta_description = $this->input->post('seo_meta_description', true);
			$id = $this->input->post('id', true);
			
			if($name == '')
			{
				$valid = 0;
		        $error .= 'Name can not be empty<br>';
			}

			if($designation == '')
			{
				$valid = 0;
		        $error .= 'Designation can not be empty<br>';
			}

			if($email == '')
			{
				$valid = 0;
		        $error .= 'Email can not be empty<br>';
			}

			if($phone == '')
			{
				$valid = 0;
		        $error .= 'Phone can not be empty<br>';
			}

			if($biography == '')
			{
				$valid = 0;
		        $error .= 'Biography can not be empty<br>';
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
		    	$data['organizer'] = $this->Organizer_model->getData($id);

		    	if($slug == '') {
		    		$temp_string = strtolower($name);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	} else {
		    		$temp_string = strtolower($slug);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	}

		    	$tot_slug = $this->Organizer_model->slug_duplication_check_edit($slug,$data['organizer']['slug']);
				if($tot_slug) {
					$slug = $slug.'-1';
				}

		    	if($path == '')
		    	{
		    		$form_data = array(
						'name'                 => $name,
						'slug'                 => $slug,
						'designation'          => $designation,
						'email'                => $email,
						'phone'                => $phone,
						'biography'            => $biography,
						'facebook'             => $facebook,
						'twitter'              => $twitter,
						'linkedin'             => $linkedin,
						'instagram'            => $instagram,
						'seo_title'            => $seo_title,
						'seo_meta_description' => $seo_meta_description
		            );
		            $this->Organizer_model->update_organizer($id,$form_data);
		    	}
		    	else
		    	{
		    		unlink('./public/uploads/'.$current_photo);

		    		if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'organizer-'.$id.'.'.$ext;
	        		move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data = array(
						'name'                 => $name,
						'slug'                 => $slug,
						'designation'          => $designation,
						'email'                => $email,
						'phone'                => $phone,
						'biography'            => $biography,
						'facebook'             => $facebook,
						'twitter'              => $twitter,
						'linkedin'             => $linkedin,
						'instagram'            => $instagram,
						'photo'                => $final_name,
						'seo_title'            => $seo_title,
						'seo_meta_description' => $seo_meta_description
		            );
		            $this->Organizer_model->update_organizer($id,$form_data);
		    	}
	    		
				$success = 'Organizer is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/organizer');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/organizer');
		    }
		}

		else
		{
			$this->load->view('admin/organizer',$data);
		}

	}
	
	public function delete_organizer($id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Organizer_model->organizer_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/organizer');
        	exit;
    	}

    	$organizer_row = $this->Organizer_model->organizer_single($id);
        if($organizer_row) {
            unlink('./public/uploads/'.$organizer_row['photo']);
        }

        $this->Organizer_model->delete_organizer($id);
        $success = 'Organizer is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/organizer');
	}

}