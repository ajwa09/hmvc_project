<style>
	@media print {
		.no-print {
			display: none;
		}
	}
</style>
<section class="content pt-4" id="htmlContent">
	<div class="container p-3" style="font-family: SansSerif; font-size: 15px">
		<div class="row">

			<!-- left column -->
			<div class="col-md-12">

				<!-- general form elements -->
				<div class="card card-outline card-info">
					<div class="card-header">
						<div class="row">
							<div class="col">
								<div class="card-title ">
									<h4>View Employee</h4>
								</div>
							</div>
						</div>
					</div>

					<!-- /.card-header -->
					<!-- form start -->
					<div class="card-body">
						<h6>Employee Details</h6>

						<div class="row">
							<div class="col-md-12 pt-4">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group pl-5">


										</div>
									</div>
									<div class="col-lg-12 ">
										<div class="row">
											<div class="col-lg-2 col-sm-2">
												<div class="fileinput-new thumbnail"
													 style="width: 100px;  margin-top: 14px; margin-left: 16px; background-color: #EBEBEB;">
													<img type="file"
														 src="<?php echo base_url() ?>assets/images/img/<?php
															 echo $emp['photo'];
														  ?>" style="max-height: 100px; max-width: 100px">
												</div>
											</div>
											<div class="col-lg-1 col-sm-1">
												&nbsp;
											</div>
											<div class="col-lg-8 col-sm-8 ">
												<div>
													<div style="margin-left: 20px;">
														<h4><?php echo $post['employee'] ?></h4>
														<hr/>
														<table class="table-hover">
															<!--															--><?php //foreach ($posts as $post): ?>
															<thead>
															<tr>
																<th><strong>Employee ID</strong></th>
																<td><?php echo $emp['name'] ?></td>
															</tr>
															<tr>
																<th><strong>Department</strong></th>
																																	<th>
																<?php echo $emp['department'] ?></th>

															</tr>
															<tr>
																<th><strong class="pr-5">Designation</strong></th>
																<td><?php echo $post['designation'] ?></td>

															</tr>
															<tr>
																<th><strong>Joining Date</strong></th>
																<td><?php echo $emp['joining'] ?></td>
															</tr>
															</thead>
															<tbody>

															</tbody>
														</table>
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
		</div>
		<div class="row">
			<div class="col-lg-12 pt-3 pr-3">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h6>Salary Details</h6>
						<div>
							<div style="margin-left: 20px;">
								<hr/>
								<table class="table-hover">
									<thead>
									<tr>
										<td class="p-3 pr-5 ">Date of Birth</td>
										<td><?php echo $post['employee_type'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Gender</td>
										<td><?php echo $post['basic_salary'] ?></td>

									</tr>


									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 pt-3 ">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h6>Allownance</h6>
						<div>
							<div style="margin-left: 20px;">
								<hr/>
								<table class="table-hover">
									<thead>
									<tr>
										<td class="p-3 pr-5 ">House Rent</td>
										<td><?php echo $post['house_rent'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Medicall Allowance</td>
										<td><?php echo $post['medical'] ?></td>

									</tr>
									<tr>
										<td class="p-3 pr-5 ">Fuel Allownace</td>
										<td><?php echo $post['fuel'] ?></td>

									</tr>
									<tr>
										<td class="p-3 pr-5 ">Special Allowance</td>
										<td><?php echo $post['special'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Phone Bill</td>
										<td><?php echo $post['phone_bill'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Other Allowance</td>
										<td><?php echo $post['other_allowance'] ?></td>
									</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 pt-3 pr-3 no-print">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h6>Total Salary Details</h6>
						<div>
							<div style="margin-left: 20px;">
								<hr/>
								<table class="table-hover">
									<thead>
									<tr>
										<td class="p-3 pr-5 ">Gross Salary</td>
										<td><?php echo $gross_salary =
													$post['basic_salary'] +
													$post['house_rent'] +
													$post['fuel'] +
													$post['medical'] +
													$post['special'] +
													$post['phone_bill'] +
													$post['other_allowance'] ?>
										</td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Total Deduction</td>
										<td><?php echo $total_deduction =
													$post['tax_deduction'] +
													$post['provident_fund'] +
													$post['other_deduction'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Net Salay</td>
										<td><?php echo $gross_salary - $total_deduction ?></td>

									</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">

			<div class="col-lg-6 pt-3">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h6>Deductions</h6>
						<div>
							<div style="margin-left: 20px;">
								<hr/>
								<table class="table-hover">
									<thead>
									<tr>
										<td class="p-3 pr-5 ">Provident Fund</td>
										<td><?php echo $post['provident_fund'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Tax Deduction</td>
										<td><?php echo $post['tax_deduction'] ?></td>

									</tr>
									<tr>
										<td class="p-3 pr-5 ">Other Deduction</td>
										<td><?php echo $post['other_deduction'] ?></td>

									</tr>

									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
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
		doc.save('<?php echo base_url('view_employee.pdf')?>');
	});

</script>
