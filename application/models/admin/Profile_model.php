<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model 
{
    function show_profile()
    {
        $sql = "SELECT * FROM tbl_user WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_profile($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_user',$data);
    }
    function check_email_during_edit($email,$email1) {
        $sql = "SELECT * FROM tbl_user WHERE email=? and email!=?";
        $query = $this->db->query($sql,[$email,$email1]);
        return $query->first_row('array');
    }
 
}