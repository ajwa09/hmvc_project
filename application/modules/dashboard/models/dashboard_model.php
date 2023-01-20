<?php

class dashboard_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function employee_table()
	{
		$query = $this->db->get('employee');
		return $query->result_array();
	}
	public function expense_table()
	{
		$query = $this->db->get('expense');
		return $query->result_array();
	}
	public function award_employee()
	{
		$query = $this->db->get('award_employee');
		return $query->result_array();
	}
//	===========calendar======

	function fetch_all_event(){
		$this->db->order_by('id');
		return $this->db->get('events');
	}

	function insert_event($data)
	{
		$this->db->insert('events', $data);
	}

	function update_event($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('events', $data);
	}

	function delete_event($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('events');
	}

	//	expense function for getting month
	public function get_holiday_list_by_date($start_date, $end_date)
	{
		$this->db->select('expense.*', FALSE);
		$this->db->from('expense');
		$this->db->where('purchase_date >=', $start_date);
		$this->db->where('purchase_date <=', $end_date);
		$query_result = $this->db->get();
		$result       = $query_result->result();
		return $result;
	}

	public function get_expense_list()
	{
		$query = $this->db->get('expense');
		return $query->result_array();
	}
}

