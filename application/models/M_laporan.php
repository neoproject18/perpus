<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model
{
	public function listlaporan($tahun)
	{
		return $this->db->query("SELECT b.*, (SELECT COUNT(*) FROM tbl_member m 
			WHERE MONTH(m.created) = b.id_bulan AND YEAR(m.created) = $tahun) jml_member,
			(SELECT COUNT(*) FROM tbl_peminjaman p WHERE MONTH(p.tgl_pinjam) = 
			b.id_bulan AND YEAR(p.tgl_pinjam) = $tahun) jml_peminjaman
			FROM tbl_bulan b")->result();
	}
}


