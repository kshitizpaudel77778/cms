<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_detail_model extends CI_Model
{
    function blog_detail_single($slug)
    {
        $query = $this->db->query("SELECT * FROM tbl_blog WHERE slug=?",[$slug]);
        return $query->first_row('array');
    }

    public function blog_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_blog ORDER BY id DESC");
        return $query->result_array();
    }

    public function banner_blog_detail()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[20]);
        return $query->first_row('array');
    }

}