<div class="container-fluid p-2">
	<div class="row">
		<div class="col-md-3">
			<div class="card card-outline card-info">
				<div class="card-header">
					<h3 class="card-title">
						Manage Salary Details
					</h3>
				</div>
				<div class="card-body">
					<div>
						<?php echo form_open('payroll/payment_history') ?>
						<?php foreach ($post as $row): ?>
							<div class="form-group">
								<input name="employee" type="hidden" value="<?php if (!empty($row)) {
									echo $row['employee'];
								} ?>">
								<input name="id" type="hidden" value="<?php if (!empty($row)) {
									echo $row['id'];
								} ?>">
								<label for="">Gross Salary<span style="color: red">*</span></label>
								<input name="gross_salary" type="hidden" value="<?php if (!empty($row)) {
									echo $row['gross_salary'];
								} ?>">
								<input type="number" name="gross_salary" id="total" readonly
									   value="<?php if (!empty($row)) {
										   echo $gross_salary = $row['basic_salary'] + $row['house_rent'] + $row['fuel'] + $row['medical'] + $row['special'] + $row['phone_bill'] + $row['other_allowance'];
									   } ?>"
									   class="form-control">
							</div>
							<div class="form-group">
								<label for="">Total Deduction<span style="color: red">*</span></label>
								<input name="total_deduction" type="hidden" value="<?php if (!empty($row)) {
									echo $row['total_deduction'];
								} ?>">
								<input type="number" name="total_deduction" id="deduc" readonly
									   value="<?php if (!empty($row)) {
										   echo $total_deduction = $row['tax_deduction'] + $row['provident_fund'] + $row['other_deduction'];
									   } ?>"
									   class="form-control">
							</div>
							<div class="form-group">
								<label for="">Nat Salary<span style="color: red">*</span></label>
								<input type="number" name="net_salary" id="net_salary" readonly
									   value="<?php if (!empty($row)) {
										   echo $gross_salary - $total_deduction;
									   } ?>"
									   class="form-control">
							</div>
						<?php endforeach; ?>
					</div>

					<div class="form-group">
						<label for="">Payment Amount<span style="color: red">*</span></label>
						<input type="number" name="net_salary" id="net_salary" readonly
							   value="<?php if (!empty($row)) {
								   echo $gross_salary - $total_deduction;
							   } ?>"
							   class="form-control">
					</div>

					<div>
						<div class="form-group">
							<label for="">Fine Deduction<span style="color: red">*</span></label>
							<input type="number" name="fine_deduction" class="form-control">
							<input type="hidden" name="date" value="
							<?php $today = date("m.d.y");
							echo $today ?>" readonly="readonly">
						</div>
						<div class="form-group">
							<label for="">Payment Type<span style="color: red">*</span></label>
							<select class="form-control" name="payment_type">
								<option>Select Payment Type</option>
								<option>cash Payment</option>
								<option>Cheque Payment</option>
								<option>Bank Account</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Comment<span style="color: red">*</span></label>
							<input type="text" name="comment"
								   class="form-control">
						</div>
						<div class="card-footer col-sm-12">
							<button type="submit" class="btn btn-info btn-block">Save</button>
						</div>
					</div>
					<?php form_close() ?>
				</div>

			</div>
		</div>
		<div class="col-md-9">
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

						<th>Payment Date</th>
						<th>Gross Salary</th>
						<th>Deductions</th>
						<th>Net Salary</th>
						<th>Fine Deduction</th>
						<th>Payment Type</th>
						<th>Comment</th>
						<th>Details</th>
					</tr>
					</thead>
					<tbody>

					<tr>
						<?php foreach ($posts as $row): ?>
							<td><?php echo date('Y-m-d') ?></td>
							<td><?php echo $row['gross_salary']  ?></td>
							<td><?php echo $row['total_deduction'] ?></td>

							<td><?php echo $row['net_salary'] ?></td>
							<td><?php echo $row['fine_deduction']?></td>
							<td><?php echo $row['payment_type']?></td>
							<td><?php echo $row['comment']?></td>


							<td>
								<a class="btn btn-primary btn-sm edit pull-left " style="margin-right: 10px;"
								   href="<?php echo base_url(); ?>payroll/view_salary_deatails/<?php echo $row['id'] ?>">view</a>
							</td>
						<?php endforeach; ?>
					</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

