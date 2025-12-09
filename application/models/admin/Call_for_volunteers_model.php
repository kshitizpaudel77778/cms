<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_for_volunteers_model extends CI_Model 
{
    function show_call_for_volunteers()
    {
        $sql = "SELECT * FROM tbl_call_for_volunteers WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_call_for_volunteers($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_call_for_volunteers',$data);
    }
 
}