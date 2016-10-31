<?php
	date_default_timezone_set("Asia/Jakarta"); 
	include('config/koneksi.php');
	include('config/form_maker.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Edit User');
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
						<li><a href="user_view.php">User</a></li>
						<li class="active">Edit User</li>
					</ol>
					<!-- End breadcrumb -->
					<?php
						$id = $_GET['id'];
						$user = mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE user_id = '$id' ")); 
					?>


					<div class="the-box">
						<form id="eventform" method="post" action="user_master_action.php?action=edit&id=<?php echo $id ?>" class="form-horizontal" enctype="multipart/form-data" >
							
							<fieldset>
								<legend>Ubah User / Edit User</legend>

								<div class="form-group">
									<label class="col-lg-3 control-label">Nama Lengkap / Full Name</label>
									<div class="col-lg-5">
										<input type="text" value="<?php echo $user['user_fullname'] ?>" class="form-control" name="user_fullname" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Username</label>
									<div class="col-lg-5">
										<input type="text" value="<?php echo $user['user_name'] ?>" class="form-control" name="user_name" />
									</div>
								</div>
									

								<div class="form-group">
									<label class="col-lg-3 control-label">New Password</label>
									<div class="col-lg-5">
										<input type="text" value="" class="form-control" name="new_password" />
									</div>
								</div>								

								<div class="form-group">
									<label class="col-lg-3 control-label">Gambar Lama / Old Image</label>
									<div class="col-lg-5">
										<img width="50%" height="50%" src="images/user/<?php echo $user['user_image'] ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label"> Gantikan Gambar ?/ Replace Image ?</label>
									<div class="col-lg-5">
										<div class="input-group">
										<input type="text" class="form-control" readonly>
										<span class="input-group-btn">
											<span class="btn btn-default btn-file">
												Browse&hellip; <input type="file" name="user_image">
											</span>
										</span>
									</div><!-- /.input-group -->
									</div>
								</div>									

								<?php 
								$option = array('kontributor' => 'Kontributor', 
												'editor' => 'Editor', 
												'admin konten' => 'Admin Konten',
												'super admin' => 'Super Admin',
												 );

								combobox_array_update('Tipe / Type','user_type',$option,$user['user_type']); ?>
								

								<div class="form-group">
									<label class="col-lg-3 control-label">Email</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="user_email" value="<?php echo $user['user_email'] ; ?>" />
									</div>
								</div>

							
								<?php 
								$option_banned = array('no' => 'no',
												'yes' => 'yes',
												 );

								combobox_array_update('Banned','user_banned',$option_banned,$user['user_banned']); ?>
																							
							</fieldset>				

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<button type="submit" class="btn btn-primary">Simpan</button>
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