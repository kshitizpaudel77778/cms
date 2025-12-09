<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_model extends CI_Model 
{
    public function terms_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_terms WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function banner_terms()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[23]);
        return $query->first_row('array');
    }

}