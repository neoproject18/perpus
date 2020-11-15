<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_role extends CI_Model
{
	private $_tbl_role = 'tbl_role';

	public function listrole()
	{
		return $this->db->get($this->_tbl_role)->result();
	}
}


