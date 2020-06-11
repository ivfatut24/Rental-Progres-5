<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPembayaran extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'kelola-pembayaran');
		$this->load->model('Model_Pembayaran','pembayaran');
	}

	public function index()
	{
		$data['pembayaran'] = $this->pembayaran->getAllPembayaran();
		$this->load->view('admin/kelola_pembayaran/index', $data);
	}

	public function konfirmasi($id_pembayaran)
	{
		$this->pembayaran->konfirmasiPembayaran($id_pembayaran);
		redirect(base_url('admin/kelola/pemesanan'));
	}

	public function tolak($id_pembayaran)
	{
		$this->pembayaran->tolakPembayaran($id_pembayaran);
		redirect(base_url('admin/kelola/pembayaran'));
	}

}

/* End of file KelolaPembayaran.php */
/* Location: ./application/controllers/admin/KelolaPembayaran.php */
