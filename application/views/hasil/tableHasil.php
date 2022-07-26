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

<?php
 
?>
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
								if($data) {										
									foreach ($data as $key) { 
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
									}
								}?>
								<tr>
								<td>Bobot</td>								
								<?php
								$topic = 3;
								if($bobot) {										
									foreach ($bobot as $key) { 
										if($key){?>																
										<td><?= $key->criteria_bobot ?></td>																					
									<?php									
									}
								}
								} else { ?>
									<td class="text-center" colspan="6">Tidak ada hasil perhitungan!!</td>
								<?php } ?>								
								</tr>
								<tr>
								<td>Status</td>								
								<?php								
								if($bobot) {										
									foreach ($bobot as $key) { 
										if($key){?>																
										<td><?= $key->criteria_status ?></td>																					
									<?php									
									}
								}
								} else { ?>
									<td class="text-center" colspan="6">Tidak ada hasil perhitungan!!</td>
								<?php } ?>								
								</tr>
								<?php
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
									<th>Alternative</th>
									<?php
									if($criteria) {										
										foreach ($criteria as $key) { ?>											
												<th><?= $key->name ?></th>																																																																	
										<?php }
									}?>
									<th>Vector</th>
								</tr>								
							</thead>
							<tbody>
								<?php	
								$result = array();
								$result_final = array();							
								if($data) {				
									$no = 0;															
									foreach ($data as $key) { 
										$no++;
										if($key){?>		
										<tr>									
										<td><?= $key->data_name ?></td>	
										<?php												
										$hasil_normalisasi = 0;										
											foreach ($scores as $sub) {
												 												
												if($sub->alternatif_id == $key->data_alternatif_id){																				
													if($sub->sts == "Cost"){?>												
													<?php														
														$query = "SELECT MIN(sub_kriteria.score) AS score FROM calculate JOIN sub_kriteria ON sub_kriteria.id = calculate.sub_kriteria_id WHERE calculate.criteria_id = $sub->criteria_id";
														$sql = $this->db->query($query);																																					
														// $min_value = $sql;
														if ($sql->num_rows() > 0) {
															$min_value = $sql->row()->score;
														}
														number_format((float)$calculate_result = $min_value / $sub->score, 3);
														number_format((float)$cross_result = $calculate_result * $sub->bobot, 1);
														$hasil_normalisasi = $hasil_normalisasi + $cross_result;																												
													?>													
													<td><?= round($calculate_result, 2)?></td>																																
													<?php 
													} else if ($sub->sts == "Benefit"){ 										
														$query = "SELECT MAX(sub_kriteria.score) AS score FROM calculate JOIN sub_kriteria ON sub_kriteria.id = calculate.sub_kriteria_id WHERE calculate.criteria_id = $sub->criteria_id";																																
														$sql = $this->db->query($query);
														if ($sql->num_rows() > 0) {
															$max_value = $sql->row()->score;
														}														
														number_format((float)$calculate_result = $sub->score / $max_value , 1);
														number_format((float)$cross_result = $calculate_result * $sub->bobot, 1);
														$hasil_normalisasi = $hasil_normalisasi + $cross_result;
													?>
													<td><?= round($calculate_result, 2) ?></td>
													<?php
													} else {
														echo '<td> 0 </td>';
													}											
												}
											}
											$result[$no]['score'] = $hasil_normalisasi;	
											$result[$no]['name'] = $key->data_name;																																
										?>
										
										<td><?= round($hasil_normalisasi, 2) ?></td>																				
										</tr>	
									<?php									
									// Cost
									// number_format($hasil = $data_min['min'] / $data['bobot'], 3);
									// echo  number_format($hasil_kali = $hasil * $data['weight'], 3);
									// $hasil_normalisasi = $hasil_normalisasi + $hasil_kali;

									// Benefit
									// number_format($hasil = $data['bobot'] / $data_max['max'], 3);
									// echo  number_format($hasil_kali = $hasil * $data['weight'], 3);
									// $hasil_normalisasi = $hasil_normalisasi + $hasil_kali;
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
								// if($data){
								// 	foreach ($data as $key => $value) {
								// 		$result['name'] = $value;
								// 	}
								// }
								// array_push($result_final, $result);											
								rsort($result);
								$no=0;															
								foreach ($result as $rank) { 									
									$no++;
									?>
									<tr>										
										<td><?php echo $rank['name']; ?></td>
										<td><?php echo $rank['score']; ?></td>										
										<td><?php echo $no; ?></td>	
										
									</tr>
								<?php } 								
								 ?>								
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
