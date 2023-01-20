<div class="container">
<div class="pcoded-content ">
	<div class="pcoded-inner-content">
		<!-- Main-body start -->
		<div class="main-body">
			<div class="page-wrapper">
				<!-- Page-header start -->
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline p-5 ">
									<h4>Add Holiday</h4>
									<span >Add new holiday</span>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">

								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Page-header end -->

				<div class="page-body">
					<div class="row">
						<div class="col-md-12 pt-4">
							<div class="wrap-fpanel">

								<div class="card" data-collapsed="0">
									<div class="card-header">
										<div class="panel-title">
											<strong>Add Holiday</strong>
										</div>
									</div>

									<div class="card-block p-3">
										<?php echo form_open('settings/holiday')?>
<!--										<form id="form" action="settings/add_holiday" method="post" class="">-->
											<input name="id" type="hidden"
												value="<?php if (!empty($post)) {echo $post['id'];} ?>"
											>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label" >Event Name</label>
												<div class="col-sm-10">
													<input name="name" type="text" value="<?php
													if (!empty($post)) { echo $post['name'];} ?>"
														   placeholder="Enter Your Event Name"
														   class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Description</label>
												<div class="col-sm-10">
                                    <textarea style="height: 100px" name="description" class="form-control" id="field-1"
											  placeholder="Enter Your Description"><?php
										if (!empty($post)) { echo $post['description'];} ?></textarea>
												</div>
											</div>


											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Start Date</label>
												<div class="col-sm-10">
													<input type="date" class="form-control datepicker" name="start_date"value="<?php
													if (!empty($post)) { echo $post['start_date'];} ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">End Date</label>
												<div class="col-sm-10">
													<input type="date" class="form-control datepicker" name="end_date" value="<?php
													if (!empty($post)) { echo $post['end_date'];} ?>">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-2 col-form-label"></label>
												<div class="col-sm-10">
													<button type="submit" id="sbtn"
															class="btn btn-primary">Save</button>

												</div>
											</div>
										<?php echo form_close(); ?>
									</div>

								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
		<div id="styleSelector">

		</div>
	</div>
</div>
</div>
