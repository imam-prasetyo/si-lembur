<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @method setTitlePage
 * @param array $delimiter Delimiter character
 * @param array $text String input
 */
if (!function_exists('setTitlePage')) {
    function setTitlePage($text, $delimiter) {
        return ucwords(str_replace($delimiter, " ", $text));
    }
}

/**
 * @method setStringCleanSpecialChars
 * @param string $string Input text
 * @return string Clean format string, taken from wordpress
 */
if (!function_exists('setCleanSpecialChars')) {
    function setCleanSpecialChars($string) {
        $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}