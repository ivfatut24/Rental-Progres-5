<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Keranjang extends CI_Model {

	function getKeranjang()
	{
		$trans = $this->CekKeranjang();
		
		if ($trans['status']) {
			$id_transaksi = $trans['result']->id_transaksi;
			$detail_trans = $this->getTempdetailTransaksi($id_transaksi);

			if (count($detail_trans) == 0) {
				return ['status' => 0];
			}

			$subtotal = 0;

			$jumlah_ukuran = [
				'kecil'		=> 0,
				'sedang'	=> 0,
				'besar'		=> 0,
			];

			foreach ($detail_trans as $key => $value) {
				$jumlah_ukuran[strtolower($value->ukuran)] += 1;
				$detail_trans[$key]->jumlah_harga_sewa = $value->harga_sewa * $value->jumlah_barang;
				$subtotal += $value->jumlah_harga_sewa;
			}
			
			$kode_kendaraan = 1;
			if ($jumlah_ukuran['besar'] > 0 || $jumlah_ukuran['sedang'] > 5 || $jumlah_ukuran['kecil'] > 7) {
				$kode_kendaraan = 2;
			}

			return [
				'status'		=> 1,
				'id_transaksi'	=> $id_transaksi,
				'kode_kendaraan'=> $kode_kendaraan,
				'subtotal'		=> $subtotal,
				'result'		=> $detail_trans,
			];
		} else {
			return ['status' => 0];
		}		
	}

	function insert()
	{
		$id_user		= $this->session->userdata('id_user');
		$id_barang		= (int)$this->input->post('id_barang');
		$jumlah_barang	= (int)$this->input->post('jumlah_barang');

		$barang = $this->db->get_where('barangs', ['id_barang' => $id_barang], 1)->row();

		$trans = $this->CekKeranjang($id_user);
		
		if ($trans['status']) {
			$id_transaksi = $trans['result']->id_transaksi;
		} else {
			$data_trans = [
				'id_user' 				=> $id_user,
				'status_transaksi' 		=> 0,
			];
			
			$this->db->insert('transaksi', $data_trans);
			$id_transaksi = $this->db->insert_id();
		}

		$where_detail_trans = [
			'id_transaksi'	=> $id_transaksi,
			'id_barang'		=> $id_barang,
		];
		$detail_trans = $this->db->get_where('temp_detail_transaksi', $where_detail_trans, 1);

		if ($detail_trans->num_rows() == 0) {
			$data_detail_trans = [
				'id_transaksi'	=> $id_transaksi,
				'id_barang'		=> $id_barang,
				'jumlah_barang'	=> $jumlah_barang,
			];

			if ($this->db->insert('temp_detail_transaksi', $data_detail_trans)) {
				return [
					'status' 	=> 1,
					'msg'		=> 'Berhasil Menambahkan Produk ke Keranjang',
				];
			} else {
				return [
					'status' 	=> 0,
					'msg'		=> 'Gagal Menambahkan Produk ke Keranjang',
				];
			}
		} else {			
			$jumlah_barang += $detail_trans->row()->jumlah_barang;

			if ($barang->stok < $jumlah_barang) {
				return [
					'status' 	=> 0,
					'msg'		=> 'Stok tidak mencukupi. Cek Keranjang Anda',
				];
			}
			
			if ($this->db->update('temp_detail_transaksi', ['jumlah_barang' => $jumlah_barang], $where_detail_trans)) {
				return [
					'status' 	=> 1,
					'msg'		=> 'Berhasil Menambahkan Produk ke Keranjang',
				];
			} else {
				return [
					'status' 	=> 0,
					'msg'		=> 'Gagal Menambahkan Produk ke Keranjang',
				];
			}
		}
	}

	function delete()
	{
		$id_temp_detail_transaksi	= $this->input->post('id_temp_detail_transaksi');
		
		if($this->db->delete('temp_detail_transaksi', ['id_temp_detail_transaksi' => $id_temp_detail_transaksi])){
			return 1;
		} else {
			return 0;
		}
	}

	function getTujuan()
	{
		return $this->db->get('tujuan')->result();
	}

	function getTransaksi($id = "")
	{		
		$this->db->join('tujuan tj', 'tj.id = t.id_tujuan', 'left');
		
		if ($id == "") {
			return $this->db->get_where('transaksi t', ['id_transaksi' => $this->input->post('id_transaksi')])->row_array();
		} else {
			return $this->db->get_where('transaksi t', ['id_transaksi' => $id])->row_array();
		}
	}

	function checkout()
	{		
		$data = [
			'subtotal'			=> $this->input->post('subtotal'),
			'tgl_pemesanan'		=> date('Y-m-d H:i:s', strtotime('NOW')),
			'tgl_sewa'			=> $this->input->post('tgl_sewa'),
			'tgl_pengembalian'	=> $this->input->post('tgl_pengembalian'),
			'id_tujuan'			=> $this->input->post('id_tujuan'),
			'metode_pengambilan'=> $this->input->post('metode_pengambilan'),
			'kode_kendaraan'	=> $this->input->post('kode_kendaraan'),
			'alamat_pengiriman'	=> $this->input->post('alamat_pengiriman'),
			'jarak'				=> $this->input->post('jarak'),
			'biaya_pengiriman'	=> $this->input->post('biaya_pengiriman'),
			'jaminan'			=> $this->input->post('jaminan'),
			'foto_jaminan'		=> $this->upload->data('file_name'),
			'no_identitas'		=> $this->input->post('no_identitas'),
			'no_telp'			=> $this->input->post('no_telp'),
			'total_harga'		=> $this->input->post('total_harga'),
		];

		if (!$this->input->post('simpan_alamat') || empty($data['alamat_pengiriman'])) {
			unset($data['alamat_pengiriman']);
		}		

		if ($this->db->update('transaksi', $data, ['id_transaksi' => $this->input->post('id_transaksi')])) {
			return 1;
		} else {
			return 0;
		}
	}

	function bayar()
	{
		$id_transaksi = $this->input->post('id_transaksi');

		if ($this->db->update('transaksi', ['status_transaksi' => 1], ['id_transaksi' => $id_transaksi])) {
			$temp_detail_transaksi = $this->getTempdetailTransaksi($id_transaksi);

			foreach ($temp_detail_transaksi as $key => $barang) {
				$this->db->update('barangs', ['stok' => $barang->stok - $barang->jumlah_barang], ['id_barang' => $barang->id_barang]);
				$this->db->insert('detail_transaksi', [
					'id_transaksi' => $barang->id_transaksi,
					'id_barang' => $barang->id_barang,
					'jumlah_barang' => $barang->jumlah_barang,
				]);
				$this->db->delete('temp_detail_transaksi', ['id_temp_detail_transaksi' => $barang->id_temp_detail_transaksi]);
			}
			
			$data = [
				'id_transaksi'	=> $this->input->post('id_transaksi'),
				'tgl_deadline'	=> date('Y-m-d H:i:s', strtotime('NOW') + 60*60*12), // 12 jam
				'status'		=> 0,
			];
			$this->db->insert('pembayaran', $data);
			
			return 1;
		} else {
			return 0;
		}
	}

	private function CekKeranjang($id_user = '')
	{
		if ($id_user == '') {
			$id_user = $this->session->userdata('id_user');
		}

		$trans = $this->db->get_where('transaksi', [
			'id_user' => $id_user,
			'status_transaksi' => 0
		], 1);

		if ($trans->num_rows() == 0) {
			return ['status' => 0];
		} else {
			return [
				'status' => 1,
				'result' => $trans->row()
			];
		}
	}

	private function getTempdetailTransaksi($id_transaksi)
	{
		$this->db->join('barangs', 'temp_detail_transaksi.id_barang = barangs.id_barang');
		return $this->db->get_where('temp_detail_transaksi', ['id_transaksi' => $id_transaksi])->result();
	}
}

/* End of file Model_Keranjang.php */
