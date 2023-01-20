<div class="container-fluid p-5" style="font-family: SansSerif; font-size: 15px">
	<!-- Page-header start -->
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title p-3">
					<div class="d-inline">
						<h4>Employee Salary List</h4>
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
				List of Employee and their Salaries
			</h3>
		</div>
		<table class="table table-bordered">
			<thead class="">
			<tr>
				<th>ID</th>
				<th>Full Name</th>
				<th>Gross Salary</th>
				<th>Deductions</th>
				<th>Net Salary</th>
				<th>Employee Type</th>
				<th>Details</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($posts as $post): ?>
				<tr>
					<td><?php echo $post['id']; ?></td>
					<td><?php echo $post['employee']; ?></td>
					<td><?php echo $gross_salary =
					 $post['basic_salary'] +
					$post['house_rent'] +
					 $post['fuel'] +
					 $post['medical'] +
					 $post['special'] +
					  $post['phone_bill'] +
					   $post['other_allowance'] ?>
					</td>
					<td><?php echo $total_deduction =
								$post['tax_deduction'] +
								$post['provident_fund'] +
								$post['other_deduction'] ?>
					</td>
					<td><?php echo $gross_salary - $total_deduction ?></td>
					<td><?php echo $post['employee_type']; ?></td>

					<td>
						<a class="btn btn-primary btn-sm edit pull-left " style="margin-right: 10px;"
						   href="<?php echo base_url(); ?>payroll/view_salary_deatails/<?php echo $post['id'] ?>">view</a>
					</td>
					<td>
						<a class="btn btn-success btn-sm edit pull-left " style="margin-right: 10px;"
						   href="<?php echo base_url(); ?>payroll/fetch_salary_payroll/<?php echo $post['id'] ?>">Edit</a>
						<!--delete btn-->
						<!--						<a class="btn btn-sm btn-danger del" style="margin-right: 10px; "-->
						<!--						   href="-->
						<?php //echo  base_url(); ?><!--notice_board/delete_notice/-->
						<?php //echo $post['id']?><!--"> Delete</a>-->
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
