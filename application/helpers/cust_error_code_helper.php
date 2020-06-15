<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @method getErrorCode
 */
if (!function_exists('getErrorCode')) {
    function getErrorCode($case=NULL, $input=NULL, $param=NULL) {
        switch($case) {
            case "001";
                return "Access denied.";
                break;
            case "002";
                return "Invalid username or password.";
                break;
            case "003";
                return $input." is required.";
                break;
            case "004";
                return $input." must have at least ".$param." characters.";
                break;
            case "005";
                return $input." is ".$param." characters long.";
                break;
            case "006";
                return $input." contains three character categories: digits, lowercase characters and special characters.";
                break;
            case "007";
                return $input." does not contain the login or part of the name of the account.";
                break;
            case "008";
                return $input." is not match.";
                break;
            case "009";
                return "Login failed.";
                break;
            case "010";
                return "Login success.";
                break;
            case "011";
                return "Failed get data.";
                break;
            case "012";
                return "Success get data.";
                break;
            case "013";
                return "Failed input data.";
                break;
            case "014";
                return "Success input data.";
                break;
            case "015";
                return "Failed update data.";
                break;
            case "016";
                return "Success update data.";
                break;
            case "017";
                return "This data cannot be remove.";
                break;
            case "018";
                return "This data can be remove.";
                break;
            case "019";
                return "Failed remove data.";
                break;
            case "020";
                return "Success remove data.";
                break;
            case "021";
                return $input." is not valid.";
                break;
            case "022";
                return $input." only numeric value.";
                break;
            case "023";
                return "This data cannot be remove, cause this data is in used.";
                break; 
            case "024";
                return $input." ".$param." data already exist.";
                break;
            case "025";
                return $input." data already exist.";
                break;
            case "098";
                return $input." ".$param;
                break;
            case "099";
                return "Internal server error.";
                break;
            default :
                return "Internal server error.";
                break;
        }
    }
}