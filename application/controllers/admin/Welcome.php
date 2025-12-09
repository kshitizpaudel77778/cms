<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Welcome_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		$data['welcome'] = $this->Welcome_model->show_welcome();

		if(isset($_POST['form1']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$valid = 1;

			$title = secure_data($this->input->post('title', true));
			$subtitle = secure_data($this->input->post('subtitle', true));
			$description = secure_data($this->input->post('description', true));
			$button_text = secure_data($this->input->post('button_text', true));
			$button_url = secure_data($this->input->post('button_url', true));
			$yt_video_code = secure_data($this->input->post('yt_video_code', true));
			$current_photo = secure_data($this->input->post('current_photo', true));

			if($title == '')
			{
				$valid = 0;
				$error .= 'Title can not be empty';
			}

			if($subtitle == '')
			{
				$valid = 0;
				$error .= 'Subtitle can not be empty';
			}

			if($description == '')
			{
				$valid = 0;
				$error .= 'Description can not be empty';
			}

			if($yt_video_code == '')
			{
				$valid = 0;
				$error .= 'Youtube Video Code can not be empty';
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
						'title'         => $title,
						'subtitle'      => $subtitle,
						'description'   => $description,
						'button_text'   => $button_text,
						'button_url'    => $button_url,
						'yt_video_code' => $yt_video_code
		            );
		            $this->Welcome_model->update_welcome($form_data);
		    	}
		    	else
		    	{
			        unlink('./public/uploads/'.$current_photo);

			        if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'welcome.'.$ext;
		        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data = array(
						'photo'         => $final_name,
						'title'         => $title,
						'subtitle'      => $subtitle,
						'description'   => $description,
						'button_text'   => $button_text,
						'button_url'    => $button_url,
						'yt_video_code' => $yt_video_code
		            );
		            $this->Welcome_model->update_welcome($form_data);
		    	}	    		
				
				$success = 'Welcome Information is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/welcome');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/welcome');
		    }
		}
		else
		{
			$this->load->view('admin/welcome',$data);
		}		
	}

}