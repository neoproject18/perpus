<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kategori extends CI_Model
{
	private $_tbl_kategori = 'tbl_kategori';

	public function listkategori()
	{
		return $this->db->order_by('nama_kategori', 'asc')->get_where($this->_tbl_kategori, ['isdeleted' => 0])->result();
	}

	public function insert($data)
	{
		if($this->db->insert($this->_tbl_kategori, $data))
			return true;
		return false;
	}

	public function update($data, $fieldkey)
	{
		if($this->db->update($this->_tbl_kategori, $data, $fieldkey))
			return true;
		return false;
	}
}


