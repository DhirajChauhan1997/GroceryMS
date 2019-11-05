<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainCategoryController extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('MainCategoryModel');
		// Load form helper and library
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		// Load pagination library
		$this->load->library('pagination');
		$this->load->helper('text');
		$this->load->helper("file");
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
			$rowsCount = $this->MainCategoryModel->getRows($conditions);

			// Pagination config
			$config['base_url']    = base_url() . 'index.php/MainCategoryController/index/';
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
			$data['datalst'] = $this->MainCategoryModel->getRows($conditions);
			$data['title'] = 'Members List';

			$this->load->view('layouts/header.php');
			$this->load->view('admin/MainCategory/index.php', $data);
			$this->load->view('layouts/footer.php');
		} else {
			redirect('authentication');
			echo "Access Denied";
		}
	}

	public function createNewMainCategory()
	{
		if ($this->session->userdata('level') === 'admin') {
			$cat_logo = '';
			// If add request is submitted
			if ($this->input->post('formSubmit')) {

				if (!empty($_FILES['cat_logo']['name'])) {
					//echo 'Inside FIle';
					//$this->session->set_userdata('success_msg', 'Inside File Section.');
					//echo $config['upload_path'] = './uploads/';

					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 5000;
					// $config['max_width'] = 1500;
					// $config['max_height'] = 1500;
					// $config['encrypt_name'] = TRUE;
					$upload_path = './uploads/CategoryImage/';
					$config['upload_path'] = $upload_path;
					$config['overwrite'] = FALSE;
					$file_name = $this->MainCategoryModel->generateRandomString() . $_FILES['cat_logo']['name'];

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
				$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
				//$this->form_validation->set_rules('cat_logo', 'Category Name', 'trim|required');

				// Prepare member data
				$memData = array(
					'cat_name' => $this->input->post('cat_name'),
					'cat_logo' => $cat_logo
				);

				// Validate submitted form data
				//$this->form_validation->run() ==
				if ($this->form_validation->run() == true) {

					// Insert member data
					$insert = $this->MainCategoryModel->insert($memData);

					if ($insert) {
						$this->session->set_userdata('success_msg', 'Member has been added successfully.');
						redirect('ManageMainCategory');
					} else {
						$this->session->set_userdata('success_msg', 'Some Error');
					}
				}
			}

			$this->load->view('layouts/header.php');
			$this->load->view('admin/MainCategory/createNewMainCategory.php');
			$this->load->view('layouts/footer.php');
		} else {
			redirect('authentication');
			echo "Access Denied";
		}
	}


	public function edit($id)
	{
		$data = array();
		$cat_logo = '';
		// Get member data
		$categore = $this->MainCategoryModel->getCategoryById($id);
		$memData = $this->MainCategoryModel->getRows(array('id' => $id));

		// If update request is submitted
		if ($this->input->post('formSubmit')) {

			if (!empty($_FILES['cat_logo']['name'])) {
				echo $path = './uploads/CategoryImage/' . $categore['cat_logo'];

				unlink($path);
				//echo 'Inside FIle';
				//$this->session->set_userdata('success_msg', 'Inside File Section.');
				//echo $config['upload_path'] = './uploads/';

				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = 5000;
				// $config['max_width'] = 1500;
				// $config['max_height'] = 1500;
				// $config['encrypt_name'] = TRUE;
				$upload_path = './uploads/CategoryImage/';
				$config['upload_path'] = $upload_path;
				$config['overwrite'] = FALSE;
				$file_name = $this->MainCategoryModel->generateRandomString() . $_FILES['cat_logo']['name'];

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
				// Prepare member data
				$memData = array(
					'cat_name' => $this->input->post('cat_name'),
					'cat_logo' => $file_name
				);
				//Vallidation 
				$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
				// Validate submitted form data
				if ($this->form_validation->run() == true) {
					// Update member data
					$update = $this->MainCategoryModel->update($memData, $id);

					if ($update) {
						$this->session->set_userdata('success_msg', 'Member has been updated successfully.');
						redirect('ManageMainCategory');
					} else {
						$data['error_msg'] = 'Some problems occured, please try again.';
					}
				}
			}

			// Form field validation rules
			$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
			//$this->form_validation->set_rules('cat_logo', 'Category Name', 'trim|required');

			// Prepare member data
			$memData = array(
				'cat_name' => $this->input->post('cat_name'),
				'cat_logo' => $categore['cat_logo']
			);
			// Validate submitted form data
			if ($this->form_validation->run() == true) {
				// Update member data
				$update = $this->MainCategoryModel->update($memData, $id);

				if ($update) {
					$this->session->set_userdata('success_msg', 'Member has been updated successfully.');
					redirect('ManageMainCategory');
				} else {
					$data['error_msg'] = 'Some problems occured, please try again.';
				}
			}
		}

		$data['member'] = $memData;
		$data['title'] = 'Update Member';

		// Load the edit page view
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/MainCategory/createNewMainCategory.php', $data);
		$this->load->view('layouts/footer');
	}



	public function delete($id)
	{
		// Check whether member id is not empty
		if ($id) {


			$categore = $this->MainCategoryModel->getCategoryById($id);

			//echo '' . $categore['cat_logo'];
			$path = './uploads/CategoryImage/' . $categore['cat_logo'];

			unlink($path);
			//delete_files($path);
			// Delete member
			$delete = $this->MainCategoryModel->delete($id);

			if ($delete) {
				$this->session->set_userdata('success_msg', 'Member has been removed successfully.');
			} else {
				$this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
			}
		}

		// Redirect to the list page
		redirect('/MainCategoryController/index');
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
}
