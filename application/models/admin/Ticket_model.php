<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_model extends CI_Model 
{
    function show_ticket_page_info()
    {
        $sql = "SELECT * FROM tbl_ticket_page_info WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_ticket_page_info($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_ticket_page_info',$data);
    }

    function show_ticket_all()
    {
        $sql = "SELECT * FROM tbl_ticket";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_ticket($data) 
    {
        $this->db->insert('tbl_ticket',$data);
        return $this->db->insert_id();
    }
    function update_ticket($ticket_id,$data)
    {
        $this->db->where('ticket_id',$ticket_id);
        $this->db->update('tbl_ticket',$data);
    }
    function ticket_check($ticket_id)
    {
        $sql = "SELECT * FROM tbl_ticket WHERE ticket_id=?";
        $query = $this->db->query($sql,[$ticket_id]);
        return $query->num_rows();
    }
    function delete_ticket($ticket_id)
    {
        $this->db->where('ticket_id',$ticket_id);
        $this->db->delete('tbl_ticket');
    }
    function delete_ticket_detail_by_ticket($ticket_id)
    {
        $this->db->where('ticket_id',$ticket_id);
        $this->db->delete('tbl_ticket_detail');
    }


    function show_ticket_detail_all()
    {
        $sql = "SELECT * 
                FROM tbl_ticket_detail t1
                JOIN tbl_ticket t2
                ON t1.ticket_id = t2.ticket_id
                ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_ticket_detail($data) 
    {
        $this->db->insert('tbl_ticket_detail',$data);
        return $this->db->insert_id();
    }
    function update_ticket_detail($ticket_detail_id,$data)
    {
        $this->db->where('ticket_detail_id',$ticket_detail_id);
        $this->db->update('tbl_ticket_detail',$data);
    }
    function ticket_detail_check($ticket_detail_id)
    {
        $sql = "SELECT * FROM tbl_ticket_detail WHERE ticket_detail_id=?";
        $query = $this->db->query($sql,[$ticket_detail_id]);
        return $query->num_rows();
    }
    function delete_ticket_detail($ticket_detail_id)
    {
        $this->db->where('ticket_detail_id',$ticket_detail_id);
        $this->db->delete('tbl_ticket_detail');
    }

 
}