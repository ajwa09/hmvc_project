<div class="main-body container">
	<div class="page-wrapper">
		<!-- Page-header start -->
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title pt-4 pb-4">
						<div class="d-inline ">
							<h4>Personal Event</h4>
							<span>Personal Event</span>
						</div>
					</div>
				</div>
				<div class="col-lg-4">

				</div>

			</div>
		</div>

		<div class="col-md-12">
			<div class="card card-border-primary p-3">
				<div class="row">
					<div class="col-lg-10">
						<div class="card-header">
							<h5>Event List</h5>
						</div>
					</div>
					<div class="col-lg-2 p-2" >
						<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default">
							Add Event
						</button>
					</div>
				</div>


				<div class="card-block">
					<table class="table table-bordered">

						<thead>
						<tr>
							<th>Sr</th>
							<th>Event Name</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($posts as $post): ?>
						<tr>
						<td> <?php echo $post['id']?></td>
						<td><?php echo $post['event']?></td>
						<td><?php echo $post['start_date']?></td>
						<td><?php echo $post['end_date']?></td>
						<td class="text-center">
							<div class="form-group" role="group">
								<a href="<?php echo  base_url(); ?>settings/event_delete/<?php echo $post['id']?>" type="" class="btn btn-danger btn-sm" title="Delete"></i> Delete</a>
							</div>
						</td>
						</tr>
						<?php endforeach; ?>
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!--model-->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<?php echo form_open_multipart('settings/add_event'); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Personal Event</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body p-3">

				<input type="hidden" name="id"  class="form-control" >

				<div class="form-group row">
					<label for="field-1" class="col-sm-3 control-label">Event Name<span
								class="required">*</span></label>
					<div class="col-sm-9">
						<input type="text" name="event" class="form-control" >
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label">Start Date<span class="required">*</span></label>
					<div class="input-group col-sm-9">
						<input type="date" value="2022-06-13" class="form-control datepicker"
							   id="apptStartTime" name="start_date" >

						<div class="input-group-addon col-sm-2" style="background: skyblue;">
							<a href="#"><i class="fa fa-calendar text-white p-2"  aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">End Date<span class="required">*</span></label>
					<div class="input-group col-sm-9">
						<input type="date" class="form-control datepicker"
							   id="apptStartTime" name="end_date">

						<div class="input-group-addon col-sm-2" style="background: skyblue;">
							<a href="#"><i class="fa fa-calendar text-white p-2"  aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>


			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</div>
		<?php echo form_close()?>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
