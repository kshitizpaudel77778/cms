<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speakers_model extends CI_Model 
{
    public function speaker_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_speaker ORDER BY id ASC");
        return $query->result_array();
    }

    public function banner_speakers()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[13]);
        return $query->first_row('array');
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_speaker_page_info WHERE id=?",[1]);
        return $query->first_row('array');
    }

}