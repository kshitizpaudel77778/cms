<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model 
{

    function show_slider()
    {
        $sql = "SELECT * FROM tbl_slider WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_slider($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_slider',$data);
    }

 
}