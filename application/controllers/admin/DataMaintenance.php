<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaintenance extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'data-maintenance');
		$this->load->model('Model_Users','user');
		
	}

	public function index()
	{
		$data['data'] = $this->user->getAllMaintenance();
		$this->load->view('admin/data_maintenance/index', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/data_maintenance/form');
		}else{
			if ($this->user->usernameNotExist($this->input->post('username'))) {
				if ($this->user->insertMaintenance()) {
					echo '<script type="text/javascript">alert(\'Maintenance Berhasil Ditambahkan\');</script>';
					redirect('admin/maintenance','refresh');
				}else{
					redirect('admin/maintenance/create');
					$this->load->view('admin/data_maintenance/form');
					
				}
			}else{
				echo '<script type="text/javascript">alert(\'Username telah digunakan\');</script>';
				$this->load->view('admin/data_maintenance/form');
			}
		}
	}

	public function update($id)
	{
		$data['data'] = $this->user->getUserById($id);
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['error'] = validation_errors();
			$this->load->view('admin/data_maintenance/form',$data);
		}else{
			if ($this->user->usernameNotExist($this->input->post('username'),$id)) {
				if ($this->user->updateMaintenance($id)) {
					echo '<script type="text/javascript">alert(\'Maintenance Berhasil Diubah\');</script>';
					redirect('admin/maintenance','refresh');
				}else{
					echo '<script type="text/javascript">alert(\'Maintenance Gagal Diubah\');</script>';
					$this->load->view('admin/data_maintenance/form');
					
				}
			}else{
				echo '<script type="text/javascript">alert(\'Username telah digunakan\');</script>';
				$this->load->view('admin/data_maintenance/form');
			}
		}
	}

	public function delete($id)
	{
		if ($this->user->delete($id)) {
					echo '<script type="text/javascript">alert(\'Maintenance Berhasil dihapus\');</script>';
				}else{
					echo '<script type="text/javascript">alert(\'Maintenance Gagal dihapus\');</script>';
				}
		redirect('admin/maintenance','refresh');
	}

}

/* End of file DataMaintenance.php */
/* Location: ./application/controllers/admin/DataMaintenance.php */
