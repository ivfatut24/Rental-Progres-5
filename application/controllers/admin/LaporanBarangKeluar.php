<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanBarangKeluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'laporan-barangkeluar');
	}

	public function index()
	{
		$this->load->view('admin/laporan_barangkeluar/index');
	}

}

/* End of file LaporanBarangKeluar.php */
/* Location: ./application/controllers/admin/LaporanBarangKeluar.php */
