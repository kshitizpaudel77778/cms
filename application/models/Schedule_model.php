<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends CI_Model 
{
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

    public function banner_schedule()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[12]);
        return $query->first_row('array');
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_schedule WHERE id=?",[1]);
        return $query->first_row('array');
    }

}