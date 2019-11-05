<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProductModel extends CI_Model
{

	function __construct()
	{
		// Set table name
		$this->table = 'gms_products';
	}
	/*
     * Fetch members data from the database
     * @param array filter data based on the passed parameters
     */
	function getRows($params = array())
	{
		$this->db->select('gms_products.*,gms_brand.brand,gms_weight_unit.unit,gms_main_category.cat_name,gms_main_category.cat_id');
		$this->db->from($this->table);
		$this->db->join('gms_main_category', 'gms_main_category.cat_id = gms_products.cat_id', 'inner');
		$this->db->join('gms_brand', 'gms_brand.brand_id = gms_products.brand_id', 'inner');
		$this->db->join('gms_weight_unit', 'gms_weight_unit.weight_unit_id = gms_products.weight_unit_id', 'inner');


		if (array_key_exists("conditions", $params)) {
			foreach ($params['conditions'] as $key => $val) {
				$this->db->where($key, $val);
			}
		}

		if (!empty($params['searchKeyword'])) {
			$search = $params['searchKeyword'];
			$likeArr = array('product_name' => $search);
			$this->db->or_like($likeArr);
		}

		if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
			$result = $this->db->count_all_results();
		} else {
			if (array_key_exists("id", $params)) {
				$this->db->where('product_id', $params['id']);
				$query = $this->db->get();
				$result = $query->row_array();
			} else {
				$this->db->order_by('product_name', 'asc');
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

	/*
     * Insert members data into the database
     * @param $data data to be insert based on the passed parameters
     */
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
     * Update member data into the database
     * @param $data array to be update based on the passed parameters
     * @param $id num filter data
     */
	public function update($data, $id)
	{
		if (!empty($data) && !empty($id)) {
			// Add modified date if not included
			if (!array_key_exists("modified", $data)) {
				$data['modified'] = date("Y-m-d H:i:s");
			}

			// Update member data
			$update = $this->db->update($this->table, $data, array('product_id' => $id));

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
		$delete = $this->db->delete($this->table, array('product_id' => $id));

		// Return the status
		return $delete ? true : false;
	}

	public function getProductById($id)
	{
		$this->db->where('product_id', $id);
		$result = $this->db->get($this->table);
		return $result->row_array();
	}


	function get_category()
	{
		$query = $this->db->get('gms_main_category');
		return $query;
	}

	function get_sub_category($category_id)
	{
		$query = $this->db->get_where('gms_sub_category', array('cat_id' => $category_id));
		return $query;
	}

	public function getAllBrand()
	{
		$query = $this->db->get('gms_brand');
		return $query;
	}

	public function getAllWeightUnit()
	{
		$query = $this->db->get('gms_weight_unit');
		return $query;
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
	/**

	 * Manage index
	 *
	 * @return Response
	 */

	public function getAllCategory()
	{

		$states = $this->db->get("demo_state")->result();

		$this->load->view('myform', array('states' => $states));
	}
}
