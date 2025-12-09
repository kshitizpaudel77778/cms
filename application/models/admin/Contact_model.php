<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model 
{
    function show_contact()
    {
        $sql = "SELECT * FROM tbl_contact WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_contact($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_contact',$data);
    }
 
}