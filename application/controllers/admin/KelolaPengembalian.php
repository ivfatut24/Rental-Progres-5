<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPengembalian extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'kelola-pengembalian');
	}

	public function index()
	{
		// kembali
		$data['pemesanan'] = $this->pemesanan->getAllPemesanan(4); 
		$this->load->view('admin/kelola_pengembalian/index', $data);
	}

	public function kembali()
	{
		$id_transaksi = $this->input->post('id_transaksi');
		$this->pengembalian->insert();
		$this->pemesanan->changeStatus($id_transaksi, 4);
		foreach ($this->detail_transaksi->getByIdTransaksi($id_transaksi) as $key => $value) {
			$data = [
				'id_barang'				=> $value->id_barang,
				'jumlah_barang'			=> $value->jumlah_barang,
				'keterangan_kondisi'	=> $this->input->post('keterangan'),
			];
			$this->maintenance->insert($data);
		}
		redirect(base_url('admin/kelola/pengembalian'));
	}
}

/* End of file KelolaPengembalian.php */
/* Location: ./application/controllers/admin/KelolaPengembalian.php */
