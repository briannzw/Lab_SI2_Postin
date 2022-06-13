<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
        $this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

	public function index(){
		redirect("profile");
	}
	
	public function view()
	{
		$this->load->model('auth_model');
		$this->load->model('profile_model');
        $data['user_data'] = $this->auth_model->current_user();
		
		$data['avatar'] = $data['user_data']->avatar;
		
        if(!$data['user_data']){
			redirect('auth/login');
		}
		
		$this->load->library('form_validation');

        if($this->input->method() == 'post')
		{	
			if($this->input->post("form-name") == "post"){
				if($this->input->post('password') == "")
				{
					$rules = $this->profile_model->update_rules_no_pass();
				}
				else
				{
					$rules = $this->profile_model->update_rules();
				}

				$this->form_validation->set_rules($rules);

				if($this->form_validation->run() == FALSE){
					return $this->load->view('profile', $data);
				}

				if($this->input->post('password') == ""){
					$user_data = [
						'id' => $this->auth_model->current_user()->id,
						'username' => $this->input->post('username'),
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'avatar' => $this->input->post('image-data'),
					];
				}
				else{
					$user_data = [
						'id' => $this->auth_model->current_user()->id,
						'username' => $this->input->post('username'),
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						'avatar' => $this->input->post('image-data'),
					];
				}

				$user_data_result = $this->profile_model->update_profile($user_data) ;
				
				if(!$user_data_result){
					$this->session->set_flashdata('message_update_profile_error', 'Update Profile Sukses!');
					redirect('profile');
				} else {
					$this->session->set_flashdata('message_update_profile_error', 'Update Profile Gagal, '.$user_data_result);
				}
			}
			else if($this->input->post("form-name") == "avatar"){
				if(!'image-data'){
					$this->load->view('profile', $data);
				}

				$image_data = $this->upload_avatar('image-data');
				if($image_data){
					$data['avatar'] = $image_data['file_name'];

					if($this->input->post("img-data") != ""){
						$this->delete_avatar();
					}
				}
			}
		}

		$this->load->view('profile', $data);
	}

	
    public function delete()
	{
		$this->load->model('profile_model');
		$this->load->model('auth_model');
		$data['user_data'] = $this->auth_model->current_user();

		if(!$data['user_data']){
			redirect('auth/login');
		}

        $delete_data_result = $this->profile_model->delete_profile($data['user_data']->id);
        if($delete_data_result){
            $this->session->set_flashdata('message_login_error', 'Hapus Akun Berhasil.');

			if($this->auth_model->current_user()->avatar != ""){
				$this->delete_avatar();
			}

            redirect('login');
        } else {
            $this->session->set_flashdata('message_update_profile_error', 'Hapus Akun Gagal.');
			$this->load->view('profile', $data);
        }
    }

	public function upload_avatar($img){
		$this->load->model('auth_model');
		$data['user_data'] = $this->auth_model->current_user();
		// the user id contain dot, so we must remove it
		$file_name = str_replace('.','',$data['user_data']->id);
		$config['upload_path']          = FCPATH.'/upload/avatar/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $file_name;
		$config['overwrite']            = true;
		$config['max_size']             = 1024 * 3; // 3 MB
		$config['max_width']            = 1080;
		$config['max_height']           = 1080;
	
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload($img)) {
			$data['error'] = $this->upload->display_errors();
			$this->session->set_flashdata('message_update_profile_error', 'Upload Gagal, '.$data['error']);
			return null;
		} else {
			$uploaded_data = $this->upload->data();
			
			$this->session->set_flashdata('message_update_profile_error', 'Upload Berhasil! (Mohon Tekan Update Profil untuk ubah gambar)');
			return $uploaded_data;
		}

		return null;
	}

	public function delete_avatar()
	{	
		$current_user = $this->auth_model->current_user();

		$file_name = str_replace('.', '', $current_user->id);
		array_map('unlink', glob(FCPATH."upload/avatar/$file_name.*"));
	}
}
