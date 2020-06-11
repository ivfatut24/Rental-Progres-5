<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataProduk extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->load->model('Model_Products','product');
		$this->session->set_flashdata('menu', 'data-produk');
	}

	public function index()
	{
		$data['data'] = $this->product->getAllBarang();
		$this->load->view('admin/data_produk/index', $data);
	}

	public function create()
	{
		$data['kategori_produk'] = $this->kategori_produk->getAll();

		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		$this->form_validation->set_rules('harga_sewa', 'harga_sewa', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('ukuran', 'ukuran', 'trim|required');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/data_produk/form', $data);
		}
		else{
			$config['upload_path']		='./assets/uploads/produk/';
			$config['allowed_types']	='gif|jpg|png';
			$config['remove_spaces']	= TRUE;
			$config['encrypt_name']		= TRUE;
			$this->load->library('upload', $config);
			if( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/data_produk/form', $data);
			} else {
				if ($this->product->insertProduct()) {
					echo '<script type="text/javascript">alert(\'Produk Berhasil Ditambahkan\');</script>';
					redirect('admin/produk','refresh');
				}else{
					echo '<script type="text/javascript">alert(\'Produk Gagal ditambahkan\');</script>';
					redirect('admin/produk/create');
				}
			}
			
		}
	}

	public function update($id)
	{
		$data['data'] = $this->product->getProductById($id);
		$data['kategori_produk'] = $this->kategori_produk->getAll();

		if(empty($_POST)) {
			$data['error'] = validation_errors();
			$this->load->view('admin/data_produk/form', $data,$data);
		}else{
			if (!empty($_FILES['userfile']['name'])) {
				$config['upload_path']		='./assets/uploads/produk/';
				$config['allowed_types']	='gif|jpg|png';
				$config['remove_spaces']	= TRUE;
				$config['encrypt_name']		= TRUE;
				$this->load->library('upload', $config);
				if( ! $this->upload->do_upload('userfile'))
				{
					$data['error'] = $this->upload->display_errors(); ;
					$this->load->view('admin/data_produk/form', $data,$data);
				} else {
					if ($this->product->update()) {
						echo '<script type="text/javascript">alert(\'Produk Berhasil Diubah\');</script>';
						redirect('admin/produk','refresh');
					}else{
						echo '<script type="text/javascript">alert(\'Produk Gagal Diubah\');</script>';
						redirect('admin/produk/update/'.$id);
					}
				}
			}else{
				if ($this->product->update()) {
					echo '<script type="text/javascript">alert(\'Produk Berhasil Diubah\');</script>';
					redirect('admin/produk','refresh');
				}else{
					echo '<script type="text/javascript">alert(\'Produk Gagal Diubah\');</script>';
					redirect('admin/produk/update/'.$id);
				}
			}
		}
	}

	public function detailProduk($id)
	{
		$data['data'] = $this->product->getProductById($id);
		$this->load->view('admin/data_produk/detail',$data);	
	}

	public function delete($id)
	{
		if ($this->product->delete($id)) {
			echo '<script type="text/javascript">alert(\'Produk Berhasil dihapus\');</script>';
			redirect('admin/produk','refresh');
		}else{
			echo '<script type="text/javascript">alert(\'Produk Gagal dihapus\');</script>';
			redirect('admin/produk','refresh');
		}
	}

}

/* End of file DataProduk.php */
/* Location: ./application/controllers/admin/DataProduk.php */
