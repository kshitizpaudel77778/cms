<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model 
{
    function show_testimonial_title_subtitle()
    {
        $sql = "SELECT * FROM tbl_testimonial_home WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_testimonial_title_subtitle($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_testimonial_home',$data);
    }

    function show_testimonial_background()
    {
        $sql = "SELECT * FROM tbl_testimonial_background WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_testimonial_background($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_testimonial_background',$data);
    }

    function get_ai_id_testimonial()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_testimonial'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_testimonial_all()
    {
        $sql = "SELECT * FROM tbl_testimonial ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_testimonial($data) 
    {
        $this->db->insert('tbl_testimonial',$data);
        return $this->db->insert_id();
    }
    function update_testimonial($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_testimonial',$data);
    }
    function testimonial_check($id)
    {
        $sql = "SELECT * FROM tbl_testimonial WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->num_rows();
    }
    function testimonial_single($id)
    {
        $sql = "SELECT * FROM tbl_testimonial WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');
    }
    function delete_testimonial($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_testimonial');
    }
 
}