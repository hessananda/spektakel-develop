<?php
	include('config/koneksi.php');
	include('config/fungsi_tgl.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Team');

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
					<h1 class="page-heading">Team</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li class="active">Team</li>
					</ol>
					<!-- End breadcrumb -->

					<div class="row" style="padding-bottom:5px;">
						<div class="col-md-6">
							<button type="button" class="btn btn-info" onclick="location.href='team_input.php'"><i class="fa fa fa-plus"></i> Input Team</button>
						</div>
						
						<div class="col-md-6">							
						</div>
					</div>	
					

					<!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th style="width: 30px;">No</th>
									<th>Title</th>									
									<th>Position</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$users = mysql_query("SELECT * from team ORDER BY team_id DESC ");
									$no = 1;
									
									while ($user = mysql_fetch_assoc($users)) {
										?>
											<!-- Modal -->
										<div class="modal fade" id="DefaultModal<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="DefaultModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="DefaultModalLabel"><center> Apakah Anda Yakin akan menghapus data <br><b><?php echo $user['team_name'] ?> </b> ?</center></h4>
											  </div>

											  <div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" onclick="location.href='team_action.php?action=hapus&id=<?php echo $user['team_id'] ?>' " >Hapus</button>
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

										?>
										<tr class="odd gradeX">
											<td class="table-danger"><?php echo $no ?></td>
											<td class="table-danger"><?php echo $user['team_name'] ?></td>	
											<td class="table-danger"><?php echo $user['team_position'] ?></td>			
											<td><a href="team_edit.php?id=<?php echo $user['team_id'] ?>">Edit</a> / <a data-toggle="modal" data-target="#DefaultModal<?php echo $no ?>" href="#" >Hapus</a></td>
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