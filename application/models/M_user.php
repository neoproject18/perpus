<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function login($username, $password)
	{
		$query = $this->db->query("SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password' AND isdeleted = 0");

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}


