<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Menghapus session login
		$this->session->unset_userdata('login_perpus');
		session_destroy();

		// Kembali ke halaman utama
		redirect('', 'refresh');
	}
}

