<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors_model extends CI_Model 
{
    public function sponsor_category_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_sponsor_category ORDER BY sponsor_category_id ASC");
        return $query->result_array();
    }

    public function sponsors_by_cat($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_sponsor WHERE sponsor_category_id=? ORDER BY sponsor_id ASC",[$id]);
        return $query->result_array();
    }

    public function banner_sponsors()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[15]);
        return $query->first_row('array');
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_sponsor_page_info WHERE id=?",[1]);
        return $query->first_row('array');
    }
}