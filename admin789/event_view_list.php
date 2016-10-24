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
		
						<button <?php echo $_SESSION['user_type']<>'super admin'?'style="display:none;"':'' ?> id="hapus-all" title="hapus event yang dicentang" type="button" class="btn btn-danger" 
						onclick="document.getElementById('delete').click()" ><i class="fa fa-trash-o"></i>Hapus Kegiatan</button>
						</div>
						
						<div class="col-md-6">
						<div class="pull-right">
						<button type="button" class="btn btn-success" onclick="location.href='event_view.php'"><i class="fa fa fa-th"></i></button>
						<button type="button" class="btn btn-success" onclick="location.href='event_view_list.php'"><i class="fa fa-list"></i></button>
						</div>
						</div>

					</div>
															
					<form action="event_action.php?action=delete_checked" method="post">																											
					<!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th style="width: 30px;"> </th>
									<th id="title">Title</th>
									<th>Status</th>
									<th>Tanggal Mulai</th>
									<th>Tanggal Selesai</th>
									<th>Kota</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>							
								<?php							

									$syarat = '';

									if ($_SESSION['user_type']=='kontributor') {
										$syarat = "WHERE id_user_yang_input = '".$_SESSION['user_id']."' AND event_input_by = '".$_SESSION['user_type']."' ";
									}

									$users = mysql_query("SELECT * from event ".$syarat." ORDER BY event_id DESC ");

									$no = 1;
									?>
									
									<?php

									while ($user = mysql_fetch_assoc($users)) {
										?>
											<!-- Modal -->
										<div class="modal fade" id="DefaultModal<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="DefaultModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="DefaultModalLabel"><center> Apakah Anda Yakin akan menghapus data <br><b><?php echo $user['event_title'] ?> </b> ?</center></h4>
											  </div>

											  <div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" onclick="location.href='event_action.php?action=hapus&id=<?php echo $user['event_id'] ?>' " >Hapus</button>
											  </div><!-- /.modal-footer -->
											</div><!-- /.modal-content -->
										  </div><!-- /.modal-doalog -->
										</div><!-- /#DefaultModal -->


										<?php


										// if( ($user['perjanjian_finish_date'] > "2015-11-30") && ($user['perjanjian_finish_date']< "2016-01-01") )
										// {
										// 	$status = 'label label-warning';
										// }


										// if ( ($user['perjanjian_finish_date']<=$warning) && ($user['perjanjian_finish_date']>=$danger) ) {
										// 	$status = "label label-warning";
										// }



										// if ( strtotime($user['perjanjian_finish_date']) > strtotime($sekarang)  && strtotime($user['perjanjian_finish_date']) <= strtotime($danger) ) {
										// 	$status = "label label-danger";
										// }
										// elseif (strtotime($user['perjanjian_finish_date']) > strtotime($danger)  && strtotime($user['perjanjian_finish_date']) <= strtotime($warning)) {
										// 	$status = "label label-warning";
										// }
										// elseif (strtotime($user['perjanjian_finish_date'])<= strtotime($sekarang)) {
										// 	$status = "label label-info";
										// }
										// else{
										// 	$status = "";
										// }


										if ($user['event_status']=='DITINJAU') {
											$status = 'info';
										}
										elseif ($user['event_status']=='DISETUJUI') {
											$status = 'success';
										}
										elseif ($user['event_status']=='DITOLAK') {
											$status = 'danger';
										}
										else
										{
											$status = 'default';	
										}

										?>
										<tr class="odd gradeX">
											<td class="table-danger">
											<?php 
												if($_SESSION['user_type']=='super admin'){
													?>
													<input type="checkbox" name="check[]" value="<?php echo $user['event_id'] ?>" >
													<?php
												}
												else{
													echo $no ;
												}
											?>
											
											</td>
											
											<td class="table-danger"><?php echo $user['event_title'] ?></td>
											<td class="table-danger"><span class="label label-<?php echo $status ?>"><?php echo $user['event_status'] ?></span></td>					
											<td><p hidden><?php echo $user['event_start_date'] ?></p> <?php echo tgl_indo($user['event_start_date']) ?></td>
											<td><p hidden><?php echo $user['event_finish_date'] ?></p><?php echo tgl_indo($user['event_finish_date']) ?></td>
											<td class="center"> <?php echo $user['event_city'] ?></td>
											<td><a href="event_edit.php?id=<?php echo $user['event_id'] ?>">Edit</a> 
											<?php
												if ($_SESSION['user_type']=='super admin' OR $_SESSION['user_type']=='admin konten') {
												?>
												/ <a data-toggle="modal" data-target="#DefaultModal<?php echo $no ?>" href="#" >Hapus</a>
												<?php
												}												
											?>
											
											</td>
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
					<input id="delete" style="display:none;" type="submit" value="Delete"/>	
					</form>									

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
		