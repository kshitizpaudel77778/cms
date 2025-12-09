<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_media_model extends CI_Model 
{
    function show_social_media_all()
    {
        $sql = "SELECT * FROM tbl_social_media ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_social_media($data) 
    {
        $this->db->insert('tbl_social_media',$data);
        return $this->db->insert_id();
    }
    function update_social_media($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_social_media',$data);
    }
    function social_media_check($id)
    {
        $sql = "SELECT * FROM tbl_social_media WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->num_rows();
    }
    function delete_social_media($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_social_media');
    }
 
}