<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MainCategoryModel extends CI_Model
{
	function __construct()
	{
		// Set table name
		$this->table = 'gms_main_category';
	}

	/*
     * Fetch members data from the database
     * @param array filter data based on the passed parameters
     */
	function getRows($params = array())
	{
		$this->db->select('*');
		$this->db->from($this->table);

		if (array_key_exists("conditions", $params)) {
			foreach ($params['conditions'] as $key => $val) {
				$this->db->where($key, $val);
			}
		}

		if (!empty($params['searchKeyword'])) {
			$search = $params['searchKeyword'];
			$likeArr = array('cat_name' => $search);
			$this->db->or_like($likeArr);
		}

		if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
			$result = $this->db->count_all_results();
		} else {
			if (array_key_exists("id", $params)) {
				$this->db->where('cat_id', $params['id']);
				$query = $this->db->get();
				$result = $query->row_array();
			} else {
				$this->db->order_by('cat_name', 'asc');
				if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
					$this->db->limit($params['limit'], $params['start']);
				} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
					$this->db->limit($params['limit']);
				}

				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
			}
		}

		// Return fetched data
		return $result;
	}

	public function getCategoryById($id)
	{
		$this->db->where('cat_id', $id);
		$result = $this->db->get('gms_main_category');
		return $result->row_array();
	}

	/*
     * Insert members data into the database
     * @param $data data to be insert based on the passed parameters
     */
	public function insert($data = array())
	{
		if (!empty($data)) {
			// Add created and modified date if not included
			if (!array_key_exists("created_at", $data)) {
				$data['created_at'] = date("Y-m-d H:i:s");
			}
			if (!array_key_exists("modified", $data)) {
				$data['updated_at'] = date("Y-m-d H:i:s");
			}

			// Insert member data
			$insert = $this->db->insert($this->table, $data);

			// Return the status
			return $insert ? $this->db->insert_id() : false;
		}
		return false;
	}

	public function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	/*
     * Update member data into the database
     * @param $data array to be update based on the passed parameters
     * @param $id num filter data
     */
	public function update($data, $id)
	{
		if (!empty($data) && !empty($id)) {
			// Add modified date if not included
			if (!array_key_exists("updated_at", $data)) {
				$data['updated_at'] = date("Y-m-d H:i:s");
			}

			// Update member data
			$update = $this->db->update($this->table, $data, array('cat_id' => $id));

			// Return the status
			return $update ? true : false;
		}
		return false;
	}

	/*
     * Delete member data from the database
     * @param num filter data based on the passed parameter
     */
	public function delete($id)
	{
		// Delete member data
		$delete = $this->db->delete($this->table, array('cat_id' => $id));

		// Return the status
		return $delete ? true : false;
	}
}
