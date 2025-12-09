<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_for_sponsors_model extends CI_Model 
{
    public function call_for_sponsors_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_call_for_sponsors WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function banner_call_for_sponsors()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[16]);
        return $query->first_row('array');
    }

}