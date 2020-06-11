<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataTujuan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'data-tujuan');
		
	}
	public function index()
	{
		$data['data'] = $this->tujuan->getAll();
		$this->load->view('admin/data_tujuan/index', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/data_tujuan/form');
		}else{
			if ($this->tujuan->insert()) {
				echo '<script type="text/javascript">alert(\'Tujuan Berhasil Ditambahkan\');</script>';
				redirect('admin/tujuan','refresh');
			}else{
				echo '<script type="text/javascript">alert(\'Tujuan Gagal Ditambahkan\');</script>';
				$this->load->view('admin/data_tujuan/form');
			}
		}
	}

	public function update($id)
	{
		$data['data'] = $this->tujuan->getById($id);
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['error'] = validation_errors();
			$this->load->view('admin/data_tujuan/form',$data);
		}else{
			if ($this->tujuan->update($id)) {
				echo '<script type="text/javascript">alert(\'Tujuan Berhasil Diubah\');</script>';
				redirect('admin/tujuan','refresh');
			}else{
				echo '<script type="text/javascript">alert(\'Tujuan Gagal Diubah\');</script>';
				$this->load->view('admin/data_tujuan/form');
			}
		}
	}

	public function delete($id)
	{
		if ($this->tujuan->delete($id)) {
			echo '<script type="text/javascript">alert(\'Tujuan Berhasil dihapus\');</script>';
		}else{
			echo '<script type="text/javascript">alert(\'Tujuan Gagal dihapus\');</script>';
		}
		redirect('admin/tujuan','refresh');
	}

}

/* End of file DataTujuan.php */
/* Location: ./application/controllers/admin/DataTujuan.php */
