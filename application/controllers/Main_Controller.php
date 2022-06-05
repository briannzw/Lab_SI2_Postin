<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function homepage(){
		$this->load->view('homepage');
	}
	
	public function registrasi(){
		$this->load->view('registrasi');
	}
}
