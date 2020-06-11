<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesCustomer();
		$this->session->set_flashdata('menu', 'produk');
		// $this->load->model('Model_Users','user');
	}

	public function index()
	{
		$this->load->view('customer/produk/index');
	}

}

/* End of file KelolaPembayaran.php */
/* Location: ./application/controllers/admin/KelolaPembayaran.php */
