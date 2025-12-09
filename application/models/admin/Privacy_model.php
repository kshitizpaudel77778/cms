<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_model extends CI_Model 
{
    function show_privacy()
    {
        $sql = "SELECT * FROM tbl_privacy WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_privacy($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_privacy',$data);
    }
 
}