<?php
defined('BASEPATH') or exit('No direct script access allowed');

class settings extends MY_Controller
{
	public function __construct()
	{
		$this->load->database();
		$this->load->model('settings_model');
		parent::__construct();
	}

	public function general()
	{
//		dashboard is pg in views folder
		if ($this->session->userdata('user')) {
			echo Modules::run('dashboard/header');
			$this->load->view('settings');
		} else {
			redirect('login/index');
		}
//		echo Modules::run('dashboard/footer');
	}

	public function create()
	{
		if ($this->input->post('id')) {
			$this->settings_model->update_data();
		} else {
			$this->settings_model->insert_data();
		}
//		redirect("settings/create");
		echo Modules::run('dashboard/header');
		$this->load->view('settings');
	}

	public function work_day()
	{
		if ($this->session->userdata('user')) {

//			$data['day'] = $this->settings_model->get_working_tbl();
			echo Modules::run('dashboard/header');
			$this->load->view('working_days');
		} else {
			redirect('login/index');
		}
//		echo Modules::run('dashboard/footer');
	}

//	public function holiday_list()
//	{
//		$id = $_POST['month'];
//
//		echo Modules::run('dashboard/header');
//		$this->load->view('holiday_list');
////		echo Modules::run('dashboard/footer');
//	}

//add holiday in settings

	public function holiday()
	{
		$id = $this->input->post('id');
//		echo $id;
//		exit();
		if ($id) {
			$data = array(
				//			post is method
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
			);
			$this->settings_model->update_holiday($data);
//			var_dump($this->db->last_query());
			redirect("settings/save_holiday");

		} else {
			$this->settings_model->insert_holiday();
//			redirect("settings/save_holiday");
		}

		echo Modules::run('dashboard/header');
		$this->load->view('settings/add_holiday');

	}

	function save_holiday($flag = null)
	{
		if ($this->session->userdata('user')) {
			if (!empty($flag)) {
				$data['active_add_holiday'] = $flag;
			}

			$data['current_month'] = date('m');
			if ($this->input->post('year')) {
				$data['year'] = $this->input->post('year');
			} else {
				$data['year'] = date('Y');
			}
			$data['all_holiday_list'] = $this->get_holiday_list($data['year']);
//		$data['title'] = 'Holidays';
//		$data['sub_title'] = 'Holiday List';
			$data['posts'] = $this->settings_model->view_holiday();
			$this->load->view('dashboard/header');
			$this->load->view('holiday_list', $data);
		} else {
			redirect('login/index');
		}
//		$data['content'] = 'settings/holiday_list';
//		echo Modules::run('template/layout', $data);

	}

	public
	function get_holiday_list($year)
	{
		for ($i = 1; $i <= 12; $i++) {
			if ($i >= 1 && $i <= 9) {
				$start_date = $year . "-" . '0' . $i . '-' . '01';
				$end_date = $year . "-" . '0' . $i . '-' . '31';
			} else {
				$start_date = $year . "-" . $i . '-' . '01';
				$end_date = $year . "-" . $i . '-' . '31';
			}
			$get_holiday_list[$i] = $this->settings_model->get_holiday_list_by_date($start_date, $end_date);
		}
		return $get_holiday_list;
	}

//	view holiday

//	public function save_holiday()
//	{
//		$data['posts'] = $this->settings_model->view_holiday();
//		$this->load->view('dashboard/header');
//		$this->load->view('holiday_list', $data);
//	}

//	fetch data from holiday list to table
	public
	function delete_holiday($id)
	{
		$this->settings_model->delete_holiday($id);
		redirect("settings/save_holiday");
	}

// get id for holiday

//	public function edit($id)
//	{
//		$data['post'] = $this->settings_model->get_holiday_by_id($id);
//		if (empty($data['post'])){
//			show_404();
//		}
//		echo Modules::run('dashboard/header');
//		$this->load->view('settings/add_holiday');
//	}
	//delete holiday
	public
	function edit_holiday($id)
	{
		$data['post'] = $this->settings_model->get_holiday_by_id($id);
//		redirect("settings/save_holiday");
		echo Modules::run('dashboard/header');
		$this->load->view('add_holiday', $data);
	}

//	....category.....

	public
	function leave_category()
	{
		if ($this->input->post()) {
			$this->input->post();
			$this->settings_model->leave_category();
			redirect("settings/save_category");

		} else {
			echo Modules::run('dashboard/header');
			$this->load->view('settings/leave_category');

		}
	}

//view category
	public
	function save_category()
	{

		if ($this->session->userdata('user')) {
			$data['posts'] = $this->settings_model->view_category();
			$this->load->view('dashboard/header');
			$this->load->view('leave_category', $data);
		} else {
			redirect('login/index');
		}
	}

//delete category
	public
	function delete_category($id)
	{
		$this->settings_model->delete_category($id);
		redirect("settings/save_category");
	}


//	......event......
	public
	function personal_event()
	{
		echo Modules::run('dashboard/header');
		$this->load->view('personal_events');
//		echo Modules::run('dashboard/footer');
	}


//  add event
	public
	function add_event()
	{
		if ($this->input->post()) {
			$this->settings_model->add_event();
			redirect("settings/get_event");
		}

	}

//	view events
	public
	function get_event()
	{
		if ($this->session->userdata('user')) {

			$data['posts'] = $this->settings_model->view_event();
//		$data['content'] = "personal_events";
			echo Modules::run('dashboard/header', $data);
			$this->load->view('personal_events', $data);
		} else {
			redirect('login/index');
		}

	}

//	delete event
	public
	function event_delete($id)
	{
//		echo $id;
//		$id = $_GET['id'];
		$this->settings_model->delete_event($id);
		redirect("settings/get_event");
	}

	public
	function option_award()
	{
		$id = $_POST['month'];
		$data['emp'] = $this->payroll_model->get_by_designation_id($id);
		$data['default_employee'] = null;
//		print_r($data);
		echo $this->load->view('award_option', $data, true);
	}
//inserting the holidays in database

	public function insert_working_day()
	{
		if ($this->input->post()) {
			$this->settings_model->setworkingdays();
			redirect('settings/work_day');

		} else {
			redirect('settings/work_day');
		}
	}

}

