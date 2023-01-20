<?php
$id = $_POST['option_value'];
$date = $_POST['date'];
//echo $date;
foreach ($emp as $key=>$employee):
//print_r($employee);
//die();
	if ($id == $employee['department_id']):
		?>
		<tr>


			<input type="hidden" name="attendance[<?php echo $key ?>][emp_id]"
				   value="<?php echo $employee['emp_id']; ?>">
			<input type="hidden"  name="attendance[<?php echo $key ?>][attendance_id]"
				   value="<?php echo $employee['attendance_id']; ?>">
<!--			date-->
			<input type="hidden" id="date" name="attendance[<?php echo $key ?>][date]"
				   value="<?php echo $date; ?>">
			<td><input type="hidden"
					   name="attendance[<?php echo $key ?>][employee_id]" value="<?php echo $employee['emp_id']; ?>"><?php echo $employee['name']; ?>
			</td>
			<td><input type="hidden"
					   name="attendance[<?php echo $key ?>][designation]" value="<?php echo $employee['designation']; ?>">
				<?php echo $employee['designation']; ?></td>

			<!--		--><?php //if ($employee['emp_id'] != null):
			?>
			<td><input class="border-checkbox select_one" type="checkbox"
					   name="attendance[<?php echo $key ?>][present]" value="1"> Present
			</td>
			<!--	--><?php //endif;
			?>
			<!--			--><?php //else{
			?>
			<td>
				<select type="" name="attendance[<?php echo $key ?>][category]" class="form-control" name='select1'>
					<option>Select leave category</option>

					<?php foreach ($item

					as $row): ?>
					<option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?>

						<?php endforeach; ?>
						<input name="attendance[<?php echo $key ?>][attendance_id]" type="text" value="<?php echo $employee['attendance_id'] ?>">
						<input type="text" id="date" name="attendance[<?php echo $key ?>][date]"
							   value="<?php echo $date; ?>">
					</option>
				</select></td>
			<!--	--><?php //}
			?>
		</tr>
	<?php
	endif;
endforeach;

?>



