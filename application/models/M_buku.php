<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_buku extends CI_Model
{
	private $_tbl_buku = 'tbl_buku';

	public function listbuku()
	{
		return $this->db->query("SELECT b.*, k.nama_kategori FROM tbl_buku b
			JOIN tbl_kategori k ON k.id_kategori = b.id_kategori
			WHERE b.isdeleted = 0");
	}

	public function listbuku_byid($idbuku)
	{
		return $this->db->get_where($this->_tbl_buku, ['id_buku' => $idbuku])->row();

		// return $this->db->query("SELECT * FROM tbl_buku WHERE id_buku = '$idbuku'")->row();
	}

	public function insert($data)
	{
		if($this->db->insert($this->_tbl_buku, $data))
			return true;
		return false;
	}

	public function import_data($data)
	{
		if($this->db->insert_batch($this->_tbl_buku, $data))
			return true;
		return false;
	}

	public function update($data, $fieldkey)
	{
		if($this->db->update($this->_tbl_buku, $data, $fieldkey))
			return true;
		return false;
	}

	public function delete($idbuku)
	{
		$this->db->where('id_buku',$idbuku);
		if($this->db->delete($this->_tbl_buku))
			return true;
		return false;
	}

	// Peminjaman
	public function listbukutersedia()
	{
		return $this->db->query("SELECT b.*, k.nama_kategori, 
			(SELECT b.jumlah - COUNT(*) FROM tbl_peminjaman p WHERE p.status_pinjam = 'Pinjam' AND p.id_buku = b.id_buku) sisa
			FROM tbl_buku b
			JOIN tbl_kategori k ON k.id_kategori = b.id_kategori
			WHERE b.isdeleted = 0 AND (SELECT b.jumlah - COUNT(*) FROM tbl_peminjaman p WHERE p.status_pinjam = 'Pinjam' AND p.id_buku = b.id_buku) > 0")->result();
	}
}


