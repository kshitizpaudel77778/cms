<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speaker extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Speaker_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['speaker_page_info'] = $this->Speaker_model->show_speaker_page_info();
		$data['speaker_all'] = $this->Speaker_model->show_speaker_all();
		
		if(isset($_POST['form_speaker_page_info']))
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
            $this->Speaker_model->update_speaker_page_info($form_data);
			
			$success = 'Page Information is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/speaker');
		}

		elseif(isset($_POST['form_speaker_add']))
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
			$website = $this->input->post('website', true);
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
		    	$next_id = $this->Speaker_model->get_ai_id_speaker();
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

		    	$tot_slug = $this->Speaker_model->slug_duplication_check($slug);
				if($tot_slug) {
					$slug = $slug.'-1';
				}

		        if($mime == 'image/jpeg') {$ext = 'jpg';}
		        elseif($mime == 'image/png') {$ext = 'png';}
		        elseif($mime == 'image/gif') {$ext = 'gif';}

		        $final_name = 'speaker-'.$ai_id.'.'.$ext;
	        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

	    		$form_data = array(
					'name'                 => $name,
					'slug'                 => $slug,
					'designation'          => $designation,
					'email'                => $email,
					'phone'                => $phone,
					'website'              => $website,
					'biography'            => $biography,
					'facebook'             => $facebook,
					'twitter'              => $twitter,
					'linkedin'             => $linkedin,
					'instagram'            => $instagram,
					'photo'                => $final_name,
					'seo_title'            => $seo_title,
					'seo_meta_description' => $seo_meta_description
	            );
	            $this->Speaker_model->add_speaker($form_data);
				
				$success = 'Speaker is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/speaker');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/speaker');
		    }
		}

		elseif(isset($_POST['form_speaker_update']))
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
			$website = $this->input->post('website', true);
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
		    	$data['speaker'] = $this->Speaker_model->getData($id);

		    	if($slug == '') {
		    		$temp_string = strtolower($name);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	} else {
		    		$temp_string = strtolower($slug);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	}

		    	$tot_slug = $this->Speaker_model->slug_duplication_check_edit($slug,$data['speaker']['slug']);
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
						'website'              => $website,
						'biography'            => $biography,
						'facebook'             => $facebook,
						'twitter'              => $twitter,
						'linkedin'             => $linkedin,
						'instagram'            => $instagram,
						'seo_title'            => $seo_title,
						'seo_meta_description' => $seo_meta_description
		            );
		            $this->Speaker_model->update_speaker($id,$form_data);
		    	}
		    	else
		    	{
		    		unlink('./public/uploads/'.$current_photo);

		    		if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'speaker-'.$id.'.'.$ext;
	        		move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data = array(
						'name'                 => $name,
						'slug'                 => $slug,
						'designation'          => $designation,
						'email'                => $email,
						'phone'                => $phone,
						'website'              => $website,
						'biography'            => $biography,
						'facebook'             => $facebook,
						'twitter'              => $twitter,
						'linkedin'             => $linkedin,
						'instagram'            => $instagram,
						'photo'                => $final_name,
						'seo_title'            => $seo_title,
						'seo_meta_description' => $seo_meta_description
		            );
		            $this->Speaker_model->update_speaker($id,$form_data);
		    	}
	    		
				$success = 'Speaker is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/speaker');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/speaker');
		    }
		}

		else
		{
			$this->load->view('admin/speaker',$data);
		}

	}
	
	public function delete_speaker($id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Speaker_model->speaker_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/speaker');
        	exit;
    	}

    	$speaker_row = $this->Speaker_model->speaker_single($id);
        if($speaker_row) {
            unlink('./public/uploads/'.$speaker_row['photo']);
        }

        $this->Speaker_model->delete_speaker($id);
        $success = 'Speaker is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/speaker');
	}

}