<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photos_model extends CI_Model 
{
    public function photo_category_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_photo_category ORDER BY photo_category_id ASC");
        return $query->result_array();
    }

    public function photos_by_cat($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_photo WHERE photo_category_id=? ORDER BY photo_id ASC",[$id]);
        return $query->result_array();
    }

    public function banner_photos()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[10]);
        return $query->first_row('array');
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_photo_page_info WHERE id=?",[1]);
        return $query->first_row('array');
    }
}