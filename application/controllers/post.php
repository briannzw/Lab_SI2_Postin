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
