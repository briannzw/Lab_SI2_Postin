<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
        $this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

	public function index(){
		show_404();
	}

	public function add(){
        $this->load->model('auth_model');
		$this->load->model('post_model');
		
        //Belum Login
        if(!$this->auth_model->current_user()){
			redirect('auth/login');
        }

		$this->load->library('form_validation');

        if($this->input->method() == 'post'){
            $rules = $this->post_model->post_rules();
            $this->form_validation->set_rules($rules);

            if($this->form_validation->run() == FALSE){
                return $this->load->view('add_post');
            }

			$post = [
				'id' => uniqid('', true),
				'user' => $this->auth_model->current_user()->username,
				'caption' => $this->input->post('caption'),
			];
	
			$post_result = $this->post_model->insert($post);
			if($post_result){
                $this->session->set_flashdata('message_post_error', 'Add Post Sukses!');
				redirect('post/add');
			}
			else{
                $this->session->set_flashdata('message_post_error', 'Add Post Gagal, '.$post_result);
			}
        }

		$this->load->view('add_post');
	}

    public function edit($id){
        echo 'Halaman Edit Post'.'<br>';
		echo 'id : '.$id.'<br>';
    }

    public function delete($id){
        echo 'Halaman Delete Post'.'<br>';
		echo 'id : '.$id.'<br>';
    }
}
