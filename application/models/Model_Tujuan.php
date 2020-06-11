<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Tujuan extends CI_Model
{
	function getAll($num_rows = false)
	{
		$ret = $this->db->get('tujuan');
		if ($num_rows) {
			return $ret->num_rows();
		}
		return $ret->result();
	}	

	public function getById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('tujuan')->row();
	}

	function insert($from = '')
	{
		if ($from == '') {
			$data = array(
				'tujuan' => $this->input->post('tujuan'),
			);
		} else {
			$data = $from;
		}
		
		return $this->db->insert('tujuan', $data);
	}

	public function update($id)
	{
		$data = array(
			'tujuan' => $this->input->post('tujuan'),
		);
		$this->db->where('id', $id);
		return $this->db->update('tujuan', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tujuan');
	}
}

/* End of file Model_Tujuan.php */
/* Location: ./application/models/Model_Tujuan.php */
