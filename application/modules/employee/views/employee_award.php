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

					<!-- /.card-header -->
					<!-- form start -->
					<div class="card-body">
						<h6>Add New Award to Employee</h6>

						<div class="row">
							<div class="col-md-12 pt-4">
								<div class="wrap-fpanel">

									<form method="post" action="">
										<div class="card-block p-5">
											<!--										--><?php //echo form_open('department/insert') ?>
											<input name="id" type="hidden" ">
											<div class="form-group row">
												<label class="col-sm-2 ">Select
													Designation<span>*</span></label>
												<div class="col-sm-6 ">
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
														   class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Gift Item<span>*</span></label>


												<div class="col-sm-6">
													<input name="gift" type="text"
														   class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Award
													Amount<span>*</span></label>


												<div class="col-sm-6">
													<input name="award_amount" type="number"
														   class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Select
													Month<span>*</span></label>
												<div class="col-sm-6">
													<input name="month" type="date"
														   class="form-control">
												</div>
											</div>

											<button class="btn btn-info ml-3" style="background:#01a9ac;  ">Save
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<section>
		<div class="card card-outline card-info p-3">
			<div class="card-header">
				<h3 class="card-title">
					Employee List
				</h3>
			</div>
			<table class="table table-bordered">
				<thead>
				<tr>
<!--					<th>EMP ID</th>-->
					<th>Sr.</th>
					<th>Award Name</th>
					<th>Gift</th>
					<th>Award amount</th>
					<th>Month</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($posts as $post): ?>
					<tr>
<!--						<td>--><?php //echo $post['designation']; ?><!--</td>-->
						<td><?php echo $post['id']; ?></td>
						<td><?php echo $post['award_name']; ?></td>
						<td><?php echo $post['gift']; ?></td>
						<td><?php echo $post['award_amount']; ?></td>
						<td><?php echo $post['month']; ?></td>


						<td>
							<a class="btn btn-primary btn-sm edit pull-left " style="margin-right: 10px;"
							   href="<?php echo base_url(); ?>employee/fetch_award/<?php echo $post['id'] ?>">Edit</a>
							<!--delete btn-->
							<a class="btn btn-sm btn-danger del" style="margin-right: 10px; "
							   href="<?php echo base_url(); ?>employee/delete_award_employee/<?php echo $post['id'] ?>">
								Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>
</div>
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

