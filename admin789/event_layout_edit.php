<?php
	include('config/koneksi.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Edit Premum Content');
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
					<h1 class="page-heading">Premium Content</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="event_layout.php">Premium COntent</a></li>
						<li class="active">Premium Content</li>
					</ol>
					<!-- End breadcrumb -->
					
					<?php
						$id = $_GET['id'];
						$layout = mysql_fetch_assoc(mysql_query("SELECT * FROM event_layout WHERE event_layout_id = '$id' ")); 
					?>

					<div class="the-box">
						<form id="eventform" method="post" action="event_layout_action.php?action=edit&id=<?php echo $layout['event_layout_id'] ?>" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Pilih Event untuk Premium Content Urutan ke  <?php echo $layout['event_layout_urutan'] ?> </legend>

								<div class="form-group">
									<label class="col-lg-3 control-label">Pilih Event <p> (hanya yang sudah di approved) </p></label>
									<div class="col-lg-5">
										<select name="event_layout_event_id">
										
																				
										<?php 	
											
											$event_query = mysql_query("SELECT event_title, event_id FROM event WHERE event_start_date >= '$now' AND event_status = 'DISETUJUI' ORDER BY event_title  ");  
										
										while ( $event_loop = mysql_fetch_assoc($event_query) ) { ?>
											<option value="<?php echo $event_loop['event_id'] ?>" <?php echo $layout['event_layout_event_id']==$event_loop['event_id']?'selected':'' ?> ><?php echo $event_loop['event_title'] ?></option>
										<?php
										}?>

										</select>
									</div>
								</div>
								
							</fieldset>

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<button type="submit" class="btn btn-primary">Pilih</button>
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