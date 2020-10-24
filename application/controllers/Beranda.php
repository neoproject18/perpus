<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->userlogin = $this->session->userdata('login_perpus');
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		// var_dump($this->userlogin[0]->id_role); exit;
		// $this->load->view('template/v_template');
		$this->template->load('template/v_template','v_beranda', $data);
	}
}
