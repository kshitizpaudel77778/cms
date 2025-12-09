<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Blog_model');
    }

	public function index()
	{
		$error = '';
		$success = '';

		$data['blog_page_info'] = $this->Blog_model->show_blog_page_info();
		$data['blog_all'] = $this->Blog_model->show_blog_all();

		if(isset($_POST['form_blog_page_info']))
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
            $this->Blog_model->update_blog_page_info($form_data);
			
			$success = 'Page Information is updated successfully';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/blog');
		}
		
		elseif(isset($_POST['form_blog_add']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$title = $this->input->post('title', true);
			$slug = $this->input->post('slug', true);
			$short_description = $this->input->post('short_description', true);
			$description = $this->input->post('description', true);
			$seo_title = $this->input->post('seo_title', true);
			$seo_meta_description = $this->input->post('seo_meta_description', true);
					
			if($title == '')
			{
				$valid = 0;
		        $error .= 'Title can not be empty<br>';
			}

			if($short_description == '')
			{
				$valid = 0;
		        $error .= 'Short Description can not be empty<br>';
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

		    	$created_at = date('Y-m-d');

		    	$next_id = $this->Blog_model->get_ai_id_blog();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        if($slug == '') {
		    		$temp_string = strtolower($title);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	} else {
		    		$temp_string = strtolower($slug);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	}

		    	$tot_slug = $this->Blog_model->slug_duplication_check($slug);
				if($tot_slug) {
					$slug = $slug.'-1';
				}

		        if($mime == 'image/jpeg') {$ext = 'jpg';}
		        elseif($mime == 'image/png') {$ext = 'png';}
		        elseif($mime == 'image/gif') {$ext = 'gif';}

		        $final_name = 'blog-'.$ai_id.'.'.$ext;
	        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

	    		$form_data = array(
					'title'                => $title,
					'slug'                 => $slug,
					'short_description'    => $short_description,
					'description'          => $description,
					'created_at'           => $created_at,
					'photo'                => $final_name,
					'seo_title'            => $seo_title,
					'seo_meta_description' => $seo_meta_description
	            );
	            $this->Blog_model->add_blog($form_data);
				
				$success = 'Blog is added successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/blog');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/blog');
		    }
		}

		elseif(isset($_POST['form_blog_update']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$title = $this->input->post('title', true);
			$slug = secure_data($this->input->post('slug', true));
			$short_description = $this->input->post('short_description', true);
			$description = $this->input->post('description', true);
			$seo_title = $this->input->post('seo_title', true);
			$seo_meta_description = $this->input->post('seo_meta_description', true);
			$current_photo = $this->input->post('current_photo', true);
			$id = $this->input->post('id', true);
			
			if($title == '')
			{
				$valid = 0;
		        $error .= 'Title can not be empty<br>';
			}

			if($short_description == '')
			{
				$valid = 0;
		        $error .= 'Short Description can not be empty<br>';
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

		    	$data['blog'] = $this->Blog_model->getData($id);

		    	if($slug == '') {
		    		$temp_string = strtolower($title);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	} else {
		    		$temp_string = strtolower($slug);
		    		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
		    	}

		    	$tot_slug = $this->Blog_model->slug_duplication_check_edit($slug,$data['blog']['slug']);
				if($tot_slug) {
					$slug = $slug.'-1';
				}

		    	if($path == '')
		    	{
		    		$form_data = array(
						'title'                => $title,
						'slug'                 => $slug,
						'short_description'    => $short_description,
						'description'          => $description,
						'seo_title'            => $seo_title,
						'seo_meta_description' => $seo_meta_description
		            );
		            $this->Blog_model->update_blog($id,$form_data);
		    	}
		    	else
		    	{
		    		unlink('./public/uploads/'.$current_photo);

		    		if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'blog-'.$id.'.'.$ext;
	        		move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data = array(
						'title'                => $title,
						'slug'                 => $slug,
						'short_description'    => $short_description,
						'description'          => $description,
						'photo'                => $final_name,
						'seo_title'            => $seo_title,
						'seo_meta_description' => $seo_meta_description
		            );
		            $this->Blog_model->update_blog($id,$form_data);
		    	}	    		
	    		
				$success = 'Blog is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/blog');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/blog');
		    }
		}

		else
		{
			$this->load->view('admin/blog',$data);
		}

	}
	
	public function delete_blog($id)
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$tot = $this->Blog_model->blog_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/blog');
        	exit;
    	}

    	$blog_row = $this->Blog_model->blog_single($id);
        if($blog_row) {
            unlink('./public/uploads/'.$blog_row['photo']);
        }

        $this->Blog_model->delete_blog($id);
        $success = 'Blog is deleted successfully';
		$this->session->set_flashdata('success',$success);
		redirect(base_url().'admin/blog');
	}

}