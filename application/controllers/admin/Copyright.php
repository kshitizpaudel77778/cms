<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Copyright extends MY_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Copyright_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		$data['setting'] = '';
		$data['copyright'] = $this->Copyright_model->show_copyright();

		if(isset($_POST['form1']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$valid = 1;

			$copyright_text = $this->input->post('copyright_text', true);
			
			if($copyright_text=='')
			{
				$valid = 0;
				$error .= 'Copyright Text can not be empty<br>';
			}
          
		    if($valid == 1) 
		    {
				$form_data = array(
					'copyright_text' => $copyright_text
	            );
	            $this->Copyright_model->update_copyright($form_data);
				
				$success = 'Copyright Information is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/copyright');
		    }
		    else 
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/copyright');
		    }         
		}
		else
		{
			$this->load->view('admin/copyright',$data);
		}		
	}
}