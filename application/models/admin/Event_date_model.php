<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_date_model extends CI_Model 
{
    function show_event_date_all()
    {
        $sql = "SELECT * FROM tbl_event_date ORDER BY ed_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_event_date($data) 
    {
        $this->db->insert('tbl_event_date',$data);
        return $this->db->insert_id();
    }
    function update_event_date($id,$data)
    {
        $this->db->where('ed_id',$id);
        $this->db->update('tbl_event_date',$data);
    }
    function event_date_check($id)
    {
        $sql = "SELECT * FROM tbl_event_date WHERE ed_id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->num_rows();
    }
    function delete_event_date($id)
    {
        $this->db->where('ed_id',$id);
        $this->db->delete('tbl_event_date');
    }
    function delete_event($id)
    {
        $this->db->where('ed_id',$id);
        $this->db->delete('tbl_event');
    }
 
}