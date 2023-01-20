<style>
	@media print {
		.no-print {
			display: none;
		}
	}
</style>
<section class="content pt-4" id="htmlContent">
	<div class="container-fluid pt-3" style="font-family: SansSerif; font-size: 15px">

		<div class="card-body">
			<h4>Payslip</h4>
			<!---->
			<div class="row">
				<div class="col-md-12 pt-4">

					<div class="col-lg-12  col-sm-12">
						<div class="card card-outline card-info">
							<div class="card-body p-5">

								<div class="row">
									<div class="col-lg-4 col-sm-4">
										<div>
											<div style="margin: 20px;">
												<table class="table-hover">
													<!--															--><?php //foreach ($posts as $post): ?>
													<thead>

													<tr>
														<th><strong>Employee ID</strong></th>
														<td><?php echo $emp['emp_id'] ?></td>

													</tr>
													<tr>
														<th><strong class="pr-5">Mobile</strong></th>
														<td><?php echo $emp['mobile'] ?></td>

													</tr>
													<tr>
														<th><strong>Department</strong></th>
														<td><?php echo $emp['department'] ?></td>
													</tr>
													</thead>
													<tbody>

													</tbody>
												</table>
											</div>
										</div>
									</div>

									<div class="col-lg-4 col-sm-4">
										&nbsp;<div>
											<div style="margin: 20px;">
												<table class="table-hover">
													<!--															--><?php //foreach ($posts as $post): ?>
													<thead>

													<tr>
														<th><strong>Name</strong></th>
														<td><?php echo $emp['name'] ?></td>

													</tr>
													<tr>
														<th><strong class="">Email</strong></th>
														<td><?php echo $emp['email'] ?></td>

													</tr>
													<tr>
														<th><strong>Designation</strong></th>
														<td><?php echo $emp['designation'] ?></td>
													</tr>
													</thead>
													<tbody>

													</tbody>
												</table>
											</div>
										</div>
									</div>


									<div class="col-lg-4 col-sm-4 ">
										<div>
											<div style="margin: 20px;">
												<table class="table-hover">
													<!--											--><?php //foreach ($posts as $post): ?>
													<thead>

													<tr>
														<th><strong>payslip</strong></th>
														<!--													<th>-->
														<?php //echo $emp['payslip'] ?><!--</th>-->

													</tr>
													<tr>
														<th><strong class="pr-5">Address</strong></th>
														<td><?php echo $emp['address'] ?></td>

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
