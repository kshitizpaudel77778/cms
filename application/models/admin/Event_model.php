<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model 
{
    function show_event_all()
    {
        $sql = "SELECT * 
                FROM tbl_event t1
                JOIN tbl_event_date t2
                ON t1.ed_id = t2.ed_id
                JOIN tbl_speaker t3
                ON t1.speaker_id = t3.id
                ORDER BY t1.e_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_event($data) 
    {
        $this->db->insert('tbl_event',$data);
        return $this->db->insert_id();
    }
    function update_event($id,$data)
    {
        $this->db->where('e_id',$id);
        $this->db->update('tbl_event',$data);
    }
    function event_check($id)
    {
        $sql = "SELECT * FROM tbl_event WHERE e_id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->num_rows();
    }
    function delete_event($id)
    {
        $this->db->where('e_id',$id);
        $this->db->delete('tbl_event');
    }
    
    function all_event_date()
    {
        $sql = "SELECT * FROM tbl_event_date ORDER BY ed_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function all_speaker()
    {
        $sql = "SELECT * FROM tbl_speaker ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}