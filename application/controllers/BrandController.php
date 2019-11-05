<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class BrandController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('authentication');
		}

		// Load member model
		$this->load->model('BrandModel');

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
			$rowsCount = $this->BrandModel->getRows($conditions);

			// Pagination config
			$config['base_url']    = base_url() . 'index.php/BrandController/index/';
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
			$data['datalst'] = $this->BrandModel->getRows($conditions);
			$data['title'] = 'Members List';

			// Load the list page view
			$this->load->view('layouts/header', $data);
			$this->load->view('admin/Brand/index', $data);
			$this->load->view('layouts/footer');
		} else {
			echo "Access Denied";
		}
	}

	public function view($id)
	{
		$data = array();

		// Check whether member id is not empty
		if (!empty($id)) {
			$data['member'] = $this->BrandModel->getRows(array('id' => $id));;
			$data['title']  = 'Brand Details';

			// Load the details page view
			$this->load->view('layouts/header', $data);
			$this->load->view('brands/view', $data);
			$this->load->view('layouts/footer');
		} else {
			redirect('index.php/BrandController/index');
		}
	}

	public function createNewBrand()
	{
		if ($this->session->userdata('level') === 'admin') {
			$brand_logo = '';
			// If add request is submitted
			if ($this->input->post('formSubmit')) {

				if (!empty($_FILES['brand_logo']['name'])) {
					//echo 'Inside FIle';
					//$this->session->set_userdata('success_msg', 'Inside File Section.');
					//echo $config['upload_path'] = './uploads/';

					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 5000;
					// $config['max_width'] = 1500;
					// $config['max_height'] = 1500;
					// $config['encrypt_name'] = TRUE;
					$upload_path = './uploads/BrandImage/';
					$config['upload_path'] = $upload_path;
					$config['overwrite'] = FALSE;
					$file_name = $this->BrandModel->generateRandomString() . $_FILES['brand_logo']['name'];

					$config['file_name'] = $file_name;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					// $uploadData = $this->upload->data();
					// $randomName = $this->BrandModel->generateRandomString();
					// $brand_logo = $randomName . $uploadData['file_name'];
					// $this->session->set_userdata('success_msg', 'File Uploaded');

					if ($this->upload->do_upload('brand_logo')) {
						$this->session->set_userdata('success_msg', 'File Uploaded.');

						$uploadData = $this->upload->data();
						$brand_logo = $uploadData['file_name'];
					} else {
						$this->session->set_userdata('success_msg', $this->upload->display_errors());
					}
				} else {
					$this->session->set_userdata('success_msg', 'File Not Selected.');
				}
				//Set Preferencyes

				// Form field validation rules
				$this->form_validation->set_rules('brand', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('brand_desc', 'Category Name', 'trim|required');

				//$this->form_validation->set_rules('brand_logo', 'Category Name', 'trim|required');

				// Prepare member data
				$memData = array(
					'brand' => $this->input->post('brand'),
					'brand_desc' => $this->input->post('brand_desc'),
					'brand_logo' => $brand_logo
				);

				// Validate submitted form data
				//$this->form_validation->run() ==
				if ($this->form_validation->run() == true) {

					// Insert member data
					$insert = $this->BrandModel->insert($memData);

					if ($insert) {
						$this->session->set_userdata('success_msg', 'Member has been added successfully.');
						redirect('ManageBrand');
					} else {
						$this->session->set_userdata('success_msg', 'Some Error');
					}
				}
			}

			$this->load->view('layouts/header.php');
			$this->load->view('admin/Brand/createNewBrand.php');
			$this->load->view('layouts/footer.php');
		} else {
			redirect('authentication');
			echo "Access Denied";
		}
	}


	public function edit($id)
	{
		$data = array();
		$brand_logo = '';
		// Get member data
		$categore = $this->BrandModel->getBrandById($id);
		$memData = $this->BrandModel->getRows(array('id' => $id));

		// If update request is submitted
		if ($this->input->post('formSubmit')) {

			if (!empty($_FILES['brand_logo']['name'])) {
				$path = './uploads/BrandImage/' . $categore['brand_logo'];

				unlink($path);
				//echo 'Inside FIle';
				//$this->session->set_userdata('success_msg', 'Inside File Section.');
				//echo $config['upload_path'] = './uploads/';

				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = 5000;
				// $config['max_width'] = 1500;
				// $config['max_height'] = 1500;
				// $config['encrypt_name'] = TRUE;
				$upload_path = './uploads/BrandImage/';
				$config['upload_path'] = $upload_path;
				$config['overwrite'] = FALSE;
				$file_name = $this->BrandModel->generateRandomString() . $_FILES['brand_logo']['name'];

				$config['file_name'] = $file_name;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// $uploadData = $this->upload->data();
				// $randomName = $this->BrandModel->generateRandomString();
				// $brand_logo = $randomName . $uploadData['file_name'];
				// $this->session->set_userdata('success_msg', 'File Uploaded');
				if ($this->upload->do_upload('brand_logo')) {

					$this->session->set_userdata('success_msg', 'File Uploaded.');

					$uploadData = $this->upload->data();

					$brand_logo = $uploadData['file_name'];
				} else {

					$this->session->set_userdata('success_msg', $this->upload->display_errors());
				}
				// Form field validation rules
				$this->form_validation->set_rules('brand', 'Category Name', 'trim|required');
				$this->form_validation->set_rules('brand_desc', 'Category Name', 'trim|required');

				//$this->form_validation->set_rules('brand_logo', 'Category Name', 'trim|required');

				// Prepare member data
				$memData = array(
					'brand' => $this->input->post('brand'),
					'brand_desc' => $this->input->post('brand_desc'),
					'brand_logo' => $file_name
				);
				// Validate submitted form data
				if ($this->form_validation->run() == true) {
					// Update member data
					$update = $this->BrandModel->update($memData, $id);

					if ($update) {
						$this->session->set_userdata('success_msg', 'Member has been updated successfully.');
						redirect('ManageBrand');
					} else {
						$data['error_msg'] = 'Some problems occured, please try again.';
					}
				}
			}

			// Form field validation rules
			$this->form_validation->set_rules('brand', 'Category Name', 'trim|required');
			$this->form_validation->set_rules('brand_desc', 'Category Name', 'trim|required');

			//$this->form_validation->set_rules('brand_logo', 'Category Name', 'trim|required');

			// Prepare member data
			$memData = array(
				'brand' => $this->input->post('brand'),
				'brand_desc' => $this->input->post('brand_desc'),
				'brand_logo' => $categore['brand_logo']
			);

			// Validate submitted form data
			if ($this->form_validation->run() == true) {
				// Update member data
				$update = $this->BrandModel->update($memData, $id);

				if ($update) {
					$this->session->set_userdata('success_msg', 'Member has been updated successfully.');
					redirect('ManageBrand');
				} else {
					$data['error_msg'] = 'Some problems occured, please try again.';
				}
			}
		}

		$data['member'] = $memData;
		$data['title'] = 'Update Member';

		// Load the edit page view
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/Brand/createNewBrand.php', $data);
		$this->load->view('layouts/footer');
	}

	public function delete($id)
	{
		// Check whether member id is not empty
		if ($id) {


			$categore = $this->BrandModel->getBrandById($id);

			//echo '' . $categore['cat_logo'];
			$path = './uploads/BrandImage/' . $categore['brand_logo'];

			unlink($path);
			//delete_files($path);
			// Delete member
			$delete = $this->BrandModel->delete($id);

			if ($delete) {
				$this->session->set_userdata('success_msg', 'Member has been removed successfully.');
			} else {
				$this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
			}
		}

		// Redirect to the list page
		redirect('ManageBrand');
	}
}
