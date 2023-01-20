<?php

class mailbox extends MX_Controller
{
	public function __construct()
	{
		$this->load->database();
		$this->load->model('mail_model');
		$this->load->library('session');
		$this->load->helper('form');
	}
	public function index() {
		$this->load->helper('form');
		$data['post'] = $this->mail_model->get_employee_tbl();
		echo Modules::run('dashboard/header');
		$this->load->view('inbox', $data);

	}
	public function send_mail() {
		$from_email = "email@example.com";
		$to_email = $this->input->post('email');
		//Load email library
//		$this->load->library('email');
		$this->email->from($from_email, 'Identification');
		$this->email->to($to_email);
		$this->email->subject('Send Email Codeigniter');
		$this->email->message('The email send using codeigniter library');
		//Send mail
		if($this->email->send())
			$this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
		else
			$this->session->set_flashdata("email_sent","You have encountered an error");
		$this->load->view('inbox');
	}





	public function general(){
		$data['post'] = $this->mail_model->get_employee_tbl();
		echo Modules::run('dashboard/header');
		$this->load->view('inbox', $data);
	}
}
