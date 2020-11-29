<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends MY_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_peminjaman','m_buku','m_member'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_peminjaman->list_peminjaman();
		$this->template->load('template/v_layout','peminjaman/v_index', $data);
	}

	public function filter($status)
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_peminjaman->filter_list_peminjaman($status);
		$this->template->load('template/v_layout','peminjaman/v_index', $data);
	}

	public function tambah()
	{
		$data['userlogin'] = $this->userlogin;
		$data['list_member'] = $this->m_member->listmember();
		$data['list_buku'] = $this->m_buku->listbukutersedia();
		$this->template->load('template/v_layout','peminjaman/v_tambah', $data);
	}

	public function simpan_peminjaman()
	{
		$in_data['id_peminjaman'] = 'P-' . time();
		$in_data['id_member'] = $this->db->escape_str($this->input->post('id_member'));
		$in_data['id_buku'] = $this->db->escape_str($this->input->post('id_buku'));
		$in_data['id_user'] = $this->userlogin[0]->id_user;
		$in_data['tgl_pinjam'] = date('Y-m-d H:i:s');
		$in_data['status_pinjam'] = 'Pinjam';
		
		if($this->m_peminjaman->insert($in_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menambahkan peminjaman buku.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menambahkan peminjaman buku.";
		}
		echo json_encode($output);
	}

	public function ubah($idpinjam)
	{
		$data['userlogin'] = $this->userlogin;
		$data['list_member'] = $this->m_member->listmember();
		$data['list_buku'] = $this->m_buku->listbukutersedia();
		$data['data_pinjam'] = $this->m_peminjaman->list_peminjaman_byid($idpinjam);
		$this->template->load('template/v_layout','peminjaman/v_ubah', $data);
	}

	public function ubah_peminjaman($idpinjam)
	{
		$idbuku = $this->db->escape_str($this->input->post('id_buku'));
		$status = $this->db->escape_str($this->input->post('status'));

		$id_data['id_peminjaman'] = $idpinjam;
		$in_data['id_buku'] = $idbuku;

		if($status == "Kembali")
		{
			$in_data['tgl_kembali'] = date('Y-m-d H:i:s');
			$in_data['status_pinjam'] = $status;
		}
		
		if($this->m_peminjaman->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil mengubah peminjaman buku.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal mengubah peminjaman buku.";
		}
		echo json_encode($output);
	}
}


