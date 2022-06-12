<?php

class Post_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}
    private $_table = 'post';

    public function get_posts($limit = null, $offset = null){
        if (!$limit && $offset) {
			$query = $this->db->get_where($this->_table);
		} else {
			$query =  $this->db->get_where($this->_table, $limit, $offset);
		}
		return $query->result();
	}

	public function find_by_user($user)
	{
		if (!$user) {
			return;
		}
		$query = $this->db->get_where($this->_table, ['user' => $user]);
		return $query->result();
	}

	public function insert($user)
	{
		if(!$user){
			return;
		}

		return $this->db->insert($this->_table, $user);
	}
}

?>