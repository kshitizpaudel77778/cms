<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_for_volunteers_model extends CI_Model 
{
    public function call_for_volunteers_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_call_for_volunteers WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function banner_call_for_volunteers()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[9]);
        return $query->first_row('array');
    }

}