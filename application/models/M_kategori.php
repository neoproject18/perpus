<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kategori extends CI_Model
{
	private $_tbl_kategori = 'tbl_kategori';

	public function listkategori()
	{
		return $this->db->order_by('nama_kategori', 'asc')->get($this->_tbl_kategori)->result();
	}
}


