<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accommodations_model extends CI_Model 
{
    public function accommodations_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_accommodation ORDER BY id ASC");
        return $query->result_array();
    }

    public function banner_accommodations()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[5]);
        return $query->first_row('array');
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_accommodation_page_info WHERE id=?",[1]);
        return $query->first_row('array');
    }

}