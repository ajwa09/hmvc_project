<?php

class employee_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

//insert function
	public function insert()
	{
		if ($this->input->post()) {

			$config['upload_path'] = './assets/images/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp|pdf|docx|txt|tex|ppt|xlsx';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("photo")) {
				$errors = array('error' => $this->upload->display_errors());
				$photo = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$photo = $data['upload_data']['file_name'];
			}
			if (!$this->upload->do_upload("offer_letter")) {
				$errors = array('error' => $this->upload->display_errors());
				$offer_letter = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$offer_letter = $data['upload_data']['file_name'];
			}
			if (!$this->upload->do_upload('resum')) {
				$errors = array('error' => $this->upload->display_errors());
				$resum = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$resum = $data['upload_data']['file_name'];
			}
			if (!$this->upload->do_upload("joining_letter")) {
				$errors = array('error' => $this->upload->display_errors());
				$joining_letter = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$joining_letter = $data['upload_data']['file_name'];
			}
			if (!$this->upload->do_upload("id_proff")) {
				$errors = array('error' => $this->upload->display_errors());
				$id_proff = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$id_proff = $data['upload_data']['file_name'];
			}
			if (!$this->upload->do_upload("other_docs")) {
				$errors = array('error' => $this->upload->display_errors());
				$other_docs = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$other_docs = $data['upload_data']['file_name'];
			}
			if (!$this->upload->do_upload("contact_paper")) {
				$errors = array('error' => $this->upload->display_errors());
				$contact_paper = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$contact_paper = $data['upload_data']['file_name'];
			}

			$data = array(
				'name' => $this->input->post('name'),
				'last_name' => $this->input->post('last_name'),
				'dob' => $this->input->post('dob'),
				'gender' => $this->input->post('gender'),
				'marital_status' => $this->input->post('marital_status'),
				'father' => $this->input->post('father'),
				'nationality' => $this->input->post('nationality'),
				'passport' => $this->input->post('passport'),
				'photo' => $photo,
				'bank_name' => $this->input->post('bank_name'),
				'branch_name' => $this->input->post('branch_name'),
				'account_name' => $this->input->post('account_name'),
				'account_no' => $this->input->post('account_no'),
				'address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'country' => $this->input->post('country'),
				'mobile' => $this->input->post('mobile'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'resum' => $resum,
				'offer_letter' => $offer_letter,
				'joining_letter' => $joining_letter,
				'id_proff' => $id_proff,
				'other_docs' => $other_docs,
				'contact_paper' => $contact_paper,
				'emp_id' => $this->input->post('emp_id'),
				'joining' => $this->input->post('joining'),
				'designation_emp' => $this->input->post('designation_emp'),
			);
			return $this->db->insert('employee', $data);
		}

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
	function country()
	{
		$query = $this->db->get('tbl_countries');
		return $query->result_array();
	}
//end all fetching function

//view query
	public function view_employee()
	{
		$this->db->join('employee', 'designation.id = employee.designation_emp');
		$this->db->join('department', 'designation.department_id = department.id');
		$this->db->select('designation.* , department.*, employee.*');
		$this->db->from('designation');
		$query = $this->db->get('');
		return $query->result_array();
	}

//	delete employee from list_employee
	public function delete_employee($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('employee');
		return true;
	}

//	fetch data from employee
	public function fetch_employee($id)
	{
		$this->db->join('employee', 'designation.id = employee.designation_emp');
		$this->db->join('department', 'designation.department_id = department.id');
		$this->db->select('designation.* , department.*, employee.*');
		$this->db->from('designation');
		$this->db->where('employee.id', $id);
		$query = $this->db->get('');
		return $query->row_array();
	}

//	getting employee data without id
	public function employee_table()
	{

		$query = $this->db->get('employee');
		return $query->result_array();
	}

	public function table_employee($id)
	{
		$this->db->where('designation_emp', $id);
		$query = $this->db->get('employee');
		return $query->result_array();
	}

	//	update employee function
	public function update_employee_view()
	{

		$id = $_POST['id'];
		if ($this->input->post()) {
			if ($id) {
				$config['upload_path'] = './assets/images/img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|webp|pdf|docx|txt|tex|ppt|xlsx';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload("photo")) {
					$errors = array('error' => $this->upload->display_errors());
					$photo = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$photo = $data['upload_data']['file_name'];
				}
				if (!$this->upload->do_upload("offer_letter")) {
					$errors = array('error' => $this->upload->display_errors());
					$offer_letter = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$offer_letter = $data['upload_data']['file_name'];
				}
				if (!$this->upload->do_upload('resum')) {
					$errors = array('error' => $this->upload->display_errors());
					$resum = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$resum = $data['upload_data']['file_name'];
				}
				if (!$this->upload->do_upload("joining_letter")) {
					$errors = array('error' => $this->upload->display_errors());
					$joining_letter = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$joining_letter = $data['upload_data']['file_name'];
				}
				if (!$this->upload->do_upload("id_proff")) {
					$errors = array('error' => $this->upload->display_errors());
					$id_proff = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$id_proff = $data['upload_data']['file_name'];
				}
				if (!$this->upload->do_upload("other_docs")) {
					$errors = array('error' => $this->upload->display_errors());
					$other_docs = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$other_docs = $data['upload_data']['file_name'];
				}
				if (!$this->upload->do_upload("contact_paper")) {
					$errors = array('error' => $this->upload->display_errors());
					$contact_paper = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$contact_paper = $data['upload_data']['file_name'];
				}
				$data = array(
					'name' => $this->input->post('name'),
					'last_name' => $this->input->post('last_name'),
					'dob' => $this->input->post('dob'),
					'gender' => $this->input->post('gender'),
					'marital_status' => $this->input->post('marital_status'),
					'father' => $this->input->post('father'),
					'nationality' => $this->input->post('nationality'),
					'passport' => $this->input->post('passport'),
					'photo' => $photo,
					'bank_name' => $this->input->post('bank_name'),
					'branch_name' => $this->input->post('branch_name'),
					'account_name' => $this->input->post('account_name'),
					'account_no' => $this->input->post('account_no'),
					'address' => $this->input->post('address'),
					'city' => $this->input->post('city'),
					'country' => $this->input->post('country'),
					'mobile' => $this->input->post('mobile'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'resum' => $resum,
					'offer_letter' => $offer_letter,
					'joining_letter' => $joining_letter,
					'id_proff' => $id_proff,
					'other_docs' => $other_docs,
					'contact_paper' => $contact_paper,
					'status' =>$this->input->post('status'),
					'emp_id' => $this->input->post('emp_id'),
					'joining' => $this->input->post('joining'),
					'designation_emp' => $this->input->post('designation_emp'),
				);
				$this->db->where('id', $id);
				return $this->db->update('employee', $data);

			}
		}
	}

//	insert award
	public function insert_award()
	{

		if ($this->input->post()) {
			$data = array(

				'designation' => $this->input->post('designation'),
				'employee' => $this->input->post('employee'),
				'award_name' => $this->input->post('award_name'),
				'gift' => $this->input->post('gift'),
				'award_amount' => $this->input->post('award_amount'),
				'month' => $this->input->post('month'),
			);
//			print_r($data);
//			die();
			return $this->db->insert('award_employee', $data);
		}
	}

//  view award
	public function view_award()
	{
		$query = $this->db->get('award_employee');
		return $query->result_array();
	}

//delete award_employee
	public function delete_award($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('award_employee');
		return true;
	}

//	fetch data of award
	public function fetch_award_employee($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('award_employee');
		return $query->row_array();
	}

//	update award employee
	public function update_award()
	{
		$id = $_POST['id'];
		if ($this->input->post()) {
			if ($id) {
				$data = array(
					'designation' => $this->input->post('designation'),
					'employee' => $this->input->post('employee'),
					'award_name' => $this->input->post('award_name'),
					'gift' => $this->input->post('gift'),
					'award_amount' => $this->input->post('award_amount'),
					'month' => $this->input->post('month'),
				);
				$this->db->where('id', $id);
				return $this->db->update('award_employee', $data);
			}
		}
	}

//	join function
	public function join()
	{
		$this->db->join('designation', 'designation.id = employee.desigantion');
		$this->db->select('designation.* , department.*, department.*');
		$this->db->from('department');
		$this->db->from('employee');
	}
}
