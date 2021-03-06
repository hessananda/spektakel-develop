<?php
	include('config/koneksi.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Edit Layout');
?>

		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="wrapper">
			<!-- BEGIN TOP NAV -->
			<div class="top-navbar">
			
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
					<h1 class="page-heading">Slider Layout</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li class="active">Slider Layout</li>
					</ol>
					<!-- End breadcrumb -->
					
					<?php
						$id = $_GET['id'];
						$layout = mysql_fetch_assoc(mysql_query("SELECT * FROM slider_layout WHERE slider_id = '$id' ")); 
					?>

					<div class="the-box">
						<form id="eventform" method="post" action="slider_layout_action.php?action=edit&id=<?php echo $layout['slider_id'] ?>" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Pilih Event untuk Slider Urutan ke  <?php echo $layout['slider_urutan'] ?> </legend>

								<div class="form-group">
									<label class="col-lg-3 control-label">Pilih Event <p> (hanya yang sudah di approved) </p></label>
									<div class="col-lg-5">
										<select name="slider_layout_event_id">
										
										<?php 	$event = mysql_fetch_assoc(mysql_query("SELECT event_title, event_id FROM event WHERE event_id = '$layout[slider_event_id]' "));  ?>
											<option value="<?php echo $event['event_id'] ?>"><?php echo $event['event_title'] ?></option>
										
										<?php 	
											// $event_query = mysql_query("SELECT event_title, event_id FROM event WHERE event_status = 'approved' ");  
											$event_query = mysql_query("SELECT event_title, event_id FROM event ");  
										
										while ( $event_loop = mysql_fetch_assoc($event_query) ) { ?>
											<option value="<?php echo $event_loop['event_id'] ?>"><?php echo $event_loop['event_title'] ?></option>
										<?php
										}?>

										</select>
									</div>
								</div>
								
							</fieldset>

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