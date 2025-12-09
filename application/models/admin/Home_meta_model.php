<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_meta_model extends CI_Model 
{
    function show_home_meta()
    {
        $sql = "SELECT * FROM tbl_home WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_home_meta($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_home',$data);
    }
}