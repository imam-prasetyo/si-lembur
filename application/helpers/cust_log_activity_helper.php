<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @method activityLog
 * @param array $user_id User Id
 * @param array $type Type log
 * @param array $action Action log
 * @param array $item Item log
 * @param array $assign_to Assign to
 * @param array $assign_type Assign type
 */
if (!function_exists('activityLog')) {
    function activityLog($user_id=null, $type=null, $action=null, $item=null, $assign_to=null, $assign_type=null) {
        if(!empty($user_id)) {
            $CI =& get_instance();
            $input['id'] = str_replace(".", "", uniqid("", true)); // uniqid
            if($CI->session->has_userdata('email')) {
                $input['log_user'] = $CI->session->userdata('email');
            } else {
                $input['log_user'] = $user_id;
            }
            $input['log_type'] = $type; // module
            $input['log_action'] = $action; // create, retrieve, update, and delete
            $input['log_item'] = $item; // id or data
            $input['log_assign_to'] = $assign_to; // target
            $input['log_assign_type'] = $assign_type; // target
            $input['log_datetime'] = date('Y-m-d H:i:s'); // time write log
            /** load model log */
            $CI->load->model('PublicModel');
            /** write log to database */
            $CI->PublicModel->insert_query('t_activity_log', $input);
        }
    }
}