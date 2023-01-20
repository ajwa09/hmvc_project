<div class="container pt-5" style="font-family: SansSerif; font-size: 15px">
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
					<?php echo form_open('payroll/payslip_table') ?>
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
														name='designation' id='designation' class="form-control"
														required id="">
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
											<label class="col-sm-4 pl-5 col-form-label">Select month<span
														style="color: red">*</span></label>
											<div class="col-sm-6">
												<input type="date" name="date" required
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
	<?php if (!empty($flag))?>
</div>
