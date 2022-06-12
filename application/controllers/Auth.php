<?php

class Auth extends CI_Controller
{
	public function index()
	{
		show_404();
	}

	public function login()
	{
		$this->load->model('auth_model');
		$this->load->library('form_validation');

        //Sudah Login
        if($this->auth_model->current_user()){
            redirect('homepage');
        }

        if($this->input->method() == 'post'){
            $rules = $this->auth_model->login_rules();
            $this->form_validation->set_rules($rules);

            if($this->form_validation->run() == FALSE){
                
                return $this->load->view('login');
            }

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if($this->auth_model->login($username, $password)){
                return redirect('homepage');
            } else {
                $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan password benar!');
            }
        }

		$this->load->view('login');
	}

	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(site_url());
	}

    public function register(){
        $this->load->model('auth_model');
		$this->load->library('form_validation');

        //Sudah Login
        if($this->auth_model->current_user()){
            redirect('homepage');
        }

        if($this->input->method() == 'post'){
            $rules = $this->auth_model->regis_rules();
            $this->form_validation->set_rules($rules);
    
            if($this->form_validation->run() == FALSE){
                return $this->load->view('register');
            }

            $user_data = [
                'id' => uniqid('', true),
                'username' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
            
            $user_data_result = $this->auth_model->register($user_data);
            if(!$user_data_result){
                return redirect('login');
            } else {
                $this->session->set_flashdata('message_register_error', 'Register Gagal, '.$user_data_result);
            }
        }

		$this->load->view('register');
    }
}