<?php
	date_default_timezone_set("Asia/Jakarta"); 
	include('config/koneksi.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$html->display_main('Edit an Slider');
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
					<h1 class="page-heading">Slide</h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="slider_view.php">Slide</a></li>
						<li class="active">Edit Slide</li>

					</ol>
					<!-- End breadcrumb -->
					<?php
						$id = $_GET['id'];
						$slide = mysql_fetch_assoc(mysql_query("SELECT * FROM slider WHERE slider_id = '$id' ")); 
					?>


					<div class="the-box">
						<form id="eventform" method="post" action="slider_action.php?action=edit&id=<?php echo $id ?>" class="form-horizontal" enctype="multipart/form-data" >
							
							<fieldset>
								<legend>Ubah Slide</legend>								

								<div class="form-group">
									<label class="col-lg-3 control-label">Gambar Lama</label>
									<div class="col-lg-5">
										<img width="50%" height="50%" src="../images/slider/<?php echo $slide['slider_image'] ?>">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 control-label"> Gantikan Gambar ?</label>
									<div class="col-lg-5">
										<div class="input-group">
										<input type="text" class="form-control" readonly>
										<span class="input-group-btn">
											<span class="btn btn-default btn-file">
												Browse&hellip; <input type="file" name="slider_image">
											</span>
										</span>
									</div><!-- /.input-group -->
									</div>
								</div>
									
								<div class="form-group">
									<label class="col-lg-3 control-label">Ribbon</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="slide_content" value="<?php echo $slide['slider_content'] ; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Judul Slide</label>
									<div class="col-lg-5">
										<input type="text" value="<?php echo $slide['slider_title'] ?>" class="form-control" name="slide_title" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Kata-kata</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="slide_button" value="<?php echo $slide['slider_button'] ; ?>" />
									</div>
								</div>																												
														
								<div class="form-group">
									<label class="col-lg-3 control-label">Tautan Slide / Slide link</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" name="slide_link" value="<?php echo $slide['slider_link'] ; ?>" />
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