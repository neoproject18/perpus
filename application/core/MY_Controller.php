<?php defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class MY_Controller extends CI_Controller 
{
  public function cekLogin()
  {
    // Jika belum ada session username maka 
    // redirect ke halaman auth/login
    if (!$this->session->userdata('login_perpus')) {
      redirect('');
    }
  }
  
  public function getUserData()
  {
    // Ambil semua data session
    $userData = $this->session->userdata('login_perpus');

    // Return userdata
    return $userData;
  }
}

