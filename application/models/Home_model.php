<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model 
{
    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_home WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function slider_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_slider WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function quick_link_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_quick_link WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function welcome_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_welcome WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function testimonial()
    {
        $query = $this->db->query("SELECT * FROM tbl_testimonial ORDER BY id ASC");
        return $query->result_array();
    }

    public function cta_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_cta WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function sponsor()
    {
        $query = $this->db->query("SELECT * FROM tbl_sponsor ORDER BY sponsor_id ASC");
        return $query->result_array();
    }

    public function newsletter_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_newsletter WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function blog()
    {
        $query = $this->db->query("SELECT * FROM tbl_blog ORDER BY id ASC");
        return $query->result_array();
    }

    function event_date_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_event_date ORDER BY ed_id ASC");
        return $query->result_array();
    }

    function event_all($id)
    {
        $query = $this->db->query("SELECT * 
                                FROM tbl_event t1
                                JOIN tbl_speaker t2
                                ON t1.speaker_id = t2.id
                                WHERE t1.ed_id=?
                                ORDER BY t1.e_id ASC",[$id]);
        return $query->result_array();
    }

    public function speaker_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_speaker ORDER BY id ASC");
        return $query->result_array();
    }

    public function total_subscriber_by_email($email)
    {
        $query = $this->db->query("SELECT * FROM tbl_subscriber WHERE subs_email=?",[$email]);
        return $query->num_rows();
    }

    public function setting_email()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_email WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function subscriber_add($data) {
        $this->db->insert('tbl_subscriber',$data);
        return $this->db->insert_id();
    }

    public function check_subscriber_url($email,$hash) 
    {
        $query = $this->db->query("SELECT * FROM tbl_subscriber WHERE subs_email=? AND subs_hash=?",[$email,$hash]);
        return $query->num_rows();
    }

    public function update_subscriber($email,$hash,$data) 
    {
        $this->db->where('subs_email',$email);
        $this->db->where('subs_hash',$hash);
        $this->db->update('tbl_subscriber',$data);
    }

    public function home_section()
    {
        $query = $this->db->query("SELECT * FROM tbl_home_section");
        return $query->result_array();
    }

    public function testimonial_home()
    {
        $query = $this->db->query("SELECT * FROM tbl_testimonial_home WHERE id=?", [1]);
        return $query->first_row('array');
    }

    public function speaker_home()
    {
        $query = $this->db->query("SELECT * FROM tbl_speaker_home WHERE id=?", [1]);
        return $query->first_row('array');
    }

    public function schedule_home()
    {
        $query = $this->db->query("SELECT * FROM tbl_schedule_home WHERE id=?", [1]);
        return $query->first_row('array');
    }

    public function sponsor_home()
    {
        $query = $this->db->query("SELECT * FROM tbl_sponsor_home WHERE id=?", [1]);
        return $query->first_row('array');
    }

    public function blog_home()
    {
        $query = $this->db->query("SELECT * FROM tbl_blog_home WHERE id=?", [1]);
        return $query->first_row('array');
    }

    public function testimonial_background()
    {
        $query = $this->db->query("SELECT * FROM tbl_testimonial_background WHERE id=?",[1]);
        return $query->first_row('array');
    }
}