<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model 
{

    // Setting - Email
    function show_setting_email()
    {
        $sql = "SELECT * FROM tbl_setting_email WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_setting_email($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_email',$data);
    }

    // Setting - Payment
    function show_setting_payment()
    {
        $sql = "SELECT * FROM tbl_setting_payment WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_setting_payment($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_payment',$data);
    }


    // Setting - Captcha
    function show_setting_captcha()
    {
        $sql = "SELECT * FROM tbl_setting_captcha WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_setting_captcha($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_captcha',$data);
    }

    // Setting - Tawk Live Chat
    function show_setting_tawk_live_chat()
    {
        $sql = "SELECT * FROM tbl_setting_tawk_live_chat WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_setting_tawk_live_chat($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_tawk_live_chat',$data);
    }


    // Setting - Ticket
    function show_setting_ticket()
    {
        $sql = "SELECT * FROM tbl_setting_ticket WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_setting_ticket($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_ticket',$data);
    }


    // Setting - Theme
    function show_setting_theme()
    {
        $sql = "SELECT * FROM tbl_setting_theme WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_setting_theme($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_theme',$data);
    }


    // Setting - Logo
    function show_setting_logo()
    {
        $sql = "SELECT * FROM tbl_setting_logo WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_setting_logo($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_logo',$data);
    }


    // Setting - Favicon
    function show_setting_favicon()
    {
        $sql = "SELECT * FROM tbl_setting_favicon WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_setting_favicon($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_favicon',$data);
    }

    // Setting - Login Page Photo
    function show_setting_login_photo()
    {
        $sql = "SELECT * FROM tbl_setting_login_photo WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_setting_login_photo($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_login_photo',$data);
    }

    // Setting - Banner
    function show_banner_about()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[1]);
        return $query->first_row('array');
    }
    function update_banner_about($data)
    {
        $this->db->where('id',1);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_organizers()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[2]);
        return $query->first_row('array');
    }
    function update_banner_organizers($data)
    {
        $this->db->where('id',2);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_organizer_detail()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[3]);
        return $query->first_row('array');
    }
    function update_banner_organizer_detail($data)
    {
        $this->db->where('id',3);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_attendees()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[4]);
        return $query->first_row('array');
    }
    function update_banner_attendees($data)
    {
        $this->db->where('id',4);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_accommodations()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[5]);
        return $query->first_row('array');
    }
    function update_banner_accommodations($data)
    {
        $this->db->where('id',5);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_parking()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[6]);
        return $query->first_row('array');
    }
    function update_banner_parking($data)
    {
        $this->db->where('id',6);
        $this->db->update('tbl_setting_banner',$data);
    }


    function show_banner_location()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[7]);
        return $query->first_row('array');
    }
    function update_banner_location($data)
    {
        $this->db->where('id',7);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_code_of_conduct()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[8]);
        return $query->first_row('array');
    }
    function update_banner_code_of_conduct($data)
    {
        $this->db->where('id',8);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_call_for_volunteers()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[9]);
        return $query->first_row('array');
    }
    function update_banner_call_for_volunteers($data)
    {
        $this->db->where('id',9);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_photos()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[10]);
        return $query->first_row('array');
    }
    function update_banner_photos($data)
    {
        $this->db->where('id',10);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_videos()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[11]);
        return $query->first_row('array');
    }
    function update_banner_videos($data)
    {
        $this->db->where('id',11);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_schedule()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[12]);
        return $query->first_row('array');
    }
    function update_banner_schedule($data)
    {
        $this->db->where('id',12);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_speakers()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[13]);
        return $query->first_row('array');
    }
    function update_banner_speakers($data)
    {
        $this->db->where('id',13);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_speaker_detail()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[14]);
        return $query->first_row('array');
    }
    function update_banner_speaker_detail($data)
    {
        $this->db->where('id',14);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_sponsors()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[15]);
        return $query->first_row('array');
    }
    function update_banner_sponsors($data)
    {
        $this->db->where('id',15);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_call_for_sponsors()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[16]);
        return $query->first_row('array');
    }
    function update_banner_call_for_sponsors($data)
    {
        $this->db->where('id',16);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_tickets()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[17]);
        return $query->first_row('array');
    }
    function update_banner_tickets($data)
    {
        $this->db->where('id',17);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_booking()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[18]);
        return $query->first_row('array');
    }
    function update_banner_booking($data)
    {
        $this->db->where('id',18);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_blog()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[19]);
        return $query->first_row('array');
    }
    function update_banner_blog($data)
    {
        $this->db->where('id',19);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_blog_detail()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[20]);
        return $query->first_row('array');
    }
    function update_banner_blog_detail($data)
    {
        $this->db->where('id',20);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_contact()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[21]);
        return $query->first_row('array');
    }
    function update_banner_contact($data)
    {
        $this->db->where('id',21);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_privacy()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[22]);
        return $query->first_row('array');
    }
    function update_banner_privacy($data)
    {
        $this->db->where('id',22);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_terms()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[23]);
        return $query->first_row('array');
    }
    function update_banner_terms($data)
    {
        $this->db->where('id',23);
        $this->db->update('tbl_setting_banner',$data);
    }

    function show_banner_search()
    {
        $sql = "SELECT * FROM tbl_setting_banner WHERE id=?";
        $query = $this->db->query($sql,[24]);
        return $query->first_row('array');
    }
    function update_banner_search($data)
    {
        $this->db->where('id',24);
        $this->db->update('tbl_setting_banner',$data);
    }



  
}