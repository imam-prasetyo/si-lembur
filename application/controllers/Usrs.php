<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Usrs.php
 *
 * Controller
 *
 * @category   Controller
 * @package    Usrs
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class Usrs extends CI_Controller {

	/**
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct();
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

		/** get breadcrumb */
		$config["breadcrumb"] = getBreadcrumb();

		/** set title page */
		// $config["title"] = setTitlePage(getConfigUrl()["function"], "-");
		$config["title"] = setTitlePage("Sign In", "-");

		return $config;
	}

	/**
	 * @method _access
	 * @param array $data Array list of data
	 */
	private function _access($data=null) {
		/** set array to view */
		$data["data"] = $data;

		/** check session user login */
		if (!isLoggedInUser()) {	
			/** load data to view */
			$this->load->view('pub/login', $data);
		} else {
			redirect(base_url(getConfigWebsite()["user_panel"].'/dashboard'));
		}
	}

	/**
	 * @method login
	 */
	public function login() {
		$output['error_status'] = false;
		$output['error_input'] = array();
		$output['error_string'] = array();
		$message = "";
		$assignType = "login error";
		$user = "";

		/** check session user login */
		if (isLoggedInUser()) {
			/** set flash message */
			$message = "You're not logged in, please login!";
			/** set flash message */
			$this->session->set_flashdata('message'
				, '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$message.'
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
			/** redirect */
			redirect(site_url(getConfigWebsite()["user_panel"]));
		}

		/** set validation rules */
		$this->form_validation->set_rules("npp", "NPP", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[6]");

		/** set error delimiter */
		$this->form_validation->set_error_delimiters('', '');

		/** run validation */
		if (!$this->form_validation->run()) {
			$output['error_status'] = true;
			$output["error_input"][] = "npp";
			$output["error_string"][] = form_error('npp');
			$output["error_input"][] = "password";
			$output["error_string"][] = form_error('password');
		} else {
			/** input post */
			$npp = str_replace("'", "", htmlspecialchars($this->input->post('npp', true), ENT_QUOTES));
			$password = str_replace("'", "", htmlspecialchars($this->input->post('password', true), ENT_QUOTES));

			/** set user login */
			$user = $npp;

			/** inquiry data user from database */
			$query = $this->PublicModel->get_data_by_condition(array(), "t_pegawai", array()
				, array('npp = "'.$npp.'"'), "", array()
				, 1);

			/** check return data from database */
			if(count($query) > 0) {
				$userdata = $query[0];
				// if ($userdata["is_active"] == 'Y') {
					if (password_verify($password, $userdata["password"])) {
						/** set session user login */
						$userdata["privilege"] = 1;
						setLoggedInUser($userdata);

						// /** update login datetime */
						// $input["last_prev_login"] = $userdata["last_login"];
						// $input["last_login"] = date('Y-m-d H:i:s');
						
						// $this->PublicModel->update_query("t_user", "id", $userdata["id"]
						// 	, $input);

						/** set user login */
						$user = $userdata["id"];

						/** set message */
						$message = "Login succcessfully!";
						$assignType = "login success";

						/** redirect */ 
						$output["uri"] = base_url(getConfigWebsite()["user_panel"].'/dashboard');
					} else {
						/** set message */
						$message = "This account or password is not match!";
						/** set status error */
						$output['error_status'] = true;
					}
				// } else {
				// 	/** set message */
				// 	$message = "This account is not active!";
				// 	/** set status error */
				// 	$output['error_status'] = true;
				// }
			} else {
				/** set message */
				$message = "This account is not registered!";
				/** set status error */
				$output['error_status'] = true;
			}

			/** set error data validation */
			if($output['error_status']) {
				$output["error_input"][] = "password";
				$output["error_string"][] = $message;
			}
		}

		/** set log */
		activityLog($user, "login", "login"
			, $message, "system", $assignType);

		/** set output to view */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method logout
	 */
	public function logout() {
		/** set log */
		activityLog($this->session->userdata('id'), "logout", "logout"
			, $this->session->userdata('id')." logged out!", "system", "logout : end of session");

		/** unset session */
		unsetLoggedInUser();

		/** set flash message */
		$message = "You're already logged out!";
		/** set flash message */
		$this->session->set_flashdata('message'
			, '<div class="alert alert-success alert-dismissible fade show" role="alert">'.$message.'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');

		/** redirect */
		redirect(base_url(getConfigWebsite()["user_panel"]));
	}

}

/* End of file Usrs.php */
/* Location: ./application/controllers/Usrs.php */