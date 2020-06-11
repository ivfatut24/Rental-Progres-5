<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Users');
	}

	public function index()
	{
		$data =[];
		if (isPost()) {
			$data = [
				'nama' 					=> $this->input->post('nama'),
				'email' 				=> $this->input->post('email'),
				'no_telp'	 			=> $this->input->post('no_telp'),
				'username' 				=> $this->input->post('username'),
				'password'				=> $this->input->post('password'),
				'password_konfirmasi'	=> $this->input->post('password_konfirmasi'),
				'level'					=> 1,
			];

			if ($data['password'] === $data['password_konfirmasi']) {
				unset($data['password_konfirmasi']);
				$data['password'] = md5($data['password']);
				if ($this->Model_Users->insertCustomer($data)) {
					$basic  = new \Nexmo\Client\Credentials\Basic('ebe3b032', '2BDhFLvIBCHeJ3f3');
					$client = new \Nexmo\Client($basic);

					$message = $client->message()->send([
						'to'	=> '62'.$data['no_telp'],
						'from'	=> 'Ciliwung Camp [Test]',
						'text'	=> 'Registrasi anda berhasil dengan menggunakan nomor ini'
					]);
					
					$this->session->set_flashdata('msg', '<h4 class="btn btn-success text-center">Registrasi Berhasil<br>Silahkan login...</h4>');
					echo "<script type='text/JavaScript'>setTimeout(function () {
						window.location.href = '".base_url('login')."';
					 }, 2000);</script>"; // 2 detik
					$data = [];
				} else {
					$this->session->set_flashdata('msg', '<h4 class="btn btn-danger text-center">Registrasi Gagal</h4>');
				}				
			} else {
				$this->session->set_flashdata('msg', '<h4 class="btn btn-warning text-center">Konfirmasi Password Salah</h4>');
			}			
		}
		$this->load->view('guest/register', $data);
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */
