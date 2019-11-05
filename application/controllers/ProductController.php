<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ProductModel');
		// Load form helper and library
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Load pagination library
		$this->load->library('pagination');

		// Per page limit
		$this->perPage = 5;
	}

	public function index()
	{
		if ($this->session->userdata('level') === 'admin') {
			$data = array();

			// Get messages from the session
			if ($this->session->userdata('success_msg')) {
				$data['success_msg'] = $this->session->userdata('success_msg');
				$this->session->unset_userdata('success_msg');
			}
			if ($this->session->userdata('error_msg')) {
				$data['error_msg'] = $this->session->userdata('error_msg');
				$this->session->unset_userdata('error_msg');
			}
			// If search request submitted
			if ($this->input->post('submitSearch')) {
				$inputKeywords = $this->input->post('searchKeyword');
				$searchKeyword = strip_tags($inputKeywords);
				if (!empty($searchKeyword)) {
					$this->session->set_userdata('searchKeyword', $searchKeyword);
				} else {
					$this->session->unset_userdata('searchKeyword');
				}
			} elseif ($this->input->post('submitSearchReset')) {
				$this->session->unset_userdata('searchKeyword');
			}
			$data['searchKeyword'] = $this->session->userdata('searchKeyword');

			// Get rows count
			$conditions['searchKeyword'] = $data['searchKeyword'];
			$conditions['returnType']    = 'count';
			$rowsCount = $this->ProductModel->getRows($conditions);

			// Pagination config
			$config['base_url']    = base_url() . 'index.php/ProductController/index/';
			$config['uri_segment'] = 3;
			$config['total_rows']  = $rowsCount;
			$config['per_page']    = $this->perPage;



			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tagl_close'] = '</a></li>';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tagl_close'] = '</li>';
			$config['first_tag_open'] = '<li class="page-item disabled">';
			$config['first_tagl_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tagl_close'] = '</a></li>';
			$config['attributes'] = array('class' => 'page-link');

			//Initialize pagination library
			$this->pagination->initialize($config);

			// Define offset
			$page = $this->uri->segment(3);
			$offset = !$page ? 0 : $page;

			// Get rows
			$conditions['returnType'] = '';
			$conditions['start'] = $offset;
			$conditions['limit'] = $this->perPage;
			$data['datalst'] = $this->ProductModel->getRows($conditions);
			$data['title'] = 'Members List';

			$this->load->view('layouts/header.php');
			$this->load->view('product/index.php', $data);
			$this->load->view('layouts/footer.php');
		} else if ($this->session->userdata('level') === 'saller') {
			$data = array();

			// Get messages from the session
			if ($this->session->userdata('success_msg')) {
				$data['success_msg'] = $this->session->userdata('success_msg');
				$this->session->unset_userdata('success_msg');
			}
			if ($this->session->userdata('error_msg')) {
				$data['error_msg'] = $this->session->userdata('error_msg');
				$this->session->unset_userdata('error_msg');
			}
			// If search request submitted
			if ($this->input->post('submitSearch')) {
				$inputKeywords = $this->input->post('searchKeyword');
				$searchKeyword = strip_tags($inputKeywords);
				if (!empty($searchKeyword)) {
					$this->session->set_userdata('searchKeyword', $searchKeyword);
				} else {
					$this->session->unset_userdata('searchKeyword');
				}
			} elseif ($this->input->post('submitSearchReset')) {
				$this->session->unset_userdata('searchKeyword');
			}
			$data['searchKeyword'] = $this->session->userdata('searchKeyword');

			// Get rows count
			$conditions['searchKeyword'] = $data['searchKeyword'];
			$conditions['returnType']    = 'count';
			$rowsCount = $this->ProductModel->getRows($conditions);

			// Pagination config
			$config['base_url']    = base_url() . 'index.php/ProductController/index/';
			$config['uri_segment'] = 3;
			$config['total_rows']  = $rowsCount;
			$config['per_page']    = $this->perPage;



			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tagl_close'] = '</a></li>';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tagl_close'] = '</li>';
			$config['first_tag_open'] = '<li class="page-item disabled">';
			$config['first_tagl_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tagl_close'] = '</a></li>';
			$config['attributes'] = array('class' => 'page-link');

			//Initialize pagination library
			$this->pagination->initialize($config);

			// Define offset
			$page = $this->uri->segment(3);
			$offset = !$page ? 0 : $page;

			// Get rows
			$conditions['returnType'] = '';
			$conditions['start'] = $offset;
			$conditions['limit'] = $this->perPage;
			$data['datalst'] = $this->ProductModel->getRows($conditions);
			$data['title'] = 'Members List';

			$this->load->view('layouts/saller/header.php');
			$this->load->view('product/index.php', $data);
			$this->load->view('layouts/saller/footer.php');
		} else {
			redirect('authentication');
			echo "Access Denied";
		}
	}


	public function createNewProduct()
	{

		if ($this->session->userdata('level') === 'admin') {

			// If add request is submitted
			if ($this->input->post('formSubmit')) {
				$cat_logo = '';
				if (!empty($_FILES['cat_logo']['name'])) {
					//echo 'Inside FIle';
					//$this->session->set_userdata('success_msg', 'Inside File Section.');
					//echo $config['upload_path'] = './uploads/';

					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 5000;
					// $config['max_width'] = 1500;
					// $config['max_height'] = 1500;
					// $config['encrypt_name'] = TRUE;
					$upload_path = './uploads/ProductImage/';
					$config['upload_path'] = $upload_path;
					$config['overwrite'] = FALSE;
					$file_name = $this->ProductModel->generateRandomString() . $_FILES['cat_logo']['name'];

					$config['file_name'] = $file_name;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					// $uploadData = $this->upload->data();
					// $randomName = $this->MainCategoryModel->generateRandomString();
					// $cat_logo = $randomName . $uploadData['file_name'];
					// $this->session->set_userdata('success_msg', 'File Uploaded');

					if ($this->upload->do_upload('cat_logo')) {
						$this->session->set_userdata('success_msg', 'File Uploaded.');

						$uploadData = $this->upload->data();
						$cat_logo = $uploadData['file_name'];
					} else {

						$this->session->set_userdata('success_msg', $this->upload->display_errors());
					}
				} else {
					$this->session->set_userdata('success_msg', 'File Not Selected.');
				}
				//Set Preferencyes

				// Form field validation rules
				$this->form_validation->set_rules('product_name', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('price', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('descr', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('qty', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('is_active', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('cat_id', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('sub_cat_id', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('weight', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('weight_unit_id', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('brand_id', 'Category Name', 'trim|required');

				//$this->form_validation->set_rules('cat_logo', 'Category Name', 'trim|required');

				// Prepare member data
				$memData = array(
					'product_name' => $this->input->post('product_name'),
					'price' => $this->input->post('price'),
					'descr' => $this->input->post('descr'),
					'qty' => $this->input->post('qty'),
					'is_active' => $this->input->post('is_active'),
					'cat_id' => $this->input->post('cat_id'),
					'sub_cat_id' => $this->input->post('sub_cat_id'),
					'weight' => $this->input->post('weight'),
					'weight_unit_id' => $this->input->post('weight_unit_id'),
					'brand_id' => $this->input->post('brand_id'),
					'photo' => $cat_logo
				);

				// Validate submitted form data
				//$this->form_validation->run() ==
				if ($this->form_validation->run() == true) {

					// Insert member data
					$insert = $this->ProductModel->insert($memData);

					if ($insert) {
						$this->session->set_userdata('success_msg', 'Member has been added successfully.');
						redirect('ManageProduct');
					} else {
						$this->session->set_userdata('success_msg', 'Some Error');
					}
				}
			}



			$data['category'] = $this->ProductModel->get_category()->result();
			$data['brands'] = $this->ProductModel->getAllBrand()->result();
			$data['weightunits'] = $this->ProductModel->getAllWeightUnit()->result();

			$this->load->view('layouts/header.php');
			$this->load->view('product/AddNewProduct.php', $data);
			$this->load->view('layouts/footer.php');
		} else if ($this->session->userdata('level') === 'saller') {
			$data['category'] = $this->ProductModel->get_category()->result();
			$data['brands'] = $this->ProductModel->getAllBrand()->result();
			$data['weightunits'] = $this->ProductModel->getAllWeightUnit()->result();

			$this->load->view('layouts/saller/header.php');
			$this->load->view('product/AddNewProduct.php', $data);
			$this->load->view('layouts/saller/footer.php');
		} else {
			//redirect('authentication');
			echo "Access Denied";
		}
	}


	public function edit($id)
	{
		$data = array();
		$cat_logo = '';
		// Get member data
		//	$memData = $this->ProductModel->getRows(array('id' => $id));
		$memData = $this->ProductModel->getProductById($id);

		$categore = $this->ProductModel->getProductById($id);

		$data['category'] = $this->ProductModel->get_category()->result();
		$data['brands'] = $this->ProductModel->getAllBrand()->result();
		$data['weightunits'] = $this->ProductModel->getAllWeightUnit()->result();

		// If update request is submitted
		if ($this->input->post('formSubmit')) {

			if (!empty($_FILES['cat_logo']['name'])) {
				echo $path = './uploads/ProductImage/' . $categore['photo'];

				unlink($path);
				//echo 'Inside FIle';
				//$this->session->set_userdata('success_msg', 'Inside File Section.');
				//echo $config['upload_path'] = './uploads/';

				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = 5000;
				// $config['max_width'] = 1500;
				// $config['max_height'] = 1500;
				// $config['encrypt_name'] = TRUE;
				$upload_path = './uploads/ProductImage/';
				$config['upload_path'] = $upload_path;
				$config['overwrite'] = FALSE;
				$file_name = $this->ProductModel->generateRandomString() . $_FILES['cat_logo']['name'];

				$config['file_name'] = $file_name;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// $uploadData = $this->upload->data();
				// $randomName = $this->MainCategoryModel->generateRandomString();
				// $cat_logo = $randomName . $uploadData['file_name'];
				// $this->session->set_userdata('success_msg', 'File Uploaded');
				if ($this->upload->do_upload('cat_logo')) {

					$this->session->set_userdata('success_msg', 'File Uploaded.');

					$uploadData = $this->upload->data();

					$cat_logo = $uploadData['file_name'];
				} else {

					$this->session->set_userdata('success_msg', $this->upload->display_errors());
				}
				// Form field validation rules
				$this->form_validation->set_rules('product_name', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('price', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('descr', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('qty', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('is_active', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('cat_id', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('sub_cat_id', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('weight', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('weight_unit_id', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('brand_id', 'Category Name', 'trim|required');

				//$this->form_validation->set_rules('cat_logo', 'Category Name', 'trim|required');

				// Prepare member data
				$memData = array(
					'product_name' => $this->input->post('product_name'),
					'price' => $this->input->post('price'),
					'descr' => $this->input->post('descr'),
					'qty' => $this->input->post('qty'),
					'is_active' => $this->input->post('is_active'),
					'cat_id' => $this->input->post('cat_id'),
					'sub_cat_id' => $this->input->post('sub_cat_id'),
					'weight' => $this->input->post('weight'),
					'weight_unit_id' => $this->input->post('weight_unit_id'),
					'brand_id' => $this->input->post('brand_id'),
					'photo' => $cat_logo
				);

				// Validate submitted form data
				//$this->form_validation->run() ==
				if ($this->form_validation->run() == true) {

					// Insert member data
					$insert = $this->ProductModel->update($memData, $id);

					if ($insert) {
						$this->session->set_userdata('success_msg', 'Member has been added successfully.');
						redirect('ManageProduct');
					} else {
						$this->session->set_userdata('success_msg', 'Some Error');
					}
				}
			}

			// Form field validation rules
			$this->form_validation->set_rules('product_name', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('price', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('descr', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('qty', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('is_active', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('cat_id', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('sub_cat_id', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('weight', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('weight_unit_id', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('brand_id', 'Category Name', 'trim|required');

			//$this->form_validation->set_rules('cat_logo', 'Category Name', 'trim|required');

			// Prepare member data
			$memData = array(
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),
				'descr' => $this->input->post('descr'),
				'qty' => $this->input->post('qty'),
				'is_active' => $this->input->post('is_active'),
				'cat_id' => $this->input->post('cat_id'),
				'sub_cat_id' => $this->input->post('sub_cat_id'),
				'weight' => $this->input->post('weight'),
				'weight_unit_id' => $this->input->post('weight_unit_id'),
				'brand_id' => $this->input->post('brand_id'),
				'photo' =>  $categore['photo']
			);

			// Validate submitted form data
			//$this->form_validation->run() ==
			if ($this->form_validation->run() == true) {

				// Insert member data
				$insert = $this->ProductModel->update($memData, $id);

				if ($insert) {
					$this->session->set_userdata('success_msg', 'Member has been added successfully.');
					redirect('ManageProduct');
				} else {
					$this->session->set_userdata('success_msg', 'Some Error');
				}
			}
		}

		$data['member'] = $memData;
		$data['title'] = 'Update Member';

		// Load the edit page view
		$this->load->view('layouts/header.php');
		$this->load->view('product/AddNewProduct.php', $data);
		$this->load->view('layouts/footer.php');
	}



	public function delete($id)
	{
		// Check whether member id is not empty
		if ($id) {


			$categore = $this->ProductModel->getProductById($id);

			//echo '' . $categore['cat_logo'];
			$path = './uploads/ProductImage/' . $categore['photo'];

			unlink($path);
			//delete_files($path);
			// Delete member
			$delete = $this->ProductModel->delete($id);

			if ($delete) {
				$this->session->set_userdata('success_msg', 'Member has been removed successfully.');
			} else {
				$this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
			}
		}

		// Redirect to the list page
		redirect('ManageProduct');
	}

	public function view($id)
	{
		$data = array();

		// Check whether member id is not empty
		if (!empty($id)) {
			$data['member'] = $this->MainCategoryModel->getRows(array('id' => $id));;
			$data['title']  = 'Brand Details';

			// Load the details page view
			$this->load->view('layouts/header', $data);
			$this->load->view('admin/MainCategory/createNewMainCategory.php', $data);
			$this->load->view('layouts/footer');
		} else {
			redirect('index.php/MainCategoryController/index');
		}
	}

	function get_sub_category()
	{

		$category_id = $this->input->post('id', TRUE);
		$data = $this->ProductModel->get_sub_category($category_id)->result();
		echo json_encode($data);
	}



	/**

	 * Manage uploadImage

	 *

	 * @return Response

	 */

	public function getSubCategoryById($id)
	{

		$result = $this->db->where("state_id", $id)->get("demo_cities")->result();

		echo json_encode($result);
	}
}
