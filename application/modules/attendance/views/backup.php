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
//					print_r();
//			die();
//		$date = $this->input->post("date");
//		if ($this->input->post("attendance_id")) {
//			print_r();
//			die();
//			if ($this->input->post("attendance_id")) {
//				print_r('id');
//			die();
//				$this->attendance_model->update_attendance();
//				redirect("attendance/general");

//			} else {
		$this->attendance_model->insert_attendance();
		redirect("attendance/general");

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
				$attendance[date("d", strtotime($att['date']))] = $att;
			}
			$employee['attendance'] = $attendance;


//get holiday from holiday tbl

			$holidays = $this->attendance_model->get_holiday_tbl($date);
			foreach ($holidays as $holiday) {
				$strt_date = date("d", strtotime($holiday['start_date']));
				$end_date = date("d", strtotime($holiday['end_date']));
				for ($i = $strt_date; $i <= $end_date; $i++) {
					$hday[$i] = $i;
				}
				$employee['holiday'] = $hday;
				$employee_data[] = $employee;

			}
		}
//		dd($holiday_data, 1);
//		dd($employee_data, 1);
		$data['employees'] = $employee_data;
//		$data['item'] = $this->attendance_model->view_category();
		$this->load->view('report_option', $data);
	}


}

//========model=======


class attendance_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


//insert attendance
	public function insert_attendance()
	{
//		$date = $_POST['date'];

		if ($this->input->post()) {
			$attendance = $this->input->post('attendance');
			foreach ($attendance as $key => $value) {
//				$present = $_POST['attendance[' . $key . '][present]'];
				$present = $value['present'] ?? 0;
				$data = array(
					'date' => $value['date'],
					'employee_id' => $value['employee_id'],
					'designation' => $value['designation'],

				);
				if ($present == 0) {
					$data['category'] = $this->input->post('attendance[' . $key . '][category]');
				} else {
					$data['present'] = $present;
				}
//				echo "<pre>";
//				die(print_r($this->input->post()));
				return $this->db->insert('attendance', $data);
			}
		}
	}

//	update function for attendance

	public function update_attendance($id)
	{

//		$id = $_POST['attendance_id'];
//		print_r($id);
//		die();
		if ($this->input->post()) {
			$attendance = $this->input->post('attendance');
			foreach ($attendance as $key => $value) {
				$present = $value['present'] ?? 0;
				if ($present == 0) {
					$data['category'] = $this->input->post('attendance[' . $key . '][category]');
				} else {
					$data['present'] = $present;
				}

				$this->db->where('attendance_id', $id);
				return $this->db->update('attendance', $data);
			}
		}
	}

//	view ATTENDANCE
	public function get_attendance()
	{
		$query = $this->db->get('attendance');
		return $query->result_array();
	}

//these functions fetching the table for options
	public
	function get_designation()
	{
		$query = $this->db->get('designation');
		return $query->result_array();
	}

	public
	function get_dept()
	{

		$query = $this->db->get('department');
		return $query->result_array();
	}

	public
	function employee()
	{
		$query = $this->db->get('employee');
		return $query->result_array();
	}

	public
	function attendance()
	{
		$query = $this->db->get('attendance');
		return $query->result_array();
	}

	public
	function view_attendance($id)
	{
		$this->db->join('attendance', 'attendance.department = designation.department_id');
		$this->db->join('employee', 'designation.id = employee.designation_emp');
		$this->db->join('department', 'designation.department_id = department.id');
		$this->db->select('designation.* , department.*, employee.*, attendance.*');
		$this->db->from('designation');
		$this->db->where('employee.designation_emp', $id);
		$query = $this->db->get('');
		return $query->result_array();
	}

//	=======================
//all tables joining for attendance
	public function get_deparment($department_id)
	{
		$this->db->join('designation', 'designation.id = employee.designation_emp');
		$this->db->join('department', 'designation.department_id = department.id');
		$this->db->select('designation.id,designation.department_id,designation.designation, department.department, employee.name,employee.designation_emp,employee.id as emp_id');
		$this->db->group_by('employee.id');
		$this->db->where("department.id", $department_id);
		$query = $this->db->get('employee');
//		die($this->db->last_query());
		return $query->result_array();
	}

	public function get_employee($date)
	{
		$this->db->join('attendance', 'attendance.employee_id = employee.id and attendance.date = "' . $date . '"', 'left');
		$this->db->join('designation', 'designation.id = employee.designation_emp');
		$this->db->join('department', 'designation.department_id = department.id');
		$this->db->select('designation.id,designation.department_id,designation.designation, department.department, employee.name,employee.designation_emp,employee.id as emp_id, attendance.attendance_id,attendance.date,attendance.present,attendance.employee_id');
		$this->db->group_by('employee.id');
		$query = $this->db->get('employee');
//		die($this->db->last_query());
		return $query->result_array();
	}

//	view category
	public
	function view_category()
	{
		$query = $this->db->get('leave_category');
		return $query->result_array();
	}

	public function get_attendance_by_employee_and_date($employee_id, $date, $dept_id = null)
	{
		$date = date('Y-m', strtotime($date));
		$this->db->select("attendance.*");

//			$this->db->join("employee", "employee.id = attendance.employee_id",'inner');
		$this->db->where("attendance.employee_id", $employee_id);
		$this->db->like("attendance.date", $date, 'after');
		$this->db->order_by('attendance.date');
		$query = $this->db->get('attendance');
//			die($this->db->last_query());
		return $query->result_array();
	}

	public function get_holiday_tbl($date)
	{
		$date = date('Y-m', strtotime($date));
		$this->db->select("add_holiday.*");
		$this->db->like("add_holiday.start_date", $date, 'after');
//		$this->db->order_by('add_holiday.start_date');
		$query = $this->db->get('add_holiday');
//			die($this->db->last_query());
		return $query->result_array();
	}


//		session
	public function login($email, $password)
	{
		$query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
		return $query->row_array();
	}
}

