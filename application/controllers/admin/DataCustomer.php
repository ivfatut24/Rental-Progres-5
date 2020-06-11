<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataCustomer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'data-customer');
		$this->load->model('Model_Users','user');
	}

	public function index()
	{
		$data['data'] = $this->user->getAllCustomer();
		$this->load->view('admin/data_customer/index', $data);
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
			$this->load->view('admin/data_customer/form');
		}else{
			if ($this->user->usernameNotExist($this->input->post('username'))) {
				if ($this->user->insertCustomer()) {
					echo '<script type="text/javascript">alert(\'Customer Berhasil Ditambahkan\');</script>';
					redirect('admin/customer','refresh');
				}else{
					redirect('admin/customer/create');
					$this->load->view('admin/data_customer/form');
					
				}
			}else{
				echo '<script type="text/javascript">alert(\'Username telah digunakan\');</script>';
				$this->load->view('admin/data_customer/form');
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
			$this->load->view('admin/data_customer/form',$data);
		}else{
			if ($this->user->usernameNotExist($this->input->post('username'),$id)) {
				if ($this->user->updateCustomer($id)) {
					echo '<script type="text/javascript">alert(\'Customer Berhasil Diubah\');</script>';
					redirect('admin/customer','refresh');
				}else{
					echo '<script type="text/javascript">alert(\'Customer Gagal Diubah\');</script>';
					$this->load->view('admin/data_customer/form');
					
				}
			}else{
				echo '<script type="text/javascript">alert(\'Username telah digunakan\');</script>';
				$this->load->view('admin/data_customer/form');
			}
		}
	}

	public function delete($id)
	{
		if ($this->user->delete($id)) {
			echo '<script type="text/javascript">alert(\'Customer Berhasil dihapus\');</script>';
		}else{
			echo '<script type="text/javascript">alert(\'Customer Gagal dihapus\');</script>';
		}
		redirect('admin/customer','refresh');
	}

}

/* End of file DataCustomer.php */
/* Location: ./application/controllers/admin/DataCustomer.php */
