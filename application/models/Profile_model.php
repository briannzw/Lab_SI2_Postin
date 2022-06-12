<?php

class Profile_model extends CI_Model
{
    private $_table = 'user', $post_table = "post";

	public function update_rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|max_length[64]'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'max_length[255]'
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|max_length[64]'
			],
			[
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|max_length[64]'
			],
			[
				'field' => 'confirm_password',
				'label' => 'Confirm Password',
				'rules' => 'matches[password]|max_length[255]'
			],
		];
	}

	public function update_rules_no_pass()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|max_length[64]'
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|max_length[64]'
			],
			[
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|max_length[64]'
			],
		];
	}
	
	public function update_profile($user_data){
		if(!isset($user_data['id'])) return;
		
		$this->db->where_not_in('id', $user_data['id']); 

		$query = $this->db->get_where($this->_table, ['username' => $user_data['username']]);
		$count_row = $query->num_rows();

		if($count_row > 0) return "Username telah ada";
		
		$this->db->where_not_in('id', $user_data['id']); 

		$query = $this->db->get_where($this->_table, ['email' => $user_data['email']]);
		$count_row = $query->num_rows();
		
		if($count_row > 0) return "Email telah ada";

		$this->db->update($this->_table, $user_data, ['id' => $user_data['id']]);
		
		//Tidak ada error
		return null;
	}

	public function delete_profile($user_id){
		if(!isset($user_id)) return;

		$query = $this->db->get_where($this->_table, ['id' => $user_id]);
		$result = $query->row();

		$query = $this->db->delete($this->post_table, ['user' => $result->username]);

		return $this->db->delete($this->_table, ['id' => $user_id]);
	}
}

?>