<style>
	.site_logo {
		height: 30px;
		width: 150px;
		object-fit: cover;
	}

	@media print {
		.no-print {
			display: none;
		}
	}

	ul.holiday_navbar {
		background: rgba(60, 109, 132, 0.87);
	}

	.nav {
		padding-left: 0;
		margin-bottom: 0;
		list-style: none;
	}

	ul.holiday_navbar li {
		border-bottom: 1px solid #ffffff;
	}

	.nav > li {
		position: relative;
		display: block;
		width: 100%;
	}

	ul.holiday_navbar li a {
		color: #ffffff;
		font-size: 14px;
	}

	.nav > li > a {
		position: relative;
		display: block;
		padding: 10px 15px;
		text-decoration: none;
	}

	ul.holiday_navbar li a i {
		background: #816F95;
		padding: 15px;
		margin-top: -10px;
		margin-bottom: -10px;
		margin-left: -15px;
	}

	ul.holiday_navbar li a:hover, ul.holiday_navbar li.active, ul.holiday_navbar li a:focus {
		background: #816F95;
	}

	ul.holiday_navbar li.active:after {
		position: absolute;
		right: 0;
		top: 9px;
		border: 11px solid rgba(255, 255, 255, 0);
		border-right-color: #fff;
		content: '';
		width: 0;
		height: 0;
	}
</style>


<?php //$date = $_POST['date']; ?>
<!-- Sidebar inner chat start-->

<?php $i = 0 ?>
<!-- Sidebar inner chat end-->
<div class="pcoded-main-container">
	<div class="pcoded-wrapper">


		<div class="pcoded-content">
			<div class="pcoded-inner-content">
				<!-- Main-body start -->
				<div class="main-body">
					<div class="page-wrapper">
						<!-- Page-header start -->
						<div class="page-header">
							<div class="row align-items-end">
								<div class="col-lg-8">
									<div class="page-header-title pt-4 pl-5 pb-4">
										<div class="d-inline">
											<h4>Expense</h4>
											<span>Expense Report</span>
										</div>
									</div>
								</div>

							</div>
						</div>
						<!-- Page-header end -->

						<div class="page-body">
							<div class="container-fluid pr-5 pl-5">
								<div hidden class="row">
									<div class="col-sm-3">
										<form id="existing_customer" action="" method="post">
											<label for="field-1"
												   class="control-label pull-left holiday-vertical"><strong>Year:</strong></label>
											<div class="col-sm-8">
												<input type="text" name="year" class="form-control years"
													   value="2022" data-format="yyyy">
											</div>
											<button type="submit" id="search_product" data-toggle="tooltip"
													data-placement="top" title="Search"
													class="btn btn-custom pull-right">
												<i class="fa fa-search"></i></button>
										</form>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 no-print">
										<ul class="nav holiday_navbar">
											<?php
											foreach ($all_holiday_list as $key => $v_holiday_list):
												$year = date('Y');
												$month_name = date('F', strtotime($year . '-' . $key)); // get full name of month by date query
												?>
												<li class="<?php
												if ($current_month == $key) {
													echo 'active';
												}
												?>">
													<a aria-expanded="<?php
													if ($current_month == $key) {
														echo 'true';
													} else {
														echo 'false';
													}
													?>" data-toggle="tab" href="#<?php echo $month_name ?>">
														<i class="fa fa-calendar"></i> <?php echo $month_name; ?> </a>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<?php
											foreach ($all_holiday_list

													 as $key => $v_holiday_list):
												$year = date('Y');
												$month_name = date('F', strtotime($year . '-' . $key)); // get full name of month by date query
												?>
												<div id="<?php echo $month_name ?>" class="tab-pane <?php
												if ($current_month == $key) {
													echo 'active';
												}
												?>">
													<div class="card">
														<div class="card-header">
															<h5>
																<i class="fa fa-calendar"></i> <?php echo $month_name; ?>
															</h5>
															<div id="monData"></div>
															<div class="col"
																 style="margin-left: 85%;margin-top: -35px; ">
																<a type="button"
																   class="btn btn-info btn-sm no-print"
																   title="Print"

																   data-placement="top" onclick="window.print()">
																	<span class="fa fa-print text-white"></span>
																</a>
																<?php form_open_multipart('expense/view_expense_id') ?>

																</a>
															</div>
														</div>
														<div class="card-block">
															<table class="table clear table-bordered table-hover">
																<thead>
																<tr>
																	<th class="">Sr.</th>
																	<th>Item Name</th>
																	<th class="">Parchase form</th>
																	<th class="">Parchase Date</th>
																	<th class="">Employee Name</th>
																	<th class="">Bill Copy</th>
																	<th class="">Amount</th>
																	
																</tr>
																</thead>
																<tbody>
																<?php
																$key = 1;
																$total_amount = 0;
																foreach ($posts as $post): ?>

																	<tr>
																		<td><?php echo $post['id']; ?></td>
																		<td><?php echo $post['item_name']; ?></td>
																		<td><?php echo $post['purchase_form']; ?></td>
																		<td><?php echo $post['purchase_date']; ?></td>
																		<td><?php echo $post['employee_name']; ?></td>
																		<td><?php echo $post['bill_copy']; ?></td>
																		<td><?php echo $post['amount_spent'];
																			$total_amount += $post['amount_spent']; ?>

																		</td>

																	</tr>
																<?php endforeach; ?>

																<td colspan="5"></td>
																<th colspan=""
																	style="color: red; border-left: hidden; ">Total
																	Aomount
																</th>
																<td colspan="" style=" border-right:hidden;">
																	<b><?php echo $total_amount ?></b></td>

																</tbody>
															</table>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var doc = new jsPDF();
	var specialElementHandlers = {
		'#editor': function (element, renderer) {
			return true;
		}
	};

	$('#generatePDF').click(function () {
		doc.fromHTML($('#htmlContent').html(), 15, 15, {
			'width': 700,
			'elementHandlers': specialElementHandlers
		});
		print(htmlContent);
		doc.save('<?php echo base_url('view_expense_id.pdf')?>//');
	});

	$(document).ready(function () {

		$("#designation").change(load_new_content());
	});

	function load_new_content() {
		var selected_option_value = $("#designation option:selected").val();
		var att_date = $("#date").val();

		$.post("<?php echo base_url('attendance/list_attendance')?>", {
				option_value: selected_option_value,
				date: att_date
			},
			function (data) {
				$("#name").html(data);

			}
		);
	}
</script>

