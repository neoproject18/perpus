<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller 
{
	private $userlogin;
	private $encryption_key = '0123456789';
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_user'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function ubahpassword()
	{
		$data['userlogin'] = $this->userlogin;
		$this->template->load('template/v_layout','v_ubah_password', $data);
	}

	public function simpan_password()
	{
		$id_user = $this->userlogin[0]->id_user;
		$users = $this->m_user->getUser_byId($id_user);
		$old_pass = $this->db->escape_str($this->input->post('password_lama'));
		$new_pass = $this->db->escape_str($this->input->post('password_baru'));
		$konfirm_pass = $this->db->escape_str($this->input->post('konfirmasi_password'));

		if($users->password == hash('sha512', $old_pass . $this->encryption_key))
		{
			if($new_pass != $konfirm_pass)
			{
				$output['status_code'] = 400;
				$output['title'] = "Peringatan";
				$output['type'] = "warning";
				$output['message'] = "Konfirmasi password tidak sesuai.";
			}
			else 
			{
				$id_data['id_user'] = $id_user;
				$in_data['password'] = hash('sha512', $new_pass . $this->encryption_key);

				if($this->m_user->update($in_data, $id_data))
				{					
					$output['status_code'] = 200;
					$output['title'] = "Berhasil";
					$output['type'] = "success";
					$output['message'] = "Perhasil mengubah password.";
				}
				else 
				{
					$output['status_code'] = 400;
					$output['title'] = "Gagal";
					$output['type'] = "error";
					$output['message'] = "Gagal mengubah password.";
				}
			}
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Peringatan";
			$output['type'] = "warning";
			$output['message'] = "Password lama tidak sesuai.";
		}
		echo json_encode($output);
	}
}


