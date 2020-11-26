<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_peminjaman extends CI_Model
{
	private $_tbl_peminjaman = 'tbl_peminjaman';

	public function list_peminjaman()
	{
		return $this->db->query("SELECT p.id_peminjaman, m.*, b.*, p.id_user, u.nama_user, p.tgl_pinjam, p.tgl_kembali, p.status_pinjam FROM tbl_peminjaman p 
			JOIN tbl_member m ON m.id_member = p.id_member
			JOIN tbl_buku b ON b.id_buku = p.id_buku
			JOIN tbl_user u ON u.id_user = p.id_user
			WHERE p.status_pinjam = 'Pinjam'")->result();
	}

	public function filter_list_peminjaman($status)
	{
		if($status != "semua")
			$st = "WHERE p.status_pinjam = '$status'";
		else $st = "";

		return $this->db->query("SELECT p.id_peminjaman, m.*, b.*, p.id_user, u.nama_user, p.tgl_pinjam, p.tgl_kembali, p.status_pinjam FROM tbl_peminjaman p 
			JOIN tbl_member m ON m.id_member = p.id_member
			JOIN tbl_buku b ON b.id_buku = p.id_buku
			JOIN tbl_user u ON u.id_user = p.id_user
			$st")->result();
	}

	public function list_peminjaman_byid($idpinjam)
	{
		return $this->db->query("SELECT p.id_peminjaman, m.*, b.*, p.id_user, u.nama_user, p.tgl_pinjam, p.tgl_kembali, p.status_pinjam FROM tbl_peminjaman p 
			JOIN tbl_member m ON m.id_member = p.id_member
			JOIN tbl_buku b ON b.id_buku = p.id_buku
			JOIN tbl_user u ON u.id_user = p.id_user
			WHERE p.status_pinjam = 'Pinjam' AND p.id_peminjaman = '$idpinjam'")->row();
	}

	public function insert($data)
	{
		if($this->db->insert($this->_tbl_peminjaman, $data))
			return true;
		return false;
	}

	public function update($data, $fieldkey)
	{
		if($this->db->update($this->_tbl_peminjaman, $data, $fieldkey))
			return true;
		return false;
	}
}


