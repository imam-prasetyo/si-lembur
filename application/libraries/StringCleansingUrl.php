<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * StringCleansingUrl.php
 *
 * Library
 *
 * @category   Library
 * @package    StringCleansingUrl
 * @author     Chandra Nala Budi Satria
 * @copyright  nalachandra@gmail.com
 * @since      2019
 */

class StringCleansingUrl {

	/**
		* @method sanitize
		* @param string $title Input string
		* @return string Clean format string, taken from wordpress
		*/
	public function sanitize($title) {
		$title = strip_tags($title);
		// Preserve escaped octets.
		$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
		// Remove percent signs that are not part of an octet.
		$title = str_replace('%', '', $title);
		// Restore octets.
		$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

		if ($this->seems_utf8($title)) {
			if (function_exists('mb_strtolower')) {
				$title = mb_strtolower($title, 'UTF-8');
			}
			$title = $this->utf8_uri_encode($title, 200);
		}

		$title = strtolower($title);
		$title = preg_replace('/&.+?;/', '', $title); // kill entities
		$title = str_replace('.', '-', $title);
		$title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
		$title = preg_replace('/\s+/', '-', $title);
		$title = preg_replace('|-+|', '-', $title);
		$title = trim($title, '-');

		return $title;
	}

	/**
	 * @method seems_utf8
	 * @param string $str Input string
	 * @return boolean taken from wordpress
	 */
	private function seems_utf8($str) {
		$length = strlen($str);
		for ($i=0; $i < $length; $i++) {
			$c = ord($str[$i]);
			if ($c < 0x80) $n = 0; # 0bbbbbbb
			elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
			elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
			elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
			elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
			elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
			else return false; # Does not match any model
			for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
				if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
					return false;
			}
		}
		return true;
	}    

	/**
	 * @method utf8_uri_encode
	 * @param string $utf8_string Input string
	 * @param int $length Length of string
	 * @return string String clean format, taken from wordpress.
	 */
	private function utf8_uri_encode( $utf8_string, $length = 0 ) {
		$unicode = '';
		$values = array();
		$num_octets = 1;
		$unicode_length = 0;

		$string_length = strlen( $utf8_string );
		for ($i = 0; $i < $string_length; $i++ ) {

			$value = ord( $utf8_string[ $i ] );

			if ( $value < 128 ) {
				if ( $length && ( $unicode_length >= $length ) )
				break;
				$unicode .= chr($value);
				$unicode_length++;
			} else {
				if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;
				$values[] = $value;

				if ( $length && ( $unicode_length + ($num_octets * 3) ) > $length )
				break;
				if ( count( $values ) == $num_octets ) {
					if ($num_octets == 3) {
						$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
						$unicode_length += 9;
					} else {
						$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
						$unicode_length += 6;
					}
					$values = array();
					$num_octets = 1;
				}
			}
		}
		return $unicode;
	}

	/**
	 * @method _validateNumber
	 * @param string $value Input digit id
	 * @param string $redirect Redirect url
	 */
	public function validateNumber($value, $redirect) {
		$final = 0;
		if(isset($value)) {
			if(is_numeric($value)) {
				$final = $value;
			} else {
				$final = $redirect;
			}
		} else {
			$final = $redirect;
		}
		return $final;
	}

}

/* End of file StringCleansingUrl.php */
/* Location: ./application/libraries/StringCleansingUrl.php */