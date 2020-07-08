<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Overtime.php
 *
 * Controller
 *
 * @category   Controller
 * @package    Overtime
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class Overtime extends CI_Controller {

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
		$config["title"] = setTitlePage("Overtime", "-");

		return $config;
	}

	/**
	 * @method _access
	 * @param array $data Array list of data
	 */
	private function _access($data=null) {
		/** set header data table */
		$data["header_datatable"] = $this->_getHeader();

		/** set attribute variable to view */
		$data["data"] = $data;

		/** load data to view */
		$this->load->view('common/overtime/index', $data);
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
		$dataTable = "vw_trx_lembur_today";
		$dataRow = array("id", "nama_pegawai", "divisi", "unit", "waktu_input");
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
		// if(isLoggedInUser()) {
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

			// $conditions = array();
			// if(is_array($condition) || count($condition) > 0) {
			// 	for($i = 0; $i < count($condition); $i++) {
			// 		$conditions[] = $condition[$i];
			// 	}
			// }

			// foreach($field as $item) {
			// 	if(!empty($item)) {
			// 		$conditions[] = $item." LIKE '%".$searchValue."%'";
			// 	}
			// }

			## Custom Field value
			$txtSrcNamaPegawai = $this->input->post('txtSrcNamaPegawai');

			## Search 
			if(!empty($txtSrcNamaPegawai)) {
				$conditions[] = "nama_pegawai like '%".$txtSrcNamaPegawai."%'";
			}

			$output['conditions'] = $conditions;

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
		// } else {
		// 	redirect(site_url(getConfigWebsite()["admin_panel"]));
		// }
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
			$this->form_validation->set_rules("txtIdPegawai", "Pegawai", "trim|required");
			// $this->form_validation->set_rules("txtIdUnit", "Unit", "trim|required");

			/** set error delimiter */
			$this->form_validation->set_error_delimiters('', '');

			/** run validation */
			if (!$this->form_validation->run()) {
				$output['error_status'] = true;
				$output["error_input"][] = "txtIdPegawai";
				$output["error_string"][] = form_error('txtIdPegawai');
				$output["error_input"][] = "txtJamMulai";
				$output["error_string"][] = form_error('txtJamMulai');
				$output["error_input"][] = "txtJamSelesai";
				$output["error_string"][] = form_error('txtJamSelesai');
				$output["error_input"][] = "txtAlasanLembur";
				$output["error_string"][] = form_error('txtAlasanLembur');
			} else {
				/** input post */
				$txtIdPegawai = htmlspecialchars($this->input->post("txtIdPegawai"));
				$txtJamMulai = htmlspecialchars($this->input->post("txtJamMulai"));
				$txtJamSelesai = htmlspecialchars($this->input->post("txtJamSelesai"));
				$txtAlasanLembur = htmlspecialchars($this->input->post("txtAlasanLembur"));
			}

			if(!$output['error_status']) {
				/** field insert */
				$input["id_pegawai"] = $txtIdPegawai;
				$input["jam_mulai"] = $txtJamMulai;
				$input["jam_selesai"] = $txtJamSelesai;
				$input["tanggal_trx_lembur"] = date('Y-m-d');
				$input["tanggal_trx_input"] = date('Y-m-d H:i:s');;
				$input["alasan_trx_lembur"] = $txtAlasanLembur;

				$this->PublicModel->insert_query("t_trx_lembur", $input);

				$message = "Create input lembur succcessfully!";
			}
		} catch (Exception $e) {
			$output['error_status'] = false;
			$output["error_input"][] = "catcher";
			$output['error_string'][] = $e->getMessage();
		}

		/** set log */
		activityLog(getLoggedInUserDb()['id'], "create input lembur", "create input lembur : ".$input['id_pegawai'] . " " .$input["tanggal_trx_input"]
			, $message, getLoggedInUserDb()['id'], "create input lembur");

		/* return json */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

}

/* End of file Overtime.php */
/* Location: ./application/controllers/Overtime.php */