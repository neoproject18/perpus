<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_kategori'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_kategori->listkategori();
		$this->template->load('template/v_layout','kategori/v_index', $data);
	}

	public function save()
	{
		$in_data['nama_kategori'] = $this->db->escape_str($this->input->post('nama_kategori'));
		
		if($this->m_kategori->insert($in_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menambahkan kategori.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menambahkan kategori.";
		}
		echo json_encode($output);

	}

	public function update()
	{
		$id_data['id_kategori'] = $this->db->escape_str($this->input->post('id_kategori'));
		$in_data['nama_kategori'] = $this->db->escape_str($this->input->post('nama_kategori'));
		
		if($this->m_kategori->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil mengubah kategori.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal mengubah kategori.";
		}
		echo json_encode($output);
	}

	public function delete($idkategori)
	{
		$id_data['id_kategori'] = $idkategori;
		$in_data['isdeleted'] = 1;

		if($this->m_kategori->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menghapus kategori.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menghapus kategori.";
		}
		echo json_encode($output);
	}
}


