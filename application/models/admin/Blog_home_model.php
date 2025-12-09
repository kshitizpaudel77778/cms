<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_home_model extends CI_Model 
{
    function show_blog_title_subtitle()
    {
        $sql = "SELECT * FROM tbl_blog_home WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_blog_title_subtitle($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_blog_home',$data);
    }
}