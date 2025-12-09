<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends CI_Model 
{
    public function language_data()
    {
        $query = $this->db->query("SELECT * FROM tbl_language");
        return $query->result_array();
    }
}