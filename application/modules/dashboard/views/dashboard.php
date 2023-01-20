<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HMVC STEPUP</title>

	<!-- Google Font: Source Sans Pro -->
	<title>Jquery FullCalendar Integration with Codeigniter using Ajax</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
	<script>
		$(document).ready(function(){
			var calendar = $('#calendar').fullCalendar({
				editable:true,
				header:{
					left:'prev,next today',
					center:'title',
					right:'month,agendaWeek,agendaDay'
				},
				events:"<?php echo base_url(); ?>dashboard/load",
				selectable:true,
				selectHelper:true,
				select:function(start, end, allDay)
				{
					var title = prompt("Enter Event Title");
					if(title)
					{
						var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
						var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
						$.ajax({
							url:"<?php echo base_url(); ?>dashboard/insert",
							type:"POST",
							data:{title:title, start:start, end:end},
							success:function()
							{
								calendar.fullCalendar('refetchEvents');
								alert("Added Successfully");
							}
						})
					}
				},
				editable:true,
				eventResize:function(event)
				{
					var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
					var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

					var title = event.title;

					var id = event.id;

					$.ajax({
						url:"<?php echo base_url(); ?>dashboard/update",
						type:"POST",
						data:{title:title, start:start, end:end, id:id},
						success:function()
						{
							calendar.fullCalendar('refetchEvents');
							alert("Event Update");
						}
					})
				},
				eventDrop:function(event)
				{
					var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
					//alert(start);
					var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
					//alert(end);
					var title = event.title;
					var id = event.id;
					$.ajax({
						url:"<?php echo base_url(); ?>dashboard/update",
						type:"POST",
						data:{title:title, start:start, end:end, id:id},
						success:function()
						{
							calendar.fullCalendar('refetchEvents');
							alert("Event Updated");
						}
					})
				},
				eventClick:function(event)
				{
					if(confirm("Are you sure you want to remove it?"))
					{
						var id = event.id;
						$.ajax({
							url:"<?php echo base_url(); ?>dashboard/delete",
							type:"POST",
							data:{id:id},
							success:function()
							{
								calendar.fullCalendar('refetchEvents');
								alert('Event Removed');
							}
						})
					}
				}
			});
		});

	</script>
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet"
		  href="<?php echo base_url() ?>assets/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet"
		  href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet"
		  href="<?php echo base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">


<!--	chart-->

	<!--	====end calendar====-->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<!-- Preloader -->
	<!--	<div class="preloader flex-column justify-content-center align-items-center">-->
	<!--		<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">-->
	<!--	</div>-->

	<nav class="main-header navbar navbar-expand navbar-light" >

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- Navbar Search -->
			<li class="nav-item" style="margin-right: 1000px;">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-widget="navbar-search" href="#" role="button">
					<i class="fas fa-search"></i>
				</a>
				<div class="navbar-search-block">
					<form class="form-inline">
						<div class="input-group input-group-sm">
							<input class="form-control form-control-navbar" type="search" placeholder="Search"
								   aria-label="Search">
							<div class="input-group-append">
								<button class="btn btn-navbar" type="submit">
									<i class="fas fa-search"></i>
								</button>
								<button class="btn btn-navbar" type="button" data-widget="navbar-search">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</li>

			<!-- Messages Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="far fa-comments"></i>
					<span class="badge badge-danger navbar-badge">3</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<a href="#" class="dropdown-item">
						<!-- Message Start -->
						<div class="media">
							<img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
							<div class="media-body">
								<h3 class="dropdown-item-title">
									Brad Diesel
									<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
								</h3>
								<p class="text-sm">Call me whenever you can...</p>
								<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
							</div>
						</div>
						<!-- Message End -->
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<!-- Message Start -->
						<div class="media">
							<img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
							<div class="media-body">
								<h3 class="dropdown-item-title">
									John Pierce
									<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
								</h3>
								<p class="text-sm">I got your message bro</p>
								<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
							</div>
						</div>
						<!-- Message End -->
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<!-- Message Start -->
						<div class="media">
							<img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
							<div class="media-body">
								<h3 class="dropdown-item-title">
									Nora Silvester
									<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
								</h3>
								<p class="text-sm">The subject goes here</p>
								<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
							</div>
						</div>
						<!-- Message End -->
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
				</div>
			</li>
			<!-- Notifications Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="far fa-bell"></i>
					<span class="badge badge-warning navbar-badge">15</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<span class="dropdown-item dropdown-header">15 Notifications</span>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<i class="fas fa-envelope mr-2"></i> 4 new messages
						<span class="float-right text-muted text-sm">3 mins</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<i class="fas fa-users mr-2"></i> 8 friend requests
						<span class="float-right text-muted text-sm">12 hours</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<i class="fas fa-file mr-2"></i> 3 new reports
						<span class="float-right text-muted text-sm">2 days</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-widget="fullscreen" href="#" role="button">
					<i class="fas fa-expand-arrows-alt"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
					<i class="fas fa-th-large"></i>
				</a>
			</li>
		</ul>
	</nav>
<!--	 /.navbar -->

<!--	 Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-5" style="background:#404E67;">
		<!-- Brand Logo -->
		<div style="height: 34px">
			<a href="#">
				<img src="<?php echo base_url() ?>assets/dist/logo.png" class="brand-image img-square "
					 style="opacity: 1;width: 150px;height: 50px;margin-left: 20px;">
				<!--			<span class="brand-text font-weight-light"></span>-->
			</a>
		</div>
		<hr>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel pb-3 mb-3 d-flex">
				<div class="image">
				</div>
				<div class="info">
					<a href="#" class="d-block">Navegation</a>
				</div>
			</div>

<!--			 Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
					<li class="nav-item menu-open">

					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
									 class="bi bi-gear" viewBox="0 0 16 16">
									<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
									<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
								</svg>
							</i>

							<p>
								Settings
								<i class="fas fa-angle-right right"></i>

							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/general_settings" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>General Settings</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/working_day" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Set working day</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/Holiday_settings" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Holiday List</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/leave_settings" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Leave Category</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/personal_settings" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Personal Event</p>

								</a>
							</li>
						</ul>
					</li>
					<!--					end setting-->
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
									 class="bi bi-list-task" viewBox="0 0 16 16">
									<path fill-rule="evenodd"
										  d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"/>
									<path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"/>
									<path fill-rule="evenodd"
										  d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"/>
								</svg>
							</i>

							<p>
								Department
								<i class="fas fa-angle-right right"></i>

							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/Department" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Add Department</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/Department_list" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>List Department</p>
								</a>
							</li>
						</ul>
					</li>
					<!--					end department-->
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
									 class="bi bi-credit-card" viewBox="0 0 16 16">
									<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
									<path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
								</svg>
							</i>

							<p>
								MailBox
								<i class="fas fa-angle-right right"></i>

							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Inbox</p>
								</a>
							</li>
						</ul>
					</li>
					<!--					end mailbox-->
					<li class="nav-item">
						<a href="" class="nav-link">
							<i class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
									 class="bi bi-person-fill" viewBox="0 0 16 16">
									<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
								</svg>
							</i>

							<p>
								Employee
								<i class="fas fa-angle-right right"></i>

							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/employee" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Add Employee</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/list_employee" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>List Employee</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/Award_employee" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Employee Award</p>
								</a>
							</li>
						</ul>
					</li>
					<!--					end emplooy-->
					<li class="nav-item">
						<a href="" class="nav-link">
							<i class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
									 class="bi bi-file-earmark-text" viewBox="0 0 16 16">
									<path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
									<path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
								</svg>
							</i>

							<p>
								Attendence
								<i class="fas fa-angle-right right"></i>

							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/Attendance" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Manage Attendence</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/attendance_report" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Attendence Report</p>
								</a>
							</li>
						</ul>
					</li>
<!--										end attendence-->
<!--					<li class="nav-item">-->
<!--						<a href="#" class="nav-link">-->
<!--							<i class="nav-icon"></i>-->
<!---->
<!--							<p>-->
<!--								Application list-->
<!--							</p>-->
<!--						</a>-->
<!--					</li>-->
					<!--					END APPLICATION-->
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
									 class="bi bi-currency-dollar" viewBox="0 0 16 16">
									<path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
								</svg>
							</i>

							<p>
								Payroll Payment
								<i class="fas fa-angle-right right"></i>

							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/Payroll_Salary" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Manage Salary Details</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/Payroll_Salary_details" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Employee Salary List</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/Make_Payment" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Make Payment</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/generate_payslip" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Generate Payslip</p>
								</a>
							</li>
						</ul>
					</li>
<!--										end -->
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
									 class="bi bi-cash-stack" viewBox="0 0 16 16">
									<path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
									<path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
								</svg>
							</i>

							<p>
								Expense Management
								<i class="fas fa-angle-right right"></i>

							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/expense" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Add Expense</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/expense_report" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Expense Report</p>
								</a>
							</li>
						</ul>
					</li>
<!--										end expense-->
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
									 class="bi bi-card-list" viewBox="0 0 16 16">
									<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
									<path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
								</svg>
							</i>

							<p>
								Notice Board
								<i class="fas fa-angle-right right"></i>

							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/Notice_Board" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Add Notice</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/View_Notice" class="nav-link">
									<i class="fas fa-angle-right right"></i>
									<p>Manage Notice</p>
								</a>
							</li>
						</ul>
					</li>
<!--										end notice-->
					<li class="nav-item">

						<a href="<?php echo base_url(); ?>index.php/user/logout" class="btn ">
							<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
								 class="bi bi-box-arrow-right" viewBox="0 0 16 16">
								<path fill-rule="evenodd"
									  d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
								<path fill-rule="evenodd"
									  d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
							</svg>
							Logout</a>
					</li>

				</ul>
			</nav>
		</div>

	</aside>

<!--	 Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">HRM</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid pl-3	 pr-3	">
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-lg-4 col-6">
						<!-- small box -->
						<div class="small-box bg-info">
							<div class="inner">
								<?php
								$val = 1;
								$total_employee = 0;
								foreach ($award

								as $awards): ?>

								<tr>
									<td><?php
										$total_employee += $val ?>
										<?php endforeach; ?>

										<h3><?php echo $total_employee ?></h3>

										<p>Total Award</p>
							</div>
							<div class="icon">
								<i class="ion ion-bag"></i>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-4 col-6">
						<!-- small box -->
						<div class="small-box bg-purple">
							<div class="inner">
								<?php
								$key = 1;
								$total_amount = 0;
								foreach ($exp

								as $item): ?>

								<tr>
									<td><?php
										$total_amount += $item['amount_spent']; ?>
										<?php endforeach; ?>

										<h3><?php echo $total_amount ?></h3>
										<p>Total Expense</p>
							</div>
							<div class="icon">
								<i class="ion ion-stats-bars"></i>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-4 col-6">
						<!-- small box -->
						<div class="small-box bg-pink">
							<div class="inner">
								<?php
								$val = 1;
								$total_employee = 0;
								foreach ($post

								as $employee): ?>

								<tr>
									<td><?php
										$total_employee += $val ?>
										<?php endforeach; ?>

										<h3><?php echo $total_employee ?></h3>

										<p>Total Award</p>
							</div>
							<div class="icon">
								<i class="ion ion-bag"></i>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<section class=" connectedSortable">
						<div class="row">
						<div class="col-lg-7">
							<div class="card card-outline ">
								<div class="card-body">
									<div id="calendar"></div>
								</div>
							</div>
						</div>
<!--						<div class="col-lg-4"></div>-->
						<div class="col-lg-5">
							<div class="card card-outline ">
								<div class="card-header">
									<h3 class="card-title " >Expense Report
								</h3>
								<div class="card-body">
										<div id="curve_chart" style="width: 500px; height: 400px"></div>
								</div>
							</div>
						</div>
					</section>
					<section class="col-lg-5 connectedSortable">
						<div class=" card card-outline">
							<div class="card-body">
								<!--				==================	employee birthday card======================= -->
								<h6><strong>Birthdays of Employee</strong></h6>
								<table class="table">
									<?php foreach ($post

												   as $posts): ?>
										<thead style="border-bottom: hidden">
										<tr>
											<th>
												<img type="file"
													 src="<?php echo base_url() ?>assets/images/img/sea.jpg ?>"
													 style="max-height: 50px; max-width: 50px; ">
											</th>
											<th><?php echo $posts['name'] ?></th>


										</tr>
										</thead>
										<tbody style="border-bottom: hidden">
										<tr>
											<th></th>
											<th style="color: deepskyblue"><?php echo $posts['dob'] ?></th>
										</tr>
										</tbody>
									<?php endforeach; ?>
								</table>
							</div>
						</div>
					</section>
				</div>
			</div>
		</section>
	</div>
</div>


<!-- ./wrapper -->
<!--<script src="files/assets/js/fullcalendar.js"></script>-->
<!-- / Chart.js Script -->
<script src="<?php echo base_url()?>files/assets/js/chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>files/assets/js/jquery.min.js"></script>
<!--<script src="js/Chart.min.js"></script>-->

<script src="<?php echo base_url()?>files/assets/js/line-db-php.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Year', 'Expenses'],
			<?php foreach ($expense as $exp):?>

			[<?php echo $exp['purchase_date']?>,<?php echo $exp['amount_spent']?>],

			<?php endforeach;?>
		]);

		var options = {
			title: '',
			curveType: 'function',
			legend: { position: 'bottom' }

		};

		var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

		chart.draw(data, options);
	}
</script>
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!--<script src="--><?php //echo base_url() ?><!--assets/plugins/sparklines/sparkline.js"></script>-->
<!-- JQVMap -->
<script src="<?php echo base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
</body>
</html>
