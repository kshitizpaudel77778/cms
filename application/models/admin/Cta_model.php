<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cta_model extends CI_Model 
{
    function show_cta()
    {
        $sql = "SELECT * FROM tbl_cta WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_cta($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_cta',$data);
    }
}