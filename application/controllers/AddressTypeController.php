<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddressTypeController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AddressTypeModel');
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
			$rowsCount = $this->AddressTypeModel->getRows($conditions);

			// Pagination config
			$config['base_url']    = base_url() . 'index.php/AddressTypeController/index/';
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
			$data['datalst'] = $this->AddressTypeModel->getRows($conditions);
			$data['title'] = 'Members List';

			$this->load->view('layouts/header.php');
			$this->load->view('admin/AddressType/index.php', $data);
			$this->load->view('layouts/footer.php');
		} else {
			redirect('authentication');
			echo "Access Denied";
		}
	}

	public function createNewAddressType()
	{
		if ($this->session->userdata('level') === 'admin') {
			// If add request is submitted
			if ($this->input->post('formSubmit')) {
				//echo 'Inside Form formSubmit';
				// Form field validation rules
				$this->form_validation->set_rules('address_type', 'AddressType Name', 'trim|required');
				// Prepare member data
				$memData = array(
					'address_type' => $this->input->post('address_type'),

				);

				// Validate submitted form data
				//$this->form_validation->run() ==
				if ($this->form_validation->run() == true) {
					echo 'Inside Form validation Submit';
					// Insert member data
					$insert = $this->AddressTypeModel->insert($memData);

					if ($insert) {
						$this->session->set_userdata('success_msg', 'Member has been added successfully.');
						redirect('ManageAddressType');
					} else {
						$this->session->set_userdata('success_msg', 'Some Error');
					}
				}
			}

			$this->load->view('layouts/header.php');
			$this->load->view('admin/AddressType/createNewAddressType.php');
			$this->load->view('layouts/footer.php');
		} else {
			redirect('authentication');
			echo "Access Denied";
		}
	}


	public function edit($id)
	{
		$data = array();

		// Get member data
		$memData = $this->AddressTypeModel->getRows(array('id' => $id));

		// If update request is submitted
		if ($this->input->post('formSubmit')) {
			// Form field validation rules
			$this->form_validation->set_rules('address_type', 'AddressType Name', 'trim|required');

			// Prepare member data
			$memData = array(
				'address_type' => $this->input->post('address_type'),

			);


			// Validate submitted form data
			if ($this->form_validation->run() == true) {
				// Update member data
				$update = $this->AddressTypeModel->update($memData, $id);

				if ($update) {
					$this->session->set_userdata('success_msg', 'Member has been updated successfully.');
					redirect('/AddressTypeController/index');
				} else {
					$data['error_msg'] = 'Some problems occured, please try again.';
				}
			}
		}

		$data['member'] = $memData;
		$data['title'] = 'Update Member';

		// Load the edit page view
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/AddressType/createNewAddressType.php', $data);
		$this->load->view('layouts/footer');
	}

	public function delete($id)
	{
		// Check whether member id is not empty
		if ($id) {
			// Delete member
			$delete = $this->AddressTypeModel->delete($id);

			if ($delete) {
				$this->session->set_userdata('success_msg', 'Member has been removed successfully.');
			} else {
				$this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
			}
		}

		// Redirect to the list page
		redirect('/AddressTypeController/index');
	}

	public function view($id)
	{
		$data = array();

		// Check whether member id is not empty
		if (!empty($id)) {
			$data['member'] = $this->AddressTypeModel->getRows(array('id' => $id));;
			$data['title']  = 'Brand Details';

			// Load the details page view
			$this->load->view('layouts/header', $data);
			$this->load->view('admin/AddressType/createNewAddressType.php', $data);
			$this->load->view('layouts/footer');
		} else {
			redirect('index.php/AddressTypeController/index');
		}
	}
}
