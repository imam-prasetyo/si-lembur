<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @method getConfigUrl
 */
if (!function_exists('getConfigUrl')) {
    function getConfigUrl() {
        $array = array();
        $CI =& get_instance();
        $array["class"] = $CI->uri->segment(1);
        $array["function"] = $CI->uri->segment(2);
        $array["id"] = $CI->uri->segment(3);
        return $array;
    }
}

/**
 * @method getBreadcrumb
 */
if (!function_exists('getBreadcrumb')) {
    function getBreadcrumb() {
        $array = array();
        $CI =& get_instance();
        $array["class"]["name"] = trim($CI->uri->segment(1));
        $array["class"]["length"] = strlen($array["class"]["name"]);
        $array["function"]["name"] = trim($CI->uri->segment(2));
        $array["function"]["length"] = strlen($array["function"]["name"]);
        $array["id"]["name"] = trim($CI->uri->segment(3));
        $array["id"]["length"] = strlen($array["id"]["name"]);
        return $array;
    }
}