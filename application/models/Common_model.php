<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model 
{
    function n_format($number,$how_many_digits_after_point)
    {
        return number_format((float)$number, $how_many_digits_after_point, '.', '');
    }
}