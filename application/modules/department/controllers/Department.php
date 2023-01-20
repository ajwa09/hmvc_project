<?php

class Department extends MY_Controller
{
	public function __construct()
	{

		parent::__construct();

		$this->load->database();
		$this->load->model('department_model');
	}

	public function general()
	{
		if ($this->session->userdata('user')) {
			echo Modules::run('dashboard/header');
			$this->load->view('department');
		} else {
			redirect('login/index');
		}
	}

// insert department
	public function insert()
	{
//		$this->load->view('department');
//		if($this->input->post()) {
//					$this->load->view('department');
		$id = $this->input->post('id');
		if ($id) {
			$this->department_model->update($this->input->post("department"), $this->input->post("designation"));

		} else {
			$this->department_model->insert_department($this->input->post("department"), $this->input->post("designation"));
		}
//			$this->department_model->update($this->input->post("department"), $this->input->post("designation"));
//		redirect("department/view_department");


		echo Modules::run('dashboard/header');


	}

//	get department
	public function view_department()
	{
		if($this->session->userdata('user')){
		$data['dept'] = $this->department_model->get_department();
		$data['desig'] = $this->department_model->get_deptID();
		echo Modules::run('dashboard/header');
		$this->load->view('department_list', $data);
	}
	else{
		redirect('login/index');
	}
	}

//	delete data from department
	public function delete_data($id)
	{
		$this->department_model->delete_designation($id);
		$this->department_model->delete_department($id);
		redirect("department/view_department");
	}

	public function delete_designation($id)
	{
		$this->department_model->del_designation_id($id);
//		redirect("department/edit_depts");
	}

//fetch data
	public function edit_depts($id = null)
	{

		$data['dept'] = $this->department_model->get_dept($id);
		$data['desig'] = $this->department_model->get_designation($id);

		echo Modules::run('dashboard/header');
		$this->load->view('department', $data);
	}
}
