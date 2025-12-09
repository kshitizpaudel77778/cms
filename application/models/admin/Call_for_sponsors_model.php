<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_for_sponsors_model extends CI_Model 
{
    function show_call_for_sponsors()
    {
        $sql = "SELECT * FROM tbl_call_for_sponsors WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_call_for_sponsors($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_call_for_sponsors',$data);
    }
 
}