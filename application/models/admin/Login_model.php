<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model 
{
	function check_email($email) 
	{
        $where = array(
			'email' => $email
		);
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
    }
}