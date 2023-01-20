<?php

/**
 * @property attendance_model $attendance_model
 * @property expense_model $expense_model
 */
class expense extends MX_Controller
{
	public function __construct()
	{
		$this->load->database();
		$this->load->model('expense_model');
		parent::__construct();
	}

	public function general()
	{
		if ($this->session->userdata('user')) {
			$data['emp'] = $this->expense_model->employee();
//		$data['dept'] = $this->attendance_model->get_dept();
			$this->load->view('add_expense', $data);
			echo Modules::run('dashboard/header');
		} else {
			redirect('login/index');
		}
	}

//	insert expense
	public function insert_expense()
	{
		$this->expense_model->insert();
		redirect('expense/expense_report');
	}

//	view_expense and month
	public function expense_report($flag = null)
	{
		if ($this->session->userdata('user')) {
			if (!empty($flag)) {
				$data['active_add_holiday'] = $flag;
			}

			$data['current_month'] = date('m');
			if ($this->input->post('year')) {
				$data['year'] = $this->input->post('year');
			} else {
				$data['year'] = date('Y');
			}
			$data['all_holiday_list'] = $this->get_holiday_list($data['year']);
			$data['posts'] = $this->expense_model->view_expense();
			echo Modules::run('dashboard/header');
			$this->load->view('expense_report', $data);
		} else {
			redirect('login/index');
		}
	}

	public function get_holiday_list($year)
	{
		for ($i = 1; $i <= 12; $i++) {
			if ($i >= 1 && $i <= 9) {
				$start_date = $year . "-" . '0' . $i . '-' . '01';
				$end_date = $year . "-" . '0' . $i . '-' . '31';
			} else {
				$start_date = $year . "-" . $i . '-' . '01';
				$end_date = $year . "-" . $i . '-' . '31';
			}
			$get_holiday_list[$i] = $this->expense_model->get_holiday_list_by_date($start_date, $end_date);
		}
		return $get_holiday_list;
	}

//	pdf for expense
	public function expense_pdf($id)
	{

		$data['posts'] = $this->expense_model->view_expense_id($id);
		$this->load->view('GeneratePdfView', $data);
		$this->load->library('pdf');
		$html = $this->load->view('GeneratePdfView', [], true);
		$this->pdf->createPDF($html, 'mypdf', false);
//		$this->load->view('expense_report', $data);

	}

	public function delete_expense($id)
	{
		$this->expense_model->delete_expense($id);
		redirect('expense/expense_report');
	}

	public function total($amount_sent)
	{
		$data['post'] = $this->expense_model->sum($amount_sent);
	}
}
