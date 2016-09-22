<?php
	include('config/koneksi.php');
	include('config/form_maker.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Input User');
?>
     <script>
      function countChar(val) {
        var len = val.value.length;
        var text_max = 500;
        if (len > text_max) {
          val.value = val.value.substring(0, text_max);
        } else {
          $('#charNum').text(text_max - len + ' character remaining');
        }
      };

        function countChar1(val) {
        var len = val.value.length;
        var text_max = 500;
        if (len > text_max) {
          val.value = val.value.substring(0, text_max);
        } else {
          $('#charNum1').text(text_max - len + ' character remaining');
        }
      };
    </script>	
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
						<li class="active">Input User</li>
					</ol>
					<!-- End breadcrumb -->
					
					<div class="the-box">
						<form id="eventform" method="post" action="user_master_action.php?action=input" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>User Baru / New User</legend>

								<div class="form-group">
									<label class="col-lg-3 control-label">Nama Lengkap / Full Name</label>
									<div class="col-lg-5">
										<input type="text" value="" class="form-control" name="user_fullname" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Username</label>
									<div class="col-lg-5">
										<input type="text" value="" class="form-control" name="user_name" />
									</div>
								</div>
									

								<div class="form-group">
									<label class="col-lg-3 control-label">New Password</label>
									<div class="col-lg-5">
										<input type="text" value="" class="form-control" name="new_password" />
									</div>
								</div>								
								<div class="form-group">
									<label class="col-lg-3 control-label">Gambar / Image</label>
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

								combobox_array('Tipe / Type','user_type',$option); ?>
								

								<div class="form-group">
									<label class="col-lg-3 control-label">Email</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="user_email" value="" />
									</div>
								</div>

							
								<?php 
								$option_banned = array('no' => 'no',
												'yes' => 'yes',
												 );

								combobox_array('Banned','user_banned',$option_banned); ?>

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