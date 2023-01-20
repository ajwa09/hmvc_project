<section class="content pt-4">
	<div class="container-fluid" style="font-family: SansSerif; font-size: 15px">
		<?php echo form_open_multipart('employee/insert_emp')?>

		<div class="row">
			<!-- left column -->
			<div class="col-md-6">

				<!-- general form elements -->
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Employee
						</h3>
					</div>

					<!-- /.card-header -->
					<!-- form start -->
					<div class="card-body">

						<input type="hidden" name="id" value="<?php if (!empty($post)) {
							echo $post['id'];
						} ?>">

						<div class="form-group">
							<label for="">First name<span style="color: red">*</span></label>
							<input type="text" value="<?php if (!empty($post)) {
								echo $post['name'];
							} ?>" name="name" class="form-control"
								   id="">

						</div>
						<div class="form-group">
							<label for="">last name<span style="color: red">*</span></label>
							<input type="text" value="<?php if (!empty($post)) {
								echo $post['last_name'];
							} ?>" name="last_name"
								   class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="">Birthday<span style="color: red">*</span></label>
							<input type="date" value="<?php if (!empty($post)) {
								echo $post['dob'];
							} ?>" name="dob" class="form-control"
								   id="">
						</div>
						<div class="form-group">
							<label for="">Gender<span style="color: red">*</span></label>
							<select type="" name="gender" class="form-control" id="">
								<option>Select option</option>
								<option value="<?php if (!empty($post)) {
									echo $post['gender'];
								} ?>">Male
								</option>
								<option value="<?php if (!empty($post)) {
									echo $post['gender'];
								} ?>">Female
								</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Marital Status<span style="color: red">*</span></label>
							<select type="" name="marital_status" class="form-control" id="">
								<option>Select Status</option>
								<option value="<?php if (!empty($post)) {
									echo $post['marital_status'];
								} ?>">Married
								</option>
								<option value="<?php if (!empty($post)) {
									echo $post['marital_status'];
								} ?>">Unmarried
								</option>
								<option value="<?php if (!empty($post)) {
									echo $post['marital_status'];
								} ?>">Widowed
								</option>
								<option value="<?php if (!empty($post)) {
									echo $post['marital_status'];
								} ?>">Divorced
								</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Father`s Name<span style="color: red">*</span></label>
							<input type="text" value="<?php if (!empty($post)) {
								echo $post['father'];
							} ?>" name="father"
								   class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="">Nationality<span style="color: red">*</span></label>
							<select type="text" name="nationality" class="form-control" id="">
								<option>Select Country</option>
								<?php foreach ($country as $con): ?>
									<option value="<?php echo $con['name']; ?>"><?php echo $con['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Passport no<span style="color: red">*</span></label>
							<input type="number" value="<?php if (!empty($post)) {
								echo $post['passport'];
							} ?>" name="passport"
								   class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Photo<span style="color: red">*</span></label>

							<img type="file" src="<?php echo base_url() ?>assets/images/img/<?php if (!empty($post)) {
								echo $post['photo'];
							} ?>" style="max-height: 100px; max-width: 100px">
							<input type="file" name="photo">
						</div>
					</div>
					<!-- /.card-body -->

				</div>
				<!-- /.card -->
				<!-- Horizontal Form -->
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Bank Information
						</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->

					<div class="card-body">
						<div class="form-group">
							<label for="">Bank Name<span style="color: red">*</span></label>
							<input type="text" value="<?php if (!empty($post)) {
								echo $post['bank_name'];
							} ?>" name="bank_name"
								   class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="">Branch Name<span style="color: red">*</span></label>
							<input type="text" name="branch_name" value="<?php if (!empty($post)) {
								echo $post['branch_name'];
							} ?>"
								   class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="">Accout Name<span style="color: red">*</span></label>
							<input type="text" name="account_name" value="<?php if (!empty($post)) {
								echo $post['account_name'];
							} ?>"
								   class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="">Accout Number<span style="color: red">*</span></label>
							<input type="number" name="account_no" value="<?php if (!empty($post)) {
								echo $post['account_no'];
							} ?>"
								   class="form-control" id="">
						</div>

					</div>


				</div>
				<!-- /.card -->

			</div>
			<!--/.col (left) -->
			<!-- right column -->
			<div class="col-md-6">
				<!-- general form elements -->
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Contact Details
						</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->

					<div class="card-body">
						<div class="form-group">
							<label for="">Present Address<span style="color: red">*</span></label>
							<textarea rows="3" name="address"
									  style="width: 100%" ><?php if (!empty($post)) {
									echo $post['address'];
								} ?></textarea>
						</div>

						<div class="form-group">
							<label for="">City<span style="color: red">*</span></label>
							<input type="text" name="city" value="<?php if (!empty($post)) {
								echo $post['city'];} ?>" class="form-control"
								   id="">
						</div>
						<div class="form-group">
							<label for="">Country<span style="color: red">*</span></label>
							<select name="country" class="form-control" id="">
								<option>Select country</option>
								<?php foreach ($country as $con): ?>
									<option value="<?php echo $con['name']; ?>"><?php echo $con['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Mobile<span style="color: red">*</span></label>
							<input type="number" value="<?php if (!empty($post)) {
								echo $post['mobile'];
							} ?>" name="mobile"
								   class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="">Phone<span style="color: red">*</span></label>
							<input type="number" value="<<?php if (!empty($post)) {
								echo $post['phone'];
							} ?>" name="phone"
								   class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="">Email<span style="color: red">*</span></label>
							<input type="Email" value="<?php if (!empty($post)) {
								echo $post['email'];
							} ?>" name="email"
								   class="form-control" id="">
						</div>

					</div>

				</div>
				<!-- /.card -->

				<!-- general form elements -->
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Employee Documents
						</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->

					<div class="card-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-3">
									<label>Resum</label>
								</div>
								<div class="col-sm-3"><input type="file" name="resum" value=""></div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-3">
									<label>Offer Letter</label>
								</div>
								<div class="col-sm-3"><input type="file" name="offer_letter" value="Select file">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-3">
									<label>Joining Letter</label>
								</div>
								<div class="col-sm-3"><input type="file" name="joining_letter" value="Select file">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-3">
									<label>Contact Paper</label>
								</div>
								<div class="col-sm-3"><input type="file" value="" name="contact_paper"></div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-3">
									<label>Id Proff</label>
								</div>
								<div class="col-sm-3"><input type="file" name="id_proff" value="Select file"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-3">
									<label>Other Document</label>
								</div>
								<div class="col-sm-3"><input type="file" name="other_docs" value="Select file">
								</div>
							</div>
						</div>

					</div>

				</div>
				<!-- /.card -->
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Offical Status
						</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->

					<div class="card-body">
						<div class="form-group">
							<label for="">Employee ID<span style="color: red">*</span></label>
							<input type="text" name="emp_id" class="form-control" value="<?php if (!empty($post)) {
								echo $post['emp_id'];
							} ?>" id="">
						</div>
						<div class="form-group">
							<label for="">Joining Data<span style="color: red">*</span></label>
							<input type="text" name="joining" value="<?php if (!empty($post)) {
								echo $post['joining'];
							} ?>"
								   class="form-control" id="">
						</div>
						<?php if (!empty($post)) {
							?>
						<div class="form-group">
							<label for="">Status<span style="color: red">*</span></label>
							<select type="text" name="status" class="form-control" id="">
								<option value="1"  <?php
								echo $post['status'] == '1' ? 'selected' : '';
								?>><?php echo 'Active'; ?></option>

									<option value="0" <?php
									echo $post['status'] == '0' ? 'selected' : '';
									?>><?php echo 'Inactive'; ?></option>

							</select>
						</div>
						<?php }?>

						<div class="form-group">
							<label for="">Designation<span style="color: red">*</span></label>
							<select type="" name="designation_emp" class="form-control" id="">
								<?php foreach ($dept as $item): ?>
									<optgroup style="font-size: 18px" label="<?php echo $item['id']; ?>">

									<?php foreach ($desig as $post):
										if ($post['department_id'] == $item['id']) ?>
											<option value="<?php if (!empty($post)) {
										echo $post['id'];
									} ?> "><?php if (!empty($post)) {
										echo $post['designation'];
									} ?></option>
										</optgroup>
									<?php endforeach; ?>
								<?php endforeach; ?>
							</select>
						</div>

					</div>

				</div>

			</div>
			<!--/.col (right) -->
			<div class="card-footer col-sm-12">
				<button type="submit" class="btn btn-info btn-block">Save</button>
			</div>
			<!--			--><?php //endforeach; ?>
		</div>
		<!--			</form>  -->
						<?php echo form_close()?>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
