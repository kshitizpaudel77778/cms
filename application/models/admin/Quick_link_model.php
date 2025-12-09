<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quick_link_model extends CI_Model 
{

    function show_quick_link()
    {
        $sql = "SELECT * FROM tbl_quick_link WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_quick_link($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_quick_link',$data);
    }
  
}