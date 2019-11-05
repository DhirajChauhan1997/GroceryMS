<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AuthModel extends CI_Model
{
	function __construct()
	{
		// Set table name
		$this->table = 'gms_users';
	}

	function validate($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->join('gms_role', 'gms_users.roleid = gms_role.role_id', 'inner');
		$result = $this->db->get('gms_users', 1);
		return $result;
	}
	public function insert($data = array())
	{
		if (!empty($data)) {
			// Add created and modified date if not included
			if (!array_key_exists("created", $data)) {
				$data['created'] = date("Y-m-d H:i:s");
			}
			if (!array_key_exists("modified", $data)) {
				$data['modified'] = date("Y-m-d H:i:s");
			}

			// Insert member data
			$insert = $this->db->insert($this->table, $data);

			// Return the status
			return $insert ? $this->db->insert_id() : false;
		}
		return false;
	}

	/*
     * Get rows from the users table
     */
	function getRows($params = array())
	{
		$this->db->select('*');
		$this->db->from($this->table);

		//fetch data by conditions
		if (array_key_exists("conditions", $params)) {
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (array_key_exists("id", $params)) {
			$this->db->where('id', $params['id']);
			$query = $this->db->get();
			$result = $query->row_array();
		} else {
			//set start and limit
			if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit'], $params['start']);
			} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit']);
			}

			if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
				$result = $this->db->count_all_results();
			} elseif (array_key_exists("returnType", $params) && $params['returnType'] == 'single') {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->row_array() : false;
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : false;
			}
		}

		//return fetched data
		return $result;
	}
}
