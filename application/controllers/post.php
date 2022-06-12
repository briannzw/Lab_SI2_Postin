<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
	}

	public function add($id){
        echo 'Halaman Tambah Post'.'<br>';
		echo 'id : '.$id.'<br>';

		if($this->input->method() === 'post'){
			$this->load->model('post_model');
		}

		// @TODO: validasi sebelum ke model

		$post = [
			'id' => uniqid('', true),
			'user' => $this->input->post('user'),
			'caption' => $this->input->post('caption'),
		];

		$post_result = $this->post_model->insert($post);
		if($post_result){
			// return $this->load->view('');
		}
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
