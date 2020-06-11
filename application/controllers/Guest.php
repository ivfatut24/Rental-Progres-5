<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Model_Keranjang', 'Model_Products']);
		$this->cekHakAkses();
	}
	
	public function index()
	{
		$data['list_barang'] = $this->Model_Products->getAllBarang();
		$this->load->view("guest/dashboard", $data);
	}

	public function produk($id = '')
	{
		if (isPost()) {
			if($this->Model_Keranjang->insert()){
				echo '<script type="text/javascript">alert(\'success\');</script>';
			} else {
				echo '<script type="text/javascript">alert(\'failed\');</script>';
			}
		}

		if ($id == '') {
			$data['list_barang'] = $this->Model_Products->getAllBarang();			
			$this->load->view("guest/produk", $data);
		} else {
			$data['barang'] = $this->Model_Products->getProductById($id);
			$this->load->view("guest/detailproduk", $data);
		}
	}

	public function keranjang()
	{
		$this->load->view("guest/keranjang");
	}

	public function galery()
	{
		$this->load->view("guest/galery");
	}
	public function detail()
	{
		$this->load->view("guest/detailproduk");
	}

}

/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */
