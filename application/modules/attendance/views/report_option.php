<?php
$id = $_POST['option_value'];
$date = $this->input->post("date");
$month = date('Y-m', strtotime($date));
$date = ltrim($date, "0");
echo $date
?>
<div class="card card-outline card-info p-3">
	<div class="card-header">
		<h5>Attendance List</h5>

	</div>
	<table class="table-bordered">
		<thead>
		<tr>
			<th>EMPLOYEE</th>
			<?php
			$date = date('t', strtotime($date));
			$month = date('m', strtotime($date));
			//				 echo $
			for ($i = 1;
				 $i <= $date;
				 $i++) {

				?>
				<th><?php echo $i ?></th>

			<?php }
			?>
		</tr>
		</thead>
		<tbody id="name">

		<?php
		$date = date('t', strtotime($date));
		foreach ($employees as $employee):
//			print_r($employee);
//		die();
//			if ($id == $employee['department_id']):

			?>
			<tr>
				<td><?php echo $employee['name']; ?></td>
				<?php

				$attendance = $employee['attendance'];
				$holiday = $employee['holiday'];

				for ($j = 1; $j <= $date; $j++) {
//					$j = ltrim($j, "0");
					?>

					<td>
						<?php
						if (isset($attendance[$j])) {
							 echo '<span  style="color: #079112; font-weight: bold" >P</span>';
//							 echo '<span  style="padding:2px; 4px" class="label label-danger std_p">H</span>';
						} elseif(isset($holiday[$j])) {
							echo '<span  style="color: deepskyblue; font-weight: bold" >H</span>';
						}
						else {
							echo '<span  style="color: maroon" >..</span>';
						}
						?>
					</td>

					<?php

				}
				?>

			</tr>
		<?php
//			endif;
		endforeach; ?>
		</tbody>
	</table>

<!--	<script type="text/javascript">-->
<!--		function printEmp_report(EmpprintReport) {-->
<!--			var printContents = document.getElementById(EmpprintReport).innerHTML;-->
<!--			var originalContents = document.body.innerHTML;-->
<!--			document.body.innerHTML = printContents;-->
<!--			window.print();-->
<!--			document.body.innerHTML = originalContents;-->
<!--		}-->
<!--	</script>-->
