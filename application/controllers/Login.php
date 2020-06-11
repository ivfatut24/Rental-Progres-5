<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Users','users');
		if ($this->uri->segment(1) != 'logout') {
			$this->cekHakAkses();
		}
	}

	public function index()
	{
		$this->load->view('guest/login');
	}

	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login = $this->users->login($username,$password);
		
		if ($login['status']) {
			$session = array(
				'id_user'	=> $login['result']['id_user'],
				'nama'		=> $login['result']['nama'],
				'username'	=> $login['result']['username'],
				'level'		=> $login['result']['level']
			);
			$this->session->set_userdata($session);
			echo '<script type="text/javascript">alert(\''.$login['message'].'\');</script>';
			$this->cekHakAkses();
		}else{
			$this->session->set_flashdata('msg', '<h4 class="text-center btn btn-danger">'. $login['message'] .'</h4>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
