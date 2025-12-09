<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speaker_home_model extends CI_Model 
{
    function show_speaker_title_subtitle()
    {
        $sql = "SELECT * FROM tbl_speaker_home WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_speaker_title_subtitle($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_speaker_home',$data);
    }
}