<section>
	<?php echo form_open_multipart('payroll/insert_payroll') ?>
	<section class="content pt-4">
		<div class="container-fluid pl-5 pr-5" style="font-family: SansSerif; font-size: 15px">
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

						<div class="card-body">
							<h6></h6>

							<div class="row">
								<div class="col-md-12 pt-4">
									<div class="wrap-fpanel">

										<!--									<form method="post">-->
										<div class="card-block p-3">
											<!--										--><?php //echo form_open('department/insert') ?>
											<input name="id" type="hidden" value="<?php if (!empty($row)) {
												echo $row['id'];} ?>">
											<input name="employee" type="hidden" value="<?php if (!empty($row)) {
												echo $row['employee'];} ?>">
											<div class="form-group row">
												<label class="col-sm-4 pl-5 ">Select
													Designation<span>*</span></label>
												<div class="col-sm-6 ">
													<select type="" onchange='load_new_content()'
															name='designation' id='designation' class="form-control" id="">
														<option>Select option</option>
														<?php foreach ($dept as $item): ?>
														<optgroup style="font-size: 20px"
																  label="<?php echo $item['department']; ?>">

															<?php foreach ($desig as $post):
																if ($post['department_id'] == $item['id']): ?>
																<option value="<?php if (!empty($post)) {
																	echo $post['id'];} ?>"><?php if (!empty($post)) {
																		echo $post['designation'];} ?></option>
																</optgroup>
															<?php  endif; endforeach; ?>
														<?php endforeach; ?>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-4 pl-5 col-form-label">Employee<span>*</span></label>
												<div class="col-sm-6">
													<select class="form-control" name="employee" id="name"  value="<?php if (!empty($row)) {
														echo $row['employee'];} ?>">
														<option>Select option</option>

													</select>

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
	</section>
	<section class="content pt-4">
		<div class="container-fluid pl-5 pr-5" style="font-family: SansSerif; font-size: 15px">
			<div class="row">

				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card  ">

						<div class="card-body">
							<h6></h6>

							<div class="row">
								<div class="col-md-12 pt-4">
									<div class="wrap-fpanel">

										<!--									<form method="post">-->
										<div class="card-block p-3">
											<!--										--><?php //echo form_open('department/insert') ?>
											<div class="form-group row">
												<label class="col-sm-4 pl-5 ">EMPLOYEE
													TYPE<span>*</span></label>
												<div class="col-sm-6 ">
													<select type="" name="employee_type" class="form-control"  value="<?php if (!empty($row)) {
														echo $row['employee_type'];} ?>">
														<option></option>
														<option>Provision</option>
														<option>Permanent</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-4 pl-5 col-form-label">Basic
													Salary<span>*</span></label>
												<div class="col-sm-6">
													<input type="number" class="form-control" value="<?php if (!empty($row)) {
														echo $row['basic_salary'];} ?>" name="basic_salary">

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
	</section>
	<section class="content pt-4">
		<div class="container-fluid pl-5 pr-5" style="font-family: SansSerif; font-size: 15px">
			<div class="row">
				<div class="col-md-6">
					<div class="card card-outline card-info">
						<div class="card-header">
							<h3 class="card-title">
								Allowance
							</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="">House Rent Allowance<span style="color: red">*</span></label>
								<input type="number" name="house_rent"
									   value="<?php if (!empty($row)) {
										   echo $row['house_rent'];} ?>"
									   class="salary form-control" id="">
							</div>
							<div class="form-group">
								<label for="">Medical Allowance<span style="color: red">*</span></label>
								<input type="number" name="medical"
									   value="<?php if (!empty($row)) {
										   echo $row['medical'];} ?>"
									   class="salary form-control" id="">
							</div>
							<div class="form-group">
								<label for="">Special Allowance<span style="color: red">*</span></label>
								<input type="number" name="special"
									   value="<?php if (!empty($row)) {
										   echo $row['special'];} ?>"
									   class="salary form-control" id="">
							</div>
							<div class="form-group">
								<label for="">Fuel Allowance<span style="color: red">*</span></label>
								<input type="number" name="fuel"
									   value="<?php if (!empty($row)) {
										   echo $row['fuel'];} ?>"
									   class="salary form-control" id="">
							</div>
							<div class="form-group">
								<label for="">Phone Bill Allowance<span style="color: red">*</span></label>
								<input type="number" name="phone_bill"
									   value="<?php if (!empty($row)) {
										   echo $row['phone_bill'];} ?>"
									   class="salary form-control" id="">
							</div>
							<div class="form-group">
								<label for="">Other Allowance<span style="color: red">*</span></label>
								<input type="number" name="other_allowance"
									   value="<?php if (!empty($row)) {
										   echo $row['other_allowance'];} ?>"
									   class="salary form-control" id="">
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card card-outline card-info">
						<div class="card-header">
							<h3 class="card-title">
								Deduction
							</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="">Provident Fund<span style="color: red">*</span></label>
								<input type="number" name="provident_fund"
									   value="<?php if (!empty($row)) { echo $row['provident_fund'];
									   } ?>"
									   class="deduction form-control" id="">
							</div>
							<div class="form-group">
								<label for="">Tax Deduction<span style="color: red">*</span></label>
								<input type="number" name="tax_deduction"
									   value="<?php if (!empty($row)) {
										   echo $row['tax_deduction']; } ?>"
									   class="deduction form-control" id="">
							</div>
							<div class="form-group">
								<label for="">Other Deduction<span style="color: red">*</span></label>
								<input type="number" name="other_deduction"
									   value="<?php if (!empty($row)) {
										   echo $row['other_deduction']; } ?>"
									   class="deduction form-control" id="">
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Total Salary Details
						</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="">Gross Salary<span style="color: red">*</span></label>
							<input name="gross_salary" type="hidden" value="<?php if (!empty($row)) {
								echo $row['gross_salary'];} ?>">
							<input type="number" name="gross_salary" id="total" disabled
								   value="<?php if (!empty($row)) {
									   echo $gross_salary = $row['basic_salary'] + $row['house_rent'] + $row['fuel'] + $row['medical'] + $row['special'] + $row['phone_bill'] + $row['other_allowance'];} ?>"
								   class="form-control" >
						</div>
						<div class="form-group">
							<label for="">Total Deduction<span style="color: red">*</span></label>
							<input name="total_deduction" type="hidden" value="<?php if (!empty($row)) {
								echo $row['total_deduction'];} ?>">
							<input type="number" name="total_deduction" id="deduc" disabled
								   value="<?php if (!empty($row)) {
									   echo $total_deduction =  $row['tax_deduction'] + $row['provident_fund'] + $row['other_deduction'] ;} ?>"
								   class="form-control" >
						</div>
						<div class="form-group">
							<label for="">Nat Salary<span style="color: red">*</span></label>
							<input name="net_salary" type="hidden" value="<?php if (!empty($row)) {
								echo $row['net_salary'];} ?>">
							<input type="number" name="net_salary" id="net_salary" disabled
								   value="<?php if (!empty($gross)) {
									   echo $gross_salary - $total_deduction; } ?>"
								   class="form-control" >
						</div>

					</div>
				</div>
			</div>

		</div>
	</section>
	<div class="card-footer col-sm-12">
		<button type="submit" class="btn btn-info btn-block">Save</button>
	</div>
</section>
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

	$(document).on("change", function () {
		var sum = 0;
		var deduc = 0;
		$(".salary").each(function () {
			sum += +$(this).val();
		});

		$(".deduction").each(function () {
			deduc += +$(this).val();
		});
		var ctc = $("#ctc").val();

		$("#total").val(sum);
		$("#deduc").val(deduc);
		var net_salary = 0;
		net_salary = sum - deduc;
		$("#net_salary").val(net_salary);


	});
</script>
