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
	<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/core/core.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/demo_1/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<?php $this->load->view("layouts/sidebar.php") ?>
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
			<?php $this->load->view("layouts/navbar.php") ?>
			<!-- partial -->

			<div class="page-content">

				<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
					<div>
						<h4 class="mb-3 mb-md-0">Welcome To Data Kriteria</h4>
					</div>
					<div class="d-flex align-items-center flex-wrap text-nowrap">
						<div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex"
							id="dashboardDate">
							<span class="input-group-addon bg-transparent"><i data-feather="calendar"
									class=" text-primary"></i></span>
							<input type="text" class="form-control">
						</div>
						<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
							<i class="btn-icon-prepend" data-feather="download-cloud"></i>
							Download Report
						</button>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
						<div class="card">
							<div class="card-body">
								<?php $this->load->view("criteria/create_data_criteria.php") ?>
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-xl-8 stretch-card">
						<div class="card">
							<div class="card-body">
								<?php $this->load->view("criteria/data_criteria.php") ?>
							</div>
						</div>
					</div>
				</div> <!-- row -->
			</div>

			<!-- partial:partials/_footer.html -->
			<?php $this->load->view("layouts/footer.php") ?>
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="<?php echo base_url();?>assets/assets/core/core.js"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="<?php echo base_url();?>assets/assets/chartjs/Chart.min.js"></script>
	<script src="<?php echo base_url();?>assets/assets/jquery.flot/jquery.flot.js"></script>
	<script src="<?php echo base_url();?>assets/assets/jquery.flot/jquery.flot.resize.js"></script>
	<script src="<?php echo base_url();?>assets/assets/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url();?>assets/assets/apexcharts/apexcharts.min.js"></script>
	<script src="<?php echo base_url();?>assets/assets/progressbar.js/progressbar.min.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="<?php echo base_url();?>assets/assets/feather-icons/feather.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/template.js"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
	<script src="<?php echo base_url();?>assets/js/datepicker.js"></script>
	<!-- end custom js for this page -->
</body>

</html>
