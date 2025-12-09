<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accommodation_model extends CI_Model 
{
    function show_accommodation_page_info()
    {
        $sql = "SELECT * FROM tbl_accommodation_page_info WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_accommodation_page_info($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_accommodation_page_info',$data);
    }

    function get_ai_id_accommodation()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_accommodation'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_accommodation_all()
    {
        $sql = "SELECT * FROM tbl_accommodation ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_accommodation($data) 
    {
        $this->db->insert('tbl_accommodation',$data);
        return $this->db->insert_id();
    }
    function update_accommodation($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_accommodation',$data);
    }
    function accommodation_check($id)
    {
        $sql = "SELECT * FROM tbl_accommodation WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->num_rows();
    }
    function accommodation_single($id)
    {
        $sql = "SELECT * FROM tbl_accommodation WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');
    }
    function delete_accommodation($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_accommodation');
    }
 
}