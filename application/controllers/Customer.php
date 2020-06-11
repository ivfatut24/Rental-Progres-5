<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends MY_Controller
{
	private $kendaraan = [
		1 => ['Motor', 4000],
		2 => ['Mobil', 8000]
	];

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesCustomer();
		$this->load->library("pagination");
	}

	public function index()
	{
		$data['list_barang'] = $this->product->getAllBarang();
		$this->load->view("customer/dashboard", $data);
	}

	public function produk($id = '')
	{
		if (isPost()) {
			$in_keranjang = $this->keranjang->insert();
			if($in_keranjang['status']){
				echo '
					<link rel="stylesheet" href="'.base_url('assets/cardoor/css/jquery-confirm.min.css').'">
					<script src="'.base_url('assets/cardoor/js/jquery-3.2.1.min.js').'"></script>
					<script src="'.base_url('assets/cardoor/js/jquery-confirm.min.js').'"></script>
					<script type="text/javascript">
						$(function() { 
							$.confirm({
								title: "Keranjang",
								content: "'.$in_keranjang['msg'].'",
								buttons: {
									cancel: {
										text:"Kembali",
										btnClass: "btn-brand",
										action: function () {}
									},
									confirm: {
										text:"Lihat Keranjang",
										btnClass: "btn-dark",
										action: function () {
											window.location.replace("'.base_url('customer/keranjang').'");
										}
									}
								}
							});
						});
					</script>';
			} else {
				echo '<script type="text/javascript">alert("'.$in_keranjang['msg'].'");</script>';
			}
		}

		if ($id == '') {
			$data['list_barang'] = $this->product->getAllBarang();			
			$this->load->view("customer/produk", $data);
		} else {
			$data['barang'] = $this->product->getProductById($id);
			$this->load->view("customer/detailproduk", $data);
		}
	}

	public function keranjang($action = '')
	{
		if (isPost()) {
			if ($action === 'delete') {
				if ($this->keranjang->delete()) {
					echo '<script type="text/javascript">alert(\'delete success\');</script>';
				} else {
					echo '<script type="text/javascript">alert(\'delete failed\');</script>';
				}
			}
			if ($action === 'checkout_1') {
				$data['kode_kendaraan']	= $this->input->post('kode_kendaraan');
				$data['kendaraan']		= $this->kendaraan[$this->input->post('kode_kendaraan')];
				$data['subtotal']		= $this->input->post('subtotal');
				$data['total_sewa']		= $data['subtotal'];
				$data['transaksi']		= $this->keranjang->getTransaksi();				
				$data['list_tujuan']	= $this->keranjang->getTujuan();

				$this->load->view("customer/checkout", $data);
				return;
			}
			if ($action === 'checkout_2') {
				$config['upload_path']		= './assets/uploads/jaminan/';
				$config['allowed_types']	= 'gif|jpg|png';
				$config['remove_spaces']	= TRUE;
				$config['encrypt_name']		= TRUE;
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('foto_jaminan')){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center text-white" role="alert"><h4>'.$this->upload->display_errors().'</h4></div>');

					$data['kode_kendaraan']	= $this->input->post('kode_kendaraan');
					$data['kendaraan']		= @$this->kendaraan[$this->input->post('kode_kendaraan')];
					$data['subtotal']		= $this->input->post('subtotal');
					$data['total_sewa']		= $data['subtotal'];
					$data['transaksi']		= $this->keranjang->getTransaksi();
					$data['list_tujuan']	= $this->keranjang->getTujuan();
					$data['transaksi'] = [
						'id_transaksi'		=> $this->input->post('id_transaksi'),
						'tgl_sewa'			=> $this->input->post('tgl_sewa'),
						'tgl_pengembalian'	=> $this->input->post('tgl_pengembalian'),
						'id_tujuan'			=> $this->input->post('id_tujuan'),
						'metode_pengambilan'=> $this->input->post('metode_pengambilan'),
						'kode_kendaraan'	=> $this->input->post('kode_kendaraan'),
						'alamat_pengiriman'	=> $this->input->post('alamat_pengiriman'),
						'jarak'				=> $this->input->post('jarak'),
						'biaya_pengiriman'	=> $this->input->post('biaya_pengiriman'),
						'jaminan'			=> $this->input->post('jaminan'),
						'no_identitas'		=> $this->input->post('no_identitas'),
						'no_telp'			=> $this->input->post('no_telp'),
						'total_harga'		=> $this->input->post('total_harga'),
					];

					$this->load->view("customer/checkout", $data);
					return;
				}
				if ($this->keranjang->checkout()) {
					$data['transaksi'] = $this->keranjang->getTransaksi();
					$data['transaksi']['kendaraan'] = $this->kendaraan[$data['transaksi']['kode_kendaraan']];
					$data['detail_transaksi'] = $this->keranjang->getKeranjang();
					$this->load->view("customer/checkout_detail_pemesanan", $data);
					return;
				}
			}
			if ($action === 'bayar') {
				if ($this->keranjang->bayar()) {
					echo '<form id="form-bayar" action="' . base_url('customer/pembayaran') . '" method="post">
						<input type="hidden" name="id_transaksi" value="' . $this->input->post('id_transaksi') . '">
						<button type="submit">Bayar</button>
						</form>
						<script>document.getElementById("form-bayar").submit();</script>';
				} else {
					echo '<script type="text/javascript">alert(\'Checkout failed\');</script>';
				}
			}
		}
		$data['keranjang'] = $this->keranjang->getKeranjang();
		$this->load->view("customer/keranjang", $data);
	}

	public function list_order($page = 1)
	{
		// ini_set('display_errors', '0');
        // ini_set('display_startup_errors', '0');
		// error_reporting(E_ALL);

		
		$config = array();
        $config["base_url"] 	= base_url() . "customer/list_order";
        $config["total_rows"] 	= count($this->pembayaran->getListPembayaran(0, 0));
        $config["per_page"] 	= 5;
		$config["uri_segment"] 	= 3;
		// theme
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		// 
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();
		$data['list_transaksi'] = $this->pembayaran->getListPembayaran($config["per_page"], $page);
		foreach ($data['list_transaksi'] as $key => $value) {
			$data['list_transaksi'][$key]['kendaraan'] = $this->kendaraan[$data['list_transaksi'][$key]['kode_kendaraan']];
		}

		$this->load->view("customer/list_order", $data);
	}

	public function pembayaran($action = '')
	{
		if (!isPost() || $this->pembayaran->getPembayaran()->status != 0) {
			redirect(base_url('customer/list_order'));
		}

		if ($action == 'upload') {
			$config['upload_path']		= './assets/uploads/bukti bayar/';
			$config['allowed_types']	= 'gif|jpg|png';
			$config['remove_spaces']	= TRUE;
			$config['encrypt_name']		= TRUE;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('bukti_bayar')){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center text-white" role="alert"><h4>'.$this->upload->display_errors().'</h4></div>');
			} else {
				$data['upload_name'] = $this->upload->data('file_name');
			}
		}
		if ($action == 'send') {
			$this->pembayaran->changeStatusPembayaran($this->input->post('id_pembayaran'), 1);

			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-white" role="alert"><h4>Silahkan tunggu admin untuk verifikasi</h4></div>');

			redirect(base_url('customer/list_order'));
		}
		$data['pembayaran'] = $this->pembayaran->getPembayaran();
		$this->load->view("customer/pembayaran", $data);
	}
}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
