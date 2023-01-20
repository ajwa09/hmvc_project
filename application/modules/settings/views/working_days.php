<style>
	.border-checkbox-group {
		padding-right: 20px;
		display: inline;
	}

	.border-checkbox {
		/*border-color: #01a9ac;*/
		box-sizing: inherit;
		padding-right: 40px;

	}
</style>

<div class="container"></div>
<div class="col-md-12 p-3">
	<div class="col-sm-6">
		<h3 class="m-0 pt-4 ">Working Days</h3>
		<p class="breadcrumb-item active p-3">set working day</p>
	</div>

<!--	<form action="" method="post">-->
	<?php echo form_open_multipart('settings/insert_working_day')?>
		<div class="card card card-outline card-info p-2">
			<div class="card-header">
				<h4 class="card-title">SET WORKING DAYS</h4>
			</div>
			<div class="card-body ">
				<div class="border-checkbox-section">

					<div class="row pl-5">
						<div class="border-checkbox-group border-checkbox-group-">
							<input class="border-checkbox "  value="1" type="checkbox"
								   name="day[]" id="inputSaturday"
								   checked/>
							<label class="border-checkbox-label"
								   for="inputSaturday">Saturday</label>

							<input type="hidden" name="day_id[]" value="1"/>

						</div>
						<div class="border-checkbox-group border-checkbox-group-info">
							<input class="border-checkbox" value="2" type="checkbox"
								   name="day[]" id="inputSunday"
								   checked/>
							<label class="border-checkbox-label"
								   for="inputSunday">Sunday</label>

							<input type="hidden" name="day_id[]" value="2"/>

						</div>
						<div class="border-checkbox-group border-checkbox-group-info">
							<input class="border-checkbox" value="3" type="checkbox"
								   name="day[]" id="inputMonday"
								   checked/>
							<label class="border-checkbox-label"
								   for="inputMonday">Monday</label>

							<input type="hidden" name="day_id[]" value="3"/>

						</div>
						<div class="border-checkbox-group border-checkbox-group-info">
							<input class="border-checkbox" value="4" type="checkbox"
								   name="day[]" id="inputTuesday"
								   checked/>
							<label class="border-checkbox-label"
								   for="inputTuesday">Tuesday</label>

							<input type="hidden" name="day_id[]" value="4"/>

						</div>
						<div class="border-checkbox-group border-checkbox-group-info">
							<input class="border-checkbox" value="5" type="checkbox"
								   name="day[]" id="inputWednesday"
								   checked/>
							<label class="border-checkbox-label"
								   for="inputWednesday">Wednesday</label>

							<input type="hidden" name="day_id[]" value="5"/>

						</div>
						<div class="border-checkbox-group border-checkbox-group-info">
							<input class="border-checkbox" value="6" type="checkbox"
								   name="day[]" id="inputThursday"
								   checked/>
							<label class="border-checkbox-label"
								   for="inputThursday">Thursday</label>

							<input type="hidden" name="day_id[]" value="6"/>

						</div>
						<div class="border-checkbox-group border-checkbox-group-info">
							<input class="border-checkbox" value="7" type="checkbox"
								   name="day[]" id="inputFriday"
								   checked/>
							<label class="border-checkbox-label"
								   for="inputFriday">Friday</label>

							<input type="hidden" name="day_id[]" value="7"/>

						</div>
						<button type="submit" class="btn btn-info ml-3" style="background:#01a9ac; width: 90px">Save</button>

					</div>
				</div>
			</div>
		</div>
	</form>
</div>


