<?php

class expense_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public
	function employee()
	{
		$query = $this->db->get('employee');
		return $query->result_array();
	}
//	insert function
	public function insert()
	{
		if ($this->input->post()) {

			$config['upload_path'] = './assets/images/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp|pdf|docx|txt|tex|ppt|xlsx';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("bill_copy")) {
				$errors = array('error' => $this->upload->display_errors());
				$bill_copy = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$bill_copy = $data['upload_data']['file_name'];
			}


			$data = array(
				'item_name' => $this->input->post('item_name'),
				'purchase_form' => $this->input->post('purchase_form'),
				'purchase_date' => $this->input->post('purchase_date'),
				'amount_spent' => $this->input->post('amount_spent'),
				'employee_name' => $this->input->post('employee_name'),
				'bill_copy' => $bill_copy,

			);
			return $this->db->insert('expense', $data);
		}

	}
//	view function
	public function view_expense()
	{
		$query = $this->db->get('expense');
		return $query->result_array();
	}

//	holiday function for getting month
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

//	view function using id

	public function view_expense_id($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('expense');
		return $query->row_array();
	}

	public function delete_expense($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('expense');
		return true;
	}

	public function sum($amount_sent){
		$this->db->select(sum($amount_sent));
		$this->db->get('expense');
		$query = $this->db->where('amount_sent',$amount_sent);
		return $query->result_array();
	}
}

