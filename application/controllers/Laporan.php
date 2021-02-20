<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_laporan'));
		$this->load->library(array('pdf'));
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

	public function exportpdf($tahun)
	{
		// $data merupakan nilai yang akan ditampilkan di PDF
		$data['list_laporan'] = $this->m_laporan->listlaporan($tahun);
		$data['tahun'] = $tahun;

		// Set ukuran kertas
		$this->pdf->setPaper('A4', 'potrait');
		// Set nama file ketika diunduh
		$this->pdf->filename = "Laporan-". time() .".pdf";

		// Menampilkan halaman PDF
		$this->pdf->load_view('laporan/v_laporan_pdf', $data);
	}
}


