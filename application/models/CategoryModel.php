<?php
class CategoryModel extends CI_Model
{

	// public function __construct()
	// {
	// 	parent::__construct;
	// }
	//count all record of this table


	/*
     * get rows from the posts table
     */
	function getRows($params = array())
	{
		$this->db->select('*');
		$this->db->from('gms_main_category');
		//filter data by searched keywords
		if (!empty($params['search']['keywords'])) {
			$this->db->like('title', $params['search']['keywords']);
		}
		//sort data by ascending or desceding order
		if (!empty($params['search']['sortBy'])) {
			$this->db->order_by('title', $params['search']['sortBy']);
		} else {
			$this->db->order_by('cat_id', 'desc');
		}
		//set start and limit
		if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
			$this->db->limit($params['limit'], $params['start']);
		} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
			$this->db->limit($params['limit']);
		}
		//get records
		$query = $this->db->get();
		//return fetched data
		return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
	}


	public function recordCount()
	{
		return $this->db->count_all('gms_main_category');
	}
	function getMovies($limit = null, $offset = NULL)
	{
		$this->db->select("cat_id,cat_name,cat_logo");
		$this->db->from('gms_main_category');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	function totalMovies()
	{
		return $this->db->count_all_results('gms_main_category');
	}

	public function getAllCategory($limit)
	{
		$this->db->limit($limit);
		if (!empty($this->input->get("search"))) {
			$this->db->like('cat_name', $this->input->get("search"));
		}

		$query = $this->db->get("gms_main_category");
		// if ($query->num_rows() > 0) {
		// 	foreach ($query->result() as $row) {
		// 		$data[] = $row;
		// 	}
		// 	return $data;
		// }
		return $query->result();
	}
	public function createCategory()
	{
		$data = array(
			'cat_name' => $this->input->post('cat_name'),
			'cat_logo' => $this->input->post('cat_logo')
		);
		return $this->db->insert('gms_main_category', $data);
	}
	public function DeleteCategory($id)
	{
		$this->db->where('cat_id', $id);
		$this->db->delete('gms_main_category');
	}
	public function getCategoryById($id)
	{
		$this->db->where('cat_id', $id);
		$result = $this->db->get('gms_main_category');
		return $result->row_array();
	}
	public function update()
	{
		$this->db->where('cat_id', $this->input->post('cat_id'));
		$data = array(
			'cat_name' => $this->input->post('cat_name'),
			'cat_logo' => $this->input->post('cat_logo')
		);
		$this->db->update('gms_main_category', $data);
	}
	public function updateCategory()
	{
		$this->db->where('cat_id', $this->input->post('cat_id'));
		$data = array(
			'cat_name' => $this->input->post('cat_name'),
			'cat_logo' => $this->input->post('cat_logo')
		);
		return $this->db->update('gms_main_category', $data);
	}
}
