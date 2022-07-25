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
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<!-- <h6 class="card-title">Tabel Hasil</h6> -->
						<div class="table-responsive">
						<h3>Matriks Keputusan</h3>
						<table id="dataTableExample" class="table">
							<thead>
								<tr>
									<th rowspan="2">Alternative</th>
									<?php
									if($criteria) {										
										foreach ($criteria as $key) { ?>											
												<th><?= $key->name ?></th>																																																																	
										<?php }
									}?>
								</tr>								
							</thead>
							<tbody>
								<?php
								$topic = 3;
								if($data_alternatif) {										
									foreach ($data_alternatif as $key) { 
										if($key){?>		
										<tr>									
										<td><?= $key->data_name ?></td>	
										<?php									
											foreach ($scores as $sub) {									
												if($sub->alternatif_id == $key->data_alternatif_id){?>									
												<td><?= $sub->score ?></td>	
												<?php 
												} 											
											}
										?>
										</tr>	
									<?php
									$topic++; 
									}
								}
								} else { ?>
									<td class="text-center" colspan="6">Tidak ada hasil perhitungan!!</td>
								<?php } ?>								
							</tbody>
						</table>
						</div>
					</div>
					<div class="card-body">
						<!-- <h6 class="card-title">Tabel Hasil</h6> -->
						<div class="table-responsive">
						<h3>Normalisasi</h3>
						<table id="dataTableExample" class="table">
							<thead>
								<tr>
									<th rowspan="2">Alternative</th>
									<?php
									if($criteria) {										
										foreach ($criteria as $key) { ?>											
												<th><?= $key->name ?></th>																																																																	
										<?php }
									}?>
								</tr>								
							</thead>
							<tbody>
								<?php
								$topic = 3;
								if($data_alternatif) {										
									foreach ($data_alternatif as $key) { 
										if($key){?>		
										<tr>									
										<td><?= $key->data_name ?></td>	
										<?php									
											foreach ($scores as $sub) {									
												if($sub->alternatif_id == $key->data_alternatif_id){?>									
												<td><?= $sub->score ?></td>	
												<?php 
												} 											
											}
										?>
										</tr>	
									<?php
									$topic++; 
									}
								}
								} else { ?>
									<td class="text-center" colspan="6">Tidak ada hasil perhitungan!!</td>
								<?php } ?>								
							</tbody>
						</table>
						</div>
					</div>
					<div class="card-body">
						<!-- <h6 class="card-title">Tabel Hasil</h6> -->
						<div class="table-responsive">
						<h3>Hasil</h3>
						<table id="dataTableExample" class="table">
							<thead>
								<tr>																		
									<th>Alternative</th>
									<th>Score</th>
									<th>Rank</th>
									
								</tr>								
							</thead>
							<tbody>
								<?php
								$no = 0;
								if($results) {										
									foreach ($results as $result) { 
										$no++;
										if($result){?>		
										<tr>									
										<td><?= $result->name ?></td>											
										<td><?= $result->hasil ?></td>
										<td><?= $no ?></td>
										</tr>	
									<?php
									 
									}
								}
								} else { ?>
									<td class="text-center" colspan="6">Tidak ada hasil perhitungan!!</td>
								<?php } ?>								
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
</body>