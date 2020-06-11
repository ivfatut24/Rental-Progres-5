<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Users extends CI_Model
{

	function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$user = $this->db->get('users')->row_array();
		if (empty($user)) {
			$output['status'] = false;
			$output['message'] = "Pengguna tidak ditemukan";
		} else {
			$output['status'] = true;
			$output['message'] = "Berhasil login";
			$output['result'] = $user;
		}
		return $output;
	}

	function getAllCustomer($date = 0)
	{
		if ($date == 1) {
			$firstDay = new DateTime('first day of last month');
			$lastDay  = new DateTime('last day of last month');
			$this->db->where('created_at BETWEEN \''. $firstDay->format('Y-m-d h:i:s') .'\' AND \''. $lastDay->format('Y-m-d h:i:s') .'\'');
		}
		if ($date == 2) {
			$firstDay = new DateTime('first day of this month');
			$lastDay  = new DateTime('last day of this month');
			$this->db->where('created_at BETWEEN \''. $firstDay->format('Y-m-d h:i:s') .'\' AND \''. $lastDay->format('Y-m-d h:i:s') .'\'');
		}
		
		$this->db->where('level', 1);
		return $this->db->get('users')->result();
	}

	function getAllMaintenance()
	{
		$this->db->where('level', 2);
		return $this->db->get('users')->result();
	}

	function getAllAdmin()
	{
		$this->db->where('level', 0);
		return $this->db->get('users')->result();
	}

	function usernameNotExist($username, $edit = '')
	{
		$this->db->where('username', $username);
		if (!empty($edit)) {
			$this->db->where('id_user <>' . $edit);
		}
		$check = $this->db->get('users')->row();
		if (empty($check)) {
			return true;
		} else {
			return false;
		}
	}

	public function getUserById($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('users')->row();
	}


	function insertCustomer($from = '')
	{
		if ($from == '') {
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'level' => 1,
			);
		} else {
			$data = $from;
		}
		
		return $this->db->insert('users', $data);
	}

	public function updateCustomer($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 1,
		);
		$this->db->where('id_user', $id);
		return $this->db->update('users', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->delete('users');
	}

	function insertAdmin()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 0,
		);
		return $this->db->insert('users', $data);
	}

	function updateAdmin($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 0,
		);
		$this->db->where('id_user', $id);
		return $this->db->update('users', $data);
	}

	function insertMaintenance()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 2,
		);
		return $this->db->insert('users', $data);
	}

	public function updateMaintenance($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 2,
		);
		$this->db->where('id_user', $id);
		return $this->db->update('users', $data);
	}

	function getById($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('users')->row();
	}
}

/* End of file Model_Users.php */
/* Location: ./application/models/Model_Users.php */
