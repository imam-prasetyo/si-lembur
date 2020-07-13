<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * InvalidPage.php
 *
 * Controller
 *
 * @category   Controller
 * @package    InvalidPage
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class InvalidPage extends CI_Controller {

	/**
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct();
		
		// /** check session user login */
		// if (!isLoggedInUser()) {
		// 	redirect(base_url(getConfigWebsite()["admin_panel"]));
		// };
	}

	/**
	 * @method index
	 */
	public function index() {
		$data = $this->_configuration();
		$this->_access($data);
	}

	/**
	 * @method _configuration
	 */
	private function _configuration() {
		$config = array();
		/** get data config website */
		$config["config_web"] = getConfigWebsite();

		/** get url web */
		$config["url_web"] = getConfigUrl();

		/** check session user login */
		if (isLoggedInUser()) {
			/** get user data */
			$config["session"] = getLoggedInUser();
			$config["user_login"] = getLoggedInUserDb();
		}

		/** get breadcrumb */
		$config["breadcrumb"] = getBreadcrumb();

		/** set title page */
		$config["title"] = setTitlePage(getConfigUrl()["function"], "-");

		return $config;
	}

	/**
	 * @method _access
	 * @param array $data Array list of data
	 */
	private function _access($data=null) {
		/** set attribute variable to view */
		$data["data"] = $data;

		/** load data to view */
		if (isLoggedInUser()) {
			if($data["data"]["session"]["privilege"] == 0 && $data["data"]["url_web"]["class"] == "ctrl") {
				$this->load->view('boxing/err/index', $data);
			} else if($data["data"]["session"]["privilege"] == 1 && $data["data"]["url_web"]["class"] == "usrs") {
				// $this->load->view('boxing/err/index', $data);
			}
		}
	}

}

/* End of file InvalidPage.php */
/* Location: ./application/controllers/InvalidPage.php */