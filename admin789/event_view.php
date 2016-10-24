<?php
	include('config/koneksi.php');
	include('config/Html_library.php');
	require 'config/Zebra_Pagination/Zebra_Pagination.php';
	session_start();
	$html = new Html_library;
	$html->display_main('Event');

?>

<?php	
	function namauser($tipe,$id){
		if ($tipe=='promotor') {
			$user = mysql_fetch_assoc(mysql_query("SELECT full_name FROM member WHERE id = '$id'"));
			echo $user['full_name'];
		}
		else{
			$user = mysql_fetch_assoc(mysql_query("SELECT user_fullname FROM user WHERE user_id = '$id'"));
			echo $user['user_fullname'];
		}
	}

	$syarat = '';
	$syarat_all = '';
	if ($_SESSION['user_type']=='kontributor') {
		$syarat = "AND event_input_by = '".$_SESSION['user_type']."' AND id_user_yang_input = '".$_SESSION['user_id']."' ";
		$syarat_all = "WHERE id_user_yang_input = '".$_SESSION['user_id']."' AND event_input_by = '".$_SESSION['user_type']."' ";
	}


//start coding tentang buka tab
	$belum_direview_active = '';
	$belum_direview_in = '';
	$ditinjau_active = '';
	$ditinjau_in = '';
	$disetujui_active = '';
	$disetujui_in = '';
	$ditolak_active = '';
	$ditolak_in = '';
	$semua_active = '';
	$semua_in = '';
	$tab = '';


	if (isset($_REQUEST['tab'])) {
		$tab = $_REQUEST['tab'] ;		
		
		if ($tab=='belum_direview') {
			$belum_direview_active = 'active';
			$belum_direview_in = 'in active';
		}		
		if ($tab=='ditinjau') {
			$ditinjau_active = 'active';
			$ditinjau_in = 'in active';
		}
		elseif ($tab=='disetujui') {
			$disetujui_active = 'active';
			$disetujui_in = 'in active';
		}
		elseif ($tab=='ditolak') {
			$ditolak_active = 'active';
			$ditolak_in = 'in active';
		}
		elseif ($tab=='semua') {
			$semua_active = 'active';
			$semua_in = 'in active';
		}
	}
	else{
		$belum_direview_active = 'active';
		$belum_direview_in = 'in active';
	}
//selesai coding tentang buka tab

//start coding tentang search per tab
	
	$search_belum_direview_query = '';
	$search_ditinjau_query = '';
	$search_disetujui_query = '';
	$search_ditolak_query = '';
	$search_semua_query = '';

	if (isset($_POST['search_belum_direview'])) {
		$search_belum_direview_query = "AND event_title LIKE '%$_POST[search_belum_direview]%'";
	}
	if (isset($_POST['search_ditinjau'])) {
		$search_ditinjau_query = "AND event_title LIKE '%$_POST[search_ditinjau]%'";
	}
	if (isset($_POST['search_disetujui'])) {
		$search_disetujui_query = "AND event_title LIKE '%$_POST[search_disetujui]%'";
	}
	if (isset($_POST['search_ditolak'])) {
		$search_ditolak_query = "AND event_title LIKE '%$_POST[search_ditolak]%'";
	}
	if (isset($_POST['search_semua'])) {
		if ($syarat_all=='') {
			$search_semua_query = "WHERE event_title LIKE '%$_POST[search_semua]%'";
		}
		else{
			$search_semua_query = "AND event_title LIKE '%$_POST[search_semua]%'";
		}
		
	}
//selesai coding tentang search per tab

//start coding tentang pagination
	
	$records_per_page = 30;		
//selesai coding tentang pagination		

?>

<style type="text/css">
	.cover {
		  object-fit: cover;
		  width: 150px;
		  height: 150px;
		}
</style>
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
						<li class="active" >Kegiatan</li>					
					</ol>
					<!-- End breadcrumb -->

					<div class="row" style="padding-bottom:5px;">
						<div class="col-md-6">

						<button type="button" class="btn btn-info" onclick="location.href='event_input.php'"><i class="fa fa fa-plus"></i> Input Kegiatan</button>
		
						</div>
						
						<div class="col-md-6">

							<div class="pull-right">
								<button type="button" class="btn btn-success" onclick="location.href='event_view.php'"><i class="fa fa fa-th"></i></button>
								<button type="button" class="btn btn-success" onclick="location.href='event_view_list.php'"><i class="fa fa-list"></i></button>
							</div>
						</div>
					</div>					
					
					
					<!-- BEGIN FORM WIZARD -->
					<div class="panel with-nav-tabs panel-default panel-no-border">
					  <div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="<?php echo $belum_direview_active ?>"><a href="#wizard-1-step1" data-toggle="tab"><i class="fa fa-bookmark-o"></i>&nbsp;BELUM DIREVIEW</a></li>

							<li  class="<?php echo $ditinjau_active ?>"><a href="#wizard-1-step2" data-toggle="tab"><i class="fa fa-bookmark"></i>&nbsp;DITINJAU</a></li>

							<li  class="<?php echo $disetujui_active ?>"><a href="#wizard-1-step3" data-toggle="tab"><i class="fa fa-check"></i>&nbsp;DISETUJUI</a></li>

							<li class="<?php echo $ditolak_active ?>"><a href="#wizard-1-step4" data-toggle="tab"><i class="glyphicon glyphicon-remove-circle"></i>&nbsp; DITOLAK</a></li>

							<li class="<?php echo $semua_active ?>"><a href="#wizard-1-step7" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;SEMUA</a></li>
							
						</ul>
						
					  </div>
						<div id="panel-collapse-1" class="collapse in">
							<div class="tab-content">
								<div class="tab-pane fade <?php echo $belum_direview_in ?>" id="wizard-1-step1">
									<div class="panel-body">
<?php
								 $paginationbelumdireview = new Zebra_Pagination();								 
								 $paginationbelumdireview->variable_name('page_1');
								 $events_belum_direview = "SELECT SQL_CALC_FOUND_ROWS * FROM event 
								 WHERE event_status = 'BELUM DIREVIEW' ".$syarat." ".$search_belum_direview_query." 
								 ORDER BY event_id DESC  
								 LIMIT ". (($paginationbelumdireview->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."";

								if (!($result = mysql_query($events_belum_direview))) {
						            	// stop execution and display error message
						            	die(mysql_error());
						            }
						         // fetch the total number of records in the table
						         $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

						         // pass the total number of records to the pagination class
						         $paginationbelumdireview->records($rows['rows']);

						         // records per page
						         $paginationbelumdireview->records_per_page($records_per_page);

?>
									<div class="row" style="padding-bottom:15px;">
										<div class="col-md-12">								
											<form action="" method="post">
													<div class="form-group">
														<label>SEARCH</label>
														<div class="input-group">
														
															<span onclick="getElementById('submit_belum_direview').click();" class="input-group-addon info"><i class="fa fa-search"></i></span>
															<input type="text" name="search_belum_direview" placeholder="e.g. Festival Sunat Masal " class="form-control">
															<input type="hidden" name="tab" value="belum_direview">
															<button type="submit" id="submit_belum_direview" style="display: none;"></button>
																								
														</div>
													</div>
											</form>
										</div>										
									</div>

									<div class="row" style="padding-bottom:15px;">
										<div class="col-md-12">								
											<div class="pull-right">
												<ul class="pagination info">
												  <?php $paginationbelumdireview->render("","tab","belum_direview"); ?>								  
												</ul>
											</div>
										</div>										
									</div>

										<div class="row">												
<?php																			
											 while ($event = mysql_fetch_assoc($result)) { 
											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full property-card">
														<img class="cover" alt="spektakel.id" src="../images/events/<?php echo $event['event_image'] ?>">
														<div class="the-box no-margin bg-default">
															<div class="row">
																<div class="col-xs-12" style="padding-bottom:10px">
																	<h4 style="color:#808080;font-weight: bold;"><?php echo substr($event['event_title'],0,30); echo strlen($event['event_title'])>30?"...":'' ?></h4>
																	<span style="font-size:1em;">By : <?php echo namauser($event['event_input_by'],$event['id_user_yang_input']); ?> </span>
																	

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

								<div class="tab-pane fade  <?php echo $ditinjau_in ?>" id="wizard-1-step2">
									<div class="panel-body">
<?php
								 $paginationditinjau = new Zebra_Pagination();								 

								 $paginationditinjau->variable_name('page_2');
								 $events_ditinjau = "SELECT SQL_CALC_FOUND_ROWS * FROM event 
								 WHERE event_status = 'DITINJAU' ".$syarat."  ".$search_ditinjau_query." 
								 ORDER BY event_id DESC  
								 LIMIT ". (($paginationditinjau->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."";

								if (!($result = mysql_query($events_ditinjau))) {
						            	// stop execution and display error message
						            	die(mysql_error());
						            }
						         // fetch the total number of records in the table
						         $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

						         // pass the total number of records to the pagination class
						         $paginationditinjau->records($rows['rows']);

						         // records per page
						         $paginationditinjau->records_per_page($records_per_page);

?>

									<div class="row" style="padding-bottom:15px;">
										<div class="col-md-12">
									<form action="" method="post">
											<div class="form-group">
												<label>SEARCH</label>
												<div class="input-group">
													<span onclick="getElementById('submit_ditinjau').click();" class="input-group-addon info"><i class="fa fa-search"></i></span>
													<input name="search_ditinjau" type="text" placeholder="e.g. Festival Sunat Masal " class="form-control">
													<input type="hidden" name="tab" value="ditinjau">
													<button type="submit" id="submit_ditinjau" style="display: none;"></button>
													
												</div>
											</div>
									</form>

										</div>										

									</div>

									<div class="row" style="padding-bottom:15px;">
										<div class="col-md-12">
								
										<div class="pull-right">
											<ul class="pagination info">
											  <?php $paginationditinjau->render("","tab","ditinjau"); ?>								  
											</ul>
										</div>

										</div>
										
									</div>

										<div class="row">
													
										<?php
											 
											 while ($event = mysql_fetch_assoc($result)) { 
											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full property-card">
														<img class="cover" alt="spektakel.id" src="../images/events/<?php echo $event['event_image'] ?>">
														<div class="the-box no-margin no-border bg-default">
															<div class="row">
																<div class="col-xs-12" style="padding-bottom:10px">
																	<h4 style="color:#808080;font-weight: bold;"><?php echo substr($event['event_title'],0,30); echo strlen($event['event_title'])>30?"...":'' ?></h4>
																	<span style="font-size:1em;">By : <?php echo namauser($event['event_input_by'],$event['id_user_yang_input']); ?> </span>														
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
								<div class="tab-pane fade  <?php echo $disetujui_in ?>" id="wizard-1-step3">

<?php 								
								$paginationdisetujui = new Zebra_Pagination();								 
								$paginationdisetujui->variable_name('page_3');
							    $events_disetujui = "SELECT SQL_CALC_FOUND_ROWS * FROM event 
							    					WHERE event_status = 'DISETUJUI' ".$syarat."  ".$search_disetujui_query." 
							    					ORDER BY event_edited_time DESC  
							    					LIMIT ". (($paginationdisetujui->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."";

								if (!($result = mysql_query($events_disetujui))) {
						            	// stop execution and display error message
						            	die(mysql_error());
						            }
						         // fetch the total number of records in the table
						         $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

						         // pass the total number of records to the pagination class
						         $paginationdisetujui->records($rows['rows']);

						         // records per page
						         $paginationdisetujui->records_per_page($records_per_page);

?>

									<div class="panel-body">
									
									<div class="row" style="padding-bottom:15px;">
										<div class="col-md-12">
									<form action="" method="post">
											<div class="form-group">
												<label>SEARCH</label>
												<div class="input-group">
													<span onclick="getElementById('submit_disetujui').click();" class="input-group-addon info"><i class="fa fa-search"></i></span>
													<input type="text" name="search_disetujui" placeholder="e.g. Festival Sunat Masal " class="form-control">
													<input type="hidden" name="tab" value="disetujui">
													<button type="submit" id="submit_disetujui" style="display: none;"></button>

													
												</div>
											</div>
									</form>

										</div>										

									</div>

									<div class="row" style="padding-bottom:15px;">
										<div class="col-md-12">
								
										<div class="pull-right">
											<ul class="pagination info">
											  <?php $paginationdisetujui->render("","tab","disetujui"); ?>								  
											</ul>
										</div>

										</div>
										
									</div>														
											<div class="row">
													
											<?php
											 while ($event = mysql_fetch_assoc($result)) { 
											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full property-card">
														<img class="cover" alt="spektakel.id" src="../images/events/<?php echo $event['event_image'] ?>">
														<div class="the-box no-margin bg-default">
															<div class="row">
																<div class="col-xs-12" style="padding-bottom:10px">
																	<h4 style="color:#808080;font-weight: bold;"><?php echo substr($event['event_title'],0,30); echo strlen($event['event_title'])>30?"...":'' ?></h4>
																	<span style="font-size:1em;">By : <?php echo namauser($event['event_input_by'],$event['id_user_yang_input']); ?> </span>
																	
																</div><!-- /.col-xs-12 -->
																
															</div><!-- /.row -->
															<button class="btn btn-info btn-block" onclick="location.href = 'event_detail.php?status=pending&id=<?php echo $event['event_id']?>';">Lihat Detail</button>
															<br>
															<div class="row">
																<div class="col-xs-6" >
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
	<div class="tab-pane fade  <?php echo $ditolak_in ?>" id="wizard-1-step4">									
										
<?php 								
								$paginationditolak = new Zebra_Pagination();
								$paginationditolak->variable_name('page_4');
							    $events_ditolak = "SELECT SQL_CALC_FOUND_ROWS * FROM event 
							    				   WHERE event_status = 'DITOLAK' ".$syarat."  ".$search_ditolak_query." 
							    				   ORDER BY event_edited_time DESC  
							    				   LIMIT ". (($paginationditolak->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."";

								if (!($result = mysql_query($events_ditolak))) {
						            	// stop execution and display error message
						            	die(mysql_error());
						            }
						         // fetch the total number of records in the table
						         $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

						         // pass the total number of records to the pagination class
						         $paginationditolak->records($rows['rows']);

						         // records per page
						         $paginationditolak->records_per_page($records_per_page);

?>
									<div class="panel-body">
									
									<div class="row" style="padding-bottom:15px;">
										<div class="col-md-12">
									<form action="" method="post">
											<div class="form-group">
												<label>SEARCH</label>
												<div class="input-group">
													<span onclick="getElementById('submit_ditolak').click();" class="input-group-addon info"><i class="fa fa-search"></i></span>
													<input type="text" name="search_ditolak" placeholder="e.g. Festival Sunat Masal " class="form-control">
													<input type="hidden" name="tab" value="ditolak">
													<button type="submit" id="submit_ditolak" style="display: none;"></button>

													
												</div>
											</div>
									</form>

										</div>										

									</div>

									<div class="row" style="padding-bottom:15px;">
										<div class="col-md-12">
								
										<div class="pull-right">
											<ul class="pagination info">
											  <?php $paginationditolak->render("","tab","ditolak"); ?>								  
											</ul>
										</div>

										</div>
										
									</div>														

											<div class="row">
													
										<?php
											 
											 while ($event = mysql_fetch_assoc($result)) { 
											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full property-card">
														<img class="cover" alt="spektakel.id" src="../images/events/<?php echo $event['event_image'] ?>">
														<div class="the-box no-margin no-border bg-default">
															<div class="row">
																<div class="col-xs-12"  style="padding-bottom:10px">
																	<h4 style="color:#808080;font-weight: bold;"><?php echo substr($event['event_title'],0,30); echo strlen($event['event_title'])>30?"...":'' ?></h4>
																	<span style="font-size:1em;">By : <?php echo namauser($event['event_input_by'],$event['id_user_yang_input']); ?> </span>
																	
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

								<div class="tab-pane fade  <?php echo $semua_in ?>" id="wizard-1-step7">
			
<?php 								
								$paginationsemua = new Zebra_Pagination();
								$paginationsemua->variable_name('page_5');
							    $events_semua = "SELECT SQL_CALC_FOUND_ROWS * FROM event 
							    				".$syarat_all."  ".$search_semua_query." 
							    				ORDER BY event_edited_time DESC  
							    				LIMIT ". (($paginationsemua->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."";

								if (!($result = mysql_query($events_semua))) {
						            	// stop execution and display error message
						            	die(mysql_error());
						            }
						         // fetch the total number of records in the table
						         $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

						         // pass the total number of records to the pagination class
						         $paginationsemua->records($rows['rows']);

						         // records per page
						         $paginationsemua->records_per_page($records_per_page);

						         $status = '';						    
?>
							<div class="panel-body">
										
								<div class="row" style="padding-bottom:15px;">
									<div class="col-md-12">
										<form action="" method="post">	
											<div class="form-group">
												<label>SEARCH</label>
												<div class="input-group">
													<span onclick="getElementById('submit_semua').click();" class="input-group-addon info"><i class="fa fa-search"></i></span>
													<input type="text" name="search_semua" placeholder="e.g. Festival Sunat Masal " class="form-control">
													<input type="hidden" name="tab" value="semua">
													<button type="submit" id="submit_semua" style="display: none;"></button>
												</div>
											</div>
										</form>
									</div>										

								</div>

								<div class="row" style="padding-bottom:15px;">
									<div class="col-md-12">
							
									<div class="pull-right">
										<ul class="pagination info">
										  <?php $paginationsemua->render("","tab","semua"); ?>								  
										</ul>
									</div>

									</div>
									
								</div>

							<div class="row">
											
											<?php											
											 
											 while ($event = mysql_fetch_assoc($result)) { 

									 	     	if ($event['event_status']=='DITINJAU') {
													$status = 'info';
												}
												elseif ($event['event_status']=='DISETUJUI') {
													$status = 'success';
												}
												elseif ($event['event_status']=='DITOLAK') {
													$status = 'danger';
												}
												else
												{
													$status = 'default';	
												}

											?>
												<div class="col-sm-4">
													<!-- BEGIN PROPERTY CARD -->
													<div class="the-box full property-card">
														<img class="cover" alt="spektakel.id" src="../images/events/<?php echo $event['event_image'] ?>">
														<div class="the-box no-margin no-border bg-default">
															<div class="row">
																<div class="col-xs-12"  style="padding-bottom:10px">
																	<h4 style="color:#808080;font-weight: bold;"><?php echo substr($event['event_title'],0,30); echo strlen($event['event_title'])>30?"...":'' ?></h4>														
																	<span style="font-size:1em;">By : <?php echo namauser($event['event_input_by'],$event['id_user_yang_input']); ?> </span>
																	<br><br>
																	<span class="label label-<?php echo $status ?>"><?php echo $event['event_status'] ?></span>
																	
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