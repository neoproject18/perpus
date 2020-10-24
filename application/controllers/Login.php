<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	private $encryption_key = '0123456789';
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('login_perpus'))
		{
			redirect('beranda');
		}
		else
		{
			$this->load->view('v_login');
		}
	}

	public function dologin()
	{
		$username = $this->db->escape_str($this->input->post('username'));
		$password = $this->db->escape_str($this->input->post('password'));
		$pass = hash('sha512', $password . $this->encryption_key);
		$result = $this->m_user->login($username, $pass);
		if($result)
		{
			$this->session->set_userdata('login_perpus', $result);
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Anda berhasil login";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Login Gagal";
		}
		echo json_encode($output);
	}
}
