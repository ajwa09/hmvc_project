<?php

class employee extends MX_Controller
{
	public function __construct()
	{
		$this->load->database();
		$this->load->model('department/department_model');
		$this->load->model('employee_model');
		parent::__construct();
	}

	public function general()
	{
		$data['dept'] = $this->employee_model->get_dept();
		$data['desig'] = $this->employee_model->get_designation();
		$data['country'] = $this->employee_model->country();
		$this->load->view('employee', $data);
		echo Modules::run('dashboard/header');
	}

//insert emp
	public function insert_emp()
	{
		if ($this->session->userdata('user')) {
			$id = $this->input->post('id');
//		echo $id;
//		exit();
			if ($id) {
				$this->employee_model->update_employee_view();
//			var_dump($this->db->last_query());

			} else {
				$this->employee_model->insert();
			}

			redirect('employee/list_emp');
		} else {
			redirect('login/index');
		}
//		redirect('employee/list_emp');
	}

//	fetcing data for designation from department

	public function fetch_depts()
	{
		echo Modules::run('dashboard/header');
		$this->load->view('employee');
	}

//	end insert
	public function list_emp()
	{
		if ($this->session->userdata('user')) {
			$data['posts'] = $this->employee_model->view_employee();
			echo Modules::run('dashboard/header');
			$this->load->view('list_employee', $data);
		} else {
			redirect('login/index');
		}
	}

//	delete employee
	public function delete_emp($id)
	{
		$this->employee_model->delete_employee($id);
		redirect('employee/list_emp');
	}

//	fetch function
	public function get_employee($id)
	{
		$data['post'] = $this->employee_model->fetch_employee($id);
		$data['dept'] = $this->employee_model->get_dept();
		$data['desig'] = $this->employee_model->get_designation();
		$data['country'] = $this->employee_model->country();
		echo Modules::run('dashboard/header');
		$this->load->view('employee', $data);
	}

//view function for view pg

	public
	function view_employee($id)
	{
		$data['post'] = $this->employee_model->fetch_employee($id);
		$data['dept'] = $this->employee_model->get_dept();

		echo Modules::run('dashboard/header');
		$this->load->view('view_employee', $data);
	}

//	view function for award pg
	public
	function view()
	{
		if ($this->session->userdata('user')) {
			$data['posts'] = $this->employee_model->view_award();
			$data['dept'] = $this->employee_model->get_dept();
			$data['desig'] = $this->employee_model->get_designation();
			echo Modules::run('dashboard/header');
			$this->load->view('employee_award', $data);
		} else {
			redirect('login/index');
		}
	}

	public
	function award()
	{
		if ($this->session->userdata('user')) {
			$this->employee_model->insert_award();
			$data['posts'] = $this->employee_model->view_award();
			$data['emp'] = $this->employee_model->employee_table();
			$data['dept'] = $this->employee_model->get_dept();
			$data['desig'] = $this->employee_model->get_designation();

			echo Modules::run('dashboard/header');
			$this->load->view('employee_award', $data);
		} else {
			redirect('login/index');
		}
	}

//	award_option pg
	public
	function option_award()
	{
		$id = $_POST['option_value'];
		$data['emp'] = $this->employee_model->table_employee($id);
		$this->load->view('award_option', $data);
	}

//	delete award employee
	public
	function delete_award_employee($id)
	{
		$this->employee_model->delete_award($id);
		redirect('employee/view');
	}

//	fetch award employee
	public
	function fetch_award($id)
	{

		$data['post'] = $this->employee_model->fetch_award_employee($id);
		$this->load->view('edit_award_employee', $data);
		echo Modules::run('dashboard/header');
	}

//public function update_award
	public
	function update_award()
	{
		$id = $this->input->post('id');
		$this->employee_model->update_award($id);
		$data['dept'] = $this->employee_model->get_dept();
		$data['desig'] = $this->employee_model->get_designation();
		$this->load->view('edit_award_employee', $data);
		redirect('employee/view');
	}

//	pdf function
	function pdf($id)
	{
		$data['post'] = $this->employee_model->fetch_employee($id);
		$this->load->view('GeneratePdfView', $data);
		$this->load->library('pdf');
		$html = $this->load->view('GeneratePdfView', [], true);
		$this->pdf->createPDF($html, 'mypdf', false);
	}
}

