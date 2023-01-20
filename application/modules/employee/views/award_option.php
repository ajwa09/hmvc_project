<?php

foreach ($emp as $row){
	 ?>
		<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
	<?php
} ?>


