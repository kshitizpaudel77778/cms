<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizer_model extends CI_Model 
{
    function show_organizer_page_info()
    {
        $sql = "SELECT * FROM tbl_organizer_page_info WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_organizer_page_info($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_organizer_page_info',$data);
    }

    function get_ai_id_organizer()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_organizer'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function slug_duplication_check($slug)
    {
        $sql = 'SELECT * FROM tbl_organizer WHERE slug=?';
        $query = $this->db->query($sql,array($slug));
        return $query->num_rows();
    }

    function slug_duplication_check_edit($slug,$slug2)
    {
        $sql = 'SELECT * FROM tbl_organizer WHERE slug=? AND slug!=?';
        $query = $this->db->query($sql,array($slug,$slug2));
        return $query->num_rows();
    }
    function getData($id)
    {
        $sql = "SELECT * FROM tbl_organizer WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');

    }
    function show_organizer_all()
    {
        $sql = "SELECT * FROM tbl_organizer ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_organizer($data) 
    {
        $this->db->insert('tbl_organizer',$data);
        return $this->db->insert_id();
    }
    function update_organizer($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_organizer',$data);
    }
    function organizer_check($id)
    {
        $sql = "SELECT * FROM tbl_organizer WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->num_rows();
    }
    function organizer_single($id)
    {
        $sql = "SELECT * FROM tbl_organizer WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');
    }
    function delete_organizer($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_organizer');
    }
 
}