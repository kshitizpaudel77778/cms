<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model 
{
    public function about_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_about WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function banner_about()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[1]);
        return $query->first_row('array');
    }

}