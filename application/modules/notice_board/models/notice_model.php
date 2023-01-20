<?php

class notice_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insert_notice()
	{
		if ($this->input->post()) {

			$data = array(
				'publication_status' => $this->input->post('publication_status'),
				'title' => $this->input->post('title'),
				'short_description' => $this->input->post('short_description'),
				'long_description' => $this->input->post('long_description'),
				'current_date' => $this->input->post('current_date'),

			);
			return $this->db->insert('notice', $data);
		}
	}

//	view function
	public function view_notice()
	{
//		$this->db->where('id',$id);
		$query = $this->db->get('notice');
		return $query->result_array();
	}

//	view_notice using id
	public function view_notice_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('notice');
		return $query->row_array();
	}

//	delete
	public function delete_notice($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('notice');
		return true;
	}

//	update
	public function update_notice($id)
	{
		if ($this->input->post()) {

			$data = array(
				'publication_status' => $this->input->post('publication_status'),
				'title' => $this->input->post('title'),
				'short_description' => $this->input->post('short_description'),
				'long_description' => $this->input->post('long_description'),
				'current_date' => $this->input->post('current_date'),

			);
			$this->db->where('id', $id);
			return $this->db->update('notice', $data);
		}
	}
}
