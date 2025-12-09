<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Newsletter_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		$data['newsletter'] = $this->Newsletter_model->show_newsletter();

		if(isset($_POST['form1']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$valid = 1;

			$title = secure_data($this->input->post('title', true));
			$text = secure_data($this->input->post('text', true));
			$current_background_photo = secure_data($this->input->post('current_background_photo', true));

			$path = $_FILES['background_photo']['name'];
		    $path_tmp = $_FILES['background_photo']['tmp_name'];

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
						'title' => $title,
						'text'  => $text
		            );
		            $this->Newsletter_model->update_newsletter($form_data);
		    	}
		    	else
		    	{
			        unlink('./public/uploads/'.$current_background_photo);

			        if($mime == 'image/jpeg') {$ext = 'jpg';}
			        elseif($mime == 'image/png') {$ext = 'png';}
			        elseif($mime == 'image/gif') {$ext = 'gif';}

			        $final_name = 'newsletter.'.$ext;
		        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		    		$form_data = array(
						'background_photo' => $final_name,
						'title'            => $title,
						'text'             => $text
		            );
		            $this->Newsletter_model->update_newsletter($form_data);
		    	}	    		
				
				$success = 'Newsletter Information is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/newsletter');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/newsletter');
		    }
		}
		else
		{
			$this->load->view('admin/newsletter',$data);
		}		
	}

}