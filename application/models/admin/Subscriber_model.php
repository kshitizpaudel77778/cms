<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber_model extends CI_Model 
{
    function show_subscriber_all()
    {
        $sql = "SELECT * FROM tbl_subscriber WHERE subs_active=? ORDER BY subs_id ASC";
        $query = $this->db->query($sql,[1]);
        return $query->result_array();
    }
    function message_all()
    {
        $sql = "SELECT * FROM tbl_subscriber_message ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function subscriber_check($subs_id)
    {
        $sql = "SELECT * FROM tbl_subscriber WHERE subs_id=?";
        $query = $this->db->query($sql,[$subs_id]);
        return $query->num_rows();
    }
    function delete_subscriber($subs_id)
    {
        $this->db->where('subs_id',$subs_id);
        $this->db->delete('tbl_subscriber');
    }
    function add($data)
    {
        $this->db->insert('tbl_subscriber_message',$data);
        return $this->db->insert_id();
    }
    function setting_email()
    {
        $sql = "SELECT * FROM tbl_setting_email WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
}