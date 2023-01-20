
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

<style>
	#color:hover {
		color: #01a9ac;
	}
</style>
<?php echo form_open_multipart('notice_board/insert_notice') ?>
<div class="container p-4">
	<!-- Page-header start -->
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title p-3">
					<div class="d-inline">
						<h4>Expense_Managment</h4>
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
	<!-- Page-header end -->
	<div class="row">
		<div class="col-md-12 pt-4">
			<div class="wrap-fpanel">
				<div class=" card-outline card-info">

					<div class="card" data-collapsed="0">


						<div class="card-block p-5">

							<input type="hidden" name="id" value="<?php if (!empty($posts)) {
								echo $posts['id'];
							} ?>">
							<input type="hidden" name="current_date"  value="<?php $today = date("m.d.y");  echo $today?>" readonly="readonly">
							<div class="form-group row ">
								<label class="col-sm-3 col-form-label">Publication Status<span>*</span></label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="publication_status" id="inlineRadio1" value="1">
									<label class="form-check-label pr-5" for="inlineRadio1" >Published</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="publication_status" id="inlineRadio2" value="0" >
									<label class="form-check-label" for="inlineRadio2" >Unpublished</label>
								</div>

								</div>
<!--							</div>-->
							<div class="form-group row ">
								<label class="col-sm-3 col-form-label">Title<span>*</span></label>

								<div class="col-sm-8">
									<input name="title" type="text"
										   value="<?php if (!empty($post)) {
											   echo $post['title'];} ?>"
										   placeholder="enter notice title here "
										   class="form-control">
								</div>
							</div>
							<div class="form-group row ">
								<label class="col-sm-3 col-form-label"  >Short Description<span>*</span></label>

								<div class="col-sm-8">
									<textarea class="form-control" name="short_description" rows="2"><?php if (!empty($post)) {
											echo $post['short_description'];} ?></textarea>
								</div>
							</div>
							<div class="form-group row ">
								<label class="col-sm-3 col-form-label">Long Description<span>*</span></label>

								<div class="col-sm-8">
									<textarea class="form-control" id="editor" name="long_description" rows="2"><?php if (!empty($post)) {
											echo $post['long_description'];} ?> </textarea>

								</div>
							</div>



							<button type="submit" class="btn btn-info " style="margin-left: 120px;">SAVE</button>
							<?php echo form_close(); ?>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>

	<script>
		ClassicEditor
			.create( document.querySelector( '#editor' ) )
			.catch( error => {
				console.error( error );
			} );
	</script>
