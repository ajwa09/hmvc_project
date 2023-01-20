<div class="container p-4">
	<!-- Page-header start -->
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title p-3">
					<div class="d-inline">
						<h4>Leave Category List</h4>
						<span></span>
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
		<div class="col-md-12">

			<div class="row">
				<div class="col-md-4">

					<div class="card card-border-primary p-2">
						<div class="card-header"><h5>Add Category</h5></div>
						<div class="card-block">
							<?php echo form_open_multipart('settings/leave_category'); ?>
							<form action="settings/leave_category" method="post">

								<input type="hidden" name="id">

								<input required name="category" type="text" class="form-control"
									   placeholder="Enter Category Name">
								<button class="btn btn-sm btn-primary mt-3">Save</button>
							<?php echo form_close();?>
						</div>
					</div>

				</div>
				<div class="col-md-8">
					<div class="card card-border-primary p-3">
						<div class="card-header"><h5>Category List</h5></div>
						<div class="card-block">
							<table CLASS="table-bordered table">
								<thead>
								<tr>
									<th>Sr</th>
									<th>Category</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody id="table">
								<?php foreach ($posts as $post): ?>
									<tr>
										<td><?php echo $post['id']; ?></td>
										<td><?php echo $post['category']; ?></td>
										<td>
											<a class="btn btn-primary edit pull-left " style="margin-right: 10px;"
											   id="<?php echo $post['id']; ?>">Edit</a>
											<!--delete btn-->
											<a class="btn btn-sm btn-danger del" style="margin-right: 10px; "
											    href="<?php echo  base_url(); ?>settings/delete_category/<?php echo $post['id']?>"> Delete</a>
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
	</div>
</div>

