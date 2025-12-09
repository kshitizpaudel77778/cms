<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model 
{
    function total_attendee()
    {
        $sql = "SELECT * FROM tbl_attendee WHERE payment_status=?";
        $query = $this->db->query($sql,['Completed']);
        return $query->num_rows();
    }

    function total_subscriber()
    {
        $sql = "SELECT * FROM tbl_subscriber WHERE subs_active=?";
        $query = $this->db->query($sql,[1]);
        return $query->num_rows();
    }

    function total_testimonial()
    {
        $sql = "SELECT * FROM tbl_testimonial";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function total_speaker()
    {
        $sql = "SELECT * FROM tbl_speaker";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function total_sponsor()
    {
        $sql = "SELECT * FROM tbl_sponsor";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function total_accommodation()
    {
        $sql = "SELECT * FROM tbl_accommodation";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function total_location()
    {
        $sql = "SELECT * FROM tbl_location";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function total_event_days()
    {
        $sql = "SELECT * FROM tbl_event_date";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    
}