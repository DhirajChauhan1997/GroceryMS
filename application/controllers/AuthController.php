<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AuthController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
	}

	function index()
	{
		$this->load->view('authentication/authentication');
	}

	public function sallerregistration()
	{
		// If add request is submitted
		if ($this->input->post('formSubmit')) {
			//echo 'Inside Form formSubmit';
			// Form field validation rules
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
			// Prepare member data
			$memData = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'mobno' => $this->input->post('mobno'),
				'password' => md5($this->input->post('password')),
				'role' => 'saller'
			);

			// Validate submitted form data
			//$this->form_validation->run() ==
			if ($this->form_validation->run() == true) {
				echo 'Inside Form validation Submit';
				// Insert member data
				$insert = $this->AuthModel->insert($memData);

				if ($insert) {
					$this->session->set_userdata('success_msg', 'Member has been added successfully.');
					redirect('authenticaion');
				} else {
					$this->session->set_userdata('success_msg', 'Some Error');
				}
			}
		}

		$this->load->view('authentication/SallerRegistration');
	}

	public function registration()
	{
		// If add request is submitted
		if ($this->input->post('formSubmit')) {
			//echo 'Inside Form formSubmit';
			// Form field validation rules
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
			// Prepare member data
			$memData = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'mobno' => $this->input->post('mobno'),
				'password' => md5($this->input->post('password')),
				'role' => 'user'
			);

			// Validate submitted form data
			//$this->form_validation->run() ==
			if ($this->form_validation->run() == true) {
				echo 'Inside Form validation Submit';
				// Insert member data
				$insert = $this->AuthModel->insert($memData);

				if ($insert) {
					$this->session->set_userdata('success_msg', 'Member has been added successfully.');
					redirect('authenticaion');
				} else {
					$this->session->set_userdata('success_msg', 'Some Error');
				}
			}
		}

		$this->load->view('authentication/Registration');
	}


	public function doRegistration()
	{
		// If add request is submitted
		if ($this->input->post('formSubmit')) {
			echo 'Inside Form Submit';
			// Form field validation rules
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
			// Prepare member data
			$memData = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'role' => 'user'
			);

			// Validate submitted form data
			if ($this->form_validation->run() == true) {
				echo 'Inside Form Submit';
				// Insert member data
				$insert = $this->AuthModel->insert($memData);

				if ($insert) {
					$this->session->set_userdata('success_msg', 'Member has been added successfully.');
					redirect('authenticaion');
				} else {
					$this->session->set_userdata('success_msg', 'Some Error');
				}
			}
		}
	}

	public function doSallerregistration()
	{
		$this->load->view('authentication/SallerRegiistration');
	}



	function auth()
	{
		// $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		// $this->form_validation->set_rules('password', 'Password', 'required');

		$email    = $this->input->post('email', TRUE);
		$password = md5($this->input->post('password', TRUE));
		// $encpassword = md5($password);

		$validate = $this->AuthModel->validate($email, $password);

		if ($validate->num_rows() > 0) {
			$data  = $validate->row_array();
			$name  = $data['username'];
			$firstname  = $data['firstname'];
			$lastname  = $data['lastname'];
			$mobno = $data['mobno'];
			$email = $data['email'];
			$level = $data['role'];
			$sesdata = array(
				'username'  => $name,
				'email'     => $email,
				'firstname' => $firstname,
				'lastsname' => $lastname,
				'mobno' => $mobno,
				'level'     => $level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			// access login for admin
			if ($level === 'admin') {
				redirect('Welcome/index');

				// access login for staff
			} elseif ($level === 'saller') {
				redirect('saller/DashboardController/index');

				// access login for author
			} else {
				redirect('user/DashboardController/index');
			}
		} else {
			echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
			redirect('authentication');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('authentication');
	}
}
