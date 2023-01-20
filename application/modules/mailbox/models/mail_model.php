<?php

class mail_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_employee_tbl()
	{
		$query = $this->db->get('employee');
		return $query->result_array();

	}

	public function insert_compose()
	{
		if ($this->input->post()) {

			$config['upload_path'] = './assets/images/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp|pdf|docx|txt|tex|ppt|xlsx';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("attach_file")) {
				$errors = array('error' => $this->upload->display_errors());
				$attach_file = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$attach_file = $data['upload_data']['file_name'];
			}

			$data = array(
				'email' => $this->input->post('email'),
				'subject' => $this->input->post('subject'),
				'paragraph' => $this->input->post('paragraph'),
				'attach_file' => $attach_file
			);


		}
	}
}
