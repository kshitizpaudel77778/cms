<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model 
{

    function show_welcome()
    {
        $sql = "SELECT * FROM tbl_welcome WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_welcome($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_welcome',$data);
    }
 
}