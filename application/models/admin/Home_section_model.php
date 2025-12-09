<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_section_model extends CI_Model 
{
    function show_home_section()
    {
        $sql = "SELECT * FROM tbl_home_section";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function update_home_section($section_name,$data)
    {
        $this->db->where('section_name',$section_name);
        $this->db->update('tbl_home_section',$data);
    }
}