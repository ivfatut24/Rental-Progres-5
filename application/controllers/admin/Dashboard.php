<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'dashboard');
	}

	public function index()
	{
		// $date = date('Y-m-01 00:00:00');
		// $data['pemesanan']['values'] = $this->pemesanan->getAllPemesanan();
		// dd(count($data['pemesanan']['values']));
		
		$data['user']['values'] = $this->user->getAllCustomer();
		$data['user']['length'] = count($data['user']['values']);
		$count_user_last_month = count($this->user->getAllCustomer(1));
		$count_user_this_month = count($this->user->getAllCustomer(2));
		$count_user = ($count_user_this_month - $count_user_last_month) / ($count_user_last_month === 0 ? 1 : $count_user_last_month) * 100;
		$data['user']['percentage'] = strpos($count_user, '-') !== false ? '<span class="text-danger">'.$count_user.'%</span>' : '<span class="text-success">+'.$count_user.'%</span>' ;
		
		$data['product']['values'] = $this->product->getAllBarang();
		$data['product']['length'] = count($data['product']['values']);
		$count_product_last_month = count($this->product->getAllBarang(1));
		$count_product_this_month = count($this->product->getAllBarang(2));
		$count_product = ($count_product_this_month - $count_product_last_month) / ($count_product_last_month === 0 ? 1 : $count_product_last_month) * 100;
		$data['product']['percentage'] = strpos($count_product, '-') !== false ? '<span class="text-danger">'.$count_product.'%</span>' : '<span class="text-success">+'.$count_product.'%</span>' ;

		$data['pemesanan']['values'] = $this->pemesanan->getAllPemesanan();
		$data['pemesanan']['length'] = count($data['pemesanan']['values']);
		$count_pemesanan_last_month = count($this->pemesanan->getAllPemesanan(1));
		$count_pemesanan_this_month = count($this->pemesanan->getAllPemesanan(2));
		$count_pemesanan = ($count_pemesanan_this_month - $count_pemesanan_last_month) / ($count_pemesanan_last_month === 0 ? 1 : $count_pemesanan_last_month) * 100;
		$data['pemesanan']['percentage'] = strpos($count_pemesanan, '-') !== false ? '<span class="text-danger">'.$count_pemesanan.'%</span>' : '<span class="text-success">+'.$count_pemesanan.'%</span>' ;

		$data['pembayaran_berhasil']['values'] = $this->pembayaran->getAllPembayaran(3);
		$data['pembayaran_berhasil']['length'] = count($data['pembayaran_berhasil']['values']);
		$count_pembayaran_berhasil_last_month = count($this->pembayaran->getAllPembayaran(1));
		$count_pembayaran_berhasil_this_month = count($this->pembayaran->getAllPembayaran(2));
		$count_pembayaran_berhasil = ($count_pembayaran_berhasil_this_month - $count_pembayaran_berhasil_last_month) / ($count_pembayaran_berhasil_last_month === 0 ? 1 : $count_pembayaran_berhasil_last_month) * 100;
		$data['pembayaran_berhasil']['percentage'] = strpos($count_pembayaran_berhasil, '-') !== false ? '<span class="text-danger">'.$count_pembayaran_berhasil.'%</span>' : '<span class="text-success">+'.$count_pembayaran_berhasil.'%</span>' ;

		$data['pembayaran_belum_konfirmasi'] = $this->pembayaran->getAllPembayaran(4);

		$this->load->view('admin/dashboard', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
