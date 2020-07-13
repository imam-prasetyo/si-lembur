<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User.php
 *
 * Controller
 *
 * @category   Controller
 * @package    User
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class User extends CI_Controller {

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
		/** set header data table */
		$data["header_datatable"] = $this->_getHeader();

		/** set array to view */
		$data["data"] = $data;

		/** load data to view */
		$this->load->view('boxing/user/index', $data);
	}

	/**
	 * @method _getHeader
	 */
	private function _getHeader() {
		$output = array();
		$output = $this->_getRow();
		$headers = $output["header"];
		array_push($headers, "action");
		$header = "";
		foreach($headers as $item) {
			if(!empty($header) || $header !== "") {
				$header .= "<th class='sort-alpha'>".ucwords(str_replace("_", " ", $item))."</th>";
			} else {
				$header .= "<th class='sort-alpha'>".ucwords(str_replace("_", " ", $item))."</th>";
			}
		}
		return $header;
	}

	/**
	 * @method _getRow
	 */
	private function _getRow() {
		/** set data table */
		$dataTable = "t_user";
	$dataRow = array("id", "full_name", "email", "is_active", "last_login"/*, "last_prev_login"*/);
		$dataRowKey = array_splice($dataRow, 0, 1);
		$dataHeader = $dataRow;
		$dataCondition = array();
		$dataOperand = "OR";
		$dataJoin = array();

		/** set return output */
		$output = array();
		$output["table"] = $dataTable;
		$output["key"] = $dataRowKey;
		$output["row"] = $dataRow;
		$output["header"] = $dataHeader;
		$output["condition"] = $dataCondition;
		$output["operand"] = $dataOperand;
		$output["join"] = $dataJoin;

		return $output;
	}

	/**
	 * @method pagination
	 */
	public function pagination() {
		if(isLoggedInUser()) {
			/** post data */
			$postData = $this->input->post();

			/** set post data */
			$draw = (isset($postData['draw']) ? $postData['draw'] : 0); // $postData['draw'];
			$start = (isset($postData['start']) ? $postData['start'] : 0); // $postData['start'];
			$rowperpage = (isset($postData['length']) ? $postData['length'] : 0); // $postData['length'];
			$columnIndex = (isset($postData['order']) ? $postData['order'][0]['column'] : "");  // $postData['order'][0]['column'];
			$columnName = (isset($postData['columns']) ? $postData['columns'][$columnIndex]['data'] : ""); // $postData['columns'][$columnIndex]['data'];
			$columnSortOrder = (isset($postData['order']) ? $postData['order'][0]['dir'] : ""); // $postData['order'][0]['dir'];
			$searchValue = (isset($postData['search']) ? $postData['search']['value'] : ""); // $postData['search']['value'];

			/** get data key and row */
			$paramTable = $this->_getRow();
			$field = array_merge($paramTable["key"], $paramTable["header"]);
			$tableName = $paramTable["table"];
			$condition =  $paramTable["condition"];
			$operand =  $paramTable["operand"];
			$join =  $paramTable["join"];

			$conditions = array();
			if(is_array($condition) || count($condition) > 0) {
				for($i = 0; $i < count($condition); $i++) {
					$conditions[] = $condition[$i];
				}
			}

			foreach($field as $item) {
				if(!empty($item)) {
					$conditions[] = $item." LIKE '%".$searchValue."%'";
				}
			}

			/** get total data all */
			$recordsTotal = $this->PublicModel->counter_all($tableName
				, $join);
			/** get total data by filter */
			$recordsFiltered = $this->PublicModel->counter_data($field
				, $tableName
				, $join
				, $conditions
				, $operand);
			/** get data by filter */
			$recordsData = $this->PublicModel->get_all_data($field
				, $tableName
				, $join
				, $conditions
				, $operand
				, $columnName
				, $columnSortOrder
				, $start
				, $rowperpage);

			/** set output */
			$output['draw'] = (isset($postData['draw']) ? $postData['draw'] : 0);
			$output['recordsTotal'] = $recordsTotal;
			$output['recordsFiltered'] = $recordsFiltered;
			$output['data'] = $recordsData;

			/** output */
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			redirect(site_url(getConfigWebsite()["admin_panel"]));
		}
	}

	/**
	 * @method insert
	 */
	function insert() {
		$output['error_status'] = false;
		$output['error_input'] = array();
		$output['error_string'] = array();
		$input = array();
		$message = "";
		
		try {
			/** set validation rules */
			$this->form_validation->set_rules("txtEmail", "Email", "trim|required|valid_email|is_unique[t_user.email]");
			$this->form_validation->set_rules("txtFirstName", "First Name", "trim|required|min_length[4]");
			$this->form_validation->set_rules("txtLastName", "Last Name", "trim|required|min_length[4]");
			$this->form_validation->set_rules("txtIsActive", "Is Active", "trim|required");
			
			/** set error delimiter */
			$this->form_validation->set_error_delimiters('', '');

			/** run validation */
			if (!$this->form_validation->run()) {
				$output['error_status'] = true;
				$output["error_input"][] = "txtEmail";
				$output["error_string"][] = form_error('txtEmail');
				$output["error_input"][] = "txtFirstName";
				$output["error_string"][] = form_error('txtFirstName');
				$output["error_input"][] = "txtLastName";
				$output["error_string"][] = form_error('txtLastName');
				$output["error_input"][] = "txtIsActive";
				$output["error_string"][] = form_error('txtIsActive');
			} else {
				/** input post */
				$txtEmail = htmlspecialchars($this->input->post("txtEmail", true), ENT_QUOTES);
				$txtFirstName = htmlspecialchars($this->input->post("txtFirstName", true), ENT_QUOTES);
				$txtLastName = htmlspecialchars($this->input->post("txtLastName", true), ENT_QUOTES);
				$txtIsActive = htmlspecialchars($this->input->post("txtIsActive", true), ENT_QUOTES);
			}

			if(!$output['error_status']) {
				/** field insert */
				$input['id'] = str_replace(".", "", uniqid("", true)); // uniqid
				$input["email"] = $txtEmail;
				$input["password"] = password_hash(getConfigWebsiteByParam("t_config", array("value"), array('name = "password_default"')), PASSWORD_DEFAULT);
				$input["first_name"] = $txtFirstName;
				$input["last_name"] = $txtLastName;
				$input["full_name"] = implode(" ", array($txtFirstName, $txtLastName));
				$input["image"] = "default.png";
				$input["is_active"] = $txtIsActive;
				$input["is_deleted"] = "Y";
				$input["last_login"] = date('Y-m-d H:i:s');
				$input["last_prev_login"] = date('Y-m-d H:i:s');
				$input["date_create"] = date('Y-m-d H:i:s');
				$input["date_update"] = date('Y-m-d H:i:s');

				$this->PublicModel->insert_query("t_user", $input);

				$message = "Create user succcessfully!";
			}
		} catch (Exception $e) {
			$output['error_status'] = false;
			$output["error_input"][] = "catcher";
			$output['error_string'][] = $e->getMessage();
		}

		/** set log */
		activityLog(getLoggedInUserDb()['id'], "create user", "create user : ".$input['id'] . " " .$input["email"]
			, $message, getLoggedInUserDb()['id'], "create user");

		/* return json */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method select
	 * @param string @case Case action
	 */
	function select($id=null) {
		$output['error_status'] = false;
		try {
			/** query select */
			$query = $this->PublicModel->get_data_by_condition(array(), "t_user", array()
				, array("id = '".$id."'"), "AND", array()
				, 0);

			if(is_null($query[0]["id"])) {
				$output['error_status'] = true;
				$output['error_string'] = getErrorCode("011", "", "");
			} else {
				/* data selected */
				$output["result"] = $query[0];
				$output['error_string'] = getErrorCode("012", "", "");
			}
		} catch (Exception $e) {
			$output['error_status'] = true;
			$output['error_string'] = $e->getMessage();
		}
		/* return json */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method update
	 */
	function update() {
		$output['error_status'] = false;
		$output['error_input'] = array();
		$output['error_string'] = array();
		$input = array();
		$message = "";
		
		try {
			/** set validation rules */
			$this->form_validation->set_rules("txtEmailUpdate", "Email", "trim|required|valid_email|callback_email_user_update_check");
			$this->form_validation->set_rules("txtFirstNameUpdate", "First Name", "trim|required|min_length[4]");
			$this->form_validation->set_rules("txtLastNameUpdate", "Last Name", "trim|required|min_length[4]");
			$this->form_validation->set_rules("txtIsActiveUpdate", "Active", "trim|required");
			
			/** set error delimiter */
			$this->form_validation->set_error_delimiters('', '');

			/** run validation */
			if (!$this->form_validation->run()) {
				$output['error_status'] = true;
				$output["error_input"][] = "txtEmailUpdate";
				$output["error_string"][] = form_error('txtEmailUpdate');
				$output["error_input"][] = "txtFirstNameUpdate";
				$output["error_string"][] = form_error('txtFirstNameUpdate');
				$output["error_input"][] = "txtLastNameUpdate";
				$output["error_string"][] = form_error('txtLastNameUpdate');
				$output["error_input"][] = "txtIsActiveUpdate";
				$output["error_string"][] = form_error('txtIsActiveUpdate');
			} else {
				/** input post */
				$txtIdUpdate = htmlspecialchars($this->input->post("txtIdUpdate", true), ENT_QUOTES);
				$txtEmailUpdate = htmlspecialchars($this->input->post("txtEmailUpdate", true), ENT_QUOTES);
				$txtCurrentEmailUpdate = htmlspecialchars($this->input->post("txtCurrentEmailUpdate", true), ENT_QUOTES);
				$txtFirstNameUpdate = htmlspecialchars($this->input->post("txtFirstNameUpdate", true), ENT_QUOTES);
				$txtLastNameUpdate = htmlspecialchars($this->input->post("txtLastNameUpdate", true), ENT_QUOTES);
				$txtIsActiveUpdate = htmlspecialchars($this->input->post("txtIsActiveUpdate", true), ENT_QUOTES);
				$chkResetPassword = htmlspecialchars($this->input->post("chkResetPassword", true), ENT_QUOTES);
			}

			if(!$output['error_status']) {
				/** field update */
				$input["email"] = $txtEmailUpdate;
				$input["first_name"] = $txtFirstNameUpdate;
				$input["last_name"] = $txtLastNameUpdate;
				$input["full_name"] = implode(" ", array($txtFirstNameUpdate, $txtLastNameUpdate));
				$input["is_active"] = $txtIsActiveUpdate;
				if($chkResetPassword) {
					$input["password"] = password_hash(getConfigWebsiteByParam("t_config", array("value"), array('name = "password_default"')), PASSWORD_DEFAULT);
				}
				$input["date_update"] = date('Y-m-d H:i:s');
				
				$this->PublicModel->update_query("t_user", "id", $txtIdUpdate, $input);

				$message = "Update user succcessfully!";
			}
		} catch (Exception $e) {
			$output['error_status'] = true;
			$output["error_input"][] = "catcher";
			$output['error_string'][] = $e->getMessage();
		}
		
		/** set log */
		activityLog(getLoggedInUserDb()['id'], "update user", "update user : ".$txtIdUpdate . " " .$input["email"]
			, $message, getLoggedInUserDb()['id'], "update user");

		/* return json */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method delete
	 */
	function delete() {
		$txtIdDelete = htmlspecialchars($this->input->post("txtIdDelete", true), ENT_QUOTES);
		$condition = array();
		$operand = "AND";
		$path_upload = "/img/profile/";
		$output['error_status'] = false;
		$message = "";

		try {
			/** get data */ 
			$selected = $this->PublicModel->get_data_by_id(array(), "t_user", "id"
				, $txtIdDelete);

			// $dataInUsed = $this->PublicModel->get_data_by_id(array(), "t_user", "id"
			// 	, $txtIdDelete);
			// if($dataInUsed > 0) {
			// 	$output['error_status'] = true;
			// 	$output['error_string'] = getErrorCode("023", "", "");
			// } else {
				if($selected[0]['is_deleted'] != "N") {
					/** delete file */
					if($selected[0]['image'] != "default.png") {
						$filename = explode(".", $selected[0]['image'])[0];
						array_map('unlink', glob(FCPATH.$path_upload."/large/$filename.*"));
						array_map('unlink', glob(FCPATH.$path_upload."/medium/$filename.*"));
						array_map('unlink', glob(FCPATH.$path_upload."/small/$filename.*"));
					}
					$condition[] = "id = '".$txtIdDelete."'";
					$this->PublicModel->delete_query("t_user", $condition, $operand);

					$message = "Delete user succcessfully!";
				} else {
					$output['error_status'] = true;
					$output['error_string'] = getErrorCode("017", "", "");

					$message = getErrorCode("017", "", "");
				} 
			// }
		} catch (Exception $e) {
			$output['error_status'] = true;
			$output['error_string'] = $e->getMessage();
		}

		/** set log */
		activityLog(getLoggedInUserDb()['id'], "delete user", "delete user : ".$txtIdDelete
			, $message, getLoggedInUserDb()['id'], "delete user");

		/* return json */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method email_user_update_check
	 */
	public function email_user_update_check() {
		$txtEmailUpdate = htmlspecialchars($this->input->post('txtEmailUpdate', true), ENT_QUOTES);
		$txtCurrentEmailUpdate = htmlspecialchars($this->input->post('txtCurrentEmailUpdate', true), ENT_QUOTES);
		if ($txtEmailUpdate == $txtCurrentEmailUpdate) {
			return true;
		} else {
			/** query select */
			$query = $this->PublicModel->get_data_by_id(array(), "t_user", "email"
				, htmlspecialchars($this->input->post("txtEmailUpdate")));

			if(count($query) <= 0) {
				return true;
			} else {
				$this->form_validation->set_message('email_user_update_check', 'User email already registered to other account.');
				return false;
			};
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/boxing/User.php */