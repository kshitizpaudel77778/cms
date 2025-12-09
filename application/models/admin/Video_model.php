<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model 
{
    function show_video_page_info()
    {
        $sql = "SELECT * FROM tbl_video_page_info WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_video_page_info($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_video_page_info',$data);
    }
    function show_video_category_all()
    {
        $sql = "SELECT * FROM tbl_video_category";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_video_category($data) 
    {
        $this->db->insert('tbl_video_category',$data);
        return $this->db->insert_id();
    }
    function update_video_category($video_category_id,$data)
    {
        $this->db->where('video_category_id',$video_category_id);
        $this->db->update('tbl_video_category',$data);
    }
    function video_category_check($video_category_id)
    {
        $sql = "SELECT * FROM tbl_video_category WHERE video_category_id=?";
        $query = $this->db->query($sql,[$video_category_id]);
        return $query->num_rows();
    }
    function delete_video_category($video_category_id)
    {
        $this->db->where('video_category_id',$video_category_id);
        $this->db->delete('tbl_video_category');
    }
    function delete_video_by_category($video_category_id)
    {
        $this->db->where('video_category_id',$video_category_id);
        $this->db->delete('tbl_video');
    }


    function show_video_all()
    {
        $sql = "SELECT * 
                FROM tbl_video t1
                JOIN tbl_video_category t2
                ON t1.video_category_id = t2.video_category_id
                ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_video($data) 
    {
        $this->db->insert('tbl_video',$data);
        return $this->db->insert_id();
    }
    function update_video($video_id,$data)
    {
        $this->db->where('video_id',$video_id);
        $this->db->update('tbl_video',$data);
    }
    function video_check($video_id)
    {
        $sql = "SELECT * FROM tbl_video WHERE video_id=?";
        $query = $this->db->query($sql,[$video_id]);
        return $query->num_rows();
    }
    function delete_video($video_id)
    {
        $this->db->where('video_id',$video_id);
        $this->db->delete('tbl_video');
    }

 
}