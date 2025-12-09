<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Common_model');
        $this->load->model('admin/Language_model');
    }

	public function index()
	{
		$error = '';
		$success = '';
		
		$data['language'] = $this->Language_model->show_data();

		if(isset($_POST['form1']))
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$new_arr = $this->input->post('new_arr', true);
			$new_arr1 = $this->input->post('new_arr1', true);

			foreach ($new_arr as $val) {
				$new_arr2[] = $val;
			}

			foreach ($new_arr1 as $val) {
				$new_arr3[] = $val;
			}

			for($i=0;$i<count($new_arr2);$i++) {
				$form_data = array(
					'value' => $new_arr2[$i]
	            );
	            $this->Language_model->update($new_arr3[$i],$form_data);
			}
           
		    $success = 'Language data is updated successfully';
	       	$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/language');
		}
		else
		{
			$this->load->view('admin/language',$data);
		}		
	}
}