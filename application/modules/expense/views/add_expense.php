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
						<h4>Expense_Managment</h4>
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
							<?php echo form_open_multipart('expense/insert_expense') ?>
							<input type="hidden" name="id" value="<?php if (!empty($post)) {
								echo $post['id'];
							} ?>">
							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Item Name<span>*</span></label>
								<div class="col-sm-6">
									<input name="item_name" type="text"
										   value=""
										   placeholder=""
										   class="form-control">

								</div>
							</div>
							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Purchased Form<span>*</span></label>

								<div class="col-sm-6">
									<input name="purchase_form" type="text"
										   value=""
										   placeholder=""
										   class="form-control">
								</div>
							</div>
							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Purchased Date<span>*</span></label>

								<div class="col-sm-6">
									<input name="purchase_date" type="date"
										   value=""
										   placeholder=""
										   class="form-control">
								</div>
							</div>
							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Amount spent<span>*</span></label>

								<div class="col-sm-6">
									<input name="amount_spent" type="number"
										   value=""
										   placeholder=""
										   class="form-control">
								</div>
							</div>
							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Employee Name<span>*</span></label>

								<div class="col-sm-6">
									<select type="" name="employee_name"
											class="form-control"
											onchange='load_new_content()'
											name="department" id='designation'>
										<?php foreach ($emp as $employee): ?>
										<option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?>
											<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group row ">
								<label class="col-sm-2 col-form-label">Employee Name<span>*</span></label>

								<div class="col-sm-6">
									<input name="bill_copy" type="file" style="border: hidden"
										   value=""
										   placeholder=""
										   class="form-control">
								</div>
							</div>

							<button type="submit" class="btn btn-info " style="margin-left: 120px;">SAVE</button>
							<?php echo form_close(); ?>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>
