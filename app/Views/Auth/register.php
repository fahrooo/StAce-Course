<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body class="login-page">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="<?= base_url() ?>/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Register</h2>
						</div>
						<form method="POST" class="needs-validation" novalidate="" autocomplete="on" action="<?= base_url('Home/save_account'); ?>">
							<div class="box" style="text-align: center;">
								<?php if (session()->getFlashdata('msg')) : ?>
									<div class="alert alert-danger">
										<?= session()->getFlashdata('msg') ?>
									</div>
								<?php endif; ?>
								<?php
								if (!empty(session()->getFlashdata('success'))) { ?>

									<div class="alert alert-success">
										<?php echo session()->getFlashdata('success'); ?>
									</div>

								<?php } ?>
								<?php if (!empty(session()->getFlashdata('info'))) { ?>

									<div class="alert alert-info">
										<?php echo session()->getFlashdata('info'); ?>
									</div>

								<?php } ?>

								<?php if (!empty(session()->getFlashdata('warning'))) { ?>

									<div class="alert alert-warning">
										<?php echo session()->getFlashdata('warning'); ?>
									</div>

								<?php } ?>
								<?php if (!empty(session()->getFlashdata('danger'))) { ?>

									<div class="alert alert-danger">
										<?php echo session()->getFlashdata('danger'); ?>
									</div>

								<?php } ?>
							</div>
							<div class="form-wrap max-width-600 mx-auto">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Nama Lengkap*</label>
									<div class="col-sm-8">
										<input type="text" name="nama" class="form-control">
										<?php if (!empty(session()->getFlashdata('error'))) : ?>
										<div class='pesan' style="color: red;">
											<?= $error = $validation->getError('nama'); ?>
										</div>
									<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Username*</label>
									<div class="col-sm-8">
										<input type="text" name="username" class="form-control">
										<?php if (!empty(session()->getFlashdata('error'))) : ?>
										<div class='pesan' style="color: red;">
											<?= $error = $validation->getError('username'); ?>
										</div>
									<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Email Address*</label>
									<div class="col-sm-8">
										<input type="email" name="email" class="form-control">
										<?php if (!empty(session()->getFlashdata('error'))) : ?>
										<div class='pesan' style="color: red;">
											<?= $error = $validation->getError('email'); ?>
										</div>
									<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Password*</label>
									<div class="col-sm-8">
										<input type="password" name="password" class="form-control">
										<?php if (!empty(session()->getFlashdata('error'))) : ?>
										<div class='pesan' style="color: red;">
											<?= $error = $validation->getError('password'); ?>
										</div>
									<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Confirm Password*</label>
									<div class="col-sm-8">
										<input type="password" name="password2" class="form-control">
										<?php if (!empty(session()->getFlashdata('error'))) : ?>
										<div class='pesan' style="color: red;">
											<?= $error = $validation->getError('password2'); ?>
										</div>
									<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="<?= base_url('home/login') ?>">Login</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="<?= base_url() ?>/vendors/scripts/core.js"></script>
	<script src="<?= base_url() ?>/vendors/scripts/script.min.js"></script>
	<script src="<?= base_url() ?>/vendors/scripts/process.js"></script>
	<script src="<?= base_url() ?>/vendors/scripts/layout-settings.js"></script>
</body>

</html>