<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends MY_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_peminjaman','m_buku','m_member'));
		$this->load->library(array('PHPExcel', 'excel'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_peminjaman->list_peminjaman();
		$this->template->load('template/v_layout','peminjaman/v_index', $data);
	}

	public function filter($status, $tgl_awal, $tgl_akhir)
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_peminjaman->filter_list_peminjaman($status, $tgl_awal, $tgl_akhir);
		$this->template->load('template/v_layout','peminjaman/v_index', $data);
	}

	public function tambah()
	{
		$data['userlogin'] = $this->userlogin;
		$data['list_member'] = $this->m_member->listmember();
		$data['list_buku'] = $this->m_buku->listbukutersedia();
		$this->template->load('template/v_layout','peminjaman/v_tambah', $data);
	}

	public function simpan_peminjaman()
	{
		$in_data['id_peminjaman'] = 'P-' . time();
		$in_data['id_member'] = $this->db->escape_str($this->input->post('id_member'));
		$in_data['id_buku'] = $this->db->escape_str($this->input->post('id_buku'));
		$in_data['id_user'] = $this->userlogin[0]->id_user;
		$in_data['tgl_pinjam'] = date('Y-m-d H:i:s');
		$in_data['status_pinjam'] = 'Pinjam';
		
		if($this->m_peminjaman->insert($in_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menambahkan peminjaman buku.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menambahkan peminjaman buku.";
		}
		echo json_encode($output);
	}

	public function ubah($idpinjam)
	{
		$data['userlogin'] = $this->userlogin;
		$data['list_member'] = $this->m_member->listmember();
		$data['list_buku'] = $this->m_buku->listbukutersedia();
		$data['data_pinjam'] = $this->m_peminjaman->list_peminjaman_byid($idpinjam);
		$this->template->load('template/v_layout','peminjaman/v_ubah', $data);
	}

	public function ubah_peminjaman($idpinjam)
	{
		$idbuku = $this->db->escape_str($this->input->post('id_buku'));
		$status = $this->db->escape_str($this->input->post('status'));

		$id_data['id_peminjaman'] = $idpinjam;
		$in_data['id_buku'] = $idbuku;

		if($status == "Kembali")
		{
			$in_data['tgl_kembali'] = date('Y-m-d H:i:s');
			$in_data['status_pinjam'] = $status;
		}
		
		if($this->m_peminjaman->update($in_data, $id_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil mengubah peminjaman buku.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal mengubah peminjaman buku.";
		}
		echo json_encode($output);
	}

	public function exportlistpeminjaman($status, $tgl_awal, $tgl_akhir)
	{
		$listdata = $this->m_peminjaman->filter_list_peminjaman($status, $tgl_awal, $tgl_akhir);

		// create file name
		$fileName = 'export_peminjaman.xls';
		@unlink("./" . $fileName);
		$objPHPExcel = new PHPExcel();
		$startRow = 1;

		// SHEET 1
		$objPHPExcel->setActiveSheetIndex(0);
		$this->createExcel($objPHPExcel, $startRow, $listdata);

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save($fileName);
		// var_dump($fileName); exit;
		// download file
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url().$fileName);
	}

	private function createExcel($objPHPExcel, $startRow, $data)
	{
		// Set Judul Tabel
		$objPHPExcel->getActiveSheet()->SetCellValue('A' . $startRow, 'NO.');
		$objPHPExcel->getActiveSheet()->SetCellValue('B' . $startRow, 'ID PINJAM');
		$objPHPExcel->getActiveSheet()->SetCellValue('C' . $startRow, 'NAMA MEMBER');
		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $startRow, 'KODE MEMBER');
		$objPHPExcel->getActiveSheet()->SetCellValue('E' . $startRow, 'JUDUL BUKU');
		$objPHPExcel->getActiveSheet()->SetCellValue('F' . $startRow, 'TGL PINJAM');
		$objPHPExcel->getActiveSheet()->SetCellValue('G' . $startRow, 'TGL KEMBALI');
		$objPHPExcel->getActiveSheet()->SetCellValue('H' . $startRow, 'STATUS');

        // set Data
		$rowCount = $startRow+1;
		foreach ($data as $val) 
		{
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $rowCount-1);
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $val->id_peminjaman);
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $val->nama_member);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $val->id_member);
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $val->judul_buku);
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $val->tgl_pinjam);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $val->tgl_kembali);
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $val->status_pinjam);
			$this->setBorder($objPHPExcel, 'A' .  $startRow . ':H' .  $rowCount);
			$rowCount++;
		}
	}

	private function setBorder($objPHPExcel, $area)
	{
    	//membuat border 
		$objPHPExcel->getActiveSheet()->getStyle($area)->applyFromArray( 
			array(
				'borders' => array( 
					'allborders' => array( 
						'style' => PHPExcel_Style_Border::BORDER_THIN 
					) 
				) 
			) 
		);
	}


}


