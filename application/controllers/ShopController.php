<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ShopController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ShopModel');
	}

	function index()
	{

		$this->load->view('layouts/saller/header');
		$this->load->view('shop/index');
		$this->load->view('layouts/saller/footer');
	}

	public function createNew()
	{
		//shoptypes
		$data['shoptypes'] = $this->ShopModel->get_shoptypes()->result();
		$data['states'] = $this->ShopModel->get_states()->result();

		$this->load->view('layouts/saller/header');
		$this->load->view('shop/createNew', $data);
		$this->load->view('layouts/saller/footer');
	}

	function get_city()
	{
		echo 'In side get city method';
		$category_id = $this->input->post('id', TRUE);
		$data = $this->ShopModel->get_city($category_id)->result();
		echo json_encode($data);
	}
}
