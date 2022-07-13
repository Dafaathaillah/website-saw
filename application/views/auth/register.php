<!DOCTYPE html>
<!--
Template Name: NobleUI - Admin & Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: You must have a valid license purchased only from above link or https://themeforest.net/user/nobleui/portfolio/ in order to legally use the theme for your project.
-->
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>NobleUI Responsive Bootstrap 4 Dashboard Template</title>
	<!-- core:css -->
	<link rel="stylesheet" href="assets/assets/core/core.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="assets/assets/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/assets/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="assets/css/demo_1/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
								<div class="col-md-4 pr-md-0">
									<div class="auth-left-wrapper">

									</div>
								</div>
								<div class="col-md-8 pl-md-0">
									<div class="auth-form-wrapper px-4 py-5">
										<a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
										<h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>
										<form class="forms-sample">
											<div class="form-group">
												<label for="exampleInputUsername1">Username</label>
												<input type="text" class="form-control" id="exampleInputUsername1"
													autocomplete="Username" placeholder="Username">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Email address</label>
												<input type="email" class="form-control" id="exampleInputEmail1"
													placeholder="Email">
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Password</label>
												<input type="password" class="form-control" id="exampleInputPassword1"
													autocomplete="current-password" placeholder="Password">
											</div>
											<div class="form-check form-check-flat form-check-primary">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input">
													Remember me
												</label>
											</div>
											<div class="mt-3">
												<a href="../../dashboard-one.html"
													class="btn btn-primary text-white mr-2 mb-2 mb-md-0">Sing up</a>
												<button type="button"
													class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
													<i class="btn-icon-prepend" data-feather="twitter"></i>
													Sign up with twitter
												</button>
											</div>
											<a href="login.html" class="d-block mt-3 text-muted">Already a user? Sign
												in</a>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view("layouts/footer.php") ?>
			
		</div>
	</div>

	<!-- core:js -->
	<script src="assets/assets/core/core.js"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="assets/assets/chartjs/Chart.min.js"></script>
	<script src="assets/assets/jquery.flot/jquery.flot.js"></script>
	<script src="assets/assets/jquery.flot/jquery.flot.resize.js"></script>
	<script src="assets/assets/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="assets/assets/apexcharts/apexcharts.min.js"></script>
	<script src="assets/assets/progressbar.js/progressbar.min.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="assets/assets/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="assets/js/dashboard.js"></script>
	<script src="assets/js/datepicker.js"></script>
	<!-- end custom js for this page -->
</body>

</html>
