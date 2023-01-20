<?php

/**
 * @property payroll_model $payroll_model
 */
class payroll extends MX_Controller
{
	public function __construct()
	{
		$this->load->database();
		$this->load->model('payroll_model');
//		$this->load->model('employee_model');
		parent::__construct();



//		$this->output->enable_profiler = true;
	}

	public function general()
	{
		if ($this->session->userdata('user')) {
			$data['emp'] = $this->payroll_model->joining_all_tbl();
			$data['dept'] = $this->payroll_model->get_dept();
			$data['desig'] = $this->payroll_model->get_desig();
			echo Modules::run('dashboard/header');
			$this->load->view('manage_salary', $data);
		} else {
			redirect('login/index');
		}
	}

//insert function for payroll
	public function insert_payroll()
	{

		if ($this->input->post('id')) {
			$this->payroll_model->update_payroll();
		} else {
			$this->payroll_model->insert_payroll();
		}

		redirect("payroll/salary_list");
	}

	public function option_award()
	{
		$id = $_POST['option_value'];
		$data['emp'] = $this->payroll_model->get_by_designation_id($id);
		$data['default_employee'] = null;
//		print_r($data);
		echo $this->load->view('award_option', $data, true);
	}

	public function joining_tbl()
	{
		$data['emp'] = $this->payroll_model->joining_all_tbl();
		$this->load->view('award_option', $data);
	}

//	view payroll
	public function salary_list()
	{
		if ($this->session->userdata('user')) {
			$data['posts'] = $this->payroll_model->view_payroll();
			$data['emp'] = $this->payroll_model->joining_all_tbl();
			echo Modules::run('dashboard/header');
			$this->load->view('salary_list', $data);
		} else {
			redirect('login/index');
		}
	}

	public function fetch_salary_payroll($id)
	{

		$data['row'] = $this->payroll_model->view_salary_id($id);
		echo Modules::run('dashboard/header');
		$this->load->view('manage_salary', $data);
	}

//	view salary on list pg
	public function view_salary_deatails($id)
	{

		$data['post'] = $this->payroll_model->view_payroll_id($id);
		$data['emp'] = $this->payroll_model->view_employee_id();
		echo Modules::run('dashboard/header');
		$this->load->view('view_payroll', $data);
	}

	public function general_make_payment()
	{
		if ($this->session->userdata('user')) {
			$data['emp'] = $this->payroll_model->joining_all_tbl();
			$data['dept'] = $this->payroll_model->get_dept();
			$data['desig'] = $this->payroll_model->get_desig();
			$data['post'] = $this->payroll_model->view_payroll();
			echo Modules::run('dashboard/header');
			$this->load->view('make_payment', $data);
		} else {
			redirect('login/index');
		}
	}

	public function view_payment_details()
	{
//		$btn = $_POST['btn'];
		$id = $_POST['employee'];
//		if (!empty($id) || !empty($btn)) {
		$data['post'] = $this->payroll_model->view_payroll_employee($id);
		$data['posts'] = $this->payroll_model->view_payment($id);

		echo Modules::run('dashboard/header');
		$this->load->view('make_payment_list', $data);
//		}

	}

	public function payment_history()
	{
		if ($this->input->post('id')) {
			$this->payroll_model->payment_history_update();
		}
		else {
			$this->payroll_model->payment_history();
			redirect('payroll/payment_history');
		}
	}

	public function payslip()
	{
		if ($this->session->userdata('user')) {
			$data['emp'] = $this->payroll_model->joining_all_tbl();
			$data['dept'] = $this->payroll_model->get_dept();
			$data['desig'] = $this->payroll_model->get_desig();
			$data['post'] = $this->payroll_model->view_payroll();
			echo Modules::run('dashboard/header');
			$this->load->view('generate_payslip', $data);
		} else {
			redirect('login/index');
		}
	}

	public function payslip_table()
	{
		$id = $_POST['designation'];
		$data['posts'] = $this->payroll_model->view_dsig_payslip($id);
		echo Modules::run('dashboard/header');
		$this->load->view('payslip_table', $data);
	}

	function payslippdf($id)
	{

//		$id = $_POST['designation'];
//		$data['emp'] = $this->payroll_model->view_employee_id($id);
		$data['emp'] = $this->payroll_model->view_employee();
		$data['post'] = $this->payroll_model->view_payroll_id($id);
		echo Modules::run('dashboard/header');
		$this->load->view('payslippdf', $data);
	}
}
