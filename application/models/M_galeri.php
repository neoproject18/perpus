<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_galeri extends CI_Model
{
	private $_tbl_galeri = 'tbl_galeri';

	public function listGaleri()
	{
		return $this->db->get($this->_tbl_galeri)->result();
	}

	public function listGaleri_byid($id)
	{
		return $this->db->get_where($this->_tbl_galeri, ['id_galeri' => $id])->row();
	}

	public function insert($data)
	{
		if($this->db->insert_batch($this->_tbl_galeri, $data))
			return true;
		return false;
	}

	public function delete($id)
	{
		$this->db->where('id_galeri',$id);
		if($this->db->delete($this->_tbl_galeri))
			return true;
		return false;
	}
}


