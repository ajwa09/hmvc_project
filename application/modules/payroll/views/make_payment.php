<div class="container-fluid p-5" style="font-family: SansSerif; font-size: 15px">
	<section class="content ">

		<div class="row">

			<!-- left column -->
			<div class="col-md-12">

				<!-- general form elements -->
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Manage Salary Details
						</h3>
					</div>
					<?php echo form_open('payroll/view_payment_details') ?>
					<div class="card-body">
						<h6></h6>

						<div class="row">
							<div class="col-md-12 pt-4">
								<div class="wrap-fpanel">

									<!--									<form method="post">-->
									<div class="card-block p-3">
										<input name="id" type="hidden" value="<?php if (!empty($row)) {
											echo $row['id'];
										} ?>">
										<input name="employee" type="hidden" value="<?php if (!empty($row)) {
											echo $row['employee'];
										} ?>">
										<div class="form-group row">
											<label class="col-sm-4 pl-5 ">Select
												Designation<span>*</span></label>
											<div class="col-sm-6 ">
												<select type="" onchange='load_new_content()'
														name='designation' id='designation' class="form-control" required id="">
													<option>Select option</option>
													<?php foreach ($dept as $item): ?>
													<optgroup style="font-size: 20px"
															  label="<?php echo $item['department']; ?>">

														<?php foreach ($desig as $post):
															if ($post['department_id'] == $item['id']): ?>
																<option value="<?php if (!empty($post)) {
																	echo $post['id'];
																} ?>"><?php if (!empty($post)) {
																		echo $post['designation'];
																	} ?></option>
																</optgroup>
															<?php endif; endforeach; ?>
													<?php endforeach; ?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 pl-5 col-form-label">Employee<span>*</span></label>
											<div class="col-sm-6">
												<select class="form-control" name="employee" id="name" required
														value="<?php if (!empty($row)) {
															echo $row['employee'];
														} ?>">
													<option>Select option</option>

												</select>

											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 pl-5 col-form-label">Select month<span
														style="color: red">*</span></label>
											<div class="col-sm-6">
												<input type="date" name="date"
													   class="form-control">
											</div>
										</div>
										<button type="submit" id="myButton" class="btn btn-info" name="sbtn">Go</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php form_close() ?>
				</div>
			</div>
		</div>

	</section>
	<?php if (!empty($flag)): ?>
	<div class="row">
		<div class="col-md-3">
			<div class="card card-outline card-info">
				<div class="card-header">
					<h3 class="card-title">
						Manage Salary Details
					</h3>
				</div>
				<div class="card-body">
					<div>
						<?php echo form_open('payroll/payment_history') ?>
						<?php foreach ($post as $row): ?>
							<div class="form-group">
								<input name="employee" type="hidden" value="<?php if (!empty($row)) {
									echo $row['employee'];
								} ?>">
								<label for="">Gross Salary<span style="color: red">*</span></label>
								<input name="gross_salary" type="hidden" value="<?php if (!empty($row)) {
									echo $row['gross_salary'];
								} ?>">
								<input type="number" name="gross_salary" id="total" readonly
									   value="<?php if (!empty($row)) {
										   echo $gross_salary = $row['basic_salary'] + $row['house_rent'] + $row['fuel'] + $row['medical'] + $row['special'] + $row['phone_bill'] + $row['other_allowance'];
									   } ?>"
									   class="form-control">
							</div>
							<div class="form-group">
								<label for="">Total Deduction<span style="color: red">*</span></label>
								<input name="total_deduction" type="hidden" value="<?php if (!empty($row)) {
									echo $row['total_deduction'];
								} ?>">
								<input type="number" name="total_deduction" id="deduc" readonly
									   value="<?php if (!empty($row)) {
										   echo $total_deduction = $row['tax_deduction'] + $row['provident_fund'] + $row['other_deduction'];
									   } ?>"
									   class="form-control">
							</div>
							<div class="form-group">
								<label for="">Nat Salary<span style="color: red">*</span></label>
								<input type="number" name="net_salary" id="net_salary" readonly
									   value="<?php if (!empty($gross)) {
										   echo $gross_salary - $total_deduction;
									   } ?>"
									   class="form-control">
							</div>
						<?php endforeach; ?>
					</div>

					<div class="form-group">
						<label for="">Payment Amount<span style="color: red">*</span></label>
						<input type="number" name="net_salary" id="net_salary" readonly
							   value="<?php if (!empty($gross)) {
								   echo $gross_salary - $total_deduction;
							   } ?>"
							   class="form-control">
					</div>

					<div>
						<div class="form-group">
							<label for="">Fine Deduction<span style="color: red">*</span></label>
							<input type="number" name="fine_deduction" class="form-control">
							<input type="hidden" name="date" value="
							<?php $today = date("m.d.y");
							echo $today ?>" readonly="readonly">
						</div>
						<div class="form-group">
							<label for="">Payment Type<span style="color: red">*</span></label>
							<select class="form-control" name="payment_type">
								<option>Select Payment Type</option>
								<option>cash Payment</option>
								<option>Cheque Payment</option>
								<option>Bank Account</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Comment<span style="color: red">*</span></label>
							<input type="text" name="comment"
								   class="form-control">
						</div>
						<div class="card-footer col-sm-12">
							<button type="submit" class="btn btn-info btn-block">Save</button>
						</div>
					</div>
					<?php form_close() ?>
				</div>

			</div>
		</div>
		<div class="col-md-9">
			<div class="page-header">
				<div class="row align-items-end">
					<div class="col-lg-8">
						<div class="page-header-title p-3">
							<div class="d-inline">
								<h4></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card card-outline card-info p-3">
				<div class="card-header">
					<h3 class="card-title">
						Payment History
					</h3>
				</div>
				<table class="table table-bordered">
					<thead class="">
					<tr>

						<th>Payment Date</th>
						<th>Gross Salary</th>
						<th>Deductions</th>
						<th>Net Salary</th>
						<th>Fine Deduction</th>
						<th>Payment Type</th>
						<th>Comment</th>
						<th>Details</th>
					</tr>
					</thead>
					<tbody>

					<tr>
						<?php foreach ($posts as $row): ?>
							<td><?php echo $row['date'] ?></td>
							<td><?php echo $row['gross_salary']  ?></td>
							<td><?php echo $row['total_deduction'] ?></td>

							<td><?php echo $row['net_salary'] ?></td>
							<td><?php echo $row['fine_deduction']?></td>
							<td><?php echo $row['payment_type']?></td>
							<td><?php echo $row['comment']?></td>


							<td>
								<a class="btn btn-primary btn-sm edit pull-left " style="margin-right: 10px;"
								   href="<?php echo base_url(); ?>payroll/view_salary_deatails/<?php echo $row['id'] ?>">view</a>
							</td>
						<?php endforeach; ?>
					</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php endif;?>
</div>
<script>
	$(document).ready(function () {
		$("#designation").change(load_new_content()); //this translates to: "when the element with id='designation' changes its value execute load_new_content() function"
	});

	function load_new_content() {
		var selected_option_value = $("#designation option:selected").val();

		$.post("<?php echo base_url('payroll/option_award')?>", {option_value: selected_option_value},
			function (data) {
				$("#name").html(data);
			}
		);
	}

</script>
