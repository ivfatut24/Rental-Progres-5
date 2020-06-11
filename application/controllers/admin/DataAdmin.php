<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAdmin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'data-admin');
		$this->load->model('Model_Users','user');
		
	}
	public function index()
	{
		$data['data'] = $this->user->getAllAdmin();
		$this->load->view('admin/data_admin/index', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/data_admin/form');
		}else{
			if ($this->user->usernameNotExist($this->input->post('username'))) {
				if ($this->user->insertAdmin()) {
					echo '<script type="text/javascript">alert(\'Admin Berhasil Ditambahkan\');</script>';
					redirect('admin/admin','refresh');
				}else{
					echo '<script type="text/javascript">alert(\'Admin Gagal Ditambahkan\');</script>';
					$this->load->view('admin/admin/form');
					
				}
			}else{
				echo '<script type="text/javascript">alert(\'Admin telah digunakan\');</script>';
				$this->load->view('admin/admin/form');
			}
		}
	}

	public function update($id)
	{
		$data['data'] = $this->user->getUserById($id);
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['error'] = validation_errors();
			$this->load->view('admin/data_admin/form',$data);
		}else{
			if ($this->user->usernameNotExist($this->input->post('username'),$id)) {
				if ($this->user->updateAdmin($id)) {
					echo '<script type="text/javascript">alert(\'Admin Berhasil Diubah\');</script>';
					redirect('admin/admin','refresh');
				}else{
					echo '<script type="text/javascript">alert(\'Admin Gagal Diubah\');</script>';
					$this->load->view('admin/data_admin/form');
					
				}
			}else{
				echo '<script type="text/javascript">alert(\'Username telah digunakan\');</script>';
				$this->load->view('admin/data_admin/form');
			}
		}
	}

	public function delete($id)
	{
		if ($this->user->delete($id)) {
					echo '<script type="text/javascript">alert(\'Admin Berhasil dihapus\');</script>';
				}else{
					echo '<script type="text/javascript">alert(\'Admin Gagal dihapus\');</script>';
				}
		redirect('admin/admin','refresh');
	}

}

/* End of file DataAdmin.php */
/* Location: ./application/controllers/admin/DataAdmin.php */
