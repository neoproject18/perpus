<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends MY_Controller 
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
		$tahun = 2020;
		$data['userlogin'] = $this->userlogin;
		$data['list_laporan'] = $this->m_laporan->listlaporan($tahun);
		$data['tahun'] = $tahun;
		$this->template->load('template/v_layout','v_beranda', $data);
	}
}


