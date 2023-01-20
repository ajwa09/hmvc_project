<style>
	#color:hover {
		color: #01a9ac;
	}
</style>
<div class="container p-4">
	<!-- Page-header start -->
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title p-3">
					<div class="d-inline">
						<h4>Add Department</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="page-header-breadcrumb">
					<ul class="breadcrumb-title">

						<!--						<li class="breadcrumb-item">Widget</a></li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Page-header end -->
	<div class="row">
		<div class="col-md-12 pt-4">
			<div class="wrap-fpanel">

				<div class="card" data-collapsed="0">


					<div class="card-block p-5">
						<?php echo form_open('department/insert') ?>
						<input name="id" type="hidden" value="<?php if (!empty($dept)) {echo $dept['id'];} ?>">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Add department<span>*</span></label>


							<div class="col-sm-6">
								<input name="department" type="text" value="<?php
								if (!empty($dept)) { echo $dept['department'];} ?>"
									   placeholder="Enter Your department Name"
									   class="form-control">
							</div>
						</div>
						<!--						----------------------------->

						<?php
						if (!empty($desig)) {


							foreach ($desig as $row): ?>

								<input type="hidden" name="designation_id[]" value="<?php echo $row['id']; ?>">

								<div class="form-group row ">

									<label class="col-sm-2 col-form-label">Add Designtion<span>*</span></label>

									<div class="col-sm-6">
										<input name="designation[]" type="text"
											   value="<?php echo $row['designation']; ?>"
											   placeholder="Enter Your designation"
											   class="form-control">
									</div>
									<!--							----------------------->
									<div class="col-sm-4">
										<a class="btn btn-sm btn-danger del" style="" href="<?php echo  base_url(); ?>department/delete_designation/<?php echo $row['id']?>">Delete</a>

									</div>
								</div>
							<?php endforeach;
						} else {
							?>


							<div class="form-group row ">

								<label class="col-sm-2 col-form-label">Add Designtion<span>*</span></label>

								<div class="col-sm-6">
									<input name="designation[]" type="text" value=""
										   placeholder="Enter Your designation"
										   class="form-control">
								</div>
							</div>
							<?php
						} ?>
						<div class="col-sm-4">
							<button class="btn  btn ml-3 add_field_button " id="color"
									style="font-size: 16px; font-weight: bold ">+ Add More
							</button>
						</div>
						<div class="row input_fields_wrap">

						</div>
						<button class="btn btn-primary ml-3" style="background:#01a9ac;  ">Save</button>


						<?php echo form_close(); ?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		var max_fields = 10; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap"); //Fields wrapper
		var add_button = $(".add_field_button"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function (e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('' +
					'<div class="col-md-12">' +
					'<div class="form-group row mt-3 ml-1">' +
					'<div class="col-sm-4">' +
					'<label class=" form-label input-group ">Add Designtion<span>*</span></label>' +
					'</div>' +
					'<div class="col-sm-6">' +
					'<input name="designation[]" type="text" value="" placeholder="Enter Your designation" class="form-control">' +
					'</div>' +
					'<div class="col-sm-2">' +
					'<button class="btn  btn ml-3 remove_field" id="color" style="font-size: 16px; font-weight: bold ">Remove</button><br>' +
					'</div>' +
					'</div>' +
					'</div>'); //add input box
			}
		});

		$(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
			e.preventDefault();
			$(this).parent('div').parent('div').remove();
			x--;
		})
	});

	// delete

</script>
