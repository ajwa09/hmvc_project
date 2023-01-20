<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<?php echo form_open('employee/get_employee')?>
<body style="width: 100%;">
<div style="width: 100%; border-bottom: 2px solid black;">
	<table style="width: 100%; vertical-align: middle;">

	</table>
</div>
<br/>
<br/>

<div style="padding: 5px 0; width: 100%;">
	<div>
		<table style="width: 100%; border-radius: 3px;">
			<tr>
				<td style="width: 150px;">
					<table style="border: 1px solid grey;">
						<tr>
							<td style="background-color: lightgray; border-radius: 2px;">
									<img src="<?php echo base_url() ?>assets/images/img/<?php echo $post['photo']; ?>"
										 style="width: 132px; height: 138px; border-radius: 3px;">

							</td>
						</tr>
					</table>
				</td>
				<td>
					<table style="width: 300px; margin-left: 10px; margin-bottom: 10px; font-size: 13px;">
						<tr>
<!--							<td style="width: 100px"><strong>Employee ID : </strong></td>-->
							<td colspan="2" style="font-size: 20px; alignment: center"><?php echo $post['name'] ?></td>
						</tr>
						<tr>
							<td style="width: 100px"><strong>Employee ID : </strong></td>
							<td colspan="2"><?php echo $post['emp_id'] ?></td>
						</tr>
<!--						<tr>-->
<!--							<td style="width: 100px"><strong>Department : </strong></td>-->
<!--							<td>&nbsp; --><?php //echo $['department'] ?><!--</td>-->
<!--						</tr>-->
<!--						<tr>-->
<!--							<td style="width: 100px"><strong>Designation :</strong></td>-->
<!--							<td>&nbsp; --><?php //echo $desig['designation'] ?><!--</td>-->
<!--						</tr>-->
						<tr>
							<td style="width: 100px"><strong>Joining Date: </strong></td>
							<td>&nbsp; <?php echo date('d M Y', strtotime($post['joining'])); ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>

<!--        <hr style="margin-top: 10px; margin-bottom: 10px;" />-->

<div style="width: 100%; margin-top: 55px;">

	<div>
		<div style="width: 100%; background: #E3E3E3;padding: 1px 0px 1px 10px; color: black; vertical-align: middle;  ">
			<p style="margin-left: 10px; font-size: 15px; font-weight: lighter;"><strong>Personal Details</strong></p>
		</div>
		<br/>
		<table style="width: 100%;padding-right: 40%; /*border: 1px solid blue;*/ ">
			<tr>
				<td>
					<table style="width: 100%; font-size: 13px; ">
						<tr>
							<td style="width: 30%;text-align: right"><strong>Date of Birth :</strong></td>

							<td style="">
								&nbsp; <?php echo date('d M Y', strtotime($post['dob'])); ?></td>
						</tr>
						<tr>
							<td style="text-align: right"><strong>Gender :</strong></td>

							<td style="width: 220px;">&nbsp; <?php echo $post['gender'] ?></td>
						</tr>
						<tr>
							<td style="text-align: right;"><strong>Maratial Status :</strong></td>

							<td style="width: 220px;">&nbsp; <?php echo $post['marital_status'] ?></td>
						</tr>
						<tr>
							<td style="text-align: right;"><strong>Father's Name :</strong></td>

							<td style="width: 220px;">&nbsp; <?php echo $post['father'] ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br/>
		<div style="width: 100%; background: #E3E3E3;padding: 1px 0px 1px 10px; color: black; vertical-align: middle; ">
			<p style="margin-left: 10px; font-size: 15px; font-weight: lighter;"><strong>Contact Details</strong></p>
		</div>
		<table style="width: 100%; margin-top: 20px; padding: 10px 0;">
			<tr>
				<td>
					<table style="width: 100%; font-size: 13px;">
						<tr>
							<td style="width: 30%;text-align: right;"><strong>Email :</strong></td>

							<td style="">&nbsp; <?php echo $post['email'] ?></td>
						</tr>
						<tr>
							<td style="text-align: right;"><strong>Phone :</strong></td>

							<td style="">&nbsp; <?php echo $post['phone'] ?></td>
						</tr>
						<tr>
							<td style="text-align: right"><strong>Mobile :</strong></td>

							<td style="">&nbsp; <?php echo $post['mobile'] ?></td>
						</tr>
						<tr>
							<td style="text-align: right;"><strong>Address :</strong></td>

							<td style="">&nbsp; <?php echo $post['address'] ?></td>
						</tr>
						<tr>
							<td style="text-align: right;"><strong>City :</strong></td>

							<td>&nbsp; <?php echo $post['city'] ?></td>
						</tr>
						<tr>
							<td style="text-align: right;"><strong>Country :</strong></td>

							<td style="">&nbsp; <?php echo $post['country'] ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br/>
		<div style="width: 100%; background: #E3E3E3;padding: 1px 0px 1px 10px; color: black; vertical-align: middle; ">
			<p style="margin-left: 10px; font-size: 15px; font-weight: lighter;"><strong>Bank Information</strong></p>
		</div>
		<table style="width: 100%; margin-top: 20px; padding: 10px 0;">
			<tr>
				<td>
					<table style="font-size: 13px;width: 100%">
						<tr>
							<td style="width: 30%;text-align: right"><strong>Bank Name : </strong></td>
							<td style="">&nbsp; <?php echo $post['bank_name'] ?> </td>
						</tr>
						<tr>
							<td style="text-align: right"><strong>Branch Name :</strong></td>

							<td>&nbsp;<?php echo $post['branch_name'] ?></td>
						</tr>
						<tr>
							<td style="text-align: right"><strong>Account Name :</strong></td>

							<td>&nbsp;<?php echo $post['account_name'] ?></td>
						</tr>
						<tr>
							<td style="text-align: right"><strong>Account Number :</strong></td>

							<td>&nbsp;<?php echo $post['account_no'] ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>
</body>
</html>
