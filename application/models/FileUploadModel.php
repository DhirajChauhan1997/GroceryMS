<?php
class FileUploadModel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->database();
	}

	public function insert_img($data_insert)
	{
		$this->db->insert('table', $data_insert);
	}
}
