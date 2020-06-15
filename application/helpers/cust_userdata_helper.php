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
			$query = $CI->PublicModel->get_data_by_condition(array(), "t_user", array()
				, array('id = "'.$CI->session->userdata("id").'"'), "", array()
				, 1);
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

        $userdata = array();

        $query = $CI->PublicModel->get_data_by_condition(array(), "t_user", array()
            , array('id = "'.$CI->session->userdata("id").'"'), "", array()
            , 1);
        if(count($query) > 0) {
            $userdata["id"] = $query[0]["id"];
            $userdata["first_name"] = $query[0]["first_name"];
            $userdata["last_name"] = $query[0]["last_name"];
            $userdata["full_name"] = $query[0]["full_name"];
            $userdata["email"] = $query[0]["email"];
            $userdata["image"] = $query[0]["image"];
            $userdata["last_login"] = $query[0]["last_login"];
            $userdata["last_prev_login"] = $query[0]["last_prev_login"];
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