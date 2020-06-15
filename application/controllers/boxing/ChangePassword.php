<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ChangePassword.php
 *
 * Controller
 *
 * @category   Controller
 * @package    ChangePassword
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class ChangePassword extends CI_Controller {

	/**
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct();
		
		/** check session user login */
		if (!isLoggedInUser()) {
			redirect(base_url(getConfigWebsite()["admin_panel"]));
		};
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

		/** get user data */
		$config["session"] = getLoggedInUser();
		$config["user_login"] = getLoggedInUserDb();

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
		/** set array to view */
		$data["data"] = $data;

		/** load data to view */
		$this->load->view('boxing/profile/change-password', $data);
	}

	/**
	 * @method update_password
	 */
	public function update_password() {
		$output['error_status'] = false;
		$output['error_input'] = array();
		$output['error_string'] = array();
		$message = "";

		/** set validation rules */
		$this->form_validation->set_rules("txtCurrentPassword", "Current Password", "trim|required|min_length[6]");
		$this->form_validation->set_rules("txtNewPassword", "New Password", "trim|required|min_length[6]|callback_password_check|callback_password_complexity");
		$this->form_validation->set_rules("txtConfirmationPassword", "Confirmation Password", "trim|required|min_length[6]|matches[txtNewPassword]");

		/** set error delimiter */
		$this->form_validation->set_error_delimiters('', '');
		
		/** run validation */
		if(!$this->form_validation->run()) {
			$output['error_status'] = true;
			$output["error_input"][] = "txtCurrentPassword";
			$output["error_string"][] = form_error('txtCurrentPassword');
			$output["error_input"][] = "txtNewPassword";
			$output["error_string"][] = form_error('txtNewPassword');
			$output["error_input"][] = "txtConfirmationPassword";
			$output["error_string"][] = form_error('txtConfirmationPassword');
		} else {
			/** input post */
			$txtIdUpdate = str_replace("'", "", htmlspecialchars($this->input->post('txtIdUpdate', true), ENT_QUOTES));
			$txtCurrentPassword = str_replace("'", "", htmlspecialchars($this->input->post('txtCurrentPassword', true), ENT_QUOTES));
			$txtNewPassword = str_replace("'", "", htmlspecialchars($this->input->post('txtNewPassword', true), ENT_QUOTES));
			$txtConfirmationPassword = str_replace("'", "", htmlspecialchars($this->input->post('txtConfirmationPassword', true), ENT_QUOTES));

			/** inquiry data user from database */
			$query = $this->PublicModel->get_data_by_condition(array(), "t_user", array()
				, array("id = '".$txtIdUpdate."'"), "AND", array()
				, 1);

			/** check return data from database */
			if(count($query) > 0) {
				/** check return data from database */
				if (password_verify($txtCurrentPassword, $query[0]["password"])) {
					$message = "Changed password succcessfully!";

					/** update user data */
					$input["password"] = password_hash($txtNewPassword, PASSWORD_DEFAULT);
					$input["date_update"] = date('Y-m-d H:i:s');

					$this->PublicModel->update_query("t_user", "id", $txtIdUpdate
						, $input);
				} else {
					/** set message */
					$message = "Your current password is not match!";

					/** set status error */
					$output['error_status'] = true;
					$output["error_input"][] = "txtCurrentPassword";
					$output["error_string"][] = $message;
				}
			} else {
				/** set message */
				$message = "Cannot change password, Please check your ID !";

				/** set status error */
				$output['error_status'] = true;
				$output["error_input"][] = "txtCurrentPassword";
				$output["error_string"][] = $message;
			}
			
			/** set error data validation */
			if(!$output['error_status']) {
				/** set flash message */
				$this->session->set_flashdata('message'
					, '<div class="alert alert-success alert-dismissible fade show" role="alert">'.$message.'
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
			}
		}

		/** set log */
		activityLog($txtIdUpdate, "change password", "change password"
			, $message, "system", "change password");

		/** set url redirect */
		$output["uri"] = base_url(getConfigWebsite()["admin_panel"]."/change-password");

		/** set output to view */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method password_check
	 */
	public function password_check() {
		$txtCurrentPassword = str_replace("'", "", htmlspecialchars($this->input->post('txtCurrentPassword', true), ENT_QUOTES));
		$txtNewPassword = str_replace("'", "", htmlspecialchars($this->input->post('txtNewPassword', true), ENT_QUOTES));
		$defaultPassword = getConfigWebsiteByParam("t_config", array("value"), array('name = "password_default"'));

		/** Password cannot same with previous password */
		if ($txtCurrentPassword == $txtNewPassword) {
			$this->form_validation->set_message('password_check', 'Your password cannot same with previous password.');
			return false;
		}
		/** Password cannot same with default password */
		if($txtNewPassword == $defaultPassword) {
			$this->form_validation->set_message('password_check', 'Your password cannot same with default password.');
			return false;
		}

		return true;
	}

	/**
	 * @method password_complexity
	 */
	public function password_complexity() {
		$txtNewPassword = str_replace("'", "", htmlspecialchars($this->input->post('txtNewPassword', true), ENT_QUOTES));
		if($this->checkpasswordcomplexity->checkPassword($txtNewPassword) == "Week")  {
			$this->form_validation->set_message('password_complexity', 'Your password is weak.');
			return false;
		}
		return true;
	}

}

/* End of file ChangePassword.php */
/* Location: ./application/controllers/boxing/ChangePassword.php */