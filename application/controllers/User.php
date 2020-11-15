<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller 
{
	private $encryption_key = '0123456789';
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_user','m_role'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_user->listuser();
		$data['list_role'] = $this->m_role->listrole();
		$this->template->load('template/v_layout','user/v_index', $data);
	}

	public function save()
	{
		$in_data['nama_user'] = $this->db->escape_str($this->input->post('nama_user'));
		$in_data['username'] = $this->db->escape_str($this->input->post('username'));
		$in_data['id_role'] = $this->db->escape_str($this->input->post('id_role'));
		$in_data['password'] = hash('sha512', '123456' . $this->encryption_key);
		
		if($this->m_user->insert($in_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menambahkan user.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menambahkan user.";
		}
		echo json_encode($output);

	}

	public function update()
	{
		$id_data['id_user'] = $this->db->escape_str($this->input->post('id_user'));
		$in_data['nama_user'] = $this->db->escape_str($this->input->post('nama_user'));
		$in_data['username'] = $this->db->escape_str($this->input->post('username'));
		$in_data['id_role'] = $this->db->escape_str($this->input->post('id_role'));
		
		if($this->m_user->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil mengubah user.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal mengubah user.";
		}
		echo json_encode($output);
	}

	public function delete($iduser)
	{
		$id_data['id_user'] = $iduser;
		$in_data['isdeleted'] = 1;

		if($this->m_user->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menghapus user.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menghapus user.";
		}
		echo json_encode($output);
	}

	public function resetpassword($iduser)
	{
		$id_data['id_user'] = $iduser;
		$in_data['password'] = hash('sha512', '123456' . $this->encryption_key);

		if($this->m_user->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil reset password user.\nPassword adalah: 123456";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal reset password user.";
		}
		echo json_encode($output);
	}
}


