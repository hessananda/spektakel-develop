<?php

	$soalapa="slider"; // menentukan tabel apa yang dipilih
	$menu_title = "Slider"; // menentukan judul halaman ini

	date_default_timezone_set("Asia/Jakarta"); 
	include('config/koneksi.php');
	include('config/fungsi_tgl.php');
	include('config/Html_library.php');

	session_start();
	$html = new Html_library;
	$html->display_main('Input an Event');
?>

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
					<h1 class="page-heading">Detail Kegiatan</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="event_view.php">Kegiatan</a></li>
						<li class="active">Detail Kegiatan</li>
					</ol>
					<!-- End breadcrumb -->
					
					<?php
					
						$id = $_GET['id'];
						$event = mysql_fetch_assoc(mysql_query("SELECT * FROM event e WHERE event_id = '$id' ")); 
						$user = mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE user_id = '$event[id_user_yang_input]' ")); 
					?>
					
					<div class="row" style="padding-bottom:15px;">
						<div class="col-md-12">								
						<button type="button" class="btn btn-info" onclick="location.href='event_view.php'"><i class="fa fa-mail-reply"></i> Kembali</button>
						</div>										
					</div>

					<div class="the-box no-border">
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<div id="imagesync1" class="owl-carousel">
								  <div class="item full"><img src="../images/events/<?php echo $event['event_image'] ?>" alt="Image"></div>
								</div>
								
							</div><!-- /.col-md-4 col-sm-6 -->
							<div class="col-md-8 col-sm-6">
								<h2 class="medium-heading more-margin-bottom"><?php echo $event['event_title'] ?> 
								<span class="text-danger pull-right"><?php echo $event['event_type'] ?> </span></h2>
								<span style="font-size:0.8em;">	edited by <?php echo $user['user_fullname'] ?> </span>	
								<p>				 

								</br>

								<?php echo $event['event_description'] ?>
								<br>
								<?php echo $event['event_description_english'] ?>
								</p>
								
								<div class="panel-group" id="accordion-1">
									<div class="panel panel-default">
									  <div class="panel-heading">
										<h3 class="panel-title">
											<a class="block-collapse" data-parent="#accordion-1" data-toggle="collapse" href="#accordion-1-child-1">
											Informasi lebih lanjut / More information
											<span class="right-content">
												<span class="right-icon">
													<i class="glyphicon glyphicon-minus icon-collapse"></i>
												</span>
											</span>
											</a>
										</h3>
									  </div>
										<div id="accordion-1-child-1" class="collapse out">
										  <div class="panel-body">
											<table>
												<tr>
													<td>Tanggal Mulai/ Start Date</td>
													<td>&nbsp&nbsp:&nbsp&nbsp</td>
													<td><?php echo tgl_indo($event['event_start_date']) ; ?></td>
												</tr>
												<tr>
													<td>Tanggal Selesai/ Finish Date</td>
													<td>&nbsp&nbsp:&nbsp&nbsp</td>
													<td><?php echo tgl_indo($event['event_finish_date']) ; ?></td>
												</tr>
												<tr>
													<td>Waktu Mulai / Start Time</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo date("H:i", strtotime($event['event_start_time'])) ; ?></td>
												</tr>
												<tr>
													<td>Waktu Selesai / Finish Time</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo date("H:i", strtotime($event['event_finish_time'])) ?></td>
												</tr>
												<tr>
													<td>Provinsi / Province</td>
													<td>&nbsp&nbsp:</td>
													<td><?php
													$sql = "SELECT * FROM provinces WHERE id = '$event[event_province]' ";
													$query = mysql_query($sql);
													$province = mysql_fetch_assoc($query); 
													 echo $province['name'] ; ?></td>
												</tr>

												<tr>
													<td>Kota / City</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $event['event_city'] ; ?></td>
												</tr>
												<tr>
													<td>Lokasi / Location</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $event['event_location'] ; ?></td>
												</tr>

												<tr>
													<td>Detail Alamat / Detail Address</td>
													<td>&nbsp&nbsp:&nbsp&nbsp</td>
													<td><?php echo $event['event_detail_address'] ; ?></td>
												</tr>
												<tr>
													<td>Tautan acara / Event link</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $event['event_link'] ; ?></td>
												</tr>
												<!-- <tr>
													<td>Tautan Google Maps / Google Maps Link</td>
													<td>&nbsp&nbsp:</td>
													<td><?php //echo $event['event_gmap_link'] ; ?></td>
												</tr> -->
												<tr>
													<td>Kategori Event / Event Category</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $event['event_category'] ; ?></td>
												</tr>

											
											</table>
											<hr>
											<?php $eo = mysql_fetch_assoc(mysql_query("SELECT * FROM event_organizer WHERE eo_id = '$event[event_organizer_id]' ")) ?>
											<table>
												<tr>
													<td>Nama panitia acara / Event Organizer Name</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $eo['eo_name'] ; ?></td>
												</tr>
												<tr>
													<td>Nama kontak / Contact Name</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $eo['eo_contact_name'] ; ?></td>
												</tr>
												<tr>
													<td>Nomor kontak / Contact Number</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $eo['eo_contact_number'] ; ?></td>
												</tr>
												<tr>
													<td>Nomor kontak / Contact Number</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $eo['eo_email'] ; ?></td>
												</tr>
												<tr>
													<td>Alamat Panitia Acara / Event Organizer Address</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $eo['eo_address'] ; ?></td>
												</tr>

												<tr>
													<td>Website</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $eo['eo_website'] ; ?></td>
												</tr>
												<tr>
													<td>Facebook</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $eo['eo_facebook'] ; ?></td>
												</tr>

												<tr>
													<td>Facebook</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $eo['eo_twitter'] ; ?></td>
												</tr>

												<tr>
													<td>Instagram</td>
													<td>&nbsp&nbsp:</td>
													<td><?php echo $eo['eo_instagram'] ; ?></td>
												</tr>

											</table>

										  </div><!-- /.panel-body -->
										</div><!-- /.collapse in -->
									</div><!-- /.panel panel-default -->
								</div><!-- /.panel-group -->
								
								<div class="row">
									<div class="col-sm-3 col-xs-6">
									<form action="event_action.php?action=update&id=<?php echo $id ?>" method="POST" >
										<select <?php echo $_SESSION['user_type']=='kontributor'?'disabled':'' ?> name="event_status">
											<option value="DITINJAU">DITINJAU</option>
											<option value="DISETUJUI">DISETUJUI</option>
											<option value="DITOLAK">DITOLAK</option>	
										</select>
									</div><!-- /.col-xs-6 -->
										<div class="col-sm-9 col-xs-6">
											<button <?php echo $_SESSION['user_type']=='kontributor'?'style="display:none;" ':'' ?> class="btn btn-success">Simpan Perubahan/Save Change</button>
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<a href="event_edit.php?id=<?php echo $id ?>" class="btn btn-warning">Edit</a>
										</div><!-- /.col-xs-6 -->
									</form>

								</div><!-- /.row -->
								
							</div><!-- /.col-md-8 col-sm-6 -->
						</div><!-- /.row -->
					</div><!-- /.the-box no-border -->
					
				
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