<div class="container-fluid p-5" style="font-family: SansSerif; font-size: 15px">
	<!-- Page-header start -->
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title p-3">
					<div class="d-inline">
						<h4>Employee</h4>
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
	<div class="card card-outline card-info p-3">
		<div class="card-header">
			<h3 class="card-title">
				Employee List
			</h3>
		</div>
		<table class="table table-bordered">
			<thead>
			<tr>
				<th>EMP ID</th>
				<th>EMPLOYEE</th>
				<th>Dept.>Designation</th>
				<th>MOBILE</th>
				<th>Status</th>
				<th>View</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($posts as $post): ?>
				<tr>
					<td><?php echo $post['emp_id']; ?></td>
					<td><?php echo $post['name']; ?></td>
					<td><?php echo $post['department']; ?> <b> => </b> <?php echo $post['designation']; ?></td>
					<td><?php echo $post['mobile']; ?></td>
					<td class="text-center"><?php
						if ($post['status'] == 1) {
							echo '<span class="label label-success">Active</span>';
						} else {
							echo '<span class="label label-danger">Deactive</span>';
						}
						?></td>


					<td><a class="btn btn-primary btn-sm edit pull-left " style="margin-right: 10px;"
						   href="<?php echo base_url(); ?>employee/view_employee/<?php echo $post['id'] ?>">view</a>
					</td>
					<td>
						<a class="btn btn-primary btn-sm edit pull-left " style="margin-right: 10px;"
						   href="<?php echo base_url(); ?>employee/get_employee/<?php echo $post['id'] ?>">Edit</a>
						<!--delete btn-->
						<a class="btn btn-sm btn-danger del" style="margin-right: 10px; "
						   href="<?php echo base_url(); ?>employee/delete_emp/<?php echo $post['id'] ?>"> Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
