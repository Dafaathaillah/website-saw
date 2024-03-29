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
	<title>Website SPK | SAW</title>
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
	<div class="container">
		<div class="col-lg-12 mt-3 stretch-card">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Input Sub Kriteria</h5>
					<?php
					$action_form = '/subcriteria/save/';
					?>
					<form class="cmxform" id="signupForm" method="post" action="<?=site_url($action_form)?>">
						<fieldset>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Kriteria</label>
								<select class="form-control" id="name" name="name">
								<option value="#" disabled>Pilih Kriteria</option>
								<?php
								if($criterias) {																					
									foreach ($criterias as $criteria) { ?>									
									<option value="<?= $criteria->id ?>"><?= $criteria->name ?></option>	
									<?php }
								} else { ?>									
								<?php } ?>									
								</select>
							</div>
							<div class="form-group">
								<label for="description">Deskripsi</label>
								<input id="description" class="form-control" name="description" type="text">
							</div>
							<div class="form-group">
								<label for="score">Score</label>
								<input id="score" class="form-control" name="score" type="text">
							</div>
							<input class="btn btn-primary" type="submit" value="Submit">
                            <button type="button" class="btn btn-warning">Cancel</button>
						</fieldset>
					</form>
				</div>
			</div>
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
