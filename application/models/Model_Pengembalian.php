<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Model_Pengembalian extends CI_Model {

		public function insert()
		{
			$data = [
				'id_transaksi'		=> $this->input->post('id_transaksi'),
				'kondisi_barang'	=> $this->input->post('kondisi_barang'),
				'denda'				=> $this->input->post('denda'),
				'keterangan'		=> $this->input->post('keterangan'),				
			];

			$this->db->insert('pengembalian', $data);
			
		}

	}	
	/* End of file Model_Pengembalian.php */	
?>
