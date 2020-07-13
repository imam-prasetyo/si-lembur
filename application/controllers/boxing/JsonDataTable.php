<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * JsonDataTable.php
 *
 * Controller
 *
 * @category   Controller
 * @package    JsonDataTable
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2020
 */

class JsonDataTable extends CI_Controller {

    /**
     * @method __construct
     */
    public function __construct() {
        parent::__construct();

        // /** check session user login */
        // if (!isLoggedInUser()) {
        //     redirect(base_url(getConfigWebsite()["admin_panel"]));
        // };
    }

    /**
     * @method loadDataToHtml
     * @param array $data Array list of data
     */
    public function loadDataToHtml($data="") {
        $output = array();
        $post = $this->input->post();
        $conditions = array();

        if(is_array($post)) {
            $key = array_keys($post);
            $value = array_values($post);
            for($i = 0; $i < count($key); $i++) {
                $conditions[] = $key[$i]." = '".$value[$i]."'";
            }
        }

        $output["conditions"] = $conditions;

        if(!empty($data)) {
            switch($data) {
                case "divisi";
                    $condition = $conditions;
                    $field = array("id", "divisi");
                    $output["key"] = $field;
                    $output["html"] = $this->_dataLoad("t_divisi", "id", $field, $condition, "AND", 0);
                    break;
                case "unit";
                    $condition = $conditions;
                    $field = array("id", "unit");
                    $output["key"] = $field;
                    $output["html"] = $this->_dataLoad("t_unit", "id", $field, $condition, "AND", 0);
                    break;
                case "pegawai";
                    $condition = $conditions;
                    $field = array("id", "npp", "nama_pegawai");
                    $output["key"] = $field;
                    $output["html"] = $this->_dataLoad("t_pegawai", "id", $field, $condition, "AND", 0);
                    break;
                case "pegawai-absensi-approval";
                    $condition = $conditions;
                    $field = array("id", "npp", "nama_pegawai");
                    $output["key"] = $field;
                    $output["html"] = $this->_dataLoad("vw_pegawai_absensi_approval", "id", $field, $condition, "AND", 0);
                    break;
                case "jabatan";
                    $condition = $conditions;
                    $field = array("id", "jabatan");
                    $output["key"] = $field;
                    $output["html"] = $this->_dataLoad("t_jabatan", "id", $field, $condition, "AND", 0);
                    break;
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    /**
     * @method loadDataToHtml
     * @param string @tableName table name
     * @param string @dataRowKey primary key of table
     * @param string @field fields to show
     * @param string @condition query condition
     * @param string @limit limit data
     * @return array Return data array
     */
    private function _dataLoad($tableName=null, $dataRowKey=null, $field=null, $condition=null, $operand=null, $limit=0) {
        $join = array();
        // $operand = "AND";
        $orderBy = array();
        $limit = 0;
        $orderBy[] = $dataRowKey."|ASC";
        // get data by certain conditions
        $query = $this->PublicModel->get_data_by_condition($field, $tableName, $join
        , $condition, $operand, $orderBy
        , $limit);
        
        return $query;
    }

}

/* End of file JsonDataTable.php */
/* Location: ./application/controllers/boxing/JsonDataTable.php */