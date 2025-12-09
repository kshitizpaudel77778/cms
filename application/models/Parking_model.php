<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parking_model extends CI_Model 
{
    public function parking_description()
    {
        $query = $this->db->query("SELECT * FROM tbl_parking_description WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function parking_place_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_parking_place ORDER BY parking_place_id ASC");
        return $query->result_array();
    }

    public function banner_parking()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[6]);
        return $query->first_row('array');
    }

}