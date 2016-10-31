<?php
	require_once('config/koneksi.php');
	require_once('config/potong_kata.php');
	require_once('config/fungsi_tgl.php');	
	session_start();

$member = '';		
	
	$tujuan = $_REQUEST['tujuan'];
	// cek dia lari mau ke halaman apa
	if ($tujuan=='home') {
		$header = '<h1>Masukan Password Baru Anda</h1>' ;
		$icon = '' ;
		$paragraph = "<p>
					  <form method='post' action='part/cek_member.php?status=forget_password_action'>
					  <label for='new_password'>Password Baru : </label>
					  <input id='new_password' type='text' name='new_password'>
					  <input type='hidden' name='id' value='$_GET[id]' >
					  <button class='btn btn-orange' type='submit'>Simpan</button>
					  </form>
					  </p>  ";
	}
	elseif ($tujuan=='berhasil') {
		$header = '<h1>Password Anda<span class="blue"> Telah Diperbarui !</span></h1>' ;
		$icon = '<i class="glyphicon glyphicon-thumbs-up"></i>' ;
		$paragraph = '';
	}

	elseif ($tujuan=='gagal') {
		$header = '<h1>Password Anda Gagal Diperbarui</h1>' ;
		$icon = '<i class="glyphicon glyphicon-thumbs-down"></i>' ;
		$paragraph = '';
	}
	
	else {
		header('location:index.php') ;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Spektakel.id</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="e-commerce site well design with responsive view." />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Stylesheet -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,100,200,500,900,800,700,600' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="css/animate.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.theme.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.transitions.css" rel="stylesheet" type="text/css" />
	<link href="css/superslides.css" rel="stylesheet" type="text/css">
	<link href="css/jquery.sidr.light.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
	<link href="css/cropper.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">

	<link href="images/favicon.png" rel="shortcut icon" />

	<style type="text/css">
	
	.glyphicon {
	    font-size: 50px;
	}
	
	</style>
	
</head>
<body>
	<a href="#0" class="cd-bottom">Bottom</a>

	<div class="wrapper">
		<header>
			<div class="header">
				<div class="container">
					<div class="header-inner">
						<div class="col-md-4 col-sm-4 col-xs-2 header-left">
							<div id="nav-icon"><span></span><span></span><span></span></div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6 col-xs-offset-3 header-middle">
							<div class="header-middle-top">
								<div id="logo">
									<a href="index.php"><img src="images/logo.png" title="Spektakel.id" alt="Spektakel.id" class="img-responsive"></a>
								</div>
							</div>
						</div>
						<!-- START LEFT MENU -->
						<?php
							require_once('part/modal_left_menu.php');
						?>
						<!-- END LEFT MENU -->
					</div>
				</div>
			</div>
			<div id="blank-slides">&nbsp;</div>
		</header>
		
		<div class="clearfix"></div>
		<div class="container content">
			<div class="row">
				<div class="col-md-12 title">
				  <center>							
					<?php echo $header ; ?>
				  </center>
				</div>
				

				<div class="col-md-12 title">
				  <center>				
					
					<?php echo $icon ?>
					
				  </center>
				</div>
				<div class="clearfix">&nbsp;</div>
				
				<div class="col-md-12 col-sm-12">
				  <center>
									
					<?php echo $paragraph ; ?>

				</center>
				</div>
				
			</div>
		</div>
		<div class="clearfix"></div>


		<!-- START FOOTER  -->
<?php
		require_once('part/footer.php');
?>
		<!-- END FOOTER -->
	</div>

	<!-- START MODAL LOGIN  -->
<?php
		require_once('part/modal_login.php');
?>
		<!-- END MODAL LOGIN -->

	<a href="#0" class="cd-top">Top</a>

	<!-- Javascript -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.easing.1.3.min.js" type="text/javascript"></script>
	<script src="js/moment.js" type="text/javascript"></script>
	<script src="js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="js/jquery.superslides.min.js" type="text/javascript"></script>
	<script src="js/wow.min.js" type="text/javascript"></script>
	<script src="js/jquery.sidr.min.js" type="text/javascript"></script>
	<script src="js/jquery.uploadPreview.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
	<script src="js/cropper.min.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>

</body>
</html>