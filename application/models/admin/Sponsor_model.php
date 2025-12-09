<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsor_model extends CI_Model 
{
    function show_sponsor_page_info()
    {
        $sql = "SELECT * FROM tbl_sponsor_page_info WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_sponsor_page_info($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_sponsor_page_info',$data);
    }

    function get_ai_id_sponsor()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_sponsor'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_sponsor_category_all()
    {
        $sql = "SELECT * FROM tbl_sponsor_category";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_sponsor_category($data) 
    {
        $this->db->insert('tbl_sponsor_category',$data);
        return $this->db->insert_id();
    }
    function update_sponsor_category($sponsor_category_id,$data)
    {
        $this->db->where('sponsor_category_id',$sponsor_category_id);
        $this->db->update('tbl_sponsor_category',$data);
    }
    function sponsor_category_check($sponsor_category_id)
    {
        $sql = "SELECT * FROM tbl_sponsor_category WHERE sponsor_category_id=?";
        $query = $this->db->query($sql,[$sponsor_category_id]);
        return $query->num_rows();
    }
    function delete_sponsor_category($sponsor_category_id)
    {
        $this->db->where('sponsor_category_id',$sponsor_category_id);
        $this->db->delete('tbl_sponsor_category');
    }
    function delete_sponsor_by_category($sponsor_category_id)
    {
        $this->db->where('sponsor_category_id',$sponsor_category_id);
        $this->db->delete('tbl_sponsor');
    }


    function show_sponsor_all()
    {
        $sql = "SELECT * 
                FROM tbl_sponsor t1
                JOIN tbl_sponsor_category t2
                ON t1.sponsor_category_id = t2.sponsor_category_id
                ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_sponsor($data) 
    {
        $this->db->insert('tbl_sponsor',$data);
        return $this->db->insert_id();
    }
    function update_sponsor($sponsor_id,$data)
    {
        $this->db->where('sponsor_id',$sponsor_id);
        $this->db->update('tbl_sponsor',$data);
    }
    function sponsor_check($sponsor_id)
    {
        $sql = "SELECT * FROM tbl_sponsor WHERE sponsor_id=?";
        $query = $this->db->query($sql,[$sponsor_id]);
        return $query->num_rows();
    }
    function sponsor_single($sponsor_id)
    {
        $sql = "SELECT * FROM tbl_sponsor WHERE sponsor_id=?";
        $query = $this->db->query($sql,[$sponsor_id]);
        return $query->first_row('array');
    }
    function sponsors_by_category_id($sponsor_category_id)
    {
        $sql = "SELECT * FROM tbl_sponsor WHERE sponsor_category_id=?";
        $query = $this->db->query($sql,[$sponsor_category_id]);
        return $query->result_array();
    }
    function delete_sponsor($sponsor_id)
    {
        $this->db->where('sponsor_id',$sponsor_id);
        $this->db->delete('tbl_sponsor');
    }

     
}