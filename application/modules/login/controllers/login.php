<?php
//=======================login sessions==================


defined('BASEPATH') or exit('No direct script access allowed');

class login extends MX_Controller
{

	function __construct()
	{
		parent::__construct();
//		$this->load->helper('url');
		$this->load->model('login_model');
	}

	public function index()
	{
		//load session library
		$this->load->library('session');

		//restrict users to go back to login if session has been set
		if ($this->session->userdata('user')) {
			redirect('home');
		} else {
			$this->load->view('login_pg');
		}
	}

	public function login()
	{
		//load session library
		$this->load->library('session');

		$email = $_POST['email'];
		$password = $_POST['password'];

		$data = $this->users_model->login($email, $password);

		if ($data) {
			$this->session->set_userdata('user', $data);
			redirect('home');
		} else {
			header('location:' . base_url() . $this->index());
			$this->session->set_flashdata('error', 'Invalid login. User not found');
		}
	}

//	public function home()
//	{
//		//load session library
//		$this->load->library('session');
//
//		//restrict users to go to home if not logged in
//		if ($this->session->userdata('user')) {
//			$this->load->view('home');
//		} else {
//			redirect('/');
//		}
//
//	}

	public function logout()
	{
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}
}
