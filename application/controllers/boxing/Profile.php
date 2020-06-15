<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Profile.php
 *
 * Controller
 *
 * @category   Controller
 * @package    Profile
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class Profile extends CI_Controller {

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
		$this->_access();
	}

	/**
	 * @method _access
	 * @param array $data Array list of data
	 */
	private function _access($data=null) {
		/** set array to view */
		$data["data"] = $data;

		/** get data config website */
		$data["data"]["config_web"] = getConfigWebsite();

		/** get url web */
		$data["data"]["url_web"] = getConfigUrl();

		/** get user data */
		$data["data"]["session"] = getLoggedInUser();
		$data["data"]["user_login"] = getLoggedInUserDb();

		/** get breadcrumb */
		$data["data"]["breadcrumb"] = getBreadcrumb();

		/** set title page */
		$data["data"]["title"] = setTitlePage(getConfigUrl()["function"], "-");

		/** load data to view */
		$this->load->view('boxing/profile/profile', $data);
	}

	/**
	 * @method update_profile
	 */
	public function update_profile() {
		$output['error_status'] = false;
		$output['error_input'] = array();
		$output['error_string'] = array();
		$message = "";
		$input = array();
		$path_upload = "/img/profile/";

		/** set validation rules */
		$this->form_validation->set_rules("txtFirstNameUpdate", "First Name", "trim|required|min_length[4]");
		$this->form_validation->set_rules("txtLastNameUpdate", "Last Name", "trim|required|min_length[4]");

		/** set error delimiter */
		$this->form_validation->set_error_delimiters('', '');
		
		/** run validation */
		if(!$this->form_validation->run()) {
			$output['error_status'] = true;
			$output["error_input"][] = "txtFirstNameUpdate";
			$output["error_string"][] = form_error('txtFirstNameUpdate');
			$output["error_input"][] = "txtLastNameUpdate";
			$output["error_string"][] = form_error('txtLastNameUpdate');
		} else {
			/** input post */
			$txtIdUpdate = str_replace("'", "", htmlspecialchars($this->input->post('txtIdUpdate', true), ENT_QUOTES));
			$txtFirstNameUpdate = str_replace("'", "", htmlspecialchars($this->input->post('txtFirstNameUpdate', true), ENT_QUOTES));
			$txtLastNameUpdate = str_replace("'", "", htmlspecialchars($this->input->post('txtLastNameUpdate', true), ENT_QUOTES));
			$txtImageUpdate = str_replace("'", "", htmlspecialchars($this->input->post("txtImageUpdate"), ENT_QUOTES));
			$chkRemoveImage = str_replace("'", "", htmlspecialchars($this->input->post("chkRemoveImage"), ENT_QUOTES));

			/** remove image */
			if ($chkRemoveImage) {
				/** default image file */
				$input["image"] = "default.png";

				/** delete file */
				if($txtImageUpdate != "default.png") {
					$filename = explode(".", $txtImageUpdate)[0];
					array_map('unlink', glob(FCPATH.$path_upload."/large/$filename.*"));
					array_map('unlink', glob(FCPATH.$path_upload."/medium/$filename.*"));
					array_map('unlink', glob(FCPATH.$path_upload."/small/$filename.*"));
				}
			} else {
				if (!empty($_FILES['update']['name'])) {
					/** upload image */
					$config['upload_path']= ".".$path_upload;
					$config['allowed_types']= 'gif|jpg|png';
					$config['overwrite'] = true;
					$config['encrypt_name'] = true;
					// $config['max_size'] = '512';
					
					$this->upload->initialize($config);

					if (!$this->upload->do_upload("update")) {
						/** set status error */
						$output['error_status'] = true;
						$output['error_input'][] = "update";
						$output['error_string'][] = $this->upload->display_errors('', '');
					} else {
						/** array data upload */
						$upload = $this->upload->data();

						/** create thumbnail */
						$this->_create_thumbs($path_upload, $upload['file_name'], $upload["image_height"]
							, $upload["image_width"]);
						
						/** set image data user */
						$input["image"] = $upload['file_name'];
						
						/** delete updload file image */
						$filename = explode(".", $upload['file_name'])[0];
						array_map('unlink', glob(FCPATH.$path_upload."$filename.*"));
						if($txtImageUpdate != "default.png") {
							array_map('unlink', glob(FCPATH.$path_upload."/large/".$txtImageUpdate));
							array_map('unlink', glob(FCPATH.$path_upload."/medium/".$txtImageUpdate));
							array_map('unlink', glob(FCPATH.$path_upload."/small/".$txtImageUpdate));
						}
					}
				}
			}

			if (!$output['error_status']) {
				/** update user data */
				$input["first_name"] = $txtFirstNameUpdate;
				$input["last_name"] = $txtLastNameUpdate;
				$input["full_name"] = $txtFirstNameUpdate." ".$txtLastNameUpdate;
				$input["date_update"] = date('Y-m-d H:i:s');

				$this->PublicModel->update_query("t_user", "id", $txtIdUpdate
					, $input);

				/** set message */
				$message = "Success update data profile!";

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
		activityLog($txtIdUpdate, "update profile", "update profile"
			, $message, "system", "update profile");

		/** set url redirect */
		$output["uri"] = base_url(getConfigWebsite()["admin_panel"]."/profile");

		/** set output to view */
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}

	/**
	 * @method _create_thumbs
	 * @param array $file_name Image file name
	 * @param array $height Image height
	 * @param array $width Image width
	 */
	private function _create_thumbs($path_upload, $file_name, $height, $width) {
		/** Image resizing config */
		$config = array(
			/** Image Large */
			array(
				'image_library' => 'gd2',
				'source_image' => '.'.$path_upload.$file_name,
				'maintain_ratio'=> true,
				'width' => ($width / 2),
				'height' => ($height / 2),
				'new_image' => '.'.$path_upload.'large/'.$file_name
				),
			/** Image Medium */
			array(
				'image_library' => 'gd2',
				'source_image' => '.'.$path_upload.$file_name,
				'maintain_ratio'=> true,
				'width' => ($width / 4),
				'height' => ($height / 4),
				'new_image' => '.'.$path_upload.'medium/'.$file_name
				),
			/** Image Small */
			array(
				'image_library' => 'gd2',
				'source_image' => '.'.$path_upload.$file_name,
				'maintain_ratio'=> true,
				'width' => ($width / 8),
				'height' => ($height / 8),
				'new_image' => '.'.$path_upload.'small/'.$file_name
			)
		); 
		
		$this->load->library('image_lib', $config[0]);
		
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if (!$this->image_lib->resize()) {
                return false;
            }
            $this->image_lib->clear();
        }
    }

}

/* End of file Profile.php */
/* Location: ./application/controllers/boxing/Profile.php */