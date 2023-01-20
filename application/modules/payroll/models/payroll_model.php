<?php

class payroll_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insert_payroll()
	{
//        $gross_salary = $_POST['gross_salary'];
//        $total_deduction = $_POST['total_deduction'];
//        $net_salary = $_POST['net_salary'];

		if ($this->input->post()) {
			$data = array(
				'designation' => $this->input->post('designation'),
				'employee' => $this->input->post('employee'),
				'employee_type' => $this->input->post('employee_type'),
				'basic_salary' => $this->input->post('basic_salary'),
				'house_rent' => $this->input->post('house_rent'),
				'medical' => $this->input->post('medical'),
				'special' => $this->input->post('special'),
				'fuel' => $this->input->post('fuel'),
				'phone_bill' => $this->input->post('phone_bill'),
				'other_allowance' => $this->input->post('other_allowance'),
				'provident_fund' => $this->input->post('provident_fund'),
				'tax_deduction' => $this->input->post('tax_deduction'),
				'other_deduction' => $this->input->post('other_deduction'),
//                'gross_salary' => $gross_salary,
//                'total_deduction' => $total_deduction,
//                'net_salary' => $net_salary,
			);
			return $this->db->insert('payroll', $data);
		}

	}

//	update function for basic salary
	public function update_payroll()
	{
		$id = $_POST['id'];
		if ($this->input->post()) {
			$data = array(
				'designation' => $this->input->post('designation'),
				'employee' => $this->input->post('employee'),
				'employee_type' => $this->input->post('employee_type'),
				'basic_salary' => $this->input->post('basic_salary'),
				'house_rent' => $this->input->post('house_rent'),
				'medical' => $this->input->post('medical'),
				'special' => $this->input->post('special'),
				'fuel' => $this->input->post('fuel'),
				'phone_bill' => $this->input->post('phone_bill'),
				'other_allowance' => $this->input->post('other_allowance'),
				'provident_fund' => $this->input->post('provident_fund'),
				'tax_deduction' => $this->input->post('tax_deduction'),
				'other_deduction' => $this->input->post('other_deduction'),
//                'gross_salary' => $gross_salary,
//                'total_deduction' => $total_deduction,
//                'net_salary' => $net_salary,
			);
			$this->db->where('id', $id);
			return $this->db->update('payroll', $data);
		}

	}

//	designation by id
	public function get_by_designation_id($designation_id)
	{

		$this->db->where('designation_emp', $designation_id);
		$query = $this->db->get('employee');
		return $query->result_array();
	}

	//these functions fetching the table for options
	public function joining_all_tbl()
	{
		$this->db->join('designation', 'designation.id = employee.designation_emp');
		$this->db->join('department', 'designation.department_id = department.id');
		$this->db->select('designation.id,designation.department_id,designation.designation, department.department, employee.name,employee.designation_emp,employee.id as emp_id');
		$query = $this->db->get('employee');
//		die($this->db->last_query());
		return $query->result_array();
	}

	public
	function get_dept()
	{

		$query = $this->db->get('department');
		return $query->result_array();
	}

	public
	function get_desig()
	{
		$query = $this->db->get('designation');
		return $query->result_array();
	}

	//	view function
	public function view_payroll()
	{
		$query = $this->db->get('payroll');
		return $query->result_array();
	}

	//	view_notice using id
	public function view_salary_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('payroll');
		return $query->row_array();
	}

//	view pg in list salary
	public function view_payroll_id($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('payroll');
		return $query->row_array();
	}

	public function view_employee_id()
	{
		$this->db->join('designation', 'designation.id = employee.designation_emp');
		$this->db->join('department', 'designation.department_id = department.id');
		$this->db->join('payroll', 'payroll.employee = employee.id');
//		$this->db->join('payment_history', 'payment_history.employee = payroll.employee');
		$this->db->select(' employee.* ,payroll.*,department.department ');
		$query = $this->db->get('employee');
//		die($this->db->last_query());
		return $query->row_array()	;
	}

	public function view_payroll_employee($id)
	{
		$this->db->where('employee', $id);
		$query = $this->db->get('payroll');
		return $query->result_array();

	}

	public function payment_history()
	{
		$date = $_POST['date'];
		if ($this->input->post()) {
			$data = array(
				'gross_salary' => $this->input->post('gross_salary'),
				'total_deduction' => $this->input->post('total_deduction'),
				'net_salary' => $this->input->post('net_salary'),
				'fine_deduction' => $this->input->post('fine_deduction'),
				'payment_type' => $this->input->post('payment_type'),
				'comment' => $this->input->post('comment'),
				'date' => $date,
				'employee' => $this->input->post('employee'),

			);
			return $this->db->insert('payment_history', $data);
		}
	}
	public function payment_history_update()
	{
		$date = $_POST['date'];
		$id = $_POST['id'];
		if ($this->input->post()) {
			$data = array(
				'gross_salary' => $this->input->post('gross_salary'),
				'total_deduction' => $this->input->post('total_deduction'),
				'net_salary' => $this->input->post('net_salary'),
				'fine_deduction' => $this->input->post('fine_deduction'),
				'payment_type' => $this->input->post('payment_type'),
				'comment' => $this->input->post('comment'),
				'date' => $date,
				'employee' => $this->input->post('employee'),

			);
			$this->db->where('id', $id);
			return $this->db->update('payment_history', $data);
		}
	}

	public function view_payment($id)
	{
		$this->db->where('employee', $id);
		$query = $this->db->get('payment_history');
		return $query->result_array();
	}

	public function view_dsig_payslip($id)
	{
		$this->db->where('designation', $id);
		$query = $this->db->get('payroll');
		return $query->result_array();
//		$this->db->join('designation', 'designation.id = employee.designation_emp');
//		$this->db->join('department', 'designation.department_id = department.id');
//		$this->db->join('payroll', 'payroll.designation = designation.designation');
//		$this->db->join('payment_history', 'payment_history.employee = payroll.employee');
//		$this->db->select('designation.id,designation.department_id,designation.designation, department.department, employee.name,employee.designation_emp,employee.id as emp_id,payroll.*,payment_history.*');
//		$query = $this->db->get('employee');
////		die($this->db->last_query());
//		return $query->result_array();
	}

	public function view_emp_desig($id)
	{
//		$id = $_POST['designation'];
		$this->db->where('id', $id);
		$query = $this->db->get('employee');
		return $query->result_array();
	}

	public function view_employee()
	{
		$this->db->join('designation', 'designation.id = employee.designation_emp');
		$this->db->join('department', 'designation.department_id = department.id');
		$this->db->join('payroll', 'payroll.employee = employee.id');
//		$this->db->join('payment_history', 'payment_history.employee = payroll.employee');
		$this->db->select(' employee.* ,payroll.*,department.department');
		$query = $this->db->get('employee');
//		die($this->db->last_query());
		return $query->row_array()	;
	}
}
