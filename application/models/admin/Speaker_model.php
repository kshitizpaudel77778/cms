<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speaker_model extends CI_Model 
{
    function show_speaker_page_info()
    {
        $sql = "SELECT * FROM tbl_speaker_page_info WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_speaker_page_info($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_speaker_page_info',$data);
    }

    function get_ai_id_speaker()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_speaker'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function slug_duplication_check($slug)
    {
        $sql = 'SELECT * FROM tbl_speaker WHERE slug=?';
        $query = $this->db->query($sql,array($slug));
        return $query->num_rows();
    }

    function slug_duplication_check_edit($slug,$slug2)
    {
        $sql = 'SELECT * FROM tbl_speaker WHERE slug=? AND slug!=?';
        $query = $this->db->query($sql,array($slug,$slug2));
        return $query->num_rows();
    }
    function getData($id)
    {
        $sql = "SELECT * FROM tbl_speaker WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');

    }
    function show_speaker_all()
    {
        $sql = "SELECT * FROM tbl_speaker ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_speaker($data) 
    {
        $this->db->insert('tbl_speaker',$data);
        return $this->db->insert_id();
    }
    function update_speaker($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_speaker',$data);
    }
    function speaker_check($id)
    {
        $sql = "SELECT * FROM tbl_speaker WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->num_rows();
    }
    function speaker_single($id)
    {
        $sql = "SELECT * FROM tbl_speaker WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');
    }
    function delete_speaker($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_speaker');
    }
 
}