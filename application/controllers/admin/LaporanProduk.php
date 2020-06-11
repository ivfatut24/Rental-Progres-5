<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanProduk extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'laporan-produk');
	}

	public function index()
	{
		$this->load->view('admin/laporan_produk/index');
	}

}

/* End of file LaporanProduk.php */
/* Location: ./application/controllers/admin/LaporanProduk.php */
