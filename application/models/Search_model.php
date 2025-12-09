<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model 
{
    public function banner_search()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[24]);
        return $query->first_row('array');
    }

    public function blog_all()
    {
        $query = $this->db->query("SELECT * FROM tbl_blog ORDER BY id DESC");
        return $query->result_array();
    }

    public function search($search_string)
    {
        $search_string = '%' . $search_string . '%';
        $sql = "SELECT * 
                FROM tbl_blog
                WHERE title like ? OR description like ?
                ORDER BY id DESC";
        $query = $this->db->query($sql,array($search_string,$search_string));
        return $query->result_array();
    }
    public function search_total($search_string)
    {
        $search_string = '%' . $search_string . '%';
        $sql = "SELECT * 
                FROM tbl_blog
                WHERE title like ? OR description like ?
                ORDER BY id DESC";
        $query = $this->db->query($sql,array($search_string,$search_string));
        return $query->num_rows();
    }

    public function page_info()
    {
        $query = $this->db->query("SELECT * FROM tbl_search WHERE id=?",[1]);
        return $query->first_row('array');
    }
}