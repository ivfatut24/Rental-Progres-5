<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesCustomer();
		$this->session->set_flashdata('menu', 'dashboard');
	}

	public function index()
	{
		$this->load->view('customer/dashboard');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
