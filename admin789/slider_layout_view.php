<?php
	include('config/koneksi.php');
	include('config/fungsi_tgl.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Event List');

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
					<h1 class="page-heading">Slider Layout </h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="#fakelink">Slider Layout</a></li>
					</ol>
					<!-- End breadcrumb -->
					
					<div class="row">
						<div class="col-lg-6">
							<div align="center">
								<img width="100%" height="100%" src="slider_layout.png" >
								<!-- <iframe src="http://www.spektakel.id/dev1" height="600" width="100%"></iframe> -->
								 
							</div>
						</div>

						<div class="col-lg-6">
							
							<!-- BEGIN DATA TABLE -->
							<div class="the-box">
								<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead class="the-box dark full">
										<tr>
											<th style="width: 30px;">No</th>
											<th>Urutan</th>
											<th>Event Title</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$users = mysql_query("SELECT l.*, e.event_title from slider_layout as l, event as e WHERE l.slider_event_id = e.event_id ");
											$no = 1;
											
											while ($user = mysql_fetch_assoc($users)) {
												?>
											
												<tr class="odd gradeX">
													<td class="table-danger"><?php echo $no ?></td>
													<td class="center"> <?php echo $user['slider_urutan'] ?></td>																		
													<td class="center"> <?php echo $user['event_title'] ?></td>
													<td><a href="slider_layout_edit.php?id=<?php echo $user['slider_id'] ?>">Edit</a></td>
												</tr>

											<?php
											$no++;		
											}
										?>								
									</tbody>
								</table>
								</div><!-- /.table-responsive -->
							</div><!-- /.the-box .default -->
							<!-- END DATA TABLE -->

						</div>
					</div>
				
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