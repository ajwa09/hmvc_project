<div class="container ">
	<div class="col-md-12">
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title p-3">
						<div class="d-inline">
							<h4></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card card-outline card-info p-3">
			<div class="card-header">
				<h3 class="card-title">
					Payment History
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
					<th>Status</th>

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


						<td>
							<a  style="margin-right: 10px;"
							   href="<?php echo base_url(); ?>payroll/payslippdf/<?php echo $post['id'] ?>">Generate Payslip</a>
						</td>

					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
