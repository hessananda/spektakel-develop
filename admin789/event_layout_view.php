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
					<h1 class="page-heading">Premium Content</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li class="active">Premium Content</li>
					</ol>
					<!-- End breadcrumb -->
					
					<div class="row">
						<div class="col-lg-6">
							<div align="center">
								<img width="100%" height="100%" src="event_layout.png" >
																 
							</div>
						</div>

						<div class="col-lg-6">
							
							<!-- BEGIN DATA TABLE -->
							<div class="the-box">
								<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead class="the-box dark full">
										<tr>											
											<th>Urutan</th>
											<th>Event Title</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php

											$sql = "SELECT l.*, e.event_title FROM event_layout l
											 LEFT JOIN event e ON l.event_layout_event_id = e.event_id ORDER BY l.event_layout_urutan ";
											 $users = mysql_query($sql);									
											
											while ($user = mysql_fetch_assoc($users)) {
												?>
											
												<tr class="odd gradeX">													
													<td class="center"> <?php echo $user['event_layout_urutan'] ?></td>																		
													<td class="center"> <?php echo $user['event_title'] ?></td>
													<td><a href="event_layout_edit.php?id=<?php echo $user['event_layout_id'] ?>">Edit</a></td>
												</tr>

											<?php
											
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