<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_KategoriProduk extends CI_Model
{
	function getAll()
	{
		return $this->db->get('kategori_produk')->result();
	}	

	public function getById($id)
	{
		$this->db->where('id_kategori_produk', $id);
		return $this->db->get('kategori_produk')->row();
	}

	function insert($from = '')
	{
		if ($from == '') {
			$data = array(
				'nama_kategori_produk' => $this->input->post('nama_kategori_produk'),
			);
		} else {
			$data = $from;
		}
		
		return $this->db->insert('kategori_produk', $data);
	}

	public function update($id)
	{
		$data = array(
			'nama_kategori_produk' => $this->input->post('nama_kategori_produk'),
		);
		$this->db->where('id_kategori_produk', $id);
		return $this->db->update('kategori_produk', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_kategori_produk', $id);
		return $this->db->delete('kategori_produk');
	}
}

/* End of file Model_KategoriProduk.php */
/* Location: ./application/models/Model_KategoriProduk.php */
