<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Copyright_model extends CI_Model 
{
    public function get_row_data()
    {
        $query = $this->db->query("SELECT * FROM tbl_copyright WHERE id=?",[1]);
        return $query->first_row('array');
    }

}