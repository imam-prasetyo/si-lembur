<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * AbsensiOvertimeReport.php
 *
 * Controller
 *
 * @category   Controller
 * @package    AbsensiOvertimeReport
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class AbsensiOvertimeReport extends CI_Controller {

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
		$data["last_date_trx_lembur"] = $this->_lastDateTrxLembur();
		
		/** set array to view */
		$data["data"] = $data;

		/** load data to view */
		$this->load->view('boxing/absensi-overtime-report/index', $data);
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
	 * @method print
	 */
	public function print() {
		// $data = array(
		// 	"dataku" => array(
		// 		"nama" => "Petani Kode",
		// 		"url" => "http://petanikode.com"
		// 	)
		// );

		// $this->pdf->setPaper('A4', 'potrait');
		// $this->pdf->filename = "laporan.pdf";
		// $this->pdf->load_view('boxing/absensi-overtime-report/template-print', $data);

		$output['error_status'] = false;
		$output['error_input'] = array();
		$output['error_string'] = array();
		$input = array();
		$message = "";
		
		try {
			/** set validation rules */
			$this->form_validation->set_rules("txtIdDivisi", "Divisi", "trim|required");
			$this->form_validation->set_rules("txtIdPegawai", "User Approval", "trim|required");
			$this->form_validation->set_rules("txtTanggalLembur", "Tanggal Lembur", "trim|required|callback_tanggal_lembur_input");
			
			/** set error delimiter */
			$this->form_validation->set_error_delimiters('', '');

			/** run validation */
			if (!$this->form_validation->run()) {
				$output['error_status'] = true;
				$output["error_input"][] = "txtIdDivisi";
				$output["error_string"][] = form_error('txtIdDivisi');
				$output["error_input"][] = "txtIdPegawai";
				$output["error_string"][] = form_error('txtIdPegawai');
				$output["error_input"][] = "txtTanggalLembur";
				$output["error_string"][] = form_error('txtTanggalLembur');
			} else {
				/** input post */
				$txtIdDivisi = htmlspecialchars($this->input->post("txtIdDivisi", true), ENT_QUOTES);
				$txtIdPegawai = htmlspecialchars($this->input->post("txtIdPegawai", true), ENT_QUOTES);
				$txtTanggalLembur = htmlspecialchars($this->input->post("txtTanggalLembur", true), ENT_QUOTES);
			}

			if(!$output['error_status']) {
				/** print data */
				$headerReport = $this->PublicModel->get_data_by_condition(array(), "t_config", array()
					, array("name = 'header_report_overtime'"), "AND", array()
					, 1);

				$divisi = $this->PublicModel->get_data_by_condition(array(), "t_divisi", array()
					, array("id = '".$txtIdDivisi."'"), "AND", array()
					, 1);

				$trxApproval =  $this->PublicModel->get_data_by_condition(array(), "vw_absensi_approval", array()
					, array("id_pegawai = '".$txtIdPegawai."'"), "AND", array()
					, 1);

				$trxLembur =  $this->PublicModel->get_data_by_condition(array(), "vw_trx_lembur_today", array()
					, array("id_divisi = '".$txtIdDivisi."'", "tanggal_lembur = '".$txtTanggalLembur."'"), "AND", array()
					, 0);

				if(count($divisi) > 0 && count($trxApproval) > 0 && count($trxLembur) > 0) {
					$data["headerReport"] = $headerReport[0]["value"];
					$data["divisi"] = $divisi[0]["divisi"];
					$data["divisiDeskripsi"] = $divisi[0]["deskripsi"];
					$data["namaApproval"] = $trxApproval[0]["nama_pegawai"];
					$data["jabatanApproval"] = $trxApproval[0]["jabatan"];
					$data["trxLembur"] = $trxLembur;

					$this->pdf->setPaper('A4', 'potrait');
					$this->pdf->filename = $divisi[0]["divisi"]."-".$txtTanggalLembur."-".date('Y-m-d H:i:s').".pdf";
					$this->pdf->load_view('boxing/absensi-overtime-report/template-print', $data);
				} else {
					$output['error_status'] = true;
				}

				$message = "Generate Print Report Overtime";
			}
		} catch (Exception $e) {
			$output['error_status'] = true;
			$output["error_input"][] = "catcher";
			$output['error_string'][] = $e->getMessage();
		}
		
		/** set log */
		activityLog(getLoggedInUserDb()['id'], "print report", "print report : ".$txtIdDivisi." ".$txtTanggalLembur
			, $message, getLoggedInUserDb()['id'], "print report");

		/* return json */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method tanggal_lembur_input
	 */
	public function tanggal_lembur_input() {
		$txtTanggalLembur = $this->input->post('txtTanggalLembur', true);
		if(!$this->validateDate($txtTanggalLembur, 'Y-m-d')) {
			$this->form_validation->set_message('tanggal_lembur_input', 'Invalid format date. '.$txtTanggalLembur);
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

/* End of file AbsensiOvertimeReport.php */
/* Location: ./application/controllers/boxing/AbsensiOvertimeReport.php */