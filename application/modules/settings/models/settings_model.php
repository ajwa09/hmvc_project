<?php

class Settings_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insert_data()
	{
		$data = array(
			//			post is method
				'name' => $this->input->post('name'),
				'logo' => $this->input->post('logo'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'country' => $this->input->post('country'),
				'language' => $this->input->post('language'),
				'currency' => $this->input->post('currency'),
				'phone' => $this->input->post('phone'),
				'hotline' => $this->input->post('hotline'),
				'fax' => $this->input->post('fax'),
				'website' => $this->input->post('website'),
		);
		//		here query parameter is table name
		return $this->db->insert('general_settings', $data);
	}

	public function update_data()
	{
		$id = $_POST['id'];
		$data = array(
			//			post is method
				'name' => $this->input->post('name'),
				'logo' => $this->input->post('logo'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'country' => $this->input->post('country'),
				'language' => $this->input->post('language'),
				'currency' => $this->input->post('currency'),
				'phone' => $this->input->post('phone'),
				'hotline' => $this->input->post('hotline'),
				'fax' => $this->input->post('fax'),
				'website' => $this->input->post('website'),
		);
		//		here query parameter is table name
		$this->db->where('id', $id);
		return $this->db->insert('general_settings', $data);
	}

	public function insert_holiday()
	{
		if ($this->input->post()) {
			$data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'start_date' => $this->input->post('start_date'),
					'end_date' => $this->input->post('end_date'),
			);
			return $this->db->insert('add_holiday', $data);
		}
	}

//======================================
	function get_holiday_list_by_date($start_date, $end_date)
	{
		$this->db->select('add_holiday.*', FALSE);
		$this->db->from('add_holiday');
		$this->db->where('start_date >=', $start_date);
		$this->db->where('end_date <=', $end_date);
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result;
	}


	public function get_holidays()
	{
		$this->db->select('tbl_working_days.day_id,tbl_working_days.flag');
		$this->db->select('tbl_days.day');
		$this->db->from('tbl_working_days');
		$this->db->join('tbl_days', 'tbl_days.day_id = tbl_working_days.day_id', 'left');
		$this->db->where('flag', 0);
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result;
	}

	public function get_public_holidays($yymm = null)
	{
		$this->db->select('add_holiday.*');
		$this->db->from('add_holiday');
		if ($yymm) {
			$this->db->like('start_date', $yymm);
		}
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result;
	}

	public function get_public_holiday($start_date, $end_date)
	{
		$this->db->select('add_holiday.*');
		$this->db->from('add_holiday');
		$this->db->where('start_date >=', $start_date);
		$this->db->where('end_date <=', $end_date);
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result;
	}


//============================================================
//	update holiday
	public function update_holiday($data)
	{
		if (isset($data['id'])) {
//			if () {

				$this->db->where('id', $data['id']);
				$this->db->update('add_holiday', $data);
//			}
		}
	}

//	view holiday
	public function view_holiday()
	{
		$query = $this->db->get('add_holiday');
		return $query->result_array();
	}

//	fetch holiday
	public function get_holiday_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('add_holiday');
		return $query->row_array();
	}
//	public function get_id($id)
//	{
//		$query = $this->db->get_where('add_holiday', array('id' => $id));
//		return $query->row_array();
//	}
//delete holiday

//	delete category
	public function delete_holiday($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('add_holiday');
		return true;
	}

	public function leave_category()
	{
		$data = array(
				'category' => $this->input->post('category')
		);
		return $this->db->insert('leave_category', $data);

	}

	// view function for leave categorye
	public function view_category()
	{
		$query = $this->db->get('leave_category');
		return $query->result_array();
	}

//	delete category
	public function delete_category($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('leave_category');
		return true;
	}

//add event function
	public function add_event()

	{
		$data = $this->input->post();
		return $this->db->insert('add_event', $data);
	}

//	view event
	public function view_event()
	{
		$array = $this->db->get('add_event');
		return $array->result_array();
	}

//	 del event
	public function delete_event($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('add_event');
		return true;
	}

//working days insert

	function setworkingdays()
	{

		$this->db->empty_table('working_days');
		$day_id = $this->input->post('day');
		$day    = $this->input->post('day_id');
		if (!empty($day)) {
			foreach ($day as $value) {
				$data['flag']   = 0;
				$data['day_id'] = $value;
				if (!empty($day_id)) {
					foreach ($day_id as $days) {
						if ($value == $days) {
							$data['flag'] = 1;
						}
					}
				}
				$this->db->insert('working_days', $data);
			}
		}
		return true;
	}

	public function get_working_tbl(){
		$array = $this->db->get('work_day');
		return $array->result_array();
	}
}


