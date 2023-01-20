<section class="content pt-4">
	<div class="container" style="font-family: SansSerif; font-size: 15px">
		<div class="row">

			<!-- left column -->
			<div class="col-md-12">

				<!-- general form elements -->
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Employee Award
						</h3>
					</div>
					<?php echo form_open('employee/update_award') ?>
					<!-- /.card-header -->
					<!-- form start -->
					<div class="card-body">
						<h6>Add New Award to Employee</h6>

						<div class="row">
							<div class="col-md-12 pt-4">
								<div class="wrap-fpanel">

									<div class="card-block p-5">

										<div class="form-group row">
											<input name="id" type="hidden"
												   value="<?php if (!empty($post)) {
													   echo $post['id'];
												   } ?>" class=" form-control">
											<label style="padding-right: 49px;">Select
												Designation<span>*</span></label>
											<div class="col-sm-6">
												<select type="" onchange='load_new_content()'
														name='designation' id='designation'
														class="form-control">
													<?php foreach ($dept as $item): ?>
														<?php echo $item['id']; ?>">
														<?php foreach ($desig as $post):
															?>
															<option name="designation" value="<?php echo $post['id']; ?>"><?php echo $post['designation']; ?></option>
														<?php endforeach; ?>
													<?php endforeach; ?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Employee<span>*</span></label>
											<div class="col-sm-6">
												<select class="form-control" name="employee" id="name">
													<option>Select option</option>

												</select>

											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Award Name<span>*</span></label>
											<div class="col-sm-6">
												<input name="award_name" type="text"
													   value="<?php if (!empty($post)) {
														   echo $post['award_name'];
													   } ?>" class=" form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Gift Item<span>*</span></label>


											<div class="col-sm-6">
												<input name="gift" type="text" value="<?php if (!empty($post)) {
													echo $post['gift'];
												} ?>"
													   class=" form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Award
												Amount<span>*</span></label>


											<div class="col-sm-6">
												<input name="award_amount" type="text"
													   value="<?php if (!empty($post)) {
														   echo $post['award_amount'];
													   } ?>"
													   class=" form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Select
												Month<span>*</span></label>
											<div class="col-sm-6">
												<input name="month" type="date" value="<?php if (!empty($post)) {
													echo $post['month'];
												} ?>" class=" form-control">
											</div>
										</div>

										<button class="btn btn-info ml-3" style="background:#01a9ac;  ">Save
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php form_close() ?>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function () {
		// everything here will be executed once index.html has finished loading, so at the start when the user is yet to do anything.
		$("#designation").change(load_new_content()); //this translates to: "when the element with id='designation' changes its value execute load_new_content() function"
	});

	function load_new_content() {
		var selected_option_value = $("#designation option:selected").val(); //get the value of the current selected option.

		$.post("<?php echo base_url('employee/option_award')?>", {option_value: selected_option_value},
			function (data) { //this will be executed once the `script_that_receives_value.php` ends its execution, `data` contains everything said script echoed.
				$("#name").html(data);
				// alert(data); //just to see what it returns
			}
		);
	}
</script>
