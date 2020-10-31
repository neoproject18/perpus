<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends MY_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_buku', 'm_kategori'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_buku->listbuku();
		$this->template->load('template/v_layout','buku/v_index', $data);
	}

	public function tambah()
	{
		$data['userlogin'] = $this->userlogin;
		$data['list_kategori'] = $this->m_kategori->listkategori();
		$this->template->load('template/v_layout','buku/v_tambah', $data);
	}

	public function simpan()
	{
		$in_data['judul_buku'] = $this->db->escape_str($this->input->post('judul'));
		$in_data['tahun_terbit'] = $this->db->escape_str($this->input->post('tahun'));
		$in_data['penerbit'] = $this->db->escape_str($this->input->post('penerbit'));
		$in_data['penulis'] = $this->db->escape_str($this->input->post('penulis'));
		$in_data['id_kategori'] = $this->db->escape_str($this->input->post('id_kategori'));
		
		if($this->m_buku->insert($in_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menambahkan buku.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menambahkan buku.";
		}
		echo json_encode($output);

	}

	public function edit($idbuku)
	{
		$data['userlogin'] = $this->userlogin;
		$data['list_kategori'] = $this->m_kategori->listkategori();
		$data['data_buku'] = $this->m_buku->listbuku_byid($idbuku);
		$this->template->load('template/v_layout','buku/v_ubah', $data);
	}

	public function update($idbuku)
	{
		$id_data['id_buku'] = $idbuku;
		$in_data['judul_buku'] = $this->db->escape_str($this->input->post('judul'));
		$in_data['tahun_terbit'] = $this->db->escape_str($this->input->post('tahun'));
		$in_data['penerbit'] = $this->db->escape_str($this->input->post('penerbit'));
		$in_data['penulis'] = $this->db->escape_str($this->input->post('penulis'));
		$in_data['id_kategori'] = $this->db->escape_str($this->input->post('id_kategori'));
		
		if($this->m_buku->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil mengubah buku.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal mengubah buku.";
		}
		echo json_encode($output);
	}

	// Hapus tapi tidak menghilangkan data dari database || Menggunakan query update
	public function delete($idbuku)
	{
		$id_data['id_buku'] = $idbuku;
		$in_data['isdeleted'] = 1;

		if($this->m_buku->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menghapus buku.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menghapus buku.";
		}
		echo json_encode($output);
	}

	public function delete_from_db($idbuku)
	{
		if($this->m_buku->delete($idbuku))
			redirect('buku', 'refresh');
	}
}


