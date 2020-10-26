<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends MY_Controller 
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		// $this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		$this->template->load('template/v_layout','v_beranda', $data);
	}
}
