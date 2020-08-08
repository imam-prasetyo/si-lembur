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
		
		/** check session user login */
		if (!isLoggedInUser()) {
            redirect(base_url(getConfigWebsite()["user_panel"]));
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
		$this->load->view('pub/overtime/index', $data);
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
			// $this->form_validation->set_rules("txtIdPegawai", "Id Pegawai", "trim|required|callback_pegawai_duplicate_input");
			$this->form_validation->set_rules("txtTanggalLembur", "Tanggal Lembur", "trim|callback_pegawai_duplicate_input|callback_tanggal_lembur_input");
			// $this->form_validation->set_rules("txtJamSelesai", "Jam Selesai", "trim|required");
			$this->form_validation->set_rules("txtAlasanLembur", "Alasan Lembur", "trim|required");
			
			/** set error delimiter */
			$this->form_validation->set_error_delimiters('', '');

			/** run validation */
			if (!$this->form_validation->run()) {
				$output['error_status'] = true;
				// $output["error_input"][] = "txtIdPegawai";
				// $output["error_string"][] = form_error('txtIdPegawai');
				$output["error_input"][] = "txtTanggalLembur";
				$output["error_string"][] = form_error('txtTanggalLembur');
				// $output["error_input"][] = "txtJamMulai";
				// $output["error_string"][] = form_error('txtJamMulai');
				// $output["error_input"][] = "txtJamSelesai";
				// $output["error_string"][] = form_error('txtJamSelesai');
				$output["error_input"][] = "txtAlasanLembur";
				$output["error_string"][] = form_error('txtAlasanLembur');
			} else {
				/** input post */
				$txtIdPegawai = htmlspecialchars($this->input->post("txtIdPegawai", true), ENT_QUOTES);
				$txtTanggalLembur = htmlspecialchars($this->input->post("txtTanggalLembur", true), ENT_QUOTES);
				$txtJamMulai = htmlspecialchars($this->input->post("txtJamMulai", true), ENT_QUOTES);
				$txtJamSelesai = htmlspecialchars($this->input->post("txtJamSelesai", true), ENT_QUOTES);
				$txtAlasanLembur = htmlspecialchars($this->input->post("txtAlasanLembur", true), ENT_QUOTES);
			}

			if(!$output['error_status']) {
				/** field insert */
				$input["id_pegawai"] = $txtIdPegawai;
				$input["jam_mulai"] = $txtJamMulai;
				$input["jam_selesai"] = $txtJamSelesai;
				$input["tanggal_trx_lembur"] = $txtTanggalLembur; // date('Y-m-d');
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

		$output["uri"] = base_url(getConfigWebsite()["user_panel"].'/overtime-history');
		
		/** set log */
		activityLog(getLoggedInUserDb()['id'], "create input lembur", "create input lembur : ".$input['id_pegawai'] . " " .$input["tanggal_trx_input"]
			, $message, getLoggedInUserDb()['id'], "create input lembur");

		/* return json */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method pegawai_duplicate_input
	 */
	public function pegawai_duplicate_input() {
		$txtIdPegawai = htmlspecialchars($this->input->post('txtIdPegawai', true), ENT_QUOTES);
		$txtTanggalLembur = htmlspecialchars($this->input->post('txtTanggalLembur', true), ENT_QUOTES);

		if(!$this->validateDate($txtTanggalLembur, 'Y-m-d')) {
			$this->form_validation->set_message('pegawai_duplicate_input', 'Invalid format date');
			return false;
		}

		/** query select */
		$query = $this->PublicModel->get_data_by_condition(array(), "t_trx_lembur", array()
			, array("id_pegawai = '".$txtIdPegawai."'", "tanggal_trx_lembur = '".$txtTanggalLembur."'"), "AND", array()
			, 0);

		if(count($query) <= 0) {
			return true;
		} else {
			$this->form_validation->set_message('pegawai_duplicate_input', 'Data already exist.');
			return false;
		};
	}

	/**
	 * @method tanggal_lembur_input
	 */
	public function tanggal_lembur_input() {
		$txtTanggalLembur = htmlspecialchars($this->input->post('txtTanggalLembur', true), ENT_QUOTES);
		if(!$this->validateDate($txtTanggalLembur, 'Y-m-d')) {
			$this->form_validation->set_message('tanggal_lembur_input', 'Invalid format date');
			return false;
		}
		$datetime1 = date_create($txtTanggalLembur);
		$datetime2 = date_create(date('Y-m-d'));
		$interval = date_diff($datetime1, $datetime2);
		if($interval->format('%R%a') < 0) { 
			$this->form_validation->set_message('tanggal_lembur_input', 'Tanggal lebih besar dari hari ini.');
			return false;
		}
		return true;
	}

	/**
	 * @method validateDate
	 * @param array $date Input datetime
	 * @param array $format Format datetime
	 */
	private function validateDate($date, $format = 'Y-m-d H:i:s') {
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}

}

/* End of file Overtime.php */
/* Location: ./application/controllers/pub/Overtime.php */