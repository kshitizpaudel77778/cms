<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter_model extends CI_Model 
{
    function show_newsletter()
    {
        $sql = "SELECT * FROM tbl_newsletter WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_newsletter($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_newsletter',$data);
    }
}