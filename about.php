<?php
	require_once('config/koneksi.php');
	require_once('config/potong_kata.php');
	require_once('config/fungsi_tgl.php');	
	session_start();
	$id=1;
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Spektakel.id</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="seni budaya nusantara" />
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
				<div class="col-md-12 title">
<?php
					if ($id==1) {
?>
					<h1>Tentang Spektakel - <span class="blue">Cara Kerja dan Kontribusi</span></h1>
<?php						
					}
					elseif ($id==3) {
?>
					<h1>Tentang Spektakel - <span class="blue">Layanan Kami</span></h1>
<?php						
					}
?>					
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="col-md-3 col-sm-3">
					<div class="pages-side">
						
						<ul class="list-unstyled">
							<li><a href="about.php?id=1">Bagaimana kerjanya</a></li>
							<li><a href="about.php?id=1#kontribusi">Kontribusi Kegiatan</a></li>
							<li><a href="about.php?id=3">Layanan Kami</a></li>
							<li><a href="team.php">Tim</a></li>							
						</ul>
					</div>
				</div>
				<div class="col-md-9 col-sm-9 content-detail">
<?php 
				if ($id==1) {

					if (isset($_SESSION['userid']) AND isset($_SESSION['username']) AND isset($_SESSION['full_name']) AND isset($_SESSION['password']) ) {

						$userid = $_SESSION['userid'] ;
						$username = $_SESSION['username'] ;
						$full_name =  $_SESSION['full_name'] ;
						$password = $_SESSION['password'] ;
					}
					else{
						$userid = '';
						$username = '';
						$full_name = '';
						$password = '';
					}

					$sql = "SELECT * FROM member WHERE id = '".$userid."'
							AND email = '".$username."' 
							AND full_name = '".$full_name."'
							AND password =  '".$password."'
							";
					$query = mysqli_query($con,$sql);
					$count = mysqli_num_rows($query);

					if (!isset($_SESSION['userid']) AND !isset($_SESSION['username']) AND !isset($_SESSION['full_name']) AND !isset($_SESSION['password']) AND $count > 1 ) {

						$link = '<a style="color:#43A7F4" href="post_event.php">formulir</a>';
						$mendaftar = 'mendaftar';						
					}
					else{
						$link = '<a style="color:#43A7F4" href="javascript:void(0)" id="btn-login-modal" data-toggle="modal" data-target="#login-modal">formulir</a>';
						$mendaftar = '<a style="color:#43A7F4" href="javascript:void(0)" id="btn-login-modal" data-toggle="modal" data-target="#login-modal">mendaftar</a>';
					}

?>
					<p>Spektakel adalah platform direktori acara seni budaya nusantara. Kami mengkurasi beragam acara yang dihimpun dari para pelaku seni budaya. Dari kota besar hingga pelosok desa. Informasi seni budaya kami sajikan dalam kemasan yang ringkas, efektif, dan lengkap.</p>
					<p>Spektakel bertujuan mewabahkan acara seni budaya nusantara agar semarak dan berkelanjutan. Kami terbuka berkerja sama dalam semua lini kerja.</p>
					<h2 class="text-uppercase" style="margin-top: 60px;">BAGAIMANA SPEKTAKEL BEKERJA</h2>
					<p>Kami memiliki jejaring kontributor kegiatan seni budaya di Indonesia yang secara rutin mengabarkan kegiatan yang terjadi di area mereka, dari Sabang hingga Marauke. Didampingi oleh tim editorial, semua informasi akan melalui proses kurasi dan editing untuk menjaga kualitas informasi agar tetap memenuhi standar yang telah kami tetapkan</p>
										
					<a name="kontribusi"><img src="images/cara.png" style="margin: 60px 0;"></a>

					<h2 class="text-uppercase">KONTRIBUSI KEGIATAN</h2>
					<p>Kami menyediakan kesempatan luas bagi Anda untuk berkontribusi untuk mempromosikan kegiatan seni budaya, baik yang Anda kelola sendiri maupun dari lingkungan di sekitar Anda. Kami percaya bahwa semangat berbagi informasi akan membuat Nusantara tampil semakin kaya.</p>

					<p>Anda bisa berpromosi melalui <?php echo $link ; ?> yang telah kami sediakan setelah Anda <?php echo $mendaftar ; ?> .</p>
					
					
<?php					
				}
				elseif ($id==3) {
?>					
					<p>Spektakel tidak hanya sekedar menyajikan informasi seni budaya di Indonesia. Kami juga memiliki divisi kerja yang dapat membantu Anda untuk memaksimalkan kegiatan-kegiatan seni budaya yang Anda kelola:</p>
					<h2 class="text-uppercase" style="margin-top: 60px;">PEMASARAN KONTEN</h2>
					<p>Kami bukan hanya menampilkan informasi kegiatan seni budaya yang Anda kelola di laman muka utama, tapi juga akan memasarkannya melalui jaringan media sosial <a style="color:#43A7F4" href="http://facebook.com/spektakel.id" target="_blank">Facebook</a> dan <a style="color:#43A7F4" href="http://instagram.com/spektakel.id" target="_blank">Instagram</a> kami - dimana kegiatan Anda akan bertemu langsung dengan para pencinta kegiatan seni budaya dari seluruh Indonesia</p>
					<h2 class="text-uppercase" style="margin-top: 60px;">PEMBUATAN & PENGELOLAAN WEBSITE MIKRO</h2>
					<p>Bila Anda memiliki rencana mengadakan kegiatan seni budaya baik satu kali maupun berkala, kami akan membantu Anda untuk membuat serta mengelola website mikro sebagai media komunikasi Anda kepada publik. Tidak hanya itu, kami secara otomatis akan memasarkan konten tersebut melalui jaringan media sosial kami.</p>
					<!-- <p>Anda bisa melihat contoh website mikro yang kami buat dan kelola <a style="color:#43A7F4" href="" target="_blank">disini</a></p> -->
					<h2 class="text-uppercase" style="margin-top: 60px;">PENGELOLAAN PROYEK SENI BUDAYA</h2>
					<p><a style="color:#43A7F4" href="team.php">Tim</a> kami terdiri dari profesional di masing-masing bidangnya serta berjejaring dengan para kelompok dan manager proyek seni budaya di Indonesia. Kami bisa membantu Anda untuk mengembangkan ide proyek seni budaya Anda hingga tahap aplikasi untuk menghasilkan sebuat kegiatan seni budaya yang berkualitas.</p>
					<br>
					<p>
					Hubungi kami di <a target="_blank" style="color:#43A7F4" href="kontak@spektakel.id">kontak@spektakel.id</a>
					</p>
					
					<br><br>
<?php					
				}
?>				


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