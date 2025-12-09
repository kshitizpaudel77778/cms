<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_meta_model extends CI_Model 
{
    function show_search_meta()
    {
        $sql = "SELECT * FROM tbl_search WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_search_meta($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_search',$data);
    }
}