<?php
	include('config/koneksi.php');
	include('config/Html_library.php');
	include('config/form_maker.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Input an Event');
?>
     <script>
      function countChar(val) {
        var len = val.value.length;
        var text_max = 500;
        if (len > text_max) {
          val.value = val.value.substring(0, text_max);
        } else {
          $('#charNum').text(text_max - len + ' character remaining');
        }
      };

        function countChar1(val) {
        var len = val.value.length;
        var text_max = 500;
        if (len > text_max) {
          val.value = val.value.substring(0, text_max);
        } else {
          $('#charNum1').text(text_max - len + ' character remaining');
        }
      };
    </script>	
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="wrapper">
			
			<!-- BEGIN TOP NAV -->
			<?php require_once 'top_nav.php'; ?>
			<!-- END TOP NAV -->					
			
			<!-- BEGIN SIDEBAR LEFT -->
			<?php include "sidebar_left.php" ?>
			<!-- END SIDEBAR LEFT -->
			
									
			<!-- BEGIN PAGE CONTENT -->
			<div class="page-content">
				
				
				<div class="container-fluid">
					<!-- Begin page heading -->
					<h1 class="page-heading">Event</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li class="active">Lihat Acara / View Event</li>
					</ol>
					<!-- End breadcrumb -->
					
					<div class="the-box">
						<form id="eventform" method="post" action="event_action.php?action=input" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Acara Baru / New Event</legend>

								<div class="form-group">
									<label class="col-lg-3 control-label">Judul Acara / Event Name</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="event_title" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tanggal Mulai / Start Date</label>
									<div class="col-lg-5">
										<input type="text" name="event_start_date" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tanggal Selesai / Finish Date</label>
									<div class="col-lg-5">
										<input type="text" name="event_finish_date" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Jam mulai / Start time</label>
									<div class="col-lg-5">
									
									<select name="event_start_time_hour">
									<?php for ($j=1; $j <= 9 ; $j++) { ?>
										<option value="0<?php echo $j ?>">0<?php echo $j ?></option>
									<?php	
									}								
									?>

									<?php for ($j=10; $j <= 24 ; $j++) { ?>
										<option value="<?php echo $j ?>"><?php echo $j ?></option>
									<?php	
									}								
									?>
										
									</select>
									:
									<select name="event_start_time_minute">
									<option value="00">00</option>
									<?php for ($m=15; $m <= 59 ; $m=$m+15) { ?>
										<option value="<?php echo $m ?>"><?php echo $m ?></option>
									<?php	
									}								
									?>
									</select>

									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Jam selesai / Finish time</label>
									<div class="col-lg-5">

										<select name="event_finish_time_hour">
									<?php for ($j=1; $j <= 9 ; $j++) { ?>
										<option value="0<?php echo $j ?>">0<?php echo $j ?></option>
									<?php	
									}								
									?>

									<?php for ($j=10; $j <= 24 ; $j++) { ?>
										<option value="<?php echo $j ?>"><?php echo $j ?></option>
									<?php	
									}								
									?>
										
									</select>
									:
									<select name="event_finish_time_minute">
									<option value="00">00</option>
									<?php for ($m=15; $m <= 59 ; $m=$m+15) { ?>
										<option value="<?php echo $m ?>"><?php echo $m ?></option>
									<?php	
									}								
									?>
									</select>

									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Provinsi / Province</label>
									<div class="col-lg-5">
									<?php $qry = mysql_query("SELECT * FROM provinces ORDER BY name") ?>
										<select name="event_province">
											<?php while ($kece = mysql_fetch_assoc($qry)) {
											?>
											<option value="<?php echo $kece['id']?>"><?php echo $kece['name'] ?></option>
											<?php
											} ?>										
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Kota / City</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_city" placeholder="eg. #Jakarta" />
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 control-label">Tempat Acara / Event Location</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_location" placeholder="eg. #Lapangan Desa Cindaga" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Alamat Detail Acara / Event Detail Address</label>
									<div class="col-lg-5">
										<textarea name="event_detail_address" class="form-control no-resize"></textarea>
									</div>
								</div>								

								<div class="form-group">
									<label class="col-lg-3 control-label">Deskripsi / Description (Bahasa Indonesia)</label>
									<div class="col-lg-5">
										<textarea id="field" onkeyup="countChar(this)" name="event_description" rows="5" maxlength="500" class="form-control no-resize"></textarea>
										<div id="charNum"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Deskripsi / Description (English)</label>
									<div class="col-lg-5">
										<textarea id="field" onkeyup="countChar1(this)" name="event_description_english" rows="5" maxlength="500" class="form-control no-resize"></textarea>
										<div id="charNum1"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Informasi tambahan / More Information</label>
									<div class="col-lg-5">
										<textarea name="event_more_info" class="form-control no-resize"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tautan acara (jika ada) / Event link (if any)</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="event_link" placeholder="http://" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tautan Google Maps / Google Maps Link</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="event_gmap_link" placeholder="http://" />
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 control-label">Kategori Acara / Event Category</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_category" placeholder="eg. #orjentunggal, #tari, #musik, #theater, #senitradisi ..." />
									</div>
								</div>

								<div class="form-group">
										<label class="col-lg-3 control-label">Jenis Acara / Event Type</label>
										<div class="col-lg-5">
											<div class="radio">
												<label>
													<input type="radio" name="event_type" value="berbayar/paid" required data-bv-notempty-message="Event type is required" /> Berbayar / Paid
												</label>
											</div>
											<div class="radio">
												<label>
													<input checked type="radio" name="event_type" value="gratis/free" /> Gratis / Free
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="event_type" value="keduanya/both" /> Keduanya / Both
												</label>
											</div>
											
										</div>
									</div>															

								<div class="form-group">
									<label class="col-lg-3 control-label">Gambar / Image</label>
									<div class="col-lg-5">
										<div class="input-group">
										<input type="text" class="form-control" readonly>
										<span class="input-group-btn">
											<span class="btn btn-default btn-file">
												Browse&hellip; <input type="file" name="event_image">
											</span>
										</span>
									</div><!-- /.input-group -->
									</div>
								</div>
							</fieldset>

							<hr>

							<legend>Panitia Acara / Event Organizer</legend>

							<div class="form-group">
								<label class="col-lg-3 control-label">Nama panitia acara / Event Organizer Name</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_name" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Nama kontak / Contact Name</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_contact_name" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Nomor kontak / Contact number</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_contact_number" />
								</div>
							</div>


							<div class="form-group">
								<label class="col-lg-3 control-label">Alamat panitia acara / Event Organizer Address</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_address" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Email / Email</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_email" />
								</div>
							</div>

								<?php textbox("Website","eo_website","") ?>
								<?php textbox("Facebook","eo_facebook","") ?>
								<?php textbox("Twitter","eo_twitter","") ?>
								<?php textbox("Instagram","eo_instagram","") ?>


							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div><!-- /.the-box -->
										
				</div><!-- /.container-fluid -->
				
				<!-- BEGIN FOOTER -->
				<?php require_once 'footer.php'; ?>
				<!-- END FOOTER --> 				
				
			</div><!-- /.page-content -->
		</div><!-- /.wrapper -->
		<!-- END PAGE CONTENT -->
				
		<!--
		===========================================================
		END PAGE
		===========================================================
		-->
<?php $html->destroy_main(); ?>