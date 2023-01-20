<!--<div class="content-wrapper">-->
<div class="col-sm-6">
	<div class="ml-5 mt- mb-3">
		<h3>Hrm</h3>
		<p class="breadcrumb-item active">Sub Titles</p>
	</div>
</div>
<div class="row">
	<div class="col-md-11" style="margin-left: 50px;">
		<div class="card">
			<div style="margin: 20px; margin-bottom: 10px;">
				<?php echo form_open('Settings/create') ?>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Company Name</label>
					<div class="col-sm-10">
						<input name="id" type="hidden" value="<?php if (!empty($row)) {
							echo $row['id'];} ?>">
						<input name="name" type="text" value="<?php if (!empty($row)) {
							echo $row['name'];} ?>"
							   placeholder="Company Name" class="form-control">
					</div>
					<input type="hidden" name="id" value="">
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Logo</label>
					<div class="col-sm-10">
						<input type="hidden" name="logo" value="<?php if (!empty($row)) {
							echo $row['logo'];} ?>">
						<input name="logo" type="file" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" value="<?php if (!empty($row)) {
							echo $row['email'];} ?>"
							   placeholder="abc@gmail.com"
							   class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Address</label>
					<div class="col-sm-10">
                            <textarea class="form-control" name="address"
									  id=""></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">City</label>
					<div class="col-sm-10">
						<input type="text" name="city" value="<?php if (!empty($row)) {
							echo $row['city'];} ?>" placeholder="City"
							   class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Country</label>
					<div class="col-sm-10">
						<select class="w-100 select2" name="country" id="">
							<option>pakistAN</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Language</label>
					<div class="col-sm-10">
						<select class="col-sm-12 select2" name="language" id="">
							<option>English</option>
						</select>
					</div>
				</div>


				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Currency</label>
					<div class="col-sm-10">
						<select class="w-100 select2" name="currency" id="">

							<option>DOLLER</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Phone</label>
					<div class="col-sm-10">
						<input type="text" name="phone" value="<?php if (!empty($row)) {
							echo $row['phone'];} ?>"
							   placeholder="Phone"
							   class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Hotline</label>
					<div class="col-sm-10">
						<input type="text" name="hotline" value="<?php if (!empty($row)) {
							echo $row['hotline'];} ?>"
							   placeholder="Hotline"
							   class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Fax</label>
					<div class="col-sm-10">
						<input type="text" name="fax" value="<?php if (!empty($row)) {
							echo $row['fax'];} ?>" placeholder="Fax"
							   class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Website</label>
					<div class="col-sm-10">
						<input type="text" name="website" value="<?php if (!empty($row)) {
							echo $row['website'];} ?>"
							   placeholder="Website"
							   class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>

				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>
<!--</div>-->
