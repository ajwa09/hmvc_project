<?php

/**
 * @property attendance_model $attendance_model
 */
class attendance extends MX_Controller
{
	public function __construct()
	{
		$this->load->database();
		$this->load->model('attendance_model');
		parent::__construct();
	}

	public function general()
	{
		if ($this->session->userdata('user')) {

			$data['post'] = $this->attendance_model->get_attendance();
			$data['dept'] = $this->attendance_model->get_dept();
			$this->load->view('manage_attendance', $data);
			echo Modules::run('dashboard/header');
		} else {
			redirect('login/index');
		}
	}

	public function insert_attendance()
	{
//		$id = $this->input->post("attendance_id");
////					print_r();
////			die();
//		$date = $this->input->post("date");
//		if ($this->input->post("attendance_id")) {
////			print_r();
////			die();
//
//			$this->attendance_model->update_attendance();
//			redirect("attendance/general");

//		} else {
			$this->attendance_model->insert_attendance();
			redirect("attendance/general");

//		}
//		}
	}

	public function form_dept()
	{
		$data['dept'] = $this->attendance_model->get_dept();
		$this->load->view('manage_attendance', $data);
		echo Modules::run('dashboard/header');
	}

	public function list_attendance()
	{
		$data['emp'] = $this->attendance_model->get_employee($this->input->post("date"));
//		die(print_r($this->db->last_query()));
		$data['item'] = $this->attendance_model->view_category();
		$this->load->view('manage_attend_option', $data);
	}

//	function of joining for report
	public function join_attendance()
	{
		$data['emp'] = $this->attendance_model->get_employee($this->input->post("date"));
		$data['item'] = $this->attendance_model->view_category();
		$this->load->view('report_option', $data);
	}


	public function general_report()
	{
		$data['dept'] = $this->attendance_model->get_dept();

		$this->load->view('attendance_report', $data);
		echo Modules::run('dashboard/header');
	}

	public function join_attendance_tbl()
	{
		$date = $this->input->post("date");
		$month = date('Y-m', strtotime($date));
		$department_id = $this->input->post("option_value");

		$employees = $this->attendance_model->get_deparment($department_id);

		$employee_data = [];
		foreach ($employees as $employee) {
			$employee_attendance = $this->attendance_model->get_attendance_by_employee_and_date($employee['emp_id'], $month, $department_id);
//			$holidays = $this->attendance_model->get_holiday_tbl($date);
			$attendance = [];
			foreach ($employee_attendance as $att) {
				$attendance[date("j", strtotime($att['date']))] = $att;
			}
			$employee['attendance'] = $attendance;


//get holiday from holiday tbl

			$holidays = $this->attendance_model->get_holiday_tbl($date);
//			$hday = [];
			foreach ($holidays as $holiday) {
				$strt_date = date("j", strtotime($holiday['start_date']));
				$end_date = date("j", strtotime($holiday['end_date']));
				for ($i = $strt_date; $i <= $end_date; $i++) {

					$hday[$i] = $i;
				}
				$employee['holiday'] = $hday;
				$employee_data[] = $employee;
			}

//			$working_days = $this->attendance_model->get_workingday_tbl($date);
//			foreach ($working_days as $workday) {
////				if ($i ==== $date) {
//
////				}
//				$employee['holiday'] = $hday;
//				$employee_data[] = $employee;
//
//			}
		}
//		dd($holiday_data, 1);
//		dd($employee_data, 1);
		$data['employees'] = $employee_data;
//		$data['item'] = $this->attendance_model->view_category();
		$this->load->view('report_option', $data);
	}


}
