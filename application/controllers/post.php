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

		$data['img'] = "";
		$data['avatar'] = $this->auth_model->current_user()->avatar;

        if($this->input->method() == 'post')
		{	
			if($this->input->post("form-name") == "post"){
				$rules = $this->post_model->post_rules();
				$this->form_validation->set_rules($rules);

				if($this->form_validation->run() == FALSE){
					return $this->load->view('add_post');
				}

				$post = [
					'id' => uniqid('', true),
					'user' => $this->auth_model->current_user()->username,
					'caption' => $this->input->post('caption'),
					'image' => $this->input->post('image-data'),
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
			else if($this->input->post("form-name") == "img"){
				if(!'image-data'){
					$this->load->view('add_post', $data);
				}

				$image_data = $this->upload_image('image-data');
				if($image_data){
					$data['img'] = $image_data['file_name'];

					if($this->input->post("img-data") != ""){
						$this->delete_image($this->input->post("img-data"));
					}
				}
			}
        }

		$this->load->view('add_post', $data);
	}

    public function edit($id){
        $this->load->model('auth_model');
		$this->load->model('post_model');
		
        //Belum Login
        if(!$this->auth_model->current_user()){
			redirect('auth/login');
        }

		$this->load->library('form_validation');

		$data = $this->post_model->get_post($id);
		$data->avatar = $this->auth_model->current_user()->avatar;

        if($this->input->method() == 'post')
		{	
			if($this->input->post("form-name") == "post"){
				$rules = $this->post_model->post_rules();
				$this->form_validation->set_rules($rules);

				if($this->form_validation->run() == FALSE){
					return $this->load->view('edit_post', $data);
				}

				$post = [
					'id' => $id,
					'user' => $data->user,
					'caption' => $this->input->post('caption'),
					'image' => $this->input->post('image-data'),
				];
		
				$post_result = $this->post_model->update($post);
				if($post_result){
					$this->session->set_flashdata('message_post_error', 'Edit Post Sukses!');
					redirect('post/edit/'.$id.'');
				}
				else{
					$this->session->set_flashdata('message_post_error', 'Edit Post Gagal, '.$post_result);
				}
			}
			else if($this->input->post("form-name") == "img"){
				if(!'image-data'){
					$this->load->view('edit_post', $data);
				}
				$image_data = $this->upload_image('image-data');
				if($image_data){
					$data->image = $image_data['file_name'];

					if($this->input->post("img-data") != ""){
						$this->delete_image($this->input->post("img-data"));
					}
	
				}
			}
        }

		$this->load->view('edit_post', $data);
    }

    public function delete($id){
		$this->load->model('post_model');
		$this->load->model('auth_model');
		$data['user_data'] = $this->auth_model->current_user();

		if(!$data['user_data']){
			redirect('auth/login');
		}

		if($this->post_model->get_post($id)->image != ""){
			$this->delete_image($this->post_model->get_post($id)->image);
		}

		$this->post_model->delete($id);
    	redirect('homepage');
    }

	public function upload_image($img){
		// the user id contain dot, so we must remove it
		$file_name = str_replace('.','',"img_".uniqid("", true));
		$config['upload_path']          = FCPATH.'/upload/post/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $file_name;
		$config['overwrite']            = true;
		$config['max_size']             = 1024 * 4; // 4 MB
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
	
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload($img)) {
			$data['error'] = $this->upload->display_errors();
			$this->session->set_flashdata('message_post_error', 'Upload Gagal, '.$data['error']);
			return null;
		} else {
			$uploaded_data = $this->upload->data();
			
			$this->session->set_flashdata('message_post_error', 'Upload Berhasil! (Mohon Tekan Add/Edit Post untuk ubah gambar)');
			return $uploaded_data;
		}

		return null;
	}

	public function delete_image($img){
		unlink(FCPATH."upload/post/".$img);
	}
}