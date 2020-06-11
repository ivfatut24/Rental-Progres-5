<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKategoriProduk extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'data-kategoriproduk');
		
	}
	public function index()
	{
		$data['data'] = $this->kategori_produk->getAll();
		$this->load->view('admin/data_kategoriproduk/index', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nama_kategori_produk', 'Nama Kategori Barang', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/data_kategoriproduk/form');
		}else{
			if ($this->kategori_produk->insert()) {
				echo '<script type="text/javascript">alert(\'Kategori Barang Berhasil Ditambahkan\');</script>';
				redirect('admin/produk/kategori','refresh');
			}else{
				echo '<script type="text/javascript">alert(\'Kategori Barang Gagal Ditambahkan\');</script>';
				$this->load->view('admin/data_kategoriproduk/form');
			}
		}
	}

	public function update($id)
	{
		$data['data'] = $this->kategori_produk->getById($id);
		$this->form_validation->set_rules('nama_kategori_produk', 'Nama Kategori Barang', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['error'] = validation_errors();
			$this->load->view('admin/data_kategoriproduk/form',$data);
		}else{
			if ($this->kategori_produk->update($id)) {
				echo '<script type="text/javascript">alert(\'Kategori Barang Berhasil Diubah\');</script>';
				redirect('admin/produk/kategori','refresh');
			}else{
				echo '<script type="text/javascript">alert(\'Kategori Barang Gagal Diubah\');</script>';
				$this->load->view('admin/data_kategoriproduk/form');
			}
		}
	}

	public function delete($id)
	{
		if ($this->kategori_produk->delete($id)) {
			echo '<script type="text/javascript">alert(\'Kategori Barang Berhasil dihapus\');</script>';
		}else{
			echo '<script type="text/javascript">alert(\'Kategori Barang Gagal dihapus\');</script>';
		}
		redirect('admin/produk/kategori','refresh');
	}

}

/* End of file DataKategoriProduk.php */
/* Location: ./application/controllers/admin/DataKategoriProduk.php */
