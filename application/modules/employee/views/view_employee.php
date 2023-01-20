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
					<div class="card-header">
						<div class="row">
							<div class="col">
								<div class="card-title ">
									<h4>View Employee</h4>
								</div>
							</div>
							<div class="col" style="margin-left: 50%;">
								<a class="btn btn-info btn-sm edit no-print "
								   href="<?php echo base_url(); ?>employee/get_employee/<?php echo $post['id'] ?>">
									<svg xmlns="http://www.w3.org/2000/svg" style="padding-right: 5px" width="19"
										 height="19" fill="currentColor" class="bi bi-pencil-square"
										 viewBox="0 0 16 16">
										<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
										<path fill-rule="evenodd"
											  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg>
									Edit</a>

								<a type="button" class="btn btn-info btn-sm no-print" title="Print"

								   data-placement="top" onclick="window.print()">
									<span class="fa fa-print text-white"></span>
								</a>
								<!--								<div id="htmlContent">-->
								<a class="btn btn-info btn-sm"
								   href="<?php echo base_url(); ?>employee/pdf/<?php echo $post['id'] ?>"
								   data-placement="top">
									<span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
											   fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
  <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
</svg></span>
								</a>
								<!--								</div>-->
							</div>
						</div>
					</div>

					<!-- /.card-header -->
					<!-- form start -->
					<div class="card-body">
						<h6>Employee Details</h6>

						<div class="row">
							<div class="col-md-12 pt-4">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group pl-5">


										</div>
									</div>
									<div class="col-lg-12 ">
										<div class="row">
											<div class="col-lg-2 col-sm-2">
												<div class="fileinput-new thumbnail"
													 style="width: 100px;  margin-top: 14px; margin-left: 16px; background-color: #EBEBEB;">
													<img type="file"
														 src="<?php echo base_url() ?>assets/images/img/<?php if (!empty($post)) {
															 echo $post['photo'];
														 } ?>" style="max-height: 100px; max-width: 100px">
												</div>
											</div>
											<div class="col-lg-1 col-sm-1">
												&nbsp;
											</div>
											<div class="col-lg-8 col-sm-8 ">
												<div>
													<div style="margin-left: 20px;">
														<h4><?php echo $post['name'] ?></h4>
														<hr/>
														<table class="table-hover">
															<!--															--><?php //foreach ($posts as $post): ?>
															<thead>
															<tr>
																<th><strong>Employee ID</strong></th>
																<td><?php echo $post['emp_id'] ?></td>
															</tr>
															<tr>
																<th><strong>Department</strong></th>
																<!--																	<th>-->
																<?php //echo $post[''] ?><!--</th>-->

															</tr>
															<tr>
																<th><strong class="pr-5">Designation</strong></th>
																<td><?php echo $post['designation'] ?></td>

															</tr>
															<tr>
																<th><strong>Joining Date</strong></th>
																<td><?php echo $post['joining'] ?></td>
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
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 pt-3 pr-3">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h6>Personal Details</h6>
						<div>
							<div style="margin-left: 20px;">
								<hr/>
								<table class="table-hover">
									<thead>
									<tr>
										<td class="p-3 pr-5 ">Date of Birth</td>
										<td><?php echo $post['dob'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Gender</td>
										<td><?php echo $post['gender'] ?></td>

									</tr>
									<tr>
										<td class="p-3 pr-5 ">Marital Status</td>
										<td><?php echo $post['marital_status'] ?></td>

									</tr>
									<tr>
										<td class="p-3 pr-5 ">Nationality</td>
										<td><?php echo $post['nationality'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Passport Number</td>
										<td><?php echo $post['passport'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Username</td>
										<!--										<td>-->
										<?php //echo $post[''] ?><!--</td>-->
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Default password</td>
										<!--										<td>-->
										<?php //echo $post[''] ?><!--</td>-->
									</tr>

									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 pt-3 ">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h6>Contact Details</h6>
						<div>
							<div style="margin-left: 20px;">
								<hr/>
								<table class="table-hover">
									<thead>
									<tr>
										<td class="p-3 pr-5 ">Email</td>
										<td><?php echo $post['email'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Phone</td>
										<td><?php echo $post['phone'] ?></td>

									</tr>
									<tr>
										<td class="p-3 pr-5 ">Mobile</td>
										<td><?php echo $post['mobile'] ?></td>

									</tr>
									<tr>
										<td class="p-3 pr-5 ">Address</td>
										<td><?php echo $post['address'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">City</td>
										<td><?php echo $post['city'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Country</td>
										<td><?php echo $post['country'] ?></td>
									</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 pt-3 pr-3 no-print">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h6>Employee Details</h6>
						<div>
							<div style="margin-left: 20px;">
								<hr/>
								<table class="table-hover">
									<thead>
									<tr>
										<td class="p-3 pr-5 ">Resum</td>
										<td><a type="file"
											   href="<?php echo base_url() ?>assets/images/img/<?php echo $post['resum'];
											   ?>"
											   style="max-height: 100px; max-width: 100px">View_employee_resum</a>
										</td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Offer Letter</td>
										<td><a type="file"
											   href="<?php echo base_url() ?>assets/images/img/<?php echo $post['offer_letter'];
											   ?>" style="max-height: 100px; max-width: 100px">View_Offer_Letter</a>
										</td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Joining Letter</td>
										<td><a type="file"
											   href="<?php echo base_url() ?>assets/images/img/<?php echo $post['joining_letter'];
											   ?>"
											   style="max-height: 100px; max-width: 100px">View_Joining_Letter</a>
										</td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Contract_Paper</td>
										<td><a type="file"
											   href="<?php echo base_url() ?>assets/images/img/<?php echo $post['contact_paper'];
											   ?>"
											   style="max-height: 100px; max-width: 100px">View_contract_paper</a>
										</td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">ID_proff</td>
										<td><a type="file"
											   href="<?php echo base_url() ?>assets/images/img/<?php echo $post['id_proff'];
											   ?>" style="max-height: 100px; max-width: 100px">View_id_Proff</a>
										</td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Other_Document</td>
										<td><a type="file"
											   href="<?php echo base_url() ?>assets/images/img/<?php echo $post['other_docs'];
											   ?>"
											   style="max-height: 100px; max-width: 100px">View_Other_Document</a>
										</td>
									</tr>


									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 pt-3">
				<div class="card card-outline card-info">
					<div class="card-body">
						<h6>Bank Details</h6>
						<div>
							<div style="margin-left: 20px;">
								<hr/>
								<table class="table-hover">
									<thead>
									<tr>
										<td class="p-3 pr-5 ">Bank Name</td>
										<td><?php echo $post['bank_name'] ?></td>
									</tr>
									<tr>
										<td class="p-3 pr-5 ">Branch Name</td>
										<td><?php echo $post['branch_name'] ?></td>

									</tr>
									<tr>
										<td class="p-3 pr-5 ">Account Name</td>
										<td><?php echo $post['account_name'] ?></td>

									</tr>
									<tr>
										<td class="p-3 pr-5 ">Account No</td>
										<td><?php echo $post['account_no'] ?></td>
									</tr>

									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<script type="text/javascript">
	var doc = new jsPDF();
	var specialElementHandlers = {
		'#editor': function (element, renderer) {
			return true;
		}
	};

	$('#generatePDF').click(function () {
		doc.fromHTML($('#htmlContent').html(), 15, 15, {
			'width': 700,
			'elementHandlers': specialElementHandlers
		});
		print(htmlContent);
		doc.save('<?php echo base_url('view_employee.pdf')?>');
	});

</script>
