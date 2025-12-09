<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model 
{
    public function blog_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_blog ORDER BY id DESC");
        return $query->result_array();
    }

    public function banner_blog()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[19]);
        return $query->first_row('array');
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_blog_page_info WHERE id=?",[1]);
        return $query->first_row('array');
    }
}