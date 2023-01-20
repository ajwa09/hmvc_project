<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['module_name'] = 'controller_name';
$route['admin/general_settings'] = 'settings/general';
$route['admin/working_day'] = 'settings/work_day';
$route['admin/Holiday_settings'] = 'settings/save_holiday';
$route['admin/leave_settings'] = 'settings/save_category';
$route['admin/personal_settings'] = 'settings/get_event';

//department
$route['admin/Department'] = 'department/insert';
$route['admin/Department_list'] = 'department/view_department';

//employee
$route['admin/employee'] = 'employee/general';
$route['admin/list_employee'] = 'employee/list_emp';
$route['admin/Award_employee'] = 'employee/award';
//Attendence
$route['admin/Attendance'] = 'attendance/general';
$route['admin/attendance_report'] = 'attendance/general_report';
//Expense
$route['admin/expense'] = 'expense/general';
$route['admin/expense_report'] = 'expense/expense_report';

//notice
$route['admin/Notice_Board'] = 'notice_board/general';
$route['admin/View_Notice'] = 'notice_board/get_notice';

//payroll
$route['admin/Payroll_Salary'] = 'payroll/general';
$route['admin/Payroll_Salary_details'] = 'payroll/salary_list';
$route['admin/Make_Payment'] = 'payroll/general_make_payment';
$route['admin/generate_payslip'] = 'payroll/payslip';

//$route['default_controller'] = 'dashboard/index';
$route['default_controller'] = 'login/index';
$route['home'] = 'dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
