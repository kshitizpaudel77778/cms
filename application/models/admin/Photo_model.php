<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_model extends CI_Model 
{
    function show_photo_page_info()
    {
        $sql = "SELECT * FROM tbl_photo_page_info WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_photo_page_info($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_photo_page_info',$data);
    }

    function get_ai_id_photo()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_photo'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_photo_category_all()
    {
        $sql = "SELECT * FROM tbl_photo_category";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_photo_category($data) 
    {
        $this->db->insert('tbl_photo_category',$data);
        return $this->db->insert_id();
    }
    function update_photo_category($photo_category_id,$data)
    {
        $this->db->where('photo_category_id',$photo_category_id);
        $this->db->update('tbl_photo_category',$data);
    }
    function photo_category_check($photo_category_id)
    {
        $sql = "SELECT * FROM tbl_photo_category WHERE photo_category_id=?";
        $query = $this->db->query($sql,[$photo_category_id]);
        return $query->num_rows();
    }
    function delete_photo_category($photo_category_id)
    {
        $this->db->where('photo_category_id',$photo_category_id);
        $this->db->delete('tbl_photo_category');
    }
    function delete_photo_by_category($photo_category_id)
    {
        $this->db->where('photo_category_id',$photo_category_id);
        $this->db->delete('tbl_photo');
    }


    function show_photo_all()
    {
        $sql = "SELECT * 
                FROM tbl_photo t1
                JOIN tbl_photo_category t2
                ON t1.photo_category_id = t2.photo_category_id
                ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_photo($data) 
    {
        $this->db->insert('tbl_photo',$data);
        return $this->db->insert_id();
    }
    function update_photo($photo_id,$data)
    {
        $this->db->where('photo_id',$photo_id);
        $this->db->update('tbl_photo',$data);
    }
    function photo_check($photo_id)
    {
        $sql = "SELECT * FROM tbl_photo WHERE photo_id=?";
        $query = $this->db->query($sql,[$photo_id]);
        return $query->num_rows();
    }
    function photo_single($photo_id)
    {
        $sql = "SELECT * FROM tbl_photo WHERE photo_id=?";
        $query = $this->db->query($sql,[$photo_id]);
        return $query->first_row('array');
    }
    function photos_by_category_id($photo_category_id)
    {
        $sql = "SELECT * FROM tbl_photo WHERE photo_category_id=?";
        $query = $this->db->query($sql,[$photo_category_id]);
        return $query->result_array();
    }
    function delete_photo($photo_id)
    {
        $this->db->where('photo_id',$photo_id);
        $this->db->delete('tbl_photo');
    }

     
}