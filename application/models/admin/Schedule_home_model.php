<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_home_model extends CI_Model 
{
    function show_schedule_title_subtitle()
    {
        $sql = "SELECT * FROM tbl_schedule_home WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_schedule_title_subtitle($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_schedule_home',$data);
    }
}