<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Copyright_model extends CI_Model 
{
    function show_copyright()
    {
        $sql = "SELECT * FROM tbl_copyright WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_copyright($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_copyright',$data);
    }
 
}