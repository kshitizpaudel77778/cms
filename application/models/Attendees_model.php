<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendees_model extends CI_Model 
{
    public function attendees_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_attendee WHERE want_to_be_listed=?",['Yes']);
        return $query->result_array();
    }

    public function banner_attendees()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[4]);
        return $query->first_row('array');
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_attendee_page_info WHERE id=?",[1]);
        return $query->first_row('array');
    }

}