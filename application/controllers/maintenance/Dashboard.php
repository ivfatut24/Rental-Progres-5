<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesMaintenance();
		$this->session->set_flashdata('menu', 'dashboard');
	}

	public function index()
	{
		$data['count_barang_masuk']		= count($this->maintenance->getAll(0));
		$data['count_barang_perawatan'] = count($this->maintenance->getAll(1));
		$data['count_barang_selesai']	= count($this->maintenance->getAll(3));

		$this->load->view('maintenance/dashboard', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
