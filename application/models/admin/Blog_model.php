<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model 
{
    function show_blog_page_info()
    {
        $sql = "SELECT * FROM tbl_blog_page_info WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_blog_page_info($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_blog_page_info',$data);
    }

    function get_ai_id_blog()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_blog'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function slug_duplication_check($slug)
    {
        $sql = 'SELECT * FROM tbl_blog WHERE slug=?';
        $query = $this->db->query($sql,array($slug));
        return $query->num_rows();
    }

    function slug_duplication_check_edit($slug,$slug2)
    {
        $sql = 'SELECT * FROM tbl_blog WHERE slug=? AND slug!=?';
        $query = $this->db->query($sql,array($slug,$slug2));
        return $query->num_rows();
    }
    function getData($id)
    {
        $sql = "SELECT * FROM tbl_blog WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');

    }
    function show_blog_all()
    {
        $sql = "SELECT * FROM tbl_blog ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_blog($data)
    {
        $this->db->insert('tbl_blog',$data);
        return $this->db->insert_id();
    }
    function update_blog($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_blog',$data);
    }
    function blog_check($id)
    {
        $sql = "SELECT * FROM tbl_blog WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->num_rows();
    }
    function blog_single($id)
    {
        $sql = "SELECT * FROM tbl_blog WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');
    }
    function delete_blog($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_blog');
    }
 
}