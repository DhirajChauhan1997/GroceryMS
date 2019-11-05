<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('level') === 'saller') {
			if (empty($this->session->userdata('email'))) {
				$this->load->view('layouts/saller/header');
				$this->load->view('saller/dashboard/index');
				$this->load->view('layouts/saller/footer');
			} else {
				redirect('authentication');
			}
		} else {
			echo 'Access Prohibited';
		}
	}
}
