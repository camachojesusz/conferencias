<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions_model extends CI_Model
{
	protected $table;

	public function __construct()
	{
		parent::__construct();
		$this->table = 'sessions';
	}

	function update()
	{
		$this->db->update($this->table, ['user_id' => $this->session->iduser], ['id' => session_id()]);
		return $this->db->affected_rows() > 0;
	}

	function delete($user_id, $active = FALSE)
	{
		if($active)
		{
			$this->db->where('id <>', session_id());
		}
		$this->db->where('user_id', $user_id);
		return $this->db->delete($this->table);
	}

	public function trash_all_users()
	{
		$this->db->where('id <>', session_id());
		return $this->db->delete($this->table);
	}
}
/* End of file Sessions_model.php */
/* Location: ./application/models/users/Sessions_model.php */
