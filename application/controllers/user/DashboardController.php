<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	public function index()
	{
		$this->load->view('layouts/user/header');
		$this->load->view('user/dashboard/index');
		$this->load->view('layouts/user/footer');
	}
}
