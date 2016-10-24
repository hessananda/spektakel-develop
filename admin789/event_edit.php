<?php
	date_default_timezone_set("Asia/Jakarta"); 
	include('config/koneksi.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Edit an Event');
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
						<li class="active">Edit Kegiatan</li>
					</ol>
					<!-- End breadcrumb -->
					<?php
						$id = $_GET['id'];
						$event = mysql_fetch_assoc(mysql_query("SELECT * FROM event WHERE event_id = '$id' ")); 
					?>

					<div class="the-box">
						<form id="eventform" method="post" action="event_action.php?action=edit&id=<?php echo $id ?>" class="form-horizontal" enctype="multipart/form-data" >
							
							<fieldset>
								<legend>Ubah Kegiatan / Edit Event</legend>

								<div class="form-group">
									<label class="col-lg-3 control-label">Judul Event / Event Name</label>
									<div class="col-lg-5">
										<input type="text" value="<?php echo $event['event_title'] ?>" class="form-control" name="event_title" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tanggal mulai/ Start Date </label>
									<div class="col-lg-5">
										<input type="date" value="<?php echo $event['event_start_date'] ?>" name="event_start_date" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tanggal Selesai/ Finish Date </label>
									<div class="col-lg-5">
										<input type="date" value="<?php echo $event['event_finish_date'] ?>" name="event_finish_date" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
									</div>
								</div>

								<?php
								$event_time = mysql_fetch_assoc(mysql_query("SELECT HOUR(event_start_time) as event_start_hour, MINUTE(event_start_time) as event_start_minute,
																		HOUR(event_finish_time) as event_finish_hour, MINUTE(event_finish_time) as event_finish_minute
																		FROM event WHERE event_id = '$id' ")); 

								?>

								<div class="form-group">
									<label class="col-lg-3 control-label">Jam mulai / Start time</label>
									<div class="col-lg-5">
									
									<select name="event_start_time_hour">
									<option value="<?php echo $event_time['event_start_hour'] ?>"><?php echo $event_time['event_start_hour'] ?></option>
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
									<?php 
										if ($event_time['event_start_minute'] <> 0) {
											$event_start_minute = $event_time['event_start_minute'];
										}
										else
										{
											$event_start_minute = '00';	
										}
									?>

									<option value="<?php echo $event_start_minute ?>"><?php echo $event_start_minute ?></option>
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
										<option value="<?php echo $event_time['event_finish_hour'] ?>"><?php echo $event_time['event_finish_hour'] ?></option>
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
									<?php
									if ($event_time['event_finish_minute'] <> 0) {
											$event_finish_minute = $event_time['event_finish_minute'];
										}
										else
										{
											$event_finish_minute = '00';	
										}
									?>

									<option value="<?php echo $event_finish_minute ?>"><?php echo $event_finish_minute ?></option>
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
											<option <?php echo $event['event_province']==$kece['id']?'selected':'' ; ?> value="<?php echo $kece['id']?>"><?php echo $kece['name'] ?></option>
											<?php
											} ?>										
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Kota / City</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_city" value="<?php echo $event['event_city'] ; ?>" placeholder="eg. #Jakarta" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Tempat Acara / Event Location</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_location" value="<?php echo $event['event_location'] ; ?>" placeholder="eg. #Lapangan Desa Cindaga" />
									</div>
								</div>
														
								<div class="form-group">
									<label class="col-lg-3 control-label">Detail Alamat / Detail Address</label>
									<div class="col-lg-5">
										<textarea name="event_detail_address" class="form-control no-resize"><?php echo $event['event_detail_address'] ; ?></textarea>
									</div>
								</div>								

								<div class="form-group">
									<label class="col-lg-3 control-label">Deskripsi / Description (Bahasa Indonesia)</label>
									<div class="col-lg-5">
										<textarea name="event_description" id="field" onkeyup="countChar(this)" rows="5" maxlength="500" class="form-control no-resize"><?php echo $event['event_description'] ?></textarea>
									<div id="charNum"></div>
									</div>
								</div>
<!-- 
								<div class="form-group">
									<label class="col-lg-3 control-label">Deskripsi / Description (English)</label>
									<div class="col-lg-5">
										<textarea id="field" onkeyup="countChar1(this)" name="event_description_english" rows="5" maxlength="500" class="form-control no-resize"><?php// echo $event['event_description_english'] ?></textarea>
										<div id="charNum1"></div>
									</div>
								</div> -->

								<input type="hidden" name="event_description_english" value="">

								<div class="form-group">
									<label class="col-lg-3 control-label">Informasi Tambahan / More Information</label>
									<div class="col-lg-5">
										<textarea name="event_more_info" class="form-control no-resize"><?php echo $event['event_more_info'] ; ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Link acara (jika ada) / Event link (if any)</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" value="<?php echo $event['event_link'] ; ?>" name="event_link" placeholder="http://" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Link Google Maps (jika ada) / Google Maps Link (if any)</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" value="<?php echo $event['event_gmap_link'] ; ?>" name="event_gmap_link" placeholder="http://" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Kategori Kegiatan / Event Category</label>
									<div class="col-lg-5">
									<select name="event_category">
										<option <?php echo $event['event_category']=='' OR $event['event_category']=='0' ?'selected':'' ; ?> value="Budaya">Kategori Kegiatan</option>
										<option <?php echo $event['event_category']=='Budaya'?'selected':'' ; ?> value="Budaya">Budaya</option>
										<option <?php echo $event['event_category']=='Festival'?'selected':'' ; ?> value="Festival">Festival</option>
										<option <?php echo $event['event_category']=='Film'?'selected':'' ; ?> value="Film">Film</option>
										<option <?php echo $event['event_category']=='Musik'?'selected':'' ; ?> value="Musik">Musik</option>
										<option <?php echo $event['event_category']=='Permainan'?'selected':'' ; ?> value="Permainan">Permainan</option>
										<option <?php echo $event['event_category']=='Pertunjukan'?'selected':'' ; ?> value="Pertunjukan">Pertunjukan</option>
										<option <?php echo $event['event_category']=='Tradisi'?'selected':'' ; ?> value="Tradisi">Tradisi</option>
									</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 control-label">Tag Kegiatan / Event Tag</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" value="<?php echo $event['event_tag'] ; ?>" name="event_tag" placeholder="eg. #orjentunggal, #tari, #musik, #theater, #senitradisi ..." />
									</div>
								</div>

								<div class="form-group">
										<label class="col-lg-3 control-label">Jenis Event / Event Type</label>
										<div class="col-lg-5">
										<?php if ($event['event_type']=='gratis/free') {
											$free = "checked='checked'";
											$paid = "";
											$both = "";
										}  
										elseif ($event['event_type']=='berbayar/paid') {
											$free = "";
											$paid = "checked='checked'";
											$both = "";
										}
										else
										{
											$free = "";
											$paid = "";
											$both = "checked='checked'";	
										}
										?>
											<div class="radio">
												<label>
													<input type="radio" <?php echo $paid ?> name="event_type" value="berbayar/paid" required data-bv-notempty-message="Event type is required" /> Berbayar / Paid 
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="event_type" <?php echo $free ?> value="gratis/free" /> Gratis / Free
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="event_type" <?php echo $both ?> value="keduanya/both" /> Keduanya / Both
												</label>
											</div>
											
										</div>
									</div>								

								<div class="form-group">
									<label class="col-lg-3 control-label">Gambar Lama / Old Image</label>
									<div class="col-lg-5">
										<img width="50%" height="50%" src="../images/events/<?php echo $event['event_image'] ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label"> Gantikan Gambar ?/ Replace Image ?</label>
									<div class="col-lg-5">
										<div class="input-group">
											<input type="text" class="form-control" readonly>
											<span class="input-group-btn">
												<span class="btn btn-default btn-file">
													Browse&hellip; <input type="file" name="event_image">
												</span>
											</span>
										</div><!-- /.input-group -->
									<span class="label label-warning" style="font-size:13px;">minimum image width 1080px</span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Kredit Gambar / Image Credit</label>
									<div class="col-lg-5">
									<input type="text" class="form-control" name="event_image_credit" value="<?php echo $event['event_image_credit'] ?>" placeholder="" />
									</div>
								</div>

							</fieldset>

							<hr>

							<legend>Panitia Acara / Event Organizer</legend>

							<?php
								$eo = mysql_fetch_assoc(mysql_query("SELECT * FROM event_organizer WHERE eo_id = '$event[event_organizer_id]' ")); 
							?>

							<input type="hidden" name="event_organizer_id" value="<?php echo $event['event_organizer_id'] ?>">

							<div class="form-group">
								<label class="col-lg-3 control-label">Nama panitia acara / Event Organizer Name</label>
								<div class="col-lg-5">
									<input type="text" value="<?php echo $eo['eo_name']?>" class="form-control" name="eo_name" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Nama kontak / Contact Name</label>
								<div class="col-lg-5">
									<input type="text" value="<?php echo $eo['eo_contact_name']?>" class="form-control" name="eo_contact_name" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Nomor kontak / Contact number</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" value="<?php echo $eo['eo_contact_number']?>" name="eo_contact_number" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Alamat panitia acara / Event Organizer Address</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" value="<?php echo $eo['eo_address']?>" name="eo_address" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Email / Email</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_email" value="<?php echo $eo['eo_email']?>" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Website</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_website"value="<?php echo $eo['eo_website']?>" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Facebook</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_facebook" value="<?php echo $eo['eo_facebook']?>" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Twitter</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_twitter" value="<?php echo $eo['eo_twitter']?>" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Instagram</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" name="eo_instagram" value="<?php echo $eo['eo_instagram']?>" />
								</div>
							</div>							

							<hr>
							<legend>Status Acara / Event Status</legend>

							<div class="form-group">
								
								<div class="col-lg-5">

									<select <?php echo $_SESSION['user_type']=='kontributor'?'disabled':'' ?> name="event_status" class="form-control" tabindex="2">
											<option value="<?php echo $event['event_status'] ?>"><?php echo $event['event_status'] ?></option>
											<option value="DITINJAU">DITINJAU</option>
											<option value="DISETUJUI">DISETUJUI</option>
											<option value="DITOLAK">DITOLAK</option>											
										</select>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<button type="submit" class="btn btn-primary">Simpan</button>
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