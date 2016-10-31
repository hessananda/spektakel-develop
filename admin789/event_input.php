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
					<h1 class="page-heading">Kegiatan</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="event_view.php">Kegiatan</a></li>
						<li class="active">Kegiatan Baru</li>
					</ol>
					<!-- End breadcrumb -->
					
					<div class="the-box">
						<form id="eventform" method="post" action="event_action.php?action=input" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Kegiatan Baru</legend>

								<div class="form-group">
									<label class="col-lg-3 control-label">Judul Kegiatan</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="event_title" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tanggal Mulai</label>
									<div class="col-lg-5">
										<input type="text" name="event_start_date" class="form-control datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tanggal Selesai</label>
									<div class="col-lg-5">
										<input type="text" name="event_finish_date" class="form-control datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Jam mulai</label>
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
									<label class="col-lg-3 control-label">Jam selesai</label>
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
									<label class="col-lg-3 control-label">Provinsi</label>
									<div class="col-lg-5">
									<?php $qry = mysql_query("SELECT * FROM provinces ORDER BY name") ?>
										<select name="event_province">
											<option value="0">PROVINSI</option>
											<?php while ($kece = mysql_fetch_assoc($qry)) {
											?>
											<option value="<?php echo $kece['id']?>"><?php echo $kece['name'] ?></option>
											<?php
											} ?>										
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Kota / Kabupaten</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_city" placeholder="eg. Jakarta" />
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 control-label">Tempat Kegiatan</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_location" placeholder="eg. Lapangan Desa Cindaga" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Alamat Detail Kegiatan</label>
									<div class="col-lg-5">
										<textarea name="event_detail_address" class="form-control no-resize"></textarea>
									</div>
								</div>								

								<div class="form-group">
									<label class="col-lg-3 control-label">Deskripsi</label>
									<div class="col-lg-5">
										<textarea id="field" onkeyup="countChar(this)" name="event_description" rows="5" maxlength="500" class="form-control no-resize"></textarea>
										<div id="charNum"></div>
									</div>
								</div>

								<!-- <div class="form-group">
									<label class="col-lg-3 control-label">Deskripsi / Description (English)</label>
									<div class="col-lg-5">
										<textarea id="field" onkeyup="countChar1(this)" name="event_description_english" rows="5" maxlength="500" class="form-control no-resize"></textarea>
										<div id="charNum1"></div>
									</div>
								</div> -->

								<input type="hidden" name="event_description_english" value="">

								<div class="form-group">
									<label class="col-lg-3 control-label">Informasi tambahan</label>
									<div class="col-lg-5">
										<textarea name="event_more_info" class="form-control no-resize"></textarea>
									</div>
								</div>

								<input type="hidden" name="event_link" value="" >

								<div class="form-group">
									<label class="col-lg-3 control-label">Tautan Google Maps</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="event_gmap_link" placeholder="http://" />
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 control-label">Kategori Kegiatan</label>
									<div class="col-lg-5">
									<select name="event_category">
										<option value="0">Kategori Kegiatan</option>
										<option value="Budaya">Budaya</option>
										<option value="Festival">Festival</option>
										<option value="Film">Film</option>
										<option value="Musik">Musik</option>
										<option value="Olahraga">Olahraga</option>
										<option value="Permainan">Permainan</option>
										<option value="Pertunjukan">Pertunjukan</option>
										<option value="Tradisi">Tradisi</option>
										<option value="Sastra">Sastra</option>
										<option value="Seni Rupa">Seni Rupa</option>
									</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tag Kegiatan</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_tag" placeholder="eg. #orjentunggal, #tari, #musik, #theater, #senitradisi ..." />
									</div>
								</div>

								<div class="form-group">
										<label class="col-lg-3 control-label">Jenis Kegiatan</label>
										<div class="col-lg-5">
											<div class="radio">
												<label>
													<input type="radio" name="event_type" value="berbayar/paid" required data-bv-notempty-message="Event type is required" /> Berbayar
												</label>
											</div>
											<div class="radio">
												<label>
													<input checked type="radio" name="event_type" value="gratis/free" /> Gratis
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="event_type" value="keduanya/both" /> Berbayar & Gratis
												</label>
											</div>
											
										</div>
									</div>															

								<div class="form-group">
									<label class="col-lg-3 control-label">Gambar</label>
									<div class="col-lg-5">
										<div class="input-group">
											<input type="text" class="form-control" readonly>
											<span class="input-group-btn">
												<span class="btn btn-default btn-file">
													Browse&hellip; <input type="file" name="event_image">
												</span>
											</span>
										</div><!-- /.input-group -->										
										<span class="label label-warning"  style="font-size:13px;">minimum image width 1080px</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 control-label">Kredit Gambar</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_image_credit" placeholder="" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Overlay (gelap)</label>
									<div class="col-lg-1">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="overlay" value="dark" />
											</label>
										</div>
									</div>
								</div>

							</fieldset>

							<hr>

							<legend>Panitia Kegiatan</legend>

							<div class="form-group">
								<label class="col-lg-3 control-label">Nama panitia Kegiatan</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_name" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Nama kontak</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_contact_name" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Nomor kontak</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_contact_number" />
								</div>
							</div>

							<input type="hidden" value="" class="form-control" name="eo_address" />
							

							<div class="form-group">
								<label class="col-lg-3 control-label">Email</label>
								<div class="col-lg-5">																	
									<input type="text" class="form-control" name="eo_email" placeholder="basuki@gmail.com" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Website</label>
								<div class="col-lg-5">								
									<input  placeholder="http://www.domainanda.com" type="text" class="form-control" name="eo_website" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Facebook</label>
								<div class="col-lg-5">								
									<input type="text"  placeholder="http://www.facebook.com/" class="form-control" name="eo_facebook" />								
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Twitter</label>
								<div class="col-lg-5">																	
									<input type="text" class="form-control" placeholder="http://twitter.com/" name="eo_twitter" />								
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Instagram</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" placeholder="http://www.instagram.com/" name="eo_instagram" />
								</div>
							</div>
															
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