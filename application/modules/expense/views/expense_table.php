
<?php $id = $_POST['option_value'];
$date = $_POST['date']; ?>
<th><?php
	$date = date('t', strtotime($date));
	$month = date('m', strtotime($date));
	//				 echo $
	for ($i = 1;
	$i <= $date;
	$i++){
	?>
	<th><?php echo $i ?></th>

<?php }
?> </th>
<table class="table clear table-bordered table-hover">
	<thead>
	<tr>
		<th class="">Sr.</th>
		<th>Item Name</th>
		<th class="">Parchase form</th>
		<th class="">Parchase Date</th>
		<th class="">Employee Name</th>
		<th class="">Bill Copy</th>
		<th class="">Amount</th>
		
	</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $post): ?>

		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['item_name']; ?></td>
			<td><?php echo $post['purchase_form']; ?></td>
			<td><?php echo $post['purchase_date']; ?></td>
			<td><?php echo $post['employee_name']; ?></td>
			<td><?php echo $post['bill_copy']; ?></td>
			<td><?php echo $post['amount_spent']; ?></td>
			<td>
				<!--delete btn-->

			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
