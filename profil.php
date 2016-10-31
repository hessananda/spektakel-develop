<?php
	require_once('config/koneksi.php');
	require_once('config/potong_kata.php');
	require_once('config/fungsi_tgl.php');	
	session_start();

		if (!isset($_SESSION['userid']) AND !isset($_SESSION['username']) AND !isset($_SESSION['full_name']) AND !isset($_SESSION['password']) ) {
?>
			<meta http-equiv="refresh" content="0; url=index.php" />
<?php		
		}

	$menu = 'informasiakun';
	if (isset($_GET['menu'])) {
		$menu = $_GET['menu'];
	}

	$sql = "SELECT * FROM member WHERE id = '".$_SESSION['userid']."'
			AND email = '".$_SESSION['username']."' 
			AND full_name = '".$_SESSION['full_name']."'
			AND password =  '".$_SESSION['password']."'
			";
	$query = mysqli_query($con,$sql);

	$count = mysqli_num_rows($query) ;
	if ($count < 1) {
?>		
	<meta http-equiv="refresh" content="0; url=index.php" />
<?php		
	}

	$member = mysqli_fetch_assoc($query);

	$time=strtotime($member['confirmation_date']);

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
</head>
<body>
	<div class="wrapper bg-grey">
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
					<div class="col-md-8 col-sm-6 title">
					<?php
						// if ($menu=='informasiakun') {
						// 	echo "<h1>Informasi Akun</h1>";
						// }
						// elseif ($menu=='gantipassword') {
						// 	echo "<h1>Ganti Password</h1>";
						// }
						// elseif ($menu=='tutupakun') {
						// 	echo "<h1>Tutup Akun</h1>";
						// }
					echo "<h1>Profil ".$_SESSION['full_name']."</h1>";												
						?>						
					</div>
					<div class="col-md-4 col-sm-6 title text-right">
						<h4>Pengguna Sejak <?php echo tgl_indo(date("Y-m-d", $time)) ?></h4>
					</div>
					<div class="col-md-12"><div class="form-ruler">&nbsp;</div></div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<div class="pages-side page-side-profile">
							<div class="side-title">Pengaturan</div>
							<ul class="list-unstyled">
								<li <?php echo $menu=='informasiakun'?'class="active"':'' ?> ><a href="profil.php?menu=informasiakun">Informasi Akun</a></li>
								<li <?php echo $menu=='gantipassword'?'class="active"':'' ?> ><a href="profil.php?menu=gantipassword">Ganti Password</a></li>
								<!-- <li><a href="profil.php">Email Preferences</a></li> -->
								<!-- <li><a href="profil.php">Multi User Access</a></li> -->
								<li <?php echo $menu=='tutupakun'?'class="active"':'' ?> ><a href="profil.php?menu=tutupakun">Tutup Akun</a></li>
								<li><a href="author_post.php?id=<?php echo $_SESSION['userid'] ; ?>">Posting Saya</a></li>
							</ul>
						</div>
						<!-- <div class="pages-side page-side-profile margin-10"> -->
							<!-- <div class="side-title">Postingan</div>
							<ul class="list-unstyled">
								<li><a href="list.php">Postingan Aktif</a></li>
								<li><a href="list.php">Postingan Lampau</a></li>
								<li><a href="list.php">Posting Baru</a></li>
							</ul> -->
						<!-- </div> -->
					</div>
					<div class="col-md-9 col-sm-9 form-content">
						<?php
						if ($menu=='informasiakun') {
							require_once('part/profil_informasi_akun.php');
						}
						elseif ($menu=='gantipassword') {
							require_once('part/profil_ganti_password.php');
						}
						elseif ($menu=='tutupakun') {
							require_once('part/profil_tutup_akun.php');
						}						
						?>

					</div>
				</div>
			
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
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