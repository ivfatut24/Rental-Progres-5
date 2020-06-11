<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaBarangMasuk extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesMaintenance();
		$this->session->set_flashdata('menu', 'kelola-barangmasuk');
	}

	public function index()
	{
		$data['list_maintenance'] = $this->maintenance->getAll();
		$this->load->view('maintenance/kelola_barangmasuk/index', $data);
	}

	public function perbaiki($id_maintenance)
	{
		$this->maintenance->changeStatus($id_maintenance, 1);
		redirect(base_url('maintenance/kelola/barangmasuk'));
	}

	public function siap($id_maintenance)
	{
		$this->maintenance->changeStatus($id_maintenance, 2);
		redirect(base_url('maintenance/kelola/barangmasuk'));
	}

	public function selesai($id_maintenance)
	{
		$maintenance = $this->maintenance->getById($id_maintenance);

		$this->product->updateStock($maintenance->id_barang, $maintenance->jumlah_barang);
		$this->maintenance->changeStatus($id_maintenance, 3);
		redirect(base_url('maintenance/kelola/barangmasuk'));
	}

}

/* End of file KelolaBarangMasuk.php */
/* Location: ./application/controllers/admin/KelolaBarangMasuk.php */
