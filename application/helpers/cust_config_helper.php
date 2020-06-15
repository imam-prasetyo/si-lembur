<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @method getCustomConfig
 */
if (!function_exists('getCustomConfig')) {
    function getCustomConfig($param) {
        $CI =& get_instance();
        return $CI->config->item($param);
    }
}

/**
 * @method getConfigWebsite
 */
if (!function_exists('getConfigWebsite')) {
    function getConfigWebsite() {
        $CI =& get_instance();
        $array = array();
        /** Default config website */
        $array["admin_panel"] = "ctrl"; /** Important : MUST have same name in routes.php */
        $array["current_year"] = date('Y');

        /** Default framework */
        $array["clients"] = $CI->input->ip_address();
        $array["elapsed_time"] = $CI->benchmark->elapsed_time();

        /** Custom config website */
        $array["title_tab"] = _getConfigByName("t_config", array("value"), array('name = "title_tab"'));
        $array["title"] = _getConfigByName("t_config", array("value"), array('name = "title"'));
        $array["logo"] = _getConfigByName("t_config", array("value"), array('name = "logo"'));
        $array["start_year"] = _getConfigByName("t_config", array("value"), array('name = "start_year"'));

        return $array;
    }
}

/**
 * @method getConfigWebsite
 */
if (!function_exists('getConfigWebsiteByParam')) {
    function getConfigWebsiteByParam($table, $fields, $conditions) {
        $CI =& get_instance();
        /** Custom config website */
        return _getConfigByName($table, $fields, $conditions);
    }
}

/**
 * @method _getConfigByName
 * @param array $name Config name
 */
if (!function_exists('_getConfigByName')) {
    function _getConfigByName($table, $fields, $conditions) {
        if(!empty($table)) {
            $CI =& get_instance();
            /** load model name */
            $CI->load->model('PublicModel');
            /** set parameter inquiry */
            $field = $fields; //array();
            $tableName = $table; // "config";
            $join = array();
            $condition = $conditions; // array('name = "'.$name.'"');
            $operand = "";
            $orderBy = array();
            $limit = 1;

            /** inquiry data user from database */
            $query = $CI->PublicModel->get_data_by_condition($field, $tableName, $join
                , $condition, $operand, $orderBy
                , $limit);

            /** return query */
            if(isset($query)) {
                if(is_array($query)) {
                    return $query[0][$fields[0]];
                }
            }
            return "Undefined";
        }
        return "Undefined";
    }
}