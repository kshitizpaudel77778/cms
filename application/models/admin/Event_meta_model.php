<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_meta_model extends CI_Model 
{
    function show_event_meta()
    {
        $sql = "SELECT * FROM tbl_schedule WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_event_meta($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_schedule',$data);
    }
}