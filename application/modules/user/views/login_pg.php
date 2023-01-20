<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CodeIgniter Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

	<h1 class="page-header text-center">CodeIgniter Login with Session</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="login-panel panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login
					</h3>
				</div>
				<div class="panel-body">
					<form method="POST" action="<?php echo base_url(); ?>user/login">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Email" type="email" name="email" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" type="password" name="password" required>
							</div>
							<button type="submit" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
						</fieldset>
					</form>
				</div>
			</div>
			<?php
			if($this->session->flashdata('error')){
				?>
				<div class="alert alert-danger text-center" style="margin-top:20px;">
					<?php echo $this->session->flashdata('error'); ?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
</body>
</html>
