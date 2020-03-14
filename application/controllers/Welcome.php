<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->_access();
	}

	/**
	 * @method _access
	 * @param array $data Array list of data
	 */
	private function _access($data=null) {
		/** get data config website */
		$data["config_web"] = getConfigWebsite();

		/** get url web */
		$data["url_web"] = getConfigUrl();

		/** set default page */
		if (!isset($data["page"])) {
			$data["page"] = "default";
			$data["title"] = "Index";
		}

		/** set array to view */
		$data["data"] = $data;

		$data["data"]["title"] = setTitlePage("-", $data["data"]["title"]);

		switch($data["data"]["page"]) {
			case "absensi";
				$this->load->view('main/absensi', $data);
				break;			
			default:
				$this->load->view('main/index', $data);
				break;
		}
	}

		/**
	 * @method controlPage
	 * @param string $case Control all action page
	 * @param string $params_1
	 * @param string $params_2
	 */
	function controlPage($case=null, $params_1=null, $params_2=null) {
		$data["title"] = $case;
		$data["page"] = $case;
		switch($case) {
			default:
				$data["th"] = $this->_getHeader($case);
				break;
		}
		$data["params_1"] = $params_1;
		$data["params_2"] = $params_2;
		$this->_access($data);
	}

	/**
	 * @method _getHeader
	 * @param string $case Case page
	 */
	private function _getHeader($case=null) {
		$output = array();
		switch($case) {
			case "absensi";
				$output = $this->_getRow($case);
				break;
			default:
				exit();
				break;
		}
		/** set header */
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
		/** set return */
		return $header;
	}

	/**
	 * @method _getRow
	 * @param string $case Case page
	 */
	private function _getRow($case=null) {
		$output = array();

		$dataTable = "";
		$dataRow = array();
		$dataRowKey = array();
		$dataHeader = $dataRow;
		$dataCondition = array();
		$dataOperand = "";
		$dataJoin = array();

		switch($case) {
			case "absensi";
				$dataTable = "pegawai";
				$dataRow = array("id_pegawai", "npp", "nama_pegawai");
				$dataRowKey = array_splice($dataRow, 0, 1);
				$dataHeader = $dataRow;
				$dataCondition = array();
				$dataOperand = "OR";
				$dataJoin = array();			
				break;
		}

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
	public function pagination($case=null) {
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
		$paramTable = $this->_getRow($case);
		$field = array_merge($paramTable["key"], $paramTable["header"]);
		$tableName = $paramTable["table"];
		$condition =  $paramTable["condition"];
		$operand =  $paramTable["operand"];
		$join =  $paramTable["join"];

		$conditions = array();
		if(is_array($condition) && count($condition) > 0) {
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
			, $rowperpage
		);

		/** set output */
		$output['draw'] = (isset($postData['draw']) ? $postData['draw'] : 0);
		$output['recordsTotal'] = $recordsTotal;
		$output['recordsFiltered'] = $recordsFiltered;
		$output['data'] = $recordsData;

		/** output */
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	/**
	 * @method _paramTable
	 * @param string @case Case action
	 */
	private function _paramTable($case=null) {
		/** set as return */
		$output = array();
		/** case page */
		switch($case) {
			case "absensi";
				$output["tableName"] = "pegawai";
				$output["tableNameInUsed"] = "";
				$output["key"] = "id_pegawai";
				$output["row"] = array();
				break;
			case "absensi-overtime";
				$output["tableName"] = "trx_lembur";
				$output["tableNameInUsed"] = "";
				$output["key"] = "id_trx_lembur";
				$output["row"] = array();
				break;				
		}
		/** return */ 
		return $output;
	}

	/**
	 * @method insert
	 * @param string @case Case action
	 */
	function insert($case=null) {
		$paramTable = $this->_paramTable($case);
		$tableName = $paramTable["tableName"];

		/** set as return */
		$output = array();
		/** case page */
		switch($case) {

			case "absensi-overtime";
				$output['status'] = true;
				$output['inputerror'] = array();
				$output['error_string'] = array();
				$input = array();
				try {
					/** set validation rules */
					// $this->form_validation->set_rules("txtIdPegawai", "Id Pegawai", "callback_");
					$this->form_validation->set_rules("txtJamSelesai", "Jam Selesai", "trim|required");
					$this->form_validation->set_rules("txtAlasanLembur", "Alasan Lembur", "trim|required|min_length[4]");

					/** set error delimiter */
					$this->form_validation->set_error_delimiters('', '');

					/** run validation */
					if (!$this->form_validation->run()) {
						$output['status'] = false;
						$output["inputerror"][] = "txtNPP";
						$output["error_string"][] = form_error('txtIdPegawai');
						$output["inputerror"][] = "txtJamSelesai";
						$output["error_string"][] = form_error('txtJamSelesai');
						$output["inputerror"][] = "txtAlasanLembur";
						$output["error_string"][] = form_error('txtAlasanLembur');					

						/** set output to view */
						$this->output
							->set_content_type('application/json')
							->set_output(json_encode($output));
					} else {
						/** input post */
						$txtIdPegawai = htmlspecialchars($this->input->post("txtIdPegawai"));
						$txtJamMulai = htmlspecialchars($this->input->post("txtJamMulai"));
						$txtJamSelesai = htmlspecialchars($this->input->post("txtJamSelesai"));
						$txtAlasanLembur = htmlspecialchars($this->input->post("txtAlasanLembur"));
					}

					if($output['status'] == true) {
						/** field insert */
						$input["id_pegawai"] = $txtIdPegawai;
						$input["jam_mulai"] = getConfigWebsite()["jam_mulai"];
						$input["jam_selesai"] = $txtJamSelesai;
						$input["tanggal_trx_lembur"] = date('Y-m-d H:i:s');
						$input["alasan_trx_lembur"] = $txtAlasanLembur;

						$this->PublicModel->insert_query($tableName, $input);

						/** set url redirect */
						$output["uri"] = site_url($case);
					}
				} catch (Exception $e) {
					$output['status'] = false;
					$output["inputerror"][] = "catcher";
					$output['error_string'][] = $e->getMessage();
				}

				/* return json */
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
				break;

			default:
				redirect(site_url());
				break;
		}

		/* return json */
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	/**
	 * @method select
	 * @param string @case Case action
	 */
	function select($case=null, $id=null) {
		// if(isLoggedInUser()) {
			$output['status'] = true;
			try {
				/** check id */
				$paramTable = $this->_paramTable($case);
				/** query select */
				$query = $this->PublicModel->get_data_by_id($paramTable["row"], $paramTable["tableName"], $paramTable["key"], $id);
				if(is_null($query[0][$paramTable["key"]])) {
					$output['status'] = false;
					$output['error_string'] = getErrorCode("011", "", "");
				} else {
					/* data selected */
					$output["result"] = $query[0];
					$output['error_string'] = getErrorCode("012", "", "");
				}
			} catch (Exception $e) {
				$output['status'] = false;
				$output['error_string'] = $e->getMessage();
			}
		// } else {
		// 	$output['status'] = false;
		// 	$output['error_string'] = getErrorCode("001", "", "");
		// }
		/* return json */
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

}
