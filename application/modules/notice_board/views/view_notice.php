<style>
	@media print {
		.no-print {
			display: none;
		}
	}
</style>
<section class="content pt-4" id="htmlContent">
	<div class="container" style="font-family: SansSerif; font-size: 15px">
		<div class="row">

			<!-- left column -->
			<div class="col-md-12">

				<!-- general form elements -->
				<div class="card card-outline card-info">
					<!--					<div class="card-header">-->
					<!--						<div class="row">-->
					<div class="col ">
						<div class="card-title p-3 ">
							<h4>Notice</h4>
							<!--								</div>-->
							<!--							</div>-->
						</div>
					</div>

					<div class="card-body ">


						<div class="row pb-4 ">
							<div class="col-sm-3">
								<div class="form-group pl-4
">


								</div>
							</div>


							<div class="col-lg-8 col-sm-8 ">
								<div>
									<div >
										<table class="table-hover">
											<thead >
											<tr>
												<th><strong>Title</strong></th>
												<td style="padding-top: 10px;" ><?php echo $post['title'] ?></td>
											</tr>
											<tr>
												<th><strong>Short_Description</strong></th>
												<td style="padding-top: 10px;"><?php echo $post['short_description'] ?></td>
											</tr>
											<tr>
												<th><strong class="pr-5">Long_Description</strong></th>
												<td style="padding-top: 10px;"><?php echo $post['long_description'] ?></td>

											</tr>
											<tr>
												<th><strong>Current Date</strong></th>
												<td><?php echo $post['current_date'] ?></td>
											</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

