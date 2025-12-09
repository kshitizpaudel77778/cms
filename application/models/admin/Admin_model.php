<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
    function get_ai_id() {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_user'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function getData($id) {
        $sql = "SELECT * FROM tbl_user WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');
    }
    function check_email($email) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->first_row('array');
    }
    function check_email_during_edit($email,$email1) {
        $sql = "SELECT * FROM tbl_user WHERE email=? and email!=?";
        $query = $this->db->query($sql,[$email,$email1]);
        return $query->first_row('array');
    }
    function show_admin_all() {
        $sql = "SELECT * FROM tbl_user ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function add($data) {
        $this->db->insert('tbl_user',$data);
        return $this->db->insert_id();
    }
    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_user',$data);
    }
    function check($id) {
        $sql = "SELECT * FROM tbl_user WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->num_rows();
    }
    function admin_single($id) {
        $sql = "SELECT * FROM tbl_user WHERE id=?";
        $query = $this->db->query($sql,[$id]);
        return $query->first_row('array');
    }
    function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_user');
    }
 
}