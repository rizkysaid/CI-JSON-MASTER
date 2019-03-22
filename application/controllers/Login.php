<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index(){
		$this->load->view('login');
	}

	public function log_in(){
		redirect('person');
	}

	public function log_out(){
		redirect('auth');
	}
}
