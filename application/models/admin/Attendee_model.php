<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendee_model extends CI_Model 
{
    function show_attendee_page_info()
    {
        $sql = "SELECT * FROM tbl_attendee_page_info WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_attendee_page_info($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_attendee_page_info',$data);
    }
    function show_attendee_all()
    {
        $sql = "SELECT * FROM tbl_attendee ORDER BY att_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_attendee($data) 
    {
        $this->db->insert('tbl_attendee',$data);
        return $this->db->insert_id();
    }
    function attendee_check($att_id)
    {
        $sql = "SELECT * FROM tbl_attendee WHERE att_id=?";
        $query = $this->db->query($sql,[$att_id]);
        return $query->num_rows();
    }
    function delete_attendee($att_id)
    {
        $this->db->where('att_id',$att_id);
        $this->db->delete('tbl_attendee');
    }
    function ticket_all()
    {
        $sql = "SELECT * FROM tbl_ticket ORDER BY ticket_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_detail_by_ticket_id($ticket_id)
    {
        $sql = "SELECT * FROM tbl_ticket WHERE ticket_id=?";
        $query = $this->db->query($sql,[$ticket_id]);
        return $query->first_row('array');
    }
    function show_detail_more_by_ticket_id($ticket_id)
    {
        $sql = "SELECT * FROM tbl_ticket_detail WHERE ticket_id=?";
        $query = $this->db->query($sql,[$ticket_id]);
        return $query->result_array();
    }
    function email_exist_check($email)
    {
        $query = $this->db->query("SELECT * FROM tbl_attendee WHERE email=?",[$email]);
        return $query->num_rows();
    }
    function check_ticket_availability($ticket_id)
    {
        $query = $this->db->query("SELECT * FROM tbl_ticket WHERE ticket_id=?",[$ticket_id]);
        return $query->first_row('array');
    } 
}