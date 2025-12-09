<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_media_model extends CI_Model 
{
    public function get_data()
    {
        $query = $this->db->query("SELECT * FROM tbl_social_media ORDER BY id ASC");
        return $query->result_array();
    }

}