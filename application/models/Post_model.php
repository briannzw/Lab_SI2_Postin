<?php

class Post_model extends CI_Model
{
    private $_table = 'post';

	public function post_rules()
	{
		return [
			[
				'field' => 'caption',
				'label' => 'Caption',
				'rules' => 'required|max_length[256]'
			],
		];
	}

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

	public function insert($post)
	{
		if(!$post){
			return;
		}

		return $this->db->insert($this->_table, $post);
	}
}

?>