<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<?php echo form_open('expense/view_expense_id') ?>
<body style="width: 100%;">
<div style="width: 100%; border-bottom: 2px solid black;">
	<table style="width: 100%;padding-right: 40%; /*border: 1px solid blue;*/ ">
		<tr>
			<td>
				<table style="width: 100%; font-size: 13px; ">
					&nbsp;<tr>
						<td style="width: 150px;">
							<table style="border: 1px solid grey;">
								<tr>
									<td style="background-color: lightgray; border-radius: 2px;">
										<img src="<?php echo base_url() ?>assets/images/img/<?php echo $post['bill_copy']; ?>"
											 style="width: 132px; height: 138px; border-radius: 3px;">

									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="text-align: right"><strong>Gender :</strong></td>

						<td style="width: 220px;">&nbsp; <?php echo $post['item_name'] ?></td>
					</tr>
					<tr>
						<td style="text-align: right;"><strong>Maratial Status :</strong></td>

						<td style="width: 220px;">&nbsp; <?php echo $post['purchase_form'] ?></td>
					</tr>
					<tr>
						<td style="text-align: right;"><strong>Father's Name :</strong></td>

						<td style="width: 220px;">&nbsp; <?php echo $post['purchase_date'] ?></td>
					</tr>
					<tr>
						<td style="text-align: right;"><strong>Father's Name :</strong></td>

						<td style="width: 220px;">&nbsp; <?php echo $post['employee_name'] ?></td>
					</tr>
					<tr>
						<td style="text-align: right;"><strong>Father's Name :</strong></td>

						<td style="width: 220px;">&nbsp; <?php echo $post['purchase_date'] ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
