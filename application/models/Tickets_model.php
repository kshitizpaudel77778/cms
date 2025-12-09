<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets_model extends CI_Model 
{
    function get_agree_text()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_ticket WHERE id=?",[1]);
        return $query->first_row('array');
    }
    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_ticket_page_info WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function ticket_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_ticket ORDER BY ticket_id ASC");
        return $query->result_array();
    }

    public function banner_tickets()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[17]);
        return $query->first_row('array');
    }

    public function get_ticket_detail($ticket_id)
    {
        $query = $this->db->query("SELECT * FROM tbl_ticket_detail WHERE ticket_id=?",[$ticket_id]);
        return $query->result_array();
    }

    public function get_ticket_detail_av($ticket_id)
    {
        $query = $this->db->query("SELECT * FROM tbl_ticket_detail WHERE ticket_detail_available=? AND ticket_id=?",['Yes',$ticket_id]);
        return $query->result_array();
    }

    public function get_ticket_detail_not_av($ticket_id)
    {
        $query = $this->db->query("SELECT * FROM tbl_ticket_detail WHERE ticket_detail_available=? AND ticket_id=?",['No',$ticket_id]);
        return $query->result_array();
    }

    public function get_detail_by_ticket_id($ticket_id)
    {
        $query = $this->db->query("SELECT * FROM tbl_ticket WHERE ticket_id=?",[$ticket_id]);
        return $query->first_row('array');
    }

    function add_attendee($data) 
    {
        $this->db->insert('tbl_attendee',$data);
        return $this->db->insert_id();
    }

    function payment_data()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_payment WHERE id=?",[1]);
        return $query->first_row('array');
    }

    function email_data()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_email WHERE id=?",[1]);
        return $query->first_row('array');
    }

    function email_exist_check($email)
    {
        $query = $this->db->query("SELECT * FROM tbl_attendee WHERE email=?",[$email]);
        return $query->num_rows();
    }

    function logo()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_logo WHERE id=?",[1]);
        return $query->first_row('array');
    }

    function check_ticket_no($ticket_no)
    {
        $query = $this->db->query("SELECT * FROM tbl_attendee WHERE ticket_no=?",[$ticket_no]);
        return $query->first_row('array');
    }

    function get_ticket_table_data($ticket_id)
    {
        $query = $this->db->query("SELECT * FROM tbl_ticket WHERE ticket_id=?",[$ticket_id]);
        return $query->first_row('array');
    }

    function update_ticket_table($ticket_id,$data)
    {
        $this->db->where('ticket_id',$ticket_id);
        $this->db->update('tbl_ticket',$data);
    }

    function check_ticket_sold($ticket_id)
    {
        $query = $this->db->query("SELECT * FROM tbl_ticket WHERE ticket_id=?",[$ticket_id]);
        return $query->first_row('array');
    }

}