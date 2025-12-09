<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model 
{
    public function location_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_location WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function banner_location()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[7]);
        return $query->first_row('array');
    }

}