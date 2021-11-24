<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_galeri'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_galeri->listGaleri();
		$this->template->load('template/v_layout','galeri/v_index', $data);
	}

	public function savedata()
	{
		// lokasi direktori yang digunakan untuk menyimpan file
		$path = "uploads/galeri/";

		// Jika di dalam project belum ada folder uploads/galeri maka secara otomatis akan dicreate foldernya.
		if (!is_dir($path)) {
			mkdir($path);
		}

		$data = [];
		$jumlah_berkas = count($_FILES['galeri']['name']);

		for($i = 0; $i <= $jumlah_berkas; $i++)
		{
			if(!empty($_FILES['galeri']['name'][$i]))
			{
				$_FILES['file']['name'] = $_FILES['galeri']['name'][$i];
				$_FILES['file']['type'] = $_FILES['galeri']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['galeri']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['galeri']['error'][$i];
				$_FILES['file']['size'] = $_FILES['galeri']['size'][$i];

				$config['upload_path'] = "./" . $path; // lokasi direktori file gambar akan disimpan
				$config['allowed_types'] = 'gif|jpg|png|jpeg'; // jenis file gambar yang diijinkan untuk diupload
				$config['file_name'] = time(); // rename nama file yang disimpan
				$config['max_size'] = 1024; // ukuran maksimum file yang diijinkan
				$this->upload->initialize($config);

				if($this->upload->do_upload("file"))
				{
					$uploadData = $this->upload->data();
					$data[] = array(
						'filename' => $uploadData['file_name'],
						'type' => $_FILES['galeri']['type'][$i],
						'size' => $_FILES['galeri']['size'][$i],
						'path' => "./" . $path . $uploadData['file_name'],
					);
				}
			}
		}

		if($this->m_galeri->insert($data)) 
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menambahkan galeri.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menambahkan galeri.";
		}
		echo json_encode($output);
	}

	public function deletedata($id)
	{
		$dataGaleri = $this->m_galeri->listGaleri_byid($id);

		if($this->m_galeri->delete($id))
		{
			// digunakan untuk menghapus file yang sebelumnya pernah diupload
			@unlink($dataGaleri->path);

			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menghapus galeri.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menghapus galeri.";
		}
		echo json_encode($output);
	}
}


