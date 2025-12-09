<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget_password_model extends CI_Model 
{
	function show_setting_email()
    {
        $sql = "SELECT * FROM tbl_setting_email WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }

    function check_email($email)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function update($email,$data) {
        $this->db->where('email',$email);
        $this->db->update('tbl_user',$data);
    }
}