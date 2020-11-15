<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_member extends CI_Model
{
	private $_tbl_member = 'tbl_member';
	public function listmember()
	{
		return $this->db->get($this->_tbl_member)->result();
	}

	public function getIdMember()
	{
		return $this->db->query("SELECT MID(id_member, 5,7) nomor FROM tbl_member 
			WHERE YEAR(created) = YEAR(CURRENT_TIMESTAMP)
			ORDER BY created DESC LIMIT 3")->result();
	}

	public function insert($data)
	{
		if($this->db->insert($this->_tbl_member, $data))
			return true;
		return false;
	}

	public function update($data, $fieldkey)
	{
		if($this->db->update($this->_tbl_member, $data, $fieldkey))
			return true;
		return false;
	}
}


