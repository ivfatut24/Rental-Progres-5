<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanBarangMasuk extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'laporan-barangmasuk');
	}
	public function index()
	{
		$this->load->view('admin/laporan_barangmasuk/index');
	}

}

/* End of file LaporanBarangMasuk.php */
/* Location: ./application/controllers/admin/LaporanBarangMasuk.php */
