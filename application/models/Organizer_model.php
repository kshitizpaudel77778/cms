<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizer_model extends CI_Model
{
    function organizer_single($slug)
    {
        $query = $this->db->query("SELECT * FROM tbl_organizer WHERE slug=?",[$slug]);
        return $query->first_row('array');
    }

    public function banner_organizer_detail()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_banner WHERE id=?",[3]);
        return $query->first_row('array');
    }

}