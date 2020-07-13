<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @method setLoggedInUser
 */
if (!function_exists('setLoggedInUser')) {
    function setLoggedInUser($userdata) {
        $CI =& get_instance();

        /** set session default system */
        $session['is_login'] = true;

        /** set session user login */
        $session['id'] = $userdata["id"];
        $session['is_active'] = $userdata["is_active"];
        $session['privilege'] = $userdata["privilege"];

        $CI->session->set_userdata($session);
    }
}

/**
 * @method isLoggedInUser
 */
if (!function_exists('isLoggedInUser')) {
    function isLoggedInUser() {
        $CI =& get_instance();

        /** get session userdata */
        if($CI->session->userdata("is_login")) {
            /** inquiry data user from database */
            if($CI->session->userdata("privilege") == 0 && $CI->uri->segment(1) == "ctrl") {
                /** public admin */
                $query = $CI->PublicModel->get_data_by_condition(array(), "t_user", array()
                    , array('id = "'.$CI->session->userdata("id").'"'), "", array()
                    , 1);
            } else if($CI->session->userdata("privilege") == 1 && ($CI->uri->segment(1) == "" || $CI->uri->segment(1) == "usrs") || empty($CI->uri->segment(1))) {
                /** public user */
                $query = $CI->PublicModel->get_data_by_condition(array(), "t_pegawai", array()
                    , array('id = "'.$CI->session->userdata("id").'"'), "", array()
                    , 1);
            }
            if(count($query) > 0) {
                return true;
            }
        }
        return false;
    }
}

/**
 * @method getLoggedInUser
 */
if (!function_exists('getLoggedInUser')) {
    function getLoggedInUser() {
        $CI =& get_instance();

        /** return session userdata */
        return $CI->session->userdata();
    }
}

/**
 * @method getLoggedInUserDb
 */
if (!function_exists('getLoggedInUserDb')) {
    function getLoggedInUserDb() {
        $CI =& get_instance();
        
        $table = "";
        
        $userdata = array();

        if($CI->session->userdata("privilege") == 0) {
            $table = "t_user";
        } else if($CI->session->userdata("privilege") == 1) {
            $table = "t_pegawai";
        }

        $query = $CI->PublicModel->get_data_by_condition(array(), $table, array()
            , array('id = "'.$CI->session->userdata("id").'"'), "", array()
            , 1);

        if(count($query) > 0) {
            if($CI->session->userdata("privilege") == 0) {
                $userdata["id"] = $query[0]["id"];
                $userdata["first_name"] = $query[0]["first_name"];
                $userdata["last_name"] = $query[0]["last_name"];
                $userdata["full_name"] = $query[0]["full_name"];
                $userdata["email"] = $query[0]["email"];
                $userdata["image"] = $query[0]["image"];
                $userdata["last_login"] = $query[0]["last_login"];
                $userdata["last_prev_login"] = $query[0]["last_prev_login"];
            } else if($CI->session->userdata("privilege") == 1) {
                $userdata["id"] = $query[0]["id"];
                $userdata["npp"] = $query[0]["npp"];
                $userdata["nama_pegawai"] = $query[0]["nama_pegawai"];
            }
        }

        /** return userdata */
        return $userdata;
    }
}

/**
 * @method unsetLoggedInUser
 */
if (!function_exists('unsetLoggedInUser')) {
    function unsetLoggedInUser() {
        $CI =& get_instance();

        /** session destroy */
        // $CI->session->sess_destroy();

        /** set session default system */
        $CI->session->unset_userdata("is_login");

        /** unset session userdata */
        $CI->session->unset_userdata("id");
        $CI->session->unset_userdata("is_active");
    }
}