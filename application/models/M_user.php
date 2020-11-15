<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model
{
	private $_tbl_user = 'tbl_user';
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

	public function listuser()
	{
		return $this->db->query("SELECT u.id_user, u.nama_user, u.username, u.id_role, r.nama_role FROM tbl_user u
			JOIN tbl_role r ON r.id_role = u.id_role
			WHERE u.isdeleted = 0")->result();
	}

	public function insert($data)
	{
		if($this->db->insert($this->_tbl_user, $data))
			return true;
		return false;
	}

	public function update($data, $fieldkey)
	{
		if($this->db->update($this->_tbl_user, $data, $fieldkey))
			return true;
		return false;
	}
}


