<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_member'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_member->listmember();
		$this->template->load('template/v_layout','member/v_index', $data);
	}

	public function save()
	{
		$id_member = $this->generate_idmember();
		$in_data['id_member'] = $id_member;
		$in_data['nama_member'] = $this->db->escape_str($this->input->post('nama_member'));
		$in_data['alamat'] = $this->db->escape_str($this->input->post('alamat'));
		$in_data['email'] = $this->db->escape_str($this->input->post('email'));
		$in_data['no_telp'] = $this->db->escape_str($this->input->post('no_telp'));
		
		if($this->m_member->insert($in_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menambahkan member.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menambahkan member.";
		}
		echo json_encode($output);
	}

	private function generate_idmember()
	{
		$kode = "10000"; $no = "";
		$nomor = $this->m_member->getIdMember();
		if($nomor) $no = $nomor[0]->nomor + 1;
		else $no = $kode + 1;
		return 'M-' . date('y') . $no;
	}

	public function update()
	{
		$id_data['id_member'] = $this->db->escape_str($this->input->post('id_member'));
		$in_data['nama_member'] = $this->db->escape_str($this->input->post('nama_member'));
		$in_data['alamat'] = $this->db->escape_str($this->input->post('alamat'));
		$in_data['email'] = $this->db->escape_str($this->input->post('email'));
		$in_data['no_telp'] = $this->db->escape_str($this->input->post('no_telp'));
		
		if($this->m_member->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil mengubah member.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal mengubah member.";
		}
		echo json_encode($output);
	}
}


