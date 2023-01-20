<style>

	ul.holiday_navbar {
		background: rgba(60, 109, 132, 0.87);
	}

	.nav {
		padding-left: 0;
		margin-bottom: 0;
		list-style: none;
	}

	ul.holiday_navbar li {
		border-bottom: 1px solid #ffffff;
	}

	.nav > li {
		position: relative;
		display: block;
		width: 100%;
	}

	ul.holiday_navbar li a {
		color: #ffffff;
		font-size: 14px;
	}

	.nav > li > a {
		position: relative;
		display: block;
		padding: 10px 15px;
		text-decoration: none;
	}

	ul.holiday_navbar li a i {
		background: #816F95;
		padding: 15px;
		margin-top: -10px;
		margin-bottom: -10px;
		margin-left: -15px;
	}

	ul.holiday_navbar li a:hover, ul.holiday_navbar li.active, ul.holiday_navbar li a:focus {
		background: #816F95;
	}

	ul.holiday_navbar li.active:after {
		position: absolute;
		right: 0;
		top: 9px;
		border: 11px solid rgba(255, 255, 255, 0);
		border-right-color: #fff;
		content: '';
		width: 0;
		height: 0;
	}
</style>

<div class="container-fluid p-3 pt-5">
	<div hidden class="row">
		<?php if (empty($active_add_holiday)): ?>
			<div class="col-sm-3">
				<form id="existing_customer" action="<?php echo base_url() ?>admin/settings/holiday_list" method="post">
					<label for="field-1" class="control-label pull-left holiday-vertical"><strong>Year:</strong></label>
					<div class="col-sm-8">
						<input type="text" name="year" class="form-control years" value="<?php
						if (!empty($year)) {
							echo $year;
						}
						?>" data-format="yyyy">
					</div>
					<button type="submit" id="search_product" data-toggle="tooltip" data-placement="top" title="Search"
							class="btn btn-custom pull-right">
						<i class="fa fa-search"></i></button>
				</form>
			</div>
		<?php endif; ?>
	</div>
	<div class="row">
		<div class="col-md-3">
			<ul class="nav holiday_navbar">
				<?php
				foreach ($all_holiday_list as $key => $v_holiday_list):
					$year = date('Y');
					$month_name = date('F', strtotime($year . '-' . $key)); // get full name of month by date query
					?>
					<li class="<?php
					if ($current_month == $key) {
						echo 'active';
					}
					?>">
						<a aria-expanded="<?php
						if ($current_month == $key) {
							echo 'true';
						} else {
							echo 'false';
						}
						?>" data-toggle="tab" href="#<?php echo $month_name ?>">
							<i class="fa fa-calendar"></i> <?php echo $month_name; ?> </a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="tab-content">
				<?php
				foreach ($all_holiday_list

				as $key => $v_holiday_list):
				$year = date('Y');
				$month_name = date('F', strtotime($year . '-' . $key)); // get full name of month by date query
				?>
				<div id="<?php echo $month_name ?>" class="tab-pane <?php
				if ($current_month == $key) {
					echo 'active';
				}
				?>">
					<div>
						<div class="card">
							<div class="card-header">
								<div class="card-header-right">
									<div class="row">
										<div class="col-md-10">
											<h5><i class="fa fa-calendar"></i> <?php echo $month_name; ?></h5>
										</div>
										<div class="col-md-2">
											<a class="btn btn-sm btn-info"

											   href="<?php echo base_url(); ?>settings/holiday/">Add Holiday</a>
										</div>
									</div>
<!--									<ul class="list-unstyled card-option">-->
<!--										<li></li>-->
<!--										<li>-->
<!--										-->
<!--										</li>-->
<!--									</ul>-->
								</div>
							</div>
<!--							<div class="card-body">-->

								<div class="card-block pl-2 pr-3">
									<!-- Table -->
									<table class="table table-bordered table-hover ">
										<thead>
										<tr>
											<th class="">Sr.</th>
											<th>Event Name</th>
											<th class="">Start Date</th>
											<th class="">End Date</th>
											<th class="text-center">Action</th>
										</tr>
										</thead>
										<tbody>
										<?php $key = 1 ?>
										<?php if (!empty($v_holiday_list)): foreach ($v_holiday_list

																					 as $v_holiday) : ?>
											<tr>
												<td><?php echo $key ?></td>
												<td><?php echo $v_holiday->name ?></td>
												<td><?php echo date('d M,Y', strtotime($v_holiday->start_date)); ?></td>
												<td><?php echo date('d M,Y', strtotime($v_holiday->end_date)); ?></td>

												<td>
													<a class="btn btn-primary btn-sm edit pull-left "
													   style="margin-right: 10px;"
													   href="<?php echo base_url(); ?>settings/edit_holiday/<?php echo $v_holiday->id ?>">Edit</a>
													<!--delete btn-->
													<a class="btn btn-sm btn-danger btn-sm del"
													   style="margin-right: 10px; "
													   href="<?php echo base_url(); ?>settings/delete_holiday/<?php echo $v_holiday->id ?>">
														Delete</a>
												</td>
											</tr>
											<?php
											$key++;
										endforeach;
											?>
										<?php else : ?>
											<td colspan="5">
												<strong>There is no data to display</strong>
											</td>
										<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
