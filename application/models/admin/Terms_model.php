<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_model extends CI_Model 
{
    function show_terms()
    {
        $sql = "SELECT * FROM tbl_terms WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_terms($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_terms',$data);
    }
 
}