<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Products extends CI_Model {

	function getAllBarang($date = 0)
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
		
		$this->db->join('kategori_produk kp', 'b.id_kategori_produk = kp.id_kategori_produk', 'left');
		return $this->db->get('barangs b')->result();
	}

	function insertProduct()
	{
		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'harga_sewa'=>$this->input->post('harga_sewa'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'ukuran'=>$this->input->post('ukuran'),
			'id_kategori_produk' => $this->input->post('id_kategori_produk'),
			'gambar_barang'=>$this->upload->data('file_name')
		);
		return $this->db->insert('barangs', $data);
	}

	function update()
	{
		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'harga_sewa'=>$this->input->post('harga_sewa'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'ukuran'=>$this->input->post('ukuran'),
			'id_kategori_produk' => $this->input->post('id_kategori_produk'),
		);
		if (!empty($_FILES['userfile']['name'])) {
			$data['gambar_barang'] = $this->upload->data('file_name');
		}
		$this->db->where('id_barang', $this->input->post('id_barang'));
		return $this->db->update('barangs', $data);
	}

	function getProductById($id)
	{
		$this->db->where('id_barang', $id);
		return $this->db->get('barangs')->row();
	}

	public function delete($id)
	{
		$this->db->where('id_barang', $id);
		return $this->db->delete('barangs');;
	}

	public function updateStock($id_barang, $new_stock)
	{
		$barang = $this->getProductById($id_barang);

		$total_stock = $barang->stok + $new_stock;

		$this->db->where('id_barang', $barang->id_barang);
		$this->db->update('barangs', ['stok' => $total_stock]);
	}

}

/* End of file Model_Products.php */
/* Location: ./application/models/Model_Products.php */
