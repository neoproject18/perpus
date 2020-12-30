<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_laporan'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$tahun = date('Y'); // tahun saat ini
		$data['userlogin'] = $this->userlogin;
		$data['list_laporan'] = $this->m_laporan->listlaporan($tahun);
		$this->template->load('template/v_layout','laporan/v_index', $data);
	}

	public function filter($tahun)
	{
		$data['userlogin'] = $this->userlogin;
		$data['list_laporan'] = $this->m_laporan->listlaporan($tahun);
		$this->template->load('template/v_layout','laporan/v_index', $data);
	}
}


