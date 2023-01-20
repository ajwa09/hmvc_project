<?php
//$selected_option = $_POST['option_value'];
//print_r($selected_option);
//die();

foreach ($emp as $row){

	 ?>
		<option <?php if ($default_employee == $row['designation_emp']): ?> selected <?php endif; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
	<?php

} ?>



