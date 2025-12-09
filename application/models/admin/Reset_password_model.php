<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password_model extends CI_Model 
{
    public function show_setting_email()
    {
        $sql = "SELECT * FROM tbl_setting_email WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }

    function check_url($email,$token) 
    {
        $sql = "SELECT * FROM tbl_user WHERE email=? AND token=?";
        $query = $this->db->query($sql,[$email,$token]);
        return $query->first_row('array');
    }

    function update($email,$data)
    {
        $this->db->where('email',$email);
        $this->db->update('tbl_user',$data);
    }
}