<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanCustomer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'laporan-customer');
	}

	public function index()
	{
		$laporan = $this->kategori_produk->getAll();
		$barang = $this->product->getAllBarang();

		foreach ($laporan as $key => $value) {
			foreach ($barang as $k => $v) {
				if ($value->id_kategori_produk == $v->id_kategori_produk) {
					$laporan[$key]->barang[$v->id_barang] = [
						'id_barang'		=> $v->id_barang,
						'nama_barang'	=> $v->nama_barang,
						'stok'			=> $v->stok,
						'tujuan'		=> $this->laporan->getLaporanBarang($v->id_barang),
					];
				}
			}
		}

		$data['data'] = $laporan;
		$data['tujuan'] = $this->tujuan->getAll();
		$data['data_pengunjung'] = $this->laporan->getLaporanPengunjung();
		
		$this->load->view('admin/laporan_customer/index', $data);
	}
}

/* End of file LaporanCustomer.php */
/* Location: ./application/controllers/admin/LaporanCustomer.php */
