<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PublicModel
 *
 * Model
 *
 * @category   Model
 * @package    PublicModel
 * @author     Chandra Nala Budi Satria
 * @copyright  dev.nalachandra@gmail.com
 * @since      2019
 */

class PublicModel extends CI_Model {
	
	/**
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * @method counter_all
	 * @param string @tableName table name
	 * @param string @join join table
	 */
	public function counter_all($tableName=NULL, $join=NULL) {
		if(count($join) > 0) {
			foreach ($join as $item) {
				/** $item : "table_join| main_table.field_join = table_join.field_join" */
				$tableJoin = explode("|", $item);
				if(count($tableJoin) <= 2) {
					$this->db->join($tableJoin[0], $tableJoin[1]);
				} else {
					$this->db->join($tableJoin[0], $tableJoin[1], $tableJoin[2]);
				}
			}
		}
		return $this->db->count_all($tableName);
	}

	/**
	 * @method counter_data
	 * @param string @field selected field
	 * @param string @tableName table name
	 * @param string @join join table
	 * @param string @condition condition query
	 * @param string @operand operand query
	 */
	function counter_data($field=NULL
		,$tableName=NULL
		,$join=NULL
		,$condition=NULL
		,$operand=NULL
	) {
		$search = "";

		try {
			$this->db->from($tableName);

			/** custom join table */
			if(count($join) > 0) {
				foreach ($join as $item) {
					$tableJoin = explode("|", $item);
					if(count($tableJoin) <= 2) {
						$this->db->join($tableJoin[0], $tableJoin[1]);
					} else {
						$this->db->join($tableJoin[0], $tableJoin[1], $tableJoin[2]);
					}
				}
			}
			
			/** custom field condition */
			if(count($condition) > 0) {
				$this->db->where('1=1');
				$search .= ' ' . implode(" ".$operand." ", $condition);
				$this->db->where($search);
			}

			return $this->db->count_all_results();
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	 * @method get_all_data
	 * @param string @field selected field
	 * @param string @tableName table name
	 * @param string @join join table
	 * @param string @condition condition query
	 * @param string @operand operand query
	 * @param string @orderField field order
	 * @param string @orderAscDesc ordering data
	 * @param string @page selected index limit data
	 * @param string @perpage total data limit data
	 */
	function get_all_data($field=NULL
		,$tableName=NULL
		,$join=NULL
		,$condition=NULL
		,$operand=NULL
		,$orderField=NULL
		,$orderAscDesc=NULL
		,$page=NULL 
		,$perpage=NULL
	) {
		$fieldSelect = "";
		$search = "";

		try {

			if(count($field) > 0) {
				$fieldSelect .= '' . implode(', ', $field);
			} else {
				$fieldSelect .= '*';
			}

			$this->db->select($fieldSelect);
			$this->db->from($tableName);

			/** custom join table */
			if(count($join) > 0) {
				foreach ($join as $item) {
					/** $item : "table_join| main_table.field_join = table_join.field_join" */
					$tableJoin = explode("|", $item);
					if(count($tableJoin) <= 2) {
						$this->db->join($tableJoin[0], $tableJoin[1]);
					} else {
						$this->db->join($tableJoin[0], $tableJoin[1], $tableJoin[2]);
					}
				}
			}
			
			/** custom field condition */
			if(count($condition) > 0) {
				$this->db->where('1=1');
				$search .= ' ' . implode(" ".$operand." ", $condition);
				$this->db->where($search);
			}

			/** order data */
			if(!empty($orderField)) {
				if(empty($orderAscDesc)) {
					$orderAscDesc = "ASC";
				}
				$this->db->order_by($orderField, $orderAscDesc);
			}

			/** limit data */
			if(!empty($perpage) || $perpage >= 0) {
				$this->db->limit($perpage, $page);
			}

			$query = $this->db->get();
			$data = array();
			if($query !== FALSE && $query->num_rows() > 0){
				$data = $query->result_array();
			}
			return $data;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	/**
	 * @method get_data_by_condition
	 * @param string @field selected field
	 * @param string @tableName table name
	 * @param string @join join table
	 * @param string @condition condition query
	 * @param string @operand operand query
	 * @param string @orderBy field order
	 * @param string @limit limit data
	 */	
	function get_data_by_condition($field=NULL
		,$tableName=NULL
		,$join=NULL
		,$condition=NULL
		,$operand=NULL
		,$orderBy=NULL
		,$limit=NULL
	) {
		$fieldSelect = "";
		$search = "";

		try {

			if(count($field) > 0 || !empty($field)) {
				$fieldSelect .= '' . implode(', ', $field);
			} else {
				$fieldSelect .= '*';
			}

			$this->db->select($fieldSelect);
			$this->db->from($tableName);

			/** custom join table */
			if(count($join) > 0) {
				foreach ($join as $item) {
					$tableJoin = explode("|", $item);
					if(count($tableJoin) <= 2) {
						$this->db->join($tableJoin[0], $tableJoin[1]);
					} else {
						$this->db->join($tableJoin[0], $tableJoin[1], $tableJoin[2]);
					}
				}
			}

			/** custom field condition */
			if(count($condition) > 0) {
				$this->db->where('1=1');
				$search .= ' ' . implode(" ".$operand." ", $condition);
				$this->db->where($search);
			}

			/** custom order table */
			if(count($orderBy) > 0) {
				foreach ($orderBy as $item) {
					$tableOrder = explode("|", $item);
					if(count($tableOrder) <= 2) {
						$this->db->order_by($tableOrder[0], $tableOrder[1]);
					} else {
						$this->db->order_by($tableOrder[0], $tableOrder[1], $tableOrder[2]);
					}
				}
			}

			/** limit data */
			if(!empty($limit) || $limit > 0) {
				$this->db->limit($limit);
			}

			$query = $this->db->get();
			$data = array();
			if($query !== FALSE && $query->num_rows() > 0){
				$data = $query->result_array();
			}
			return $data;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}	

	/**
	 * @method get_data_in_used
	 * @param string @tableName table name
	 * @param string @field selected field
	 * @param string @id id data
	 */	
	function get_data_in_used($tableName=NULL, $field=NULL, $id=NULL) {
		$this->db->from($tableName);
		$this->db->where($field, $id);
		return $this->db->count_all_results();
	}

	/**
	 * @method get_data_by_id
	 * @param string @field selected field
	 * @param string @tableName table name
	 * @param string @key field key
	 * @param string @id id data
	 */	
	function get_data_by_id($field=NULL
		, $tableName=NULL
		, $key=NULL
		, $id=NULL
	) {
		$query = array();
		$fieldSelect = "";
		if (count($field) > 0) {
			$fieldSelect .= '' . implode(', ', $field);
		} else {
			$fieldSelect .= '*';
		}
		$this->db->select($fieldSelect);
		$this->db->from($tableName);
		$this->db->where($key, $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			$data = $query->result_array();
		}
		return $data;
	}

	/**
	 * @method insert_query
	 * @param string @tableName table name
	 * @param string @input input array data
	 */	
	function insert_query($tableName=NULL, $input=NULL) {
		if(!empty($tableName)) {
			if(count($input) > 0) {
				$this->db->insert($tableName, $input);
			}
		}
	}

	/**
	 * @method update_query
	 * @param string @tableName table name
	 * @param string @field field key
	 * @param string @id id data
	 * @param string @input input array data
	 */	
	function update_query($tableName=NULL
		, $field=NULL
		, $id=NULL
		, $input=NULL
	) {
		if(!empty($id)) {
			if(!empty($input)) {
				$this->db->where($field, $id);
				$this->db->update($tableName, $input);
			}
		}
	}

	/**
	 * @method delete_query
	 * @param string @tableName table name
	 * @param string @condition condition query
	 * @param string @operand operand query
	 */	
	function delete_query($tableName=NULL, $condition=NULL, $operand=NULL) {
		$search = "";
		if(!empty($tableName) && (count($condition) > 0) && !empty($operand)) {
			/** custom field condition */
			if(count($condition) > 0) {
				$this->db->where('1=1');
				$search .= ' ' . implode(" ".$operand." ", $condition);
				$this->db->where($search);
			}
			$this->db->delete($tableName);
		}
	}

}

/* End of file PublicModel.php */
/* Location: ./application/models/PublicModel.php */