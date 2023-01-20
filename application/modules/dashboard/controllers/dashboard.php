<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property dashboard_model $dashboard_model
 */
class dashboard extends MX_Controller
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('dashboard/dashboard_model');
//		$this->load->model('employee_model');
		parent::__construct();
	}

	public function index()
	{
		$data['expense'] = $this->dashboard_model->get_expense_list();
		$data['exp'] = $this->dashboard_model->expense_table();
		$data['award'] = $this->dashboard_model->award_employee();
		$data['post'] = $this->dashboard_model->employee_table();
		$this->load->view('dashboard', $data);

//		dd($this->db->queries);

//		$this->load->view('footer');
	}

	public function header()
	{
		$this->load->view('header');
	}

	public function footer()
	{
		$this->load->view('footer');
	}

	public function expense()
	{
		$data['exp'] = $this->dashboard_model->expense_table();
		$this->load->view('dashboard', $data);
	}


//	==========calendar==================
//
//	function index()
//	{
//		$this->load->view('dashboard');
//	}

	function load()
	{
		$event_data = $this->dashboard_model->fetch_all_event();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id' => $row['id'],
				'title' => $row['title'],
				'start' => $row['start_event'],
				'end' => $row['end_event']
			);
		}
		echo json_encode($data);
	}

	function insert()
	{
		if($this->input->post('title'))
		{
			$data = array(
				'title'  => $this->input->post('title'),
				'start_event'=> $this->input->post('start'),
				'end_event' => $this->input->post('end')
			);
			$this->dashboard_model->insert_event($data);
		}
	}

	function update()
	{
		if($this->input->post('id'))
		{
			$data = array(
				'title'   => $this->input->post('title'),
				'start_event' => $this->input->post('start'),
				'end_event'  => $this->input->post('end')
			);

			$this->dashboard_model->update_event($data, $this->input->post('id'));
		}
	}

	function delete()
	{
		if($this->input->post('id'))
		{
			$this->dashboard_model->delete_event($this->input->post('id'));
		}
	}
	//chart expense


}
