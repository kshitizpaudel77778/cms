<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code_of_conduct_model extends CI_Model 
{
    public function code_of_conduct_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_code_of_conduct WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function banner_code_of_conduct()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[8]);
        return $query->first_row('array');
    }

}