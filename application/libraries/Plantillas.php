<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plantillas {

    private static $plt = array(
        "header" => "tpl/header",
        "menu" => "tpl/menu",
        "footer" => "tpl/footer");

    ////////////////////////////////////////////////////
    //Plantilla
    ////////////////////////////////////////////////////

    function getPlt($con, $data) {
        $CI = & get_instance();
        $CI->load->view(self::$plt['header'], $data);
        $CI->load->view(self::$plt['menu'], $data);			
        $CI->load->view($con, $data);
        $CI->load->view(self::$plt["footer"]);
    }

}
