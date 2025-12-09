<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_model extends CI_Model 
{
    public function privacy_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_privacy WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function banner_privacy()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[22]);
        return $query->first_row('array');
    }

}