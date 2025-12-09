<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speaker_model extends CI_Model
{
    function speaker_single($slug)
    {
        $query = $this->db->query("SELECT * FROM tbl_speaker WHERE slug=?",[$slug]);
        return $query->first_row('array');
    }

    function event_date_all()
    {
    	$query = $this->db->query("SELECT * FROM tbl_event_date ORDER BY ed_id ASC");
        return $query->result_array();
    }

    function event_by_ed_and_speaker($id1,$id2)
    {
    	$query = $this->db->query("SELECT * FROM tbl_event WHERE ed_id=? AND speaker_id=?",[$id1,$id2]);
        return $query->result_array();
    }

    public function banner_speaker_detail()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[14]);
        return $query->first_row('array');
    }
}