<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model 
{
    public function get_logo()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_logo WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function get_favicon()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_favicon WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function get_theme()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_theme WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function get_tawk_data()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_tawk_live_chat WHERE id=?",[1]);
        return $query->first_row('array');
    }

}