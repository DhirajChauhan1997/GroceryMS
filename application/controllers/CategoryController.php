<?php
//defined('BASEPAHT') or exit('No direct script access Allowed');

class CategoryController extends CI_Controller
{

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('CategoryModel');
	// 	$this->load->library('pagination');
	// 	// Per page limit 
	// 	//$this->perPage = 10; 
	// }

	function __construct()
	{
		parent::__construct();
		$this->load->model('CategoryModel');
		$this->load->library('Ajax_pagination');
		// Load form helper and library
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->perPage = 5;
	}

	public function index()
	{
		$data = array();

		//total rows count
		$totalRec = count($this->CategoryModel->getRows());

		//pagination configuration
		$config['target']      = '#postList';
		$config['base_url']    = base_url() . 'category/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);

		//get the posts data
		$data['datalst'] = $this->CategoryModel->getRows(array('limit' => $this->perPage));

		//load the view
		$this->load->view('layouts/header');
		$this->load->view('categorys/index', $data);
		$this->load->view('layouts/footer');
		// $this->load->view('posts/index', $data);
	}

	function ajaxPaginationData()
	{
		$conditions = array();

		//calc offset number
		$page = $this->input->post('page');
		if (!$page) {
			$offset = 0;
		} else {
			$offset = $page;
		}

		//set conditions for search
		$keywords = $this->input->post('keywords');
		$sortBy = $this->input->post('sortBy');
		if (!empty($keywords)) {
			$conditions['search']['keywords'] = $keywords;
		}
		if (!empty($sortBy)) {
			$conditions['search']['sortBy'] = $sortBy;
		}

		//total rows count
		$totalRec = count($this->post->getRows($conditions));

		//pagination configuration
		$config['target']      = '#postList';
		$config['base_url']    = base_url() . 'posts/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);

		//set start and limit
		$conditions['start'] = $offset;
		$conditions['limit'] = $this->perPage;

		//get posts data
		$data['posts'] = $this->post->getRows($conditions);

		//load the view
		// $this->load->view('posts/ajax-pagination-data', $data, false);

		$this->load->view('layouts/header');
		$this->load->view('categorys/index', $data, false);
		$this->load->view('layouts/footer');
	}


	public function index1()
	{
		$categore = new CategoryModel;

		$data['datalst'] = $categore->getAllCategory(10);
		$config["base_url"] = base_url() . "index.php/categorys";

		$config = array();
		$total_row = $categore->recordCount();
		$config["total_rows"] = $total_row;
		$config["per_page"] = 1;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
		} else {
			$page = 1;
		}
		$data["results"] = $categore->getAllCategory($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links);


		$this->load->view('layouts/header');
		$this->load->view('categorys/index', $data);
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$this->load->view('layouts/header');
		$this->load->view('categorys/create');
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$categore = new CategoryModel;
		$categore->createCategory();
		redirect(base_url('categorys'));
	}

	public function edit($id)
	{
		$this->load->model('CategoryModel');
		$categore['data'] = $this->CategoryModel->getCategoryById($id);

		$this->load->view('layouts/header');
		$this->load->view('categorys/edit', $categore);
		$this->load->view('layouts/footer');
	}

	public function update()
	{
		$categore = new CategoryModel;
		$categore->updateCategory();
		redirect(base_url('categorys'));
	}

	public function delete($id)
	{
		$categore = new CategoryModel;
		$categore->DeleteCategory($id);
		redirect(base_url('categorys'));
	}


	public function storeFile()
	{
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('profile_image')) {
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('files/upload_form', $error);
		} else {
			$data = array('image_metadata' => $this->upload->data());

			$this->load->view('files/upload_result', $data);
		}
	}
}
