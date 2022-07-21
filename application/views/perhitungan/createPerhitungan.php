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
	<div class="container">
		<div class="col-lg-12 mt-3 stretch-card">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Perhitungan</h5>
					<?php
					$action_form = '/calculate/save/';
					?>
					<form class="cmxform" id="form_calculate" method="post" enctype="multipart/form-data" action="<?=site_url($action_form)?>">
						<fieldset>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Topik</label>
								<select class="form-control" id="topic_id" name="topic_id">
								<option value="#" disabled>Pilih Topik</option>
								<?php
								if($topic) {																					
									foreach ($topic as $topics) { ?>									
									<option value="<?= $topics->id ?>"><?= $topics->name ?></option>	
									<?php }
								} else { ?>									
								<?php } ?>									
								</select>
							</div> 
							<div class="form-group">
								<label for="exampleFormControlSelect1">Data Alternatif</label>
								<select class="form-control" id="data_alternatif_id" name="data_alternatif_id">
								<option value="#" disabled>Pilih Data Alternatif</option>
								<?php
								if($data_alternatif) {																					
									foreach ($data_alternatif as $data_alternatifs) { ?>									
									<option value="<?= $data_alternatifs->id ?>"><?= $data_alternatifs->name ?></option>	
									<?php }
								} else { ?>									
								<?php } ?>									
								</select>
							</div>     																	
							<?php
							if($criterias) {																					
								foreach ($criterias as $criteria) { ?>	
								<div class="form-group">		
									<label for="exampleFormControlSelect1"><?= $criteria->name ?></label>
									<input type='hidden' value="<?= $criteria->id ?>" id='criteria_id[]' name='criteria_id[]'>
									<select class="form-control" id="sub_kriteria_id[]" name="sub_kriteria_id[]">
									<option value="#" disabled>Pilih Sub Kriteria</option>						
									<?php									
									foreach ($subs as $sub) { 
										if($sub->criteria_id == $criteria->id){?>									
										<option value="<?= $sub->id ?>"><?= $sub->description ?></option>	
										<?php 
										}
									}
									?>	
									</select>
								</div>   
								<?php }
							}?>										
							<input class="btn btn-primary" type="submit" value="Choose">
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
