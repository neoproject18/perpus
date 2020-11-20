<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends MY_Controller 
{
	private $userlogin;
	private $encryption_key = '0123456789';
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

	public function tambah()
	{
		$data['userlogin'] = $this->userlogin;
		// $data['list_kategori'] = $this->m_kategori->listkategori();
		$this->template->load('template/v_layout','peminjaman/v_tambah', $data);
	}
}


