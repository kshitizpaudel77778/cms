<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parking_model extends CI_Model 
{
    function show_parking_description()
    {
        $sql = "SELECT * FROM tbl_parking_description WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_parking_description($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_parking_description',$data);
    }

    function show_parking_place_all()
    {
        $sql = "SELECT * FROM tbl_parking_place ORDER BY parking_place_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add_parking_place($data) 
    {
        $this->db->insert('tbl_parking_place',$data);
        return $this->db->insert_id();
    }
    function update_parking_place($parking_place_id,$data)
    {
        $this->db->where('parking_place_id',$parking_place_id);
        $this->db->update('tbl_parking_place',$data);
    }
    function parking_place_check($parking_place_id)
    {
        $sql = "SELECT * FROM tbl_parking_place WHERE parking_place_id=?";
        $query = $this->db->query($sql,[$parking_place_id]);
        return $query->num_rows();
    }
    function delete_parking_place($parking_place_id)
    {
        $this->db->where('parking_place_id',$parking_place_id);
        $this->db->delete('tbl_parking_place');
    }
 
}