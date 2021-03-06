<?php
	date_default_timezone_set("Asia/Jakarta"); 
	include('config/koneksi.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Edit Team');
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
					<h1 class="page-heading">Team</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="team_view.php">Team</a></li>
						<li class="active">Edit Team</li>
					</ol>
					<!-- End breadcrumb -->
					<?php
						$id = $_GET['id'];
						$slide = mysql_fetch_assoc(mysql_query("SELECT * FROM team WHERE team_id = '$id' ")); 
					?>


					<div class="the-box">
						<form id="eventform" method="post" action="team_action.php?action=edit&id=<?php echo $id ?>" class="form-horizontal" enctype="multipart/form-data" >
							
							<fieldset>
								<legend>Ubah Team / Edit Team</legend>

								<div class="form-group">
									<label class="col-lg-3 control-label">Nama Lengkap / Full Name</label>
									<div class="col-lg-5">
										<input type="text" value="<?php echo $slide['team_name'] ?>" class="form-control" name="team_name" />
									</div>
								</div>								

								<div class="form-group">
									<label class="col-lg-3 control-label">Gambar Lama / Old Image</label>
									<div class="col-lg-5">
										<img width="50%" height="50%" src="../images/team/<?php echo $slide['team_image'] ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label"> Gantikan Gambar ?/ Replace Image ?</label>
									<div class="col-lg-5">
										<div class="input-group">
										<input type="text" class="form-control" readonly>
										<span class="input-group-btn">
											<span class="btn btn-default btn-file">
												Browse&hellip; <input type="file" name="team_image">
											</span>
										</span>
									</div><!-- /.input-group -->
									</div>
								</div>
									
								<div class="form-group">
									<label class="col-lg-3 control-label">Posisi / Position</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="team_position" value="<?php echo $slide['team_position'] ; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Email</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="team_email" value="<?php echo $slide['team_email'] ; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Deskripsi / Description</label>
									<div class="col-lg-5">
										<textarea rows="10" name="team_content" class="form-control no-resize"><?php echo $slide['team_content'] ; ?></textarea>
									</div>
								</div>																								
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