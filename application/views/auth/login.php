<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>Form Login</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/fontawesome/css/all.min.css">
	<script src="<?php echo base_url(); ?>asset/pembeli/sip/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/pembeli/sip/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/pembeli/sip/js/bootstrap.min.js"></script>
	<style>
		body {
			color: #999;
			background: #f3f3f3;
			font-family: 'Roboto', sans-serif;
		}

		.form-control {
			border-color: #eee;
			min-height: 41px;
			box-shadow: none !important;
		}

		.form-control:focus {
			border-color: #5cd3b4;
		}

		.form-control,
		.btn {
			border-radius: 3px;
		}

		.signup-form {
			width: 500px;
			margin: 0 auto;
			padding: 30px 0;
		}

		.signup-form h2 {
			color: #333;
			margin: 0 0 30px 0;
			display: inline-block;
			padding: 0 30px 10px 0;
			border-bottom: 3px solid #5cd3b4;
		}

		.signup-form form {
			color: #999;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}

		.signup-form .form-group row {
			margin-bottom: 20px;
		}

		.signup-form label {
			font-weight: normal;
			font-size: 14px;
			line-height: 2;
		}

		.signup-form input[type="checkbox"] {
			position: relative;
			top: 1px;
		}

		.signup-form .btn {
			font-size: 16px;
			font-weight: bold;
			background: #5cd3b4;
			border: none;
			margin-top: 20px;
			min-width: 140px;
		}

		.signup-form .btn:hover,
		.signup-form .btn:focus {
			background: #41cba9;
			outline: none !important;
		}

		.signup-form a {
			color: #5cd3b4;
			text-decoration: underline;
		}

		.signup-form a:hover {
			text-decoration: none;
		}

		.signup-form form a {
			color: #5cd3b4;
			text-decoration: none;
		}

		.signup-form form a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
	<div class="signup-form">
		<form action="<?= base_url('auth/proseslogin'); ?>" method="post" class="form-horizontal">
			<?php
			echo validation_errors();
			if ($this->session->flashdata('sukses')) {
				echo '<div class="alert alert-success">' . $this->session->flashdata('sukses') . '</div>';
			}
			if ($this->session->flashdata('error')) {
				echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
			}
			?>
			<div class="row">
				<div class="col-8 offset-4">
					<h2>Login</h2>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-4">Username</label>
				<div class="col-8">
					<input type="text" class="form-control" name="username" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-4">Password</label>
				<div class="col-8">
					<input type="password" class="form-control" name="password" required="required">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-8 offset-4">
					<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
				</div>
			</div>
		</form>
		<div class="text-center">Beum punya akun ? <a href="<?php echo base_url('register'); ?>">Buat akun</a></div>
		<h1></h1>
		<div class="text-center"><a href="<?php echo base_url('Auth/forgot'); ?>">lupa password</a></div>
	</div>
</body>

</html>