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
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
</head>


<body>
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Tabel Hasil</h6>
						<div class="table-responsive">
							<table id="dataTableExample" class="table">
								<thead>
									<tr>
										<th rowspan="2">Alternatif</th>
										<th colspan="6" class="text-center">Kriteria</th>
									</tr>
									<tr>
										<th>Waktu Pengiriman</th>
										<th>Jarak</th>
										<th>Biaya</th>
										<th>Armada</th>
										<th>Garansi</th>
									</tr>
									</theadData>
								<tbody>
									<tr>
										<td>Alternatif A</td>
										<td>1</td>
										<td>0.5</td>
										<td>1</td>
										<td>0.5</td>
										<td>1</td>
										</td>
									</tr>
									<tr>
										<td>Alternatif B</td>
										<td>2</td>
										<td>3</td>
										<td>2</td>
										<td>3</td>
										<td>2</td>
									</tr>
									<tr>
										<td>Alternatif C</td>
										<td>0.3</td>
										<td>0.5</td>
										<td>1</td>
										<td>5</td>
										<td>4</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-body">
						<h6 class="card-title">Normalisasi</h6>
						<div class="table-responsive">
							<table id="dataTableExample" class="table">
								<thead>
									<tr>
										<th rowspan="2">Alternatif</th>
										<th colspan="6" class="text-center">Kriteria</th>
									</tr>
									<tr>
										<th>Waktu Pengiriman</th>
										<th>Jarak</th>
										<th>Biaya</th>
										<th>Armada</th>
										<th>Garansi</th>
									</tr>
									</theadData>
								<tbody>
									<tr>
										<td>Alternatif A</td>
										<td>1</td>
										<td>0.5</td>
										<td>1</td>
										<td>0.5</td>
										<td>1</td>
									</tr>
									<tr>
										<td>Alternatif B</td>
										<td>2</td>
										<td>3</td>
										<td>2</td>
										<td>3</td>
										<td>2</td>
									</tr>
									<tr>
										<td>Alternatif C</td>
										<td>0.3</td>
										<td>0.5</td>
										<td>1</td>
										<td>5</td>
										<td>4</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-body">
						<h6 class="card-title">Perankingan</h6>
						<div class="table-responsive">
							<table id="dataTableExample" class="table">
								<thead>
									<tr>
										<th rowspan="2">Alternatif</th>
										<th colspan="6" class="text-center">Kriteria</th>
									</tr>
									<tr>
										<th>Waktu Pengiriman</th>
										<th>Jarak</th>
										<th>Biaya</th>
										<th>Armada</th>
										<th>Garansi</th>
									</tr>
									</theadData>
								<tbody>
									<tr>
										<td>Alternatif A</td>
										<td>1</td>
										<td>0.5</td>
										<td>1</td>
										<td>0.5</td>
										<td>1</td>
									</tr>
									<tr>
										<td>Alternatif B</td>
										<td>2</td>
										<td>3</td>
										<td>2</td>
										<td>3</td>
										<td>2</td>
									</tr>
									<tr>
										<td>Alternatif C</td>
										<td>0.3</td>
										<td>0.5</td>
										<td>1</td>
										<td>5</td>
										<td>4</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
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
	<script src="<?php echo base_url() ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
	<script src="<?php echo base_url() ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
</body>