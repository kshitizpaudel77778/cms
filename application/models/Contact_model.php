<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model 
{
    public function contact_row()
    {
        $query = $this->db->query("SELECT * FROM tbl_contact WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function setting_email()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_email WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function setting_captcha()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_captcha WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function banner_contact()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[21]);
        return $query->first_row('array');
    }

}