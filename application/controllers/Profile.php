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
		
        if(!$data['user_data']){
			redirect('auth/login');
		}
		
		$this->load->library('form_validation');

		if($this->input->method() == 'post'){
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
				];
			}
			else{
				$user_data = [
					'id' => $this->auth_model->current_user()->id,
					'username' => $this->input->post('username'),
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
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
            redirect('login');
        } else {
            $this->session->set_flashdata('message_update_profile_error', 'Hapus Akun Gagal.');
			$this->load->view('profile', $data);
        }
    }
}
