<?php

class Auth_model extends CI_Model
{
	private $_table = "user";
	const SESSION_KEY = 'user_id';

	public function login_rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username or Email',
				'rules' => 'required|max_length[64]'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			],
		];
	}

	public function regis_rules()
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
				'rules' => 'required|max_length[255]'
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
				'rules' => 'required|matches[password]|max_length[255]'
			],
		];
	}

	public function login($username, $password)
	{
		$this->db->where('email', $username)->or_where('username', $username);
		$query = $this->db->get($this->_table);
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}

		// cek apakah passwordnya benar?
		if (!password_verify($password, $user->password)) {
			return FALSE;
		}

		// bikin session
		$this->session->set_userdata([self::SESSION_KEY => $user->id]);
		$this->_update_last_login($user->id);

		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['id' => $user_id]);
		return $query->row();
	}

	public function get_user($username){
		$query = $this->db->get_where($this->_table, ['username' => $username]);
		return $query->row();
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

	private function _update_last_login($id)
	{
		$data = [
			'last_login' => date("Y-m-d H:i:s"),
		];

		return $this->db->update($this->_table, $data, ['id' => $id]);
	}

	public function register($user_data){
		if(!$user_data) return;
		
		$query = $this->db->get_where($this->_table, ['username' => $user_data['username']]);
		$count_row = $query->num_rows();

		if($count_row > 0) return "Username telah ada";

		$query = $this->db->get_where($this->_table, ['email' => $user_data['email']]);
		$count_row = $query->num_rows();
		
		if($count_row > 0) return "Email telah ada";

		$this->db->insert($this->_table, $user_data);

		//Tidak ada error
		return null;
	}
}