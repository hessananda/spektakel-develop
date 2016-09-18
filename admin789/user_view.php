<?php 
	session_start();
	include('config/koneksi.php');
	include('config/Html_library.php');

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
					<h1 class="page-heading">User</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="#fakelink">User</a></li>
						<li class="active">User List</li>
					</ol>
					<!-- End breadcrumb -->
					
					<!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th>No</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Type</th>
									<th>Banned ?</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no = 1 ;
									$users = mysql_query("SELECT * from user");
									while ($user = mysql_fetch_assoc($users)) {
										?>
										<tr class="odd gradeX">
										<td><?php echo $no ?></td>
											<td><?php echo $user['user_fullname'] ?></td>
											<td><?php echo $user['user_email'] ?></td>
											<td><?php echo $user['user_type'] ?></td>
											<td class="center"> <?php echo $user['user_banned'] ?></td>
											<td><a href="user_edit.php?id=<?php echo $user['user_id'] ?>">Edit</a> / <a href="user_master_action.php?action=hapus&id=<?php echo $user['user_id'] ?>">Hapus</a></td>
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