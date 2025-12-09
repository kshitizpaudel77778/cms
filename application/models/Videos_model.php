<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos_model extends CI_Model 
{
    public function video_category_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_video_category ORDER BY video_category_id ASC");
        return $query->result_array();
    }

    public function videos_by_cat($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_video WHERE video_category_id=? ORDER BY video_id ASC",[$id]);
        return $query->result_array();
    }

    public function banner_videos()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[11]);
        return $query->first_row('array');
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_video_page_info WHERE id=?",[1]);
        return $query->first_row('array');
    }
}