<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code_of_conduct_model extends CI_Model 
{
    function show_code_of_conduct()
    {
        $sql = "SELECT * FROM tbl_code_of_conduct WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    
    function update_code_of_conduct($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_code_of_conduct',$data);
    }
 
}