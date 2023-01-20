<div class="container p-4">
	<!-- Page-header start -->
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title p-3">
					<div class="d-inline">
						<h4>Department</h4>
						<span>All Departments</span>
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
			<div class="card card-border-primary p-3">
					<div class="card-block">
						<?php foreach ($dept as $item): ?>
							<div class="row pb-3">
							<div class="col-md-10">
								<h5 style="font-weight: bold">
									<?php echo $item['department']; ?>
								</h5>
							</div>
							<div class="col-md-2">
								<a class="btn btn-primary btn-sm edit" href="<?php echo  base_url(); ?>department/edit_depts/<?php echo $item['id']?>"
								   style="margin-right: 9px; width: 50px" id="">Edit</a>
								<a class="btn btn-sm btn-danger del" style="" href="<?php echo  base_url(); ?>department/delete_data/<?php echo $item['id']?>">Delete</a>
							</div>
						</div>

						<table class="table-bordered table">


							<thead>

							<tr>
								<th>Sr</th>
								<th>Category</th>

							</tr>
							</thead>
							<?php foreach ($desig as $row): ?>
								<?php if ($item['id'] == $row['department_id']): ?>
									<tbody>
									<tr>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['designation']; ?></td>
									</tr

									</tbody>
								<?php endif; ?>
							<?php endforeach; ?>
						</table>
						<?php endforeach; ?>
					</div>

			</div>
		</div>
	</div>
</div>
</div>

