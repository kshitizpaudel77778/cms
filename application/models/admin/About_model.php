<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model 
{
    function show_about()
    {
        $sql = "SELECT * FROM tbl_about WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_about($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_about',$data);
    }
 
}