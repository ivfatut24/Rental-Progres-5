<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Model_DetailTransaksi extends CI_Model {

		public function getByIdTransaksi($id_transaksi)
		{            
			$this->db->where('id_transaksi', $id_transaksi);            
			return $this->db->get('detail_transaksi')->result();
		}

	}	
	/* End of file Model_DetailTransaksi.php */	
?>
