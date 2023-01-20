<style>
	#color:hover {
		color: #01a9ac;
	}
</style>
<?php echo form_open('attendance/insert_attendance') ?>
<div class="container p-4">
	<!-- Page-header start -->
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title p-3">
					<div class="d-inline">
						<h4>Attendeance</h4>
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
				<div class=" card-outline card-info">

					<div class="card" data-collapsed="0">


						<div class="card-block p-5">
<!---->			<input  id="id" type="hidden" value="">
<!--							<input name="attendance[--><?php //echo $key ?><!--][attendance_id]" type="text" value="--><?php //echo $employee['attendance_id'] ?><!--">-->

							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Select Day<span>*</span></label>

								<div class="col-sm-6">
									<input  id="date" type="date" value="<?php echo date('Y-m-j')?>"
										   placeholder=""
										   class="form-control" required>
								</div>
							</div>
							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Department<span>*</span></label>
								<div class="col-sm-6">
									<select type="" name="department"
											class="form-control"
											onchange='load_new_content()'
											name="department" id='designation'>
										<?php foreach ($dept as $item): ?>
										<option value="<?php echo $item['id']; ?>"><?php echo $item['department']; ?>
											<?php endforeach; ?>
									</select>

								</div>

							</div>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="card-outline card-info">
		<div class="card p-3">
			<div class="card-block p-1 pt-3">
				<table class="table table-bordered ">
					<thead>
					<tr>
						<th>Employee Name</th>
						<th>Designation</th>
						<th>
							<div class="border-checkbox-section">
								<div class="border-checkbox-group border-checkbox-group-primary">
									<input class="border-checkbox select_one" type="checkbox"
										   name="present" id="select-all">
									<label class="border-checkbox-label"
									>Attendance</label>
								</div>
							</div>
						</th>
						<th>

							<div class="border-checkbox-section">
								<div class="border-checkbox-group border-checkbox-group-primary">
									<input class="border-checkbox select_one" type="radio">
									<label class="border-checkbox-label"
									>Leave
										Category</label>
								</div>
							</div>
						</th>
					</tr>
					</thead>
					<tbody id="name">

					</tbody>

				</table>
				<div class="form-group">
					<div class="col-sm-offset-11">
						<button type="submit" id="sbtn" class="btn btn-primary pull-right">Update</button>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
<?php echo form_close(); ?>
<script>
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

	// select all check box
	$('#select-all').click(function(event) {
		if(this.checked) {
			// Iterate each checkbox
			$(':checkbox').each(function() {
				this.checked = true;
			});
		} else {
			$(':checkbox').each(function() {
				this.checked = false;
			});
		}
	});
</script>

