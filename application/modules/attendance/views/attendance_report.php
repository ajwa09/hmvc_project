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
							<?php echo form_open('attendance/general') ?>
							<input name="id" type="hidden" value="">
							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Department<span>*</span></label>
								<div class="col-sm-6">
									<select type="" name="department
"
											class="form-control"
											onchange='load_new_content()'
											name='select1' id='designation'>
										<?php foreach ($dept

										as $item): ?>
										<option value="<?php echo $item['id']; ?>"><?php echo $item['department']; ?>
											<?php endforeach; ?>
									</select>

								</div>
							</div>
							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Select Day<span>*</span></label>

								<div class="col-sm-6">
									<input name="date" id="date" onchange='load_new_content()' type="date"
										   value="<?php echo $date = date('Y-m-j');?>"
										   placeholder=""
										   class="form-control">
								</div>
							</div>

							<?php echo form_close(); ?>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
	<div id="name">
	</div>
</div>

<script>
	$(document).ready(function () {

		$("#designation").change(load_new_content());
	});

	function load_new_content() {
		var selected_option_value = $("#designation option:selected").val();
		var att_date = $("#date").val();

		$.post("<?php echo base_url('attendance/join_attendance_tbl')?>", {
				option_value: selected_option_value,
				date: att_date
			},
			function (data) {
				$("#name").html(data);

			}
		);
	}
</script>

