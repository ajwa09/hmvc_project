<?php

class department_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insert_department($department_name, $designations)
	{
		if ($this->input->post()) {

			$department['department'] = $department_name;
			$this->db->insert('department', $department);
			$insert_id = $this->db->insert_id();

			foreach ($designations as $designation) {

				$add['designation'] = $designation;
				$add['department_id'] = $insert_id;
				$this->db->insert('designation', $add);

			}
			redirect("department/view_department");

		} else {
			$this->load->view('department');
		}
	}
//commented join + get function
	public function get_department()
	{

//	{	 $this->db->join('designation', 'designation.department_id = department.id');
//		 $this->db->select('designation.* , department.*');
//		 $this->db->from('department');
		$query = $this->db->get('department');
		return $query->result_array();
	}
//get dept id
	public function get_deptID()
	{

		$array = $this->db->get('designation');
		return $array->result_array();
	}
//del dept
	public function delete_department($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('department');
		return true;
	}
// function for delete
	public function delete_designation($id)
	{
		$this->db->where('department_id', $id);
		$this->db->delete('designation');
		return true;
	}
	public function get_dept($id)
	{
		$query = $this->db->get_where('department', array('id' => $id));
		return $query->row_array();
	}

//	view
	public function get_designation($id)
	{

		$query = $this->db->get_where('designation', array('department_id' => $id));
		return $query->result_array();
	}

//update function
	public function update($department_name, $designations)
	{
		$id = $_POST['id'];
		$designation_id = $_POST['designation_id'];

		if ($this->input->post()) {
			if ($id) {
				$department['department'] = $department_name;
				$this->db->where('id', $this->input->post('id'));
				$query = $this->db->update('department', $department);

				$designation_no = count($designations);
				for ($i = 0; $i < $designation_no; $i++) {

					if (isset($designation_id[$i])) {
						$add['designation'] = $designations[$i];
						$this->db->where('id', $designation_id[$i]);
						$this->db->update('designation', $add);

					}
					else{
						$add['designation'] = $designations[$i];
						$add['department_id'] = $this->input->post('id');
//						$this->db->where('id', $designation_id[$i]);
						$this->db->insert('designation', $add);
					}
				}
			}
		}

	}
//	designation id
	public function del_designation_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('designation');
		return true;
	}
}

