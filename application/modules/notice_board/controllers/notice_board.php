<?php

/**
 * @property attendance_model $attendance_model
 * @property expense_model $expense_model
 * @property notice_model $notice_model
 */
class notice_board extends MX_Controller
{
	public function __construct()
	{
		$this->load->database();
		$this->load->model('notice_model');
		parent::__construct();
	}

	public function general()
	{
		if ($this->session->userdata('user')) {
			$this->load->view('add_notice');
			echo Modules::run('dashboard/header');
		} else {
			redirect('login/index');
		}

	}

	public
	function insert_notice()
	{
		$id = $this->input->post('id');

		if ($id) {
			$this->notice_model->update_notice($id);
		} else {
			$this->notice_model->insert_notice();
		}
		redirect('notice_board/get_notice');
	}

	public
	function get_notice()
	{
		if ($this->session->userdata('user')) {
			$data['posts'] = $this->notice_model->view_notice();
			echo Modules::run('dashboard/header');
			$this->load->view('manage_notice', $data);
		} else {
			redirect('login/index');
		}
	}

//	view function for view pg
	public
	function view_notice($id)
	{

		$data['post'] = $this->notice_model->view_notice_id($id);
		echo Modules::run('dashboard/header');
		$this->load->view('view_notice', $data);
	}

	public
	function fetch_notice($id)
	{

		$data['post'] = $this->notice_model->view_notice_id($id);
		echo Modules::run('dashboard/header');
		$this->load->view('add_notice', $data);
	}

//	delete
	public
	function delete_notice($id)
	{
		$this->notice_model->delete_notice($id);
		redirect('notice_board/get_notice');
	}
}
