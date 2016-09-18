<?php
	include('config/koneksi.php');
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
					<h1 class="page-heading">Event</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="#fakelink">Event</a></li>
					</ol>
					<!-- End breadcrumb -->
					
					
					<!-- BEGIN FORM WIZARD -->
					<div class="panel with-nav-tabs panel-default panel-no-border">
					  <div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#wizard-1-step1" data-toggle="tab"><i class="fa fa-bookmark-o"></i>&nbsp;BELUM DIREVIEW</a></li>
							<li><a href="#wizard-1-step2" data-toggle="tab"><i class="fa fa-bookmark"></i>&nbsp;DITINJAU</a></li>
							<li><a href="#wizard-1-step3" data-toggle="tab"><i class="fa fa-check"></i>&nbsp;DISETUJUI</a></li>
							<li><a href="#wizard-1-step4" data-toggle="tab"><i class="glyphicon glyphicon-remove-circle"></i>&nbsp; DITOLAK</a></li>
							<li><a href="#wizard-1-step7" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;All</a></li>
						</ul>
					  </div>
						<div id="panel-collapse-1" class="collapse in">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="wizard-1-step1">
									<div class="panel-body">

										<div class="row">
												
										<?php

											$events = mysql_query("SELECT * FROM event WHERE event_status = 'BELUM DIREVIEW' ");
											 
											 while ($event = mysql_fetch_assoc($events)) { 
											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full no-border property-card">
														<img src="../images/events/<?php echo $event['event_image'] ?>" alt="Image">
														<div class="the-box no-margin no-border bg-default">
															<div class="row">
																<div class="col-xs-12">
																	<h1><?php echo $event['event_title'] ?></h1>
																	<p><?php echo $event['event_description'] ?></p>

																</div><!-- /.col-xs-12 -->
																
															</div><!-- /.row -->
															<button class="btn btn-info btn-block" onclick="location.href = 'event_detail.php?status=pending&id=<?php echo $event['event_id']?>';">Lihat Detail</button>
															<br>
															<div class="row">
																<div class="col-xs-6">
																	<button class="btn btn-primary btn-block" onclick="location.href = 'event_edit.php?id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
																	Ubah/Edit
																	</button>
																</div><!-- /.col-xs-6 -->
																<div class="col-xs-6">
																	<button class="btn btn-danger btn-block" onclick="location.href = 'event_action.php?action=hapus&id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
																	Hapus/Delete
																	</button>
																</div><!-- /.col-xs-6 -->
															</div><!-- /.row -->

														</div><!-- /.the-box .no-margin .no-border .bg-success -->
													</div><!-- /.the-box no-margin -->
													<!-- END PROPERTY CARD -->
												</div><!-- /.col-sm-4 -->
											

											<?php
											} ?>
										</div><!-- /.row -->								
									</div><!-- /.panel-body -->
									
								</div>

								<div class="tab-pane fade" id="wizard-1-step2">
									<div class="panel-body">
										<div class="row">
													
										<?php

											$events = mysql_query("SELECT * FROM event WHERE event_status = 'DITINJAU' ORDER BY event_edited_time DESC ");
											 
											 while ($event = mysql_fetch_assoc($events)) { 
											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full no-border property-card">
														<img src="../images/events/<?php echo $event['event_image'] ?>" alt="Image">
														<div class="the-box no-margin no-border bg-default">
															<div class="row">
																<div class="col-xs-12">
																	<h1><?php echo $event['event_title'] ?></h1>
																	<p><?php echo $event['event_description'] ?></p>

																</div><!-- /.col-xs-12 -->
																
															</div><!-- /.row -->
															<button class="btn btn-info btn-block" onclick="location.href = 'event_detail.php?status=pending&id=<?php echo $event['event_id']?>';">Lihat Detail</button>
															<br>
															<div class="row">
																<div class="col-xs-6">
																	<button class="btn btn-primary btn-block" onclick="location.href = 'event_edit.php?id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
																	Ubah/Edit
																	</button>
																</div><!-- /.col-xs-6 -->
																<div class="col-xs-6">
																	<button class="btn btn-danger btn-block" onclick="location.href = 'event_action.php?action=hapus&id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
																	Hapus/Delete
																	</button>
																</div><!-- /.col-xs-6 -->
															</div><!-- /.row -->

														</div><!-- /.the-box .no-margin .no-border .bg-success -->
													</div><!-- /.the-box no-margin -->
													<!-- END PROPERTY CARD -->
												</div><!-- /.col-sm-4 -->
											

											<?php
											} ?>

											</div><!-- /.row -->
									</div><!-- /.panel-footer -->
								</div>
								<div class="tab-pane fade" id="wizard-1-step3">
									<div class="panel-body">
										
											<div class="row">
													
										<?php

											$events = mysql_query("SELECT * FROM event WHERE event_status = 'DISETUJUI' ORDER BY event_edited_time DESC  ");
											 
											 while ($event = mysql_fetch_assoc($events)) { 
											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full no-border property-card">
														<img src="../images/events/<?php echo $event['event_image'] ?>" alt="Image">
														<div class="the-box no-margin no-border bg-default">
															<div class="row">
																<div class="col-xs-12">
																	<h1><?php echo $event['event_title'] ?></h1>
																	<p><?php echo $event['event_description'] ?></p>

																</div><!-- /.col-xs-12 -->
																
															</div><!-- /.row -->
															<button class="btn btn-info btn-block" onclick="location.href = 'event_detail.php?status=pending&id=<?php echo $event['event_id']?>';">Lihat Detail</button>
															<br>
															<div class="row">
																<div class="col-xs-6">
																	<button class="btn btn-primary btn-block" onclick="location.href = 'event_edit.php?id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
																	Ubah/Edit
																	</button>
																</div><!-- /.col-xs-6 -->
																<div class="col-xs-6">
																	<button class="btn btn-danger btn-block" onclick="location.href = 'event_action.php?action=hapus&id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
																	Hapus/Delete
																	</button>
																</div><!-- /.col-xs-6 -->
															</div><!-- /.row -->

														</div><!-- /.the-box .no-margin .no-border .bg-success -->
													</div><!-- /.the-box no-margin -->
													<!-- END PROPERTY CARD -->
												</div><!-- /.col-sm-4 -->
											

											<?php
											} ?>	
												
												</div><!-- /.row -->
									</div><!-- /.panel-body -->
									
								</div>					
<!-- PANEL BARU -->
	<div class="tab-pane fade" id="wizard-1-step4">
									<div class="panel-body">
										
											<div class="row">
													
										<?php

											$events = mysql_query("SELECT * FROM event WHERE event_status = 'DITOLAK' ORDER BY event_edited_time DESC  ");
											 
											 while ($event = mysql_fetch_assoc($events)) { 
											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full no-border property-card">
														<img src="../images/events/<?php echo $event['event_image'] ?>" alt="Image">
														<div class="the-box no-margin no-border bg-default">
															<div class="row">
																<div class="col-xs-12">
																	<h1><?php echo $event['event_title'] ?></h1>
																	<p><?php echo $event['event_description'] ?></p>

																</div><!-- /.col-xs-12 -->
																
															</div><!-- /.row -->
															<button class="btn btn-info btn-block" onclick="location.href = 'event_detail.php?status=pending&id=<?php echo $event['event_id']?>';">Lihat Detail</button>
															<br>
															<div class="row">
																<div class="col-xs-6">
																	<button class="btn btn-primary btn-block" onclick="location.href = 'event_edit.php?id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
																	Ubah/Edit
																	</button>
																</div><!-- /.col-xs-6 -->
																<div class="col-xs-6">
																	<button class="btn btn-danger btn-block" onclick="location.href = 'event_action.php?action=hapus&id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
																	Hapus/Delete
																	</button>
																</div><!-- /.col-xs-6 -->
															</div><!-- /.row -->

														</div><!-- /.the-box .no-margin .no-border .bg-success -->
													</div><!-- /.the-box no-margin -->
													<!-- END PROPERTY CARD -->
												</div><!-- /.col-sm-4 -->
											

											<?php
											} ?>	
												
												</div><!-- /.row -->
									</div><!-- /.panel-body -->
									
								</div>
<!-- END OF PANEL BARU -->
								


								<div class="tab-pane fade" id="wizard-1-step7">
									<div class="panel-body">
										
												<div class="row">
											
											<?php
											$events = mysql_query("SELECT * FROM event ORDER BY event_edited_time DESC ");
											 
											 while ($event = mysql_fetch_assoc($events)) { 
											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full no-border property-card">
														<img src="../images/events/<?php echo $event['event_image'] ?>" alt="Image">
														<div class="the-box no-margin no-border bg-default">
															<div class="row">
																<div class="col-xs-12">
																	<h1><?php echo $event['event_title'] ?></h1>
																	<p><?php echo $event['event_description'] ?></p>

																</div><!-- /.col-xs-12 -->
																
															</div><!-- /.row -->
															<button class="btn btn-info btn-block" onclick="location.href = 'event_detail.php?status=pending&id=<?php echo $event['event_id']?>';">Lihat Detail</button>
															<br>
															<div class="row">
																<div class="col-xs-6">
																	<button class="btn btn-primary btn-block" onclick="location.href = 'event_edit.php?id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
																	Ubah/Edit
																	</button>
																</div><!-- /.col-xs-6 -->
																<div class="col-xs-6">
																	<button class="btn btn-danger btn-block" onclick="location.href = 'event_action.php?action=hapus&id=<?php echo $event['event_id']?>';">
																	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
																	Hapus/Delete
																	</button>
																</div><!-- /.col-xs-6 -->
															</div><!-- /.row -->

														</div><!-- /.the-box .no-margin .no-border .bg-success -->
													</div><!-- /.the-box no-margin -->
													<!-- END PROPERTY CARD -->
												</div><!-- /.col-sm-4 -->
											
											<?php
											} ?>	
												</div><!-- /.row -->	
									
										
									</div><!-- /.panel-body -->
									
									</div><!-- /.panel-footer -->
								</div>
							</div><!-- /.tab-content -->
						</div><!-- /.collapse in -->
					</div><!-- /.panel .panel-success -->
					<!-- END FORM WIZARD -->
				
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