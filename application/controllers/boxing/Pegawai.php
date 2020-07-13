<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pegawai.php
 *
 * Controller
 *
 * @category   Controller
 * @package    Pegawai
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class Pegawai extends CI_Controller {

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
		$this->load->view('boxing/pegawai/index', $data);
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
		$dataTable = "vw_pegawai_unit";
		$dataRow = array("id", "nama_pegawai", "npp", "unit", "jabatan");
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
			$this->form_validation->set_rules("txtIdJabatan", "Unit", "trim|required");
			$this->form_validation->set_rules("txtIdUnit", "Unit", "trim|required");
			$this->form_validation->set_rules("txtNPP", "NPP", "trim|required|min_length[5]|numeric|is_unique[t_pegawai.npp]");
			$this->form_validation->set_rules("txtNamaPegawai", "Nama Pegawai", "trim|required|min_length[4]");

			/** set error delimiter */
			$this->form_validation->set_error_delimiters('', '');

			/** run validation */
			if (!$this->form_validation->run()) {
				$output['error_status'] = true;
				$output["error_input"][] = "txtIdJabatan";
				$output["error_string"][] = form_error('txtIdJabatan');
				$output["error_input"][] = "txtIdUnit";
				$output["error_string"][] = form_error('txtIdUnit');
				$output["error_input"][] = "txtNPP";
				$output["error_string"][] = form_error('txtNPP');
				$output["error_input"][] = "txtNamaPegawai";
				$output["error_string"][] = form_error('txtNamaPegawai');
			} else {
				/** input post */
				$txtIdJabatan = htmlspecialchars($this->input->post("txtIdJabatan", true), ENT_QUOTES);
				$txtIdUnit = htmlspecialchars($this->input->post("txtIdUnit", true), ENT_QUOTES);
				$txtNPP = htmlspecialchars($this->input->post("txtNPP", true), ENT_QUOTES);
				$txtNamaPegawai = htmlspecialchars($this->input->post("txtNamaPegawai", true), ENT_QUOTES);
			}

			if(!$output['error_status']) {
				/** field insert */
				$input["id_jabatan"] = $txtIdJabatan;
				$input["id_unit"] = $txtIdUnit;
				$input["npp"] = $txtNPP;
				$input["password"] = password_hash(getConfigWebsiteByParam("t_config", array("value"), array('name = "password_default"')), PASSWORD_DEFAULT);
				$input["nama_pegawai"] = $txtNamaPegawai;

				$this->PublicModel->insert_query("t_pegawai", $input);

				$message = "Create pegawai succcessfully!";
			}
		} catch (Exception $e) {
			$output['error_status'] = false;
			$output["error_input"][] = "catcher";
			$output['error_string'][] = $e->getMessage();
		}

		/** set log */
		activityLog(getLoggedInUserDb()['id'], "create pegawai", "create pegawai : ".$input['id'] . " " .$input["npp"]
			, $message, getLoggedInUserDb()['id'], "create pegawai");

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
			$query = $this->PublicModel->get_data_by_condition(array(), "vw_pegawai_unit_divisi", array()
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
			$this->form_validation->set_rules("txtIdJabatanUpdate", "Unit", "trim|required");
			$this->form_validation->set_rules("txtIdUnitUpdate", "Unit", "trim|required");
			$this->form_validation->set_rules("txtNppUpdate", "NPP", "trim|required|min_length[5]|numeric|callback_npp_update_check");
			$this->form_validation->set_rules("txtNamaPegawaiUpdate", "Nama Pegawai", "trim|required|min_length[4]");
			
			/** set error delimiter */
			$this->form_validation->set_error_delimiters('', '');

			/** run validation */
			if (!$this->form_validation->run()) {
				$output['error_status'] = true;
				$output["error_input"][] = "txtIdJabatanUpdate";
				$output["error_string"][] = form_error('txtIdJabatanUpdate');
				$output["error_input"][] = "txtIdUnitUpdate";
				$output["error_string"][] = form_error('txtIdUnitUpdate');
				$output["error_input"][] = "txtNppUpdate";
				$output["error_string"][] = form_error('txtNppUpdate');
				$output["error_input"][] = "txtNamaPegawaiUpdate";
				$output["error_string"][] = form_error('txtNamaPegawaiUpdate');
			} else {
				/** input post */
				$txtIdUpdate = htmlspecialchars($this->input->post("txtIdUpdate", true), ENT_QUOTES);
				$txtIdJabatanUpdate = htmlspecialchars($this->input->post("txtIdJabatanUpdate", true), ENT_QUOTES);
				$txtIdUnitUpdate = htmlspecialchars($this->input->post("txtIdUnitUpdate", true), ENT_QUOTES);
				$txtNppUpdate = htmlspecialchars($this->input->post("txtNppUpdate", true), ENT_QUOTES);
				$txtNamaPegawaiUpdate = htmlspecialchars($this->input->post("txtNamaPegawaiUpdate", true), ENT_QUOTES);
				$chkResetPassword = htmlspecialchars($this->input->post("chkResetPassword", true), ENT_QUOTES);
			}

			if(!$output['error_status']) {
				/** field update */
				$input["id_jabatan"] = $txtIdJabatanUpdate;
				$input["id_unit"] = $txtIdUnitUpdate;
				$input["npp"] = $txtNppUpdate;
				if($chkResetPassword) {
					$input["password"] = password_hash(getConfigWebsiteByParam("t_config", array("value"), array('name = "password_default"')), PASSWORD_DEFAULT);
				}
				$input["nama_pegawai"] = $txtNamaPegawaiUpdate;
				
				$this->PublicModel->update_query("t_pegawai", "id", $txtIdUpdate, $input);

				$message = "Update pegawai succcessfully!";
			}
		} catch (Exception $e) {
			$output['error_status'] = true;
			$output["error_input"][] = "catcher";
			$output['error_string'][] = $e->getMessage();
		}
		
		/** set log */
		activityLog(getLoggedInUserDb()['id'], "update pegawai", "update pegawai : ".$txtIdUpdate . " " .$input["npp"]
			, $message, getLoggedInUserDb()['id'], "update pegawai");

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
		$output['error_status'] = false;
		$message = "";

		try {
			/** get data */ 
			// $selected = $this->PublicModel->get_data_by_id(array(), "t_user", "id"
			// 	, $txtIdDelete);

			$dataInUsed = $this->PublicModel->get_data_by_id(array(), "t_trx_lembur", "id_pegawai"
				, $txtIdDelete);
			if(count($dataInUsed) > 0) {
				$output['error_status'] = true;
				$output['error_string'] = getErrorCode("023", "", "");
			} else {
				$condition[] = "id = '".$txtIdDelete."'";
				$this->PublicModel->delete_query("t_pegawai", $condition, $operand);

				$message = "Delete pegawai succcessfully!";
			}
		} catch (Exception $e) {
			$output['error_status'] = true;
			$output['error_string'] = $e->getMessage();
		}

		/** set log */
		activityLog(getLoggedInUserDb()['id'], "delete pegawai", "delete pegawai : ".$txtIdDelete
			, $message, getLoggedInUserDb()['id'], "delete pegawai");

		/* return json */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method npp_update_check
	 */
	public function npp_update_check() {
		$txtNppUpdate = htmlspecialchars($this->input->post('txtNppUpdate', true), ENT_QUOTES);
		$txtCurrentNppUpdate = htmlspecialchars($this->input->post('txtCurrentNppUpdate', true), ENT_QUOTES);
		if ($txtNppUpdate == $txtCurrentNppUpdate) {
			return true;
		} else {
			/** query select */
			$query = $this->PublicModel->get_data_by_id(array(), "t_pegawai", "npp"
				, htmlspecialchars($this->input->post("txtNppUpdate")));

			if(count($query) <= 0) {
				return true;
			} else {
				$this->form_validation->set_message('npp_update_check', 'NPP already registered.');
				return false;
			};
		}
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/boxing/Pegawai.php */