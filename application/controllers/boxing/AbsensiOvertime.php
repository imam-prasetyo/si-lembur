<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * AbsensiOvertime.php
 *
 * Controller
 *
 * @category   Controller
 * @package    AbsensiOvertime
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class AbsensiOvertime extends CI_Controller {

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

		$data["last_date_trx_lembur"] = $this->_lastDateTrxLembur();
		
		/** set array to view */
		$data["data"] = $data;

		/** load data to view */
		$this->load->view('boxing/absensi-overtime/index', $data);
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
			$txtSrcTanggalLembur = $this->input->post('txtSrcTanggalLembur');
			// $txtSrcNamaPegawai = $this->input->post('txtSrcNamaPegawai');
			
			## Search 
			if(!empty($txtSrcTanggalLembur)) {
				$conditions[] = "cast(waktu_input as date) = '".$txtSrcTanggalLembur."'";
			}

			// if(!empty($txtSrcNamaPegawai)) {
			// 	$conditions[] = "nama_pegawai like '%".$txtSrcNamaPegawai."%'";
			// }

			// $output['conditions'] = $conditions;

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
	 * @method select
	 * @param string @case Case action
	 */
	private function _lastDateTrxLembur() {
		$lastDateLembur = null;
		try {
			/** query select */
			$query = $this->PublicModel->get_data_by_condition(array("tanggal_trx_lembur"), "t_trx_lembur", array()
				, array(), "AND", array("tanggal_trx_lembur|desc")
				, 1);

			if(is_null($query[0]["tanggal_trx_lembur"])) {
				$lastDateLembur = date('Y-m-d');
			} else {
				$lastDateLembur = $query[0]["tanggal_trx_lembur"];
			}
		} catch (Exception $e) {
			$output['error_status'] = true;
			$output['error_string'] = $e->getMessage();
		}
		/* return json */
		return $lastDateLembur;
	}

	/**
	 * @method select
	 * @param string @case Case action
	 */
	function select($id=null) {
		$output['error_status'] = false;
		try {
			/** query select */
			$query = $this->PublicModel->get_data_by_condition(array(), "t_absensi_approval", array()
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
			$this->form_validation->set_rules("txtIdDivisiUpdate", "Divisi", "trim|required");
			$this->form_validation->set_rules("txtIdPegawaiUpdate", "Pegawai", "trim|required");
			
			/** set error delimiter */
			$this->form_validation->set_error_delimiters('', '');

			/** run validation */
			if (!$this->form_validation->run()) {
				$output['error_status'] = true;
				$output["error_input"][] = "txtIdDivisiUpdate";
				$output["error_string"][] = form_error('txtIdDivisiUpdate');
				$output["error_input"][] = "txtIdPegawaiUpdate";
				$output["error_string"][] = form_error('txtIdPegawaiUpdate');
			} else {
				/** input post */
				$txtIdUpdate = htmlspecialchars($this->input->post("txtIdUpdate", true), ENT_QUOTES);
				$txtIdDivisiUpdate = htmlspecialchars($this->input->post("txtIdDivisiUpdate", true), ENT_QUOTES);
				$txtIdPegawaiUpdate = htmlspecialchars($this->input->post("txtIdPegawaiUpdate", true), ENT_QUOTES);
			}

			if(!$output['error_status']) {
				/** field update */
				$input["id_divisi"] = $txtIdDivisiUpdate;
				$input["id_pegawai"] = $txtIdPegawaiUpdate;
				
				$this->PublicModel->update_query("t_absensi_approval", "id", $txtIdUpdate, $input);

				$message = "Update pegawai absensi approval succcessfully!";
			}
		} catch (Exception $e) {
			$output['error_status'] = true;
			$output["error_input"][] = "catcher";
			$output['error_string'][] = $e->getMessage();
		}
		
		/** set log */
		activityLog(getLoggedInUserDb()['id'], "update pegawai absensi approval", "update pegawai absensi approval : ".$txtIdUpdate." ".$input["id_divisi"]." ".$input["id_pegawai"]
			, $message, getLoggedInUserDb()['id'], "update pegawai absensi approval");

		/* return json */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

}

/* End of file AbsensiOvertime.php */
/* Location: ./application/controllers/boxing/AbsensiOvertime.php */