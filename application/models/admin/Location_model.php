<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model 
{
    function show_location()
    {
        $sql = "SELECT * FROM tbl_location WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_location($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_location',$data);
    }
 
}