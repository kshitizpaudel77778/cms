<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizers_model extends CI_Model 
{
    public function organizer_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_organizer ORDER BY id ASC");
        return $query->result_array();
    }

    public function banner_organizers()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[2]);
        return $query->first_row('array');
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_organizer_page_info WHERE id=?",[1]);
        return $query->first_row('array');
    }

}