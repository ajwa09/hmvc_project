<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<div class="container-fluid p-5">
	<div class="pcoded-content">
		<div class="pcoded-inner-content">
			<!-- Main-body start -->
			<div class="main-body">
				<div class="page-wrapper">
					<!-- Page-header start -->
					<div class="page-header">
						<div class="row align-items-end">
							<div class="col-lg-8">
								<div class="page-header-title">
									<div class="d-inline">
										<h4>Inbox</h4>
										<span>Inbox</span>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="page-header-breadcrumb">
									<ul class="breadcrumb-title">

									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="container">
						<!-- Page-header end -->

						<div class="page-body">


							<div class="card">
								<div class="card-body">
									<div class="card-block email-card">
										<div class="row">
											<div class="col-lg-12 col-xl-3">
												<div class="user-body">
													<div class="p-20 text-center">
														<!--            <a href="email-compose.html" class="btn btn-danger">Compose</a>-->
													</div>

													<ul class="page-list nav nav-tabs flex-column" id="pills-tab"
														role="tablist">

														<li class="nav-item mail-section">
															<a class="nav-link" data-toggle="pill" href="#e-compose"
															   role="tab">
																<i class="icofont icofont-file-text"></i> Compose
															</a>
														</li>


														<li class="nav-item mail-section">
															<a class="nav-link active" data-toggle="pill"
															   href="#e-inbox"
															   role="tab">
																<i class="icofont icofont-inbox"></i> Inbox
																<span class="label label-primary f-right">6</span>
															</a>
														</li>
														<li class="nav-item mail-section">
															<a class="nav-link" data-toggle="pill" href="#e-sent"
															   role="tab">
																<i class="icofont icofont-paper-plane"></i> Sent Mail
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-lg-12 col-xl-9">
												<div class="tab-content" id="pills-tabContent">


													<div class="tab-pane fade" id="e-compose" role="tabpanel">
														<div class="mail-body">
															<div class="mail-body-content">

																<script src="<?php echo base_url() ?>files/assets/ckeditor/ckeditor.js"
																		type="text/javascript"></script>
																<script src="<?php echo base_url() ?>files/assets/ckeditor/lang/en.js"
																		type="text/javascript"></script>
																<script src="<?php echo base_url() ?>files/assets/js/jasny-bootstrap.min.js"></script>

																<link href="<?php echo base_url() ?>files/assets/css/admin.css"
																	  rel="stylesheet" type="text/css"/>


																<form enctype="multipart/form-data" method="post"
																	  action="email/send_mail">
																	<div class="form-group">
																		<select type="" data-placeholder="Select Email"
																				name="to[]"  class="form-control" id="">
																			<option>Select email </option>
																			<?php if (!empty($post)): foreach ($post as $emp) : ?>
																				<option value="<?php echo $emp['email'] ?>"><?php echo $emp['name'] . ' ' . $emp['last_name'] . '(<small>' . $emp['email'] . '</small>)' ?></option>
																			<?php endforeach; ?>
																			<?php endif; ?>
																		</select>
																	</div>
																	<div class="form-group">
																		<input type="text" name="subject"
																			   class="form-control"
																			   placeholder="Subject">
																	</div>
																	<div class="form-group">
																		<textarea name="paragraph" id="editor" class="form-control" ></textarea>

																	</div>


																	<div class="form-group">


																		<div class="fileinput fileinput-new"
																			 data-provides="fileinput">
																		<span class="btn btn-default btn-file">
																			<span class="fileinput-new">
																				<i class="fa fa-paperclip"></i> Attachment</span><span

																					class="fileinput-exists">Change</span>
																			<input type="file" name="attach_file">
																		</span>
																			<span class="fileinput-filename"></span>
																			<a href="#" class="close fileinput-exists"
																			   data-dismiss="fileinput"
																			   style="float: none;">&times;</a>


																			<p class="help-block">Max. 15 MB</p>
																		</div>
																	</div>

																	<div class="form-group">
																		<button type="submit" name="send" value=""
																				class="btn btn-primary btn-sm">
																			<i class="fa fa-envelope-o"></i> Send
																		</button>

																	</div>


																</form>

															</div>
														</div>


													</div>

													<div class="tab-pane fade show active" id="e-inbox" role="tabpanel">
														<div class="mail-body">

															<div class="mail-body-header">
																<button type="button"
																		class="btn btn-primary btn-xs waves-effect waves-light">
																	<i class="icofont icofont-exclamation-circle"></i>
																</button>
																<button type="button"
																		class="btn btn-success btn-xs waves-effect waves-light">
																	<i class="icofont icofont-inbox"></i>
																</button>
																<button type="button"
																		class="btn btn-danger btn-xs waves-effect waves-light">
																	<i class="icofont icofont-ui-delete"></i>
																</button>
															</div>


															<div class="mail-body-content">
																<div class="table-responsive">
																	<table class="table">


																		<tr>
																			<td><strong>There is no email to
																					display</strong></td>
																		</tr>


																	</table>
																</div>
															</div>
														</div>
													</div>


													<div class="tab-pane fade" id="e-sent" role="tabpanel">

														<div class="mail-body">


															<div class="mail-body-header">
																<button type="button"
																		class="btn btn-primary btn-xs waves-effect waves-light">
																	<i class="icofont icofont-exclamation-circle"></i>
																</button>
																<button type="button"
																		class="btn btn-success btn-xs waves-effect waves-light">
																	<i class="icofont icofont-inbox"></i>
																</button>
																<button type="button"
																		class="btn btn-danger btn-xs waves-effect waves-light">
																	<i class="icofont icofont-ui-delete"></i>
																</button>
															</div>

															<div class="mail-body-content">


																<div class="table-responsive">
																	<table class="table">


																	</table>
																</div>


															</div>
														</div>
													</div>

												</div>
											</div>
											<!-- Right-side section end -->
										</div>
									</div>
									<!-- Email-card end -->
								</div>


							</div>
						</div>
					</div>
					<div id="styleSelector">

					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="common_modal">
		<div id="common_modal_size" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Default Modal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>One fine body&hellip;</p>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
	<script>
		$(document).ready(function () {

			$("form").submit(function () {
				$(this).find('input[type="submit"]').prop("disabled", true);
			});
		});


	</script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.catch( error => {
			console.error( error );
		} );
</script>
